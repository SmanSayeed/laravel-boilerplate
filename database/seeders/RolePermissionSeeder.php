<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Permissions for admin
        $adminPermissions = [
            'view_users', 'edit_users', 'delete_users',
            'view_posts', 'create_posts', 'edit_posts', 'delete_posts',
        ];

        // Permissions for sub-admin (limited)
        $subAdminPermissions = [
            'view_users', 'view_posts',
        ];

        // Create permissions
        foreach ($adminPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions($adminPermissions);

        $subAdminRole = Role::create(['name' => 'sub-admin']);
        $subAdminRole->syncPermissions($subAdminPermissions);

        // Create a sample admin user
        $admin = \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Create a sample sub-admin user
        $subAdmin = \App\Models\User::create([
            'name' => 'Sub-Admin User',
            'email' => 'subadmin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
        $subAdmin->assignRole('sub-admin');
    }
}
