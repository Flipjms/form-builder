<?php

namespace Clumsy\FormBuilder\Controllers;

use Clumsy\FormBuilder\Models\ClumsyFormStructure;
use Clumsy\FormBuilder\Facade as FormBuilder;
use Clumsy\CMS\Controllers\AdminController;
use Clumsy\Assets\Facade as Asset;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class FormController extends AdminController
{
    public function index($data = array())
    {
        $view = parent::index($data);

        $data = $view->getData();
        $data['sections'] = FormBuilder::getSectionsArray();

        return View::make('clumsy/form-builder::index', $data);
    }

    public function create($data = array())
    {
        $view = parent::create($data);

        Asset::enqueue('form-builder.css', 30);
        Asset::enqueue('form-builder.js', 30);

        $data = $view->getData();
        $data['item']->section_slug = Input::get('section_slug');


        return View::make('clumsy/form-builder::form-builder', $data);
    }

    public function store()
    {
        $this->addSlugToInput();
        return parent::store();
    }

    public function update($id)
    {
        $this->addSlugToInput();
        return parent::update($id);
    }

    public function edit($id, $data = array())
    {
        $view = parent::edit($id, $data);

        Asset::enqueue('form-builder.css', 30);
        Asset::enqueue('form-builder.js', 30);

        $data = $view->getData();

        return View::make('clumsy/form-builder::form-builder', $data);
    }

    public function submit($id)
    {
        ClumsyFormResponse::create(array(
            'form_id' => $id,
            'form' => Input::get('form'),
        ));

        return Response::json(null, 200);
    }

    protected function addSlugToInput()
    {
        $data = Input::all();
        $data['slug'] = Str::slug(Input::get('name'));
        Input::replace($data);
    }
}
