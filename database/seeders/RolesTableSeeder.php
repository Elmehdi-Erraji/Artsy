<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the roles and permissions tables
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();

        // Define permissions with the 'web' guard
        $permissions = [
            'partner_access' => 'web',
            'partner_edit' => 'web',
            'partner_delete' => 'web',
            'partner_create' => 'web',
        ];

        // Create or find roles
        $roles = [
            'admin',
            'artist',
            'partner',
        ];

        // Create permissions and assign them to roles using foreach loop
        foreach ($permissions as $permissionName => $guardName) {
            Permission::create(['name' => $permissionName, 'guard_name' => $guardName]);
        }

        // Assign permissions to roles using foreach loop
        foreach ($roles as $roleName) {
            $role = Role::findOrCreate($roleName);
            $role->syncPermissions(array_keys($permissions));
        }
    }


}
