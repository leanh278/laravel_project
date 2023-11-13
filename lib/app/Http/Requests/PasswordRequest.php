<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'password' => 'sometimes|required|between:6,20|confirmed'

        ];
    }
    public function messages(){
        return [
            'password.required'=>'Mật không được để trống',
            'password.between'=>' Mật khẩu phải có từ 6 đến 20 ký tự.',
            'password.confirmed'=>' Nhập mật khẩu lại không chính xác.'
        ];

    }
}
