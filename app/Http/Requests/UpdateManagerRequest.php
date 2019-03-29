<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManagerRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users,email,' . $this->user->email,
            'national_id'=>'required|unique:users,national_id,' . $this->user->id,
            //'image'=>'image|mimes:jpg,jpeg',
            //'city_id'=>'required|exists:cities,id'
        ];
    }
}
