$(document).ready(function () {
    $('input[name="displayOptions"]').change(function () {
        if ($('#radioYes').is(':checked')) {
            $('#checkboxes').show();
        } else {
            $('#checkboxes').hide();
        }
    });
});
