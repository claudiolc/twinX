let submenusExpedientes = ['tipo-expediente', 'fase-expediente'];
$(document).ready(function() {
    submenusExpedientes.forEach(function (str) {
        if (window.location.pathname.includes(str))
            toggleCollapse();
    });
});