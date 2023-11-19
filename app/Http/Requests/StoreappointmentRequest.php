<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreappointmentRequest extends FormRequest
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
            'phone_number' => 'required | string',
            'gender' => 'required | string',
            'marital_status' => 'required | string',
            'address' => 'required | string',
            'birth' => 'required|date_format:m/d/Y',
            'date' => 'required|date_format:m/d/Y',
            'time'  => 'required|date_format:H:i',
            'doctor_id' => 'required|numeric',
            'user_id' => 'nullable|numeric',
            'pricing' => 'nullable|numeric',
            'remotely' => 'nullable|boolean',
            'email' => 'required_if:remotly,1 |email',
        ];
    }
    public function messages(){
        return [
            "required" => "this field is required",
            "min" => "this field is short",
            "max" => "this field is long",
            'numeric' => "this field should be a numeric",
            "date_format:H:i" => "The time does not match the format H:i.",
            "date_format" => "The date does not match the format m/d/Y.",
        ];
    }
}
