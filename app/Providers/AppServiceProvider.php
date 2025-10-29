<?php

namespace App\Providers;

use App\Enums\RoleTypes;
use App\Observers\PermissionObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole(RoleTypes::CENTRAL_ADMIN->value) ? true : null;
        });

        Permission::observe(PermissionObserver::class);
    }
}
