@extends('layouts.app')
    @section('content')
        <div class="container">
            <br>
            @include('inc.seeattendence')

            <br>

            <h3 class="text-center">Todays Attendence</h3>
            
            <br>
            
            @if (count($attendences) > 0)
                <table class="table tabel-stripped">
                    <tr>
                        <th>ID</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Name</th>
                        <th>View Employee</th>
                    </tr>
                    @foreach ($attendences as $attendence)
                        <tr>
                            <td>{{ $attendence->employee_id }}</td>
                            <td>{{ $attendence->time_in }}</td>
                            <td>
                                @if ($attendence->time_out)
                                    {{ $attendence->time_out }}
                                @else
                                    <p class="text-secondary">Still In The Office</p>
                                @endif
                            </td>
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
                    <p class="text-secondary text-center">No One Came Today Yet</p>
                @endif
            {{ $attendences->links() }}
        </div>
    @endsection