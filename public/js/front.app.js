
var urls = {
    login : 'http://fanbai123.cn/login'
}

var user = {
    checkLogin : function (){
        let customerId = sessionStorage.customerId;
        if(customerId == undefined){
            window.location.href = urls.login + '?back-url=' + encodeURIComponent(window.location.href);
            return false;
        }
        return true;
    },
}

var article = {
    comment : {
        submit : function (){
            if(true == user.checkLogin())
                http.post('',{},function(){})
        }
    }
}

var init = function(){
    if(1 == $('#article-comment-form').length){
        $('#article-comment-form input[type=submit]').on('click', article.comment.submit);
    }
}

init();