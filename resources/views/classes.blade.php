@extends('layouts.app')

@section('content')
<div class = "mt-5">
        <h1 class = "text-center">Featured Classes</h1>
</div>

<div class = "container-fluid mt-5 p-4" style = "background-color:#f7f4e9;">

    <div class = "container">
    @foreach($classes as $data)
    <div class = "row classes-div p-5 mb-3">
            <div class = "col-sm-2"></div>
<div class = "col-sm-6">
<h1>{{$data->class_name}}</h1>
<h5 >Teacher: {{$data->teacher->name}}</h5>
<p class = "text-justify">{{$data->desc}}</p>
</div>
<div class = "col-sm-3 border-left">
    <h2>Class Infos</h2><hr>
    <div class = "row">

        <div class = "col-sm-3"> <h5 >Date:</h5></div>
        <div class = "col-sm-8"><h6>{{$data->date}}</h6></div>
    </div>
    <div class = "row">

            <div class = "col-sm-3"> <h5 >Price:</h5></div>
            <div class = "col-sm-8"><h6>Rs {{$data->price}} / month</h6></div>
        </div>

    <a href = "{{route('view.classes',$data->id)}}"><button class = "btn btn-danger mt-5">More</button></a>
</div>
    </div>
    @endforeach
</div>
</div>
@endsection