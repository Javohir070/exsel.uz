<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTashkilotRequest extends FormRequest
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
            'name' => ['required', 'regex:/^[A-Za-z\s\-\'\.]+$/'],
            'stir_raqami' => 'required|unique:tashkilots,stir_raqami',
            'id_raqam' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.regex' => 'BU :attribute faqat lotin hariflar bolishi shart.',
            'id_raqam' => 'BU :attribute soz bazada bor.',
        ];
    }
}
