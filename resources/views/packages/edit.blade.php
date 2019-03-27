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
    <form action="{{route('packages.update', $package->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id">Package ID</label>
            <input name="id" type="text" class="form-control" id="id"  value="{{$package->id}}">
        </div>
        <div class="form-group">
            <label for="no_of_sessions">No. Of sessions</label>
            <input type="number" name="no_of_sessions" value="{{$package->no_of_sessions}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="price_cent">Package Price (usd) </label>
            <input type="number" name="price_cent" value="{{$package->price_cent}}" id="price_cent">

        </div>
        

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection