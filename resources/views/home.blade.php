@extends('layouts.app')
    @section('content')
        <div class="home">
            <br><br><br>
            <div class="jumbotron container">
                <h1 class="text-center">Login</h1>
                <br>
                {!! Form::open(['method'=>'post']) !!}
                    <div class="form-group row">
                        {{ Form::label('username', 'Username', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                        <div class="col-md-6">
                            {{ Form::text('username', '', ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('password', 'Passowrd', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                        <div class="col-md-6">
                            {{ Form::text('password', '', ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            {{ Form::submit('LOGIN', ['class' => ['btn', 'btn-primary', 'float-right']]) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endsection