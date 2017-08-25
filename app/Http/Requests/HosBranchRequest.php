<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HosBranchRequest extends FormRequest
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
            'name'=>'required|string|min:2|max:191',
            'email'=>'required|email|min:3|max:191',
            'phone'=>'required|numeric|min:8',
            'address'=>'required|min:3',
            'about'=>'required|min:3',
        ];
    }
}
