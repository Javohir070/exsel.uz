<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use App\Models\Monitoring;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MonitoringController extends Controller
{
    
    public function index()
    {
        $monitorings = Monitoring::orderBy('year', 'desc')
            ->orderBy('quarter', 'desc')
            ->paginate(15);

        return view('admin.monitoring.index', ['monitorings' => $monitorings]);
    }

    
    public function create()
    {
        return view('admin.monitoring.create');
    }

    
    public function store(StoreMonitoringRequest $request)
    {
        $data = $request->validated();
        
        // Ensure is_active has a default value if not provided
        $data['is_active'] = $request->has('is_active') ? (bool) $request->is_active : true;

        Monitoring::create($data);

        return redirect()->route('monitorings.index')
            ->with('status', 'Monitoring muvaffaqiyatli saqlandi');
    }

    
    public function show(Monitoring $monitoring)
    {
        return view('admin.monitoring.show', ['monitoring' => $monitoring]);
    }

    
    public function edit(Monitoring $monitoring)
    {
        return view('admin.monitoring.edit', ['monitoring' => $monitoring]);
    }

    
    public function update(UpdateMonitoringRequest $request, Monitoring $monitoring)
    {
        $data = $request->validated();
        
        // Ensure is_active has a default value if not provided
        $data['is_active'] = $request->has('is_active') ? (bool) $request->is_active : false;

        $monitoring->update($data);

        return redirect()->route('monitorings.index')
            ->with('status', 'Monitoring muvaffaqiyatli yangilandi');
    }

    
    public function destroy(Monitoring $monitoring)
    {
        $monitoring->delete();

        return redirect()->route('monitorings.index')
            ->with('status', 'Monitoring muvaffaqiyatli o\'chirildi');
    }
}
