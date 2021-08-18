<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeachers;
use App\Http\Requests\TeacherProfile;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

class TeachersController extends Controller
{

    public function store(StoreTeachers $request)
    {
        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type'=> '2',
            'password' => Hash::make($data['password']),
        ]);        
        unset($data['name']);
        $fileName = time().'.'.$request->profile_picture->extension();
        $request->profile_picture->move(public_path('uploads/teachers/'), $fileName);
        $data['profile_picture'] = $fileName;
        $data['user_id'] = $user->id;
        Teacher::updateOrCreate(['user_id'=>$user->id
        ],$data);
        return redirect()->back()->withSuccess("You have successfully registered waiting for approval!");
    }
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
        $user = User::find($id);
        $data = ['name'=>$user->name,'data'=>"You login request has been approved by admin successfully!",'email'=>$user->email];
        Mail::send('mail.approve', $data, function ($message) use($user) {
            $message->to($user->email);
            $message->subject('Approval Request');
        });
       
       return redirect()->back()->withSuccess("User Profile Approved Successfully!");

    }

    public function register()
    {
        return view('teachers.add');
    }
}
