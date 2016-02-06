<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientRequest extends Request
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
            'cid'=>'required',
            'name'=>'required|max:40',
            'client_phone'=>'numeric',
            'client_email'=>'email',
            'contact_phone'=>'numeric',
            'contact_email'=>'email',
            'bill'=>'integer',
            'ot'=>'integer',
            'agreement_from'=>'date',
            'agreement_to'=>'date',
            //'logo'=>'mimes:jpg,jpeg,png|max:1000'
        ];
    }
}
