@extends('layouts.home')
@section('breadcrumb')
@endsection
@section('content')
    <h4>hi {{ Auth::user()->name }}:</h4>
    
    <p>
        <h5 style="line-height: 25px;">
        欢迎使用本系统！通过本系统，您可以免费创建3个站点，灵活选择喜欢的模版，轻易的搭建一个属于自己的（个人/企业/购物/信息）网站。
        <br>
        我们会定期推出新的模版，新的功能供您使用，希望您能享受这个过程。
    </h5>
    </p>
    
    <a class="btn btn-success" href="/home/sites" >现在开始</a>

@endsection
@section('footscript')
@endsection