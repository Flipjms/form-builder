<?php

// use Illuminate\Support\Facades\Crypt;
// use Illuminate\Support\Facades\Form;
// use Illuminate\Support\Facades\HTML;
// use Illuminate\Support\Facades\URL;
// use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Event;

use Clumsy\Assets\Facade as Asset;

Form::macro('builder', function () {

    Asset::enqueue('form-builder.css', 30);
    Asset::enqueue('form-builder.js', 30);

    $output = View::make('clumsy/form-builder::form-builder')->render();

    return $output;
});
