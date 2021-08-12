@extends('layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.update.profile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',auth()->user()->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="" disabled="disabled" value="{{ old('email',auth()->user()->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', (auth()->user()->student?auth()->user()->student->address:'')) }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                            <div class="col-md-6">
                                <input id="profile_picture" type="file" data-default-file="{{ old('profile_picture',(auth()->user()->student?asset('uploads/students').'/'.auth()->user()->student->profile_picture:'')) }}" class="form-control dropify @error('profile_picture') is-invalid @enderror" name="profile_picture" value="{{ old('profile_picture',(auth()->user()->student?auth()->user()->student->profile_picture:'')) }}" required autocomplete="profile_picture" autofocus>

                                @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="current_school" class="col-md-4 col-form-label text-md-right">{{ __('Current School (Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="current_school" type="text" class="form-control @error('current_school') is-invalid @enderror" name="current_school" value="{{ old('current_school',(auth()->user()->student?auth()->user()->student->current_school:'')) }}" required autocomplete="current_school" autofocus>

                                @error('current_school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="previous_school" class="col-md-4 col-form-label text-md-right">{{ __('Previous School (Optional)') }}</label>

                            <div class="col-md-6">
                                <input id="previous_school" type="text" class="form-control @error('previous_school') is-invalid @enderror" name="previous_school" value="{{ old('previous_school',(auth()->user()->student?auth()->user()->student->previous_school:'')) }}" required autocomplete="previous_school" autofocus>

                                @error('previous_school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parents_details" class="col-md-4 col-form-label text-md-right">{{ __('Parents Details') }}</label>

                            <div class="col-md-6">
                                <input id="parents_details" type="text" class="form-control @error('parents_details') is-invalid @enderror" name="parents_details" value="{{ old('parents_details',(auth()->user()->student?auth()->user()->student->parents_details:'')) }}" required autocomplete="parents_details" autofocus>

                                @error('parents_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="assign_teacher" class="col-md-4 col-form-label text-md-right">{{ __('Assign Teacher') }}</label>

                            <div class="col-md-6">
                                <input id="assign_teacher" type="text" class="form-control @error('assign_teacher') is-invalid @enderror" name="" disabled="disabled" value="{{ old('assign_teacher',(auth()->user()->student->teacher?auth()->user()->student->teacher->name:'')) }}" required autocomplete="assign_teacher" autofocus>

                                @error('assign_teacher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

