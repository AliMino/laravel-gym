<?php

namespace App\Http\Controllers\TrainingSession;

use App\TrainingPackage;
use App\TrainingSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function store() {
        echo('store training session');
        $request = request();
        // dd(request()->package_id);
        $package = TrainingPackage::where('id', '=', request()->package_id)->first();
        $request->name = "pkg" . $package->price_cent . "_" . $package->no_of_sessions;
        // dd(now());
        TrainingSession::create([
            'name' => $request->name,
            'start_at' => now(),
            'end_at' => now(),
            'gym_id' => $request->gym_id]);
        // return redirect()->route('home');
    }
}
