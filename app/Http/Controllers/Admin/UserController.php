<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $usersCount = User::count();
        return view('admin.users.index',compact('users','usersCount'));
    }


    public function create()
    {
        $roles = role::all();
        return view ('admin.users.create',compact('roles'));
    }


    public function store(UserRequest $request)
    {


            $user = User::create($request->all());

            $user->roles()->attach($request->role);
            return redirect()->route('users.index')->with('success','User Added successfully');
    }


    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = role::all();
        return view ('admin.users.edit',compact('user','roles'));
    }


    public function update(Request $request,  User $user)
    {
        $request->validate([
            'status' => Rule::in(array_keys(User::STATUS_RADIO)),
            'role' => 'required',
        ]);

        $user->roles()->sync($request->role);

        $user->status = $request->status;

        $user->save();
        return redirect()->route('users.index')->with('success', 'User Updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User has been deleted successfully');
    }
}
