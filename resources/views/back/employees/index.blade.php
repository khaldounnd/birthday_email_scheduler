@extends('back.index')
@section('title')
    View Employees
@endsection
@section('button')
    <a href="{{ route('employees.create') }}" class="btn btn-primary">@lang('New Employee')</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <div class="box-body table-responsive">
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('First Name')</th>
                            <th>@lang('Last Name')</th>
                            <th>@lang('Email')</th>
                            <th>@lang('Date Of Birth')</th>
                            <th style="width: 5%">Edit</th>
                            <th style="width: 5%">Delete</th>
                        </tr>
                        </thead>

                        <tbody id="pannel">
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->surname }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->birth_date }}</td>
                                    <td class="table-w-2">
                                        <a class="btn btn-warning btn-xs btn-block" href="{{ route('employees.edit', [$employee->id]) }}" role="button"
                                           title="@lang('Edit')">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    </td>
                                    <td class="table-w-2">

                                        <form action="{{ route('employees.destroy', [$employee->id]) }}" method="post">
                                            <input class="btn btn-danger btn-xs btn-block" type="submit" value="X" id="destroy">
                                            {!! method_field('delete') !!}
                                            {!! csrf_field() !!}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div id="pagination" class="box-footer">
                    {{ $employees->links() }}
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#destroy').on('click', function (e) {
                if(!confirm('Are you sure you want to delete this employee?')){
                    e.preventDefault();
                }
            })
        });
    </script>
@endsection