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
        $this->manageRoles();
        return view('home');
    }
    // roles-permissions:
    //          'admin': 'manage city managers', 'manage gym managers', 'manage users'
    //          'city manager'
    private function manageRoles() {
        $adminRole = Role::where(['name' => 'admin'])->first();
        $cityManagerRole = Role::where(['name' => 'city manager'])->first();

        $manageCityManagersPermission = Permission::where(['name' => 'manage city managers'])->first();
        $manageGymManagersPermission = Permission::where(['name' => 'manage gym managers'])->first();
        $manageUsersPermission = Permission::where(['name' => 'manage users'])->first();
        $manageCitiesPermission = Permission::where(['name' => 'manage cities'])->first();
        $manageGymsPermission = Permission::where(['name' => 'manage gyms'])->first();
        $manageTrainingPackagesPermission = Permission::where(['name' => 'manage training packages'])->first();
        $manageCoachesPermission = Permission::where(['name' => 'manage coaches'])->first();
        $manageAttendancePermission = Permission::where(['name' => 'manage attendance'])->first();
        $manageRevenuePermission = Permission::where(['name' => 'manage revenue'])->first();
        
        if($adminRole === null) {
            Role::create(['name' => 'admin']);
        }
        if($manageCityManagersPermission === null) {
            Permission::create(['name' => 'manage city managers']);
        }
        if($manageGymManagersPermission === null) {
            Permission::create(['name' => 'manage gym managers']);
        }
        if($manageUsersPermission === null) {
            Permission::create(['name' => 'manage users']);
        }
        if($manageCitiesPermission === null) {
            Permission::create(['name' => 'manage cities']);
        }
        if($manageGymsPermission === null) {
            Permission::create(['name' => 'manage gyms']);
        }
        if($manageTrainingPackagesPermission === null) {
            Permission::create(['name' => 'manage training packages']);
        }
        if($manageCoachesPermission === null) {
            Permission::create(['name' => 'manage coaches']);
        }
        if($manageAttendancePermission === null) {
            Permission::create(['name' => 'manage attendance']);
        }
        if($manageRevenuePermission === null) {
            Permission::create(['name' => 'manage revenue']);
        }
        
        $adminRole->givePermissionTo($manageCityManagersPermission);
        $adminRole->givePermissionTo($manageGymManagersPermission);
        $adminRole->givePermissionTo($manageUsersPermission);
        $adminRole->givePermissionTo($manageCitiesPermission);
        $adminRole->givePermissionTo($manageGymsPermission);
        $adminRole->givePermissionTo($manageTrainingPackagesPermission);
        $adminRole->givePermissionTo($manageCoachesPermission);
        $adminRole->givePermissionTo($manageAttendancePermission);
        $adminRole->givePermissionTo($manageRevenuePermission);

        if(auth()->user()->email === "admin@admin.com") {
            auth()->user()->assignRole('admin');
        }
    }
}
