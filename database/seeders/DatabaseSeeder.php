<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JobCard;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole($adminRole);

        // Create regular users
        $user1 = User::firstOrCreate(
            ['email' => 'user1@example.com'],
            [
                'name' => 'Regular User 1',
                'password' => bcrypt('password'),
            ]
        );
        $user1->assignRole($userRole);

        $user2 = User::firstOrCreate(
            ['email' => 'user2@example.com'],
            [
                'name' => 'Regular User 2',
                'password' => bcrypt('password'),
            ]
        );
        $user2->assignRole($userRole);

        $users = [$user1, $user2];

        // Create 10 job cards assigned to the regular users
        foreach (range(1, 10) as $i) {
            $owner = $users[array_rand($users)];

            JobCard::create([
                'user_id' => $owner->id,
                'job_title' => "Job Card $i",
                'client_name' => "Client $i",
                'assigned_technician' => "Technician $i",
                'job_description' => "This is the description for job card $i.",
                'estimated_completion_date' => now()->addDays(rand(1, 10)),
                'status' => 'pending',
            ]);
        }
    }
}
