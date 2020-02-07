<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Pdf;

class PdfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected $defer = true;

    public function register()
    {
        $this->app->bind(Pdf::class, function ($app) {
            return new Pdf($app['config']['dompdf']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function provides()
    {
        //
    }

    public function boot()
    {
        return [Pdf::class];
    }
}
