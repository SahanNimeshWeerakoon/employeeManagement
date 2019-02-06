@extends('layouts.app')
    @section('content')
        <div class="container">
            {{-- @if (count($deletedUsers)>0)
                @foreach ($deletedUsers as $deletedUser)
                    <p>{{ $deletedUser  ->name }}</p>
                @endforeach
            @endif --}}
            <table class="table" id="deleted-employees">
                <thead>
                    <tr class="danger">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>View Details</th>
                    </tr>
                </thead>
            </table>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $('#deleted-employees').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('ajaxdata.getdeletedemployees') }}",
                    "columns": [
                        { "data": "id" },
                        { "data": "name" },
                        { "data": "contact" },
                        { "data": "action" }
                    ]
                });
            });
        </script>
        {{-- <script>
            $(document).ready(function() {
                $('#all_employees').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('ajaxdata.getdata') }}",
                    "columns": [
                        { "data": "id" },
                        { "data": "name" },
                        { "data": "contact" },
                        { "data": "action", ordarable: false, searchable: false, }
                    ],
                });
            });
        </script> --}}
    @endsection