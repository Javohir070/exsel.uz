<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTijoratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasRole('super-admin');
    }

    protected function prepareForValidation(): void
    {
        foreach (['summa', 'tash_summasi'] as $key) {
            if (! $this->has($key)) {
                continue;
            }
            $v = str_replace(["\xc2\xa0", ' '], '', (string) $this->input($key));
            $v = preg_replace('/[^\d.]/', '', $v);
            $parts = explode('.', $v, 3);
            $v = $parts[0] ?? '';
            if ($v !== '' && array_key_exists(1, $parts) && $parts[1] !== '') {
                $v .= '.'.preg_replace('/\D/', '', $parts[1]);
            }
            if ($v === '.') {
                $v = '';
            }
            $this->merge([$key => $v]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'region_id' => 'required|exists:regions,id',
            'name' => 'required|string|max:600',
            'loyiha_rahbari' => 'required|string|max:600',
            'ijrochi_tashkilot' => 'required|string|max:600',
            'summa' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d+)?$/'],
            'tash_summasi' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d+)?$/'],
            'turi' => 'required|string|max:600',
            'yar_ish_urni' => 'required|string|max:600',
            't_soha' => 'required|string|max:600',
            'q_soha' => 'required|string|max:600',
            'm_asosi' => 'required|string|max:600',
        ];
    }

    public function attributes(): array
    {
        return [
            'summa' => 'Summasi (ming soʻmda)',
            'tash_summasi' => 'Tashabbuskor mablagʻi (ming soʻmda)',
        ];
    }

    public function messages(): array
    {
        return [
            'summa.numeric' => 'Summasi faqat raqam bo‘lishi kerak (harflar kiritilmaydi).',
            'summa.regex' => 'Summasi faqat raqam bo‘lishi kerak (harflar kiritilmaydi).',
            'tash_summasi.numeric' => 'Tashabbuskor mablagʻi faqat raqam bo‘lishi kerak (harflar kiritilmaydi).',
            'tash_summasi.regex' => 'Tashabbuskor mablagʻi faqat raqam bo‘lishi kerak (harflar kiritilmaydi).',
        ];
    }
}
