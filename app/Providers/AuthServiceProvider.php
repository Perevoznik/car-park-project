<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-manager', function(User $user){

            $role = mb_strtolower($user->role->role_name);

            if($role == "manager")
                return true;

            return false;
        });

        Gate::define('is-driver', function(User $user){

            $role = mb_strtolower($user->role->role_name);

            if($role == "driver")
                return true;

            return false;
        });
    }
}
