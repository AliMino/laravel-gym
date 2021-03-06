<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
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
            'email' => 'required|email|unique:members',
            'password' => 'required|confirmed|min:6|max:20',
            'gender' => 'in:male,female',
            'profile_img' => 'required|image|mimes:jpg,jpeg',
            'date_of_birth' => 'required|date_format:Y-m-d',

        ];
    }
}
