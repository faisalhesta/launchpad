<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherProfile;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function update_profile(TeacherProfile $request)
    {
          User::where('id','=',auth()->user()->id)->update(['name'=>$request->name]);
          $data = $request->all();
          unset($data['name']);
          $fileName = time().'.'.$request->profile_picture->extension();
          $request->profile_picture->move(public_path('uploads/teachers/'), $fileName);
          $data['profile_picture'] = $fileName;
          $data['user_id'] = auth()->user()->id;
          Teacher::updateOrCreate(['user_id'=>auth()->user()->id
          ],$data);
          return redirect()->back()->withSuccess("Profile Updated Successfully!");
    }

    public function list()
    {
        $teachers = User::where('user_type','1')->paginate();
        return view('teachers.list',compact('teachers'));
    }

    public function approve($id)
    {
       User::where('id',$id)->update(['email_verified_at'=>now()]);
       return redirect()->back()->withSuccess("User Profile Approved Successfully!");

    }
}
