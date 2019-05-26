var encrypt = function(data){
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey($('#pubkey').val());
    //console.log($('#pubkey').val());
    return encrypt.encrypt(data);
};
(function(global, $, _, doc) {
    'use strict';
    $(function() {
        var userApp = new user();
        if ($('#user_flg').length > 0) {
            userApp.init();
            global['userApp'] = userApp;
        }
    });

    var user = function(options) {
        this.eles = {
            btn_submit: $('#loginModal .submit'),
            ipt_username: $('#loginModal input[name=username]'),
            ipt_password: $('#loginModal input[name=password]'),
            loginModal: $('#loginModal'),
        };
        this.uri = {
            ajaxlogin : '/auth/ajaxlogin'
        };
       
        options = options || {};
        this.evtMaps = {
            'click btn_submit': 'login',
        };
        
        //this.init();
    }

    user.prototype = {
        init: function() {
            this.bindEvent(this.evtMaps);
            
        },
        bindEvent: function(maps) {
            this.scanEventsMap(maps, true);
        },
        showLoginPanel: function(){
            let app = global['userApp'];
            app.eles.loginModal.modal({
              keyboard: false,
              backdrop: 'static',
              show: true
            });
        },
        login: function(e){
            //console.log(e);
            let app = global['userApp'];
            let username = app.eles.ipt_username.val();
            let password = app.eles.ipt_password.val();
            $(this).button('loading');
            http.post(app.uri.ajaxlogin,{
                data: encrypt(username + '||' + password),
            }, function(data){
                app.eles.loginModal.modal('hide');
                app.updateView('login.success', data);
                note.success('登陆成功','提示');
            }, function(){
                note.warning('登陆失败,请重试','提示');
            });
            $(this).button('reset');
            return false;
        },
        updateView : function(name, data){
            if(name == 'login.success'){
                window.location.reload();
            }
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
})(this, this.jQuery, this._, this.jQuery(document));