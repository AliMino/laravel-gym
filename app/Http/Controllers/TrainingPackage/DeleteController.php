<?php

namespace App\Http\Controllers\TrainingPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TrainingPackage;

class DeleteController extends Controller
{
    public function destroy($id){
        $package=TrainingPackage::find($id);
        $package->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);

    }
}
