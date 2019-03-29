<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\City;
use App\Country;
use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;


class CityManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cityManagers.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cityManagers.create',[
            'cities'=>City::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManagerRequest $request)
    {
        // dd($request);
        $user=User::create($request->all());
        $user->assignRole('city manager');
        $request->validate([
            'city_id'=>'required_if:role,"city manager"|exists:cities,id'
        ]);

        return redirect()->route('citymanagers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $user)
    {
        return view('cityManagers.show',[
            'citymanager'=>User::find($user),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $user)
    {
        return view('cityManagers.edit',[
            'citymanager'=>User::find($user),
            'cities'=>City::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManagerRequest $request, $user)
    {
        $request->validate([
            'city_id'=>'required_if:role,"city manager"|exists:cities,id'
        ]);
        User::find($user)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'national_id'=>$request->national_id,
            'image'=>$request->avatar_img,
            'city_id'=>$request->city_id,
        ]);
        return redirect()->route('citymanagers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $user)
    {
        dd($user);
        $user->delete();

        return redirect()->route('citymanagers.index');
    }

    public function getdata(){
        return datatables(User::where("city_id", ">", 0)->with('city'))
        ->addColumn('countryName', function(User $user) {
            return Country::where("id", "=", $user->city->country_id)->first()->name;
        })->toJson();
        // $users=User::role('city manager')->get();
        // return datatables()->of($users)->toJson();
    }
}
