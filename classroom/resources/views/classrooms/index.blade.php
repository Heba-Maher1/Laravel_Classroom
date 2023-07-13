@extends('layouts.master')
@section('title' , 'Home')
@section('content')

<div class="container">
  <h1>Classrooms</h1>
  <div class="row">
    @foreach($classrooms as $classroom)
    <div class="col-md-3">
      <div class="card" style="width:18rem;">
       <div class="card-body">
        <div class="card-img">
          <img src="{{ $classroom->cover_image_path }}" alt="">
        </div>
        <h5 class="card-title">{{ $classroom->name }}</h5>
        <p class="card-text">{{$classroom->section}} - {{$classroom->room}}</p>
        <a href="{{ route ('classrooms.show' , $classroom->id)}}" class="btn btn-sm btn-primary">View</a>
        <a href="{{ route ('classrooms.edit' , $classroom->id)}}" class="btn btn-sm btn-dark">Edit</a>
        <form action="{{ route ('classrooms.destroy' , $classroom->id)}}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-sm btn-danger">Delete</button> 
        </form>
        <form action="{{ route ('topics.create' , $classroom)}}" method="post">
          @csrf
          @method('get')
          <button type="submit" class="btn btn-sm btn-dark">Add Topic</button>
      </form>
      </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection