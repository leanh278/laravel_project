<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contactRequest extends FormRequest
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
            'name'=> 'nullable|required',
            'email'=> 'nullable|required|email',
            'text' => 'nullable|required'
        ];
    }

    public function messages(){
        return [
            
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.email'=>'Email không hợp lệ',
            'text.required'=>'Nội dung không được để trống'
        ];

    }
}
