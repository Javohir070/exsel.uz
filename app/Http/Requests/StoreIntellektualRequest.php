<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIntellektualRequest extends FormRequest
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
     * @return array<integer, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|integer>
     */
    public function rules(): array
    {
        return [
            'mal_jur_reja' => 'required|integer',
            'mal_jur_amalda' => 'required|integer',
            'xor_jur_reja' => 'required|integer',
            'xor_jur_amalda' => 'required|integer',
            'web_jur_reja' => 'required|integer',
            'web_jur_amalda' => 'required|integer',
            'tezislar_reja' => 'required|integer',
            'tezislar_amalda' => 'required|integer',
            'ilmiy_mon_reja' => 'required|integer',
            'ilmiy_mon_amalda' => 'required|integer',
            'darslik_reja' => 'required|integer',
            'darslik_amalda' => 'required|integer',
            'b_bitiruv_mreja' => 'required|integer',
            'b_bitiruv_mamalda' => 'required|integer',
            'm_bitiruv_dreja' => 'required|integer',
            'm_bitiruv_damalda' => 'required|integer',
            'p_bitiruv_dreja' => 'required|integer',
            'p_bitiruv_damalda' => 'required|integer',
            'i_mulk_areja' => 'required|integer',
            'i_mulk_aamalda' => 'required|integer',
            'ixtiro_olingan_psreja' => 'required|integer',
            'ixtiro_olingan_psamalda' => 'required|integer',
            'ixtiro_ber_psreja' => 'required|integer',
            'ixtiro_ber_psamalda' => 'required|integer',
            'dasturiy_gsreja' => 'required|integer',
            'dasturiy_gsamalda' => 'required|integer',
            'nashr_uquv_reja' => 'required|integer',
            'nashr_uquv_amalda' => 'required|integer'
        ];
    }
}
