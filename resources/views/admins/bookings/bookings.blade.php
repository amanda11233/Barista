@extends('layouts.adminApp')

@section('content')

<div class = "container mt-5">
        @if(Session::get('success') != null)
    <div class = "alert alert-success mb-5">{{Session::get('success')}}</div>
    @endif



    <table class = "table table-hover mt-4">
<tr>
    <th>SN</th>
    <th>Student Name</th>
    <th>Email</th>
    <th>Class Name</th>
    <th>Date</th>

    
    <th></th>
</tr>
@foreach($bookings as $key => $data)
<tr>
        <td>{{$key+1}}</td>
<td>{{$data->student->name}}</td>
<td>{{$data->student->email}}</td>
<td>{{$data->class->class_name}}</td>
<td>{{$data->class->date}}</td>




</tr>
@endforeach
    </table>
</div>


@endsection