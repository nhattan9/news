<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'current_password'=> 'required',
            'new_password'=> 'required|min:5|max:12',
            'cpassword'=> 'required|same:new_password',
        ];
    }
    public function messages()
    {
        return [
            'current_password.required'=> 'Mật khẩu không được phép rỗng',
    
            'new_password.required'=> 'Mật khẩu không được phép rỗng',
            'new_password.min'=> 'Mật khẩu không được ít hơn 5 kí tự ',
            'new_password.max'=> 'Mật khẩu không được quá 12 kí tự ',
    
            'cpassword.required'=> 'Mật khẩu không được phép rỗng',
            'cpassword.same'=> 'Mật khẩu không khớp',
        ];
    }
}