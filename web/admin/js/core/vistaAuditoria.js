//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######
/**
 * Esto es un namespace que hace parte de otro. Encargado de controlar las funcionalidades de la vista box2 de de
 * configuracion de parametros.
 *
 * @namespace Box2
 * @memberOf Config
 */
Core.VistaAuditoria = {
    html:'',
    main: function () {
        this.showUsuario();
    },
    showUsuario:function () {
        $.ajax({
            url: '/usuariosShowAuditoria',
            type: "POST",
            headers: {
                'X-Auth-Token' : $('#csrf_token').val()
            },
            data: {'getItemShow':sessionStorage.getItem('usuarioId')},
            dataType: 'JSON',
            success : function(dataJson) {
                $('#dataJPHUsuariosShowTitle').html('Datos del Usuario '.toUpperCase() + '<b>' + dataJson.datos.nombres.toUpperCase() + ' ' + dataJson.datos.apellidos.toUpperCase() + '</b>');
                this.html = '';
                this.html += '<div class="row">';
                this.html += '   <div class="col-sm-6 col-md-4">';
                this.html += '      <img src="http://placehold.it/150x150" alt="" class="img-rounded img-responsive"/>';
                this.html += '   </div>';
                this.html += '   <div class="col-sm-6 col-md-8">';
                this.html += '     <div style="font-size: 15px">';
                this.html += '        <b>Alta</b>: &nbsp; ' + dataJson.datos.created_at + '';
                this.html += '        <br />';
                this.html += '        <b>Ultima Modificacion</b>: &nbsp; ' + dataJson.datos.updated_at + '';
                this.html += '        <p>';
                this.html += '        <i class="fa fa-envelope " aria-hidden="true"></i>&nbsp;' + dataJson.datos.correo;
                this.html += '         <br />';
                this.html += '        <i class="fa fa-phone " aria-hidden="true"></i>&nbsp;' + dataJson.datos.telefono;
                this.html += '        <br />';
                this.html += '        <i class="fa fa-gift" aria-hidden="true"></i>&nbsp;' + dataJson.datos.fech_nacimiento;
                this.html += '        <br />';
                if (dataJson.datos.cuenta_bloqueada == 'N') {
                    this.html += '    <i class="fa fa-toggle-on" aria-hidden="true"></i>&nbsp;Activo';
                } else {
                    this.html += '    <i class="fa fa-toggle-off" aria-hidden="true"></i>&nbsp; Bloqueado';
                }
                this.html += '      </div>';
                this.html += '    </div>';
                this.html += '</div>';
                $('#dataJPHUsuariosShow').html(this.html);

                Core.VistaAuditoria.html = '<div style="font-size: 15px">Tiene asignado los siguientes perfiles:<br>';
                $.each(dataJson.perfiles, function (index, value) {
                    Core.VistaAuditoria.html += ' <i class="fa fa-check-circle" aria-hidden="true">&nbsp;</i><span class="label label-success">' + value.perfil + '</span>';
                });
                Core.VistaAuditoria.html += '</div>';

                $('#dataJPHUsuariosPerfiles').html(Core.VistaAuditoria.html);
            }
        })
    },
    showMetricas:function () {
        $.ajax({
            url: '/getMetricaLog',
            type: "POST",
            headers: {
                'X-Auth-Token' : $('#csrf_token').val()
            },
            data: {},
            dataType: 'JSON',
            success : function(dataJson) {
                //dataJson.navegador
                //dataJson.host
                Core.VistaAuditoria.showAct(dataJson.accion);
                Core.VistaAuditoria.showHost(dataJson.host);
                Core.VistaAuditoria.showNavegador(dataJson.navegador);
            }
        });
    },
    showHost:function (obj) {
        Config.html = '<table class="table table-striped">';
        Config.html += '<tr>';
        Config.html += '<th width="60%">Host</th>';
        Config.html += '<th>Cantidad</th>';
        Config.html += '</tr>'
        $.each(obj,function (key, value) {
            Config.html += '<tr>';
            Config.html += '<td>'+value.host+'</td>';
            Config.html += '<td>'+value.cantidad+'</td>';
            Config.html += '</tr>';
        });
        Config.html += '</table>';
        $('#metricaHost').html(Config.html);
    },
    showNavegador:function (obj) {
        Config.html = '<table class="table table-striped">';
        Config.html += '<tr>';
        Config.html += '<th width="60%">Navegador</th>';
        Config.html += '<th>Cantidad</th>';
        Config.html += '</tr>'
        $.each(obj,function (key, value) {
            Config.html += '<tr>';
            Config.html += '<td>'+value.navegador+'</td>';
            Config.html += '<td>'+value.cantidad+'</td>';
            Config.html += '</tr>';
        });
        Config.html += '</table>';
        $('#metricaNav').html(Config.html);
    },
    showAct:function (obj) {
        Config.html = '<table class="table table-striped">';
        Config.html += '<tr>';
        Config.html += '<th width="60%">Accion</th>';
        Config.html += '<th>Cantidad</th>';
        Config.html += '</tr>'
        $.each(obj,function (key, value) {
            Config.html += '<tr>';
            Config.html += '<td>'+value.accion+'</td>';
            Config.html += '<td>'+value.cantidad+'</td>';
            Config.html += '</tr>';
        });
        Config.html += '</table>';
        $('#metricaAct').html(Config.html);
    }

};
