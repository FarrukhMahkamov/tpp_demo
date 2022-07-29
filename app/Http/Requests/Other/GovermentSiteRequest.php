<?php

namespace App\Http\Requests\Other;

use Illuminate\Foundation\Http\FormRequest;

class GovermentSiteRequest extends FormRequest
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
            'goverment_site_title.uz' => 'required|min:3|max:255|string',
            'goverment_site_title.en' => 'required|min:3|max:255|string', 
            'goverment_site_title.ru' => 'required|min:3|max:255|string', 
            'goverment_site_title.уз' => 'required|min:3|max:255|string', 
             
            'goverment_site_link' => 'required|min:6',
            'goverment_site_file' => 'nullable'
        ];
    }
}
