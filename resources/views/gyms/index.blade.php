@extends('layouts.base')
@section('content')

    @if(auth()->user() && auth()->user()->can('manage gyms'))
        <section class="content">
            <div class="row">
                
                <div class="col-xs-12">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Gyms Table</h3><br>
                            <a href="{{route('gyms.create')}}" style="margin-top: 10px;" class="btn btn-primary">Add New Gym</a>
                        </div>
                        <div class="box-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">City</th>
                                        <!-- <th scope="col">Gym Manager Name</th> -->
                                        <th scope="col">Created at</th>
                                        <th scope="col">Cover Photo</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
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
            <h2>You don't have the premission to manage gyms</h2>
            <a href="{{url('login')}}">click here to login</a>
        </div>
    @endif

  @endsection
  @section('scripts')
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
        $('#example').DataTable( {
            serverSide: true,
            ajax: {
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: '/data_gyms',
                dataType : 'json',
                type: 'get',            
            },
            columns: [ { data: 'name'}, { data: 'city'}, { data: 'timestamp'}, {
                    //image
                    mRender: function (data, type, row) {
                        return '<img src="'+row.image+'" height="50" width="100">'
                    }
                }, {
                    /* EDIT */ 
                    mRender: function (data, type, row) {
                        return '<a href="/gyms/'+row.id+'/edit" class="table-edit btn btn-warning" data-id="' + row.id + '">EDIT</a>'
                    }
                }, {
                    /* DELETE */ 
                    mRender: function (data, type, row) {
                        return '<a  href="#" class="delete" id="'+row.id+'"><buttontype="button" class="btn btn-block btn-danger"> Delete </button></a>'
                    }
                },
            ],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
        });
        $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this Package?")) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/gyms/"+id,
                type:'DELETE',
                success:function(data)
                {
                    alert("package deleted successfully");
                    $('#example').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    });
    </script>
@endsection
