(function(global, $, _, tpl, doc) {
    'use strict';
    $(function() {
        if ($('#chat_flg').length > 0) {
            var chatApp = new chat();
            global['chatApp'] = chatApp;
        }
    });
    var chat = function(options) {
        this.eles = {
            chatSend: $('#chat-send'),
            chatWindow: $('#chat-window'),
            iptMsg: $('#ipt_msg'),
            chatList: $('.chat-list'),
            curChatItem: function(cur) {
                console.log('.chat-list li[data-id=' + cur + ']');
                return $('.chat-list li[data-id=' + cur + ']')
            },
        };
        options = options || {};
        this.period = 1; //s
        this.evtMaps = {
            'click chatSend': 'btnSend',
            'click chatList li': 'alterChat',
            'keydown iptMsg': 'btnSend'
        };
        // 聊天列表
        this.chats = [];
        // 聊天上下文
        this.chatContexts = [];
        // 当前聊天
        this.curChat = 12;
        this.init();
    }

    chat.prototype = {
        init: function() {
            this.bindEvent(this.evtMaps);
            this.updateChats();
            this.setCurChat(12);
            this.updateChatsContext();
            this.windowScrollBottom();
        },
        windowScrollBottom: function() {
            this.eles['chatWindow'].scrollTop(this.eles['chatWindow'][0].scrollHeight);
        },
        addChatMessage: function(data) {
            var tpl_str = '';
            if (data['from'] == 0) {
                tpl_str = this.tpl_chat['0'];
            } else {
                tpl_str = this.tpl_chat['1'];;
            }

            this.eles['chatWindow'].append(tpl.render(tpl_str, data));
            this.windowScrollBottom();
        },
        tpl_chat: {
            0: '<div class="row my-chat" data-id="{from}">\
                            <div class="col-md-12 " ><img class="media-object header pull-right"  src="{cover}" alt="...">\
                                <div class="pull-right">{name}</div></div>\
                            <div class="col-md-10 msg2 pull-right"><span class="pull-right">{msg}</span></div>\
                        </div>',
            1: '<div class="row fiend-chat" data-id="{from}">\
                    <div class="col-md-12 "><img class="media-object header pull-left"  src="{cover}" alt="...">\
                        <div class="pull-left">{name}</div></div>\
                    <div class="col-md-10 msg1"><span>{msg}</span></div>\
                </div>',
        },
        tpl_user: '<li class="list-group-item" data-id="{id}">{name}<img class="media-object header pull-left" src="{cover}" ></li>',
        addChat: function(user) {
            this.eles['chatList'].append(tpl.render(this.tpl_user, user));
        },
        selectChat: function() {
            this.eles['curChatItem'](this.curChat).addClass('active');
        },
        unselectChat: function() {
            this.eles['curChatItem'](this.curChat).removeClass('active');
        },
        btnSend: function(e) {
            if (e.type == 'keydown')
                if (e.keyCode != 13)
                    return;

            var app = global['chatApp'];
            app.addChatMessage({
                from: 0,
                name: '范小白',
                cover: '/images/header.png',
                msg: app.eles['iptMsg'].val(),
            });
            app.eles['iptMsg'].val('');
        },
        alterChat: function(e) {
            console.log('alter chat', $(e.srcElement).attr('data-id'))
            var app = global['chatApp'];
            app.clearChatWindow();
            app.setCurChat($(e.srcElement).attr('data-id'));
            app.updateChatsContext();

        },
        clearChatWindow: function() {
            this.eles['chatWindow'].html('');
        },
        setCurChat: function(id) {

            this.unselectChat();
            this.curChat = id;
            this.selectChat();
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
                    if (targets.length == 2) {
                        this.eles[targets[0]].bind(matchs[1], targets[1], this[maps[keys]]);
                    } else {
                        this.eles[matchs[2]].bind(matchs[1], this[maps[keys]]);
                    }
                }
            }
        },
        updateChats: function() {
            this.loadUsers();
            for (var i in this.chats) {
                this.addChat(this.chats[i]);
            }
        },
        updateChatsContext: function() {
            this.loadChatsContext();
            console.log(this.chatContexts, this, this.curChat);
            for (var i = 0; i < this.chatContexts[this.curChat].length; i++) {
                let chatContext = this.chatContexts[this.curChat][i];
                let chat = this.chats[chatContext.from];
                let chatMessage = {
                    'from': chatContext.from,
                    'msg': chatContext.msg,
                    'cover': chat.cover,
                    'name': chat.name
                };
                this.addChatMessage(chatMessage);
            }
        },
        loadUsers: function() {
            this.chats = {
                0: {
                    'id': 0,
                    'name': '泛小白',
                    'cover': '/images/header.png',
                },
                12: {
                    'cur': true,
                    'id': 12,
                    'name': '秦始皇',
                    'cover': '/images/qsh.png'
                },
                22: {
                    'id': 22,
                    'name': '孙悟空',
                    'cover': '/images/wk.png'
                }
            };
        },
        loadChatsContext: function() {
            this.chatContexts = {
                0: [{
                    'from': 0,
                    'msg': '记事本测试'
                }, ],
                12: [{
                        'from': 12,
                        'msg': '你好，我是秦始皇，其实我并没有死，我在西安有100吨黄金，我现在需要2000元人民币解冻我在西安的黄金，你微信，支付宝转给我都可以。账号就是我的手机号码！转过来后，我明天直接带部队复活，让你统领三军！'
                    },
                    {
                        'from': 12,
                        'msg': '在不在？'
                    },
                    {
                        'from': 0,
                        'msg': '你好，我是女娲，现在快饿死了失去了法力，请好心人捐5块钱给我吃桶泡面，回头给你捏个女朋友。'
                    },
                    {
                        'from': 12,
                        'msg': '....'
                    },
                ],
                22: [{
                    'from': 0,
                    'msg': '哥 在不在？'
                }, ]
            };
        }

    }
})(this, this.jQuery, this._, Mustache, this.jQuery(document));