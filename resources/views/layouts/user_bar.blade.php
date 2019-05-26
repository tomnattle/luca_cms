<ul class="user-bar">
    @if (Auth::guest())
    <li><a href="{{ route('login') }}">登陆</a></li>
    <li><a href="{{ route('register') }}">注册</a></li>
    @else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="{{ route('home') }}">个人中心</a>
                <a href="{{ env('APP_URL') . '/home/users/profile' }}">设置</a>
                <a href="{{ env('APP_URL') . '/logout' }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    退出
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
    @endif
</ul>