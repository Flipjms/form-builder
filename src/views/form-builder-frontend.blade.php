<div id="clumsy-form">
    <component
        v-for="element in elements"
        :is="element.template"
        track-by="$index"
        :data.once="element"
    >
    </component>
</div>

<template id="select-item">
    <label>@{{ data.title.text }}</label>
    <select>
        <option v-for="option in data.options" :option.once="option" value="@{{ option.value }}">
            @{{ option.key  }}
        </option>
    </select>
</template>