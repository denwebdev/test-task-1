<?php

namespace App\Providers\Interfaces;

use App\Services\InnRequest;
use App\Services\InnRequestInterface;
use Illuminate\Support\ServiceProvider;

class InnRequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InnRequestInterface::class, function () {
            return new InnRequest();
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
}
