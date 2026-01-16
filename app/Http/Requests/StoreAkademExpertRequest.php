<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAkademExpertRequest extends FormRequest
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
            'akadem_id' => 'required|exists:akadem,id',
            'kalendar_reja_monitoring' => 'required|max:255',
            'kalendar_reja_monitoring_izox' => 'nullable|max:600',
            'dalolatnoma_tuzilgan' => 'required|max:255',
            'dalolatnoma_tuzilgan_izox' => 'nullable|max:600',
            'hisobot_muhokama_qilingan' => 'required|max:255',
            'hisobot_muhokama_qilingan_izox' => 'nullable|max:600',
            'hisobot_agentlikka_taqdim' => 'required|max:255',
            'hisobot_agentlikka_taqdim_izox' => 'nullable|max:600',
            'status' => 'required|max:255',
            'comment' => 'required|max:255',
            't_masul' => 'required|max:255',
            'ekspert_fish' => 'required|max:255',
            'holati' => 'required|max:255',
        ];
    }
}
