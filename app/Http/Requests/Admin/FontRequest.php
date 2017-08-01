<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FontRequest extends FormRequest
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
            'name'=>'required',
            'font_url'=>'required',
            'thumb_url'=>'required',
            'preview_url'=>'required',
            'language_id'=>'required',
            'download'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'字体名不能为空',
            'font_url.required'=>'请上传字体文件',
            'thumb_url.required'=>'请上传缩略图',
            'preview_url.required'=>'请上传预览图',
            'language_id.required'=>'请选择一个语种',
            'download.required'=>'字体下载量不能为空',
        ];
    }
}
