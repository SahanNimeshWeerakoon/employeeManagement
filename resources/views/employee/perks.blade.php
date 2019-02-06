@extends('layouts.app')
    @section('content')
        <div class="container">
            <br>
            <h3 class="text-center">My Perks</h3>
            <hr>
            <br>
            @if (count($perks) > 0)
                <table class="table table-success table-hover">
                    <tr>
                        <th>Perk Description</th>
                        <th>Date</th>
                    </tr>
                    @foreach ($perks as $perk)
                        <tr>
                            <td>{{ $perk->perk_description }}</td>
                            <td>{{ $perk->created_at }}</td>
                        </tr>
                    @endforeach
                </table>
                {{ $perks->links() }}
            @else
            <h4 class="text-center">You have no perks yet. Work harder. You will get one soon....</h4>
            @endif
        </div>
    @endsection