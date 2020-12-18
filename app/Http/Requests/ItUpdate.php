<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItUpdate extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required|string|min:3',
            'no_handphone' => 'required|string|min:7',
            'password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8'
        ];
    }
}
