<?php $this->layout('base')?>

<?php $this->push('title') ?>
 Gestión de Usuarios
<?php $this->end() ?>

<?php $this->push('usuario') ?>
<?php echo $usuario->CUSUARIO ?>
<?php $this->end() ?>

<div class="ink-grid">
    <div class="column-group horizontal-gutters margTop15" id="formulario">
        <?php $this->insert('view::usuarios/listado',['usuariosListado'=>$usuariosListado]) ?>
        <?php $this->insert('view::usuarios/form') ?>
    </div>
</div>

<?php $this->push('addJs') ?>
<script>
    window.addEvent('domready', function () {
        <?php
        //if (isset($$pagina) && in_array($$pagina->modificacion, $roles)) {
        ?>
        aplicarEventoClickRows();
        <?php
        //}
        ?>

        if ($('btnNuevo')) {
            $('btnNuevo').addEvent('click', function () {
            	Core.limpiarCampos();

                $('pw').getParent('.control-group').addClass('required');
                $('confirmPW').getParent('.control-group').addClass('required');
            });
        }

        if ($('btnGrabar')) {
            $('btnGrabar').addEvent('click', function () {
                var accion = 'A';
                var hayDatos = false;
                var arr = [];
                var datos = {};
                var clave, valor;
                var id = 0;
                var idRegistro = '_0';
                var url = '/usuariosCreate';
                if ($('dgDatos').getElement('.blue')) {
                    accion = 'M';
                    url = '/usuariosUpdate'
                    idRegistro = $('dgDatos').getElement('.blue').getProperty('data-id');
                    id = idRegistro;
                }

                if ($$('.valor')[0] && $$('.valor')[0].getProperty('value') != '') {
                    hayDatos = true;

                    datos.accion = accion;
                    datos.id = id;

                    $('myForm').getElements('.valor').each(function (v) {
                        clave = v.getProperty('id');

                        if (v.type == 'checkbox') {

                            if (v.checked == true) {
                                valor = 'S';
                            } else {
                                valor = 'N';
                            }


                        } else {
                            if (!v.hasClass('ink-datepicker')) {
                                valor = (v.getProperty('value') == '' ? 'NULL' : v.getProperty('value'));
                                if (v.getProperty('id') == 'pw' && v.getProperty('value') == '') {
                                    valor = '';
                                }
                            } else {
                                if (v.getProperty('value') == '') {
                                    valor = 'NULL';
                                } else {
                                    arr = v.getProperty('value').split('/');
                                    valor = arr[2] + arr[1] + arr[0];
                                }
                            }
                        }

                        datos[clave] = valor;
                    });
                }

                if (Core.camposObligatoriosCompletos() == true) {
                    if ($('pw').value == $('confirmPW').value) {
                        new Request.JSON({
                            url: url,
                            method: 'post',
                            data: datos,
                            headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
                            onSuccess: function (json) {
                                var id = json.id;
                                var numError = json.numError;

                                if (numError.toInt() > 0) {
                                	Core.alertar('Se produjo un error en la grabacion');
                                } else {
                                    datos = {};
                                    datos.idRegistro = id;
                                    abrirPagina(pag, datos);
                                    Core.informar('Datos grabados con exito');
                                }
                            }
                        }).send();
                    } else {
                    	Core.alertar('Las contraseñas no coinciden');
                    }
                } else {
                	Core.alertar('Complete los campos obligatorios');
                }
            });
        }

        if ($('btnBorrar')) {
            $('btnBorrar').addEvent('click', function () {
                if ($('dgDatos').getElement('.blue')) {
                    var accion = function () {
                        new Request.HTML({
                            url: '/usuariosDelete',
                            method: 'post',
                            data: {
                                'accion': 'B',
                                'id': $('dgDatos').getElement('.blue').getProperty('data-id')
                            },
                            onSuccess: function () {
                                $('dgDatos').getElement('.blue').destroy();
                                $('btnNuevo').fireEvent('click');
                            }
                        }).send();
                    }
                    Core.confirmar('Esta seguro de borrarlo', accion);
                }
            });
        }

        Ink.Autoload.run();
    });

    function aplicarEventoClickRows() {
        var id;

        if ($('dgDatos')) {
            $('dgDatos').getElements('tr').each(function (tr) {
                tr.addEvent('click', function () {
                    id = this.getProperty('data-id');

                    $('btnNuevo').fireEvent('click');
                    this.addClass('blue');

                    $('pw').getParent('.control-group').removeClass('required');
                    $('confirmPW').getParent('.control-group').removeClass('required');

                    new Request.JSON({
                        url: './usuariosShow',
                        method: 'post',
                        data: {
                            'id': id,
                            'accion': 'C'
                        },
                        onSuccess: function (json) {
                            $('cusuario').setProperty('value', json.CUSUARIO);
                            $('pw').setProperty('value', '');
                            $('confirmPW').setProperty('value', '');
                            $('apellido').setProperty('value', json.DAPELLIDO);
                            $('nombre').setProperty('value', json.DNOMBRE);

                            if (json.DCORREOELECTRONICO) {
                                $('correo').setProperty('value', json.DCORREOELECTRONICO);
                            }

                            if (json.DTELEFONO) {
                                $('telefono').setProperty('value', json.DTELEFONO);
                            }

                            if (json.ICUENTABLOQUEADA == 'S') {
                                $('bloqueada').checked = true;
                            }

                            if (json.ICAMBIARPASSWORD == 'S') {
                                $('cambiarPW').checked = true;
                            }
                        }
                    }).send();
                });
            });
        }
    }
</script>
<?php $this->end() ?>
