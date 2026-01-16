<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonografiyalarRequest extends FormRequest
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
            'name' => 'required|string|max:600',
            'nashr_yili' => 'required|integer',
            'chop_etil_nashriyot' => 'required|string|max:600',
            'til' => 'required|string|max:50',
            'fan_yunalishi' => 'required|string|max:600',
            'asoslovchi_hujjat' => 'required|file|max:2048', // Fayl tekshiruvi
            'kbk' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|max:50',
            'mualliflar_json' => 'required|array', // JSON uchun array tipda keladi
        ];
    }
}
