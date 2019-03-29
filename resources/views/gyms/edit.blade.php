@extends('layouts.base')
@section('content')

    @if(auth()->user() && auth()->user()->can('manage gyms'))
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a href="{{route('gyms.index')}}">
            <button class="btn btn-primary">View All Gyms</button>
        </a>
        <form action="{{route('gyms.update',$gym->id)}}" method="POST">        
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" value="{{@$gym->name}}" aria-describedby="emailHelp" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">City Id</label>
                <select class="form-control" name="user_id">              
                        <option value="{{isset($gym->city_id)?$gym->city_id:0}}">{{isset($gym->city_id)?$gym->city_id:"Not Found"}}</option>                
                </select>
            </div>


            

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <div style="margin-left:30%;margin-top:20px;">
            <h2>You don't have the premission to manage gyms</h2>
            @if(auth()->user() == null)
            <a href="{{url('login')}}">click here to login</a>
            @else
            <h4>this page only available for gym managers</h4>
            @endif
        </div>
    @endif
@endsection