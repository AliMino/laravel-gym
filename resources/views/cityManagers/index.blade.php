@extends('layouts.base')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">City Managers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="citymanagers" class="table table-bordered table-striped">
                <thead>
                <tr>
                
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>National ID</th>
                  <th>City</th>
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
<!-- /.content -->

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
                { "data": "city_id" },
                {
                    mRender: function (data, type, row) {
                        return '<center><a href="" class="btn btn-info"><i class="glyphicon glyphicon-chevron-right"></i></a></center>'
                    }
                },
                {
                    mRender: function (data, type, row) {
                        return '<center><a href="" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a></center>'
                    }
                },
                {
                    mRender: function (data, type, row) {
                        return '<center><a href="" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></center>'
                    }
                },
            ],
        } );
    } );
    </script>


@endsection
