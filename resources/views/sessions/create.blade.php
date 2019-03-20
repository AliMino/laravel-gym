@extends('layouts.app')
@section('content')


    <form action="{{route('sessions.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Start timestamp</label>
            <br>
            <h1>date picker here</h1>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">End timestamp</label>
            <br>
            <h1>date picker here</h1>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Gym</label>
            
            <select class="form-control" name="gym_id">
                @foreach($gyms as $gym)
                    <option value="{{$gym->id}}">{{$gym->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Training Package(price)</label>
            <select class="form-control" name="package_id">
                @foreach($packages as $package)
                    <option value="{{$package->id}}">{{$package->price_cent}}</option>
                @endforeach
            </select>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection