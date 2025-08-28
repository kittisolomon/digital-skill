<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TeacherDetail;
use App\Models\SchoolDetail;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TeacherUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'name' => 'Dr. Tersoo Iorliam',
                'email' => 'tersoo.iorliam@wurukum.edu.ng',
                'phone' => '+234-811-234-5678',
                'about' => 'Computer Science lecturer with expertise in cybersecurity and data analytics. Fluent in Tiv language and culture.',
                'gender' => 'Male',
                'state' => 'Benue',
                'lga' => 'Makurdi',
                'address' => '15 University Staff Quarters, Makurdi, Benue State',
                'school_id' => 1,
            ],
            [
                'name' => 'Mrs. Nguavese Akume',
                'email' => 'nguavese.akume@wurukum.edu.ng',
                'phone' => '+234-812-345-6789',
                'about' => 'Mathematics lecturer passionate about agricultural mathematics and statistics. From the Tiv ethnic group.',
                'gender' => 'Female',
                'state' => 'Benue',
                'lga' => 'Makurdi',
                'address' => '23 Academic Close, Makurdi, Benue State',
                'school_id' => 2,
            ],
            [
                'name' => 'Mr. Oche Adejo',
                'email' => 'oche.adejo@fgcgboko.edu.ng',
                'phone' => '+234-813-456-7890',
                'about' => 'Physics teacher with focus on renewable energy. From the Idoma ethnic group, passionate about science education.',
                'gender' => 'Male',
                'state' => 'Benue',
                'lga' => 'Gboko',
                'address' => '45 Teachers Quarters, Gboko, Benue State',
                'school_id' => 1,
            ],
            [
                'name' => 'Mrs. Evelyn Chia',
                'email' => 'evelyn.chia@fgcgboko.edu.ng',
                'phone' => '+234-814-567-8901',
                'about' => 'English Language teacher specializing in African literature. From the Tiv community with deep cultural knowledge.',
                'gender' => 'Female',
                'state' => 'Benue',
                'lga' => 'Gboko',
                'address' => '67 School Road, Gboko, Benue State',
                'school_id' => 2,
            ]
        ];

        foreach ($teachers as $teacherData) {
            $user = User::create([
                'name' => $teacherData['name'],
                'email' => $teacherData['email'],
                'password' => Hash::make('password123'),
                'role' => 'teacher',
                'status' => 'active',
                'is_banned' => false,
            ]);

            $user->assignRole('Teacher');

            TeacherDetail::create([
                'user_id' => $user->id,
                'school_id' => $teacherData['school_id'],
                'phone' => $teacherData['phone'],
                'about' => $teacherData['about'],
                'gender' => $teacherData['gender'],
                'state' => $teacherData['state'],
                'lga' => $teacherData['lga'],
                'address' => $teacherData['address'],
                'status' => 'active',
            ]);
        }
    }
}
