<?php

namespace App\Http\Controllers\TrainingSession;

use App\TrainingPackage;
use App\TrainingSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class StoreController extends Controller
{
    public function store(Request $request) {
        dd($request);
        TrainingSession::create([
            'name' => $request->name,
            'start_at' => now(),
            'end_at' => now(),
            'gym_id' => $request->gym_id]);
        // return redirect()->route('home');
    }
}
