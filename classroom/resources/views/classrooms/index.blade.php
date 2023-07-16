@extends('layouts.master')
@section('title' , 'Home')


@section('content')

<div class="container">


  <h1 class="my-4">Classrooms</h1>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
    {{ $message }}
  </div>
@endif  
  <div class="row ">
    @foreach($classrooms as $classroom)
    <div class="col-md-3">
      <div class="card mb-4 " style="width:20rem; height:18rem;">
        <div class="image ">
          <img class="card-img-top" src="storage/{{ $classroom->cover_image_path}}" alt="Card image cap" style="height:8rem;">

        </div>
       <div class="card-body">
        <h5 class="card-title">{{ $classroom->name }}</h5>
        <p class="card-text">{{$classroom->section}} - {{$classroom->room}}</p>
        <div class="buttons d-flex justify-content-between">
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
    </div>
    @endforeach
  </div>
</div>

@endsection