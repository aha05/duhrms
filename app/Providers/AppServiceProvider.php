<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */


    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        // Role CRUD permission
        Gate::define('create-roles', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-roles'))
                    return $role->roleHasPermission('create-roles');
            }
        });

        Gate::define('update-roles', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-roles'))
                    return $role->roleHasPermission('update-roles');
            }
        });

        Gate::define('destroy-roles', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-roles'))
                    return $role->roleHasPermission('destroy-roles');
            }
        });

        Gate::define('view-roles-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-roles-lists'))
                    return $role->roleHasPermission('view-roles-lists');
            }
        });

        // User CRUD permission
        Gate::define('create-users', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-users'))
                    return $role->roleHasPermission('create-users');
            }
        });

        Gate::define('update-users', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-users'))
                    return $role->roleHasPermission('update-users');
            }
        });

        Gate::define('destroy-users', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-users'))
                    return $role->roleHasPermission('destroy-users');
            }
        });

        Gate::define('view-users-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-users-lists'))
                    return $role->roleHasPermission('view-users-lists');
            }
        });


        // Employee CRUD permission
        Gate::define('create-employees', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-employees'))
                    return $role->roleHasPermission('create-employees');
            }
        });

        Gate::define('update-employees', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-employees'))
                    return $role->roleHasPermission('update-employees');
            }
        });

        Gate::define('destroy-employees', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-employees'))
                    return $role->roleHasPermission('destroy-employees');
            }
        });

        Gate::define('view-employees-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-employees-lists'))
                    return $role->roleHasPermission('view-employees-lists');
            }
        });

        // Department CRUD permission
        Gate::define('create-departments', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-departments'))
                    return $role->roleHasPermission('create-departments');
            }
        });

        Gate::define('update-departments', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-departments'))
                    return $role->roleHasPermission('update-departments');
            }
        });

        Gate::define('destroy-departments', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-departments'))
                    return $role->roleHasPermission('destroy-departments');
            }
        });

        Gate::define('view-departments-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-departments-lists'))
                    return $role->roleHasPermission('view-departments-lists');
            }
        });

        // leave type CRUD permission
        Gate::define('create-leaves-types', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-leaves-types'))
                    return $role->roleHasPermission('create-leaves-types');
            }
        });

        Gate::define('update-leave-types', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-leave-types'))
                    return $role->roleHasPermission('update-leave-types');
            }
        });

        Gate::define('destroy-leave-types', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-leave-types'))
                    return $role->roleHasPermission('destroy-leave-types');
            }
        });

        Gate::define('view-leave-types-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-leave-types-lists'))
                    return $role->roleHasPermission('view-leave-types-lists');
            }
        });


        // leave request CRUD permission
        Gate::define('create-leave-requests', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-leave-requests'))
                    return $role->roleHasPermission('create-leave-requests');
            }
        });

        Gate::define('update-leave-requests', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-leave-requests'))
                    return $role->roleHasPermission('update-leave-requests');
            }
        });

        Gate::define('destroy-leave-requests', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-leave-requests'))
                    return $role->roleHasPermission('destroy-leave-requests');
            }
        });

        Gate::define('view-leave-requests-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-leave-requests-lists'))
                    return $role->roleHasPermission('view-leave-requests-lists');
            }
        });

        // leave approvals CRUD permission
        Gate::define('create-leaves-approvals', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-leaves-approvals'))
                    return $role->roleHasPermission('create-leaves-approvals');
            }
        });

        Gate::define('update-leave-approvals', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-leave-approvals'))
                    return $role->roleHasPermission('update-leave-approvals');
            }
        });

        Gate::define('destroy-leave-approvals', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-leave-approvals'))
                    return $role->roleHasPermission('destroy-leave-approvals');
            }
        });

        Gate::define('view-leave-approvals-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-leave-approvals-lists'))
                    return $role->roleHasPermission('view-leave-approvals-lists');
            }
        });


        // vacancy request CRUD permission
        Gate::define('create-vacancy-requests', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-vacancy-requests'))
                    return $role->roleHasPermission('create-vacancy-requests');
            }
        });

        Gate::define('update-vacancy-requests', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-vacancy-requests'))
                    return $role->roleHasPermission('update-vacancy-requests');
            }
        });

        Gate::define('destroy-vacancy-requests', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-vacancy-requests'))
                    return $role->roleHasPermission('destroy-vacancy-requests');
            }
        });

        Gate::define('view-vacancy-requests-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-vacancy-requests-lists'))
                    return $role->roleHasPermission('view-vacancy-requests-lists');
            }
        });

        // Vacancy approvals CRUD permission
        Gate::define('create-vacancy-approvals', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-vacancy-approvals'))
                    return $role->roleHasPermission('create-vacancy-approvals');
            }
        });

        Gate::define('update-vacancy-approvals', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-vacancy-approvals'))
                    return $role->roleHasPermission('update-vacancy-approvals');
            }
        });

        Gate::define('destroy-vacancy-approvals', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-vacancy-approvals'))
                    return $role->roleHasPermission('destroy-vacancy-approvals');
            }
        });

        Gate::define('view-vacancy-approvals-lists', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-vacancy-approvals-lists'))
                    return $role->roleHasPermission('view-vacancy-approvals-lists');
            }
        });

        // View Reports
        Gate::define('view-reports', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-reports'))
                    return $role->roleHasPermission('view-reports');
            }
        });

        Gate::define('generate-reports', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('generate-reports'))
                    return $role->roleHasPermission('generate-reports');
            }
        });

        Gate::define('import-excels', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('import-excels'))
                    return $role->roleHasPermission('import-excels');
            }
        });

        Gate::define('post-jobs', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('post-jobs'))
                    return $role->roleHasPermission('post-jobs');
            }
        });

        Gate::define('destroy-jobs', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-jobs'))
                    return $role->roleHasPermission('destroy-jobs');
            }
        });

        Gate::define('update-jobs', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-jobs'))
                    return $role->roleHasPermission('update-jobs');
            }
        });

        Gate::define('view-jobs-table', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-jobs-table'))
                    return $role->roleHasPermission('view-jobs-table');
            }
        });

        Gate::define('post-notices', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('post-notices'))
                    return $role->roleHasPermission('post-notices');
            }
        });

        Gate::define('destroy-notices', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('destroy-notices'))
                    return $role->roleHasPermission('destroy-notices');
            }
        });

        Gate::define('update-notices', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-notices'))
                    return $role->roleHasPermission('update-notices');
            }
        });

        Gate::define('view-notices-table', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-notices-table'))
                    return $role->roleHasPermission('view-notices-table');
            }
        });

        Gate::define('view-dashboard', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-dashboard'))
                    return $role->roleHasPermission('view-dashboard');
            }
        });

        Gate::define('view-applicants', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-applicants'))
                    return $role->roleHasPermission('view-applicants');
            }
        });

        Gate::define('approve-applicants', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('approve-applicants'))
                    return $role->roleHasPermission('approve-applicants');
            }
        });

        Gate::define('view-feedbacks', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-feedbacks'))
                    return $role->roleHasPermission('view-feedbacks');
            }
        });

        Gate::define('delete-feedbacks', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('delete-feedbacks'))
                    return $role->roleHasPermission('delete-feedbacks');
            }
        });

        Gate::define('view-applicants', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('view-applicants'))
                    return $role->roleHasPermission('view-applicants');
            }
        });

        // View::share('notifications', 'share'); //! you can share value to all


    }
}
