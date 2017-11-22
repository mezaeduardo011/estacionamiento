    // Definicion los campos del DataTable de esta vista
    var Config = {};
    Config.colums = [
        { 'id':'apellido', 'type':'ed', 'align':'left', 'sort':'str', 'value':'apellido' },
        { 'id':'nombre', 'type':'ed', 'align':'left', 'sort':'str', 'value':'nombre' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'module':'Gggg',
        'tableTitle':'Listado de Registros.',
        'filter':'&nbsp;,&nbsp;',
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
