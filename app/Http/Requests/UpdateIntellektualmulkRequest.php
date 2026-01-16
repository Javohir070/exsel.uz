<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIntellektualmulkRequest extends FormRequest
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
            'mavzu' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'nashr_sana' => 'required|date',
            'soni' => 'required|integer',
            'annotatsiya' => 'required|string',
            'fan_yunalishi' => 'required|string|max:255',
            'mualliflar_json' => 'required|array', // JSON maydon
            'mualliflar_json.*' => 'string', // JSON maydon ichidagi har bir element string bo'lishi kerak
        ];
    }
}
