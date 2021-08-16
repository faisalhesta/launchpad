@extends('layouts.admin')
@section('content')
@if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
     @endif
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
                        Experience
                    </th>
                    <th>
                        Expertise in subjects
                    </th>
                    <th>
                        Action
                    </th>
                </thead>
            </tr>
            @if(count($teachers)!=0)
                @foreach ($teachers as $user)
                <tr>
                    <tbody>
                        {{-- <td>{{$user->id}}</td> --}}
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->teacher)
                        <td>{{$user->teacher?$user->teacher->address:''}}</td>
                        <td><img width="70" height="70" src="{{asset('uploads/teachers').'/'.($user->teacher?$user->teacher->profile_picture:'')}}" /></td>
                        <td>{{$user->teacher?$user->teacher->current_school:''}}</td>
                        <td>{{$user->teacher?$user->teacher->previous_school:''}}</td>
                        <td>{{$user->teacher?$user->teacher->experience:''}}</td>
                        <td>{{$user->teacher?$user->teacher->expertise_in_subject:''}}</td>
                        @else
                        <td colspan="6"></td>
                        @endif
                        <td>@if(!$user->email_verified_at)
                            <a href="{{route('teacher.approve',['id'=>$user->id])}}" title="click to approved!">Unapproved</a></td>
                            @else
                            <span class="text-success">Approved</span>
                            @endif
                        </tbody>
                </tr>
                @endforeach
            @endif
        <table>
    </div>
@endsection
