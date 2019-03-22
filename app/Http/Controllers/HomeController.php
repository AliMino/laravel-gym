<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adminRole = Role::where(['name' => 'admin'])->first();
        $cityManagerRole = Role::where(['name' => 'city manager'])->first();

        $addCityManagerPermission = Permission::where(['name' => 'add city manager'])->first();
        $addGymManagerPermission = Permission::where(['name' => 'add gym manager'])->first();

        if($adminRole === null) {
            Role::create(['name' => 'admin']);
        }
        if($addCityManagerPermission === null) {
            Permission::create(['name' => 'add city manager']);
        }
        if($addGymManagerPermission === null) {
            Permission::create(['name' => 'add gym manager']);
        }
        
        $adminRole->givePermissionTo($addCityManagerPermission);
        $adminRole->givePermissionTo($addGymManagerPermission);

        auth()->user()->assignRole('admin');
        // dd(auth()->user()->hasPermissionTo('add city manager'));
        return view('home');
    }
}
