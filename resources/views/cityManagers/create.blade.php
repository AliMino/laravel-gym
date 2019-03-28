@extends('layouts.base')
@section('content')


    @if(auth()->user() && auth()->user()->can('manage city managers'))
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <a href="{{route('citymanagers.index')}}">
            <button class="btn btn-primary">View all City managers</button>
        </a>
        <form action="{{route('citymanagers.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">National ID</label>
                <input name="national_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <select class="form-control" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}} - {{$city->country->name}}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <div style="margin-left:30%;margin-top:20px;">
            <h2>You don't have the premission to manage city manager</h2>
            <a href="{{url('login')}}">click here to login</a>
        </div>
    @endif

@endsection