 function informar(mensaje, titulo) {
    Command: toastr["info"](mensaje, titulo);
 }

 function alertar(mensaje, titulo) {
    Command: toastr["success"](mensaje, titulo);
}

function mostrarError(mensaje, titulo) {
    Command: toastr["error"](mensaje, titulo);
}
function mostrarBug(mensaje, titulo) {
    Command: toastr["warning"](mensaje, titulo);
}

function notificar(titulo, texto, icono, color) {
    Command: toastr["success"](mensaje, titulo);
}

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}