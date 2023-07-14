@extends('layouts.master')
@section('title' , 'Show Class')
@section('content')
<div class="container">
    <img class="card-img-top my-3 position-relative rounded" src="{{asset('storage/'.$classroom->cover_image_path) }}" alt="Card image cap">
    <h1 style="top: 260px;left:150px;" class="position-absolute text-white">{{ $classroom->name}} (#{{$classroom->id}})</h1>
    <h3 style="top: 330px;left:150px;" class="position-absolute text-white">{{ $classroom->section}}</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="border rounded p-3 text-center">
                <span class="text-success fs-2">{{ $classroom->code }}</span>
            </div>
        </div>
        <div class="col-md-9">
        </div>
    </div>
</div>
</div>



@endsection