<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $role = Role::create([
            'name' => Str::ucfirst($request->name),
            'slug' => Str::of($request->name)->lower()->slug('-'),
        ]);

        return $role
            ? back()->with('success', 'Role Created Successfuly')
            : back()->with('fail', 'The Role Couldn\'t be created');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
        ]);
    }

    public function update(Request $request, Role $role) 
    {
        // validate
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        // update
        $role_updated = $role->update([
            'name' => Str::ucfirst($request->name),
            'slug' => Str::of($request->name)->lower()->slug('-'),
        ]);
        
        return $role_updated
            ? back()->with('success', 'Role Updated Successfuly')
            : back()->with('fail', 'The Role Couldn\'t be updated');
    }

    public function destroy(Role $role) 
    {
        return $role->delete()
            ? back()->with('success', 'Role Deleted Successfuly')
            : back()->with('fail', 'The Role Couldn\'t be deleted');
    }
}
