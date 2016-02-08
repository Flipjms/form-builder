Vue.config.debug = true;

var clumsyFormSelectBox = Vue.extend({
    name: 'select-box',
    template: '#select-box',

    props: ['data'],
});

// Register all the components!
Vue.component('select-box', clumsyFormSelectBox);

var clumsyForms = [];
var clumsyForm = Vue.extend({
    name: 'clumsy-form',

    methods: {
        submit: function() {
            var url = handover.clumsyFormUrl + '/' + this.id;
            console.log(this.elements);
            $.ajax({
                type: 'POST',
                url: url,
                data: {form: this.elements},
                dataType: 'json',
                success: function (data) {
                },
                error: function (jqXHR, textStatus, errorThrown) {
                },
                complete: function(jqXHR, textStatus) {
                }
            });
        }
    }
});

$.each($('.clumsy-form-placeholder'), function(key, value) {
    var formId = $(value).data('id');
    var form = new clumsyForm({
        el: value,
        data: {
            elements: JSON.parse(handover.clumsyForms[formId]),
            id: formId,
        }
    });
});