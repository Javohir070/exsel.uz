<?php

namespace App\Http\Controllers;

use App\Exports\FakultetlarExport;
use App\Models\Fakultetlar;
use App\Http\Requests\StoreFakultetlarRequest;
use App\Http\Requests\UpdateFakultetlarRequest;
use App\Models\Kafedralar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FakultetlarController extends Controller
{

    public function index()
    {
        $laboratorys = Fakultetlar::where("tashkilot_id", auth()->user()->tashkilot_id)->get();

        return view("admin.fakultetlar.index", ["laboratorys" => $laboratorys]);
    }

    public function fakultets(Request $request)
    {
        $query = Fakultetlar::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('yil') && $request->yil !== 'all') {
            $query->where('tash_yil', $request->yil);
        }

        $fakultets = $query->paginate(20);

        return view("admin.fakultetlar.all", ["fakultets" => $fakultets]);
    }


    public function store(StoreFakultetlarRequest $request)
    {
        $data = $request->validated();
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        Fakultetlar::create($data);

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }


    public function edit(Fakultetlar $fakultetlar)
    {
        return view("admin.fakultetlar.edit", ["fakultetlar" => $fakultetlar]);
    }


    public function update(UpdateFakultetlarRequest $request, Fakultetlar $fakultetlar)
    {
        $data = $request->validated();
        $fakultetlar->update($data);

        return redirect('/fakultetlar')->with("status", 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }


    public function destroy(Fakultetlar $fakultetlar)
    {

        $kafedralar = Kafedralar::where('fakultetlar_id', $fakultetlar->id)->first();
        $kafedralar->xodimlar()->update(['kafedralar_id' => null]);
        $kafedralar->ilmiyLoyihalar()->update(['kafedralar_id' => null]);
        $kafedralar->xujaliklar()->update(['kafedralar_id' => null]);

        $fakultetlar->delete();

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }

    public function fakultetlar_export()
    {
        $fileName = 'Fakultetlar_' . now()->format('Y_m_d_H_i_s') . '.xlsx';

        return Excel::download(new FakultetlarExport, $fileName);
    }
}
