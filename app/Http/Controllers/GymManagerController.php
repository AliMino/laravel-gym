<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Gym;
use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;

class GymManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gymManagers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->getRole()->name == "admin") {
            return view('gymManagers.create',[ 'gyms'=>Gym::all() ]);
        } else if(auth()->user()->getRole()->name == "city manager") {
            return view('gymManagers.create',[ 'gyms'=>Gym::where("city_id", "=", auth()->user()->city_id)->get() ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManagerRequest $request)
    {
        $user=User::create($request->all());
        $user->assignRole('gym manager');
        $request->validate([
            'gym_id'=>'required_if:role,"gym manager"|exists:gyms,id'
        ]);

        return redirect()->route('gymmanagers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        return view('gymManagers.edit',[
            'gymmanager'=>User::find($user),
            'gyms'=>Gym::all(),
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
        User::find($user)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'national_id'=>$request->national_id,
            'image'=>$request->avatar_img,
            'gym_id'=>$request->gym_id,
        ]);
        return redirect()->route('gymmanagers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        dd($user);
        /*$gymmanager = User::find($user)->delete();
        //$gymmanager->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);*/

        //return redirect()->route('gymmanagers.index');
    }

    public function ban( $user)
    {
        $banedUser=User::find($user);
        $banedUser->ban([
            'comment' => 'Enjoy your ban!',
        ]);
        return redirect()->route('gymmanagers.index');
    }

    public function unban( $user)
    {
        $unBanedUser=User::find($user);
        $unBanedUser->unban();
        return redirect()->route('gymmanagers.index');
    }

    public function getdata(){
        return datatables()->of(User::role('gym manager')->get())->toJson();
    }

}
