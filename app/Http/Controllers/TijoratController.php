<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTijoratRequest;
use App\Http\Requests\UpdateTijoratRequest;
use App\Imports\TijoratImport;
use App\Models\Region;
use App\Models\Tijorat;
use App\Models\TijoratExpert;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class TijoratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index(Request $request)
    {
        $tijorat = Tijorat::query();
        if ($request->filled('viloyat') && $request->input('viloyat') !== 'all') {
            $tijorat->where('region_id', $request->input('viloyat'));
        }

        $tijorat = $tijorat->paginate(20);
        $regions = Region::all();
        return view('admin.tijorat.index', compact('tijorat', 'regions'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(StoreTijoratRequest $request)
    {
        //
    }

    
    public function show(Tijorat $tijorat)
    {
        $tijoratexpert = TijoratExpert::where('tijorat_id', $tijorat->id)->get();
        return view('admin.tijorat.show', compact('tijorat', 'tijoratexpert'));
    }

    
    public function edit(Tijorat $tijorat)
    {
        //
    }

    
    public function update(UpdateTijoratRequest $request, Tijorat $tijorat)
    {
        //
    }

   
    public function destroy(Tijorat $tijorat)
    {
        //
    }


    public function tijorat_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);


        Excel::import(new TijoratImport, $request->file('file'));

        return back()->with('status', 'Fayl muvaffaqiyatli yuklandi!');
    }
}
