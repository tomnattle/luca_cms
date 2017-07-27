@extends('layouts.cms')
@section('content')
                 <nav class="navbar navbar-default">
                  <div class="container">
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/home/groups')}}">列表<span class="sr-only">(current)</span></a></li>
                    <!--<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                      </ul>
                    </li>-->
                  </ul>
                  </div>
                </nav>

                <div class="panel panel-default">
                  
                  <div class="panel-body">
                        <table class="table table-striped _list">
                            <tr>
                              <th class="">名称</th>
                              <th class="">类型</th>
                              <th class="" width="90">时间</th>
                            </tr>
                           @foreach ($groups as $group)
                            <tr>
                              <td class="">{{$group['name']}}</td>
                              <td class="">{{$groupNames[$group['model_type']]}}</td>
                              <td class="" width="90">{{date('Y-m-d',strtotime($group['created_at']))}}</td>
                            </tr>
                            @endforeach
                        </table>

                       
                        </table>
                  </div>
                </div>
@endsection