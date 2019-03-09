@extends('back.index')

@section('title')
    Create Employee
@endsection

@section('content')


{!! Form::open(['route' => 'employees.store', 'method' => 'POST', 'enctype' => "multipart/form-data", 'id' => 'createEmployeeForm']) !!}
<div class="box box-primary">
    <div class="box-body">
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::textField('first_name','',['required', 'class' => 'form-control'], 'First Name') }}
            </div>
        </div>
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::textField('surname','',['required', 'class' => 'form-control'], 'Last Name') }}
            </div>
        </div>
        <div class="row mr-0 ml-0">
            <div class="col-12">
                {{ Form::emailField('email','',['required', 'class' => 'form-control'], 'Email') }}
            </div>
        </div>
        <div class="row mr-0 ml-0">
            <div class="col-md-3">
                {{ Form::label('Date of Birth') }}<span class="required_field"></span>
                <div class="input-group input-append date" data-provide="datepicker">
                    {{ Form::text('birth_date' ,'',['class' => 'form-control' , 'id' => 'date', 'required']) }}
                    <div class="input-group-addon add-on">
                        {{--<i class="fa fa-calendar"></i>--}}
                    </div>
                </div>
                {!! $errors->first('<small class="help-block">:message</small>') !!}
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

@section('js')
    <script>
        $('#date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
