@extends('layouts.base')
@section('content')

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
            <!-- /.box-header -->
            <div class="box-body">
              <table id="gymmanagers" class="table table-bordered table-striped">
                <thead>
                <tr>
                
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>National ID</th>
                  <th>GYM</th>
                  <th><center>Edit</center></th>
                  <th><center>Delete</center></th>
                  <th><center>Ban/UnBan</center></th>
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
<!-- /.content -->

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#gymmanagers').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":"/gymmanagersdata",
            "type":"get",
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "email" },
                { "data": "national_id" },
                { "data": "gym_id" },
                {
                    mRender: function (data, type, row) {
                        return '<center><a href="/gymmanagers/'+row.id+'/edit"  class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a></center>'
                    }
                },
                {
                    mRender: function (data, type, row) {
                        return '<center><a href="/gymmanagers/'+row.id+'"  class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></center>'
                    }
                },
                {
                    mRender: function (data, type, row) {

                        if(!row.banned_at)
                            return '<center><a href="/ban/'+row.id+'"  class="btn btn-danger" title="ban"><i class="glyphicon glyphicon-ban-circle"></i></a></center>'
                        else
                            return '<center><a href="/unban/'+row.id+'"  class="btn btn-success" title="unban"><i class="glyphicon glyphicon-ok-circle"></i></a></center>'

                    }   
                },
            ],
        } );
    } );
    </script>


@endsection
