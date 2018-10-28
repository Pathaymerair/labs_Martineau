<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditContactRequest extends FormRequest
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
        'contactPage' => 'required',
        'homeRef' => 'required',
        'contactRef' => 'required',
        'placeholderName' => 'required', 
        'placeholderMail' => 'required', 
        'placeholderSubject' => 'required', 
        'placeholderMsg' => 'required',
        'mailButton' => 'required',
        'contactTitle' => 'required', 
        'contactDesc' => 'required', 
        'contactInfo' => 'required', 
        'contactAdress' => 'required', 
        'contactAdressDeux' => 'required', 
        'contactPhone' => 'required',
        'contactMail' => 'required', 
        'copyright' => 'required',
        'copyrightName' => 'required', 
        ];
    }
}
