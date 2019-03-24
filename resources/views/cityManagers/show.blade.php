@extends('layouts.base')
@section('content')

<!--<section class="content">

<div class="row">
  <div class="col-md-3">

    <!--Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ URL::to('/') }}/img/avatar.png" alt="User profile picture">

        <h3 class="profile-username text-center">{{$citymanager->name}}</h3>

        <p class="text-muted text-center">City Manager</p>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <div class="col-md-9">
        <div class="nav-tabs-custom">
    <div class="box-body">
        <strong><i class="glyphicon glyphicon-envelope"></i> Email</strong>
        <p class="text-muted">
        {{$citymanager->email}}
        </p>
        <hr>
    </div>

    <div class="box-body">
        <strong><i class="glyphicon glyphicon-ok"></i> National ID</strong>
        <p class="text-muted">
        {{$citymanager->national_id}}
        </p>
        <hr>
    </div>

    <div class="box-body">
        <strong><i class="glyphicon glyphicon-globe"></i> City ID</strong>
        <p class="text-muted">
        {{$citymanager->city->name}}
        </p>
        <hr>
    </div>

</div>
</div>

    

@endsection