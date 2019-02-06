@extends('layouts.app')
    @section('content')
        <div class="container">
            <br>
            <h3 class="text-center">({{$user->id}}) {{$user->name}}</h3>
            <br>
            <table class="table">
                <tr>
                    <th>NIC</th>
                    <td>{{ $user->nic }}</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>{{ $user->contact }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <th>Date Joined</th>
                    <td>{{ $user->date_joined }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{ $department->department_name }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Basic Salary</th>
                    <td>{{ $user->basic_salary }}</td>
                </tr>
                <tr>
                    <th>Transport Allowances</th>
                    <td>{{ $user->transport_allowances }}</td>
                </tr>
                <tr>
                    <th>Attendence Today</th>
                    <td><strong>{{ $attendence }}</strong></td>
                </tr>
                <tr>
                    <th>Perks Count</th>
                    <td>{{ $perks }}</td>
                </tr>
                <tr>
                    <th>Tasks Complete</th>
                    <td>{{ $tasksCompleted }}</td>
                </tr>
                <tr>
                    <th>Tasks Incomplete</th>
                    <td>{{ $tasksIncompleted }}</td>
                </tr>
            </table>
            <div class="float-right">
                {!! Form::open(['method'=>'POST', 'url' => "/delete/$user->id"]) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('DELETE', ['class'=>['btn', 'btn-danger']])}}
                {!! Form::close() !!}
            </div>
            <div class="float-left">
                <a href="/employee/edit/{{$user->id}}" class="btn btn-warning">EDIT</a>
            </div>
        </div>
        <br><br>
    @endsection