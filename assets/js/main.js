$(document).ready(function () {
    $('.datetime-picker').datetimepicker({
        format: 'YYYY-MM-D'
    });
    addValidate();
});

function addValidate() {
    $('.form-user').validate({
        debug: false,
        rules: {
            name: {
                required: true
            },
            starting_date: {
                required: true
            },
            ending_date: {
                required: true
            }
        },
        onfocusout: function (element, event) {
            $(element).val($.trim($(element).val()));
        },
        highlight: function (element) {
            $(element).addClass('box-error');
        },
        unhighlight: function (element) {
            $(element).removeClass('box-error');
        }
    });
}
