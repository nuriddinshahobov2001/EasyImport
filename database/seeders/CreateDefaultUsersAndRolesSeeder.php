<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use App\Models\RoleUsersModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateDefaultUsersAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('1'),
        ]);
        $user2 = \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('1'),
        ]);

        $user3 = \App\Models\User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => Hash::make('1'),
        ]);

        $role1 = RoleModel::create(['name' => 'admin']);
        $role2 = RoleModel::create(['name' => 'user']);
        $role3 = RoleModel::create(['name' => 'editor']);

        RoleUsersModel::create(['user_id' => (int)$user1->id, 'role_id' => (int)$role1->id]);
        RoleUsersModel::create(['user_id' => (int)$user2->id, 'role_id' => (int)$role2->id]);
        RoleUsersModel::create(['user_id' => (int)$user3->id, 'role_id' => (int)$role3->id]);
    }
}
