<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'title'=>'required|min:6|max:25',
            'content'=>'required|min:25'
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'标题不能为空',
            'title.min'=>'标题长度不小于6个字符',
            'title.max'=>'标题长度不达于25个字符',
            'content.required'=>'内容不能为空',
            'content.min'=>'内容长度不小于25个字符'
        ];
    }
}
