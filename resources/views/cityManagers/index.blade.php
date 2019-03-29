@extends('layouts.base')
@section('content')

    @if(auth()->user() && auth()->user()->can('manage city managers'))
        <section class="content">
            <div class="row">
                <a href="{{route('citymanagers.create')}}">
                    <button class="btn btn-primary" style="margin-left:15px;margin-bottom:15px">Add City Manager</button>
                </a>
                <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">City Managers</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="citymanagers" class="table table-bordered table-striped">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <thead>
                        <tr>
                        
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>National ID</th>
                        <th>City</th>
                        <th>Country</th>
                        <th><center>Show</center></th>
                        <th><center>Edit</center></th>
                        <th><center>Delete</center></th>
                        
                        </tr>
                        </thead>
                        
                    </table>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    @else
        <div style="margin-left:30%;margin-top:20px;">
            <h2>You don't have the premission to manage city manager</h2>
            <a href="{{url('login')}}">click here to login</a>
        </div>
    @endif
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#citymanagers').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":"/citymanagersdata",
            "type":"get",
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "email" },
                { "data": "national_id" },
                { "data": "city.name" },
                { "data": "countryName" },
                {
                    mRender: function (data, type, row) {
                        return '<center><a href="/citymanagers/'+row.id+'"  class="btn btn-info"><i class="glyphicon glyphicon-chevron-right"></i></a></center>'
                    }
                },
                {
                    mRender: function (data, type, row) {
                        return '<center><a href="/citymanagers/'+row.id+'/edit"  class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a></center>'
                    }
                },
                {
                    mRender: function (data, type, row) {
                        return '<a  href="#" class="delete" id="'+row.id+'"><buttontype="button" class="btn btn-block btn-danger btn-flat"> Delete </button></a>'
                    }
                },
            ],
        } );
        $(document).on('click', '.delete', function(){
            var id = $(this).attr('id');
            if(confirm("Are you sure you want to Delete this city Manager?"))
            {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"/citymanagers/"+id,
                    type:'DELETE',
                    success:function(data)
                    {
                        alert("Manager deleted successfully");
                        $('#citymanagers').DataTable().ajax.reload();
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
