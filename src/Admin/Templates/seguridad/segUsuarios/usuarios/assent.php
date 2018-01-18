    // Definicion de las variables necesarias para la grilla y validacion de mascaras
    var Config = {};
    Config.colums = [
        { "id":"nombres", "type":"ro", "align":"center", "sort":"str" , "value":"Nombres", "widths":"*"},
        { "id":"apellidos", "type":"ro", "align":"center", "sort":"str" , "value":"Apellidos", "widths":"*"},
        { "id":"fech_nacimiento", "type":"ro", "align":"center", "sort":"str" , "value":"Nacimiento","widths":"*"},
        { "id":"correo", "type":"ro", "align":"center", "sort":"str" , "value":"Correo","widths":"*"},
        { "id":"usuario", "type":"ro", "align":"center", "sort":"str" , "value":"Login","widths":"*"},
        { "id":"telefono", "type":"ro", "align":"center", "sort":"str" , "value":"telefono","widths":"*"},

    ];

    // Configuracion de visual de la grilla
    // #text_filter, #select_filter, #combo_filter, #text_search, #numeric_filter
    Config.show = {
        "vista":"Usuarios",
        "tableTitle":"Listado de Registros.",
        "autoWidth":true,
        "multiSelect":false,
        "pageSize":50,
        "pagesInGrp":10
    }

    // Configuracion de relacion de entidad
    Config.relacionPadre = {
    "field":"",
    "value": ""
    }
