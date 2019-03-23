@extends('layouts.base')
@section('content')


    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">National ID</label>
            <input name="national_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Image</label>
            <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        </div>



        <div class="form-group">
            <label for="exampleInputPassword1"></label>
            <select class="form-control" name="city_id">
                
                    <option value="0"></option>
            </select>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection