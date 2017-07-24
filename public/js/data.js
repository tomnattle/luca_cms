$(document).ready(function (){
	(function init(){
		Mustache.tags = [ '{', '}' ];
		$('#select_group').bind('click', function (e){
			model.loadArticleDetail(
				model.ArticleDetail,
				{
					task_id : dom.getId(e),
					page : 1
				},
				function (data){
					index = 1;
					data._created_at = function (){
						return this.created_at.split(' ')[1];
					};
					console.log(data);
					
				}
			);
		});

	})()
})

var tpls = {
	'render_select_group' : function(data){
		//$('#tpl-detail').html(Mustache.render(tpls.page_detail_list(), data));
		//$('#detail').modal('show')
		console.log(data)
	}
}

var model = {
	ArticleDetail : "/home/article-cats",
	loadArticleDetail : function (url, data, handel = null){
		http.get(url, data, handel);
	}
}

var http = {
	erro : function(e){
		console.log(e);
		//$("#alert").fadeIn();
		//$('#alert-msg').html('请求错误，服务器返回:' + e.status + ', ' + e.statusText);
	},
	get : function(url, data, handel){
		$.ajax(
			{
			  url : url,
			  type : 'GET',
			  data : data,
			  success : function(data){
			  	if(handel)
			  		handel(data)
			  },
			  error: this.erro
			}
		);
	}
}
