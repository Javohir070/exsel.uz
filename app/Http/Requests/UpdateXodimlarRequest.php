<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateXodimlarRequest extends FormRequest
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
            'fish' => ['required','max:600', 'regex:/^[A-Za-z\s\-\'\.]+$/'],
            'jinsi' => 'required|max:255',
            'yil' => 'required|max:255',
            'ish_tartibi' => 'required|max:1024',
            'shtat_birligi' => 'required|max:255',
            'urindoshlik_asasida' => 'nullable|max:1024',
            'pedagoglik' => 'required|max:255',
            'lavozimi' => 'required|max:1024',
            'malumoti' => 'nullable|max:1024',
            'uzbek_panlar_azosi' => 'nullable|max:1024',
            'ilmiy_daraja' => 'nullable|max:500',
            'ilmiy_daraja_yil' => 'nullable|max:255',
            'ilmiy_unvoni' => 'nullable|max:255',
            'ilmiy_unvoni_y' => 'nullable|max:255',
            'ixtisosligi' => 'nullable|max:1024',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
        ];
    }
}
