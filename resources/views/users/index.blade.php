@extends('layouts.base')
@section('content')

    @if(auth()->user())
    <h3>
        Filters
    </h3>
    <span>
        @if(auth()->user()->can('manage cities'))
            <section style="display:inline">
                <label>
                    filter by city
                </label>
                <select id="city-filter" onchange="console.log(document.getElementById('city-filter').value);">
                    @foreach($cities as $city)
                        <option>{{$city->name}}</option>
                    @endforeach
                </select>
            </section>
        @endif

        @if(auth()->user()->can('manage gyms'))
            <section style="display:inline">
                <label> filter by gym </label>
                <select id="gym-filter" onchange="console.log(document.getElementById('gym-filter').value);">
                    @foreach($gyms as $gym)
                        <option>{{$gym->name}}</option>
                    @endforeach
                </select>
            </section>
        @endif
    </span>
    @endif
@endsection