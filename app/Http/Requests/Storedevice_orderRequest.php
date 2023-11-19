<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storedevice_orderRequest extends FormRequest
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
            'record_id' => 'nullable|numeric',
            'device_id' => 'required|numeric',
            'secretary_id' => 'numeric|required_if:record_id,null',
            'fname' => 'string|required_if:record_id,null',
            'lname' => 'string|required_if:record_id,null',
            'phone_number' => 'string|required_if:record_id,null',
            'status' => 'nullable|numeric',
        ];
    }
    public function messages(){
        return [
            "required" => "this field is required",
        ];
    }

}
