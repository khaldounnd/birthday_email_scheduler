@extends('back.index')

@section('title')
    Edit User
@endsection

@section('content')


{!! Form::open(['route' => ['employees.update', $employee->id], 'method' => 'PUT', 'enctype' => "multipart/form-data", 'id' => 'editEmployeeForm']) !!}

{!! csrf_field() !!}
<input name="id" type="number" hidden value="{{ $employee->id }}">
<div class="box box-primary">
    <div class="box-body">
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::textField('first_name', $employee->first_name ,['required', 'class' => 'form-control'], 'First Name') }}
            </div>
        </div>
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::textField('surname', $employee->surname ,['required', 'class' => 'form-control'], 'Last Name') }}
            </div>
        </div>
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::emailField('email', $employee->email,['required', 'class' => 'form-control'], 'Email') }}
            </div>
        </div>
        <div class="row mr-0 ml-0">
            <div class="col-md-3">
                {{ Form::label('Date of Birth') }}<span class="required_field"></span>
                <div class="input-group input-append date" data-provide="datepicker">
                    {{ Form::text('birth_date' , date('m/d/Y', strtotime($employee->birth_date)),
                    ['class' => 'form-control' , 'id' => 'date', 'required']) }}
                    <div class="input-group-addon add-on">
                        {{--<i class="fa fa-calendar"></i>--}}
                    </div>
                </div>
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
