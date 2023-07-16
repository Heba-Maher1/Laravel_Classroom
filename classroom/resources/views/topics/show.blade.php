@extends('layouts.master')
@section('title' , 'Show Topic')
@section('content')
<div class="container">
    @if($message = Session::get('success'))
    <div class="alert alert-success">
      {{ $message }}
    </div>
  @endif  
    <div class="row">
        <div class="col-md-3">
            <div class="border rounded p-3 text-center">
                <h1>{{ $topic->name}} (#{{$topic->id}})</h1>
            </div>
        </div>
        <div class="col-md-9">
        </div>
    </div>
</div>
@endsection