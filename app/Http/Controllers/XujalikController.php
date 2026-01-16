<?php

namespace App\Http\Controllers;

use App\Exports\XujalikExport;
use App\Models\Laboratory;
use App\Models\Xujalik;
use App\Http\Requests\StoreXujalikRequest;
use App\Http\Requests\UpdateXujalikRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class XujalikController extends Controller
{

    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $xujalik = Xujalik::where('tashkilot_id', $tashRId)->paginate(20);

        return view('admin.xujalik.index', ['xujalik' => $xujalik]);
    }


    public function create()
    {
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.xujalik.create', ['laboratorylar' => $laboratorylar]);
    }


    public function store(StoreXujalikRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('shartnoma_file')) {
            $name_shartnoma_file = time() . $request->file('shartnoma_file')->getClientOriginalName();
            $path_shartnoma_file = $request->file('shartnoma_file')->storeAs('xujalik-file', $name_shartnoma_file);
            $data['shartnoma_file'] = $path_shartnoma_file ?? 'yo\'q';
        }

        if ($request->hasFile('dalolatnoma_file')) {
            $name_dalolatnoma_file = time() . $request->file('dalolatnoma_file')->getClientOriginalName();
            $path_dalolatnoma_file = $request->file('dalolatnoma_file')->storeAs('xujalik-file', $name_dalolatnoma_file);
            $data['dalolatnoma_file'] = $path_dalolatnoma_file ?? null;
        }
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['kafedralar_id'] = auth()->user()->kafedralar_id;
        $data['user_id'] = auth()->id();

        Xujalik::create($data);


        if (auth()->user()->hasRole('labaratoriyaga_masul')) {
            return redirect()->route('lab_xujalik.index')->with('status', "Ma\'lumotlar muvaffaqiyatli qo'shildi.");
        } else if (auth()->user()->hasRole('kafedra_mudiri')) {
            return redirect("/kafedralar-xujalik")->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        } else {
            return redirect('/xujalik')->with('status', "Ma\'lumotlar muvaffaqiyatli qo'shildi.");
        }
    }


    public function show(Xujalik $xujalik)
    {
        return view('admin.xujalik.show', ['xujalik' => $xujalik]);
    }


    public function edit(Xujalik $xujalik)
    {
        $laboratorylar = Laboratory::where('tashkilot_id', auth()->user()->tashkilot_id)->get();

        return view('admin.xujalik.edit', ['xujalik' => $xujalik, 'laboratorylar' => $laboratorylar]);
    }


    public function update(StoreXujalikRequest $request, Xujalik $xujalik)
    {
        $data = $request->validated();
        if ($request->hasFile('shartnoma_file')) {
            $name_shartnoma_file = time() . $request->file('shartnoma_file')->getClientOriginalName();
            $path_shartnoma_file = $request->file('shartnoma_file')->storeAs('xujalik-file', $name_shartnoma_file);
            $data['shartnoma_file'] = $path_shartnoma_file ?? 'yo\'q';
        }
        if ($request->hasFile('dalolatnoma_file')) {
            $name_dalolatnoma_file = time() . $request->file('dalolatnoma_file')->getClientOriginalName();
            $path_dalolatnoma_file = $request->file('dalolatnoma_file')->storeAs('xujalik-file', $name_dalolatnoma_file);
            $data['dalolatnoma_file'] = $path_dalolatnoma_file ?? null;
        }
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['kafedralar_id'] = auth()->user()->kafedralar_id;
        $data['user_id'] = auth()->id();

        $xujalik->update($data);

        if (auth()->user()->hasRole('labaratoriyaga_masul')) {
            return redirect()->route('lab_xujalik.index')->with('status', "Ma\'lumotlar muvaffaqiyatli yangilandi.");
        } else if (auth()->user()->hasRole('kafedra_mudiri')) {
            return redirect("/kafedralar-xujalik")->with('status', 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        } else {
            return redirect('/xujalik')->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
        }
    }


    public function destroy(Xujalik $xujalik)
    {
        $xujalik->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
    }

    public function xujaliklar(Request $request)
    {

        $query = Xujalik::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('ishlanma_nomi', 'like', '%' . $search . '%')
                ->orWhere('ishlanma_mavzu', 'like', '%' . $search . '%')
                ->orWhere('ilmiy_nomi', 'like', '%' . $search . '%')
                ->orWhere('stir', 'like', '%' . $search . '%')
                ->orWhere('sh_raqami', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%');
        }

        if ($request->filled('ishlanma_turi') && $request->ishlanma_turi != 'all') {
            $query->where('ishlanma_turi', $request->ishlanma_turi);
        }

        $xujaliklar = $query->paginate(20);

        return view('admin.xujalik.all', ['xujaliklar' => $xujaliklar]);
    }

    public function exporxujaliklar()
    {
        ini_set('memory_limit', '512M'); // Yoki kerakli miqdorda xotira limiti qo'ying
        ini_set('max_execution_time', '300'); // Kerak bo'lsa, vaqt limitini ham oshiring
        $fileName = 'Xujaliklar' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new XujalikExport, $fileName);
    }

}
