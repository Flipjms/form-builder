<?php

namespace Clumsy\FormBuilder\Interfaces;

interface Form
{
    public function __construct(array $form);
    public function getSection();
    public function getDriver();
    public function getItems();
    public function getResource();
}
