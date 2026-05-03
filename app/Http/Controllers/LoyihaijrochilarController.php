<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Models\Loyihaijrochilar;
use App\Support\IlmiyIdApiClient;
use Illuminate\Http\Request;

class LoyihaijrochilarController extends Controller
{
    public function index(Request $request)
    {
        abort(404);
    }

    public function store(Request $request)
    {
        $ilmiyloyiha = IlmiyLoyiha::findOrFail($request->ilmiy_loyiha_id);
        $scienceid = $request->scienceid ?? null;
        $data = null;
        $errorMessage = null;

        if ($scienceid) {
            $response_main = IlmiyIdApiClient::userByScienceId($scienceid);
            if ($response_main === null) {
                $errorMessage = 'Science ID API uchun .env faylida ILMIY_ID_API_USERNAME va ILMIY_ID_API_PASSWORD sozlang.';
            } else {
                $data = $response_main->json();

                if (isset($data['detail'])) {
                    $errorMessage = 'Bunday Science ID raqamiga ega  foydalanuvchisi mavjud emas.';
                    $data = null;
                }
            }
        }

        $create = Loyihaijrochilar::create([
            'user_id' => auth()->id(),
            'tashkilot_id' => $ilmiyloyiha->tashkilot_id,
            'ilmiy_loyiha_id' => $ilmiyloyiha->id,
            'fio' => $request->fio,
            'science_id' => $request->science_id,
            'shtat_birligi' => $request->shtat_birligi == 'boshqa' ? $request->boshqa_shtat_birligi : $request->shtat_birligi,
            'jshshir' => $request->jshshir,
        ]);

        return redirect()
            ->route('ilmiyloyiha.show', $request->ilmiy_loyiha_id)
            ->with('status', 'Loyiha ijrochisi muvaffaqiyatli qo‘shildi.');
    }

    public function destroy(Loyihaijrochilar $loyihaijrochilar)
    {
        $loyihaijrochilar->delete();

        return redirect()->back()->with('status', 'Loyiha ijrochisi o‘chirildi');
    }

    public function updateBYBirth_date()
    {
        if (! IlmiyIdApiClient::configured()) {
            return redirect()->back()->with(
                'status',
                'Science ID API kalitlari sozlanmagan: .env ga ILMIY_ID_API_USERNAME va ILMIY_ID_API_PASSWORD qo‘shing.'
            );
        }

        $batchSize = 100;

        Loyihaijrochilar::where('birth_date', null)->chunk($batchSize, function ($loyihaijrochilars) {
            foreach ($loyihaijrochilars as $loyihaijrochi) {
                $response_main = IlmiyIdApiClient::userByScienceId((string) $loyihaijrochi->science_id);
                if ($response_main === null) {
                    continue;
                }

                $data = $response_main->json();

                if (isset($data['detail'])) {
                    $data = null;
                }

                $birthDate = is_array($data) ? ($data['birth_date'] ?? null) : null;

                $loyihaijrochi->update([
                    'birth_date' => $birthDate,
                ]);

                usleep(100 * 1000);
            }
        });

        return redirect()->back()->with('status', 'Loyiha ijrochilari yangilandi.');
    }
}
