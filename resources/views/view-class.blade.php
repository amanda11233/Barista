@extends('layouts.app')

@section('content')
<div class = "class-img"></div>
<div class = "container mt-5 p-4" style = "background-color:#f7f4e9;">
<h1 class = "text-center">{{$class->class_name}}</h1><hr>
<div class = "row">
    <div class = "col-md-6 mb-5">
    <p class = "text-justify" style = "word-wrap : break-word;">{{$class->desc}}</p>
    </div>
    <div class = "col-md-6 border-left">
            <h2>Class Infos</h2><hr>
            <div class = "row">
        
                <div class = "col-sm-3"> <h5 >Date:</h5></div>
                <div class = "col-sm-8"><h6>{{$class->date}}</h6></div>
            </div>
            <div class = "row">
        
                    <div class = "col-sm-3"> <h5 >Price:</h5></div>
                    <div class = "col-sm-8"><h6>Rs {{$class->price}} / month</h6></div>
                </div>
        
    </div>
</div>
<a href = "{{route('book.class', $class->id)}}"><button class = "btn btn-danger">Book Class</button></a>
</div>
@endsection