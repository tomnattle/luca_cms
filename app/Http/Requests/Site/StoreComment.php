<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
            'func_id' => 'required|min:8',
            'content'=> 'required|min:2|max:6144',
            'site_id' => 'required|integer',
            'target_id' => 'required|integer',
            'up_id' => 'required|min:0|max:20',
        ];
    }

    public function messages()
    {   
        return [
            'content.required' => '内容不能为空',
            'content.min' => '内容至少包含2个以上的字符',
            'content.max' => '内容超过最大上限6144个字符',
            'up_id.required' => 'up_id参数为必填',
        ];
    }
}
