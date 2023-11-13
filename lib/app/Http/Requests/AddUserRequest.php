<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name'=> 'nullable|required',
            'email'=> 'nullable|required|email|unique:customer,cus_email',
            'password' => 'sometimes|required|between:6,20|confirmed'
        ];

        
    }

    public function messages(){
        return [
            'email.unique'=>'Gmail đã bị trùng',
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.email'=>'Email không hợp lệ',
            'password.required'=>'Mật không được để trống',
            'password.between'=>' Mật khẩu phải có từ 6 đến 20 ký tự.',
            'password.confirmed'=>' Nhập mật khẩu lại không chính xác.'
        ];

    }
    
}
