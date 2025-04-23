<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'dentist' => [
                'view dashboard',
                'edit profile',
                'manage landing page',
                'edit practice details',
                'manage team members',
                'manage opening hours',
                'update contact information',
                'view subscription package',
                'post job ads',
                'edit job ads',
                'delete job ads',
                'view job applicants',
                'claim existing profile',
                'view reviews',
                'delete own review',
            ],

            'patient' => [
                'view dashboard',
                'edit profile',
                'write review',
                'edit own review',
                'delete own review',
                'search dentists',
                'view dentist landing page',
                'save favorite dentists',
            ],

            'applicant' => [
                'view dashboard',
                'edit profile',
                'upload resume',
                'apply to job',
                'view applied jobs',
            ],
        ];

        foreach ($permissions as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            foreach ($perms as $permName) {
                $permission = Permission::firstOrCreate(['name' => $permName]);
                $role->givePermissionTo($permission);
            }
        }
    }
}
