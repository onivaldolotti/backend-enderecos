<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Cep\CepServiceInterface;
use App\Services\Cep\ViaCepService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CepServiceInterface::class, ViaCepService::class);
        $this->app->bind(AddressManagementService::class, function ($app) {
            return new AddressManagementService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
