<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTijoratExpertRequest extends FormRequest
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
        return [
            'media_zip' => 'required|file|mimes:zip|max:10480',
            'tijorat_id' => 'required|exists:tijorats,id',
            'grant_sarf_maqsadli' => 'required|in:0,1',
            'grant_sarf_maqsadli_izox' => 'nullable|required_if:grant_sarf_maqsadli,0|string',
            'asbob_balans_olingan' => 'required|in:0,1',
            'asbob_balans_olingan_izox' => 'nullable|required_if:asbob_balans_olingan,0|string',
            'xodimlar_lozim' => 'required|string',
            'xodimlar_haqiqiy' => 'required|in:0,1',
            'xodimlar_haqiqiy_izox' => 'nullable|required_if:xodimlar_haqiqiy,0|string',
            'mahsulot_miqdori' => 'required|string',
            'mahsulot_olchov' => 'required|string',
            'sotuv_hajmi' => 'required|string',
            'eksport_hajmi' => 'required|string',
            'soliq_tolov' => 'required|string',
            'hisobot_topshirildi_izox' => 'required|string',
            'sertifikat_olingan' => 'required|in:0,1',
            'sertifikat_olingan_izox' => 'nullable|required_if:sertifikat_olingan,0|string',
            'loyiha_muammo' => 'required|in:0,1',
            'loyiha_muammo_izox' => 'nullable|required_if:loyiha_muammo,0|string',
            'loyiha_taklif' => 'required|in:0,1',
            'loyiha_taklif_izox' => 'nullable|required_if:loyiha_taklif,0|string',
            'kalendar_bajarilgan' => 'required|string',
            'status' => 'required|string',
            'comment' => 'required|string',
            'holati' => 'required|string',
            't_masul' => 'required|string',
            'ekspert_fish' => 'required|string'
        ];
    }
}
