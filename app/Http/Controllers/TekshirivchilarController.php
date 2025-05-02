<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Models\Tekshirivchilar;
use App\Models\User;
use App\Notifications\IlmiyloyihaNotification;
use Illuminate\Http\Request;
use App\Exports\TekshirivchilarExport;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;

class TekshirivchilarController extends Controller
{
    public function store(Request $request)
    {
        $ilmiyloyiha = IlmiyLoyiha::findOrFail($request->ilmiyloyiha_id);
        $user = User::where('region_id', '=', auth()->user()->region_id)->role('Ekspert')->first();
        $tekshirivchilar = Tekshirivchilar::create([
            'user_id' => auth()->id(),
            'tashkilot_id' => $ilmiyloyiha->tashkilot_id,
            'ilmiy_loyiha_id' => $request->ilmiyloyiha_id,
            'fish' => $user->name,
            'ekspert_fish' => $request->ekspert_fish,
            't_masul' => $request->t_masul,
            "status" => $request->status,
            "comment" => $request->comment,
            'is_active' => 1,
            'kalendar' => $request->kalendar,
            'shart_sharoit_yaratib' => $request->shart_sharoit_yaratib,
            'yakuniy_natijalar' => $request->yakuniy_natijalar,
            'loyiha_ijrochilari' => $request->loyiha_ijrochilari,
        ]);

        Notification::send($user, new IlmiyloyihaNotification($tekshirivchilar));

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    public function exportilmiyloyiha()
    {
        $fileName = 'Ilmiyloyiha2024' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new TekshirivchilarExport, $fileName);
    }

    public function update(Request $request, Tekshirivchilar $tekshirivchilar)
    {

        if ($request->holati == 0) {
            $tekshirivchilar->update([
                'holati' => 'rad etildi',
            ]);
            $admins =User::findOrFail($tekshirivchilar->user_id);
            Notification::send($admins, new IlmiyloyihaNotification($tekshirivchilar));
            return redirect()->back()->with('status', 'Ma\'lumotlar rad etildi.');
        } else {
            $user = User::where('region_id', '=', auth()->user()->region_id)->role('Ekspert')->first();
            $tekshirivchilar->update([
                'user_id' => auth()->id(),
                'fish' => $user->name,
                'ekspert_fish' => $request->ekspert_fish,
                't_masul' => $request->t_masul,
                "status" => $request->status,
                "comment" => $request->comment,
                'is_active' => 1,
                'kalendar' => $request->kalendar,
                'shart_sharoit_yaratib' => $request->shart_sharoit_yaratib,
                'yakuniy_natijalar' => $request->yakuniy_natijalar,
                'loyiha_ijrochilari' => $request->loyiha_ijrochilari,
                'holati' => 'yuborildi',
            ]);

            Notification::send($user, new IlmiyloyihaNotification($tekshirivchilar));
            return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
        }
    }

    public function destroy(Tekshirivchilar $tekshirivchilar)
    {
        $tekshirivchilar->delete();
        return redirect()->back()->with('status', 'Dalolatnoma muvaffaqiyatli o‘chirildi.');
    }
}
