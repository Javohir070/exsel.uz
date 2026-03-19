<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAkademRequest;
use App\Http\Requests\UpdateAkademRequest;
use App\Models\Akadem;
use App\Models\AkademExpert;
use App\Models\Monitoring;
use App\Models\Region;
use App\Models\Tashkilot;
use Illuminate\Http\Request;
use App\Exports\AkademExpert as AkademExpertExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;


class AkademController extends Controller
{
    public $monitoring;

    public function __construct()
    {
        $this->middleware('auth');
        $this->monitoring = Monitoring::getActive();
    }


    public function index(Request $request)
    {
        $akadem = Akadem::where('is_active', 1);

        if ($request->filled('search')) {
            $search = $request->search;

            $akadem->where(function ($query) use ($search) {
                $query->where('full_name', 'like', "%{$search}%")
                    ->orWhere('receiver_organization_name', 'like', "%{$search}%")
                    ->orWhere('receiver_organization_inn', 'like', "%{$search}%")
                    ->orWhere('receiver_organization_district', 'like', "%{$search}%")
                    ->orWhere('receiver_organization_region', 'like', "%{$search}%")
                    ->orWhere('sender_organization_name', 'like', "%{$search}%")
                    ->orWhere('sender_organization_district', 'like', "%{$search}%")
                    ->orWhere('sender_organization_region', 'like', "%{$search}%");
            });
        }

        $akadem = $akadem->paginate(20)->withQueryString();
        $regions = Region::all();

        return view('admin.akadem.index', compact('akadem', 'regions'));
    }

    public function syncAkadem()
    {
        $client_id = "f9a454c5-8145-498b-b152-fdf140b4d128";
        $client_secret = "YKHshBTK-EEntfv3p70QbhpEZhBBqIzqaXKoyIHdoknErqjt8HeHGDIfaJy0l4yZ16VLKSPxMgtCfDFsZuJmkA";

        // 1) Auth
        $response = Http::post('https://api-akadem.ilmiy1.uz/auth/clients/login', [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
        ]);

        if (!$response->ok()) {
            return response()->json(['error' => 'Failed to authenticate']);
        }

        $login = $response->json();


        // 2) Barcha sahifalarni olish
        $url = "https://api-akadem.ilmiy1.uz/stats/winners";
        $total_saved = 0;

        while ($url) {

            $response_stats = Http::withHeaders([
                'Authorization' => "ClientAuth {$login['token']}"
            ])->get($url);

            $stats = $response_stats->json();

            if (!isset($stats['results']))
                break;

            foreach ($stats['results'] as $item) {

                Akadem::updateOrCreate(
                    [
                        "user_id" => auth()->id(),
                        "tashkilot_id" => 1,
                        "region_id" => 1,

                        "science_id" => $item['scientist']['science_id'],
                        "full_name" => $item['scientist']['full_name'],
                        "photo" => $item['scientist']['photo'] ?? null,

                        "project_name" => $item['project_name'],
                        "total_amount" => $item['total_amount'],

                        // Receiver
                        "receiver_organization_name" => $item['receiver_organization']['name'],
                        "receiver_organization_inn" => $item['receiver_organization']['tin'],
                        "receiver_organization_district" => $item['receiver_organization']['district'],
                        "receiver_organization_region" => $item['receiver_organization']['region'],

                        // Sender
                        "sender_organization_name" => $item['sender_organization']['name'],
                        "sender_organization_inn" => $item['sender_organization']['tin'],
                        "sender_organization_district" => $item['sender_organization']['district'],
                        "sender_organization_region" => $item['sender_organization']['region'],
                    ]
                );

                $total_saved++;
            }

            // ❗ Keyingi sahifa bor bo‘lsa — URL ni almashtiramiz
            $url = $stats['next'] ?? null;
        }

        return response()->json([
            'saved' => $total_saved,
            'message' => "Barcha sahifalar yuklandi"
        ]);
    }

    public function create()
    {
        //
    }


    public function store(StoreAkademRequest $request)
    {
        //
    }


    public function show(Akadem $akadem)
    {
        $akademexpert = AkademExpert::where('akadem_id', $akadem->id)
            ->where('quarter', $this->monitoring->id)->get();
        $quarter_2 = AkademExpert::where('akadem_id', $akadem->id)
            ->where('quarter', 1)->first();

        return view('admin.akadem.show', compact('akadem', 'akademexpert', 'quarter_2'));
    }

