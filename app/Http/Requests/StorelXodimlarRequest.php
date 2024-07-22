<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorelXodimlarRequest extends FormRequest
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
            'fish' => ['required', 'regex:/^[A-Za-z\s\-\'\.]+$/'],
            'jshshir' => 'required|string|min:14|unique:xodimlars',
            'lavozimi' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [

            'fish.regex' => 'BU :attribute faqat lotin hariflar bolishi shart.',
            'jshshir' => 'BU :attribute soz bazada bor.',
        ];
    }
}
