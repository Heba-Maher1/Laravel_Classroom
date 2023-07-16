@extends('layouts.master')
@section('title' , 'Edit Classroom')
@section('content')
<div class="container mt-5">
    <h1>Update Classroom</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>     
        </div>
    @endif

    <form action="{{ route('classrooms.update' , $classroom->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('classrooms._form' , [
            'button_lable' => 'Edit '
        ])

    </form>
</div>

@endsection