@extends('layouts.base')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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


        <div class="form-group">
            <label for="exampleInputPassword1">Manager Id</label>
            <select class="form-control" name="user_id">              
                    <option value="{{isset($gym->gym_manager_id)?$gym->gym_manager_id:0}}">{{isset($gym->gym_manager_id)?$gym->gym_manager_id:"Not Found"}}</option>                
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection