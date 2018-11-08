<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBlogRequest extends FormRequest
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
            'blogPage' => 'required',
            'homeRef' => 'required',
            'blogRef' => 'required',
            'searchPlaceholder' => 'required',
            'categoriesTitle' => 'required',
            'instaTitle' => 'required',
            'tagsTitle' => 'required',
            'quoteTitle' => 'required',
            'quoteDesc' => 'required',
            'addTitle' => 'required',
            'newsletterTitle' => 'required',
            'newsletterPlaceholder' => 'required',
            'newsletterButton' => 'required',
            'copyright' => 'required',
            'copyrightName' => 'required',
            'addImage' => 'nullable|file',
        ];
    }
}
