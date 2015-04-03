$(document).ready(
    function () {
        $('textarea').redactor({
            minHeight: 300,
            maxHeight: 800,
            imageUpload: '../../upload_file?_token=' + $("input[name='_token']").val(),
            fileUpload: '../../upload_file?_token=' + $("input[name='_token']").val(),
            imageGetJson: '../../upload_file'
        });
    }
);