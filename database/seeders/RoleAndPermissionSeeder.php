<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Superadmin',
            'School',
            'Teacher',
            'Student'
        ];

        foreach($roles as $role){
            Role::create(['name' => $role]);
        }

        $permissions = [
            // Course & Enrollment
            'create course',
            'edit course',
            'delete course',
            'view course',
            'enroll course',
            'view own courses',
            'track course progress',
            'assign teacher to course',

            // Teacher / Student Management
            'create student',
            'edit student',
            'delete student',
            'view student',
            'create teacher',
            'edit teacher',
            'delete teacher',
            'view teacher',
            'assign mentor',
            'evaluate student',
            'view mentorship',

            // Device Management
            'issue device',
            'update device status',
            'log device maintenance',
            'view device',
            'reassign device',

            // Assessment & Certification
            'create assessment',
            'edit assessment',
            'delete assessment',
            'attempt assessment',
            'grade assessment',
            'issue certificate',
            'verify certificate',
            'view own certificates',

            // Reports & Monitoring
            'view dashboard',
            'export report',
            'view KPI',
            'receive alerts',

            // Admin / System
            'manage roles',
            'manage permissions',
            'manage users',
            'send notifications',
            'view audit logs',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign all permissions to superadmin
        $superAdminRole = Role::findByName('Superadmin');
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to School
        $schoolRole = Role::findByName('School');
        $schoolPermissions = [
            'create course',        
            'edit course',
            'delete course',
            'view course',
            'view courses',
            'assign teacher to course',
            'create teacher',
            'edit teacher',
            'delete teacher',
            'view teacher',
            'issue device',
            'update device status',
            'log device maintenance',
            'view device',
            'reassign device',
            'create student',
            'edit student', 
            'delete student',
            'view student',
            'assign mentor',
            'evaluate student',
            'view mentorship',
            'create assessment',
            'edit assessment',
            'delete assessment',
            'grade assessment',
            'issue certificate',
            'verify certificate',
            'view dashboard',
            'export report',
            'view KPI',
            'receive alerts',
        ];
        $schoolRole->givePermissionTo($schoolPermissions);

        // Assign specific permissions to Teacher
        $teacherRole = Role::findByName('Teacher');
        $teacherPermissions = [
            'create course',
            'edit  course',
            'delete course',
            'view course',
            'view courses',
            'track course progress',
            'create student',
            'edit student',
            'delete student',
            'view student',
            'assign mentor',
            'evaluate student',
            'view mentorship',
            'create assessment',
            'edit assessment',
            'delete assessment',
            'grade assessment',
            'view dashboard',
        ];
        $teacherRole->givePermissionTo($teacherPermissions);

        // Assign specific permissions to Student
        $studentRole = Role::findByName('Student');
        $studentPermissions = [
            'view course',  
            'enroll course',
            'view courses',
            'track course progress',
            'view assessment',
            'attempt assessment',
            'view certificates',
            'view dashboard',
        ];
        $studentRole->givePermissionTo($studentPermissions);
    }
}
