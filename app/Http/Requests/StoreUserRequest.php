<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|exists:roles,id',
            'nip' => 'required|unique:user_details,nip|numeric',
            'phone' => 'required|unique:user_details,phone|numeric',
            'division' => 'required|exists:divisions,id',
            'group' => 'required|exists:groups,id',
            'password' => 'required|min:8|confirmed',
        ];
    }
}
