<?php

namespace App\Providers\Interfaces;

use App\Services\InnAlgorithm;
use App\Services\InnAlgorithmInterface;
use Illuminate\Support\ServiceProvider;

class InnAlgorithmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InnAlgorithmInterface::class, function () {
            return new InnAlgorithm();
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
