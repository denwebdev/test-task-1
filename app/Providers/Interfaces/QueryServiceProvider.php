<?php

namespace App\Providers\Interfaces;

use App\Models\Query;
use App\Models\QueryInterface;
use Illuminate\Support\ServiceProvider;

class QueryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryInterface::class, function () {
            return new Query();
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
