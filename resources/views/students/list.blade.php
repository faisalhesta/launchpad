@extends('layouts.admin')
@section('content')
   <div class="row">
        <table class="table">
            <tr>
                <thead>

                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Profile Picture
                    </th>
                    <th>
                        Current School
                    </th>
                    <th>
                        Previous School
                    </th>
                    <th>
                        Parents Details
                    </th>
                    <th>
                        Assign Teacher
                    </th>
                    <th>
                        Action
                    </th>
                </thead>
            </tr>
            @foreach ($students as $user)
            <tr>
                <tbody>
                    {{-- <td>{{$user->id}}</td> --}}
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->student)
                    <td>{{$user->student->address}}</td>
                    <td><img width="70" height="70" src="{{asset('uploads/students').'/'.$user->student->profile_picture}}" /></td>
                    <td>{{$user->student->current_school}}</td>
                    <td>{{$user->student->previous_school}}</td>
                    <td>{{$user->student->parents_details}}</td>
                    @else
                    <td colspan="5"></td>
                    @endif
                    <td><a href="{{route('students.assign',['id'=>$user->id])}}" title="Assign teacher">{{$user->student->assigned_teacher?$user->student->teacher->name:'Not Assigned'}}</a></td>
                    <td>@if(!$user->email_verified_at)
                        <a href="{{route('teacher.approve',['id'=>$user->id])}}" title="click to approved!">Unapproved</a></td>
                        @else
                        <span class="text-success">Approved</span>
                        @endif
                    </tbody>
                </tbody>
            </tr>
            @endforeach

        <table>
    </div>
@endsection
