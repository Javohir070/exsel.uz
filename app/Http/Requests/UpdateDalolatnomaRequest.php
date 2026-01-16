<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDalolatnomaRequest extends FormRequest
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
            'raqami' => 'required|string|max:20',
            'joyiye_obyekti' => 'required|string|max:600',
            'joyiye_maqsadi' => 'required|string|max:600',
            'joyiye_asos' => 'required|string|max:600',
            'joyiye_tashkilot' => 'required|string|max:600',
            'joyiye_tarmoq' => 'required|string|max:600',
            'asoslovchi_hujjat' => 'nullable|file|max:2048',
        ];
    }
}
