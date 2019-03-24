@extends('layouts.base')
@section('content')

<form action="{{route('cities.store')}}" method="POST">
    @csrf
    <div>
        <label>Select Country</label>
        <select class="form-control select2" style="width: 100%;" name="country_id">
            @foreach($countries as $country)
                <option value={{$country->id}}>{{$country->name}} - {{$country->full_name}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>City name</label>
        <input type="text" class="form-control" placeholder="enter city name" name="name">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    
</form>




@endsection