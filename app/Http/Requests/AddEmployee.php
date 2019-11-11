<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployee extends FormRequest
{
    protected $redirect = 'staff_reg';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'staff_check')
        {
            return true;
        } else {
            return false;
        }
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
                'pass' => 'required|between:8,64|alpha_num',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください。',
            'name.between' => '名前は2文字以上20文字以内で入力してください。',
            'mail.required' => 'メールアドレスを入力してください。',
            'mail.max' => 'メールアドレスは50文字以内の半角英数記号で入力してください。',
            'pass.*' => 'パスワードは8文字以上64文字以内の半角英数記号で入力してください。',
        ];
    }
}
