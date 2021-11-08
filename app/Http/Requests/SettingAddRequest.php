<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key'  => 'bail|required|unique:settings|max:255',
            'config_value' => 'required',
   
        ];
    }

    //custominzing 
    public function messages()
{
    return [
        'config_key.required' =>  'Tên config_key không được rỗng',
        'config_key.unique' =>    'Tên config_key bị trùng',
        'config_key.max' =>  'Tên config_key không được quá 255 kí tự ',

        'config_value.required' => 'config_value không được rỗng',

    ];
}
}