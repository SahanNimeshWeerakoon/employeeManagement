@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="jumbotron">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 class="text-center">{{ $user->name }} ({{ $user->id }})</h2>
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-9">
                                    @if (count($details) > 0)
                                        @foreach ($details as $detail)
                                            <h4>Basic Salary == <strong>{{ $detail->basic_salary }}</strong></h4>
                                            <h4>Transport Allowances: <strong>{{ $detail->transport_allowences }}</strong></h4>
                                            <h4>Employees Provident Fund(EPF): <strong>{{ $detail->epf }}</strong></h4>
                                            <h4>Employees Trust Fund(ETF): <strong>{{ $detail->etf }}</strong></h4>
                                            <br>
                                            <h4>Total Salary: <strong>{{ $detail->total_salary }}</strong></h4>
                                            <small>Date Created: <strong>{{ $detail->date }}</strong></small>
                                            @endforeach
                                    @else
                                        <p>No payroll details withing this period.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection