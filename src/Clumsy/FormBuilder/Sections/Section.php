<?php

namespace Clumsy\FormBuilder\Sections;

use Clumsy\FormBuilder\FormBuilderException;
use Illuminate\Support\Str;

abstract class Section
{
    protected $name;
    protected $slug;
    protected $resource;
    protected $model;
    protected $forms;

    public function __construct(array $section)
    {
        extract($section);

        if (!isset($section)) {
            throw new FormBuilderException("A section must be provided");
        }

        $this->setName($name);
        $this->setSlug(Str::slug($name));
    }

    public function getForms()
    {
        if (is_null($this->forms)) {
            $model = $this->getModel();
            $this->setForms($model::where('section', $this->getName())->get());
        }

        return $this->forms;
    }

    public function setForms($forms)
    {
        $this->forms = $forms;
    }

    public function setResource($model)
    {
        $this->resource = snake_case($model);
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSlug($value)
    {
        $this->slug = $value;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setModel($value)
    {
        $this->model = $value;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function model()
    {
        $class = $this->getModel();
        return new $class;
    }
}
