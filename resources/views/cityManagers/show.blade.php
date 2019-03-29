@extends('layouts.base')
@section('content')

  @if(auth()->user() && auth()->user()->can('manage city managers'))
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ URL::to('/') }}/img/avatar.png" alt="User profile picture">
        <h3 class="profile-username text-center">{{$citymanager->name}}</h3>
        <p class="text-muted text-center">City Manager</p>
      </div>
    </div>

    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <div class="box-body">
            <strong><i class="glyphicon glyphicon-envelope"></i> Email</strong>
            <p class="text-muted">{{$citymanager->email}}</p>
            <hr>
        </div>

        <div class="box-body">
            <strong><i class="glyphicon glyphicon-ok"></i> National ID</strong>
            <p class="text-muted">{{$citymanager->national_id}}</p>
            <hr>
        </div>

        <div class="box-body">
            <strong><i class="glyphicon glyphicon-globe"></i> City Name</strong>
            <p class="text-muted">{{$citymanager->city->name}}</p>
            <hr>
        </div>

        <div class="box-body">
          <strong><i class="glyphicon glyphicon-globe"></i> Country Name</strong>
          <p class="text-muted">{{$citymanager->city->country->name}} - {{$citymanager->city->country->full_name}}</p>
          <hr>
        </div>
      </div>
    </div>
  @else
    <div style="margin-left:30%;margin-top:20px;">
      <h2>You don't have the premission to manage city manager</h2>
      <a href="{{url('login')}}">click here to login</a>
    </div>
  @endif
    

@endsection