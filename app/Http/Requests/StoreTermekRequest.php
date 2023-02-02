<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTermekRequest extends FormRequest
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
            "nev" => "require|string|min:3|max:100",
            "ar" => "require|min:0",
        ];
    }

    public function messages()
    {
        return [
            "nev.require" => "A név mező kötelező",
        ];
    }
}
