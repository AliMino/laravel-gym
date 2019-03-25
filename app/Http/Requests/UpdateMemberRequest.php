<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'password' => 'required|confirmed|min:6|max:20',
            'gender' => 'in:male,female',
            'profile_img' => 'required',
            'date_of_birth' => 'required|date_format:Y-m-d',
        ];
    }
}
