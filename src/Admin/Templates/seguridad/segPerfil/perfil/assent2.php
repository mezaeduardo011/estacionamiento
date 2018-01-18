    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    Config.colums = [
        { 'id':'detalle', 'type':'ro', 'align':'left', 'sort':'server', 'value':'Detalles', 'widths':'*' }

    ];

    // Configuracion de visual de la grilla
    Config.show = {
        'vista':'Roles',
        'tableTitle':'Listado de Registros.',
        'autoWidth':true,
        'multiSelect':true,
        'pageSize':50,
        'pagesInGrp':10
    }

    // Configuracion de relacion de entidad
    Config.relacionPadre = {
        "field":"",
        "value": ""
    }

