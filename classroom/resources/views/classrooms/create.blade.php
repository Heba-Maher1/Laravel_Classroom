@extends('layouts.master')
@section('title' , 'Create Classroom')
@section('content')

<div class="container mt-5">
    <h1>Create Classroom</h1>


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>     
        </div>
    @endif


    <form  method="POST" action="{{ route('classrooms.store') }}" enctype="multipart/form-data">
        @csrf
       
      @include('classrooms._form' , [
            'button_lable' => 'Create '

      ])
    </form>
</div>

@endsection
@push('scripts')
<!-- <script>alert('hello')</script> -->
@endpush

