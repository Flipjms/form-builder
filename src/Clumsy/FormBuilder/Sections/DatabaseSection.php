<?php

namespace Clumsy\FormBuilder\Sections;

// use Clumsy\FormBuilder\Interfaces\Form as FormInterface;
use Clumsy\FormBuilder\FormBuilderException;
use Illuminate\Support\Facades\Config;

class DatabaseSection extends Section
{
    const DRIVER = 'database';

    public function __construct(array $form)
    {
        parent::__construct($form);

        $this->setModel('Clumsy\FormBuilder\Models\ClumsyFormStructure');
        $this->setResource(Config::get('clumsy/form-builder::resource'));
        $this->initializeForms();
    }

    public function getDriver()
    {
        return self::DRIVER;
    }

    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    protected function initializeForms()
    {
        $model = $this->getModel();
        $this->setForms($model::where('section_slug', $this->getSlug())->get());
    }
}
