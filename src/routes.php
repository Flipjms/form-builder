<?php

Route::group(
    array(
        'prefix' => Config::get('clumsy/form-builder::input-prefix'),
        'before' => array_merge(array('clumsy'), (array)Config::get('clumsy/form-builder::input-filters-before')),
        'after'  => Config::get('clumsy/form-builder::input-filters-after'),
    ),
    function () {
        Route::post('clumsy-form/{id?}', array(
            'as'   => 'clumsy-form.submit',
            'uses' => 'Clumsy\FormBuilder\Controllers\FormController@submit'
        ));
    }
);