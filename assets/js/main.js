$(document).ready(function () {
    initDatetimepicker();

    $(document).find('.form-user').each(function () {
        addValidate($(this));
    });

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

    if ($('#calendar').length) {
        initCalendarView();
    }
});

function initDatetimepicker() {
    $('.datetime-picker').datetimepicker({
        format: 'YYYY-MM-D'
    });
}

function addValidate(form) {
    $.validator.addMethod('after_start_date', function (value) {
        if (!value || !form.find('.start-date').val()) {
            return true;
        }

        let startDate = new Date(form.find('.start-date').val());
        let endDate = new Date(value);

        return endDate >= startDate;
    }, 'Ending date must be after or equal Starting date');

    form.validate({
        debug: false,
        rules: {
            name: {
                required: true
            },
            starting_date: {
                required: true
            },
            ending_date: {
                required: true,
                after_start_date: true
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

function initCalendarView() {
    $.ajax({
        url: 'index.php?a=getCalendarData',
        method: 'POST',
    }).done(function (res) {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: new Date(),
            defaultView: 'month',
            editable: true,
            events: JSON.parse(res)
        });
    });

}
