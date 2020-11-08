$(document).ready(function(){
        $('#convenioform-nominacion_online').click(function () {
            if ($(this).on(':checked')) {
                $('#nominaciones-button').prop('disabled', function (name, status) {
                    return !status;
                });
            }
        });
});