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







        // Gate::define('update-post', [PostPolicy::class, 'update']);
    }
}
