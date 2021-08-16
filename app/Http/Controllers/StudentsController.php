<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudents;
use App\Http\Requests\StudentProfile;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function store(StoreStudents $request)
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
        $request->profile_picture->move(public_path('uploads/students/'), $fileName);
        $data['profile_picture'] = $fileName;
        $data['user_id'] = $user->id;
        Student::updateOrCreate(['user_id'=>$user->id
        ],$data);
        return redirect()->back()->withSuccess("You have successfully registered waiting for approval!");
    }

    public function update_profile(StudentProfile $request)
    {
          User::where('id','=',auth()->user()->id)->update(['name'=>$request->name]);
          $data = $request->all();
          unset($data['name']);
          $fileName = time().'.'.$request->profile_picture->extension();
          $request->profile_picture->move(public_path('uploads/students/'), $fileName);
          $data['profile_picture'] = $fileName;
          $data['user_id'] = auth()->user()->id;
          Student::updateOrCreate(['user_id'=>auth()->user()->id
          ],$data);
          return redirect()->back()->withSuccess("Profile Updated Successfully!");
    }

    public function assign_teacher($id,Request $request)
    {
        Student::where('user_id',$id)->update(['assigned_teacher'=>$request->teacher]);
        return redirect()->back()->withSuccess('Teacher assign successfully!');
    }
    public function assign_form($id)
    {
        $teachers = User::where('user_type','1')->get();
        return view('students.assign_form',compact('teachers','id'));
    }
    public function list()
    {
        $students = User::where('user_type','2')->paginate();
        return view('students.list',compact('students'));
    }

    public function register()
    {
        return view('students.add');
    }
}
