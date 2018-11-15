<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditHomeRequest extends FormRequest
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
       
        'slogan' => 'required',
        'introSlogan' => 'required', 
        'overIntroSlogan' => 'required', 
        'introSloganDeux' => 'required', 
        'introUn' => 'required',
        'introDeux' => 'required', 
        'introButton' => 'required', 
        'youtubeLink' => 'required', 
        'testiTitle' => 'required',
        'servicesTitle' => 'required', 
        'overServicesTitle' => 'required', 
        'servicesTitleDeux' => 'required', 
        'servicesButton' => 'required',
        'teamTitle' => 'required',
        'overTeamTitle' => 'required', 
        'teamTitleDeux' => 'required', 
        'promoTitle' => 'required',
        'promoDesc' => 'required', 
        'promoButton' => 'required', 
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
        'logo' => 'nullable',
        'userAdmin' => 'nullable',
        ];
    }
}
