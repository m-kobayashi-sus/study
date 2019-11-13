<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEmployee extends FormRequest
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
            'name' => 'required|between:2,20',
            'mail' => 'required|max:50',
            'bef_pass' => 'required|between:8,64|alpha_num|',
            'aft_pass' => 'required|between:8,64|alpha_num|',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください。',
            'name.between' => '名前は2文字以上20文字以内で入力してください。',
            'mail.required' => 'メールアドレスを入力してください。',
            'mail.max' => 'メールアドレスは50文字以内の半角英数記号で入力してください。',
            'bef_pass.*' => 'パスワード(変更前)は8文字以上64文字以内の半角英数記号で入力してください。',
            'aft_pass.*' => 'パスワード(変更後)は8文字以上64文字以内の半角英数記号で入力してください。',
       ];
    }
}
