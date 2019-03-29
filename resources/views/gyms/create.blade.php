@extends('layouts.base')

@section('content')
    @if(auth()->user() && auth()->user()->can('manage gyms'))
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{route('gyms.index')}}">
            <button class="btn btn-primary">View All Gyms</button>
        </a>

        <form action="{{route('gyms.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <select class="form-control" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">

            </div>
            <div class="form-group">
                <label for="exampleInputImage1">Cover Photo</label>
                <?php echo Form::file('public/img');?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @else
        <div style="margin-left:30%;margin-top:20px;">
            <h2>You don't have the premission to manage gyms</h2>
            @if(auth()->user() == null)
                <a href="{{url('login')}}">click here to login</a>
            @else
                <h4>this page only available for gym managers</h4>
            @endif
        </div>
    @endif
@endsection
