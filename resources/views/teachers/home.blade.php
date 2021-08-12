@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('teachers.update.profile') }}" enctype="multipart/form-data">
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
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address',(auth()->user()->teacher?auth()->user()->teacher->address:'')) }}" required autocomplete="address" autofocus>

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
                                <input id="profile_picture" type="file" data-width="500" class="form-control dropify @error('profile_picture') is-invalid @enderror" name="profile_picture" data-default-file="{{ old('profile_picture',(auth()->user()->teacher?asset('uploads/teachers').'/'.auth()->user()->teacher->profile_picture:'')) }}"  autocomplete="profile_picture" autofocus>

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
                                <input id="current_school" type="text" class="form-control @error('current_school') is-invalid @enderror" name="current_school" value="{{ old('current_school',(auth()->user()->teacher?auth()->user()->teacher->current_school:'')) }}"  autocomplete="current_school" autofocus>

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
                                <input id="previous_school" type="text" class="form-control @error('previous_school') is-invalid @enderror" name="previous_school" value="{{ old('previous_school',(auth()->user()->teacher?auth()->user()->teacher->previous_school:'')) }}"  autocomplete="previous_school" autofocus>

                                @error('previous_school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience',(auth()->user()->teacher?auth()->user()->teacher->experience:'')) }}" required autocomplete="experience" autofocus>

                                @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="expertise_in_subject" class="col-md-4 col-form-label text-md-right">{{ __('Expertise In Subject') }}</label>

                            <div class="col-md-6">
                                <input id="expertise_in_subject" type="text" class="form-control @error('expertise_in_subject') is-invalid @enderror" name="expertise_in_subject" value="{{ old('expertise_in_subject',(auth()->user()->teacher?auth()->user()->teacher->expertise_in_subject:'')) }}" required autocomplete="expertise_in_subject" autofocus>

                                @error('expertise_in_subject')
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

