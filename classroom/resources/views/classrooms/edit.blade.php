@extends('layouts.master')
@section('title' , 'Edit Classroom')
@section('content')
<div class="container mt-5">
    <h1>Update Classroom</h1>
    <form action="{{ route('classrooms.update' , $classroom->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="classname" placeholder="Class Name" name="name" value="{{$classroom->name}}">
            <label for="classname">Class Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="section" placeholder="section" name="section" value="{{$classroom->section}}">
            <label for="section">Section</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="subject" placeholder="subject" name="subject" value="{{$classroom->subject}}"> 
            <label for="subject">Subject</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="room" placeholder="room" name="room" value="{{$classroom->room}}">
            <label for="room">Room</label>
        </div>

        <img src="{{ Storage::disk('public')->url($classroom->cover_image_pat) }]" alt="">

        <div class="form-floating mb-3">
            <input type="file" class="form-control" id="cover_image" placeholder="cover_image" name="cover_image">
            <label for="cover_image">Cover Image</label>
        </div>
        <button type="submit" class="btn btn-success">Update Room</button>
    </form>
</div>

@endsection