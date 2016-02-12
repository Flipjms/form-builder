<?php

namespace Clumsy\FormBuilder\Sections;

// use Clumsy\FormBuilder\Interfaces\Form as FormInterface;
use Clumsy\FormBuilder\FormBuilderException;
use Illuminate\Support\Str;

class ModelSection extends Section
{
    const DRIVER = 'model';

    protected $forms;

    public function __construct(array $section)
    {
        parent::__construct($section);

        extract($section);

        if (!isset($model)) {
            throw new FormBuilderException("A model must be provided");
        }

        $this->setModel($model);
        $this->setResource($model);
        $this->initializeForms($forms);
    }

    public function getDriver()
    {
        return self::DRIVER;
    }

    protected function initializeForms($forms)
    {
        $model = $this->getModel();
        $noElements = $model::where('section_slug', $this->getSlug())->get()->isEmpty();

        if ($noElements) {
            \Eloquent::unguard();
            foreach ($forms as $form) {
                $model::create(array(
                    'section'      => $this->getName(),
                    'section_slug' => $this->getSlug(),
                    'name'         => $form['title'],
                    'slug'         => isset($form['slug']) ? $form['slug'] : Str::slug($form['title']),
                    'form'         => json_encode(array()),
                ));
            }
        }

        $this->setForms($model::where('section_slug', $this->getSlug())->get());
    }
}
