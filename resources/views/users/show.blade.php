@extends('layouts.base')
@section('content')

  @if(auth()->user())

  <a href="{{route('users.edit',$user->id)}}">
    <button class="btn btn-primary">Edit</button>
  </a>
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ URL::to('/') }}/img/avatar.png" alt="User profile picture">
        <h3 class="profile-username text-center">{{$user->name}}</h3>
        <p class="text-muted text-center">{{$user->roles->first()->name}}</p>
      </div>
    </div>

    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <div class="box-body">
            <strong><i class="glyphicon glyphicon-envelope"></i> Email</strong>
            <p class="text-muted">{{$user->email}}</p>
            <hr>
        </div>

        @if($user->roles->first()->name=="city manager" || $user->roles->first()->name=="gym manager")
            <div class="box-body">
                <strong><i class="glyphicon glyphicon-ok"></i> National ID</strong>
                <p class="text-muted">{{$user->national_id}}</p>
                <hr>
            </div>
        @endif

        @if($user->roles->first()->name=="city manager")
            <div class="box-body">
                <strong><i class="glyphicon glyphicon-globe"></i> City Name</strong>
                <p class="text-muted">{{$user->city->name}}</p>
                <hr>
            </div>

        @endif

        @if($user->roles->first()->name=="gym manager")
            <div class="box-body">
                <strong><i class="glyphicon glyphicon-globe"></i> GYM Name</strong>
                <p class="text-muted">{{$user->gym->name}}</p>
                <hr>
            </div>

            <div class="box-body">
            <strong><i class="glyphicon glyphicon-globe"></i> City Name</strong>
            <p class="text-muted">{{$user->gym->city->name}} - {{$user->gym->city->name}}</p>
            <hr>
            </div>
        @endif

      </div>
    </div>
  @else
    <div style="margin-left:30%;margin-top:20px;">
      <h2>You don't have the premission to manage city manager</h2>
      <a href="{{url('login')}}">click here to login</a>
    </div>
  @endif
    

@endsection