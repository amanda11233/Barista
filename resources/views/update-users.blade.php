@extends('layouts.app')

@section('content')
<div class = "container mt-5">
    @if(Session::get('success') != null)
    <div class = "alert alert-success mt-4 mb-4">
        {{Session::get('success')}}
    </div>
    @endif
        <form method="POST" action="{{ route('users.update', $student->id) }}">
                @csrf
                {!! method_field('patch') !!}
<h1 class = "text-center">Update Your Account</h1><hr>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $student->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $student->address }}" required autofocus>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $student->phone }}" required autofocus>

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                    <div class="col-md-6">
                        <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ $student->dob}}" required autofocus>

                        @if ($errors->has('dob'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                    <div class="col-md-6">
                        
       <select name = "gender" class = "form-control">
            <option>{{$student->gender}}</option>
        <option>Male</option>
            <option>Female</option>
       </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $student->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
 

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
</div>
@endsection