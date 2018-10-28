<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditServicesRequest extends FormRequest
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
         'servicesPage' => 'required',
         'homeRef' => 'required',
         'servicesRef' => 'required',
         'servicesTitle' => 'required',
         'overServicesTitle' => 'required',
         'servicesTitleDeux' => 'required',
         'servicesButton' => 'required',
         'introSlogan' => 'required',
         'overIntroSlogan' => 'required',
         'introSloganDeux' => 'required',
         'introButton' => 'required',
         'newsletterTitle' => 'required',
         'newsletterPlaceholder' => 'required',
         'newsletterButton' => 'required',
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
