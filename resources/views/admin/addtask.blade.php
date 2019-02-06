@extends('layouts.app')
    @section('content')
        <div class="container">
            <h3 class="text-center">Add a Task To The Employee</h3>
            <br>
            {!! Form::open(['method'=>'POST']) !!}
                <div class="form-group row">
                    {{ Form::label('empid', 'Employee Name', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-3">
                        {{-- {{ Form::number('empid', '', ['class' => ['form-control', $errors->has('empid') ? 'is-invalid' : ''], 'autofocus']) }} --}}
                        <input list="empid" name="empid" class="form-control {{ $errors->has('empid') ? 'is-invalid' : '' }}" autofocus>
                        <datalist id="empid">
                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">
                            @endforeach
                        </datalist>
                        @if ($errors->has('empid'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('empid') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('title', 'Task Title', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::text('title', '', ['class' => ['form-control', $errors->has('title') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('description', 'Task Description', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::textarea('description', '', ['class' => ['form-control', $errors->has('description') ? 'is-invalid' : '']]) }}
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        {{ Form::submit('Add Task', ['class' => 'form-control btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
            <br>
            <h2 class="text-center">All Tasks</h2>
            @if (count($tasks) > 0)
            <table class="table table-stripped" id="tasks-table">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Task Title</th>
                        <th>Task Description</th>
                        <th>Updated At</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
            @else
                <p>No Tasks Added Yet</p>
            @endif
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                $('#tasks-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('ajaxdata.gettasks') }}",
                    "columns": [
                        { "data": "employee_id" },
                        { "data": "name" },
                        { "data": "task_title" },
                        { "data": "task_description" },
                        { "data": "updated_at" },
                        { "data": "action", searchable:true, }
                    ],
                });
            });
        </script>
    @endsection