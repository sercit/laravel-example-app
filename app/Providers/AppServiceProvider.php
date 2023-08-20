<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Lottery;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;

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
        Feature::define('canadian-form', fn (User $user) => match (true) {
            $user->country === 'CAN' && Lottery::odds(5,100) => true,
            default => false,
        });
        Feature::define('design', fn (User $user) => match (true) {
            $user->subscription->level > 3 => 'full',
            $user->subscription->level > 1 => 'elements',
            default => null,
        });

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
