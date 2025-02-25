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
            'raqami' => 'required|unique:ilmiy_loyihas|max:255',
            'olingan_natija'=> 'required|max:3600',
            'joriy_holati'=> 'required|max:1023',
            'mavzusi' => "required|max:2024",
            'turi' => "required|max:1024",
            'q_hamkor_tashkilot' => "nullable|max:1024",
            'hamkor_davlat' => "nullable|max:1024",
            'dastyri' => "required|max:255",
            'muddat' => "required|max:255",
            'bosh_sana' => "required|max:255",
            'tug_sana' => "required|max:255",
            'pan_yunalish' => "required|max:1024",
            'rahbar_name' => "required|max:1024",
            'sanasi' => "required|max:255",
            'sum' => "required|max:255",
            'tijoratlashtirish' => "required|max:255",
            'file' => 'required|file|max:20480', // 20MB = 20480 KB
            'savolnoma' => 'required|file|max:20480', // 20MB = 20480 KB
            'malumotnoma' => 'required|file|max:20480', // 20MB = 20480 KB
        ];
    }
}
