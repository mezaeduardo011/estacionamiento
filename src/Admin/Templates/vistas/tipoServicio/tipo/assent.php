    // Definicion los campos del DataTable de esta vista
    var Config = {};
    Config.colums = [
        { 'id':'descripcion', 'type':'ed', 'align':'left', 'sort':'str', 'value':'descripcion' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'module':'Tipo',
        'tableTitle':'Listado de Registros.',
        'filter':'#text_filter',
        'autoWidth':true,
        'multiSelect':false
    }

    // Configuracion de relacion de entidad
    Config.relacionPadre = {
        "field":"",
        "value": ""
    }

    Core.Vista.Select = {
        priListaLoad: function (){ 
        },
     }
