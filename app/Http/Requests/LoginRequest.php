<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>['required','string','email'],
            'password'=>['required', 'string' , 'min:9'],
        ];
    }

    public function messsages(){
        return [
            'required' => 'هذا الحقل مطلوب',
            'email.email' => 'ادخل عنوان بريد الكتروني صالح',
            'password.min' => 'يجب ان تحوي كلمة السر تسعة محارف على الاقل'
        ];
    }
}
