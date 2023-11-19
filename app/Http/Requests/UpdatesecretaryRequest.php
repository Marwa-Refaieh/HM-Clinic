<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesecretaryRequest extends FormRequest
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
            'fname' => 'nullable | string | min:3 | max:256',
            'lname' => 'nullable | string | min:3 | max:256',
            'email' => 'nullable | string | email | unique:doctors,email,| unique:admins,email, |unique:paramedics,email,|unique:secretaries,email,',
            'password' => 'nullable | string | min:9',
            'phone_number' => 'nullable | string',
            'birth' => 'nullable|date',
            'photo' => 'nullable | mimes:png,jpg,jpeg,bmp,gif',
            'gender'  => 'nullable | string',
        ];
    }
    public function messages(){
        return [
            "min" => "this field is short",
            "max" => "this field is long",
            "email" => "the email is uncorrect",
            "email.unique" => "the email is available",
            'numeric' => "this field should be a numeric",
            "mimes" => "this extention is unsupported",
        ];
    }
}
