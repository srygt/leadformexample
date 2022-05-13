<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'        => 'nullable|numeric|exists:App\Models\LeadForm,id',
            'fullname'  => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'address'   => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'fullname'   => 'Please enter your name and surname',
            'email'      => 'Please enter your email address',
            'phone'      => 'Please enter your phone number',
            'address'    => 'Please enter your address',
        ];
    }    
}
