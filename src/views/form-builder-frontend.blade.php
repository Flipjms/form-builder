<div class="clumsy-form-placeholder" data-id="{{ $form->id }}">
    <component
        v-for="element in elements"
        :is="element.template"
        track-by="$index"
        :data.once="element"
    >
    </component>
</div>

@include('clumsy/form-builder::form-builder-frontend-templates')