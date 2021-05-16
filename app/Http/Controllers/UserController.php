<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
            'roles' => Role::all(),
            ]);
    }

    public function update(User $user, request $request)
    {

        $inputs = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file', 'mimes:jpeg,png,gif'],
            // 'password' => ['min:8', 'confirmed'],
        ]);

        
        
        if ($request->has('avatar')) {
            if (Storage::exists($user->getRawOriginal('avatar'))) {
                Storage::delete($user->getRawOriginal('avatar'));
            }
            $inputs['avatar'] = $request->avatar->store('images');
        }

        $user->update($inputs);
        
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        // session()->flash('success', 'User has been deleted');

        return back()->with('success', 'User has been deleted');
    }

    public function attachRole(User $user)
    {
        $user->roles()->attach(request('role'));
        return back()->with('success', 'User Updated Successfuly');
    }

    public function detachRole(User $user)
    {
        $user->roles()->detach(request('role'));
        return back()->with('success', 'User Updated Successfuly');
    }
}
