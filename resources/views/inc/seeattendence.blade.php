<div class="row">
    <div class="col-md-6">
        {!! Form::open(['method'=>'POST', 'class'=>'float-left', 'url'=>'/seeattendence/month']) !!}
        @csrf
        {{ Form::label('month', 'Filter By Month') }}
        <div class="row">
            <div class="col-md-8" style="display:flex; align-items: center; flex-direction: column;">
                {{ Form::month('month', '', ['class'=>['form-control', $errors->has('month') ? 'is-invalid' : ''], 'autofocus', 'required']) }}
                @if ($errors->has('month'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('month') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-4" style="display:flex; align-items: center;">
                {{ Form::submit('FILTER', ['class'=>['btn', 'btn-info']]) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        {!! Form::open(['method'=>'POST', 'class'=>'float-right', 'url'=>'/seeattendence/date']) !!}
        @csrf
        {{ Form::label('date', 'Filter By date') }}
        <div class="row">
            <div class="col-md-8" style="display:flex; align-items: center; flex-direction: column;">
                {{ Form::date('date', '', ['class'=>['form-control', $errors->has('date') ? 'is-invalid' : ''], 'autofocus', 'required']) }}
                @if ($errors->has('date'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-4" style="display:flex; align-items: center;">
                {{ Form::submit('FILTER', ['class'=>['btn', 'btn-info']]) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>