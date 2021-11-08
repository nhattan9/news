<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleAddRequest extends FormRequest
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
            'title' => 'bail|required|max:255',
            'summary' =>'required|max:255',
            'category_id'=>'required',
            'content'=>'required',
            
        ];
    }
    public function messages(){
        return [
            'title.required' => 'Tên tiêu đề không được phép rỗng',
            'title.max' => 'Tên tiêu đề không được phép quá 255 kí tự ',
            'summary.required' => 'Tóm tắt tiêu đề không được phép rỗng',
            'category_id.required' => 'Danh mục không được phép rỗng',
            'content.required' => 'Nội dung không được phép rỗng',

        ];
    }
}