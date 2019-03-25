@extends('layouts.base')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Packages Table</h3><br>
                    <a href='/packages/create' style="margin-top: 10px;" class="btn btn-success">Create Package</a>
                </div>                
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>                            
                            <th>Gym</th>
                            <th>No of Sessions</th>
                            <th>Price in Dollars </th>
                            <th>Created At</th>
                            <th>Updated At</th>                            
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                    </table>
                </div>                
            </div>            
        </div>        
    </div>    
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Delete Package?? Are you sure?</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <div>
                        <div id="csrf_value"  hidden >@csrf</div>
                        {{--@method('DELETE')--}}
                        <button type="button" row_delete="" id="delete_item"  class="btn btn-danger" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>        
@endsection
@section('extra_scripts')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable( {
            serverSide: true,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/data_packages',
                dataType : 'json',
                type: 'get',            
            },
            columns: [
                { data: 'id', name: 'id' },                
                { data: 'gyms.name', name: 'gyms.name' },
                { data: 'no_of_sessions', name: 'no_of_sessions' },
                { data: 'price_cents', name: 'price_cents'},
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },

                /* Show */ {
                    mRender: function (data, type, row) {
                        return '<a href="/packages/'+row.id+'" class="table-delete btn btn-info" data-id="' + row.id + '">Show</a>'
                    }
                },
                /* EDIT */ {
                    mRender: function (data, type, row) {
                        return '<a href="/packages/'+row.id+'/edit" class="table-edit btn btn-warning" data-id="' + row.id + '">EDIT</a>'
                    }
                },
                /* DELETE */ {
                    mRender: function (data, type, row) {
                        return '<a href="#" class="table-delete btn btn-danger" row_id="' + row.id + '" data-toggle="modal" data-target="#DeleteModal" id="delete_toggle">DELETE</a>'
                    }
                },
            ],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
        } );
        // delete item script
        $(document).on('click','#delete_toggle',function () {
            var delete_id = $(this).attr('row_id');
            $('#delete_item').attr('row_delete',delete_id);
        });

        $(document).on('click','#delete_item',function () {
            var package_id = $(this).attr('row_delete');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/packages/'+package_id,
                type: 'DELETE',
                success: function (data) {
                    console.log('success');
                    console.log(data);
                    var table = $('#example').DataTable();
                    table.ajax.reload();
                },
                error: function (response) {
                    alert(' error');
                    console.log(response);
                }
            });
        });
    </script>
@endsection