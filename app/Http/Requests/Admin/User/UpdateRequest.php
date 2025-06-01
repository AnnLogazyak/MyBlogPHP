<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:users,name,' . $this->user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'nullable|string|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Это поле необходимо заполнить',
            'email.required' => 'Это поле необходимо заполнить',
            'email.email' => 'Формат не соответствует email',
            'email.unique' => 'Адрес не является уникальным',
            'password.required' => 'Это поле необходимо заполнить',
            'password.confirmed' => 'Пароль не совпадает'
        ];
    }
}
