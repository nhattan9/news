<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
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
                'name' => 'bail|required|unique:categories|max:255',
               
            ];
    
    }

    public function messages()
{
    return [
        'name.required' => 'Tên không được để trống ',
        'name.unique' => 'Tên danh mục bị trùng  ',
        'name.max' => 'Tên không được vươt quá 255 kí tự',
    ];
}
}