<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStartupRequest;
use App\Http\Requests\UpdateStartupRequest;
use App\Imports\StartupImport;
use App\Models\Region;
use App\Models\Startup;
use App\Models\StartupExpert;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StartupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index(Request $request)
    {
        $startup = Startup::query();

        if ($request->filled('viloyat') && $request->input('viloyat') !== 'all') {
            $startup->where('region_id', $request->input('viloyat'));
        }

        $startup = $startup->latest()->paginate(20);
        $regions = Region::all();
        return view('admin.startup.index', compact('startup', 'regions'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(StoreStartupRequest $request)
    {
        //
    }

    
    public function show(Startup $startup)
    {
        $startupexpert = StartupExpert::where('startup_id', $startup->id)->get();
        return view('admin.startup.show', compact('startup', 'startupexpert'));
    }

    
    public function edit(Startup $startup)
    {
        //
    }

    public function update(UpdateStartupRequest $request, Startup $startup)
    {
        //
    }

   
    public function destroy(Startup $startup)
    {
        //
    }


    public function startup_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);


        Excel::import(new StartupImport, $request->file('file'));

        return back()->with('status', 'Fayl muvaffaqiyatli yuklandi!');
    }
}
