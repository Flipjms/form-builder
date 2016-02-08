<?php

namespace Clumsy\FormBuilder\Controllers;

use Clumsy\FormBuilder\Models\ClumsyFormResponse;
use Clumsy\CMS\Controllers\AdminController;
use Clumsy\Assets\Facade as Asset;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class FormController extends AdminController
{
    public function index($data = array())
    {
        $view = parent::index($data);

        Asset::enqueue('form-builder.css', 30);
        Asset::enqueue('form-builder.js', 30);

        return View::make('clumsy/form-builder::index', $view->getData());
    }

    public function submit($id)
    {
        ClumsyFormResponse::create(array(
            'form_id' => $id,
            'form' => Input::get('form'),
        ));

        return Response::json(null, 200);
    }
}
