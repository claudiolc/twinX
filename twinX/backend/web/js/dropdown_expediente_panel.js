let submenusExpedientes = ['tipo-expediente', 'fase-expediente', 'envio-mail-fase'];
$(document).ready(function() {
    submenusExpedientes.forEach(function (str) {
        if (window.location.pathname.includes(str))
            toggleCollapse();
    });
});