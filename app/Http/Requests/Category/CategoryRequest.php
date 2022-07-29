<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_name.uz' => 'required|min:3|max:255|string',
            'category_name.en' => 'nullable|min:3|max:255|string',
            'category_name.ru' => 'nullable|min:3|max:255|string',
            'category_name.уз' => 'nullable|min:3|max:255|string',
            'parent_category_id' => 'nullable|exists:categories,id',
        ];
    }
}
