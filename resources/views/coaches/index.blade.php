@extends('layouts.base')
@section('content')
<a class="btn btn-app" href="{{route('coaches.create')}}">
    <i class="fa fa-edit"></i>
        Add Coach
  </a>
  <button type="button" id="deleteRecord" data-id="'+row.id+'">Delete</button>
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
                {
                    mRender: function (data, type, row) {
                        return '<a href="/coaches/'+row.id+'/edit" class="table-edit" data-id="' + row.id + '"><button type="button" class="btn btn-block btn-success btn-flat">Edit</button></a>'
                    }
                },{
                    mRender: function (data, type, row) {
                       return '<meta name="csrf-token" content="{{ csrf_token() }}"><a type="button" id="deleteRecord" data-id="'+row.id+'">Delete</a>'
                    }
                }
            ]
        } );
        $("#deleteRecord").click(function(){
        console.log("function called");

        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
        {
            url: "coaches/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
                },
            success: function (){
                console.log("it Works");
                }

});



});

    } );




    </script>

@endsection





