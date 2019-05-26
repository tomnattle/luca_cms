@extends('layouts.poetry')
@section('name')
作者
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="http://{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}">泛白网</a></li>
            <li><a href="http://poetry.{{ parse_url(env('APP_URL'), PHP_URL_HOST) }}/poetries">诗词</a></li>
            <li class="active">作者</li>
        </ol>
    </div>
</div>
@endsection