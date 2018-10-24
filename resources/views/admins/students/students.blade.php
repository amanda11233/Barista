@extends('layouts.adminApp')

@section('content')

<div class = "container">
    @if(Session::get('success') != null)
    <div class = "alert alert-success mt-4 ">{{Session::get('success')}}</div>
    @endif

    <table class = "table table-hover mt-5">
<tr>
    <th>SN</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>PhoneNumber</th>
    <th>Gender</th>
    <th>DOB</th>
    <th></th>
</tr>
@foreach($students as $key => $data)
<tr>
        <td>{{$key+1}}</td>
<td>{{$data->name}}</td>
<td>{{$data->email}}</td>
<td>{{$data->address}}</td>
<td>{{$data->phone}}</td>
<td>{{$data->gender}}</td>
<td>{{$data->dob}}</td>

<td>   {!! Form::open(['class'=>'delete_form','method'=>'DELETE','action' =>['Users\UsersController@destroy',$data->id]]) !!}
        <div class="form-group">
                {{Form::button('Delete ',['class'=>'btn btn-danger','type'=>'submit','onclick'=>'return confirm("Do you want to delete")'])}}
        </div></td>
</tr>
@endforeach
    </table>
</div>


@endsection