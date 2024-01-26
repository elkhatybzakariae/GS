<?php

namespace App\Providers;

use Laravel\Passport\Passport;  

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App/Models/Model'=>'App/Policies/ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Passport::loadKeysFrom(base_path('oauth-keys'));
        Passport::loadKeysFrom(storage_path('oauth-keys'));
        // Passport::routes();
        // Passport::routes(function ($router) {
        //     $router->forAccessTokens();
        // });

        


    }
}
