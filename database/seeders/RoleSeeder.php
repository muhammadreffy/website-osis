<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $userAdmin = User::create([
            'avatar' => 'images/default.png-avatar',
            'name' => 'Muhammad Reffy',
            'username' => 'muhammadreffy_',
            'email' => 'syahnataa@gmail.com',
            'password' => Hash::make('@Reffy1234'),
        ]);

        $userAdmin->assignRole($adminRole);
    }
}
