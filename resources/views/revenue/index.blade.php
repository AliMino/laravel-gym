@extends('layouts.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <I>
                <h3>Total Revenue</h3>
                @if(auth()->user()->getRole()->name == "admin")
                    <h4>for whole system</h4>
                @elseif(auth()->user()->getRole()->name == "city manager")
                    <h4>for city '{{auth()->user()->city()->name}}'</h4>
                @elseif(auth()->user()->getRole()->name == "city manager")
                    <h4>for gym '{{auth()->user()->gym()->name}}'</h4>
                @endif
            </I>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
                <I><h2>{{$totalSum}}</h2></I>
            <footer class="blockquote-footer"><I>$USD</I></footer>
          </blockquote>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Purchased Packages Table</h3><br>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">Package ID</th>
                                    <th scope="col">Paid Price</th>
                                    <th scope="col">Gym ID</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#example').DataTable({
                serverSide: true,
                ajax: {
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: '/revenue/datatable',
                    dataType : 'json',
                    type: 'get',
                }, columns: [ { data: 'member_id' }, { data: 'package_id'}, { data: 'paid_price'}, { data: 'gym_id' } ],
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : true,
            });
        });
    </script>
@endsection

