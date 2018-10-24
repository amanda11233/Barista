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
    <th>Comments</th>
    

    
    <th></th>
</tr>
@foreach($feedbacks as $key => $data)
<tr>
        <td>{{$key+1}}</td>
<td>{{$data->student->name}}</td>
<td>{{$data->student->email}}</td>
<td>{{$data->comment}}</td>



<td><a href = "{{route('feedback.edit', $data->id)}}"><button class = "btn btn-danger">Delete</button></a></td>

</tr>
@endforeach
    </table>
</div>


@endsection