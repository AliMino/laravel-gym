@extends('layouts.base')
@section('content')
<table id="coach" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    {{-- <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </tfoot> --}}
</table>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#coach').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":"/coachdata",
            "type":"get",
            "columns": [
                { "data": "id" },
                { "data": "name" },
                ,{
                    mRender: function (data, type, row) {
                        return '<a href="/'+row.id+'" class="table-edit" data-id="' + row.id + '">EDIT</a>'
                    }
                },

            ],
        } );
    } );
    </script>

@endsection





