@extends('layouts.app')
    @section('content')
        <div class="container">
            <br>
            <br>
            @if (count($tasks) > 0)
                <table class="table table-stripped">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($tasks as $task)
                    <tr>
                        <td class="text-secondary">{{ $task->task_title }}</td>
                        <td class="text-secondary">{{ $task->task_description }}</td>
                        <td>
                            @if ($task->status == 0)
                            {!! Form::open(['method'=>'POST']) !!}
                            {{ Form::hidden('id', $task->id) }}
                            {{ Form::submit('SUBMIT', ['class'=>['btn', 'btn-primary']]) }}
                            {!! Form::close() !!}
                            @else
                            <p class="text-success">DONE</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $tasks->links() }}
            @else
                <h2 class="text-center text-secondary">No Tasks Yet</h2>
            @endif
        </div>
    @endsection