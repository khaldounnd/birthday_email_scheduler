@extends('back.index')

@section('title')
    Create User
@endsection

@section('content')


{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'enctype' => "multipart/form-data", 'id' => 'createUserForm']) !!}
<div class="box box-primary">
    <div class="box-body">
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::textField('name','',['required', 'class' => 'form-control'], 'Full Name') }}
            </div>
        </div>
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::emailField('email','',['required', 'class' => 'form-control'], 'Email') }}
            </div>
            <div class="col-12">
                {{ Form::passwordField('password',['minlength' => "6", 'required', 'class' => 'form-control'], 'Password') }}
            </div>
            <div class="col-12">
                <span class="font-size-small">Password must be at least 6 characters</span>
            </div>
            <br/>
        </div>
    </div>
    <div class="box-footer text-right">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
</div>
{!! Form::close() !!}
@endsection
