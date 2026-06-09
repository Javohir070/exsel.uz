<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTijoratExpertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->input('holati') == 1) {
            return [
                'holati' => 'required',
            ];
        }

        return [
                'media_zip' => 'nullable|file|mimes:zip|max:10480',
                'grant_sarf_maqsadli' => 'required|string',
                'grant_sarf_maqsadli_izox' => 'required|string',
                'asbob_balans_olingan' => 'required|string',
                'asbob_balans_olingan_izox' => 'required|string',
                'xodimlar_lozim' => 'required|string',
                'xodimlar_haqiqiy' => 'required|string',
                'xodimlar_haqiqiy_izox' => 'required|string',
                'mahsulot_miqdori' => 'required|string',
                'mahsulot_olchov' => 'required|string',
                'sotuv_hajmi' => 'required|string',
                'eksport_hajmi' => 'required|string',
                'soliq_tolov' => 'required|string',
                'hisobot_topshirildi_izox' => 'required|string',
                'sertifikat_olingan' => 'required|string',
                'sertifikat_olingan_izox' => 'required|string',
                'loyiha_muammo' => 'required|string',
                'loyiha_muammo_izox' => 'required|string',
                'loyiha_taklif' => 'required|string',
                'loyiha_taklif_izox' => 'required|string',
                'kalendar_bajarilgan' => 'required|string',
                'status' => 'required|string',
                'comment' => 'required|string',
                'holati' => 'required|string',
                't_masul' => 'required|string',
                'ekspert_fish' => 'required|string'
        ];
    }
}
