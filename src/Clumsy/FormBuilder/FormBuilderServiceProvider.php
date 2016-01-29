<?php

namespace Clumsy\FormBuilder;

use Illuminate\Support\ServiceProvider;
use Clumsy\Assets\Facade as Asset;

class FormBuilderServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // $this->app['formbuilder'] = new MediaManager;
    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $path = __DIR__.'/../..';

        $this->package('clumsy/form-builder');

        $assets = include($this->guessPackagePath() . '/assets/assets.php');
        Asset::batchRegister($assets);

        // require $path.'/helpers.php';
        // require $path.'/macros/form.php';
        // require $path.'/macros/html.php';
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}