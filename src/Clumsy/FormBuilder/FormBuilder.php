<?php

namespace Clumsy\FormBuilder;

use Clumsy\Assets\Facade as Asset;
use Illuminate\Database\Eloquent\Model;

class FormBuilder
{
    public function load(Model $form)
    {
        $formData = $form->form;

        Asset::enqueue('form-builder-frontend.js', 30);
        Asset::json('clumsyForms', array(
                array(
                    $form->id => $formData,
                )
            ));

        return '<div class="clumsy-form-placeholder" data-id="'.$form->id.'"></div>';
    }
}
