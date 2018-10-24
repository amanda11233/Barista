@extends('layouts.adminApp')

@section('content')

<div class = "container mt-5">
    @if(Session::get('error') != null)  
     <div class = "alert alert-danger mt-4 ">{{Session::get('error')}} !!</div>
    @endif
<form class = "addform" action = "{{route('classes.update', $class->id)}}" method = "post" >
        @csrf
        {!! method_field('patch') !!}
<div class = "row form-group">
    <div class = "col-md-4">
        <label class = "form-label">Class Name</label>
    </div>
    <div class = "col-md-6">
    <input type = "text" name = "name" class = "form-control" value = "{{$class->class_name}}" required>
    </div>
</div>
<div class = "row form-group">
        <div class = "col-md-4">
            <label class = "form-label">Date</label>
        </div>
        <div class = "col-md-6">
            <input type = "date" name = "date" value = "{{$class->date}}" class = "form-control" required>
        </div>
    </div>
    
     
            <div class = "row form-group">
                    <div class = "col-md-4">
                        <label class = "form-label">Teacher</label>
                    </div>
                    <div class = "col-md-6">
                       <select class = "form-control" name = "teacher" required>
                            <option value = "{{$class->teacher->id}}">{{$class->teacher->name}}</option>
                           @foreach($teachers as $data)
                       <option value = "{{$data->id}}">{{$data->name}}</option>
                           @endforeach
                       </select>
                    </div>
            </div>
                              
            <div class = "row form-group">
                    <div class = "col-md-4">
                        <label class = "form-label">Price</label>
                    </div>
                    <div class = "col-md-6">
                        <input step = "any" type = "number" name = "price" value = "{{$class->price}}" class = "form-control" required>
                    </div>
                </div>
                    <div class = "row form-group">
                            <div class = "col-md-4">
                                <label class = "form-label">Desc</label>
                            </div>
                            <div class = "col-md-6">
                              <textarea class = "form-control"  name = "desc">{{$class->desc}}</textarea>
                            </div>
                        </div>
      
                   
                            <button class = "btn btn-primary" type = "submit">Edit Class</button>
                                </form>
                            </div>

</div>
@endsection