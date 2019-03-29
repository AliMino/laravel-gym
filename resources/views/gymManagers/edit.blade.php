@extends('layouts.base')
@section('content')
    
    @if(auth()->user() && auth()->user()->can('manage gym managers'))
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('gymmanagers.update',$gymmanager->id)}}" method="POST">
            @csrf
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" value="{{$gymmanager->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" value="{{$gymmanager->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">National ID</label>
                <input name="national_id" type="text" value="{{$gymmanager->national_id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>



            <div class="form-group">
                <label for="exampleInputPassword1"></label>
                <select class="form-control" name="gym_id">
                    @foreach($gyms as $gym)
                        <option value="{{$gym->id}}">{{$gym->name}}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <div style="margin-left:30%;margin-top:20px;">
            <h2>You don't have the premission to manage gym managers</h2>
            @if(auth()->user() == null)
                <a href="{{url('login')}}">click here to login</a>
            @else
                <h4>this page only available for admins & city managers</h4>
            @endif
        </div>
    @endif

@endsection