    public function akademlar()
    {
        $user = auth()->user();
        $hasRegion = $user->region_id !== null;
        $quarterId = $this->monitoring->id;

        if ($hasRegion) {
            $regions = Region::where('id', $user->region_id)->get();
            $region = $regions->first();

            $tashkilotIds = $region->tashkilots()
                ->where('akadem_is', 1)
                ->pluck('id');

            $tashkilots = $tashkilotIds->count();
            $akadem_count = Akadem::whereIn('tashkilot_id', $tashkilotIds)
                ->where('is_active', 1)
                ->count();
            $akadem_expert = AkademExpert::whereIn('tashkilot_id', $tashkilotIds)
                ->where('quarter', $quarterId)
                ->count();
        } else {
            $regions = Region::orderBy('order')->get();
            $tashkilots = Tashkilot::where('akadem_is', 1)->count();
            $akadem_count = Akadem::where('is_active', 1)->count();
            $akadem_expert = AkademExpert::where('quarter', $quarterId)->count();
        }

        return view('admin.akadem.viloyat', [
            'tashkilots' => $tashkilots,
            'akadem_count' => $akadem_count,
            'akadem_expert' => $akadem_expert,
            'regions' => $regions,
            'akadems_count' => $akadem_count,
            'monitoring' => $this->monitoring
        ]);
    }

    public function tashkilot_turi_akadem($id)
    {
        $region = Region::findOrFail($id);

        $tashkilotlarQuery = Tashkilot::where('akadem_is', 1)
            ->where('region_id', $id)
            ->with([
                'akademlar' => function ($q) {
                    $q->where('is_active', 1);
                }
            ])
            ->get();

        $tashkilots = $tashkilotlarQuery->count();
        $tashkilotIds = $tashkilotlarQuery->pluck('id');

        $results = [];

        $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi', 'boshqa'),
        ];

        foreach ($groups as $key => $group) {
            $results[$key] = [
                'akademlar' => $group->flatMap->akademlar->count(),
            ];
        }

        $akadem_count = Akadem::whereIn('tashkilot_id', $tashkilotIds)
            ->where('is_active', 1)
            ->count();
        $akadem_expert = AkademExpert::whereIn('tashkilot_id', $tashkilotIds)
            ->where('quarter', 1)
            ->count();

        return view('admin.akadem.tashkilot_turi', [
            'results' => $results,
            'regions' => $region,
            'tashkilots' => $tashkilots,
            'akadem_count' => $akadem_count,
            'akadem_expert' => $akadem_expert,
            'monitoring' => $this->monitoring
        ]);
    }

    public function search_akadem(Request $request)
    {

        $query = $request->input('query');
        $regionId = $request->input('id');
        $type = $request->input('type');

        $isRegionSearch = is_numeric($regionId);

        $buildTashkilotQuery = function () use ($isRegionSearch, $regionId, $type, $query) {
            $queryBuilder = Tashkilot::where('stajirovka_is', 1);

            if ($isRegionSearch) {
                $queryBuilder->where('region_id', $regionId)
                    ->where('tashkilot_turi', $type)
                    ->where('name', 'like', '%' . $query . '%');
            }

            return $queryBuilder;
        };

        $tashkilotlar = $buildTashkilotQuery()
            ->orderBy('name')
            ->paginate(50);

        $tashkilotIds = $buildTashkilotQuery(true)
            ->pluck('id');

        return view('admin.akadem.akademlar', [
            'tashkilotlar' => $tashkilotlar,
            'tash_count' => $tashkilotlar->total(),
            'monitoring' => $this->monitoring,
            'query' => $query,
            'regionId' => $regionId,
            'type' => $type,
        ]);
    }

    public function akadem($id)
    {
        $akadem = Akadem::where('tashkilot_id', '=', $id)->where('is_active', 1)->paginate(20);

        $tashkilot = Tashkilot::findOrFail($id);

        return view('admin.akadem.index', [
            'akadem' => $akadem,
            'tashkilot' => $tashkilot,
        ]);
    }


    public function edit(Akadem $akadem)
    {
        //
    }


    public function update(UpdateAkademRequest $request, Akadem $akadem)
    {
        //
    }


    public function destroy(Akadem $akadem)
    {
        //
    }




    public function exportAkadem()
    {
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', '300');

        return Excel::download(new AkademExpertExport(), 'monitoring_asbob_uskuna.xlsx');
    }

}
