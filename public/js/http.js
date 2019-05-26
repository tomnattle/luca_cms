if ('undefined' != typeof toastr) {
    var note = {
        init: function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "300",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        },
        success: function(title, content) {
            toastr["success"](title, content)
        },
        warning: function(title, content) {
            toastr["warning"](title, content)
        },
        error: function(title, content) {
            toastr["error"](title, content)
        }
    };
}
$.ajaxSetup({
    beforeSend: function(xhr, type) {
        if (!type.crossDomain) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        }
    },
});


var http = {
    errHandel : null,
    erro: function(e) {
        console.log(e)
        let title = '提示';
        let message = '';
        if (e.status >= 500) {
            content = '服务器错误';
        } else if (e.status >= 400) {
            if (e.status == 401) {
                content = '权限受限';
            } 
            else if (e.status == 403) {
                content = '拒绝服务';
            }
            else if (e.status == 422) {
                content = '请求参数错误:<br>';
                if (e['responseJSON'] && e['responseJSON']['errors']['content']){
                    for(let i = 0; i < e['responseJSON']['errors']['content'].length; i++){
                        message += (e['responseJSON']['errors']['content'][i]);
                    }
                }
            } else {
                content = '未知错误,';
            }
        } else if (e.status >= 300) {
            content = '资源转移,';
        } else {
            content = '未知错误,';
        }
        
        if('' == message){
            if (e['responseJSON'] && e['responseJSON']['error']){
                message += ( e['responseJSON']['error']);
            }
            if (e['responseJSON'] && e['responseJSON']['message']){
                message += ( e['responseJSON']['message']);
            }
        }
        

        
        note.warning(message , content);
        
        if(http.errHandel != null){
            http.errHandel(e);
        }
        http.errHandel = null;
    },
    params: function(data) {
        data['_token'] = $('meta[name="csrf-token"]').attr('content');
        return data;
    },
    ajaxheader : function(){
        return {
            Accept: "application/json; charset=utf-8"
        }
    },
    get: function(url, data, handel, errHandel = null) {
        this.errHandel = errHandel;
        if (url == '') {
            handel([]);
            return;
        }
        $.ajax({
            url: url,
            headers: this.ajaxheader(),
            type: 'GET',
            data: this.params(data),
            success: function(data) {
                if (handel)
                    handel(data)
            },
            error: this.erro
        });
    },
    delete: function(url, data, handel, errHandel = null) {
        this.errHandel = errHandel;
        $.ajax({
            url: url,
            type: 'DELETE',
            headers: this.ajaxheader(),
            data: this.params(data),
            success: function(data) {
                if (handel)
                    handel(data)
            },
            error: this.erro
        });
    },
    put: function(url, data, handel, errHandel = null) {
        this.errHandel = errHandel;
        $.ajax({
            url: url,
            type: 'PUT',
            headers: this.ajaxheader(),
            data: this.params(data),
            success: function(data) {
                console.log(data);
                if (handel)
                    handel(data)
            },
            error: this.erro
        });
    },
    post: function(url, data, handel, errHandel = null) {
        this.errHandel = errHandel;
        $.ajax({
            url: url,
            type: 'POST',
            headers: this.ajaxheader(),
            CrossDomain:true,
            data: this.params(data),
            success: function(data) {
                if (handel)
                    handel(data)
            },
            error: this.erro
        });
    }
}