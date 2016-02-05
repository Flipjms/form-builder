Vue.config.debug = true;

var clumsyFormSelectBox = Vue.extend({
    name: 'select-box',
    template: '#select-box',

    props: ['data'],

    data: function() {
        return {
            selected: ''
        };
    },
});

// Register all the components!
Vue.component('select-box', clumsyFormSelectBox);

var clumsyForms = [];
var clumsyForm = Vue.extend({
    name: 'clumsy-form',
});

$.each($('.clumsy-form-placeholder'), function(key, value) {
    var formId = $(value).data('id');
    var form = new clumsyForm({
        el: value,
        data: {
            elements: JSON.parse(handover.clumsyForms[formId])
        }
    });
});