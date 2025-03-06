<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskunafile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsbobuskunafileController extends Controller
{
    public function index()
    {
        $asbobuskunafile = Asbobuskunafile::paginate(20);

        return view('admin.asbobuskuna.asbobuskunafile', ['asbobuskunafile' => $asbobuskunafile]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240'
        ]);
        if($request->hasFile('file')){
            $name_file = time().$request->file('file')->getClientOriginalName();
            $path_file = $request->file('file')->storeAs('xujalik-file', $name_file);
        }

        Asbobuskunafile::create([
            "user_id" => auth()->id(),
            "tashkilot_id" => auth()->user()->tashkilot_id,
            'file' => $path_file ?? null,
        ]);

        return redirect()->back()->with('status',"Ma\'lumotlar muvaffaqiyatli qo'shildi.");

    }

    public function destroy(Asbobuskunafile $asbobuskunafile)
    {
        if ($asbobuskunafile->file) {
            Storage::delete($asbobuskunafile->file);
        }
        $asbobuskunafile->delete();

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli o\'chirildi.');
    }
}
