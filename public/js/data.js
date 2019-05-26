$(document).ready(function() {
    Mustache.tags = ['{', '}'];
    if ($('#good_cats').length > 0) {
        model.loadGoodsCats(
            model.goods_cats, {},
            function(data) {
                //console.log(data)
                tpls.render(tpls.rend_goods_cats(), { goods_cats: data }, '#good_cats');
                $('.goods_cats_item').on('click', function() {
                    $('#g_id').val($(this).attr('data-id'));
                    $('#g_name').val($(this).text());
                });
            }
        )
    }

    $('#setting-dict').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var modal = $(this);
        modal.find('.modal-title').text(button.data('label'));
        modal.find('.btn-save').data('id', id);
        //ajax
        model.getDict(
            model.get_dict(id), {},
            function(data) {
                //console.log();
                modal.find('textarea').val(data.content);
                //modal.find('textarea').val(data['']);
            },
        )
    });

    $("#setting-dict .btn-save").click(function() {
        var id = $(this).data('id');
        $(this).button('loading');
        let _this = $(this);
        model.dict.update(
            model.get_dict(id), {
                content: $("#setting-dict").find('textarea').val()
            },
            function(data) {
                note.success('提示', '更新成功');
                $("#setting-dict").modal('hide');
            }
        );
        _this.button('reset')
        //$('#setting-dict').modal('hide');
    });

    $("#setting-dict-create .btn-save").click(function() {
        $(this).button('loading');
        let _this = $(this);
        console.log($('#setting-dict-create').find('input[name=key]'));
        model.dict.store(
            model.store_dict(), {
                name: $('#setting-dict-create').find('input[name=name]').val(),
                key: $('#setting-dict-create').find('input[name=key]').val(),
                content: $('#setting-dict-create').find('textarea').val(),
                desc: ''
            },
            function(data) {
                note.success('提示', '创建成功');
                $("#setting-dict-create").modal('hide');
                window.location.reload();
            }
        );
        _this.button('reset')
        //$('#setting-dict').modal('hide');
    });

    $('.addSearchRefresh').change(function(e) {
        var name = $(this).attr('name');
        var value = $(this).val();
        var params = getParams();
        if (!!params[name]) {
            params[name] = value;
        } else {
            params[name] = value;
        }

        str_params = '';
        for (var k in params) {
            str_params += k + '=' + params[k] + '&';
        }
        window.location.href = window.location.href.split("?")[0] + '?' + str_params
    });

    function getParams() {
        var data = [];
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] != '')
                data[pair[0]] = pair[1];
        }
        return data;
    }
    $('#select_group_album_reload').change(function(e) {
        console.log(e);
        window.location.href = '/home/albums?g_id=' + $(e.target).val();
    });
    $('#select_group_reload').change(function(e) {
        console.log(e);
        window.location.href = '/home/article-cats?g_id=' + $(e.target).val();
    });
    $('.bt_del_album').on('click', function() {
        model.delAlbum(
            model.album_del($(this).attr('data-id')), {},
            function(data) {
                location.reload();
            }
        )
    });
    $('.bt_set_album_cover').on('click', function() {
        model.setAlbumCover(
            model.set_album_cover($(this).attr('data-id')), 
            {},
            function(data) {
                note.success(
                    '温馨提示',
                    '设置相册封面成功!'
                )
            }
        );
    });
    $('.bt_del_photo').on('click', function() {
        model.delPhoto(
            model.photo_del($(this).attr('data-id')), {},
            function(data) {
                location.reload();
            }
        )
    });
    $('.bt_del_article').on('click', function() {
        model.delArtcle(
            model.article_del($(this).attr('data-id')), {},
            function(data) {
                location.reload();
            }
        )
    });
    $('.bt_del_article_group').on('click', function() {
        model.delArtcleGroup(
            model.article_group_del($(this).attr('data-id')), {},
            function(data) {
                location.reload();
            }
        )
    });

    $('.bt_del_article_cat').on('click', function() {
        model.delArtcleCat(
            model.article_cat_del($(this).attr('data-id')), {},
            function(data) {
                location.reload();
            }
        )
    });
    $('.bt_del_goods_vendor').on('click', function() {
        model.delGoodsVendor(
            model.goods_vendor_del($(this).attr('data-id')), {},
            function(data) {
                location.reload();
            }
        )
    });
    $('.bt_del_goods_cat').on('click', function() {
        model.delGoodsCat(
            model.goods_cat_del($(this).attr('data-id')), {},
            function(data) {
                location.reload();
            }
        )
    });

    $('#select_tpl').on('click', function() {
        model.selectTpl(
            model.select_tpl($(this).attr('data-id')), {
                tpl_id: $(this).attr('data-id')
            },
            function(data) {
                location.reload();
            }
        );
    });

    $('#select_cat_job').change(function(e) {
        console.log(123);
        if ($(this).val() != 0) {
            console.log(123);
            $('#job-tags').val($('#job-tags').val() + ' ' + $('#select_cat_job').find('option:selected').text());
        }
    });
    $('#select_group_job').change(function(e) {
        $('#job-tags').val($(this).find('option:selected').text());
        if ($(this).val() == 0) {
            $('#job-tags').val('');
        }
        model.loadJobCats(
            model.Job_cats($(this).val()), {
                g_id: $(this).val(),
                page: 1
            },
            function(data) {
                index = 1;
                tpls.render(tpls.render_select_cat_job(), { cats: data }, '#select_cat_job');
            }
        );
    });
    $('#select_group').change(function(e) {
        model.loadarticleCats(
            model.articleCats, {
                g_id: $('#select_group').val(),
                page: 1
            },
            function(data) {
                index = 1;
                data._created_at = function() {
                    return this.created_at.split(' ')[1];
                };
                tpls.render(tpls.render_select_cat(), { cats: data }, '#select_cat');
            }
        );
    });
    $('#select_group_album').change(function(e) {
        model.loadAlbums(
            model.albums, {
                g_id: $('#select_group_album').val(),
                page: 1
            },
            function(data) {
                index = 1;
                data._created_at = function() {
                    return this.created_at.split(' ')[1];
                };
                tpls.render(tpls.render_select_cat_album(), { albums: data }, '#select_cat_album');
            }
        );
    });
})
var dom = {
    getId: function(e) {
        return $(e.target).parent().parent().attr('data-id');
    },
    toast: function(data) {
        $(document.body).append(tpls.render(tpls.render_alert(), data));
        setTimeout(function() {
            $('.luca_alert').slideUp(function() {
                $('.luca_alert').remove();
            });
        }, 2000)
    }
}
var tpls = {
    render: function(view, data, container = null) {
        //console.log(data)
        //console.log(data);
        var html = Mustache.render(view, data);
        //console.log(html);
        if (container) {
            $(container).html(html);
        } else {
            return html;
        }
    },
    render_select_cat: function() {
        return '\
<option value="0">请选择分组</option>\
{#cats.data}\
<option value="{id}">{name}</option>\
{/cats.data}';
    },
    render_select_cat_job: function() {
        return '\
<option value="0">请选择分类</option>\
{#cats.data}\
<option value="{id}">{name}</option>\
{/cats.data}';
    },
    render_select_cat_album: function() {
        return '\
<option value="0">请选择相册</option>\
{#albums.data}\
<option value={id}>{name}</option>\
{/albums.data}';
    },
    render_alert: function() {
        return '\
<div class="luca_alert">  \
    <div class="title">{title}</div>\
    <div class="content">{content}</div>\
</div>  \
';
    },
    rend_goods_cats: function() {
        return '\
{#goods_cats.data}\
<li class="dropdown-submenu">\
    <a tabindex="-1" data-id="{id}" href="javascript:;">{name}</a>\
    <ul class="dropdown-menu">\
        {#items}\
        {#has_sub}\
        <li class="dropdown-submenu">\
            <a data-id="{id}" href="javascript:;">{name}</a>\
            <ul class="dropdown-menu">\
                {#items}\
                <li><a data-id="{id}" class="goods_cats_item" href="javascript:;">{name}</a></li>\
                {/items}\
            </ul>\
        </li>\
        {/has_sub}\
        {^has_sub}\
        <li class="">\
            <a data-id="{id}" class="goods_cats_item" href="javascript:;">{name}</a>\
        </li>\
        {/has_sub}\
        {/items}\
    </ul>\
</li>\
{/goods_cats.data}\
';
    }
};
var model = {
    articleCats: "/home/article-cats",
    albums: "/home/albums",
    goods_cats: "/home/goods/groups",
    goods_vendors: "/home/goods/vendors",
    get_dict: function(id) {
        return "/home/setting/dicts/" + id;
    },
    store_dict: function() {
        return "/home/setting/dicts";
    },
    album_del: function(id) {
        return "/home/albums/" + id;
    },
    select_tpl: function(id) {
        return "/home/sites/" + id;
    },
    Job_cats: function(id) {
        return "/home/jobs/cats/" + id;
    },
    article_del: function(id) {
        return "/home/articles/" + id;
    },
    article_group_del: function(id) {
        return "/home/article-groups/" + id;
    },
    article_cat_del: function(id) {
        return "/home/article-cats/" + id;
    },
    goods_cat_del: function(id) {
        return "/home/goods/cats/" + id;
    },
    goods_vendor_del: function(id) {
        return "/home/goods/vendors/" + id;
    },
    photo_del: function(id) {
        return "/home/photos/" + id;
    },
    set_album_cover: function(id) {
        return "/home/albums/" + id + "/set-cover";
    },
    loadarticleCats: function(url, data, handel = null) {
        console.log(http);
        http.get(url, data, handel);
    },
    loadJobCats: function(url, data, handel = null) {
        if (data['g_id'].substring(0, 1) === '-') {
            handel([]);
            return;
        }
        http.get(url, data, handel);
    },
    loadGoodsCats: function(url, data, handel = null) {
        http.get(url, data, handel);
    },
    loadAlbums: function(url, data, handel = null) {
        http.get(url, data, handel);
    },
    delAlbum: function(url, data, handel = null) {
        http.delete(url, data, handel);
    },
    delArtcle: function(url, data, handel = null) {
        http.delete(url, data, handel);
    },
    delArtcleGroup: function(url, data, handel = null) {
        http.delete(url, data, handel);
    },
    delArtcleCat: function(url, data, handel = null) {
        http.delete(url, data, handel);
    },
    delGoodsCat: function(url, data, handel = null) {
        http.delete(url, data, handel);
    },
    delGoodsVendor: function(url, data, handel = null) {
        http.delete(url, data, handel);
    },
    delPhoto: function(url, data, handel = null) {
        http.delete(url, data, handel);
    },
    setAlbumCover: function(url, data, handel = null) {
        http.put(url, data, handel);
    },
    getDict: function(url, data, handel = null) {
        http.get(url, data, handel)
    },
    selectTpl: function(url, data, handel = null) {
        http.put(url, data, handel)
    },
    dict: {
        update: function(url, data, handel = null) {
            http.put(url, data, handel);
        },
        store: function(url, data, handel = null) {
            http.post(url, data, handel);
        }
    }
};
