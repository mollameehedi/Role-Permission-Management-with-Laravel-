<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Role
        $rolSuperAdmin = Role::create(['name' => 'superAdmin']);
        $rolAdmin = Role::create(['name' => 'admin']);
        $rolEditor = Role::create(['name' => 'editor']);
        $rolUser = Role::create(['name' => 'user']);


        // Permission List as array
        $permissions = [

            //Dashboard permision 
            'dashboard.view',

            //blog permision 
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.app',

            //Admin permision 
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.app',

            //Role permision 
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.app',

            //Role permision 
            'profile.view',
            'profile.edit',
        ];

        // Assign Permission
        for ($i = 0; $i < count($permissions); $i++) {
            // create Permission
            $permission = Permission::create(['name' => $permissions[$i]]);

            $rolSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($rolSuperAdmin);
        }
        // $permission = Permission::create(['name' => 'edit articles']);
    }
}
