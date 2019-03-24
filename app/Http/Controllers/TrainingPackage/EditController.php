<?php

namespace App\Http\Controllers\TrainingPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingPackage;


class EditController extends Controller
{
    public function edit(TrainingPackage $package){
        return view('packages.edit',[
            'package'=>$package,
        ]);
    }

    public function update(UpdateTrainingPackageRequest $request,$package){
        $package=TrainingPackage::Findorfail($package);
        $package->no_of_sessions=$request->no_of_sessions;
        $package->price_cent=$request->price_cent;
        $package->save();
        return redirect()->route("packages.index");
    }
}
