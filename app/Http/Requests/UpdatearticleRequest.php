<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatearticleRequest extends FormRequest
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
            'title' => 'nullable |string | min:3',
            'author_name' => 'nullable |string | min:3',
            'author_photo'  => 'nullable |mimes:png,jpg,jpeg,bmp,gif',
            'definition'  => 'nullable |string', 
            'symptoms' => 'nullable |string',
            'risk_factor' => 'nullable |string',
            'treatment' => 'nullable |string',
            'when' => 'nullable |string',
            'misconceptions' => 'nullable |string',
            'image' => 'nullable|mimes:png,jpg,jpeg,bmp,gif',
            'category_id' => 'nullable|numeric',
        ];
    }

    public function messages(){
        return [
            "required" => "this field is required",
            "min" => "this field is short",
            "mimes" => "not supported this mimes",
        ];
    }
}
