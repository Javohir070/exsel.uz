<?php

namespace App\Http\Controllers;

use App\Models\TashkilotRahbari;
use App\Http\Requests\StoreTashkilotRahbariRequest;
use App\Http\Requests\UpdateTashkilotRahbariRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TashkilotRahbariController extends Controller
{

    public function index()
    {
        $tashRId = auth()->user()->tashkilot_id;
        $tash_rahbar = TashkilotRahbari::where('tashkilot_id', $tashRId)->get();
        
        return view('admin.tashkilotrahbari.index', ['tash_rahbar'=>$tash_rahbar]);
    }


    public function create()
    {
        return view('admin.tashkilotrahbari.create');
    }


    public function store(StoreTashkilotRahbariRequest $request)
    {
        $data = $request->validated();
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['user_id'] = auth()->id();

        TashkilotRahbari::create($data);

        return redirect('/tashkilotrahbari')->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }


    public function show(TashkilotRahbari $tashkilotrahbari)
    {
        return view('admin.tashkilotrahbari.show',['tashkilotrahbari'=>$tashkilotrahbari]);
    }


    public function edit($tashkilotrahbari)
    {
        $tashkilot = TashkilotRahbari::find($tashkilotrahbari);
        return view('admin.tashkilotrahbari.edit',['tashkilot'=>$tashkilot]);
    }


    public function update(StoreTashkilotRahbariRequest $request, TashkilotRahbari $tashkilotrahbari)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
            $tashkilotrahbari->update($data);

        return redirect('/tashkilotrahbari')->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');

    }


    public function destroy(TashkilotRahbari $tashkilotrahbari)
    {
        $tashkilotrahbari->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');

    }

    public function tashkilotrahbarilar()
    {
        $tashkilot_rahbarilar =  TashkilotRahbari::paginate(20);
        return view("admin.tashkilotrahbari.tashkilotrahbarilar",['tashkilot_rahbarilar'=>$tashkilot_rahbarilar]);
    }
}
