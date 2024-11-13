<?php

namespace App\Http\Controllers;

use App\Imports\IzlanuvchilarImport;
use App\Models\Izlanuvchilar;
use App\Http\Requests\StoreIzlanuvchilarRequest;
use App\Http\Requests\UpdateIzlanuvchilarRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class IzlanuvchilarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $izlanuvchilar = Izlanuvchilar::where('laboratory_id', auth()->user()->laboratory_id)->paginate(20);
        $tashkilot_izlanuvchilar = Izlanuvchilar::where("tashkilot_id",auth()->user()->tashkilot_id)->get();
        
        return view("admin.izlanuvchilar.index", ["izlanuvchilar"=> $izlanuvchilar, "tashkilot_izlanuvchilar" => $tashkilot_izlanuvchilar]);
    }

    public function ilmiy_izlanuvchilar()
    {
        $izlanuvchilar = Izlanuvchilar::paginate(25);

        return view("admin.izlanuvchilar.izlanvuchilar", ["izlanuvchilar" => $izlanuvchilar]);
    }

    public function ilmiy_izlanuvchi()
    {
        $izlanuvchilar = Izlanuvchilar::where("tashkilot_id",auth()->user()->tashkilot_id)->paginate(20);

        return view("admin.izlanuvchilar.adminizlanuvchi", ["izlanuvchilar"=> $izlanuvchilar]);
    }


    public function giveIzlanuvchilarToLab(Request $request)
    {
            // Formdan kelgan xodimlar ID larini olish
        $izlanuvchilarId = $request->input('izlanuvchilarId', []);

        // Foydalanuvchining laboratory_id sini oling
        $laboratoryId = auth()->user()->laboratory_id;
        
        // Tanlangan IDlarga tegishli xujaliklarni yangilash
        if (!empty($izlanuvchilarId)) {
            Izlanuvchilar::whereIn('id', $izlanuvchilarId)->update([
                'laboratory_id' => $laboratoryId,
            ]);
        }

        // Muvaffaqiyatli yangilanganini bildirish uchun qaytish
        return redirect()->back()->with('status', 'Xujaliklar muvaffaqiyatli yangilandi!');

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.izlanuvchilar.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIzlanuvchilarRequest $request)
    {
        

        Izlanuvchilar::create([
            "user_id" => auth()->user()->id,
            "tashkilot_id" => auth()->user()->tashkilot_id,
            "laboratory_id" => auth()->user()->laboratory_id,
            "fish" => $request->fish, 
            "jshshir" => $request->jshshir, 
            "pasport_seriya" => $request->pasport_seriya, 
            "jinsi" => $request->jinsi, 
            "talim_turi" => $request->talim_turi, 
            "ixtisoslik" => $request->ixtisoslik, 
            "qabul_qilgan_yil" => $request->qabul_qilgan_yil, 
            "mavzusi" => $request->mavzusi, 
            "phone" => $request->phone, 
            "loyihada_ishtiroki" => $request->loyihada_ishtiroki, 
            "stir" => $request->stir, 
        ]);

        return redirect()->route("izlanuvchilar.index")->with("status",'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Izlanuvchilar $izlanuvchilar)
    {
        return view("admin.izlanuvchilar.show", ["izlanuvchilar" => $izlanuvchilar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Izlanuvchilar $izlanuvchilar)
    {
        return view("admin.izlanuvchilar.edit", ["izlanuvchilar"=> $izlanuvchilar]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIzlanuvchilarRequest $request, Izlanuvchilar $izlanuvchilar)
    {
        $izlanuvchilar->update($request->toArray());

        return redirect()->route("izlanuvchilar.index")->with("status",'Ma\'lumotlar muvaffaqiyatli yangilandi.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Izlanuvchilar $izlanuvchilar)
    {
        $izlanuvchilar->delete();

        return redirect()->back()->with('status','Ma\'lumotlar muvaffaqiyatli o"chirildi.');
    }

    public function emport_izlanuvchi(Request $request)
    {
        $fileName = time() . '-' . $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        Excel::import(new IzlanuvchilarImport, $request->file('file'));

        return redirect()->back()->with('status', 'Xodimlar muvaffaqiyatli yuklandi!');
        
    }
}
