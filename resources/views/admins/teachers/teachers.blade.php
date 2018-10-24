@extends('layouts.adminApp')

@section('content')

<div class = "container mt-5">
        @if(Session::get('success') != null)
    <div class = "alert alert-success mb-5">{{Session::get('success')}}</div>
    @endif

<a href = "{{route('users.create')}}"><button style = "width:100%;" class = "btn btn-success">Add Teachers</button></a>

    <table class = "table table-hover mt-4">
<tr>
    <th>SN</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>PhoneNumber</th>
    <th>Gender</th>
    <th>Image</th>

    <th></th>
</tr>
@foreach($teachers as $key => $data)
<tr>
        <td>{{$key+1}}</td>
<td>{{$data->name}}</td>
<td>{{$data->email}}</td>
<td>{{$data->address}}</td>
<td>{{$data->phone}}</td>
<td>{{$data->gender}}</td>
<td><img src  = "{{asset('images/teachers/' . $data->email . '/' . $data->picture)}}" width = "100" height = "100"></td>

<td> <a href = "{{route('teacher.delete', $data->id)}}"><button class  = "btn btn-danger">Delete</button></a>
</tr>
@endforeach
    </table>
</div>


@endsection