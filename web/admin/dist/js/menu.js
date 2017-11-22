
Core.Menu = {};
Core.Menu = {
    html:'',
    main: function () {
        this.crearMenu();
    },
    crearMenu: function () {
        $.post('/refreshMenu',function (dataJson) {
            Core.Menu.html = '';
            Core.Menu.html += '<li class="header">MENU DE NAVEGACI&Oacute;N</li>';
            $.each(dataJson, function (ind0,val0) {
                //alert(ind0+'----'+val0);
                $.each(val0,function (inx1,val1) {
                    Core.Menu.html += '<li class="treeview">';
                    Core.Menu.html += '<a href="#">';
                    Core.Menu.html += '<i class="fa fa-address-card" aria-hidden="true"></i>';
                    Core.Menu.html += '<span class="capit">'+inx1.toLowerCase().replace("_", " ")+'</span>';
                    Core.Menu.html += '<span class="pull-right-container">';
                    Core.Menu.html += '<span class="label label-primary pull-right">'+val1.length+'</span>';
                    Core.Menu.html += '</span>';
                    Core.Menu.html += '</a>';
                    //alert(val1.length);
                    if(val1.length>0){
                        Core.Menu.html += '<ul class="treeview-menu">';
                        $.each(val1, function (ind2,val2) {
                            //alert(ind2+'----'+val2);
                            Core.Menu.html += '<li class="dropdown capit">';
                            Core.Menu.html += '   <a href="/'+val2.toLowerCase()+'Index"  class="fa fa-circle-o"> '+val2.toLowerCase()+'</a>';
                            Core.Menu.html += '</li>';
                        });
                        Core.Menu.html += '</ul>';
                    }
                    Core.Menu.html += '</li>';
                });
            });
            $('#menu').html(Core.Menu.html);
        })
    }

}
