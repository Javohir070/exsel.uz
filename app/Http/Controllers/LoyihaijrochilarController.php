<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Models\Intellektual;
use App\Models\Loyihaijrochilar;
use App\Models\Loyihaiqtisodi;
use App\Models\Tekshirivchilar;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class LoyihaijrochilarController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
        return redirect()->back()->with('status', 'Loyiha ijrochisi o‘chirildi');
    }
    // public function index(Request $request)
    // {

    //     $sms_username = "PxNhTIvMGoVdUSFOsmfaVrc3fwb5HABmZ9Y4WLYb";
    //     $sms_password = "4JnUEYZ3rWBntf3Rxatl2bwQ8tepv06gmh5WkKCl0YNHc4C8I0wHms5oG4EkTvWz2wMAhqVliOTnZHwPXjKbv5jZufjEeS3WftD9hRPef7OclBUuesIixWKOSpus8zZm";
    //     $url_main = "https://api-id.ilmiy.uz/api/users/by-science-id/{$request->scienceid}/";
    //     $response_main = Http::withBasicAuth($sms_username, $sms_password)
    //         ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
    //         ->get($url_main);

    //     $data_tach = $response_main->json();

    //     return view('loyihaijrochilar', compact('data_tach'));
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'science_id' => 'required|unique:loyihaijrochilars,science_id',
        ], [
            'science_id.required' => 'Science ID majburiy!',
            'science_id.unique' => 'Bu Science ID bazada mavjud!',
        ]);

        $ilmiyloyiha = IlmiyLoyiha::findOrFail($request->ilmiy_loyiha_id);
        $scienceid = $request->scienceid ?? null;
        $intellektual = Intellektual::where('ilmiy_loyiha_id', '=', $ilmiyloyiha->id)->first();
        $loyihaiqtisodi = Loyihaiqtisodi::where('ilmiy_loyiha_id', '=', $ilmiyloyiha->id)->first();
        $tekshirivchilar = Tekshirivchilar::where('is_active', 1)->where('ilmiy_loyiha_id', '=', $ilmiyloyiha->id)->first();
        // $sms_username = "PxNhTIvMGoVdUSFOsmfaVrc3fwb5HABmZ9Y4WLYb";
        // $sms_password = "4JnUEYZ3rWBntf3Rxatl2bwQ8tepv06gmh5WkKCl0YNHc4C8I0wHms5oG4EkTvWz2wMAhqVliOTnZHwPXjKbv5jZufjEeS3WftD9hRPef7OclBUuesIixWKOSpus8zZm";
        // $url_main = "https://api-id.ilmiy.uz/api/users/by-science-id/{$scienceid}/";
        // $response_main = Http::withBasicAuth($sms_username, $sms_password)
        //     ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
        //     ->get($url_main);

        $data = null;
        $errorMessage = null;

        $shtat_sum = 0;


        if ($scienceid) {
            $url_main = "https://api-id.ilmiy.uz/api/users/by-science-id/{$scienceid}/";
            $response_main = Http::withBasicAuth(
                "PxNhTIvMGoVdUSFOsmfaVrc3fwb5HABmZ9Y4WLYb",
                "4JnUEYZ3rWBntf3Rxatl2bwQ8tepv06gmh5WkKCl0YNHc4C8I0wHms5oG4EkTvWz2wMAhqVliOTnZHwPXjKbv5jZufjEeS3WftD9hRPef7OclBUuesIixWKOSpus8zZm"
            )
                ->withOptions(["verify" => false])
                ->get($url_main);

            $data = $response_main->json();

            // Agar 'detail' mavjud bo'lsa, error message yaratamiz
            if (isset($data['detail'])) {
                $errorMessage = "Bunday Science ID raqamiga ega  foydalanuvchisi mavjud emas.";
                $data = null; // Ma'lumotni bekor qilamiz
            }
        }


        // $data = $response_main->json();
        $create = Loyihaijrochilar::create([
            'user_id' => auth()->id(),
            'tashkilot_id' => auth()->user()->tashkilot_id,
            'ilmiy_loyiha_id' => $request->ilmiy_loyiha_id,
            'fio' => $request->fio,
            'science_id' => $request->science_id,
            'shtat_birligi' => $request->shtat_birligi,
            'jshshir' => $request->jshshir,
        ]);

        $loyihaijrochilar = Loyihaijrochilar::where('ilmiy_loyiha_id', '=', $request->ilmiy_loyiha_id)->get();
        $shtat_sum = 0;
        foreach ($loyihaijrochilar as $loyihaijrochi) {
            $shtat_sum += $loyihaijrochi->shtat_birligi;
        }
        return redirect()
            ->route('ilmiyloyiha.show', $request->ilmiy_loyiha_id)
            ->with('status', 'Loyiha ijrochisi muvaffaqiyatli qo‘shildi.');
    }

    public function destroy(Loyihaijrochilar $loyihaijrochilar)
    {
        $loyihaijrochilar->delete();

        return redirect()->back()->with('status', 'Loyiha ijrochisi o‘chirildi');
    }

}
