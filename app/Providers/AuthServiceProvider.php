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
             

            return $user->role_id == 1;
        });
        Gate::define('admin', function ($user) {
           
            return $user->role_id > 3;
        });
        Gate::define('post', function($user, $post){
            return $user->role_id == 1 || $user->id == $post->user_id;
        });


    }
}
