<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::where('id', '>', 0)->delete();
        Role::where('id', '>', 0)->delete();

        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'delete clients']);
        Permission::create(['name' => 'delete projects']);
        Permission::create(['name' => 'delete tasks']);

        // create roles and assign permissions
        Role::create(['name' => RoleEnum::ADMIN])->givePermissionTo([
            'manage users',
            'delete clients',
            'delete projects',
            'delete tasks'
        ]);
        Role::create(['name' => RoleEnum::USER]);
    }
}
