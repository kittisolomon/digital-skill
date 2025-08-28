<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\StudentDetail;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Terkimbi Iorliam',
                'email' => 'terkimbi.iorliam@student.bsu.edu.ng',
                'gender' => 'Male',
                'phone' => '+234-901-234-5678',
                'dob' => '2002-03-15',
                'state' => 'Benue',
                'lga' => 'Makurdi',
                'address' => '45 High Level, Makurdi, Benue State',
                'landmark' => 'Near Benue State University Main Gate',
                'school_id' => 1,
            ],
            [
                'name' => 'Nguavese Tyoumbur',
                'email' => 'nguavese.tyoumbur@student.bsu.edu.ng',
                'gender' => 'Female',
                'phone' => '+234-902-345-6789',
                'dob' => '2001-07-22',
                'state' => 'Benue',
                'lga' => 'Makurdi',
                'address' => '12 Modern Market Road, Makurdi, Benue State',
                'landmark' => 'Opposite Wurukum Market',
                'school_id' => 1,
            ],
            [
                'name' => 'Mngunengen Akume',
                'email' => 'mngunengen.akume@student.bsu.edu.ng',
                'gender' => 'Male',
                'phone' => '+234-903-456-7890',
                'dob' => '2003-11-08',
                'state' => 'Benue',
                'lga' => 'Makurdi',
                'address' => '78 North Bank Road, Makurdi, Benue State',
                'landmark' => 'Near River Benue Bridge',
                'school_id' => 1,   
            ],
            [
                'name' => 'Ocholi Adejo',
                'email' => 'ocholi.adejo@fgcgboko.edu.ng',
                'gender' => 'Male',
                'phone' => '+234-904-567-8901',
                'dob' => '2006-01-12',
                'state' => 'Benue',
                'lga' => 'Gboko',
                'address' => '23 Yandev Road, Gboko, Benue State',
                'landmark' => 'Close to Gboko Main Market',
                'school_id' => 2,   
            ],
            [
                'name' => 'Mnena Chia',
                'email' => 'mnena.chia@fgcgboko.edu.ng',
                'gender' => 'Female',
                'phone' => '+234-905-678-9012',
                'dob' => '2005-09-05',
                'state' => 'Benue',
                'lga' => 'Gboko',
                'address' => '56 Tor Tiv Palace Road, Gboko, Benue State',
                'landmark' => 'Near Tor Tiv Palace',
                'school_id' => 2, 
            ],
            [
                'name' => 'Ene Okwu',
                'email' => 'ene.okwu@fgcgboko.edu.ng',
                'gender' => 'Female',
                'phone' => '+234-906-789-0123',
                'dob' => '2005-12-20',
                'state' => 'Benue',
                'lga' => 'Gboko',
                'address' => '34 Mkar Road, Gboko, Benue State',
                'landmark' => 'Near Mkar University',
                'school_id' => 2,   
            ]
        ];

        foreach ($students as $studentData) {
            $user = User::create([
                'name' => $studentData['name'],
                'email' => $studentData['email'],
                'password' => Hash::make('password123'),
                'role' => 'Student',
                'status' => 'active',
                'is_banned' => false,
            ]);

            $user->assignRole('Student');

            StudentDetail::create([
                'user_id' => $user->id,
                'school_id' => $studentData['school_id'],
                'gender' => $studentData['gender'],
                'phone' => $studentData['phone'],
                'dob' => $studentData['dob'],
                'state' => $studentData['state'],
                'lga' => $studentData['lga'],
                'address' => $studentData['address'],
                'landmark' => $studentData['landmark'],
            ]);
        }
    }
}
