@extends('layouts.master')
@section('title' , 'Home Topic')
@section('content')
<div class="container">
  <h1>Topics</h1>
  <div class="row">
    @foreach($topics as $topic)
    <div class="col-md-3">
      <div class="card" style="width:18rem;">
       <div class="card-body">
        <h5 class="card-title">{{ $topic->name }}</h5>
        <a href="{{ route ('topics.show' , $topic->id)}}" class="btn btn-sm btn-primary">View</a>
        <a href="{{ route ('topics.edit' , $topic->id)}}" class="btn btn-sm btn-dark">Edit</a>
        <form action="{{ route ('topics.destroy' , $topic->id)}}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-sm btn-danger">Delete</button> 

        </form>

      </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection