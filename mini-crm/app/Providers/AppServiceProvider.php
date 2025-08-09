<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\Client;
use App\Policies\ClientPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
    \App\Models\Client::class => \App\Policies\ClientPolicy::class,
    // other policy mappings...
    ];
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
        Gate::define('view-client', [ClientPolicy::class, 'view']);
        Gate::define('update-client', [ClientPolicy::class, 'update']);
        Gate::define('delete-client', [ClientPolicy::class, 'delete']);
    }
}
