@extends('layouts.base')
@section('content')
<a class="btn btn-app" href="{{route('coaches.create')}}">
    <i class="fa fa-edit"></i>
        Add Coach
  </a>

<table id="coach" class="display" style="width:100%">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                       return '<a  href="#" class="delete" id="'+row.id+'"><buttontype="button" class="btn btn-block btn-danger btn-flat"> Delete </button></a>'
                    }
                }
            ]
        } );
        $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this Coach?"))
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/coaches/"+id,
                type:'DELETE',
                success:function(data)
                {
                    alert("Coach deleted successfully");
                    $('#coach').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    });

    } );




    </script>

@endsection





