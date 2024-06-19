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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i_daraja = IlmiyUnvon::all();

        return view('admin.ilmiyunvon.index', ['i_daraja'=>$i_daraja]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        IlmiyUnvon::create([
            "user_id" => auth()->id(),
            "ilmiy_unvon_nomi" => $request->ilmiy_unvon_nomi,
            "sana" => $request->sana,
            "regis_raqami" => $request->regis_raqami,
            "kim_tom_berilgan" => $request->kim_tom_berilgan
        ]);

        return redirect('ilmiyunvon'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(IlmiyUnvon $ilmiyUnvon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IlmiyUnvon $ilmiyUnvon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIlmiyUnvonRequest $request, IlmiyUnvon $ilmiyUnvon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IlmiyUnvon $ilmiyunvon)
    {
        $ilmiyunvon->delete();

        return redirect('/ilmiyunvon');
    }
}
