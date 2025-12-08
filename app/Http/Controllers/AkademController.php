<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAkademRequest;
use App\Http\Requests\UpdateAkademRequest;
use App\Models\Akadem;
use App\Models\AkademExpert;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Log;

class AkademController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       $akadem = Akadem::query();
        if ($request->filled('viloyat') && $request->input('viloyat') !== 'all') {
            $akadem->where('region_id', $request->input('viloyat'));
        }

        $akadem = $akadem->paginate(20);
        $regions = Region::all();
        return view('admin.akadem.index', compact('akadem', 'regions'));
    }

    // public function index()
    // {
    //     $client_id = "f9a454c5-8145-498b-b152-fdf140b4d128";
    //     $client_secret = "YKHshBTK-EEntfv3p70QbhpEZhBBqIzqaXKoyIHdoknErqjt8HeHGDIfaJy0l4yZ16VLKSPxMgtCfDFsZuJmkA";

    //     // 1) Auth
    //     $response = Http::post('https://api-akadem.ilmiy1.uz/auth/clients/login', [
    //         'client_id' => $client_id,
    //         'client_secret' => $client_secret,
    //     ]);

    //     if (!$response->ok()) {
    //         return response()->json(['error' => 'Failed to authenticate']);
    //     }

    //     $login = $response->json();


    //     // 2) Barcha sahifalarni olish
    //     $url = "https://api-akadem.ilmiy1.uz/stats/winners";
    //     $total_saved = 0;

    //     while ($url) {

    //         $response_stats = Http::withHeaders([
    //             'Authorization' => "ClientAuth {$login['token']}"
    //         ])->get($url);

    //         $stats = $response_stats->json();

    //         if (!isset($stats['results']))
    //             break;

    //         foreach ($stats['results'] as $item) {

    //             Akadem::updateOrCreate(
    //                 [
    //                     "user_id" => auth()->id(),
    //                     "tashkilot_id" => 1,
    //                     "region_id" => 1,

    //                     "science_id" => $item['scientist']['science_id'],
    //                     "full_name" => $item['scientist']['full_name'],
    //                     "photo" => $item['scientist']['photo'] ?? null,

    //                     "project_name" => $item['project_name'],
    //                     "total_amount" => $item['total_amount'],

    //                     // Receiver
    //                     "receiver_organization_name" => $item['receiver_organization']['name'],
    //                     "receiver_organization_inn" => $item['receiver_organization']['tin'],
    //                     "receiver_organization_district" => $item['receiver_organization']['district'],
    //                     "receiver_organization_region" => $item['receiver_organization']['region'],

    //                     // Sender
    //                     "sender_organization_name" => $item['sender_organization']['name'],
    //                     "sender_organization_inn" => $item['sender_organization']['tin'],
    //                     "sender_organization_district" => $item['sender_organization']['district'],
    //                     "sender_organization_region" => $item['sender_organization']['region'],
    //                 ]
    //             );

    //             $total_saved++;
    //         }

    //         // ❗ Keyingi sahifa bor bo‘lsa — URL ni almashtiramiz
    //         $url = $stats['next'] ?? null;
    //     }

    //     return response()->json([
    //         'saved' => $total_saved,
    //         'message' => "Barcha sahifalar yuklandi"
    //     ]);
    // }

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
        $akademexpert = AkademExpert::where('akadem_id', $akadem->id)->get();
        return view('admin.akadem.show', compact('akadem', 'akademexpert'));
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
}
