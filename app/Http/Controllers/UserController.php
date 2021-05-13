<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


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
            $inputs['avatar'] =  '/storage/' . $request->avatar->store('images');
        }

        $user->update($inputs);
        
        return redirect()->back();
    }
}
