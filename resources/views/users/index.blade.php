@extends('layouts.base')
@section('content')

    <h3>
        Filters
    </h3>
    <span>
        @if(!auth()->user() || !auth()->user()->hasAnyPermission('manage cities|manage city managers'))
            <section style="display:inline">
                <label>
                    filter by city
                </label>
                <select id="city-filter" onchange="console.log(document.getElementById('city-filter').value);">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                            
                </select>
            </section>
        @endif

        @if(!auth()->user() || !auth()->user()->hasAnyPermission('manage gyms|manage gym managers'))
            <section style="display:inline">
                <label>
                    filter by gym
                </label>
                
                
                <select id="gym-filter" onchange="console.log(document.getElementById('gym-filter').value);">
                    <option>
                    </option>
                </select>
            </section>
        @endif
    </span>


@endsection