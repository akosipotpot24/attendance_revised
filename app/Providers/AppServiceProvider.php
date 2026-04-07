<?php

namespace App\Providers;

use App\Events\AuditTrails;
use App\Events\StudentUpdated;
use App\Listeners\LoginDetails;
use App\Listeners\LogStudentUpdate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

        protected $listen = [
            StudentUpdated::class => [
            LogStudentUpdate::class,
            ],

                AuditTrails::class => [
             
                LoginDetails::class
            ],

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
        //
    }
}
