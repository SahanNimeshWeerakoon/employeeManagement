@extends('layouts.app')
    @section('content')
        <div class="container">
            <br><br>
            <h3 class="text-center">Payroll</h3>
            <br>
            
            <form action="/getdata" method="POST">
                @csrf
                <div class="form-group row">
                    {{ Form::label('empid', 'Employee ID', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-4">
                        {{-- {{ Form::number('empid', isset($user->id) ? $user->id : '', ['class' => ['form-control', $errors->has('empid') ? 'is-invalid' : ''], 'autofocus']) }} --}}
                        <input list="empid" name="empid" class="form-control {{ $errors->has('empid') ? 'is-invalid' : '' }}">
                        <datalist id="empid" >
                            @if (count($getusers) > 0)
                                @foreach ($getusers as $users)
                                    <option value="{{ $users->name }}">
                                @endforeach
                            @endif
                        </datalist>
                        @if ($errors->has('empid'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('empid') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        {{ Form::submit('Calculate', ['class'=>'btn btn-info']) }}
                    </div>
                </div>
            </form>

            {!! Form::open(['method' => 'POST', 'url' => 'payroll']) !!}
                @csrf
                <div class="form-group row">
                    {{ Form::label('emp_id', 'Employee ID Manual Input', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::number('emp_id', isset($user->basic_salary) ? $user->id : '', ['class' => ['form-control', $errors->has('emp_id') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('emp_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('emp_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('basic_salary', 'Basic Salary (Rs.)', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::number('basic_salary', isset($user->basic_salary) ? $user->basic_salary : '', ['class' => ['form-control', $errors->has('basic_salary') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('basic_salary'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('basic_salary') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('transport', 'Transport Allowances', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::number('transport', isset($user->transport_allowances) ? $user->transport_allowances : '', ['class' => ['form-control', $errors->has('transport') ? 'is-invalid' : '']]) }}
                        @if ($errors->has('transport'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('transport') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('epf', 'Employees\' Provident Fund(EPF)', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::number('epf', isset($user->basic_salary) ? $user->basic_salary*0.12 : '', ['class' => ['form-control', $errors->has('epf') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('epf'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('epf') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('etf', 'Employees\' Trust Fund(ETF)', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::number('etf', isset($user->basic_salary) ? $user->basic_salary*0.03 : '', ['class' => ['form-control', $errors->has('etf') ? 'is-invalid' : '']]) }}
                        @if ($errors->has('etf'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('etf') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="total" class="col-md-4 col-form-label text-md-right">
                        <strong>Total Salary</strong>
                    </label>
                    <div class="col-md-6">
                        {{ Form::number('total', isset($user->basic_salary) ? $total : '', ['class' => ['form-control', $errors->has('total') ? 'is-inavlid' : ''], 'autofocus']) }}
                        @if ($errors->has('total'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('total') }}</strong>
                            </span>
                        @endif
                        (Basic Salary + Transport Allowances - ETF )
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        {{ Form::submit('SUBMIT', ['class' => ['btn', 'btn-primary', 'float-right']]) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    @endsection