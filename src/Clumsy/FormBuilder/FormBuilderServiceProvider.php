<?php

namespace Clumsy\FormBuilder;

use Clumsy\Assets\Facade as Asset;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $path = __DIR__.'/../..';

        $this->package('clumsy/form-builder', 'clumsy/form-builder', $path);

        $this->app['form-builder'] = new FormBuilder;
        $this->registerRoutes();

        $assets = include($this->guessPackagePath() . '/assets/assets.php');
        Asset::batchRegister($assets);

        require $path.'/macros/form.php';
        require $path.'/routes.php';
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

    public function registerRoutes()
    {
        Route::group(
            array(
                'prefix' => Config::get('clumsy/form-builder::input-prefix'),
                'before' => array_merge(array('clumsy'), (array)Config::get('clumsy/form-builder::input-filters-before')),
                'after'  => Config::get('clumsy/form-builder::input-filters-after'),
            ),
            function () {
                $sections = app('form-builder')->getSections();

                foreach ($sections->getAllItems() as $section) {
                    Route::resource($section->getResource(), 'Clumsy\FormBuilder\Controllers\FormController');
                }
            }
        );
    }
}
