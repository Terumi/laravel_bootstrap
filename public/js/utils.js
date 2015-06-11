$(function () {
    $('input[data-confirm], button[data-confirm]').on("click", function (e) {
        var input = $(this);
        input.prop('disabled', 'disabled');

        var form = input.closest('form');
        e.preventDefault();

        var r = confirm(input.data('confirm'));
        if (r == true) {
            form.submit();
        } else {
            input.removeAttr('disabled');
        }
    });
});

