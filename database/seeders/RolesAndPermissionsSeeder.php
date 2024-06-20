<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles if they don't exist
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $client = Role::firstOrCreate(['name' => 'client']);
        $master = Role::firstOrCreate(['name' => 'master']);

        // Create permissions if they don't exist
        $permissions = [
            'create application',
            'view own applications',
            'view all applications',
            'update application status',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $client->givePermissionTo(['create application', 'view own applications']);
        $master->givePermissionTo(['view all applications', 'update application status']);
        $admin->givePermissionTo(Permission::all());
    }
}
