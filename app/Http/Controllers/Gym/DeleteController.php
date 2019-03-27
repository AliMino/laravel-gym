<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;

class DeleteController extends Controller
{
    public function destroy($id){
        $gym=Gym::find($id);
        $gym->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
        //return redirect()->route("index");
    }
}
