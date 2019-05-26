(function(global, $, _, tpl, doc) {
    'use strict';
    $(function() {
        if ($('#folder_flg').length > 0) {
            var folderApp = new folder();
            global['folderApp'] = folderApp;
        }
    });
    var folder = function(options) {
        this.folderCreating = false;
        this.folderUpdating = false;
        this.curCol = 0;
        this.eles = {
            root: $('.file-manager'),
            btn_save_file: $('.btn_save_file'),
            btn_new_folder: $('.btn_folder_create'),
            btn_folder_del: $('.btn_folder_del'),
            folder_list: $('.folder-list'),
            folder_list_header: $('.folder-list tr:first'),
            btn_folder_rename: $('.btn_folder_rename'),
            ipt_folder_name: $('input[name=folder_name]'),
            btn_save_name: $('.btn_save_name'),
            ipt_checkbox: $('input[type=checkbox]'),
            folder_name: function (){
                return $('.folder-name');
            },
            form: {
                form: $('.file_form'),
                
            }
        };
        this.uri = {
            all : '/home/folders'
        };
       
        options = options || {};
        this.period = 1; //s
        this.evtMaps = {
            'click btn_new_folder': 'newfolder',
            'click btn_folder_del' : 'delfolder',
            'click folder_list td' : 'selectCol',
            //'click btn_folder_rename': 'btn_folder_rename',
            'click btn_save_name' : 'btn_save_name',
            //'click ipt_checkbox' : 'toggle_delete'
        };
        
        this.init();
    }

    folder.prototype = {
        init: function() {
            this.bindEvent(this.evtMaps);
            
        },
        setCurlCol: function(id){
            this.curCol = id;
            this.eles.folder_list.find('.info').removeClass('info');
            let tr = this.getCulCol();
            tr.addClass('info');
            this.eles.root.find('.btn_folder_rename').removeClass('hidden');
            //console.log(this.eles.root.find('.btn_folder_rename'));
            this.eles.ipt_folder_name.val(tr.find('td').eq(2).text());
        },
        getCulCol: function(){
            return this.eles.folder_list.find('input[value=' + this.curCol + ']').parent().parent().parent();
        },
        toggle_delete: function(){
            console.log(1);
            var _app = global['folderApp'];
            let count = 0;
            _app.eles.ipt_checkbox.each(function(){
                if($(this).prop('checked') == true){
                    count++;
                }
            });

            if(count > 0){
                _app.eles.btn_folder_del.removeClass('hidden');
            }else{
                _app.eles.btn_folder_del.addClass('hidden');
            }
            
        },
        btn_save_name: function(){
            var _app = global['folderApp'];
            let tr = _app.getCulCol();
            let name = _app.eles.ipt_folder_name.val();

            if(name == tr.find('td').eq(2).text()){
                console.log('content equel');
                note.warning('内容无变化', '警告');
                return;
            }
            if(name == ''){
                note.warning('名称不能为空', '警告');
                return ;
            }

            if(_app.folderUpdating == true)
                return;
            _app.folderUpdating = true;

            http.put(_app.uri.all + '/' + _app.curCol , {name: name}, function(data){
                tr.find('td').eq(2).find('a').text(_app.eles.ipt_folder_name.val());
               _app.folderUpdating = false;
               $('#myModal').modal('hide');
            }, function(){
                _app.folderUpdating = false;
            });

        },
        selectCol: function(e) {
            var _app = global['folderApp'];
            _app.setCurlCol($(e.target).parent().find('input[type=checkbox]').val());
        },
        newfolder : function(){
            var _app = global['folderApp'];
            if(_app.eles.folder_name().length > 0){
                return;
            }
            _app.eles.folder_list_header.after(_app.tpls.newfolder);
            _app.eles.folder_name().focus().select();
            _app.eles.folder_name().bind('blur keyup', function(e){
                //console.log(e);
                if(event.keyCode != 13 && e.type == 'keyup'){
                    return;
                }

                if($(this).val() == ''){
                  _app.eles.folder_name().parent().parent().remove();
                  note.warning('添加失败，请输入2-30位字符', '警告');
                  return;
                }

                console.log(_app.folderCreating);
                if(_app.folderCreating == true)
                    return;
                _app.folderCreating = true;
                http.post(_app.uri.all, {name: $(this).val()}, function(data){
                    _app.eles.folder_name().parent().parent().find('input[type=checkbox]').val(data['id']);
                    _app.eles.folder_name().parent().html(_app.tpls.link(_app.eles.folder_name().val(), data['id']));
                    note.success('添加成功', '提示');
                    _app.folderCreating = false;
                }, function(){
                    _app.eles.folder_name().parent().parent().remove();
                    _app.folderCreating = false;
                });
                
                //_app.eles.folder_name().parent().parent().remove();
            });
        },
        delfolder : function(){
            console.log('del');
            var _app = global['folderApp'];
            let ids = [];
            _app.eles.folder_list.find('input[type=checkbox]').each(function(){
                if($(this).prop('checked') == true){
                    console.log($(this).val());
                    ids.push($(this).val());
                }
            });
            if(ids.length > 0){
                http.delete(_app.uri.all, {ids: ids}, function(){
                    window.location.reload();
                });
            }else{
                note.warning('请选择1个以上需要删除的分组','提示');
            }
        },
        bindEvent: function(maps) {
            this.scanEventsMap(maps, true);
        },
        tpls : {
            link : function(name, id){
                return '<a href="/home/files?f_id=' + id +'">' + name + '</a>'
            },
            newfolder : "<tr >\
                            <td>\
                                <label>\
                                    <input name='ids[]' value='' type='checkbox'>\
                                </label>\
                            </td>\
                            <td><span class='icon-folder-close btn-md'></span> </td>\
                            <td><input style='width:200px;' type='text' value='未命名' class='td_input form-control folder-name' / ></td>\
                            <td>-</td>\
                            <td>-</td>\
                        </tr>",
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