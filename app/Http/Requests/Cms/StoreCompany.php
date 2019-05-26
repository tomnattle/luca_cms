<?php

namespace App\Http\Requests\Cms;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreCompany extends FormRequest
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
            'email' => 'min:1|max:255|email',
            'name' => 'max:256|min:1',
            'password' => 'max:45|min:6|confirmed|different:password_old',
            'role' => 'integer',
            'short_desc' => 'max:1024|min:1',
            'desc' =>  'max:65535|min:1',
            'qualification' => 'max:1024|min:1',
            'qq' => 'max:45|min:1',
            'telephone' => 'max:45|min:1',
            'fax' => 'max:45|min:1',
            'wechat' => 'max:45|min:1',
            'addr' => 'max:500|min:1',
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

}




