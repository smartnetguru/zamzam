<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * @property mixed eid
 */
class EmployeeRequest extends Request
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
            'eid' => 'required|max:255',
            'name' => 'required|max:40|min:4',
            'salary' => 'integer',
            'ot_rate' => 'integer',
            'phone' => 'numeric',
            'reference_phone' => 'numeric',
            'email' => 'email',
            //'image' => 'mimes:jpg,jpeg,png|max:1000'
        ];
    }
}
