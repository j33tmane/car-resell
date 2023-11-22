<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;
use Spatie\QueryBuilder\Exceptions\InvalidSortQuery;
use Illuminate\Support\Facades\Storage;

class RoleController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('permission:Role')->only('create');
    // }
    public function index()
    {
          $roles = Role::withCount('users')->paginate(10);
        return view('role.index', compact('roles'));
    }
    public function create()
    {
        //
        return view('role.create');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            "name"=>'required',
        ]);
        
        Role::create([
            'name' => $request->name,
        ]);
        
        flash('Role created successfully.')->success()->important();
        return redirect()->back();    
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('role.edit',compact('role'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            "name"=>"required"
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        if($role->save())
        {
            flash('Role edited successfully.')->success()->important();
            return redirect()->back();
        
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if($role->delete())
        {
            flash('Role deleted successfully.')->warning()->important();
            return redirect()->back();

        }
       
    }
}
