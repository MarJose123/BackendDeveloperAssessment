<?php
/*
 * Copyright (c) 2023. LF Backend Developer Assessment by Josie Noli Darang.
 */

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $arrayOfPermissionNames = ['Add Role', 'Delete Role', 'Add User', 'Delete User', 'View User', 'View Role', 'View Profile'];
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'api'];
        });
        Permission::insert($permissions->toArray());

        // create roles and assign created permissions

        $superUserRole = Role::create(['name' => 'SUPER_USER'])
                        ->givePermissionTo(Permission::all());
        $userRole = Role::create(['name' => 'USER'])
                    ->givePermissionTo([
                        'View Profile'
                    ]);
        $adminRole = Role::create(['name' => 'ADMIN'])
                    ->givePermissionTo([
                        'Add Role', 'Add User', 'View User', 'View Role', 'View Profile'
                    ]);


        // Create access credential lists for users
        $SuperUserAccess = User::create([
           'name' => 'SUPER USER',
           'email' => 'superuser@mail.com',
           'password' =>  Hash::make('superuser')
        ]);
        $AdminAccess = User::create([
            'name' => 'ADMIN',
            'email' => 'admin@mail.com',
            'password' =>  Hash::make('admin')
        ]);
       $userAccess = User::create([
            'name' => 'USER',
            'email' => 'user@mail.com',
            'password' =>  Hash::make('user')
        ]);

       // Assign the Pre-defined Role to the User
        $SuperUserAccess->assignRole('SUPER_USER');
        $AdminAccess->assignRole('ADMIN');
        $userAccess->assignRole('USER');

    }
}
