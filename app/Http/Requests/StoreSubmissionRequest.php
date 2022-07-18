<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
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
            'requester' => 'required|string|max:144',
            'division' => 'required|exists:divisions,id',
            'group' => 'required|exists:groups,id',
            'unit' => 'required|exists:units,id',
            'tagCode' => 'required|array',
            'tagCode.*'  => [
                'required',
                'string',
                'distinct',
            ],
            'approval' => 'required|array',
            'approval.*'  => [
                'required',
                'string',
                'distinct',
                'exists:users,id',
            ],

            'name_of_parameter' => 'required|string|max:144',
            'other_parameter' => 'required|string|max:144',

            'duration' => 'required|exists:durations,label',

            'reason' => 'required|string|max:500',
            'impact' => 'required|string|max:500',
            'signature' => 'required',
        ];
    }
}
