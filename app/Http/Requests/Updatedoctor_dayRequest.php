<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatedoctor_dayRequest extends FormRequest
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
            'doctor_id' => 'nullable|numeric',
            'day_id' => 'nullable|numeric',
            'start_time' => 'nullable|date|date_format:H:i',
            'end_time'=> 'nullable|date|date_format:H:i|after:time_start',
        ];
    }

    public function messages(){
        return [
            'numeric' => "this field should be a numeric",
            'end_time.after' => 'The end time must be greater than start time.'
        ];
    }
}
