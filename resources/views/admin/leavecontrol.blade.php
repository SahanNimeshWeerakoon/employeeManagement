@extends('layouts.app')
    @section('content')
        <div class="container">
            <br><br>
            <h3 class="text-center">Leave Management</h3>
            <br>
            
            @if (count($leaves) > 0)
                <table class="table table-stripped" id="leaves-control-table">
                    <tr>
                        <th>Employee ID(Name)</th>
                        <th>Reason</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Manage</th>
                    </tr>
                    @foreach ($leaves as $leave)
                    <tr>
                        <td>{{ $leave->employee_id }} ({{$leave->name}})</td>
                        <td>{{ $leave->reason }}</td>
                        <td>{{ $leave->date_from }}</td>
                        <td>{{ $leave->date_to }}</td>
                        <td>
                            <div class="row">
                                <div class="com-md-6">
                                    <form action="/confirmleave/{{$leave->id}}" method="POST">
                                        @csrf
                                        <input type="submit" value="CONFIRM" class="btn btn-success">
                                    </form>
                                </div>
                                <div class="com-md-6">
                                    <form action="/rejectleave/{{$leave->id}}" method="POST">
                                        @csrf
                                        <input type="submit" value="REJECT" class="btn btn-danger">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            @else
                <p>No Leaves Yet</p>
            @endif
        </div>
    @endsection
    @section('script')
        
    @endsection

