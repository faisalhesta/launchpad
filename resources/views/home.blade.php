@extends('layouts.admin')
@section('content')
    <h1 class="mt-4">Welcome {{auth()->user()->name}}!</h1>
    <p>This is {{strtolower(auth()->user()->user_role)}} dashboard.</p>
@endsection
