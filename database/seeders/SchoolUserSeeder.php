<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SchoolDetail;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SchoolUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [
                'name' => 'Wurukum Primary School Makurdi',
                'email' => 'admin@wurukum.edu.ng',
                'reg_number' => 'WPS/2024/001',
                'school_type' => 'Primary School',
                'ownership_type' => 'State',
                'phone_no' => '+234-801-234-5678',
                'state' => 'Benue',
                'lga' => 'Makurdi',
                'address' => 'Wurukum Road, Makurdi, Benue State',
                'admin_name' => 'Prof. Moses Kembe',
                'admin_phone' => '+234-802-345-6789',
                'admin_email' => 'vc@wurukum.edu.ng',
            ],
            [
                'name' => 'Federal Government College Gboko',
                'email' => 'admin@fgcgboko.edu.ng',
                'reg_number' => 'FGCG/2024/002',
                'school_type' => 'Secondary School',
                'ownership_type' => 'Federal',
                'phone_no' => '+234-803-456-7890',
                'state' => 'Benue',
                'lga' => 'Gboko',
                'address' => 'Federal Government College Road, Gboko, Benue State',
                'admin_name' => 'Dr. Rebecca Iortyom',
                'admin_phone' => '+234-804-567-8901',
                'admin_email' => 'principal@fgcgboko.edu.ng',
            ]
        ];

        foreach ($schools as $schoolData) {
            $user = User::create([
                'name' => $schoolData['name'],
                'email' => $schoolData['email'],
                'password' => Hash::make('password123'),
                'role' => 'School',
                'status' => 'active',
                'is_banned' => false,
            ]);

            $user->assignRole('School');

            SchoolDetail::create([
                'user_id' => $user->id,
                'name' => $schoolData['name'],
                'reg_number' => $schoolData['reg_number'],
                'school_type' => $schoolData['school_type'],
                'ownership_type' => $schoolData['ownership_type'],
                'email' => $schoolData['email'],
                'phone_no' => $schoolData['phone_no'],
                'state' => $schoolData['state'],
                'lga' => $schoolData['lga'],
                'address' => $schoolData['address'],
                'admin_name' => $schoolData['admin_name'],
                'admin_phone' => $schoolData['admin_phone'],
                'admin_email' => $schoolData['admin_email'],
            ]);
        }
    }
}
