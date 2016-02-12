<?php

/*
 |--------------------------------------------------------------------------
 | Form Builder settings
 |--------------------------------------------------------------------------
 |
 |
 */

return array(
    'resource' => 'clumsy_form',
    /*
     |--------------------------------------------------------------------------
     | URL prefix
     |--------------------------------------------------------------------------
     |
     | URL prefix to prepend on back-end media routes
     |
     */

    'input-prefix' => '',

    /*
     |--------------------------------------------------------------------------
     | Route filters
     |--------------------------------------------------------------------------
     |
     | Any route filters you'd like to add before or after media routes can be
     | declared here.
     |
     */

    'input-filters-before' => '',
    'input-filters-after'  => '',

    /*
     |--------------------------------------------------------------------------
     | Media output (Processing and response)
     |--------------------------------------------------------------------------
     */

    'output-prefix' => '',

    'output-filters-before' => '',
    'output-filters-after'  => '',


    /*
    |--------------------------------------------------------------------------
    | Sections
    |--------------------------------------------------------------------------
    |
    | Create new entry per section
    |
    */
   'sections' => array(
        array(
            /*
            |--------------------------------------------------------------------------
            | driver
            |--------------------------------------------------------------------------
            |
            | database:
            | allows to create forms dinamically. All of them will be processed
            | by the package default behaviour
            |
            | model:
            | only one form per entry, but allows override the default behaviour
            |
            */
            'driver' => 'database',

            /*
            |--------------------------------------------------------------------------
            | Name
            |--------------------------------------------------------------------------
            |
            | Section name
            |
            */
            'name' => 'Database Driven',

            /*
            |--------------------------------------------------------------------------
            | model
            |--------------------------------------------------------------------------
            |
            | only available for model driver.
            | Specifies which models will handle form proccessing
            |
            */
            // 'model' => 'ModelPath'

            /*
            |--------------------------------------------------------------------------
            | forms
            |--------------------------------------------------------------------------
            |
            | only available for model driver.
            | Creates forms for this section
            |
            */
            // 'forms' => array(
            // ),

        ),
        array(
            'driver' => 'model',
            'name'   => 'Model Driven',
            'model'  => 'CustomForm',
            'forms' => array(
                array(
                    'title' => 'Paralelipipedos',
                ),
                array(
                    'title' => 'Pneumoultramicroscopicossilicovulcanoconiotico'
                ),
            ),
        )
    )
);
