<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePremiumRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mobile_name'=>'required',
            'created_at'=>'required'
        ];
    }
}
