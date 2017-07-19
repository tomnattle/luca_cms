@extends('layouts.cms')
@section('content')
                 <nav class="navbar navbar-default">
                  <div class="container">
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="#">文章<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">分类</a></li>
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
                  <div class="panel-heading">
                      <button type="button" class="btn btn-primary">新增</button>
                  </div>
                  <div class="panel-body">
                        <table class="table table-striped _list">
                           <tr>
                              <td class="">古代的人智商情商比现代人高</td>
                              <td class="" width="90">2017-01-25</td>
                              <td class="" width="50">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        编辑 <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                         <li><a href="#">编辑</a></li>
                                        <li><a href="#">删除</a></li>
                                      </ul>
                                    </div>
                                </td>
                            </tr> 
                        </table>
                        <nav aria-label="Page navigation ">
                          <ul class="pagination pull-right">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                  </div>
                </div>
@endsection