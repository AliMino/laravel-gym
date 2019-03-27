@extends('layouts.base')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Attendance Table</h3><br>                    
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Training Session</th>
      <th scope="col">Attendance Time</th>
      <th scope="col">Attendance Date</th>  
             
    </tr>
  </thead>
</table>
</div>                
            </div>      
        </div>        
    </div>    
    @endsection
    @section('scripts')
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable( {
            serverSide: true,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/data_attend',
                dataType : 'json',
                type: 'get',            
            },
            columns: [
                { data: 'member.name' },                                               
                { data: 'member.email'},
                { data: 'session.name'},
                { data: 'attendance_time' },
                { data: 'attendance_date'},
                
               
            ],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
        } ); </script>
 @endsection

