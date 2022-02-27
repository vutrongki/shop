<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required*',
            'price.required' => 'The price is required*',
            'category_id.required' => 'The category is required*',
            'content.required' => 'The content is required*',
        ];
    } 
}
