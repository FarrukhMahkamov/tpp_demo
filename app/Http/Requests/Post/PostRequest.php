<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post_title.uz' => 'required|min:3|max:255|string',
            'post_title.уз' => 'required|min:3|max:255|string',
            'post_title.en' => 'required|min:3|max:255|string',
            'post_title.ru' => 'required|min:3|max:255|string',

            'post_body.uz' => 'required|min:3|max:200000|string',
            'post_body.уз' => 'required|min:3|max:200000|string',
            'post_body.en' => 'required|min:3|max:200000|string',
            'post_body.ru' => 'required|min:3|max:200000|string',

            'category_id' => 'nullable|exists:categories,id|integer',
            'active_category_id' => 'nullable|exists:active_categories,id|integer',
        ];
    }
}
