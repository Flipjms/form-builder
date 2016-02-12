@extends('clumsy::templates.edit')

@section('master')
{{ Form::model($item, array('method' => ($item->exists ? 'put' : 'post'), 'route' => ($item->exists ? array("$admin_prefix.$resource.update", $item->id) : "$admin_prefix.$resource.store"), 'id' => 'main-form', 'autocomplete' => 'off')) }}

    <div class="row">
        <div class="col-md-6">
            {{ Form::field('name', 'Nome') }}
        </div>
    </div>

    <div id="clumsy-form" class="clearfix">
        <component
            v-for="element in elements"
            :is="element.template"
            track-by="$index"
            :data.sync="element"
        >
        </component>
        <div class="new-field-wrapper">
            <new-field></new-field>
        </div>

        {{ Form::hidden('form', null, array('v-model' => 'elements | json')) }}
        {{ Form::hidden('section_slug', null) }}
    </div>

    @include('clumsy/form-builder::form-builder-templates')

    @include('clumsy::templates.bottom-buttons')
{{ Form::close() }}
@stop