//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######

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

var Core = {
    main: function () {
        Core.valComunes();
        Core.valInteger();
        Core.valContador();
        Core.valFecha();
    },
    valInteger : function () {
        $('input.integer').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g,'');
        });
    },
    valComunes: function () {//
        var ime = $('input.contar').parent('div').text();
        $('input.requerido, select.requerido').parent('div').children('label').append(' ')
        $('input.requerido, select.requerido').parent('div').children('label').append('<div id="campoRequerido"></div>')
        $('input.requerido, select.requerido').parent('div').children('label').children('div').html('<div style="position: absolute; float: left; font-size: 20px; z-index: 2; color:white; background: red; height: 18px;width: 10px;margin-left: -3px; padding-left: 2px;" title="Campo Requerido">*</div>');

        /*$('input.contar').parent('div').append('<div id="contar"></div>')
        $('input.contar').parent('div').children('div').html('<div  style=" float: right; margin-top: -12px; margin-right: -12px; font-size: 10px; z-index: 100;" title="Maxima cantidad de caracteres">20</div>');
        $('input.contar').keyup(function() {
            var id = $(this).data('item');
            var max_chars = $(this).attr('maxlength');
            var chars = $(this ).val().length;
            var diff = max_chars - chars;
            $('#'+id ).html(diff);
        });*/



    },
    valContador : function () {


    },
    valTexto: function () {
        $('input.texto').on('input', function () {
            this.value = this.value.replace(/[^a-zA-Z]/g,'');
        });
    },
    valIp: function() {
        
    },
    valTelefono:function() {
        
    },
    valEmail:function() {
        
    },
    valFecha: function() {
        //Date picker
        $('.datepicker').datepicker({autoclose: true, dateFormat: 'dd/mm/yyyy'});
    },
    valDesdeHasta: function() {
        
    },
    valContador: function () {
        
    },
    valTextoEnriquecido:function () {
        
    },
    valCamposObligatoriosCompletos: function (send) {

        var error = 0;
        var datosOk = true;
        $(send+'.requerido').each(function(i, elem){
            if($(elem).val() == ''){
                $(elem).css({'border':'1px solid red'});
                $(elem).focus();
                datosOk = false;
                error++;
            }else{
                $(elem).css({'border':''});
            }
        });
        /*if(error > 0){
            event.preventDefault();
            $('#aviso').html('Debe rellenar los campos requeridos <br />');
        }*/
        return datosOk;
    },
    valCamposVaciosRequeridos: function (id) {
        $(id).on('submit',function(event){
            var error = 0;
            var datosOk = true;
            $('.requerido').each(function(i, elem){
                if($(elem).val() == ''){
                    $(elem).css({'border':'1px solid red'});
                    $(elem).focus();
                    error++;
                    datosOk = false;
                }
            });
            /*if(error > 0){
                event.preventDefault();
                $('#aviso').html('Debe rellenar los campos requeridos <br />');
            }*/
            return datosOk;
        });
    }
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