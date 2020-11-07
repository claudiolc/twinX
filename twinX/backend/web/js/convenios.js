$(document).ready(function(){
    $('#convenio-nominacion_online').click(function(){
        if($(this).on(':checked')) {
            $('#nominaciones-button').prop('disabled', function (name, status) {
                return !status;
            });
            $('#nominaciones-button').prop('aria-expanded', function (name, status){
                return !status;
            });
        }
    });

    // if(!$('#convenio-nominacion_online').is(':checked'))
    //     $('#nominaciones-button').prop('disabled');
    // else
    //     console.log('sadf');
    // $('#nominaciones-button').prop('disabled', function (){
    //     console.log('HOLAA');
    //     return !$('#convenio-nominacion_online').is(':checked');
    // });
});