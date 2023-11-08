<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index(): View
    {
        $users = User::with('roles')->get();
        $roles = Role::get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $users = User::with('roles')->get();
        $roles = Role::get();
        return view('admin.users.create', compact('users', 'roles'));
    }

    public function store(UserRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'title' => $request->title,
                'seel_code' => $request->seel_code,
//            'type'=>$request->type??0,
            ]);

            $user->assignRole($request->roles);

            return redirect()->route('users.index')->with('success', 'User Created Successfully');
        } catch (\Exception $e) {

            return back()->with('error', 'Something is wrong, Please try again..');
        }
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(User $user, UserRequest $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'title' => $request->title,
                'seel_code' => $request->seel_code,
                // 'type'=>$request->type??0,
            ]);

            $user->syncRoles($request->roles);
            return redirect()->route('users.index')->with('success', 'User Updated Successfully');
        } catch (\Exception $e) {

            return back()->with('error', 'Something is wrong, Please try again..');
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted Successfully');
        } catch (\Exception $e) {

            return back()->with('error', 'Something is wrong, Please try again..');
        }
    }
}
