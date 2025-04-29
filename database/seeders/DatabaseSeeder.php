<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $admin = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole($adminRole);

        $user = User::firstOrCreate([
            'email' => 'user@example.com'
        ], [
            'name' => 'Regular User',
            'password' => bcrypt('password')
        ]);
        $user->assignRole($userRole);
    }
}
