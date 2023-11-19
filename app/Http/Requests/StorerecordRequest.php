<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorerecordRequest extends FormRequest
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
            'appointment_id' => 'required|numeric',
            'blood_pressure_rate' => 'required|numeric',
            'heart_rate' => 'required|numeric',
            'respiratory_rate' => 'required|numeric',
            'saturation_rate' => 'required|numeric',
            'story' => 'required|string',
            'blood_pressure' => 'nullable|boolean',
            'asthma' => 'nullable|boolean',
            'diabetes' => 'nullable|boolean',
            'heart_disease' => 'nullable|boolean',
            'renal_disease' => 'nullable|boolean',
            'tumors' => 'nullable|boolean',
            'medicinal_history' => 'nullable|string',
            'surgical_history'=> 'nullable|string',
            'headache'=> 'nullable|boolean',
            'chest_pain'=> 'nullable|boolean',
            'cough'=> 'nullable|boolean',
            'dizziness'=> 'nullable|boolean',
            'dyspnea'=> 'nullable|boolean',
            'abdominal_pain'=> 'nullable|boolean',
            'constipation'=> 'nullable|boolean',
            'vomiting'=> 'nullable|boolean',
            'arthralgia'=> 'nullable|boolean',
            'diarhea'=> 'nullable|boolean',
            'diagnosis'=> 'required|string',
            'medicinal_analysis'=> 'nullable|string',
            'device_id' => 'nullable|numeric',
        ];
    }

    public function messages(){
        return [
            "required" => "this field is required",
            'numeric' => "this field should be a numeric",
        ];
    }
}
