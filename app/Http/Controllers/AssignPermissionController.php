<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AssignPermissionController extends Controller
{
    public function index($roles)
    {
        // $permission =Permission::all();
        // $role = Role::with('permissions')->get();
        // return view('assignpermission.assignpermission',compact('role','permission'));
    }
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $role=Role::where('name',$request->role)->first();
        $role->givePermissionTo($request->permission);

        $request->session()->flash('msg','Permission Assinged');
        return redirect('assignpermission');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($role)
    {
        $role = Role::with('permissions')->where('name',$role)->first();
        $permissions = permission::all();

        return view('assignpermission.edit',compact('role','permissions'));
    }

   
    public function update(Request $request, $id)
    {
        try{
            $role=Role::where('name',$request->role)->first();
            $currentPermissions = $role->permissions;
            $role->revokePermissionTo($currentPermissions);
            $role->givePermissionTo($request->permission);
            flash('Pemissions updated successfully.')->success();
            return redirect()->back();
        }catch(\Exception $e)
        {
            // return $e;
            flash('Unable to update pemissions.')->error();
            return redirect()->back();
        }
    }

    
    public function destroy($id)
    {
        //
    }
}