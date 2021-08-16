@extends('layouts.admin')
@section('content')
    {{-- <h1 class="mt-4">Assign Teacher!</h1> --}}

    <div class="card bg-light">
        <div class="card-header">
            <h4 class="mt-4">Assign Teacher</h4>
        </div>
        <div class="card-body">
           @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form action="{{route('assign.teacher.post',['id'=>$id])}}" method="POST">
                @csrf()
                <div class="form-group">
                    <label>Select Teacher</label>
                        <select name="teacher" id="" class="form-control" required>
                            <option value="">Select</option>
                           @foreach ($teachers as $user)
                               <option value="{{$user->id}}">{{$user->name}}</option>
                           @endforeach

                        </select>
                        <div class="text-center">
                                 <button type="submit" class="btn btn-primary mt-3">Assign</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
@endsection
