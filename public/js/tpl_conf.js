(function(global, $, _, tpl, doc) {
    'use strict';
    $(function() {
        if ($('#tpl_conf_flg').length > 0) {
            var menuApp = new menu();
            global['menuApp'] = menuApp;
        }
    });
    var menu = function(options) {
        this.eles = {
            root: $('#menus'),
            btn_save_menu: $('.btn_save_menu'),
            btn_new_menu: $('.btn_new_menu'),
            btn_del_menu: $('.btn_del_menu'),
            form: {
                form: $('.menu_form'),
                name: $('.menu_form input[name=name]'),
                g_id: $('.menu_form select[name=g_id]'),
                position: $('.menu_form select[name=position]'),
                is_show_checked: function () {
                    return $('.menu_form input[name=is_show]:checked').val();
                },
                is_show : function (isShow) {
                    //console.log('.menu_form input[name=is_show][value='+ isShow +']')
                    return $('.menu_form input[name=is_show][value='+ isShow +']');
                },
            }
        };
        this.saveUri = '/home/sites/config';
        options = options || {};
        this.period = 1; //s
        this.evtMaps = {
            'click root .editable': 'edit',
            'click btn_save_menu' : 'saveMenu',
            'click btn_new_menu' : 'newMenu',
            'click btn_del_menu' : 'delMenu',
        };
        this.menus = [];
        this.curEdit = -1;
        
        this.init();
    }

    menu.prototype = {
        init: function() {
            this.bindEvent(this.evtMaps);
            this.initMenus();
            //this.eles.form.form.hide();
        },
        showForm: function(){
            //console.log('a');
            this.eles.form.form.removeClass('hide');
        },
        hideForm: function(){
            this.eles.form.form.addClass('hide');
        },
        setName: function(name){
            this.eles.form.name.val(name);
        },
        setGid: function(g_id){
            this.eles.form.g_id.val(g_id);
        },
        setPosition: function(index){
            this.eles.form.position.val(index);
        },
        setShow: function(isShow){
            console.log(~isShow + 2, isShow);
            this.eles.form.is_show(~isShow + 2).attr('checked', false);
            this.eles.form.is_show(isShow).attr('checked', true);
            this.eles.form.is_show(isShow).click();
        },
        updateMenu(data){
            for(let i = 0; i < this.menus.length; i++){
                if(this.menus[i]['index'] == data.index){
                    this.menus[i]['g_id'] = data.g_id;
                    this.menus[i]['name'] = data.name;
                    this.menus[i]['is_show'] = data.is_show;

                }
            }
            console.log(this.menus);
        },
        delMenu: function(){
            let app = global['menuApp'];
            let newMenus = [];
            if(app.menus.length == 1){
                note.warning('可编辑菜单项数目必须大于1');
                return;
            }
            for(let i = 0; i < app.menus.length ; i++){
                let item = app.menus[i];
                item.index = newMenus.length;
                if(i != app.curEdit){
                    newMenus.push(item);
                }
            }
            //console.log(newMenus);
            http.put(app.saveUri, {'menus' : newMenus}, function(){
                window.location.reload();
            });
        },
        newMenu: function(){
            let app = global['menuApp'];
            let data = {
                g_id : parseInt(app.eles.form.g_id.val()),
                name : app.eles.form.name.val(),
                index: parseInt(app.eles.form.position.val()) + 1,
                is_show: parseInt(app.eles.form.is_show_checked()),
            }
            let newMenus = [];
            for(let i = 0; i < app.menus.length ; i++){
                let item = app.menus[i];
                item.index = newMenus.length;

                if(i < data.index){
                    newMenus.push(item);
                }else{
                    if(i < data.index){
                        newMenus.push(item);
                    }else{
                        if(i == data.index){
                            newMenus.push(data);
                            item.index = newMenus.length;
                            newMenus.push(item);
                        }else{
                            newMenus.push(item);
                        }
                    } 
                }
            }
            if(newMenus.length == app.menus.length){
                newMenus.push(data);
            }
            console.log(newMenus);
            http.put(app.saveUri, {'menus' : newMenus}, function(){
                window.location.reload();
            });
        },
        saveMenu: function(){
            let app = global['menuApp'];
            let data = {
                g_id : parseInt(app.eles.form.g_id.val()),
                name : app.eles.form.name.val(),
                index: parseInt(app.eles.form.position.val()) + 1,
                is_show: parseInt(app.eles.form.is_show_checked()),
            }
            console.log(data);

            
            let newMenus = [];
            if(app.curEdit == data.index || app.curEdit + 1 == data.index ){
                console.log('位置未变化');
                app.updateMenu(data);
                newMenus = app.menus;
            }else{
                let direct = '';
                if(app.curEdit > data.index){
                    console.log('左移');
                    direct = 0;
                }else{
                    console.log('右移');
                    direct = 1;
                    data.index -=1;
                }
                console.log('old:' + app.curEdit, 'new:' + data.index);

                for(let i = 0; i < app.menus.length ; i++){
                    // 忽略当前
                    if(i == app.curEdit){
                        continue;
                    }
                    let item = app.menus[i];
                    item.index = newMenus.length;
                    // 左移的逻辑
                    if(direct == 0){
                        if(i < data.index){
                            newMenus.push(item);
                        }else{
                            if(i == data.index){
                                newMenus.push(data);
                                item.index = newMenus.length;
                                newMenus.push(item);
                            }else{
                                newMenus.push(item);
                            }

                        } 
                    }
                    // 1 2 3 4
                    // 右移的逻辑
                    if(direct == 1){
                        if(i > data.index){
                            console.log('a',i)
                            newMenus.push(item);
                        }else{
                            if(i == data.index){
                                newMenus.push(item);
                                newMenus.push(data);
                            }else{
                                console.log('c',i)
                                newMenus.push(item);
                            }
                        }
                    }
                }
                
            }
            http.put(app.saveUri, {'menus' : newMenus}, function(){
                window.location.reload();
            });
            
            
        },
        initMenus: function(){
            let _this = this;
            this.eles.root.find('.editable').each(function(){
                _this.menus.push({
                    g_id: $(this).data('g_id'),
                    name: $(this).text(),
                    index: parseInt($(this).data('index')),
                    is_show: parseInt($(this).data('show')==""?1:$(this).data('show')),
                });
            });
            console.log(this.menus);
        },
        bindEvent: function(maps) {
            this.scanEventsMap(maps, true);
        },
        edit: function(e){
            //console.log((!$(e.target).hasClass('editable')));
            if(!$(e.target).is('a') || (!$(e.target).hasClass('editable'))){
                return;
            }
            var _this = $(e.target);
            let app = global['menuApp'];
            app.curEdit = _this.data('index');
            app.setName(_this.text());       
            app.setGid(_this.data('g_id'));     
            app.setPosition(parseInt(_this.data('index') - 1));
            app.setShow(_this.data('show'))
            app.showForm();

        },

        scanEventsMap: function(maps, isOn) {
            /**
            'click chatSend' : 'btnSend',   =========> $(chatesend).bind('click', function(){})
            'click chatList li' : 'alterChat',   =========>$(chatesend).bind('click', 'li', function(){})
            **/
            var delegateEventSplitter = /^(\S+)\s*(.*)$/;
            for (var keys in maps) {
                if (maps.hasOwnProperty(keys)) {
                    let matchs = keys.match(delegateEventSplitter);
                    let targets = matchs[2].split(' ');
                    if (targets.length == 2) {
                        //console.log(this.eles[targets[0]], matchs[1], targets[1]);
                        this.eles[targets[0]].bind(matchs[1], targets[1], this[maps[keys]]);
                    } else {
                        this.eles[matchs[2]].bind(matchs[1], this[maps[keys]]);
                    }
                }
            }
        },
        

    }
})(this, this.jQuery, this._, Mustache, this.jQuery(document));