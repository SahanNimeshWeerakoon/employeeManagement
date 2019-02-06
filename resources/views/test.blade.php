@extends('layouts.app')
    @section('content')
    <br>
        <div class="container">
            <table id="user_table" class="table table-bordered" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>View</th>
                    </tr>
                </thead>
            </table>
        </div>
    @endsection
    @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#user_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('ajaxdata.getdata') }}",
                    "columns":[
                        { "data": "id" },
                        { "data": "name" },
                        { "data": "contact" },
                        { "data": "action", ordarable: false, searchable: false }
                    ]
                });
            });
        </script>
    @endsection