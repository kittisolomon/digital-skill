<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AdminDetail;
use Illuminate\Support\Facades\Hash;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the Super Admin user
        $user = User::create(
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password123'), 
                'role' => 'Superadmin',
            ]
        );

        // Create Admin Details
        AdminDetail::create(
            [
                'user_id' => $user->id,
                'phone' => '08012345678',
                'about' => 'This is the Super Admin of the system.',
                'gender' => 'male',
                'company' => 'Admin Corp',
                'state' => 'Lagos',
                'lga' => 'Ikeja',
                'address' => '123 Admin Street, Lagos',
                'photo_link' => null,
                'status' => 'active',
            ]
        );
    }
}
