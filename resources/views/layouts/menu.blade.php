<div class="sidebar">
    <div class="list-group">
      <a href="{{url('home')}}" class="list-group-item {{isset($active['homepage']) ? $active['homepage'] : ''}}"> <span class="glyphicon glyphicon-signal"></span> 主页</a>
      <a href="{{url('home/sites')}}" class="list-group-item {{isset($active['site']) ? $active['site'] : ''}}"><span class="glyphicon glyphicon-globe"></span> 站点</a>
      <!--<a href="{{url('home/im/chats')}}" class="list-group-item {{isset($active['friend']) ? $active['friend'] : ''}}"><span class="glyphicon glyphicon-user"></span> 好友</a>-->
      <a href="{{url('home/settings')}}" class="list-group-item {{isset($active['setting']) ? $active['setting'] : ''}}"><span class="glyphicon glyphicon-cog"></span> 设置</a>
      
      <a href="{{url('home/admin')}}" class="list-group-item {{isset($active['admin']) ? $active['admin'] : ''}}"><span class="glyphicon glyphicon-knight"></span> 管理</a>
      
    </div>
</div>










