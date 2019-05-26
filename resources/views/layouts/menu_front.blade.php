<li class="@if(!empty($active['site'])) {{ $active['site']}} @endif pull-left"><a href="http://{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}">首页</a></li>
<li class="@if(!empty($active['poetry'])) {{ $active['poetry']}} @endif pull-left"><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}">诗词</a></li>
<li class="@if(!empty($active['news'])) {{ $active['news']}} @endif pull-left"><a href="http://news.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}">文章</a></li>
<li class="@if(!empty($active['company'])) {{ $active['company']}} @endif pull-left"><a href="http://company.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}">企业</a></li>
<!--
<li class="@if(!empty($active['home-tech'])) {{ $active['home-tech']}} @endif pull-left"><a href="http://home-tech.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}">家教</a></li>
-->