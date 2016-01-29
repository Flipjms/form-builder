<?php namespace Clumsy\FormBuilder\Models;

class ClumsyForm extends \Eloquent
{

    protected $table = 'clumsy_form';

    protected $guarded = array('id');

    public function __toString()
    {
        return $this->url();
    }
}
