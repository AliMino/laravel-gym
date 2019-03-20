@extends('layouts.app')
@section('content')


    <form action="{{route('gyms.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword1">City</label>
            <select class="form-control" name="city_id">
                <option value="0">city_0</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Manager</label>
            <select class="form-control" name="gym_manager_id">
                <option value="0">gym_manager_0</option>
            </select>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection