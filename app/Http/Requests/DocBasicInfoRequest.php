<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocBasicInfoRequest extends FormRequest
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
             'degree' =>'required',
             'phone' => 'required|numeric|min:8',
             'dob' => 'required|date',
             'address' =>'required|max:500',
             'about' =>'max:500',
             'image' =>'image|max:1000|mimes:jpeg,jpg,png'
         ];
     }

     public function messages(){
       return [
         'dob.required' => 'The date of birth field is required.',
       ];
     }
}
