<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('manage-users', function ($user) {

            return $user->hasAnyRole(['admin']);
        });

        Gate::define('manage-users', function ($user) {

            return $user->hasAnyRole(['user']);
        });



        Gate::define('edit-users', function ($user) {

            return $user->isAdmin();
        });



        Gate::define('delete-users', function ($user) {

            return $user->isAdmin();
        });
    }
}
