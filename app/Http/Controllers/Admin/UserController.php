<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit', compact('user','roles','permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', Rule::unique('tags', 'name')->ignore($user->id)],
        ]);

        $user->update(
            $request->only('name')
        );
        $user->syncRoles($request->roles);

        $user->syncPermissions($request->except('_token','_method','name','roles'));

        $request->session()->flash('success', 'کاربر مورد نظر ویرایش شد');
        return redirect()->route('admin.users.index');
    }

    public function destroy(Request $request,User $user)
    {
        $user->delete();

        $request->session()->flash('success','کاربر مورد نظر حذف شد');
        return redirect()->route('admin.users.index');
    }
}
