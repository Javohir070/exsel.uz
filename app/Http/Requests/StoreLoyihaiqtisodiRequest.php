<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoyihaiqtisodiRequest extends FormRequest
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
        // 'ilmiy_loyiha_id'=>'required|',
        'hisobot_davri'=>'required|',
        'hisobot_davri_i'=>'nullable|',
        'loyihabaj_ishlanma'=>'required|',
        'loyihabaj_ishlanma_i'=>'nullable|',
        'ilmiy_ishlanmalar'=>'required|',
        'ilmiy_ishlanmalar_i'=>'nullable|',

        'mehnat_haq_r'=>'required|',
        'mehnat_haq_i'=>'nullable|',
        'mehnat_haq_a'=>'required|',
        'xizmat_saf_r'=>'required|',
        'xizmat_saf_i'=>'nullable|',
        'xizmat_saf_a'=>'required|',
        'xarid_xaraja_r'=>'required|',
        'xarid_xaraja_i'=>'nullable|',
        'xarid_xaraja_a'=>'required|',
        'mat_butlovchi_r'=>'required|',
        'mat_butlovchi_i'=>'nullable|',
        'mat_butlovchi_a'=>'required|',
        'jalb_etilgan_r'=>'required|',
        'jalb_etilgan_i'=>'nullable|',
        'jalb_etilgan_a'=>'required|',
        'boshqa_xarajat_r'=>'required|',
        'boshqa_xarajat_i'=>'nullable|',
        'boshqa_xarajat_a'=>'required|',
        'tashustama_xarajat_r'=>'required|',
        'tashustama_xarajat_i'=>'nullable|',
        'tashustama_xarajat_a'=>'required|',
        'xarid_qilingan_xarid'=>'required|',
        'xarid_qilingan_i'=>'nullable|',
        'xarid_sh'=>'nullable|',
        'xarid_r'=>'nullable|',
        'xarid_s'=>'nullable|',
        'yetkb_yuridik_nomi'=>'nullable|',
        ];
    }
}
