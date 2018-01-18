//######
//## This work is licensed under the Creative Commons Attribution-Share Alike 3.0
//## United States License. To view a copy of this license,
//## visit http://creativecommons.org/licenses/by-sa/3.0/us/ or send a letter
//## to Creative Commons, 171 Second Street, Suite 300, San Francisco, California, 94105, USA.
//## Desarrollado por JPH - Ing. - Gregorio Jose Bolivar
//######
/**
 * Esto es un namespace que hace parte de otro. Encargado de controlar los elementos de la Grid contiene todas las configuraciones
 * necesaria para el funcionamiento de la grid principal del sistema
 *
 * @namespace VistaGrid
 * @memberOf Core
 */
Core.VistaGrid = {
    /**
     * Esto es una variable global que permite instanciar la grid pero en variable
     * @memberof Core.VistaGrid.myGrid
     */
    myGrid: [],
    /**
     * Esto es una variable global que definir si esta autosearch
     * @memberof Core.VistaGrid.flAuto
     */
    flAuto: false,
    /**
     * Esto es una variable global para tiempo de ejecucion
     * @memberof Core.VistaGrid.timeoutHnd
     */
    timeoutHnd: '',
    /**
     * Esto es el contructor de la funcion que recibe los parametros
     * @param string urlVistaTmp, Ruta temporal de donde se procesaran los datos, ejemplo: Vista
     * @param object rows, Campo definidos en el assent del cliente, Ejemplo: Config.colums = [{'id':'descripcion', 'type':'ro', 'align':'left', 'sort':'server', 'value':'descripcion', 'widths':'*' }];
     * @param object show, Objetos definidos en la vista del cliente, Ejemplo:  Config.show = {'vista':'Tipo','tableTitle':'Listado de Registros.','autoWidth':true,'multiSelect':false,'pageSize':50,'pagesInGrp':10}
     * @param string method, Method encargado en procesar los valores de la grid, Ejemplo Listar
     * @param string filter, Filtrar campos en la consulta del query de la grid, Ejemplo id=10
     * @memberof Core.VistaGrid.main
     */
    main: function (urlVistaTmp,rows,show,method,filter) {
        // Permite validar que si no envia nada deja por default Listar
        if(typeof method=='undefined' || method=='' ){
            method='Listar';
        }

        // Permite validar el filtro que si no esta definido envie vacio
        if(typeof filter=='undefined'){
            filter='';
        }

        // Cargar local Store del la vista que esta activa
        localStorage.setItem('urlVistaTmp-'+show.vista,urlVistaTmp);

        // Cargar las configuracion para la grid
        Core.VistaGrid.run(urlVistaTmp,rows,show,method,filter);
    },
    /**
     * Esto es una función que permite ejecutar la configuración de la grid principal para levantar su funcionamiento
     * @param string urlVistaTmp, Ruta temporal de donde se procesaran los datos, ejemplo: Vista
     * @param object rows, Campo definidos en el assent del cliente, Ejemplo: Config.colums = [{'id':'descripcion', 'type':'ro', 'align':'left', 'sort':'server', 'value':'descripcion', 'widths':'*' }];
     * @param object show, Objetos definidos en la vista del cliente, Ejemplo:  Config.show = {'vista':'Tipo','tableTitle':'Listado de Registros.','autoWidth':true,'multiSelect':false,'pageSize':50,'pagesInGrp':10}
     * @param string method, Method encargado en procesar los valores de la grid, Ejemplo Listar
     * @param string filter, Filtrar campos en la consulta del query de la grid, Ejemplo id=10
     * @memberof Core.VistaGrid.run
     */
    run: function (urlVistaTmp,rows,show,method,filter) {
        /* START DE GRILLA DHTML */
        var camp = '';
        var colHeadTmp = '';
        var colAlingTmp ='';
        var colSortingTmp = '';
        var colWidthsTmp = '';
        var colColTypesTmp = '';
        /* Procedemos a crear una cadena de texto paa enviar al procesador de la vista en el controlador */
        $.each(rows, function (index,value) {
            camp+='id:'+value.id+'|type:'+value.type+'|value:'+value.value+'#';

            // Setear valores del titulo de la GRIR, definido en la configuracion local de la vista.
            colHeadTmp+= '<label>'+value.value+'</label>'+',';

            // Setear valores del alinacion de la cabecera de la GRIR, definido en la configuracion local de la vista.
            colAlingTmp+=value.align+',';

            // Valores de Ordenamiento donde lo busca en la GRIR, definido en la configuracion local de la vista.
            colSortingTmp+=value.sort+',';

            // Valores del tamanio de los header de la GRIR, definido en la configuracion local de la vista.
            colWidthsTmp+=value.widths+',';

            // Valores del tipo de datos de cada valor de columna de la GRIR, definido en la configuracion local de la vista.
            colColTypesTmp+=value.type+',';
        });
        // Quitamos el ultimo caracter de la cadena
        var tmp = camp.substring(0,camp.length-1);
        var colHead = colHeadTmp.substring(0,colHeadTmp.length-1);
        var colAling = colAlingTmp.substring(0,colAlingTmp.length-1);
        var colSorting = colSortingTmp.substring(0,colSortingTmp.length-1);
        var colWidths = colWidthsTmp.substring(0,colWidthsTmp.length-1);
        var colColTypes = colColTypesTmp.substring(0,colColTypesTmp.length-1);

        // @link [URI] https://docs.dhtmlx.com/grid__basic_initialization.html
        Core.VistaGrid.myGrid[show.vista] = new dhtmlXGridObject('dataJPH'+show.vista);

        // Agregar un elemento para ser usado
        $('#dataJPH'+show.vista).attr({'data-vista':show.vista});

        // @link [URI] https://docs.dhtmlx.com/api__dhtmlxwindows_setimagepath.html
        Core.VistaGrid.myGrid[show.vista].setImagePath("/admin/dhtmlxSuite/codebase/imgs/");

        // Header del Grid
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_setheader.html
        Core.VistaGrid.myGrid[show.vista].setHeader(colHead);

        // Tamanio del campo
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_setinitwidths.html
        Core.VistaGrid.myGrid[show.vista].setInitWidths(colWidths);

        // Alinacion del contenido de la GRID
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_setcolalign.html
        Core.VistaGrid.myGrid[show.vista].setColAlign(colAling);

        // Filtrado de datos del ladodel servidor
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_setcolsorting.html

        Core.VistaGrid.myGrid[show.vista].setColSorting(colSorting);

        // Tipo de los campos
        // Ref : https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_setcoltypes.html
        Core.VistaGrid.myGrid[show.vista].setColTypes(colColTypes);

        // Acccion para ordenar campos
        //available in pro version only
        if (Core.VistaGrid.myGrid[show.vista].setColspan){
            Core.VistaGrid.myGrid[show.vista].attachEvent("onBeforeSorting",Core.VistaGrid.customColumnSort);
        }


        // link dataprocessor al component
        // @link [URI] https://docs.dhtmlx.com/api__dataprocessor_init.html
        Core.VistaGrid.myGrid[show.vista].init();

        //Core.VistaGrid.myGrid[show.vista].splitAt(1);
        Core.VistaGrid.myGrid[show.vista].attachEvent("onBeforePageChanged",function(){
            if (!this.getRowsNum()) return false;
            return true;
        });



        // Permite activar el paginado de la grid
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_enablepaging.html
        Core.VistaGrid.myGrid[show.vista].enablePaging(true,show.pageSize,show.pagesInGrp,"pagingArea"+show.vista,true,"infoArea"+show.vista);


        // Disenio de paginador
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_setpagingskin.html
        Core.VistaGrid.myGrid[show.vista].setPagingSkin("bricks");



        // Filtro de la tabla
        //Core.VistaGrid.myGrid[show.vista].attachHeader(show.filter);

        // Campos id Mostrar
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_enableautowidth.html
        Core.VistaGrid.myGrid[show.vista].enableAutoWidth(show.autoWidth);

        // Permite activar si la grid se puede seleccionar varios item de la table
        // @link [URI] https://docs.dhtmlx.com/api__dhtmlxtree_enablemultiselection.html
        Core.VistaGrid.myGrid[show.vista].enableMultiselect(show.multiSelect);

        // Evento que permite cuando seleccionar el registro te permite hacer la consulta del registro
        // @link [URI] https://docs.dhtmlx.com/api__common_attachevent.html
        Core.VistaGrid.myGrid[show.vista].attachEvent("onRowSelect", function (data) {
            Core.Vista.doOnRowSelected(data,show.vista);
        });

        //Core.Vista.myGrid.submitOnlyRowID(true);
        //Core.Vista.myGrid.attachEvent("onBeforeSorting",Core.Vista.sortGridOnServer);


        // Paginado cambiando el idioma
        // @link [URI] https://docs.dhtmlx.com/grid__paging.html
        Core.VistaGrid.myGrid[show.vista].i18n.paging={
            results:"Resultados",
            records:"Registros de ",
            to:" a ",
            page:"Página ",
            perpage:"filas por página",
            first:"Para la primera página",
            previous:"Pagina anterior",
            found:"Registros encontrados",
            next:"Siguiente página",
            last:"Para la última página",
            of:" de ",
            notfound:"No se encontrarón archivos"
        };



        //code below written to support standard edtiton
        //it written especially for current sample and may not work
        //in other cases, DON'T USE it if you have pro version
        Core.VistaGrid.myGrid[show.vista].sortField_old=Core.VistaGrid.myGrid[show.vista].sortField;
        Core.VistaGrid.myGrid[show.vista].sortField=function(){
            Core.VistaGrid.myGrid[show.vista].setColSorting("str,str,str");
            if (Core.VistaGrid.customColumnSort(arguments[0],show.vista))
            {
                Core.VistaGrid.myGrid[show.vista].sortField_old.apply(this,arguments);
            }
        };

        Core.VistaGrid.myGrid[show.vista].sortRows=function(col,type,order){};

        // habilita el modo de renderizado inteligente
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_enablesmartrendering.html
        //Core.VistaGrid.myGrid[show.vista].enableSmartRendering(true);

        // Variable para ser enviado por parametros al controlador del modulo activo
        var gridQString = '/'+show.vista.toLowerCase()+method+'?obj='+window.btoa(tmp)+'&relacion='+window.btoa(filter)+'&un='+Date.parse(new Date()); // save query string to global variable (see step 5)

        // Ponerlo en local store
        localStorage.setItem('gridQString-'+show.vista,gridQString);


        // Antes de cargar los datos
        // @link [URI] https://docs.dhtmlx.com/api__dataloading_onxls_event.html
        Core.VistaGrid.myGrid[show.vista].attachEvent("onXLS",function(){
            Core.VistaGrid.showLoading(true,show.vista)}
        );

        // Después de finalizar la carga y datos procesados ​​(antes de la devolución de llamada del usuario)
        // @link [URI] https://docs.dhtmlx.com/api__dataloading_onxle_event.html
        Core.VistaGrid.myGrid[show.vista].attachEvent("onXLE",function () {
            Core.VistaGrid.showLoading(false,show.vista);
        });

        // Cargas los valores en el controlador
        // @link [URI] https://docs.dhtmlx.com/api__dhtmlxgrid_load.html
        Core.VistaGrid.myGrid[show.vista].load(gridQString);

    },
    /**
     * Esto es una función que permite ejecutar un loadin cargando en la parte del footer de la tabla
     * @memberof Core.VistaGrid.showLoading
     */
    showLoading: function (fl,vista) {

        var span = document.getElementById("recfound"+vista);
        if (!span) return;
        if(!Core.VistaGrid.myGrid[vista]._serialise){
            span.innerHTML = "<i>Loading... available in Professional Edition of dhtmlxGrid</i>";
            return;
        }
        span.style.color = "red";
        if(fl===true)
            span.innerHTML = "<b class='loading'>Cargando...</b>";
        else
            span.innerHTML = "";
    },
    /**
     * Esto es una función que permite ejecutar el search de los campos de la grid
     * @memberof Core.VistaGrid.doSearch
     */
    doSearch:function (ev,vista){
        if(!Core.VistaGrid.flAuto)
            return;
        var elem = ev.target||ev.srcElement;
        if(Core.VistaGrid.timeoutHnd)
            clearTimeout(Core.VistaGrid.timeoutHnd);
        Core.VistaGrid.timeoutHnd = setTimeout(Core.VistaGrid.reloadGrid(vista),500)
    },
    /**
     * Esto es una función que permite ejecutar el reload de la grid
     * @memberof Core.VistaGrid.reloadGrid
     */
    reloadGrid: function(vista) {
        // Permite leer todos los campos de buscar que estan en la vista disponible
        var tmpInput = $('#'+vista+' .search');

        // Variable vacia para luego usar cuando haga el search
        var search = '';

        // Bugle encargado de componer los campos disponibles para el filtro en el server
        $.each(tmpInput, function (item, key) {
           search += '&'+key.getAttribute('id')+'='+key.value;
        });

        Core.VistaGrid.showLoading(true,vista);

        // Ruta disonible en local store para la busqueda del registro
        var urlTmpSearch = localStorage.getItem('gridQString-'+vista)+search;

        // Volver a hacer la busqueda con los campos dinamico a buscar
        if(Core.Vista.currentRequest){
            Core.Vista.currentRequest.abort();
        }

        // Borra el estado de grilla existente y carga datos de un archivo externo (xml, json, jsarray, csv)
        // @link [URI] https://docs.dhtmlx.com/api__link__dhtmlxtreegrid_clearandload.html
        Core.Vista.currentRequest = Core.VistaGrid.myGrid[vista].clearAndLoad(urlTmpSearch+"&orderBy="+window.s_col+"&direction="+window.a_direction);
        if (window.a_direction)
            Core.VistaGrid.myGrid[vista].setSortImgState(true,window.s_col,window.a_direction);
    },
    /**
     * Esto es una función que permite activar la acciones de autosearch
     * @memberof Core.VistaGrid.enableAutosubmit
     */
    enableAutosubmit: function (state,vista) {
        Core.VistaGrid.flAuto = state;
        document.getElementById("submitButton"+vista).disabled = state
    },
    /**
     * Esto es una función que permite efectuar el ordenamiento de la tabla A
     * @memberof Core.VistaGrid.customColumnSort
     */
    customColumnSort:function (ind,vista) {
    /*if (ind==1) {
        alert("Table can't be sorted by this column.");
        if (window.s_col)
            Core.VistaGrid.myGrid[vista].setSortImgState(true,window.s_col,window.a_direction);
        return false;
    }*/
    var a_state = Core.VistaGrid.myGrid[vista].getSortingState(vista);
    window.s_col=ind;
    window.a_direction = ((a_state[1] == "des")?"asc":"des");
        Core.VistaGrid.reloadGrid(vista);
    return true;
    }
}
