<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class EditComment extends FormRequest
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
            'content'=> 'required|min:10|max:6144',
        ];
    }

    public function messages()
    {   
        return [
            'content.required' => '内容不能为空',
            'content.min' => '内容至少包含2个以上的字符',
            'content.max' => '内容超过最大上限6144个字符',
        ];
    }
}
