<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'name' => 'min:2|max:10',
            'en_name' => 'min:2|max:10|regex:/^[a-zA-Z0-9_]+$/',
            'nick' => 'min:2|max:20',
            'address' => 'min:2|max:254',
            'born_address' => 'min:2|max:254',
            'major' => 'min:2|max:254',
            'school' => 'min:2|max:254',
            'age' => 'Integer',
            'sex' => 'in:0,1',
            'degree' => 'Integer',
            'marry' => 'in:0,1',
            'mail' => 'min:2|max:254',
            'weixin' => 'min:2|max:254',
            'phone' => 'min:2|max:254',
            'qq' => 'min:2|max:254',
            'language' => 'min:2|max:128',
        ];
    }
}
