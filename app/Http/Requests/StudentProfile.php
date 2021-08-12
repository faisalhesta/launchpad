<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentProfile extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'profile_picture'=>'required|mimes:png,jpg,jpeg',
            'address'=>'required|string',
            'current_school' => 'nullable|string',
            'previous_school' => 'nullable|string',
            'parents_details' =>'required|string',
        ];
    }
}
