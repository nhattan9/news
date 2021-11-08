<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
                    'email'=>'required|email|exists:admins,email',
                    'password'=>'required|min:5|max:30',
                    
                ];
                
            }
    public function messages()
        {
            return [
                'email.exists' => "Email chưa được đăng kí sử dung ",
                'email.required' => "Emial không được để trống ",
                'email.email' => "Email phải có dạng admin@gmail.com",

                'password.required' => "Mật khẩu không được phép trống ",
                'password.min' => "Mật khẩu phải có ít nhất 5 kí tự ",
                'password.max' => "Mật khẩu không vượt quá 12 kí tự ",
            ];
        }
}