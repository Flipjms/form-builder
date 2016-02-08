<?php

namespace Clumsy\FormBuilder\Models;

class ClumsyFormResponse extends ClumsyForm
{
    protected $table = 'clumsy_form_responses';

    protected $fillable = array('form_id', 'form');
}
