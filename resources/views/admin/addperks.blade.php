@extends('layouts.app')
    @section('content')
        <div class="container">
            <h1 class="text-center">Add a New Perk</h1><br><br>
            {!! Form::open(['method'=>'POST']) !!}
                <div class="form-group row">
                    {{ Form::label('userid', 'Employee Name', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{-- {{ Form::text('userid', '', ['class' => ['form-control', $errors->has('userid') ? 'is-invalid' : ''], 'autofocus']) }} --}}
                        <input list="userid" name="userid" class="form-control {{ $errors->has('errors') ? 'is-invalid' : '' }}" autofocus>
                        <datalist id="userid">
                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">
                            @endforeach
                        </datalist>
                        @if ($errors->has('userid'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('userid') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('description', 'Perk Description', ['class'=>['col-md-4', 'col-form-label', 'text-md-right']]) }}
                    <div class="col-md-6">
                        {{ Form::textarea('description', '', ['class' => ['form-control', $errors->has('description') ? 'is-invalid' : ''], 'autofocus']) }}
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        {{ Form::submit('Add Perk', ['class'=>['btn', 'btn-primary', 'float-right']]) }}
                    </div>
                </div>
            {!! Form::close() !!}
            <br>
            <h3 class="text-center">Perks</h3><br>
            <h5 class="float-right">
                <strong>{{ $perks->total() }} Perks</strong>
            </h5>
            @if (count($perks) > 0)
            <table class="table table-stripped" id="perks_table">
                <thead>
                    <tr>
                        <th>Employee ID </th>
                        <th>Name</th>
                        <th>Perk Description</th>
                        <th>Perk Entered By Admin On</th>
                    </tr>
                </thead>
            </table>
            {{ $perks->links() }}
            @else
            <p>You Have No Perks Yet...</p>
            @endif
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                $('#perks_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('ajaxdata.getperks') }}",
                    "columns": [
                        { "data": "employee_id" },
                        { "data": "name" },
                        { "data": "perk_description" },
                        { "data": "created_at" },
                    ],
                });
            });
        </script>
    @endsection