<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdaterecordRequest extends FormRequest
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
            'blood_pressure_rate' => 'nullable|numeric',
            'heart_rate' => 'nullable|numeric',
            'respiratory_rate' => 'nullable|numeric',
            'saturation_rate' => 'nullable|numeric',
            'story' => 'nullable|string',
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
            'diagnosis'=> 'nullable|string',
            'medicinal_analysis'=> 'nullable|string',
        ];
    }
    public function messages(){
        return [
            "required" => "this field is required",
            'numeric' => "this field should be a numeric",
        ];
    }
}
