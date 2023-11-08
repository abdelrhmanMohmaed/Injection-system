<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();

        return view('admin.roles.index',compact('roles','permissions'));
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'permissions'=>'required',
        ]);

        $role = Role::create(['name'=>$request->name]);
        $role->syncPermissions($request->permissions);

        return back()->with('success','Role Created');
    }

    public function edit($id,Request $request)
    {
        $role = Role::findById($id);
        $data['name'] = $request->name;

        $role->update($data);
        $role->syncPermissions($request->permissions);

        return back()->with('success','Role Updated');
    }

    public function delete($id)
    {
        Role::destroy($id);
        return back()->with('success','Role Deleted');
    }

    public function getRole($id)
    {
        $role=Role::findById($id);
        $permissions=Permission::all();
        $rolePermissions=$role->permissions()->pluck('id')->toArray();
        return view('admin.roles.edit',compact('permissions','role','rolePermissions'));
    }

}
