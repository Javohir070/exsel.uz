<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreAdminUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'laboratory_id' => 'nullable|exists:laboratories,id',
            'kafedralar_id' => 'nullable|exists:kafedralars,id',
            'asbobuskuna_id' => 'nullable|exists:asbobuskunas,id',
        ];
    }

    /**
     * Configure the validator: kamida bitta "masul" turi tanlangan bo'lishi kerak.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $hasLaboratory = $this->filled('laboratory_id');
            $hasKafedra = $this->filled('kafedralar_id');
            $hasAsbob = $this->filled('asbobuskuna_id');

            if (!$hasLaboratory && !$hasKafedra && !$hasAsbob) {
                $validator->errors()->add(
                    'laboratory_id',
                    'Laboratoriya, kafedra yoki asbob-uskunaga masul shaxs tanlanishi kerak.'
                );
            }

            // Bir nechta tur bir vaqtda yuborilmasin
            if ((int) $hasLaboratory + (int) $hasKafedra + (int) $hasAsbob > 1) {
                $validator->errors()->add(
                    'laboratory_id',
                    'Faqat bitta tur (laboratoriya, kafedra yoki asbob-uskuna) tanlanishi kerak.'
                );
            }
        });
    }

    /**
     * Tanlangan tur bo'yicha rolni qaytaradi.
     */
    public function getResolvedRoles(): array
    {
        if ($this->filled('laboratory_id')) {
            return ['labaratoriyaga_masul'];
        }
        if ($this->filled('kafedralar_id')) {
            return ['kafedra_mudiri'];
        }
        if ($this->filled('asbobuskuna_id')) {
            return ['Asbob_uskunalarga_masul'];
        }
        return [];
    }
}
