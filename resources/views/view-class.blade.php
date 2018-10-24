@extends('layouts.app')

@section('content')
<div class = "class-img"></div>
<div class = "container">
@if(Session::get('success') != null)
<div class = "alert alert-success mt-5 ">{{Session::get('success')}}</div>@endif
</div>
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
                <div class = "row">
        
                        <div class = "col-sm-3"> <h5 >Ratings:</h5></div>
                        <div class = "col-sm-8"><h6> {{$ratings}} stars</h6></div>
                    </div>
    </div>
</div>
@if(isset($bookingCheck))
@if($bookingCheck >= 1)
<span class = "alert alert-danger">You Have Booked This Class</span>

@else
<a href = "{{route('bookings.show', $class->id)}}"><button class = "btn btn-danger">Book Class</button></a>


@endif
@else
<a href = "{{route('bookings.show', $class->id)}}"><button class = "btn btn-danger">Book Class</button></a>

@endif
@if(Auth::guard('web')->user())
<div class = "row">
    <div class = "col-md-6">
            <form class = "mt-5" action = {{route('rate.class',$class->id)}} method = "post">
                    @csrf
                    <h1>Rate This Class</h1>
                    <hr>
                    <div class = "form-group ">
                 
                    
                    <button  id = "min" onclick = "sub();" type = "button">-</button>
                    <input type = "number" value = "1" class = "text-center rate" id = "rate" name = "rates">
                    <button class = "plus" type = "button"  onclick = "addition();">+</button>
                    </div>
                    <div class = "form-group ">
                            
                            <button class = "btn btn-primary" type = "submit">Rate</button>
                            </div>
                </form>
                
    </div>
    <div class = "col-md-6">
            <form class = "mt-5" action = {{route('feedback.update',$class->id)}} method = "post">
                    @csrf
                    {!! method_field('patch') !!}
                    <div class = "form-group ">
                 
                    <h1 class = "tex-center">Feedback</h1>
                    <hr>
                    <textarea name = "feed"  class= "form-control feedback"></textarea>
                    <button class = "btn btn-primary mt-5" type = "submit">Send Feedback</button>
                    </div>
                </form>
    </div>
</div>

@endif
</div>
   <div class = "container mt-5">
       <h1 class = "text-center">Comments</h1><hr>
       @foreach($feedbacks as $value)
       <div class = "row mt-4">
           <div class = "col-md-6">
               <div class = "comments">
               <div class = "com-username">
<h4>{{$value->student->name}}:</h4>
               </div>
               <div class = "com-comment">
                   {{$value->comment}}
               </div>
               </div>
           </div>
       </div>
       @endforeach
   </div>
</div>
<script>
  var num = 1;
  document.getElementById('rate').editable = false;
function addition(){
    
     num++;
     document.getElementById('rate').innerHTML = num;
     document.getElementById('rate').value = num;
     if(num>=5){
num=0;
     }
     if(num>0){
document.getElementById('min').disabled = false;
     }

}

function sub(){
     num--;
     document.getElementById('rate').innerHTML = num;
     document.getElementById('rate').value = num;
  if(num==0){
document.getElementById('min').disabled = true;
     }
}
    

    
</script>
@endsection