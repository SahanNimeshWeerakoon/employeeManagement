@extends('layouts.app')
    @section('content')
        <div class="container">
            <br>
            <h1 class="text-center">Add Department</h1>
            <br><br>
            <div class="jumbotron container">
                {!! Form::open(['method'=>'POST']) !!}
                    @csrf
                    <div class="form-group row">
                        {{ Form::label('department', 'Department Name', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                        <div class="col-md-6">
                            {{ Form::text('department', '', ['class' => 'form-control']) }}
                            @if ($errors->has('department'))
                                <p class="alert alert-danger">
                                    {{ $errors->first('department') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            {{ Form::submit('Add Department', ['class' => ['btn', 'btn-primary', 'float-right']]) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endsection