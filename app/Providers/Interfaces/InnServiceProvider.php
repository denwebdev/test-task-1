<?php

namespace App\Providers\Interfaces;

use App\Services\Inn;
use App\Services\InnAlgorithmInterface;
use App\Services\InnInterface;
use App\Services\InnRequestInterface;
use Illuminate\Support\ServiceProvider;

class InnServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InnInterface::class, function () {
            return new Inn(
                app(InnAlgorithmInterface::class),
                app(InnRequestInterface::class)
            );
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
