<?php

namespace App\Http\Controllers\Coach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coach;
class CoachController extends Controller
{
    public function index()
    {
        return view('coaches.index',[
            'coaches' => datatables()->of(Coach::all())->toJson(),
        ]);
    }
    public function create()
    {
        return view('coaches.create');
    }
    public function store($request)
    {
            Post::create($request->all());
        return redirect()->route('coaches.index');
    }
    public function edit($id)
    {
        return view('coaches.edit',['coach' => Coach::find($id)]);
    }
    public function update($request, $id)
    {
        $coach = Coach::find($id);
        $coach->update($request->all());

        return redirect()->route('coaches.index');
    }
    public function destroy($id)
    {
        $coach = Coach::find($id);
        $coach->delete();
     return redirect()->route('coaches.index');
    }
}
