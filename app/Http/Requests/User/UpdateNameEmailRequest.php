<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNameEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|min:3',
            'email' => 'email',

        ];
    }
    public function messages()
    {
        return [
            'name.min' => 'Имя должно имять минимум 3 символа',
            'name.email' => 'Введите верный email',
        ];
    }
}
