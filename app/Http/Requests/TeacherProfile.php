<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherProfile extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string',
            // 'email' => 'required|email',
            'profile_picture'=>'required|mimes:png,jpg,jpeg',
            'address'=>'required|string',
            'current_school' => 'nullable|string',
            'previous_school' => 'nullable|string',
            'experience' =>'required|string',
            'expertise_in_subject'=>'required|string'
        ];
    }
}
