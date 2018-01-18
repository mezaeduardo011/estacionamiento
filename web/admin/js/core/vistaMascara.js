Core.VistaMascara = {
    main: function (vista) {
        var item = true;
        $.each(Core.Vista.Mascara, function (keys, values) {
            var expreg = new RegExp(values.mascara);
            var campo = $( vista + ' [name="' + values.campo + '"], ' + vista + ' #'+values.campo).val();

            // Para validar la expresion regular el campo debe ser requerido y tener contenido
            if ($(vista + '[name="' + values.campo + '"], ' + vista + ' #'+values.campo).hasClass('requerido') && campo.length > 0) {
                if (!expreg.test(campo)) {
                    alertar(values.mensaje, 'Validación del campo ' + values.campo);
                    $(vista + ' [name="' + values.campo + '"], ' + vista + ' #'+values.campo).focus();
                    $(vista + ' i#help-' + values.campo).html(values.mensaje);
                    item = false;
                }
            }
        });
        return item;
    }
}