@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquey.datatables.css">
@endsection

@section('content')
@if(auth()->user() && auth()->user()->can('manage cities'))
    <div class="row">
        <div class="col">
            <a href="{{ url('cities') }}">
                <button class="btn btn-primary">View all cities</button>
            </a>
            <form action="{{route('cities.store')}}" method="POST">
                @csrf
                <div>
                    <h2>Adding a city</h2>
                    <hr>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            
                <div>
                    <label>Old name: {{$city->name}}</label>
                    <br>
                    <label>New name</label>
                    <input type="text" class="form-control" name="name" value="{{$city->name}}">
                </div>
                <br>
                <form action="{{route('cities.update', 1)}}" method="post">
                    <!-- @csrf -->
                    {{ csrf_field()}}
                    <input name="_method" type="hidden" value="PUT">
                    <input name="_token" type="hidden" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </form>
        </div>
    
    </div>
@else
    <div style="margin-left:30%;margin-top:20px;">
        <h2>You don't have the premission to manage cities</h2>
        <a href="{{url('login')}}">
            <button class="btn btn-primary">click here to login</button>
        </a>
    </div>
@endif




@endsection
@section('scripts')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquey.datatables.js"></script>
@endsection
