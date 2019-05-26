console.log(1234);
//get_env();
// 依赖user.js
(function(global, $, _, tpl, doc) {
    'use strict';
    $(function() {
        var commentApp = new comment();
        if ($('#comment_flg').length > 0) {
            commentApp.init();
            global['commentApp'] = commentApp;
        }
    });
    var comment = function(options) {
        this.select_all = false;
        this.eles = {
            btn_comment: $('.btn-comment'),
            btn_sub_comment: $('.btn-sub-comment'),
            btn_mark: $('.btn-mark'),
            func_id: $("#func_id").val(),
            site_id: $('#site_id').val(),
            comment_flg: $('#comment_flg').val(),
            comment_id: $('#comment_id').val(),
            target_id: $('#target_id').val(),
            content: $("#ipt_comment"),
            sub_comment: $('.sub-comment'),
            commtent_textarea: $("#commtent-textarea"),
            comment_comment_list : $('.comment-comment-list'),
            loading_sub_comment: $('.loading-sub-comment'),
            load_more: $('.load-more'),
        };
        this.uri = {
            all : function(){
                //console.log(window.location.host);
                return '/comments';
            }
        };
        options = options || {};
        this.evtMaps = {
            'click btn_comment': 'addComment',
            'show.bs.collapse sub_comment': 'loadSubComment',
            'click btn_mark' : 'mark',
            'click btn_sub_comment' : 'addSubComment',
            //'click btn_load_more' : 'loadmore'
        };
        this.func_id = '';
        this.site_id = 0;
        this.comment_id = 0;
        this.userApp = null;
        this.loadstatus = {};
        this.baseUrl = '//luca_cms.com';
    }

    comment.prototype = {
        init: function() {
            this.bindEvent(this.evtMaps);
            this.func_id = this.eles.func_id;
            this.site_id = this.eles.site_id;
            this.comment_id = this.eles.comment_id;
            this.target_id = this.eles.target_id;
            this.userApp = global['userApp'];
            
            if(this.userApp.eles.loginModal.length < 1)
               console.log('error: loginModal not found');
            
        },
        cur(e){
            let app = global['commentApp'];
            let btn = $(e.target);
            let up_id = btn.data('up-id');
            let content = UE.getEditor('ipt_comment').getContent();
            
            return {
                btn: btn,
                target_id: this.target_id,
                up_id: up_id,
                site_id : this.site_id,
                comment_id: this.comment_id,
                content: content,
            };
        },
        mark(e){
            let app = global['commentApp'];
            let btn = $(e.target);
            let comment_id = btn.data('comment-id');
            let kind_id = btn.data('kind-id');
            if(btn.hasClass('marked')){
                return;
            }
            http.post(app.uri.all() + '/mark', {
                comment_flg: app.eles.comment_flg,
                func_id: app.func_id,
                site_id: app.site_id,
                target_id: app.target_id,
                comment_id: comment_id,
                kind_id: kind_id,
            }, function(){
               btn.html(parseInt(btn.text()) + 1);
               app.rendMark(btn, kind_id);
            }, function(e){
                if(401 == e.status)
                    app.userApp.showLoginPanel();
                if(2 == e.responseJSON.status){
                    app.rendMark(btn, kind_id);
                }
            });
        },
        addComment(e){
            let app = global['commentApp'];
            let info = app.cur(e);
            if(info.content.length <= 0){
                note.warning('内容不能为空', '提示');
                return ;
            };
            console.log(info.comment_id);
            if(info.comment_id == '0'){
                http.post(app.uri.all(), {
                    comment_flg: app.eles.comment_flg,
                    func_id: app.func_id,
                    content: info.content,
                    site_id: info.site_id,
                    target_id: info.target_id,
                    up_id: info.up_id,
                }, function(){
                    window.location.reload();
                }, function(e){
                    if(401 == e.status)
                        app.userApp.showLoginPanel();
                });
            }else{
                http.put(app.uri.all() + '/' + info.comment_id, {
                    comment_flg: app.eles.comment_flg,
                    content: info.content,
                    func_id: app.func_id,
                    site_id: info.site_id,
                    target_id: info.target_id,
                    id: info.comment_id
                }, function(){
                    window.location.reload();
                }, function(e){
                    if(401 == e.status)
                        app.userApp.showLoginPanel();
                    
                });
            }
        },
        addSubComment(e){
            let app = global['commentApp'];
            let info = app.cur(e);

            if(app.loadstatus[info.up_id]){
                console.log('loaded');
            }

            let btn = $(e.target);
            let target = $(btn.data('target'));
            let target_list = $(btn.data('target-list'));

            if(target.val().length <= 0){
                note.warning('内容不能为空', '提示');
                return ;
            };
            http.post(app.uri.all(), {
                comment_flg: app.eles.comment_flg,
                func_id: app.func_id,
                content: target.val(),
                site_id: info.site_id,
                target_id: info.target_id,
                up_id: info.up_id,
                
            }, function(data){
                target.val('');
                app.updateEle(data, target_list);
                target_list.find('.btn-mark').each(function(){
                    $(this).off('click');
                    $(this).on('click', app.mark);
                })
            }, function(e){
                if(401 == e.status)
                    app.userApp.showLoginPanel();
            });
        },
        loadMore(e){
            let app = global['commentApp'];
            let info = app.cur(e);
            let btn = $(e.target);
            let target_list = $(btn.data('target-list'));
            
            http.post(app.uri.all() + '/list', {
                comment_flg: app.eles.comment_flg,
                func_id: app.func_id,
                site_id: info.site_id,
                target_id: info.target_id,
                up_id: info.up_id,
                page: app.loadstatus[info.up_id].current_page + 1,
            }, function(data){
                if(data.data.length > 0){
                    for(let i = 0; i < data.data.length; i++){
                        app.updateEle(data.data[i], target_list);
                    }
                }
                target_list.find('.btn-mark').each(function(){
                    $(this).off('click');
                    $(this).on('click', app.mark);
                })

                if(data.data.length < data.per_page){
                    target_list.parent().find('.load-more').hide();
                }

                app.loadstatus[info.up_id] = {
                    current_page: data.current_page,
                    //last_page: data.last_page,
                    //total: data.total
                }
                app.eles.loading_sub_comment.hide();
                
            }, function(e){
                if(401 == e.status)
                    app.userApp.showLoginPanel();
            });

        },
        loadSubComment(e){
            let app = global['commentApp'];
            let info = app.cur(e);
            let btn = $(e.target);
            let target_list = $(btn.data('target-list'));
            let page = 1;

            if(app.loadstatus.hasOwnProperty(info.up_id)){
                return;
            }

            http.post(app.uri.all() + '/list', {
                comment_flg: app.eles.comment_flg,
                func_id: app.func_id,
                site_id: info.site_id,
                target_id: info.target_id,
                up_id: info.up_id,
                page: page,
            }, function(data){
                if(data.data.length > 0){
                    for(let i = 0; i < data.data.length; i++){
                        app.updateEle(data.data[i], target_list);
                    }

                    if(data.data.length < data.per_page){
                        target_list.parent().find('.load-more').hide();
                    }

                    target_list.find('.btn-mark').each(function(){
                        $(this).off('click');
                        $(this).on('click', app.mark);
                    })
                    target_list.parent().find('.load-more a').bind('click', app.loadMore);
                }else{
                    target_list.parent().find('.load-more').hide();
                }

                app.loadstatus[info.up_id] = {
                    current_page: data.current_page,
                }
                app.eles.loading_sub_comment.hide();
                
            }, function(e){
                if(401 == e.status)
                    app.userApp.showLoginPanel();
            });
        },
        updateEle(data, container){
            if(data.use_signature == ''){
                data.use_signature = '暂无签名';
            }
            if(data.user_icon != ''){
                data.user_icon = '/storage/' + data.user_icon;
            }else{
                data.user_icon = '/images/header.png';
                
            }
            if(data.created_at != ''){
                data.created_at = data.created_at.split(' ')[0];
                data.user_link = this.baseUrl + '/user/' + data.user_id;
            }
            let html = Mustache.render(this.tpls.subcomment_ele, data);

            container.append(html);
        },
        rendMark(btn, kind_id){
            let oldClass;
            let newClass
            if(kind_id == 1){
                oldClass = 'fa-thumbs-o-up';
                newClass = 'fa-thumbs-up';
            }else{
                oldClass = 'fa-thumbs-o-down';
                newClass = 'fa-thumbs-down';
            }
            btn.removeClass(oldClass);
            btn.addClass(newClass);
            btn.addClass('marked');
        },
        bindEvent: function(maps) {
            this.scanEventsMap(maps, true);
        },
        scanEventsMap: function(maps, isOn) {
            var delegateEventSplitter = /^(\S+)\s*(.*)$/;
            for (var keys in maps) {
                if (maps.hasOwnProperty(keys)) {
                    let matchs = keys.match(delegateEventSplitter);
                    let targets = matchs[2].split(' ');
                    //console.log(targets, matchs);
                    if (targets.length == 2) {
                        //console.log(targets[0], matchs[1], targets[1]);
                        this.eles[targets[0]].bind(matchs[1], targets[1], this[maps[keys]]);
                    } else {
                        //console.log(this.eles[matchs[2]], matchs[1]);
                        this.eles[matchs[2]].bind(matchs[1], this[maps[keys]]);
                    }
                }
            }
        },
        tpls: {
            subcomment_ele: '\
                <div class="media">\
                    <div class="media-left">\
                        <a href="{{user_link}}">\
                            <img  class="media-object img-circle" src="{{user_icon}}" alt="...">\
                        </a>\
                    </div>\
                    <div class="media-body">\
                        <h5 class="media-heading">\
                            <a href="{{user_link}}">{{user_nick}}</a>\
                        </h5>\
                    </div>\
                    <div class="comment-content">\
                        <div class="created_at">发布于：{{created_at}}</div>\
                        {{content}}\
                        <div class="comment-bar">\
                            <span data-comment-id="{{ id }}" data-kind-id="1" class="btn-mark fa fa-thumbs-o-up" style="cursor: pointer;" > {{ like_count }}</span>\
                            <span data-comment-id="{{ id }}" data-kind-id="2" class="btn-mark fa fa-thumbs-o-down" style="cursor: pointer;"> {{ dislike_count }}</span>\
                        </div>\
                    </div>\
                </div>\
            ',
        }

    }
})(this, this.jQuery, this._, Mustache, this.jQuery(document));