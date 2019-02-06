@extends('layouts.app')
    @section('content')
        <div class="not-found container" style="display: flex; position: absolute; z-index: -5; justify-content: center; align-items: center; top: 0; bottom: 0; left: 0; right: 0;">
            @if ($notfound == 'user')
                <h1>There Is No Employee With This ID</h1>
            @endif
            @if ($notfound == 'admin')
                <h1>You Are Trying To Search An Admin Profile. Please Check The ID Again</h1>
            @endif
        </div>
    @endsection