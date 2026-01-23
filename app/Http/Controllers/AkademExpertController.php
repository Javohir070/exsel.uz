<?php

namespace App\Http\Controllers;

use App\Exports\AkademExpertExport;
use App\Http\Requests\StoreAkademExpertRequest;
use App\Http\Requests\UpdateAkademExpertRequest;
use App\Models\Akadem;
use App\Models\AkademExpert;
use App\Models\Monitoring;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class AkademExpertController extends Controller
{
    public $monitoring;

    public function __construct()
    {
        $this->monitoring = Monitoring::getActive();
    }


    public function store(StoreAkademExpertRequest $request)
    {
        $user = User::where('group_id', '=', auth()->user()->group_id)->role('Ekspert')->first();

        $data = $request->validated();

        $data['user_id'] = auth()->id();
        $data['quarter'] = $this->monitoring->id;
        $data['year'] = $this->monitoring->year;
        $data['fish'] = $user->name ?? auth()->user()->name;
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;

        AkademExpert::create($data);

        return redirect()->back()->with('status', 'Akadem Expert record created successfully.');
    }


    public function edit($id)
    {
        $akademExpert = AkademExpert::findOrFail($id);
        $akadem = Akadem::findOrFail($akademExpert->akadem_id);
        
        return view('admin.akadem.edit', compact('akademExpert', 'akadem'));
    }


    public function update(UpdateAkademExpertRequest $request, $id)
    {
        $akademExpert = AkademExpert::findOrFail($id);

        if ($request->holati == 1) {
            $akademExpert->update([
                'holati' => 'Rad etildi',
            ]);
        } else {
            $data = $request->validated();

            $akademExpert->update($data);
        }

        return redirect()->route('akadem.show', ['akadem' => $akademExpert->akadem_id])
            ->with('status', 'Akadem Expert record updated successfully.');
    }


    public function destroy($id)
    {
        AkademExpert::find($id)->delete();

        return redirect()->back()->with('status', 'Malumot o\'chirildi');
    }


    public function exportAkademExpert()
    {
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', '300');

        return Excel::download(new AkademExpertExport(), 'monitoring_akadem.xlsx');
    }
}
