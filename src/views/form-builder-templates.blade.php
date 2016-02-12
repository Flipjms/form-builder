<template id="new-field">
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
            @{{ selectedOption.name }}
            <span class="caret"></span>
        </button>

        <ul class="dropdown-menu">
            <li v-for="option in options">
                <a @click="changeOption(option.id)">@{{ option.name }}</a>
            </li>
        </ul>
    </div>
    <i class="glyphicon glyphicon-plus clumsy-form-icon" @click="addNew()"></i>
</template>

<template id="select-box">
    <div class="select-box-wrapper">
        <div class="select-box-header">
            <h3>
                <span class="badge"> select </span>
                <span v-on:click="toggleTitleEditing" v-show="!data.title.editing">@{{ data.title.text  }}</span>
                <input
                    type="text"
                    placeholder="título"
                    v-model="data.title.text"
                    v-show="data.title.editing"
                    v-on:focusout="toggleTitleEditing"
                >
            </h3>
        </div>
        <div class="select-box-body" v-show="hasOptions">
            <select-option :option.sync="option" v-for="option in data.options" track-by="$index"></select-option>
        </div>
        <div class="select-box-footer">
            <span v-on:click="newOption" class="add-option">
                <i class="glyphicon glyphicon-plus"></i>
                adicionar opção
            </span>
        </div>
    </div>
</template>

<template id="select-option">
    <div class="select-option-wrapper clearfix">
        <i class="glyphicon glyphicon-trash"></i>
        <div class="inputs-wrapper">
            <input type="text" placeholder="text" v-model="option.label">
            <input type="text" placeholder="value" v-model="option.value">
        </div>
        <div class="line"></div>
        <i class="glyphicon glyphicon-plus clumsy-form-option-icon" v-on:click="newChild"></i>
        <div class="children-box" v-bind:class="{ 'active': hasMultipleChildren}">
            <component v-for="child in option.children"
                        :data.sync="child"
                        :is="child.template"
                        track-by="$index">
            </component>
        </div>
    </div>
</template>


<template id="hint-box">
    <h1>Isto é uma hint box</h1>
</template>