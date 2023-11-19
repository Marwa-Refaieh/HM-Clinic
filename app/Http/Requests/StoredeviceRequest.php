<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredeviceRequest extends FormRequest
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
            'name' => 'required | string | min:3 | max:256',
            'image' => 'required | mimes:png,jpg,jpeg,bmp,gif',
            'description' => 'required | string | min:3 | max:256',
            'price'=> 'required | numeric',
        ];
    }
    public function messages(){
        return [
            "required" => "this field is required",
            "min" => "this field is short",
            "max" => "this field is long",
            'numeric' => "this field should be a numeric",
            "mimes" => "this extention is unsupported",
        ];
    }
}
