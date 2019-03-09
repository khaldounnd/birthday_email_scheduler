@extends('back.index')

@section('title')
    Create User
@endsection

@section('content')


{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT', 'enctype' => "multipart/form-data", 'id' => 'editUserForm']) !!}

{!! csrf_field() !!}

<div class="box box-primary">
    <div class="box-body">
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::textField('name', $user->name ,['required', 'class' => 'form-control'], 'Full Name') }}
            </div>
        </div>
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::emailField('email', $user->email,['required', 'class' => 'form-control'], 'Email') }}
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
