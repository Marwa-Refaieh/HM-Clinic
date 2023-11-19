<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreparamedicRequest extends FormRequest
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
            'fname' => 'required | string | min:3 | max:256',
            'lname' => 'required | string | min:3 | max:256',
            'email' => 'required | string | email | unique:doctors,email,| unique:admins,email, |unique:paramedics,email,|unique:secretaries,email,',
            'password' => 'required | string | min:9',
            'phone_number' => 'required | string',
            'birth' => 'required|date_format:m/d/Y',
            'photo' => 'required | mimes:png,jpg,jpeg,bmp,gif',
            'gender'  => 'required | string',
            'car_number' => 'required | numeric',
        ];
    }
    public function messages(){
        return [
            "required" => "this field is required",
            "min" => "this field is short",
            "max" => "this field is long",
            "email" => "the email is uncorrect",
            "email.unique" => "the email is available",
            'numeric' => "this field should be a numeric",
            "mimes" => "this extention is unsupported",
            "date_format" => "The date does not match the format m/d/Y.",
        ];
    }
}
