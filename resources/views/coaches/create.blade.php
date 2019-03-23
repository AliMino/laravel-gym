@extends('layouts.base')
@section('content')
 <!-- general form elements -->
 <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add new coach</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{route('coaches.store')}}">
        @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input  class="form-control" id="exampleInputEmail1" placeholder="Enter coach name" name="name">
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
@endsection

@section('scripts')

@endsection
