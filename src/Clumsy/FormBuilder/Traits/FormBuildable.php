<?php namespace Clumsy\FormBuilder\Traits;

use Illuminate\Support\Facades\Input;

trait FormBuildable
{

    // public static function bootFormBuildable()
    // {
    //     self::saving(function ($model) {
    //         $model->form = json_encode(json_decode($model->form));
    //         // dd(json_encode(json_decode($model->form)));
    //         // $form = json_encode(\Input::get('elements'));
    //         // \Input::replace(array_merge(\Input::except('elements'), ['form' => $form]));
    //         // dd(Input::all());
    //         // unset($model->xis)
    //         // dd('yup. im saving this shit...');
    //     });
    // }
}
