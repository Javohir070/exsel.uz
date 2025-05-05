<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIlmiyLoyihaRequest extends FormRequest
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
            'olingan_natija'=> 'nullable|max:3600',
            'joriy_holati'=> 'nullable|max:1023',
            'mavzusi' => "nullable|max:2024",
            'turi' => "nullable|max:1024",
            'q_hamkor_tashkilot' => "nullable|max:1024",
            'hamkor_davlat' => "nullable|max:1024",
            'dastyri' => "nullable|max:255",
            'muddat' => "nullable|max:255",
            'bosh_sana' => "nullable|max:255",
            'tug_sana' => "nullable|max:255",
            'pan_yunalish' => "nullable|max:1024",
            'rahbar_name' => "nullable|max:1024",
            'sanasi' => "nullable|max:255",
            'sum' => "nullable|max:255",
            'tijoratlashtirish' => "nullable|max:255",
            'file' => 'nullable|file|max:20480', // 20MB = 20480 KB
            'umumiy_mablag' => 'nullable|file|max:10480', // 20MB = 20480 KB
            'savolnoma' => 'nullable|file|max:20480', // 20MB = 20480 KB
            'malumotnoma' => 'nullable|file|max:20480', // 20MB = 20480 KB
        ];
    }
}
