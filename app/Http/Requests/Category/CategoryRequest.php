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
            'category_name' => 'required|min:3|max:255|string|unique:categories,category_name,'.$this->id,
            'category_slug' => 'string|min:3|max:255|unique:categories,category_slug'.$this->id,
            'parent_cateogry_id' => 'nullable|exists:categories:id',
        ];
    }
}
