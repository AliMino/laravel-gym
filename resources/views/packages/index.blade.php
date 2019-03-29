@extends('layouts.base')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Packages Table</h3><br>
                    <a href="{{route('packages.create')}}" style="margin-top: 10px;" class="btn btn-success">Create Package</a>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">No of Sessions</th>
                            <th scope="col">Price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletepopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this Package</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <div id="csrf_value"  hidden >@csrf</div>
                            <button type="button" row_delete="" id="delete_item"  class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

</section>
@endsection
@section('scripts')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
        $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":"/data_packages",
            "type":"get",
            "columns": [
                { "data": "name" },
                { "data": "no_of_sessions" },
                { "data": "price_cent" },
                {
                    mRender: function (data, type, row) {
                        return '<a href="/packages/'+row.id+'/edit" class="table-edit" data-id="' + row.id + '"><button type="button" class="btn btn-block btn-success btn-flat">Edit</button></a>'
                    }
                },{
                        mRender: function (data, type, row) {
                            return '<center><a href="#" class="table-delete btn btn-danger" row_id="' + row.id + '" data-toggle="modal" data-target="#deletepopup" id="delete_toggle">Delete</a></center>'
                        }
                    },
            ]
        } );
        $(document).on('click','#delete_toggle',function () {
                var delete_id = $(this).attr('row_id');
                $('#delete_item').attr('row_delete',delete_id);
            });
            $(document).on('click','#delete_item',function () {
                var id = $(this).attr('row_delete');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/packages/'+id,
                    type: 'DELETE',
                    success: function (data) {
                        var table = $('#example').DataTable();
                        table.ajax.reload();
                    },
                    error: function (response) {
                        alert(' error');

                    }
                });
            });
        });
    </script>

@endsection
