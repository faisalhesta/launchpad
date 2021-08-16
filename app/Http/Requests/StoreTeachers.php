<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',            
            'profile_picture'=>'required|mimes:png,jpg,jpeg',
            'address'=>'required|string',
            'current_school' => 'nullable|string',
            'previous_school' => 'nullable|string',
            'experience' =>'required|string',
            'expertise_in_subject'=>'required|string',
            'password' => 'required|string|min:8|confirmed'
        ];
    }
}
