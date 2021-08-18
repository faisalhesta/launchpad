<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeachers;
use App\Http\Resources\StudentResource;
use App\Http\Resources\TeacherResource;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class ApiController extends Controller
{
    public function register_teacher(Request $request)
    {
    	//Validate data
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',            
            'profile_picture'=>'required|mimes:png,jpg,jpeg',
            'address'=>'required|string',
            'current_school' => 'nullable|string',
            'previous_school' => 'nullable|string',
            'experience' =>'required|string',
            'expertise_in_subject'=>'required|string',
            'password' => 'required|string|min:8']);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user      
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

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function update_teacher(Request $request)
    {
    	//Validate data
        $data = $request->all();
        $validator = Validator::make($data, [
            'name'                 => 'required|string|max:255',                     
            'profile_picture'      => 'required|mimes:png,jpg,jpeg',
            'address'              => 'required|string',
            'current_school'       => 'nullable|string',
            'previous_school'      => 'nullable|string',
            'experience'           => 'required|string',
            'expertise_in_subject' => 'required|string',
            ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user  
        $user = JWTAuth::authenticate($request->token);      
        User::where('id',$user->id)->update([
            'name' => $data['name']  
        ]);        
        unset($data['name']);
        $fileName = time().'.'.$request->profile_picture->extension();
        $request->profile_picture->move(public_path('uploads/teachers/'), $fileName);
        $data['profile_picture'] = $fileName;
        $data['user_id'] = $user->id;
        Teacher::updateOrCreate(['user_id'=>$user->id
        ],$data);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function register_student(Request $request)
    {
    	//Validate data
        $data = $request->all();
        $validator = Validator::make($data, [
            'name'                 => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users',            
            'profile_picture'      => 'required|mimes:png,jpg,jpeg',
            'address'              => 'required|string',
            'current_school'       => 'nullable|string',
            'previous_school'      => 'nullable|string',
            'experience'           => 'required|string',
            'expertise_in_subject' => 'required|string',
            'password'             => 'required|string|min:8'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user        
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

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }
    
    public function update_student(Request $request)
    {
    	//Validate data
        $data = $request->all();
        $validator = Validator::make($data, [
            'name'                 => 'required|string|max:255',
            // 'email'                => 'required|string|email|max:255|unique:users',            
            'profile_picture'      => 'required|mimes:png,jpg,jpeg',
            'address'              => 'required|string',
            'current_school'       => 'nullable|string',
            'previous_school'      => 'nullable|string',
            'experience'           => 'required|string',
            'expertise_in_subject' => 'required|string',
            // 'password'             => 'required|string|min:8'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user = JWTAuth::authenticate($request->token);        
        User::where('id',$user->id)->update([
                'name' => $data['name'],                
                'user_type'=> '2',
        ]);         
        unset($data['name']);
        $fileName = time().'.'.$request->profile_picture->extension();
        $request->profile_picture->move(public_path('uploads/students/'), $fileName);
        $data['profile_picture'] = $fileName;
        $data['user_id'] = $user->id;
        Student::updateOrCreate(['user_id'=>$user->id
        ],$data);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Could not create token.',
                ], 500);
        }
 	
 		//Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }
 
    public function logout(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

		//Request is validated, do logout        
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function get_user(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
        if($user->user_type=='1')
        {
           return new TeacherResource(User::find($user->id));

        }
        elseif($user->user_type=='2'){
           return new StudentResource(User::find($user->id));
        }
        else{
           return response()->json(['data' => $user]);
             
        }
 
    }
}
