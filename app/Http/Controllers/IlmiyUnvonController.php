<?php

namespace App\Http\Controllers;

use App\Models\IlmiyUnvon;
use App\Http\Requests\StoreIlmiyUnvonRequest;
use App\Http\Requests\UpdateIlmiyUnvonRequest;
use Illuminate\Http\Request;

class IlmiyUnvonController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view role', ['only' => ['index']]);
        $this->middleware('permission:create role', ['only' => ['create','store','addPermissionToRole','givePermissionToRole']]);
        $this->middleware('permission:update role', ['only' => ['update','edit']]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }

    public function index()
    {
        $i_daraja = IlmiyUnvon::all();

        return view('admin.ilmiyunvon.index', ['i_daraja'=>$i_daraja]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        IlmiyUnvon::create([
            "user_id" => auth()->id(),
            "ilmiy_unvon_nomi" => $request->ilmiy_unvon_nomi,
            "sana" => $request->sana,
            "regis_raqami" => $request->regis_raqami,
            "kim_tom_berilgan" => $request->kim_tom_berilgan
        ]);

        return redirect('ilmiyunvon')->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }


    public function show(IlmiyUnvon $ilmiyUnvon)
    {
        //
    }


    public function edit(IlmiyUnvon $ilmiyUnvon)
    {
        //
    }


    public function update(Request $request, IlmiyUnvon $ilmiyUnvon)
    {
        //
    }


    public function destroy(IlmiyUnvon $ilmiyunvon)
    {
        $ilmiyunvon->delete();

        return redirect('/ilmiyunvon');
    }
}
