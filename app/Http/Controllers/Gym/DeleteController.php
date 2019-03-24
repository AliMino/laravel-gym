<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;

class DeleteController extends Controller
{
    public function destroy(Gym $gym){
        $gym->delete();
        return redirect()->route("index");
    }
}
