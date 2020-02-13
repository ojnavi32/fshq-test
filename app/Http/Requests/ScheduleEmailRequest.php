<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleEmailRequest extends FormRequest
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
            'from_name'         => 'required|string',
            'from_email'        => 'required|email',
            'to_name'           => 'required|string',
            'to_email'          => 'required|email',
            'message'           => 'required',
        ];
    }
}
