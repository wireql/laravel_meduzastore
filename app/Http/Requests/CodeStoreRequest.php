<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeStoreRequest extends FormRequest
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
            'email' => ["required", "email"],
            'g-recaptcha-response' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле должно быть обязательно заполненно.',
            'email.email' => 'Некорректная запись почты.',
            'g-recaptcha-response.required' => 'Нажмите на галочку "Я не робот".',
        ];
    }
}
