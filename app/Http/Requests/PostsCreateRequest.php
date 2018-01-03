<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsCreateRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
     * @return array
     */
    public function rules()
    {
        return [
            //

            'photo_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please select category',
            'photo_id.required' => 'Please select Photo',
            'title.required' => 'Please type in title',
            'body.required' => 'Please write in something'


        ];
    }
}
