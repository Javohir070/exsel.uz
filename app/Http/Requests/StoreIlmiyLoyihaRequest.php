<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIlmiyLoyihaRequest extends FormRequest
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
            'tashkilot_id' => 'nullable|exists:tashkilots,id',
            'mavzusi' => 'required|string|max:2024',
            'turi' => 'required|string|max:1024',
            'dastyri' => 'required|string|max:255',
            'muddat' => 'required|string|max:255',
            'bosh_sana' => 'required|date',
            'tug_sana' => 'required|date|after_or_equal:bosh_sana',
            'rahbar_name' => 'required|string|max:1024',
            'raqami' => 'required|string|unique:ilmiy_loyihas,raqami|max:255',
            'pan_yunalish' => 'nullable|string|max:1024',
            'sanasi' => 'nullable|date',
            'sum' => 'nullable|string|max:255',
            'q_hamkor_tashkilot' => 'nullable|string|max:1024',
            'hamkor_davlat' => 'nullable|string|max:1024',
            'olingan_natija' => 'nullable|string|max:3600',
            'joriy_holati' => 'nullable|string|max:1023',
            'tijoratlashtirish' => 'nullable|string|max:255',
            'moliyalashtirilganmi' => 'nullable|string|max:255',
        ];
    }
}
