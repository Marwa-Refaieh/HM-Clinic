<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateappointmentRequest extends FormRequest
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
            'phone_number' => 'nullable | string',
            'gender' => 'nullable | string',
            'marital_status' => 'nullable | string',
            'address' => 'nullable | string',
            'birth' => 'nullable|date_format:m/d/Y',
            'date' => 'nullable|date_format:m/d/Y',
            'time'  => 'nullable|date_format:H:i',
            'pricing' => 'nullable|numeric',
        ];
    }
    public function messages(){
        return [
            "min" => "this field is short",
            "max" => "this field is long",
            'numeric' => "this field should be a numeric",
            "date_format:H:i" => "The time does not match the format H:i.",
            "date_format" => "The date does not match the format m/d/Y. ",
        ];
    }
}
