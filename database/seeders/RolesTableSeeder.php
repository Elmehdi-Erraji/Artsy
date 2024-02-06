<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::findOrCreate('admin');
        $artistRole = Role::findOrCreate('artist');
        $partnerRole = Role::findOrCreate('partner');

        $updatePermission = Permission::findOrCreate('update articles');
        $deletePermission = Permission::findOrCreate('delete articles');

        // Give the 'admin' role permissions
        $adminRole->givePermissionTo([$updatePermission->id, $deletePermission->id]);
    }
}
