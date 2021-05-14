<?php

namespace App\Http\Controllers;

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
        return view('admin.users.profile', ['user' => $user]);
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
}
