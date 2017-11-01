    // Definicion los campos del DataTable de esta vista
    var Config = {};
    Config.colums = [
        { 'id':'nombres', 'type':'ed', 'align':'left', 'sort':'str', 'value':'nombres' },
        { 'id':'apellidos', 'type':'ed', 'align':'left', 'sort':'str', 'value':'apellidos' },
        { 'id':'dni', 'type':'ed', 'align':'left', 'sort':'str', 'value':'dni' },
    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        'module':'Personal',
        'tableTitle':'Listado de Registros.',
        'filter':'#text_filter,#text_filter,&nbsp;'
    }

    // Configuracion de relacion de entidad
    Config.relacionPadre = {
        "field":"",
        "value": ""
    }

