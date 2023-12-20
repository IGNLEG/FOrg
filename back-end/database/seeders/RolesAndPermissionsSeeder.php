<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'post']);
        Permission::create(['name' => 'view']);

        $role = Role::create(['name' => 'user'])
            ->givePermissionTo(['edit', 'post', 'view']);

        $role = Role::create(['name' => 'guest'])
            ->givePermissionTo(['view']);
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
    }
}
