<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubmissionRequest extends FormRequest
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
            'approval_release' => 'required|array',
            'approval_release.*'  => [
                'required',
                'string',
                'distinct',
                'exists:users,id',
            ],
            'status' => 'required|exists:workflow_statuses,slug',
            'note_release' => 'required|string|max:500',
            'signature' => 'required',
        ];
    }
}
