<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsbobuskunaExpertRequest extends FormRequest
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
            'ekspert_fish' => 'required|string|max:255',
            't_masul' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'comment' => 'nullable|string',
            'lab_uskunalarini_mosligi' => 'nullable|string',
            'ilmiy_tadqiqot_ishilari' => 'nullable|string',
            'ilmiy_tadqiqot_hajmi' => 'nullable|string',
            'lab_zaxirasi' => 'nullable|string',
            'foy_uchun_ariz' => 'nullable|string',
            'asbob_usk_ehtiyoji' => 'nullable|string',
            'zarur_ehtiyoji' => 'nullable|string',
            'lab_ishga_yaroqliligi' => 'nullable|string',
        ];
    }
}
