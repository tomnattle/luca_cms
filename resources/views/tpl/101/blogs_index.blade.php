@extends('tpl.101.layout')
@section('left-side')
@endsection
@section('content')
<style type="text/css">
    .articles .media-object{ height: 150px; width: 200px; }
</style>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">区域</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    <div class="form-group">
                        <div class="row citys" id='cities' style="display: none;">
                            <div class="col-md-2">
                                <select class="form-control" name="province">
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" name="city">
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" name="area">
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" name="town">
                                </select>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group" id="area-search">
                        <li class="province list-group-item"></li>
                        <li class="city list-group-item"></li>
                        <li class="area list-group-item"></li>
                        <li class="town list-group-item"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--搜索-->
<input type="hidden" class="search-input" name="addr_id"  value="{{ @Request::input('addr_id') }}">
<input type="hidden" class="search-input" name="c_id"  value="{{ @Request::input('c_id') }}">
<script type="text/javascript" defer="defer">
    $(document).ready(function(){
        $('#area-search').on('click', 'a', function(e) {
            $('input[name=addr_id]').val($(e.target).attr('data-code')).change();
        });
        $('#cats').on('click', 'a', function(e) {
            $('input[name=c_id]').val($(e.target).attr('data-code')).change();
        });
        $('.search-input').on('change', function() {
            let q = '';//let params = {};
            $('.search-input').each(function() {
                if ($(this).val()) {
                    q += '&' + $(this).attr('name') + '=' + $(this).val();//params[$(this).attr('name')] = $(this).val();
                }
            });
            window.location.href = '?' + q;
        });
    })
    
</script>
<!--搜索结束-->
<style type="text/css">
    #area-search a{
        display: inline-block;
        margin: 1px 1px;
    }
</style>
<div class="panel panel-default">
    @if(count($articles) == 0)
    <div class="panel-body">
        暂无内容，敬请期待!!!
    </div>
    @else
    <div class="panel-body articles">
         @foreach($articles as $article)
        <div class="media">
          <div class="media-left">
            <a href="{{ $curMenu }}/{{ $article['id'] }}">
              <img class="media-object" src="{{url('storage/' . $article['cover'])}}" alt="...">
            </a>
          </div>
          <div class="media-body">
            <h4 class="media-heading">{{ date('Y-m-d', strtotime($article['updated_at'])) }} {{ str_limit(strip_tags($article['title']), $limit = 20, $end = '...') }}</h4>
            {{str_limit(strip_tags($article['context']), $limit = 300, $end = '...')}}
            <a href="{{ $curMenu }}/{{ $article['id'] }}">更多内容</a>
          </div>
        </div>
        <div style="border-bottom: solid 1px #ccc; height: 15px" ></div>
         @endforeach
        
    </div>

    {!! $articles->links() !!}
    @endif
</div>
@endsection
@section('right-side')
<div class="panel panel-info">
    <div class="panel-heading">
        分类
    </div>
    <div class="panel-body">
        <ul class="list-group" id="cats">
            @foreach($cats as $cat)
            <a class="list-group-item @if(@Request::input('c_id') == $cat['id']) active @endif " data-code="{{ $cat['id'] }}"  href="javascript:void(0)">{{ $cat['name'] }}</a>
            @endforeach
        </ul>
    </div>
</div>

@endsection