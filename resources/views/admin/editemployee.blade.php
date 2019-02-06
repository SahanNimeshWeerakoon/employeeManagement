@extends('layouts.app')
    @section('content')
        <div class="container">
            <h1 class="text-center">Add New Employee</h1><br>
            {!! Form::open(['methos'=>'POST']) !!}
            @csrf
                {{ Form::hidden('_method', 'PUT') }}
                <div class="form-group row">
                    {{ Form::label('name', 'Employee Name', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::text('name', $user->name, ['class' => ['form-control', $errors->has('name') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('contact', 'Employee Contact', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::text('contact', $user->contact, ['class' => ['form-control', $errors->has('contact') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('contact'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('contact') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('address', 'Employee Address', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::text('address', $user->address, ['class' => ['form-control', $errors->has('address') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('address'))
                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('date', 'Date of Joining', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::date('date', $user->date_joined, ['class' => ['form-control', $errors->has('date') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('date'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('department_id', 'Employee Department', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::select('department_id', $departments, $user->department_id, ['placeholder' => 'Select The Department ...', 'class' => ['form-control', $errors->has('department_id') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('department_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('department_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('email', 'Employee Email', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::text('email', $user->email, ['class' => ['form-control', $errors->has('email') ? 'is-invalid' : ''],'autofocus']) }}
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('basic_salary', 'Employees\' Basic Salary', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::text('basic_salary', $user->basic_salary, ['class' => ['form-control', $errors->has('basic_salary') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('basic_salary'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('basic_salary') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('travel', 'Employees\' Travelling Allowence', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::text('travel', $user->transport_allowances, ['class' => ['form-control', $errors->has('travel') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('travel'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('travel') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('username', 'Employee Username', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::text('username', $user->username, ['class' => ['form-control', $errors->has('username') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div> --}}

                <div class="form-group row">
                    {{ Form::label('', '', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::submit('Update Employee Details', ['class' => ['btn', 'btn-primary', 'float-right']]) }}
                    </div>
                </div>
            {!! Form::close() !!}            
        </div>
    @endsection