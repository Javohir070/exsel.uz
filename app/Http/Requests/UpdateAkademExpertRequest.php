<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAkademExpertRequest extends FormRequest
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
            'kalendar_reja_monitoring' => 'nullable',
            'kalendar_reja_monitoring_izox' => 'nullable',
            'dalolatnoma_tuzilgan' => 'nullable',
            'dalolatnoma_tuzilgan_izox' => 'nullable',
            'hisobot_muhokama_qilingan' => 'nullable',
            'hisobot_muhokama_qilingan_izox' => 'nullable',
            'hisobot_agentlikka_taqdim' => 'nullable',
            'hisobot_agentlikka_taqdim_izox' => 'nullable',
            'status' => 'nullable',
            'quarter' => 'nullable',
            'comment' => 'nullable',
            't_masul' => 'nullable',
            'ekspert_fish' => 'nullable',
            'holati' => 'nullable',
        ];
    }
}
