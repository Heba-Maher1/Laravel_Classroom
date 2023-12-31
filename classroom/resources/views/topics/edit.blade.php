@extends('layouts.master')
@section('title' , 'Edit Topic')
@section('content')
<div class="container mt-5">
    <h1>Update Topic</h1>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>     
        </div>
    @endif

    <form action="{{ route('topics.update' , $classroom->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="classname" placeholder="Topic  Name" name="name" value="{{ $classroom->name }}">
            <label for="classname">Topic Name</label>
        </div>
        <button type="submit" class="btn btn-success">Update Topic</button>
    </form>
</div>

@endsection