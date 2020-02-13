<?php

use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = ['add', 'edit', 'delete', 'view', 'list'];
        $roles = ['employee', 'company'];

        // Admin Role
        $admin = Role::create(['name' => 'admin']);
        $adminPermissions = [
            'add-employee', 'edit-employee', 'delete-employee',
            'view-employee', 'list-employee',
            'add-company', 'edit-company', 'delete-company',
            'view-company', 'list-company',
        ];

        foreach ($adminPermissions as $ap) {
            $adminPermissionLists[] = Permission::create(['name' => $ap]);
        }

        $admin->givePermissionTo($adminPermissionLists);


        // Employee Role
        $employee = Role::create(['name' => 'employee']);
        $employee->givePermissionTo($adminPermissionLists[3]);
    }
}
