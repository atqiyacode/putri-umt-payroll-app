<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|max:150',
            'division' => 'required|exists:divisions,id',
            'group' => 'required|exists:groups,id',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'nip' => 'required|string|unique:user_details,nip,' . auth()->user()->detail->id,
            'phone' => 'required|unique:user_details,phone,' . auth()->user()->detail->id,
        ];
    }
}
