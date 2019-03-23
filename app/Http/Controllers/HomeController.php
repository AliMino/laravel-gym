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
        // dd (auth()->user()->role()->name);
        return view('home');
    }
    private function getPermission(string $name) {
        $permission = Permission::where(['name' => $name])->first();
        if($permission === null) {
            $permission = Permission::create(['name' => $name]);
        }
        return $permission;
    }
    // roles-permissions:
    //          'admin': 'manage city managers', 'manage gym managers', 'manage users'
    //          'city manager'
    private function manageRoles() {
        $adminRole = Role::where(['name' => 'admin'])->first();
        $cityManagerRole = Role::where(['name' => 'city manager'])->first();

        $manageCityManagersPermission = $this->getPermission('manage city managers');
        $manageGymManagersPermission = $this->getPermission('manage gym managers');
        $manageUsersPermission = $this->getPermission('manage users');
        $manageCitiesPermission = $this->getPermission('manage cities');
        $manageGymsPermission = $this->getPermission('manage gyms');
        $manageTrainingPackagesPermission = $this->getPermission('manage training packages');
        $manageCoachesPermission = $this->getPermission('manage coaches');
        $manageAttendancePermission = $this->getPermission('manage attendance');
        $manageRevenuePermission = $this->getPermission('manage revenue');
        
        if($adminRole === null) {
            $adminRole = Role::create(['name' => 'admin']);
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
        // return DB::table('roles')->join('role_has_permissions', 'role_id', '=', 3)->get();

    }
}
