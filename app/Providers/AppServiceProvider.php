<?php

namespace App\Providers;

use App\Interfaces\ProductLedgerInterface;
use App\Services\ProductLedgerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->register(RouteServiceProvider::class);
        $this->app->bind(ProductLedgerInterface::class, ProductLedgerService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
