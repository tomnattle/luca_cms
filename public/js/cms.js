//console.log('cms');

//===============blog============
/**
blog-item
blog-comment
blog-sub-comment-item
**/
/**

if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0) {
       $(window).load(function(){
           $('input:not(input[type=submit])').each(function(){
               //var outHtml = this.outerHTML;
               //$(this).append(outHtml);
           });
       });
}

**/
$(document).ready(function (){
    if($('.img-box').length > 0){
      
    }
})


function resize(obj){
    console.log(1);
    let parent = $(obj).parent();
    let img = (obj.naturalWidth / obj.naturalHeight);
    let outbox = ($(parent).width() / $(parent).height());

    if (img > outbox){
        $(obj).height('100%');
        $(obj).width('auto');
    }else{
        $(obj).width('100%');
        $(obj).height('auto');
    }
    $(parent).on('mouseover', moveImg);
    return; 

}

function moveImg(e){
  //console.log('start');
  let obj = $(e.target);
  let width = obj.width();
  let outWidth = obj.parent().width();
  let height = obj.height();
  let outHight = obj.parent().height();
  
  //console.log(obj.css('left'));
  
  if(width > outWidth){
    //left-right
    let isleft = (obj.css('left') == '0px');
    if (isleft){
      obj.stop(false, true).animate({ left:  (outWidth - width) + "px" }, 1000);
    }else{
      obj.stop(false, true).animate({ left:  0 + "px" }, 1000);
    }
    
    
  }else{
    //up down
    let istop = (obj.css('top') == '0px');
    if (istop){
      obj.stop(false, true).animate({ top: (outHight - height) + "px" }, 1000);
    }else{
      obj.stop(false, true).animate({ top: 0 + "px" }, 1000);
    }
  }
}




















