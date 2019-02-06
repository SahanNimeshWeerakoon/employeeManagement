@extends('layouts.app')
    @section('content')
        <div class="container">
            <br><br>
            <h3 class="text-center">Request A Leave</h3><br>
            {!! Form::open(['method'=>'POST']) !!}
                @csrf
                <div class="form-group row">
                    {{ Form::label('reason', 'Reason', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::textarea('reason', '', ['class' => ['form-control', $errors->has('reason') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('reason'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('reason') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('from', 'Date From', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::date('from', '', ['class' => ['form-control', $errors->has('from') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('from'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('from') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('to', 'Date To', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::date('to', '', ['class' => ['form-control', $errors->has('to') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('to'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('to') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        {{ Form::submit('REQUEST', ['class'=>['btn', 'btn-success', 'float-right']]) }}
                    </div>
                </div>
            {!! Form::close() !!}

            <h4 class="text-center">Your Total Leaves</h4>
            @if (count($leaves) > 0)
                <table class="table table-stripped">
                    <tr>
                        <th>From</th>
                        <th>To</th>
                        <th>Reason</th>
                        <th>When Did Request</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($leaves as $leave)
                        <tr>
                            <td>{{$leave->date_from}}</td>
                            <td>{{ $leave->date_to }}</td>
                            <td>{{ $leave->reason }}</td>
                            <td>{{ $leave->created_at }}</td>
                            <td>
                                @if ($leave->status == 0)
                                    <p class="text-info">Pending</p>
                                @endif
                                @if ($leave->status == 1)
                                    <p class="text-success">Accepted</p>
                                @endif
                                @if ($leave->status == 2)
                                    <p class="text-danger">Rejected</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $leaves->links() }}
            @else
            
            @endif
        </div>
    @endsection