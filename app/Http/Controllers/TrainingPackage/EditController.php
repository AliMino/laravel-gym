<?php

namespace App\Http\Controllers\TrainingPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingPackage;
use App\Http\Requests\UpdateTrainingPackageRequest;


class EditController extends Controller
{
    public function edit(TrainingPackage $package){
        return view('packages.edit',[
            'package'=>$package,
        ]);
    }

    public function update(UpdateTrainingPackageRequest $request,TrainingPackage $package){
        $package->update($request->all());
        $package->save();
        return redirect()->route("packages.index");
    }
}
