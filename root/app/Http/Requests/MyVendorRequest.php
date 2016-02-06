<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MyVendorRequest extends Request
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
            'vid'=>'required',
            'name'=>'required',
            'phone'=>'required|integer',
            'email'=>'email',
            'contact_phone'=>'integer',
            'contact_email'=>'email',
            //'logo'=>'max:1000|mimes:jpg,jpeg,png'
        ];
    }
}
