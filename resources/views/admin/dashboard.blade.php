@extends('layouts.app')
    @section('content')
        <div class="container">
            <h1 class="text-center">Admin Dashboard</h1>
            <hr>
            <p>Current employees count: <b>{{ $empno }}</b></p>
            <p>Current departments count: <b>{{ $departmentNo }}</b></p>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    {!! Form::open(['method'=>'POST', 'url'=>'search']) !!}
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                {{ Form::text('emp_id', '', ['placeholder'=>'Employee ID', 'class'=>['form-control', $errors->has('emp_id') ? 'is-invalid' : ''], 'autofocus']) }}
                                @if ($errors->has('emp_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('emp_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                {{ Form::submit('SEARCH', ['class'=>'btn btn-success mr-auto']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-4"></div>
            </div>
            <hr>
            <h3 class="text-center">All Employees</h3>
            <table class="table table-stipped" id="all_employees">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>View Details</th>
                    </tr>
                </thead>
            </table>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                            <a href="/adddepartment" class="btn btn-info float-right">Add New Department</a>
                        </div>
                        <div class="col-md-3">
                            <a href="/addemployee" class="btn btn-primary float-right" style="margin-right: 5px;">Add New Employee</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <br><br>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $('#all_employees').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('ajaxdata.getdata') }}",
                    "columns": [
                        { "data": "id" },
                        { "data": "name" },
                        { "data": "contact" },
                        { "data": "action", ordarable: false, searchable: false, }
                    ],
                });
            });
        </script>
    @endsection