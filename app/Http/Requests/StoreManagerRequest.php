<?php

namespace App\Http\Requests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManagerRequest extends FormRequest
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
            'email'=>'required|unique:users|email',
            'password'=>'required|min:6',
            'national_id'=>'required|unique:users',
            //'image'=>'mimes:jpg,jpeg',
            'city_id'=>'required|exists:cities,id'
        ];
    }

}
