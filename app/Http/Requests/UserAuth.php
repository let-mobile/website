<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuth extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'phone' => ['required','numeric','regex:/^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/'],
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ]
        ];
    }
    public function messages()

    {
        return [
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number formate (0300xxxxxxx) or (+92300xxxxxxx)',
            'phone.regex' => 'Phone number formate (0300xxxxxxx) or (+92300xxxxxxx)',
        ];

    }
}
