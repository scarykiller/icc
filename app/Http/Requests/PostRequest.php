<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titre' => 'required|max:80',
            'contenu' => 'required',
			'tags' => ['Regex:/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/']


        ];
    }

}