<?php

namespace App\Http\Controllers\TrainingPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingPackage;
use App\Http\Requests\UpdateTrainingPackageRequest;


class EditController extends Controller
{
    public function edit(TrainingPackage $package){
        switch(auth()->user()->getRole()->id)
        {
            case 1:return view('packages.edit',['package'=>$package]); break;
            case 2:
            case 3: return redirect()->route('payment.create');
        }

    }

    public function update(UpdateTrainingPackageRequest $request,TrainingPackage $package){
        $request->validated();
        $package->update($request->all());
        $package->save();
        return redirect()->route("packages.index");
    }
}
