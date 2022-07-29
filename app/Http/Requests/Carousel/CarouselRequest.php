<?php

namespace App\Http\Requests\Carousel;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
            'carousel_title.en' => 'nullable|min:3|max:255|string',
            'carousel_title.uz' => 'required|min:3|max:255|string',
            'carousel_title.ru' => 'required|min:3|max:255|string',
            'carousel_title.уз' => 'nullable|min:3|max:255|string',
            'carousel_file' => 'nullable',
            'carousel_link' => 'required|min:6|string',
            'carousel_number' => 'required|integer'
        ];
    }
}
