<?php

namespace Clumsy\FormBuilder\Models;

abstract class ClumsyForm extends \Clumsy\CMS\Models\BaseModel
{
    protected $table = 'clumsy_forms';

    public $columns = array(
        'name'   => 'Nome',
    );

    public function setFormAttribute($value)
    {
        $this->attributes['form'] = json_encode(json_decode($value));
    }
}
