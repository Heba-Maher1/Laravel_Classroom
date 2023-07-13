@extends('layouts.master')
@section('title' , 'Create Classroom')
@section('content')

<div class="container mt-5">
    <h1>Create Classroom</h1>
    <form  method="POST" action="{{ route('classrooms.store') }}" enctype="multipart/form-data">
        @csrf
       
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="classname" placeholder="Class Name">
            <label for="classname">Class Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="section" id="section" placeholder="section">
            <label for="section">Section</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="subject">
            <label for="subject">Subject</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="room" name="room" placeholder="room">
            <label for="room">Room</label>
        </div>

        <div class="form-floating mb-3">
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="cover_image">
            <label for="cover_image">Cover Image</label>
        </div>
        <button type="submit" class="btn btn-success">Create Room</button>
    </form>
</div>

@endsection
@push('scripts')
<!-- <script>alert('hello')</script> -->
@endpush

