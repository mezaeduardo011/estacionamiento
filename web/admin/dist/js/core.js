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

function notificar(mensaje, titulo) {
    alerta(titulo,mensaje);
}

var Core = {
    main: function () {
        this.valComunes();
        Core.Menu.main();
    },
    valComunes: function () {//
        var ime = $('input.contar').parent('div').text();
        $('input.requerido, select.requerido').parent('div').children('label').append(' ')
        $('input.requerido, select.requerido').parent('div').children('label').append('<div id="campoRequerido"></div>')
        $('input.requerido, select.requerido').parent('div').children('label').children('div').html('<div class="requerido" title="Campo Requerido">*</div>');
        Core.valContador();
        Core.valInteger();
        Core.valTexto();
        Core.valFecha();
        Core.valColor();
        Core.valEmail();
        /**/



    },
    valInteger : function () {
        $('input.integer').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g,'');
        });
    },
    valContador : function () {
        $('input.contar').each(function(i, elem) {
            var lg = $(this).data('item')-$(this).val().length;
            var id = $(this).attr('id');
            $('input.contar#'+id).parent('div').append('<div id="contar"></div>')
            $('input.contar#'+id).parent('div').children('div').html('<div  title="Maxima cantidad de caracteres" class="contador '+id+'">'+lg+'</div>');
        });
        $('input.contar').keyup(function() {
            var id = $(this).attr('id');
            var lg = $(this).data('item');
            var max_chars = $(this).attr('maxlength');
            var chars = $(this ).val().length;
            var diff = max_chars - chars;
            $('#contar  .'+id).text(diff);
        });

    },
    valTexto: function () {
        // Validador que permite solo texto y espacio entre parte
        $('input.texto').on('input', function () {
            this.value = this.value.replace(/[^a-zA-Z ]/g,'');
        });
    },
    valIp: function() {
        
    },
    valTelefono:function() {
        
    },
    valColor: function () {
        $('input.color').each(function(i, elem) {
            var id = $(this).attr('id');
            new dhtmlXColorPicker({input: id});
        });

    },
    valEmail:function() {
        $('input.correo').on('input', function () {
            this.value = this.type='email';
        });
    },
    valFecha: function() {
        //Date picker
        $('.datepicker').datepicker({autoclose: true, dateFormat: 'dd/mm/yyyy'});
    },
    valDesdeHasta: function() {
        
    },

    valTextoEnriquecido:function () {
        
    },
    valCamposObligatoriosCompletos: function (send) {

        var error = 0;
        var datosOk = true;
        $(send+' .requerido').each(function(i, elem){
            if($(elem).val().length == 0 && typeof $(elem).attr('name')!='undefined'){
                $(elem).addClass('isObligatorio');
                $(elem).focus();
                datosOk = false;
                error++;
                console.error('Campo '+$(elem).attr('name')+' requerido en el formulario.')
            }else{
                $(elem).removeClass('isObligatorio');
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
    "showDuration": "600",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
<!-- Notificaciones -->
document.write("<"+"script type='text/javascript' src='admin/dist/js/notificaciones.js'><"+"/script>");
document.write("<"+"script type='text/javascript' src='admin/dist/js/menu.js'><"+"/script>");

