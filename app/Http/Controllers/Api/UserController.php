<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserCollection;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
//        $res=new UserCollection($users);
        return json_encode($users);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required'],
            'roles' => ['required'],
            'seel_code' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data=$request->except('_token','password');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->assignRole($request->roles);
        return back()->with('success','User Created');
    }

    public function edit($id,Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'roles' => ['required'],
            'seel_code' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);
        $user=User::find($id);
        $data=$request->except('_token','roles','password');
        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        $user->syncRoles($request->roles);
        return back()->with('success','User Updated');
    }

    public function delete($id)
    {
        if($user=User::find($id)){
            $user->delete();
            return back()->with('success','User Deleted');
        }
    }
}
