@extends('layouts.app')
@section('content')


    <form action="{{route('packages.store')}}" method="POST">
        @csrf
        
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

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection