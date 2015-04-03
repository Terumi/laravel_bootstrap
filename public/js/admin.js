$(document).ready(
    function()
    {
        $('textarea').redactor({
            imageUpload: '../demo/scripts/image_upload.php',
            fileUpload: '../demo/scripts/file_upload.php',
            imageGetJson: '../demo/json/data.json'
        });
    }
);