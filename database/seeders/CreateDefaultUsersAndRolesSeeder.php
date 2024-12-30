<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateDefaultUsersAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'manager']);

        $user1 = \App\Models\User\User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'login' => 'admin',
            'password' => Hash::make('1'),
        ])->assignRole($role1);

        $user2 = \App\Models\User\User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'login' => 'user',
            'password' => Hash::make('1'),
        ])->assignRole($role2);

        $user3 = \App\Models\User\User::create([
            'name' => 'Manager User',
            'email' => 'mn@gmail.com',
            'login' => 'manager',
            'password' => Hash::make('1'),
        ])->assignRole($role3);

    }
}
