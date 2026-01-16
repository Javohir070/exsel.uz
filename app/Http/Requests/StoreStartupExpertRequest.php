<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStartupExpertRequest extends FormRequest
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
            'startup_id' => 'required|exists:startups,id',
            'loyiha_yolga_qoyilgan' => 'required|string',
            'loyiha_yolga_qoyilgan_izox' => 'required|string',
            'daromadga_erishilgan' => 'required|string',
            'daromadga_erishilgan_izox' => 'required|string',
            'inventar_kirim_qilingan' => 'required|string',
            'inventar_kirim_qilingan_izox' => 'required|string',
            'inventar_joyida_mavjud' => 'required|string',
            'inventar_joyida_mavjud_izox' => 'required|string',
            'inventar_parametr_mosligi' => 'required|string',
            'inventar_parametr_mosligi_izox' => 'required|string',
            'xodimlar_soni' => 'required|string',
            'amalda_xodim_soni' => 'required|string',
            'shartnoma_mavjudligi' => 'required|string',
            'shartnoma_mavjudligi_izox' => 'required|string',
            'status' => 'required|string',
            'comment' => 'required|string',
            'holati' => 'required|string',
            't_masul' => 'required|string',
            'ekspert_fish' => 'required|string'
        ];
    }
}
