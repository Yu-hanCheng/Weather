<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\QsortService;
class QsortServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(QsortService::class, function ($app) {
            return new QsortService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
  
    public function provides()
    {
        return [QsortService::class];
    }
}
