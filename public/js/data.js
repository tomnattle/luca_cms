
$(document).ready(function (){
	(function init(){
		Mustache.tags = [ '{', '}' ];
		$('#select_group_reload').change(function(e){
			console.log(e);
			window.location.href = '/home/article-cats?g_id=' + $(e.target).val();
		});
		$('#select_group').change(function (e){
			model.loadArticleDetail(
				model.ArticleDetail,
				{
					g_id : $('#select_group').val(),
					page : 1
				},
				function (data){
					index = 1;
					data._created_at = function (){
						return this.created_at.split(' ')[1];
					};
					tpls.render(tpls.render_select_cat(),{cats:data},'#select_cat');
				}
			);
		});

	})()
})

var dom = {
	getId : function (e){
		return $(e.target).parent().parent().attr('data-id');
	}
}
var tpls = {
	render : function(view ,data ,container){
		//console.log(data);
		var html = Mustache.render(view, data);
		//console.log(html);
		$(container).html(html);
	},
	'render_select_cat' : function(data){
		return '\
		<option value="0">请选择分组</option>\
		{#cats.data}\
		<option value={cid}>{name}</option>\
		{/cats.data}';
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
