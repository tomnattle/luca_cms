<?php

namespace App\Http\Requests\Cms;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileFolder extends FormRequest
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
            'name' => 'required|min:2|max:30|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9]{2,16}$/u',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => '名称格式为中文英文或数字',
            'name.required' => '名称为必填',
            'name.min' => '名称不能少于2个字符',
            'name.max' => '名称不能超过30个字符',

        ];
    }
}
