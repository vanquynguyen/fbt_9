<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Facade\Process\ProcessUploadFile;
use App\Facade\Process\ProcessSearch;

class FacadesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('UploadFile', ProcessUploadFile::class);
        $this->app->bind('Search', ProcessSearch::class);
    }
}
