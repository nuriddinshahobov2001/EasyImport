<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = RoleModel::all();

        return view('admin.roles.index', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return back()->with('success', 'Roles updated!');
    }
}
