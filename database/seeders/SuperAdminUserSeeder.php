<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AdminDetail;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password123'), 
            'role' => 'Superadmin',
            'status' => 'active',
            'is_banned' => false,
        ]);

        $user->assignRole('Superadmin');

        AdminDetail::create([
            'user_id' => $user->id,
            'phone' => '08012345678',
            'about' => 'This is the Super Admin of the system.',
            'gender' => 'male',
            'company' => 'Benue Digital Skill Initiative',
            'state' => 'Benue',
            'lga' => 'Makurdi',
            'address' => '1 Government House, Makurdi, Benue State',
            'photo_link' => null,
        ]);
    }
}
