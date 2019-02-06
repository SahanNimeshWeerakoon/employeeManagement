@extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <h3>Search Payroll Details</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form action="/paydetailssearch" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="empname">Employee Name</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input list="empname" name="empname" class="form-control {{ $errors->has('empname') ? 'is-invalid' : '' }}" autofocus>
                                        @if ($errors->has('empname'))
                                            <small class="invalid-feedback" style="color: red;">
                                                <strong>{{ $errors->first('empname') }}</strong>
                                            </small>
                                        @endif
                                        <datalist id="empname">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->name }}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from">Date From</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="date" name="from" class="form-control" />
                                        @if ($errors->has('from'))
                                            <small class="invalid-feedback" style="color: red;">
                                                <strong>{{ $errors->first('from') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="to">Date To</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="date" name="to" class="form-control" />
                                        @if ($errors->has('to'))
                                            <small class="invalid-feedback" style="color: red;">
                                                <strong>{{ $errors->first('to') }}</strong>
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="SEARCH" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
