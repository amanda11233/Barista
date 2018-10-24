@extends('layouts.app')

@section('content')

<div class = "home-banner">
    <div class = "container">
<div class = "banner-details">
    <div class = "banner-detail-image">
<img src = "{{asset('images/banner-details.png')}}" >
    </div>
    <div class = "p-3 mt-3">
    <p>We provide the best barista training and coffee business classes in Nepal.
        <br><h1 class = "text-center">Join Us</h1>
    </p></div>
</div>
    </div>
</div>

<div class = "container mt-5">
    <div class = "row">
        <div class = "col-md-6 welcome-img">
                <img src = "{{asset('images/banner.jpg')}}" >
        </div>
        <div class = "col-md-6">
            <div class = "jumbotron ">
                <h1 class = "text-center">Welcome</h1><hr>
                <p>Welcome to Nepal's number one barista training and coffe classes center. We provide
                    exellent services to the students and facilitate them with different opportunities
                    to gain more experience in the Coffee World.
                </p>
            </div>
        </div>
        <div class = "col-md-6">
      
        </div>
    </div>
    </div><hr>
    <div class = "container mt-5">
        <h1 class = "text-center">Teachers</h1>
        <div class = "row mt-5">
            @foreach($teachers as $data)
            <div class = "col-md-4">
                <div class = "teachers-box">
                    <div class = "teachers-img">
                    <img src = "{{asset('images/teachers/' . $data->email . '/' . $data->picture)}}">
                    </div>
                    <div class = "teachers-desc">
                    <h3 class = "text-center">{{$data->name}}</h3><hr>
                    <p>{{$data->name}} is a prestige member of our Barista training school
                    who has been working with us for over 5 years. He is a skilled teacher 
                    from {{$data->address}}.
                </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div><hr>
    <div class = "classes">
<div class = ""></div>
<div class = "">
    <div class = "container mt-5">
        <div class = "classes-panel">
            <h1 class = "text-center">Classes</h1>
            <p class = "text-center">We Provide the best Classes</p>
        </div>
    </div>
    <div class = "classes-button">
    <a href = "{{route('classes')}}">  <button class = "btn btn-danger">Register For Classes</button></a>
    </div>
   
</div>
    </div>
</div>



@endsection