@extends('layouts.adminApp')

@section('content')

<div class = "container mt-5">
    @if(Session::get('error') != null)  
     <div class = "alert alert-danger mt-4 ">{{Session::get('error')}} !!</div>
    @endif
<form class = "addform" action = "{{route('teachers.update', $teacher->id)}}" method = "post" enctype="multipart/form-data">
        @csrf
<div class = "row form-group">
    <div class = "col-md-4">
        <label class = "form-label">Teacher Name</label>
    </div>
    <div class = "col-md-6">
    <input type = "text" name = "name" class = "form-control" value = "{{$teacher->name}}" placeholder = "Teacher's Name" required>
    </div>
</div>
<div class = "row form-group">
        <div class = "col-md-4">
            <label class = "form-label">Address</label>
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "address" class = "form-control"  value = "{{$teacher->address}}"  placeholder = "Teacher's address" required>
        </div>
    </div>
    <div class = "row form-group">
            <div class = "col-md-4">
                <label class = "form-label">Phone</label>
            </div>
            <div class = "col-md-6">
                <input type = "number" name = "phone" class = "form-control"  value = "{{$teacher->phone}}"  placeholder = "Teacher's phone" required>
            </div>
        </div>
     
            <div class = "row form-group">
                    <div class = "col-md-4">
                        <label class = "form-label">Gender</label>
                    </div>
                    <div class = "col-md-6">
                       <select class = "form-control" name = "gender" required>
                           <option>{{$teacher->gender}} </option>
                           <option>Male</option>
                           <option>Female</option>
                       </select>
                    </div>
            </div>
                    <div class = "row form-group">
                            <div class = "col-md-4">
                                <label class = "form-label">Email</label>
                            </div>
                            <div class = "col-md-6">
                                <input type = "email" name = "email" class = "form-control"  value = "{{$teacher->email}}"  placeholder = "Teacher's email" required>
                            </div>
                        </div>
                        
                    <div class = "row form-group">
                            <div class = "col-md-4">
                                <label class = "form-label">File</label>
                            </div>
                            <div class = "col-md-6">
                                <input type = "file" name = "img" class = "form-control" required>
                            </div>
                        </div>
             <button class = "btn btn-primary" type = "submit">Update</button>

</div>
@endsection