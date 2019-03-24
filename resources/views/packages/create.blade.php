@extends('layouts.base')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger" style="margin: 4px;">
        <ul style="list-style: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('packages.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Package ID</label>
            <input name="name" type="text" class="form-control" id="name"  placeholder="Enter Package Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Number of sessions</label>
            <br>
            <input type="number" min="1" max="30" value="1" name="no_of_sessions">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <br>
            <input type="number" min="100" max="1000" value="100" name="price_cent">
        </div>
        <div class="form-group">
            <label for="gym_id">Gym</label>
            <select class="form-control" name="gym_id">
                @foreach($gyms as $gym)
                    <option value="{{$gym->id}}">{{$gym->name}}</option>
                @endforeach
            </select>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection