<?php

namespace App\Http\Requests;

use App\Models\IlmiyLoyiha;
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
            'ilmiyloyiha_id' => 'nullable|exists:ilmiy_loyihas,id',
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
            $hasIlmiyLoyiha = $this->filled('ilmiyloyiha_id');

            if (!$hasLaboratory && !$hasKafedra && !$hasAsbob && !$hasIlmiyLoyiha) {
                $validator->errors()->add(
                    'ilmiyloyiha_id',
                    'Laboratoriya, kafedra, asbob-uskuna yoki ilmiy loyiha tanlanishi kerak.'
                );
            }

            $selectedTypes = (int) $hasLaboratory + (int) $hasKafedra + (int) $hasAsbob + (int) $hasIlmiyLoyiha;
            if ($selectedTypes > 1) {
                $validator->errors()->add(
                    'ilmiyloyiha_id',
                    'Faqat bitta tur (laboratoriya, kafedra, asbob-uskuna yoki ilmiy loyiha) tanlanishi kerak.'
                );
            }

            if ($hasIlmiyLoyiha) {
                $belongsToTashkilot = IlmiyLoyiha::where('id', $this->ilmiyloyiha_id)
                    ->where('tashkilot_id', auth()->user()->tashkilot_id)
                    ->exists();

                if (!$belongsToTashkilot) {
                    $validator->errors()->add(
                        'ilmiyloyiha_id',
                        'Tanlangan ilmiy loyiha sizning tashkilotingizga tegishli emas.'
                    );
                }
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
        if ($this->filled('ilmiyloyiha_id')) {
            return ['Ilmiy_loyiha_rahbari'];
        }

        return [];
    }
}
