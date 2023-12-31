<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreuserRequest extends FormRequest
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
            'email' => 'required | string | email | unique:users,email,|',
            'password' => 'required | string | min:9',
        ];
    }

    public function messages(){
        return [
            "required" => "this field is required",
            "min" => "this field is short",
            "max" => "this field is long",
            "email" => "the email is uncorrect",
            "email.unique" => "the email is available",
        ];
    }
}
