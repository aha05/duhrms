<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
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
        Gate::define('create-leave-types', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-leave-types'))
                    return $role->roleHasPermission('create-leave-types');
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

        Gate::define('update-leave-types', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('update-leave-requests'))
                    return $role->roleHasPermission('update-leave-requests');
            }
        });

        Gate::define('destroy-leave-types', function (User $user) {
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
        Gate::define('create-leave-approvals', function (User $user) {
            $roles = $user->roles;
            foreach ($roles as $role) {
                if ($role->roleHasPermission('create-leave-approvals'))
                    return $role->roleHasPermission('create-leave-approvals');
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






        // Gate::define('update-post', [PostPolicy::class, 'update']);
    }
}
