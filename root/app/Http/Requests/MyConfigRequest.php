<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class MyConfigRequest extends Request
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
        if(Input::has('country')){
            return ['country'=>'required|unique:countries'];
        }elseif(Input::has('designation')){
            return ['designation'=>'required|unique:designations'];
        }elseif(Input::has('city')){
            return ['city'=>'required|unique:cities'];
        }elseif(Input::has('state')){
            return ['state'=>'required|unique:states'];
        }elseif(Input::has('brand')){
            return ['brand'=>'required|unique:brands'];
        }elseif(Input::has('model')){
            return ['model'=>'required|unique:models'];
        }elseif(Input::has('name')){
            return ['name'=>'required|unique:business_types'];
        }
    }
}
