$(document).ready(function () {
    initDatetimepicker();

    addValidate();

    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();

        if (confirm('Are you sure want to delete work?')) {
            $(this).closest('.form-delete').submit();
        }
    });

    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'index.php?a=edit',
            method: 'POST',
            data: {
                id: $(this).data('work')
            }
        }).done(function (res) {
            $('#edit-modal .modal-body').html(res);
            initDatetimepicker();
        });
    });
});

function initDatetimepicker() {
    $('.datetime-picker').datetimepicker({
        format: 'YYYY-MM-D'
    });
}

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
