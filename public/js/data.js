$(document).ready(function (){

		Mustache.tags = [ '{', '}' ];
		
		$('#select_group_album_reload').change(function(e){
			console.log(e);
			window.location.href = '/home/albums?g_id=' + $(e.target).val();
		});
		$('#select_group_reload').change(function(e){
			console.log(e);
			window.location.href = '/home/article-cats?g_id=' + $(e.target).val();
		});
		$('.bt_del_album').on('click', function(){
			model.delAlbum(
				model.album_del($(this).attr('data-id')),
				{},
				function (data){
					location.reload();
				}
			)
		});
		$('.bt_set_album_cover').on('click', function(){
			model.setAlbumCover(
				model.set_album_cover($(this).attr('data-id')),
				{},
				function (data){
					dom.toast({
						title: '温馨提示',
						content: '设置相册封面成功!'
					})
				}
			);
		}),
		$('.bt_del_photo').on('click', function(){
			model.delPhoto(
				model.photo_del($(this).attr('data-id')),
				{},
				function (data){
					location.reload();
				}
			)
		});
		$('.bt_del_article').on('click', function(){
			model.delArtcle(
				model.article_del($(this).attr('data-id')),
				{},
				function (data){
					location.reload();
				}
			)
		});
		$('.bt_del_article_cat').on('click', function(){
			model.delArtcleCat(
				model.article_cat_del($(this).attr('data-id')),
				{},
				function (data){
					location.reload();
				}
			)
		});
		$('#select_group').change(function (e){
			model.loadarticleCats(
				model.articleCats,
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
		$('#select_group_album').change(function (e){
			model.loadAlbums(
				model.albums,
				{
					g_id : $('#select_group_album').val(),
					page : 1
				},
				function (data){
					index = 1;
					data._created_at = function (){
						return this.created_at.split(' ')[1];
					};
					tpls.render(tpls.render_select_cat_album(),{albums:data},'#select_cat_album');
				}
			);
		});

})


var dom = {
	getId : function (e){
		return $(e.target).parent().parent().attr('data-id');
	},
	toast : function (data){
		$(document.body).append(tpls.render(tpls.render_alert(),data));
		setTimeout(function(){
			$('.luca_alert').slideUp(function(){
				$('.luca_alert').remove();
			});

		},2000)
	}
}

var tpls = {
	render : function(view, data, container = null){
		//console.log(data);
		var html = Mustache.render(view, data);
		//console.log(html);
		if(container){
			$(container).html(html);
		}else{
			return html;
		}
		
	},
	render_select_cat : function(){
		return '\
		<option value="0">请选择分组</option>\
		{#cats.data}\
		<option value={cid}>{name}</option>\
		{/cats.data}';
	},
	render_select_cat_album : function(){
		return '\
		<option value="0">请选择相册</option>\
		{#albums.data}\
		<option value={aid}>{name}</option>\
		{/albums.data}';
	},
	render_alert : function(){
		return '\
			<div class="luca_alert alert">	\
				<div class="title">{title}</div>\
				<div class="content">{content}</div>\
			</div>	\
		';
	}
};

var model = {
	articleCats : "/home/article-cats",
	albums : "/home/albums",
	album_del : function(id){
		return "/home/albums/" + id ;
	},
	article_del : function(id){
		return "/home/articles/" + id ;
	},
	article_cat_del : function(id){
		return "/home/article-cats/" +id ;
	},
	photo_del : function(id){
		return "/home/photos/" + id ;
	},
	set_album_cover : function(id){
		return "/home/albums/setCover/" + id ;
	},
	loadarticleCats : function (url, data, handel = null){
		http.get(url, data, handel);
	},
	loadAlbums : function (url, data, handel = null){
		http.get(url, data, handel);
	},
	delAlbum : function(url, data, handel = null){
		http.delete(url, data, handel);
	},
	delArtcle : function(url, data, handel = null){
		http.delete(url, data, handel);
	},
	delArtcleCat: function(url, data, handel = null){
		http.delete(url, data, handel);
	},
	delPhoto: function(url, data, handel = null){
		http.delete(url, data, handel);
	},
	setAlbumCover: function(url, data, handel = null){
		http.put(url, data, handel);
	}
};

var http = {
	erro : function(e){
		console.log(e);
		//$("#alert").fadeIn();
		//$('#alert-msg').html('请求错误，服务器返回:' + e.status + ', ' + e.statusText);
	},
	params : function(data){
		 data['_token'] = $('meta[name="csrf-token"]').attr('content');
		 return data;
	},
	get : function(url, data, handel){
		$.ajax(
			{
			  url : url,
			  type : 'GET',
			  data : this.params(data),
			  success : function(data){
			  	if(handel)
			  		handel(data)
			  },
			  error: this.erro
			}
		);
	},
	delete : function(url, data, handel){
		$.ajax(
			{
			  url : url,
			  type : 'DELETE',
			  data : this.params(data),
			  success : function(data){
			  	if(handel)
			  		handel(data)
			  },
			  error: this.erro
			}
		);
	},
	put : function(url, data, handel){
		$.ajax(
			{
			  url : url,
			  type : 'PUT',
			  data : this.params(data),
			  success : function(data){
			  	if(handel)
			  		handel(data)
			  },
			  error: this.erro
			}
		);
	}
}
