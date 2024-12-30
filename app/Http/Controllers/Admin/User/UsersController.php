<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'role' => $user->roles->first()->name ?? 'Без роли',
            ];
        });
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));

    }
    public function store(Request $request){

    }
    public function show($id){

    }
    public function edit(User $user){}
    public function update(Request $request, User $user){}
    public function destroy(User $user){}
}
