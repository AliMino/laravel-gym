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

    <form action="{{route('gyms.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword1">City</label>
            <select class="form-control" name="city_id">
                @foreach($gyms as $gym)
                <option value="{{$gym->city_id}}">{{$gym->city_id}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Manager</label>
            <select class="form-control" name="gym_manager_id">
                @foreach($gyms as $gym)
                <option value="{{$gym->gym_manager_id}}">{{$gym->gym_manager_id}}</option>
                @endforeach
            </select>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection