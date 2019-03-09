@extends('back.index')
@section('title')
    View Users
@endsection
@section('button')
    <a href="{{ route('users.create') }}" class="btn btn-primary">@lang('New User')</a>
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
                            <th>@lang('Name')</th>
                            <th>@lang('Email')</th>
                            <th style="width: 5%">Edit</th>
                            <th style="width: 5%">Delete</th>
                        </tr>
                        </thead>

                        <tbody id="pannel">
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="table-w-2">
                                        <a class="btn btn-warning btn-xs btn-block" href="{{ route('users.edit', [$user->id]) }}" role="button"
                                           title="@lang('Edit')">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    </td>
                                    <td class="table-w-2">

                                        <form action="{{ route('users.destroy', [$user->id]) }}" method="post">
                                            <input class="btn btn-danger btn-xs btn-block destroy" type="submit" value="X">
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
                    {{ $users->links() }}
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
            $('.destroy').on('click', function (e) {
                if(!confirm('Are you sure you want to delete this user?')){
                    e.preventDefault();
                }
            })
        });
    </script>
@endsection