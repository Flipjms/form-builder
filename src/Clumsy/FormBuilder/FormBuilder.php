<?php

namespace Clumsy\FormBuilder;

use Clumsy\Assets\Facade as Asset;
use Clumsy\FormBuilder\FormBuilderException;
use Clumsy\FormBuilder\Models\ClumsyFormStructure;
use Clumsy\FormBuilder\Sections\DatabaseSection;
use Clumsy\FormBuilder\Sections\ModelSection;
use Clumsy\FormBuilder\Collections\SectionCollection;
use Clumsy\Utils\Facades\HTTP as ClumsyHTTP;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class FormBuilder
{
    private $forms;
    private $sections;
    private $prefix;

    public function __construct()
    {
        $this->setPrefix(Config::get('clumsy/form-builder::input-prefix'));

        $this->sections = new SectionCollection;

        $sections = Config::get('clumsy/form-builder::sections');
        foreach ($sections as $section) {
            $sectionObj = $section['driver'] == 'database' ? new DatabaseSection($section) : new ModelSection($section);

            $this->sections->addItem($sectionObj, $sectionObj->getSlug());
        }
    }

    public function load(Model $form)
    {
        $formData = $form->form;

        Asset::enqueue('form-builder-frontend.js', 30);
        Asset::json('clumsyForms', array(
                $form->id => $formData,
            ));

        Asset::json('clumsyFormUrl', route('form-builder.submit', ''));

        return View::make('clumsy/form-builder::form-builder-frontend', compact('form'));
    }

    public function loadIndex($section)
    {
        $section = $this->sections->getItem($section);

        if (!$section) {
            throw new FormBuilderException('invalid section given');
        }

        $items = $section->getForms()->each(function ($item) use ($section) {
            return $item['resource_name'] = $section->getResource();
        });

        $addNewButton = $section->getDriver() != 'model';

        $route = ClumsyHTTP::queryStringAdd(
            route($this->getPrefix().".".$section->getResource().".create"),
            'section_slug',
            $section->getSlug()
        );

        return View::make('clumsy/form-builder::partials.table', array('items' => $items, 'route' => $route, 'addNewButton' => $addNewButton, 'columns' => $section->model()->columns()));
    }

    protected function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    protected function getPrefix()
    {
        return $this->prefix;
    }

    public function getSections()
    {
        return $this->sections;
    }

    public function getSectionsArray()
    {
        return $this->sections->getAllItems();
    }

    // public function getForms()
    // {
    //     return $this->forms;
    // }

    // public function getFormsArray()
    // {
    //     dd($this->forms);
    //     return $this->forms->getAllItems();
    // }

    public function getModelForms()
    {
        return array_filter($this->getFormsArray(), function ($item) {
            return $item->getDriver() == 'model';
        });
    }
}
