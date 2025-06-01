<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_img' => 'required|file',
            'main_img' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо заполнить',
            'content.required' => 'Это поле необходимо заполнить',
            'preview_img.required' => 'Это поле необходимо заполнить',
            'preview_img.file' => 'Необходимо выбрать файл',
            'main_img.required' => 'Это поле необходимо заполнить',
            'main_img.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо заполнить',
            'category_id.integer' => 'id категории должен быть числом',
            'category_id.exists' => 'id категории должен быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных'
        ];
    }
}
