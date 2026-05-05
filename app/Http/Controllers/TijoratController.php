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

    
    public function create(Request $request)
    {
        if (! $request->user()->hasRole('super-admin')) {
            abort(403);
        }
        $regions = Region::all();

        return view('admin.tijorat.create', compact('regions'));
    }

    
    public function store(StoreTijoratRequest $request)
    {
        $data = $request->validated();
        $region = Region::find($data['region_id']);
        $data['region'] = $region->oz ?? $region->name ?? '';

        $data['user_id'] = $request->user()->id;
        $data['tashkilot_id'] = $request->user()->tashkilot_id ?: 1;

        Tijorat::create($data);

        return redirect()->route('tijorat.index', $request->query())->with('status', 'Tijorat loyihasi qo‘shildi.');
    }

    
    public function show(Tijorat $tijorat)
    {
        $tijoratexpert = TijoratExpert::where('tijorat_id', $tijorat->id)->get();
        return view('admin.tijorat.show', compact('tijorat', 'tijoratexpert'));
    }

    
    public function edit(Request $request, Tijorat $tijorat)
    {
        if (! $request->user()->hasRole('super-admin')) {
            abort(403);
        }
        $regions = Region::all();

        return view('admin.tijorat.edit', compact('tijorat', 'regions'));
    }

    
    public function update(UpdateTijoratRequest $request, Tijorat $tijorat)
    {
        $data = $request->validated();
        $region = Region::find($data['region_id']);
        $data['region'] = $region->oz ?? $region->name ?? '';

        $tijorat->update($data);

        return redirect()->route('tijorat.index', $request->query())->with('status', 'Tijorat loyihasi yangilandi.');
    }

   
    public function destroy(Tijorat $tijorat)
    {
        $tijorat->delete();

        return redirect()->route('tijorat.index')->with('status', 'Tijorat loyihasi o‘chirildi.');
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
