@extends('layouts.base')
@section('content')


    <form action="{{route('sessions.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Session Start</label>
                    <br>
                            <label for="exampleInputPassword1">Date</label>
                                {!! Form::date('start-date', \Carbon\Carbon::now()) !!}
                            <label for="exampleInputPassword1">Time</label>
                                {!!  Form::time('start-time', Carbon\Carbon::now()) !!}

        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Session end</label>
                    <br>
                            <label for="exampleInputPassword1">Date</label>
                                {!! Form::date('end-date', \Carbon\Carbon::now()) !!}
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
                <label for="exampleInputPassword1">Coaches</label>
                {!! Form::select('coaches[]', $coaches , null, ['multiple' => true, 'class' => 'form-control']) !!}
            </div>





    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection


@section('scripts')

<script>
 $(document).ready( function () {

 });
      </script>

@endsection
