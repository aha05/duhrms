<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Department;
use App\Models\Person;
use App\Models\Experience;
use App\Models\EducationalInfo;
use App\Models\BankInfo;
use App\Models\ContactInfo;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Database\Factories\EmployeeFactory;
use Database\Factories\PersonFactory;
use Database\Factories\ExprienceFactory;
use Database\Factories\ContactInfoFactory;
use Database\Factories\BankInfoFactory;
use Database\Factories\EducationalIfoFactory;

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
      // Create 10 employees with related

      Person::factory()->count(10)->create()->each(function ($person) {
        $employee = $person->employee()->save(Employee::factory()->create());
        $employee->experience()->save(Experience::factory()->create());
        $employee->contactInfo()->save(ContactInfo::factory()->create());
        $employee->bankInfo()->save(BankInfo::factory()->create());
        $employee->educationalInfo()->save(EducationalInfo::factory()->create());
         });

        $user = User::create([
            'name' => Str::ucfirst('Admin'),
            'email' => 'admin@gmail.com',
            'password' => 'Password',
        ]);

        $admin = Role::create([
            'name' => Str::ucfirst('Admin'),
            'slug' => Str::of(Str::lower('Admin'))->slug('-'),
        ]);

        Role::create([
            'name' => Str::ucfirst('HR officer'),
            'slug' => Str::of(Str::lower('HR officer'))->slug('-'),
        ]);

        Role::create([
            'name' => Str::ucfirst('AC officer'),
            'slug' => Str::of(Str::lower('AC officer'))->slug('-'),
        ]);

        Role::create([
            'name' => Str::ucfirst('DEP officer'),
            'slug' => Str::of(Str::lower('DEP officer'))->slug('-'),
        ]);

        Role::create([
            'name' => Str::ucfirst('Record officer'),
            'slug' => Str::of(Str::lower('Record officer'))->slug('-'),
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
        Permission::create(['name' => Str::ucfirst('create.leave.types'), 'slug' => Str::of(Str::lower('create leave types'))->slug('-')]);
        Permission::create(['name' => 'destroy.leave.types', 'slug' => 'destroy-leave-types']);
        Permission::create(['name' => 'update.leave.types', 'slug' => 'update-leave-types',]);
        Permission::create(['name' => 'view.leave.types.lists', 'slug' => 'view-leave-types-lists']);

        // Permission on LeaveRequests
        Permission::create(['name' => Str::ucfirst('create.leave.requests'), 'slug' => Str::of(Str::lower('create leave requests'))->slug('-')]);
        Permission::create(['name' => 'destroy.leave.requests', 'slug' => 'destroy-leave-requests']);
        Permission::create(['name' => 'update.leave.requests', 'slug' => 'update-leave-requests',]);
        Permission::create(['name' => 'view.leave.requests.lists', 'slug' => 'view-leave-requests-lists']);

        // Permission on LeaveApprovals
        Permission::create(['name' => Str::ucfirst('create.leaves.approvals'), 'slug' => Str::of(Str::lower('create leaves approvals'))->slug('-')]);
        Permission::create(['name' => 'destroy.leave.approvals', 'slug' => 'destroy-leave-approvals']);
        Permission::create(['name' => 'update.leave.approvals', 'slug' => 'update-leave-approvals',]);
        Permission::create(['name' => 'view.leave.approvals.lists', 'slug' => 'view-leave-approvals-lists']);

        // Permission on vacancy requests
        Permission::create(['name' => Str::ucfirst('create.vacancy.requests'), 'slug' => Str::of(Str::lower('create vacancy requests'))->slug('-')]);
        Permission::create(['name' => 'destroy.vacancy.requests', 'slug' => 'destroy-vacancy-requests']);
        Permission::create(['name' => 'update.vacancy.requests', 'slug' => 'update-vacancy-requests',]);
        Permission::create(['name' => 'view.vacancy.requests.lists', 'slug' => 'view-vacancy-requests-lists']);

        // Permission on vacancy approvals
        Permission::create(['name' => Str::ucfirst('create.vacancy.approvals'), 'slug' => Str::of(Str::lower('create vacancy approvals'))->slug('-')]);
        Permission::create(['name' => 'destroy.vacancy.approvals', 'slug' => 'destroy-vacancy-approvals']);
        Permission::create(['name' => 'update.vacancy.approvals', 'slug' => 'update-vacancy-approvals',]);
        Permission::create(['name' => 'view.vacancy.approvals.lists', 'slug' => 'view-vacancy-approvals-lists']);

        // Permission on reports
        Permission::create(['name' => Str::ucfirst('view.reports'), 'slug' => Str::of(Str::lower('view reports'))->slug('-')]);
        Permission::create(['name' => Str::ucfirst('generate.reports'), 'slug' => Str::of(Str::lower('generate reports'))->slug('-')]);

        // Permission on Jobs
        Permission::create(['name' => Str::ucfirst('post.jobs'), 'slug' => Str::of(Str::lower('post jobs'))->slug('-')]);
        Permission::create(['name' => 'destroy.jobs', 'slug' => 'destroy-jobs']);
        Permission::create(['name' => 'update.jobs', 'slug' => 'update-jobs',]);
        Permission::create(['name' => 'view.jobs.table', 'slug' => 'view-jobs-table']);

        // Permission on Jobs
        Permission::create(['name' => Str::ucfirst('post.notices'), 'slug' => Str::of(Str::lower('post notices'))->slug('-')]);
        Permission::create(['name' => 'destroy.notices', 'slug' => 'destroy-notices']);
        Permission::create(['name' => 'update.notices', 'slug' => 'update-notices',]);
        Permission::create(['name' => 'view.notices.table', 'slug' => 'view-notices-table']);

        // Other Permission
        Permission::create(['name' => Str::ucfirst('view.dashboard'), 'slug' => Str::of(Str::lower('view dashboard'))->slug('-')]);
        Permission::create(['name' => Str::ucfirst('view.applicants'), 'slug' => Str::of(Str::lower('view applicants'))->slug('-')]);
        Permission::create(['name' => Str::ucfirst('delete.applicants'), 'slug' => Str::of(Str::lower('delete applicants'))->slug('-')]);
        Permission::create(['name' => Str::ucfirst('approve.applicants'), 'slug' => Str::of(Str::lower('approve applicants'))->slug('-')]);
        Permission::create(['name' => Str::ucfirst('view.feedbacks'), 'slug' => Str::of(Str::lower('view feedbacks'))->slug('-')]);
        Permission::create(['name' => Str::ucfirst('delete.feedbacks'), 'slug' => Str::of(Str::lower('delete feedbacks'))->slug('-')]);

        LeaveType::create(['name' => 'Annual Leave', 'description'=>'Annual Leave']);
        LeaveType::create(['name' => 'Vacation Leave', 'description'=>'Vacation Leave']);
        LeaveType::create(['name' => 'Sabbatical Leave', 'description'=>'Sabbatical Leave']);
        LeaveType::create(['name' => 'Educational Leave', 'description'=>'Educational Leave']);
        LeaveType::create(['name' => 'Research Leave', 'description'=>'Research Leave']);
        LeaveType::create(['name' => 'Medical Leave', 'description'=>'Medical Leave']);
        LeaveType::create(['name' => 'Maternity Leave', 'description'=>'Maternity Leave']);

        Department::create(['full_name' => 'Computer Science', 'short_name'=>'Computer Science']);
        Department::create(['full_name' => 'Computer Engineering', 'short_name'=>'Computer Engineering']);
        Department::create(['full_name' => 'Electrical Engineering', 'short_name'=>'Electrical Engineering']);
        Department::create(['full_name' => 'Civil Engineering', 'short_name'=>'Civil Engineering']);

        $admin->permissions()->attach(Permission::all()); // use $superAdmin->permissions() instead of $superAdmin->permissions to attach collection
        $user->roles()->attach($admin);
    }
}
