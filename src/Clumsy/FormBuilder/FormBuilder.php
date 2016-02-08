<?php

namespace Clumsy\FormBuilder;

use Clumsy\Assets\Facade as Asset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class FormBuilder
{
    public function load(Model $form)
    {
        $formData = $form->form;

        Asset::enqueue('form-builder-frontend.js', 30);
        Asset::json('clumsyForms', array(
                $form->id => $formData,
            ));

        Asset::json('clumsyFormUrl', route('form-builder.submit',''));

        return View::make('clumsy/form-builder::form-builder-frontend', compact('form'));
    }
}
