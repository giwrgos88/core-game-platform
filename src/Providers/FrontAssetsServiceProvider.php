<?php

namespace Giwrgos88\Game\Core\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AssetsServiceProvider
 *
 * @package Giwrgos88\Game\Front\Providers;
 */
class FrontAssetsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * [path description]
     * @param  integer $level The number of parent directories to go up.
     * @param  string  $path  The directory path
     * @return string          Return the directory path
     */
    private function path(int $level = 1, string $path): string
    {
        return dirname(__DIR__, $level) . $path;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /**
         * Publish Package Assets Files
         */
        $this->publishAssetsFiles();

        /**
         * Publish Package View Files
         */
        $this->publishViewFiles();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
    }

    /**
     * Define the routes for the application.
     *
     */
    public function map()
    {
    }

    /**
     * Publish Package Assets Files
     */
    private function publishAssetsFiles()
    {

        $this->publishes([
            $this->path(2, '/resources/assets/front') => public_path('/'),
        ], 'assets');
    }

    /**
     * Publish Package View Files
     */
    private function publishViewFiles()
    {
        $location = $this->path(2, '/resources/views/front');

        $this->loadViewsFrom(__DIR__ . '/path/to/views', 'front');

        $this->publishes([
            $location => base_path('resources/views/front'),
        ], 'views');
    }
}
