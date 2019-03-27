@extends('layouts.base')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<a class="btn btn-app" href="{{route('sessions.create')}}">
    <i class="fa fa-edit"></i>
        Add Session
  </a>

  <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Sessions Table</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="session" class="table table-bordered table-hover">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>starts at</th>
                    <th>ends at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>Name</th>
                    <th>starts at</th>
                    <th>ends at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
          </div>
        </div>
  </section>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#session').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":"/sessionsdata",
            "type":"get",
            "columns": [
                { "data": "name" },
                { "data": "start_at" },
                { "data": "end_at" },
                {
                    mRender: function (data, type, row) {
                        return '<a href="/sessions/'+row.id+'/edit" class="table-edit" data-id="' + row.id + '"><button type="button" class="btn btn-block btn-success btn-flat">Edit</button></a>'
                    }
                },{
                    mRender: function (data, type, row) {
                       return '<a  href="#" class="delete" id="'+row.id+'" data-token="{{ csrf_token() }}"><buttontype="button" class="btn btn-block btn-danger btn-flat"> Delete </button></a>'
                    }
                }
            ]
        } );
        $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        var token = $(this).data('token');
        if(confirm("Are you sure you want to Delete this session ?"))
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/sessions/"+id,
                type:"DELETE",
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": "DELETE",
                    "_token": token,
                },
                success:function(data)
                {
                    alert("session deleted successfully");
                    $('#session').DataTable().ajax.reload();
                },
                error:function(data){
                    alert("Some members are attending this session");
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
