<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTashkilotRahbariRequest extends FormRequest
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
                'u_fish' => ['required', 'regex:/^[A-Za-z\s\-\'\.]+$/'],
                'email' => 'required|max:255',
                'phone' => 'required|max:255',
                'u_email' => 'required|max:255',
                'u_phone' => 'required|max:255',

        ];
    }

    public function messages()
    {
        return [

            'fish.regex' => 'BU :attribute faqat lotin hariflar bolishi shart.',
            'u_fish.regex' => 'BU :attribute faqat lotin hariflar bolishi shart.',
        ];
    }
}
