@extends('layouts.adminApp')

@section('content')

<div class = "container mt-5">
        @if(Session::get('success') != null)
    <div class = "alert alert-success mb-5">{{Session::get('success')}}</div>
    @endif

<a href = "{{route('classes.create')}}"><button style = "width:100%;" class = "btn btn-success">Add Classes</button></a>

    <table class = "table table-hover mt-4">
<tr>
    <th>SN</th>
    <th>Name</th>
    <th>Date</th>
    <th>Teacher</th>
    <th>Price</th>
    <th>Desc</th>
    <th></th>

    <th></th>
</tr>
@foreach($classes as $key => $data)
<tr>
        <td>{{$key+1}}</td>
<td>{{$data->class_name}}</td>
<td>{{$data->date}}</td>
<td>{{$data->teacher->name}}</td>
<td>{{$data->price}}</td>
<td>{{$data->desc}}</td>
<td> <a href = "{{route('classes.edit',$data->id)}}"><button class  = "btn btn-primary">Edit</button></a></td>

<td><td> <a href = "{{route('class.delete', $data->id)}}"><button class  = "btn btn-danger">Delete</button></a>   </td>
</tr>
@endforeach
    </table>
</div>


@endsection