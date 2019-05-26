<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
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
            'old_password'=>'required|between:6,20',
            'password'=>'required|between:6,20|confirmed',
        ];
    }

    public function messages(){
        return [
            'old_password.required' => '原始密码不能为空',
            'password.required' => '新密码不能为空',
            'old_password.between' => '原始密码必须是6~20位之间',
            'password.between' => '新密码必须是6~20位之间',
            'confirmed' => '新密码和确认密码不匹配'
        ];
    }
}
