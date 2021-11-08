<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
        // bail : khi validate dkien dau bị loi thi in ra  loi roi ko check tiep 
        return [
            'email'        => 'bail|required|email|unique:users|max:255|min:10',
            'name' => 'required',
            'password'=>'required',
            'role_id' => 'required',
        ];
    }

    //custominzing 
    public function messages()
{
    return [
        'email.required' =>  'Tên email không được rỗng',
        'email.unique' =>    'Tên email bị trùng',
        'email.max' =>  'Tên email không được quá 255 kí tự ',
        'email.min' =>  'Tên email không được ít hơn 10 kí tự ',


        'name.required' => 'Tên không được rỗng',
        'password.required' => 'Password không được rỗng',
        'role_id.required' => 'Quyền không được rỗng',


    ];
}
}