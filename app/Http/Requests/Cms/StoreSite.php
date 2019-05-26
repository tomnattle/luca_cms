<?php

namespace App\Http\Requests\Cms;

use Illuminate\Foundation\Http\FormRequest;

class StoreSite extends FormRequest
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
            'tpl_id' =>  'numeric',
            'name' => 'required|max:45|min:2',
            'en_name' =>  'required|max:10|min:2|regex:/^[a-zA-Z0-9_]+$/',
            'password' => 'required|size:6',
            'desc' => 'required|max:255|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '网站主题为必填项',
            'name.max' => '网站主题最大长度为45个字符',
            'name.min' => '网站主题最小长度为2个字符',
            'en_name.required' => '英文名为必填项',
            'en_name.max' => '英文名最大长度为10个字符',
            'en_name.min' => '英文名最小长度为2个字符',
            'en_name.regex' => '英文名必须由字母/数字/_组成',
            'password.required' => '密码为必填项',
            'password.size' => '密码的长度为6个字符',
            'desc.required' => '描述信息为必填项',
            'desc.max' => '描述信息最大长度为45个字符',
            'desc.min' => '描述信息最小长度为2个字符',
        ];
    }
}
