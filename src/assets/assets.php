<?php

return array(

    'vue' => [
        'set'   => 'footer',
        'path'  => 'https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.15/vue.js'
    ],

    'jquery' => array(
        'set'   => 'footer',
        'path'  => '//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js',
    ),

    'form-builder.css' => array(
        'set'   => 'styles',
        'path'  => 'packages/clumsy/form-builder/css/form-builder.css',
        'v'     => '0.0.1',
    ),

    'form-builder.js' => array(
        'set'   => 'footer',
        'path'  => 'packages/clumsy/form-builder/js/form-builder.min.js',
        'v'     => '0.0.1',
        'req'   => array(
            'vue',
            'jquery',
        ),
    ),
);
