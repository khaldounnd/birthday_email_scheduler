<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = \request('id');
        return [
            'first_name' => 'bail|required|alpha_spaces',
            'surname' => 'bail|required|alpha_spaces',
            'email' => 'bail|required|email|unique:employees,email,'. $id,
            'birth_date' => 'bail|required|date',
        ];
    }
}
