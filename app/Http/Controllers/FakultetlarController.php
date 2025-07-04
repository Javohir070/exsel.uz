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
        $laboratorys =Fakultetlar::where("tashkilot_id",auth()->user()->tashkilot_id)->get();

        return view("admin.fakultetlar.index", ["laboratorys"=> $laboratorys]);
    }

    public function fakultets(Request $request)
    {
        $query = Fakultetlar::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if($request->filled('yil') && $request->yil !== 'all'){
            $query->where('tash_yil', $request->yil);
        }

        $fakultets = $query->paginate(20);

        return view("admin.fakultetlar.all", ["fakultets"=> $fakultets]);
    }


    public function create()
    {
        return view("admin.fakultetlar.create");
    }


    public function store(StoreFakultetlarRequest $request)
    {
        Fakultetlar::create([
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "name" => $request->name,
            "tash_yil" => $request->tash_yil,
        ]);

        return redirect('/fakultetlar')->with("status",'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }


    public function show(Fakultetlar $fakultetlar)
    {
        //
    }


    public function edit(Fakultetlar $fakultetlar)
    {
        return view("admin.fakultetlar.edit", ["fakultetlar" => $fakultetlar]);
    }


    public function update(UpdateFakultetlarRequest $request, Fakultetlar $fakultetlar)
    {
        $fakultetlar->update($request->toArray());

        return redirect('/fakultetlar')->with("status",'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }


    public function destroy(Fakultetlar $fakultetlar)
    {

        $kafedralar = Kafedralar::where('fakultetlar_id', $fakultetlar->id)->first();
        $kafedralar->xodimlar()->update(['kafedralar_id' => null]);
        $kafedralar->ilmiyLoyihalar()->update(['kafedralar_id' => null]);
        $kafedralar->xujaliklar()->update(['kafedralar_id' => null]);

        $fakultetlar->delete();

        return redirect('/fakultetlar')->with("status",'Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }

    public function fakultetlar_export()
    {
        $fileName = 'Fakultetlar_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new FakultetlarExport, $fileName);
    }
}
