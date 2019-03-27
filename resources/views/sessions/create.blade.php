@extends('layouts.base')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div>
    <h2 for="Title">Add a Session</h2>
</div>

    <form action="{{route('sessions.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Session Date</label>
                    <br>
                            <label for="exampleInputPassword1">Date</label>
                                {!! Form::date('start-date', \Carbon\Carbon::now()) !!}
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Session Start</label>
                    <br>
                            <label for="exampleInputPassword1">Time</label>
                                {!!  Form::time('start-time', Carbon\Carbon::now()) !!}

        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Session end</label>
                    <br>
                            <label for="exampleInputPassword1">Time</label>
                                {!!  Form::time('end-time', Carbon\Carbon::now()) !!}

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
                <label>Select Coaches</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" name="coaches[]" data-placeholder="Select coaches" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    @foreach($coaches as $coach)
                    <option value="{{$coach->id}}">{{$coach->name}}</option>
                @endforeach
                </select>
            </div>



    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection


@section('scripts')

<script>
    $('.select2').select2();
      </script>

@endsection
