<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storedoctor_dayRequest extends FormRequest
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
            'doctor_id' => 'required|numeric',
            'day_id' => 'required|numeric',
            'start_time' => 'required|date_format:H:i',
            'end_time'=> 'required|date_format:H:i|after:time_start',
        ];
    }

    public function messages(){
        return [
            "required" => "this field is required",
            'numeric' => "this field should be a numeric",
            'end_time.after' => 'The end time must be greater than start time.',
            "date_format:H:i" => "The time does not match the format H:i."
        ];
    }
}
