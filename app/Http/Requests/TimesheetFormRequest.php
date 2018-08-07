<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimesheetFormRequest extends FormRequest
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
            'mon' => 'required',
            'tues' => 'required',
            'wed' => 'required',
            'thur' => 'required',
            'fri' => 'required',
            'sat' => 'required',
            'sun' => 'required'

        ];
    }
}
