<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            [
                'name' => 'partner_access',
            ],
            [
                'name' => 'partner_edit',
            ],
            [
                'name' => 'partner_delete',
            ],
            [
                'name' => 'partner_create',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

    }
}
