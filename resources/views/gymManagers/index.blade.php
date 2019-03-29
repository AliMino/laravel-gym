@extends('layouts.base')

@section('content')
    @if(auth()->user() && auth()->user()->can('manage gym managers'))
        <section class="content">
            <div class="row">
                <a href="{{route('gymmanagers.create')}}">
                    <button class="btn btn-primary" style="margin-left:15px;margin-bottom:15px">Add Gym Manager</button>
                </a>
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Gym Managers</h3>
                        </div>
                        <div class="box-body">
                            <table id="gymmanagers" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>National ID</th>
                                        <th>GYM</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Ban/UnBan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div style="margin-left:30%;margin-top:20px;">
            <h2>You don't have the premission to manage gym managers</h2>
            @if(auth()->user() == null)
                <a href="{{url('login')}}">click here to login</a>
            @else
                <h4>this page only available for admins & city managers</h4>
            @endif
        </div>
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#gymmanagers').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax":"/gymmanagersdata",
                "type":"get",
                "columns": [ { "data": "id" }, { "data": "name" }, { "data": "email" }, { "data": "national_id" }, { "data": "gym_id" }, {
                    mRender: function (data, type, row) {
                        return '<center><a href="/gymmanagers/'+row.id+'/edit"  class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a></center>'
                    }
                }, {
                    mRender: function (data, type, row) {
                        return '<center><a href=""  id="delete" row_id="'+row.id+'" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></center>'
                    }
                }, {
                    mRender: function (data, type, row) {
                        if(!row.banned_at)
                            return '<center><a href="/ban/'+row.id+'" class="btn btn-success" title="unbanned user"><i class="glyphicon glyphicon-ok-circle"></i></a></center> '
                        else
                            return '<center><a href="/unban/'+row.id+'" class="btn btn-danger" title="banned user"><i class="glyphicon glyphicon-ban-circle"></i></a></center> '

                    }
                },
            ],
        } );

        $(document).on('click', '.delete', function(){
        var id = $(this).attr('row_id');
        if(confirm("Are you sure you want to Delete ?"))
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/gymmanagers/"+id,
                type:'DELETE',
                success:function(data)
                {
                    alert("Coach deleted successfully");
                    $('#gymmanagers').DataTable().ajax.reload();
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
