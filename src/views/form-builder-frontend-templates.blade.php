<template id="select-box">
    <label>@{{ data.title.text }}</label>
    <select v-model="data.selectedOption">
        <option></option>
        <option v-for="option in data.options" :option.once="option" value="@{{ option.value }}">
            @{{ option.label  }}
        </option>
    </select>
    <div v-for="option in data.options"
        class="children-box"
        v-if="option.value == data.selectedOption"
    >

        <component v-for="child in option.children"
                    :data.sync="child"
                    :is="child.template"
                    track-by="$index">
        </component>
    </div>
</template>