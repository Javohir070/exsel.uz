<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAsbobuskunaExpertRequest extends FormRequest
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
                'ekspert_fish' => 'required|string',
                't_masul' => 'required|string',
                'status' => 'required|string',
                'comment' => 'required|string',
                'lab_uskunalarini_mosligi' => 'required|string',
                'ilmiy_tadqiqot_ishilari' => 'required|string',
                'ilmiy_tadqiqot_hajmi' => 'required|string',
                'lab_zaxirasi' => 'required|string',
                'foy_uchun_ariz' => 'required|string',
                'asbob_usk_ehtiyoji' => 'required|string',
                'zarur_ehtiyoji' => 'required|string',
                'lab_ishga_yaroqliligi' => 'required|string',
        ];
    }
}
