// Config:
Vue.config.debug = true;

// Data Prototypes:
var formPrototypes = {
    select: {
        template: 'select-box',
        title: {
            editing: true,
            text: '',
        },
        options: []
    },

    hint: {}
};

// New Fields:
var clumsyFormNewField = Vue.extend({
    name: 'new-field',
    template: '#new-field',

    data: function() {
        return {
            options: [
                {
                    id: 'select',
                    name: 'Select',
                    template: 'select-box',
                },
                {
                    id: 'hint',
                    name: 'Hint',
                    template: 'hint-box'
                }
            ],

            selectedOption: {
                'id': null,
                'name': 'Selecionar Campo'
            }
        };
    },

    methods: {
        changeOption: function(optionId) {
            var thisObj = this;
            $.each(this.options, function(key, option) {
                if (optionId == option.id) {
                    thisObj.selectedOption = option;
                }
            });
        },

        addNew: function() {
            if (this.selectedOption.id !== null) {
                this.$dispatch('new-element',
                            $.extend(
                                true,
                                {template: this.selectedOption.template},
                                formPrototypes[this.selectedOption.id]
                            )
                        );
            }
        }
    }
});

var clumsyFormSelectOption = Vue.extend({
    name: 'select-option',
    template: '#select-option',

    props: ['option'],

    computed: {
        hasMultipleChildren: function() {
            return (this.option.children.length > 1);
        }
    },

    methods: {
        'newChild': function() {
            this.option.children.push($.extend(true, {}, formPrototypes.select));
        }
    }
});

var clumsyFormSelectBox = Vue.extend({
    name: 'select-box',
    template: '#select-box',

    props: ['data'],

    data: function() {
        return {
            boxClass: {
                'col-md-6': true
            }
        };
    },

    computed: {
        hasOptions: function() {
            return (this.data.options.length > 0);
        },
    },

    methods: {
        'toggleTitleEditing': function(event) {
            if (this.data.title.text !== '') {
                this.data.title.editing = !this.data.title.editing;
            }
        },
        'newOption': function() {
            console.log('got here dunno why!');
            this.data.options.push({label: '', value: '', children: []});
        }
    },
});

var clumsyFormHintBox = Vue.extend({
    name: 'hint-box',
    template: '#hint-box',
});

// Register all the components!
Vue.component('new-field', clumsyFormNewField);
Vue.component('select-option', clumsyFormSelectOption);
Vue.component('select-box', clumsyFormSelectBox);
Vue.component('hint-box', clumsyFormHintBox);

var clumsyForm = Vue.extend({
    name: 'clumsy-form',

    data: function () {
        return {
            elements: [],
        };
    },

    events: {
        'new-element': function(element) {
            this.elements.push(element);
        }
    }
});

var clumsyFormObj = new clumsyForm({
    el: '#clumsy-form',
});