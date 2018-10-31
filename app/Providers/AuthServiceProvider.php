<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

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

        Gate::define('superadmin', function ($user) {
             dd($user->role_id);

            return $user->role_id == 1;
        });
        Gate::define('admin', function ($user) {
            dd($user->role_id);
            return $user->role_id > 3;
        });
        Gate::define('user', function ($user) {

            return $user->role_id == 1;
        });

    }
}
