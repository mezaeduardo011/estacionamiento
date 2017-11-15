    // Definicion los campos del DataTable de esta vista
    var Config = {};
    Config.colums = [
        { 'id':'nombre', 'type':'ed', 'align':'left', 'sort':'str', 'value':'nombre' },
        { 'id':'color', 'type':'ed', 'align':'left', 'sort':'str', 'value':'color' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'module':'Unida',
        'tableTitle':'Listado de Registros.',
        'filter':'#text_filter,#text_filter',
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
