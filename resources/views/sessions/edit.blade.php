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
<a class="btn btn-secondary" href="{{route('sessions.index')}}">Back</a>
<div>
    <h2 for="Title">Edit {{$session->name}} session </h2>
</div>

    <form action="{{route('sessions.update',$session->id)}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleInputPassword1">Session Date</label>
                    <br>
                            <label for="exampleInputPassword1">Date</label>
                                {!! Form::date('start-date', Carbon\Carbon::create($session->start_at) ) !!}
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Session Start</label>
                    <br>
                            <label for="exampleInputPassword1">Time</label>
                                {!!  Form::time('start-time', Carbon\Carbon::create($session->start_at) ) !!}

        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Session end</label>
                    <br>
                            <label for="exampleInputPassword1">Time</label>
                                {!!  Form::time('end-time', Carbon\Carbon::create($session->end_at)) !!}
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection


@section('scripts')

<script>
    $('.select2').select2();
      </script>

@endsection
