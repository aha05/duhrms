<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $superuser = User::create([
            'name' => Str::ucfirst('Super Admin'),
            'email' => 'superadmin@gmail.com',
            'password' => 'Password',
        ]);

        $user = User::create([
            'name' => Str::ucfirst('Admin'),
            'email' => 'admin@gmail.com',
            'password' => 'Password',
        ]);

        $admin = Role::create([
            'name' => Str::ucfirst('Admin'),
            'slug' => Str::of(Str::lower('Admin'))->slug('-'),
        ]);

        $superAdmin = Role::create([
            'name' => Str::ucfirst('Super Admin'),
            'slug' => Str::of(Str::lower('Super Admin'))->slug('-'),
        ]);


        // Permission on Role
        Permission::create(['name' => Str::ucfirst('create.roles'), 'slug' => Str::of(Str::lower('create roles'))->slug('-'),]);
        Permission::create(['name' => 'destroy.roles', 'slug' => 'destroy-roles']);
        Permission::create(['name' => 'update.roles', 'slug' => 'update-roles']);
        Permission::create(['name' => 'view.roles.lists', 'slug' => 'view-roles-lists']);

        // Permission on User
        Permission::create(['name' => Str::ucfirst('create.users'), 'slug' => Str::of(Str::lower('create users'))->slug('-'),]);
        Permission::create(['name' => 'destroy.users', 'slug' => 'destroy-users']);
        Permission::create(['name' => 'update.users', 'slug' => 'update-users']);
        Permission::create(['name' => 'view.users.lists', 'slug' => 'view-users-lists']);

        // Permission on Employee
        Permission::create(['name' => Str::ucfirst('create.employees'), 'slug' => Str::of(Str::lower('create employees'))->slug('-')]);
        Permission::create(['name' => 'destroy.employees', 'slug' => 'destroy-employees']);
        Permission::create(['name' => 'update.employees', 'slug' => 'update-employees']);
        Permission::create(['name' => 'view.employees.lists', 'slug' => 'view-employees-lists']);

        // Permission on Department
        Permission::create(['name' => Str::ucfirst('create.departments'), 'slug' => Str::of(Str::lower('create departments'))->slug('-')]);
        Permission::create(['name' => 'destroy.departments', 'slug' => 'destroy-departments']);
        Permission::create(['name' => 'update.departments', 'slug' => 'update-departments',]);
        Permission::create(['name' => 'view.departments.lists', 'slug' => 'view-departments-lists']);

        // Permission on LeaveType
        Permission::create(['name' => Str::ucfirst('create.leaves.types'), 'slug' => Str::of(Str::lower('create leaves types'))->slug('-')]);
        Permission::create(['name' => 'destroy.leave.types', 'slug' => 'destroy-leave-types']);
        Permission::create(['name' => 'update.leave.types', 'slug' => 'update-leave-types',]);
        Permission::create(['name' => 'view.leave.types.lists', 'slug' => 'view-leave-types-lists']);

        // Permission on LeaveRequests
        Permission::create(['name' => Str::ucfirst('create.leave.requests'), 'slug' => Str::of(Str::lower('create leave requests'))->slug('-')]);
        Permission::create(['name' => 'destroy.leave.requests', 'slug' => 'destroy-leave-requests']);
        Permission::create(['name' => 'update.leave.requests', 'slug' => 'update-leave-requests',]);
        Permission::create(['name' => 'view.leave.requests.lists', 'slug' => 'view-leave-requests-lists']);


        $user->roles()->attach($admin);
        $superAdmin->permissions()->attach(Permission::all()); // use $superAdmin->permissions() instead of $superAdmin->permissions to attach collection
        $superuser->roles()->attach($admin);
        $superuser->roles()->attach($superAdmin);
    }
}
