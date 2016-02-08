<div class="clumsy-form-placeholder" data-id="{{ $form->id }}">
    <component
        v-for="element in elements"
        :is="element.template"
        track-by="$index"
        :data.once="element"
    >
    </component>
    <button type="button" @click="submit">Carrega aqui para ver o que acontece</button>
</div>

@include('clumsy/form-builder::form-builder-frontend-templates')