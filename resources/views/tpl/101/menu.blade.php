@foreach($site['tpl_config']['menus'] as $key => $menu)
<li class="active"><a href="/{{ $key }}">{{$menu['name']}} <span class="sr-only">(current)</span></a></li>
@endforeach