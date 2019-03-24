<?php

namespace App\Http\Controllers\TrainingPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingPackage;

class DeleteController extends Controller
{
    public function destroy(TrainingPackage $package){
        $package->delete();
        return redirect()->route("index");
    }
}
