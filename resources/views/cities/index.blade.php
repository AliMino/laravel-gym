@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquey.datatables.css">
@endsection
@section('content')

    @if(auth()->user() && auth()->user()->can('manage cities'))
        <div class="col">
            <a href="{{ url('cities/create') }}">
                <button class="btn btn-primary">Add new city</button>
            </a>
            <table id="datatable">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <thead>
                    <th>ID</th>
                    <th>City Name</th>
                    <th>Country Name</th>
                    <th>Edit City</th>
                    <th>Delete City</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    @else
        <div style="margin-left:30%;margin-top:20px;">
            <h2>You don't have the premission to manage cities</h2>
            <a href="{{url('login')}}">
                <button class="btn btn-primary">click here to login</button>
            </a>
        </div>
    @endif


@endsection
@section('scripts')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquey.datatables.js"></script>
    <script>    
        $(document).ready(function() {
        $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":"/cities/datatable",
            "type":"get",
            "columns": [ { "data": "id" }, { "data": "name" }, { "data": "country.name" }, {
                    mRender: function (data, type, row) {
                        return '<a href="/cities/'+row.id+'/edit" class="table-edit" data-id="' + row.id + '"><button type="button" class="btn btn-block btn-warning">Edit</button></a>'
                    }
                },{
                mRender: function (data, type, row) {
                    return '<a  href="#" class="delete" id="'+row.id+'"><buttontype="button" class="btn btn-block btn-danger btn-flat"> Delete </button></a>'
                    }
                }
            ]
        });
            $(document).on('click', '.delete', function(){
                var id = $(this).attr('id');
                if(confirm("Are you sure you want to Delete this city?"))
                {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:"/cities/"+id,
                        type:'DELETE',
                        success:function(data)
                        {
                            alert("city deleted successfully");
                            $('#datatable').DataTable().ajax.reload();
                        }
                    })
                }
                else
                {
                    return false;
                }
            });

        });
    </script>
    
@endsection
