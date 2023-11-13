<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            // 'gmail'=>'unique:customer,cus_email'.Auth::user()->cus_id.',cus_id',
            'email'=> 'required|email|unique:customer,cus_email,'.Auth::user()->cus_id.',cus_id',
            'name'=> 'required'

        ];
    }

    public function messages(){
        return [
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.unique'=>'Gmail đã bị trùng'
        ];

    }
}
