(function(global, $, _, tpl, doc) {
    'use strict';
    $(function() {
        if ($('#file_flg').length > 0) {
            var fileApp = new file();
            global['fileApp'] = fileApp;
        }
    });
    var file = function(options) {
        this.select_all = false;
        this.eles = {
            btn_view_mode: $('.view-mode'),
            myModal_upload: $('#myModal_upload'),
            myModal_preview: $('#myModal_preview'),
            image_previw: $('.image-previw'),
            btn_manage: $('.btn-manage'),
            btn_manages: $('.btn-manages'),
            ckb : $('.ckb'),
            btn_edit: $('.btn-edit'),
            btn_select_all: $('.btn-select-all'),
            btn_del_file: $('.btn-del-files'),
            //thumbnail: $('.file-list .thumbnail'),
            upload_item: function (){ 
                return $('.qq-thumbnail-selector');
            },
        };
        this.uri = {
            all : '/home/files'
        };
        options = options || {};
        this.evtMaps = {
            'click btn_view_mode': 'changeViewMode',
            'hidden.bs.modal myModal_upload' : 'model_hide',
            'show.bs.modal myModal_preview' : 'preview_show',
            'click btn_manage' : 'toggleManagers',
            'click btn_select_all': 'btn_select_all',
            'click btn_del_file': 'btn_del_file',
        };
        
        this.init();
    }

    file.prototype = {
        init: function() {
            this.bindEvent(this.evtMaps);
            console.log(this.eles.btn_manage);
            console.log(1111);
        },
        changeViewMode: function(e){
            let _app = global['fileApp'];
            http.put(_app.uri.all + '/setViewMode', {mode: $(e.target).data('mode')}, function(){
                window.location.reload();
            });
        },
        btn_select_all: function(){
            
            let _app = global['fileApp'];
            _app.select_all = _app.select_all ? false : true;
            
            _app.eles.ckb.each(function(){
                $(this).prop('checked', _app.select_all);
            })
        },
        btn_del_file: function(){
            let _app = global['fileApp'];
           
            let ids = [];
            _app.eles.ckb.each(function(){
                if($(this).prop('checked'))
                    ids.push($(this).data('id'));
            })
            if(ids.length == 0){
                note.warning('请选择要删除的图片', '图片');
                return;
            }

            http.delete(_app.uri.all, {ids: ids}, function(){
                 window.location.reload();
            });


        },
        toggleManagers: function(){
            console.log(123);
            let _app = global['fileApp'];
            _app.eles.btn_manages.toggle();
        },
        preview_show: function(e){
            let _app = global['fileApp'];
            let btn = $(e.relatedTarget);
            _app.eles.image_previw.find('img').attr('src', btn.data('src'));
        },
        model_hide: function(){
            let _app = global['fileApp'];
            console.log(_app.eles.upload_item().length);
            if(_app.eles.upload_item().length > 0)
                window.location.reload();
        },
        bindEvent: function(maps) {
            this.scanEventsMap(maps, true);
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
                    console.log(targets, matchs);
                    if (targets.length == 2) {
                        console.log(targets[0], matchs[1], targets[1]);
                        this.eles[targets[0]].bind(matchs[1], targets[1], this[maps[keys]]);
                    } else {
                        console.log(this.eles[matchs[2]], matchs[1]);
                        this.eles[matchs[2]].bind(matchs[1], this[maps[keys]]);
                    }
                }
            }
        },
        

    }
})(this, this.jQuery, this._, Mustache, this.jQuery(document));