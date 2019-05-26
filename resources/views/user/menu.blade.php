<ul class="context-nav">
  <li class="{{isset($active['user_info']) ? $active['user_info'] : ''}}"><a href="{{url('/home/users/profile')}}">基本资料<span class="sr-only">(current)</span></a></li>
  <li class="{{isset($active['user_secure']) ? $active['user_secure'] : ''}}"><a href="{{url('/home/users/secure')}}">安全设置<span class="sr-only">(current)</span></a></li>
</ul>