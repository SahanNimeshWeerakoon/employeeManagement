@extends('layouts.app')
    @section('content')
    <br>
    <div class="container">
        @include('inc.seeattendence')
        <br>
        <h3 class="text-center">Attendence for Month {{$month}} </h3>
        <br>
        <p class="text-primary float-right"><i>Total Attendece In {{$month}}<sup>th</sup> Month: &nbsp; {{ $total }}</i></p>
        <br>
        <br>
        @if (count($attendences) > 0)
            <table class="table tabel-stripped">
                <tr>
                    <th>ID</th>
                    <th>Attendence</th>
                    <th>Name</th>
                    <th>View Employee</th>
                </tr>
                @foreach ($attendences as $attendence)
                    <tr>
                        <td>{{ $attendence->employee_id }}</td>
                        <td>{{ $attendence->total }}</td>
                        <td>{{ $attendence->name }}</td>
                        <td>
                            {!! Form::open(['url'=>'search', 'method'=>'POST']) !!}
                                {{Form::hidden('emp_id', $attendence->employee_id)}}
                                {{Form::submit('View', ['class'=>['btn', 'btn-default']])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="text-center text-secondary">No Records For This Month....</p>
        @endif
    </div>
    @endsection