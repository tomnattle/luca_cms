<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoragServerUpload extends FormRequest
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
            'qqfile' => 'required|dimensions:max_width=3000,max_height=4000,min_width=1;min_height=1'
        ];
    }

    public function messages(){
        return [
            'qqfile.require' => '图片为必填项',
            'qqfile.dimensions' => '上传的长4000像素，高3000像素',
        ];
    }
}
