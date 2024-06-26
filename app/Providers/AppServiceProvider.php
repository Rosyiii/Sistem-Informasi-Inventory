<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Gate::define('owner', function(User $user){
            return $user->jabatan === 'Owner';
        });

        Gate::define('storeManager', function(User $user){
            return $user->jabatan === 'Store Manager';
        });

        Gate::define('karyawan', function(User $user){
            return $user->jabatan === 'Karyawan';
        });
    }
}
