<?php include $view . "/top.blade.php"?>
<?php
$g_id = 9;
$c_id = 0;
$articleR = $repository('article');
$articles = $articleR->getList($company['id'], $g_id, $c_id, 15, 'desc');
$pagner = $articles;
?>


<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
  <tr>
    <td align="center"><table width="958" border="0" cellpadding="0" cellspacing="0" style="background-image: url(/images/9.jpg);background-repeat: no-repeat;background-position: top;">
      <tr>
        <td align="center"><table width="832" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="72" valign="top"><table width="100%" height="41" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="18%">&nbsp;</td>
                <td width="8%" class="b12b">当前位置：</td>
                <td width="74%" align="left"><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="20" align="center"><img src="/company/cmsa/img/biao5.jpg" width="4" height="7" /></td>
                    <td align="center"><a href="/" class="b12">首页</a></td>
                    <td width="20" align="center"><img src="/company/cmsa/img/biao5.jpg" width="4" height="7" /></td>
                    <td align="center" class="r12">智库动态</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td width="81" align="center" class="blue14b">智库动态</td>
                <td width="197" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><table width="832" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="line-height:30px;">
                @if($id == 0)
                @foreach($articles as $article)
                <table width="830" border="0" align="left" cellpadding="0" cellspacing="0" >
                  <tr>
                    <td  style="border-bottom:1px dashed #abc7de;" width="30"><div align="center"><img src="/company/cmsa/img/biao5.jpg" width="4" height="7" /></div></td>
                    <td   style="border-bottom:1px dashed #abc7de;font-size:10.5pt;" class="STYLE1">
                    <a href="{{$_url('zkdt', ['id' => $article['id']])}}">{{str_limit($article['title'], $limit = 80, $end = '...')}}</a></td>
                    <td  style="border-bottom:1px dashed #abc7de;"  width="100"><div align="center" class="STYLE2">[{{date('Y-m-d', strtotime($article['created_at']))}}]</div></td>
                  </tr>

                  </table>
                  @endforeach
                  @else
                  <?php
                  $article = $articleR->get($id);
                  ?>
                  <table width="829" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                      <td height="30"><div align="center" class="STYLE3t">{{$article['title']}}</div></td>
                    </tr>
                                       <tr>
                      <td height="30"><div align="center">发布日期：{{date('Y-m-d', strtotime($article['created_at']))}}</div></td>
                    </tr>
                                      <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td style="line-height:24px; padding:30px 50px 30px 70px;font-size:10.5pt;">
                            {!! htmlspecialchars_decode($article['context'])!!}
                          </td>
                        </tr>
                      </table></td>
                    </tr>
                    <!--
                     <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left"><span style='color:#000'><b>上一篇：</b></span><a href='/shownews/ehsz_2748.html' style='color:#000;text-decoration:none'>两岸智库论坛在厦举行 专家聚焦“共谋发展、共创未来”</a><br> <span style='color:#000'><b>下一篇：</b></span>没有了</td>
                        </tr>
                      </table></td>
                    </tr>
                    -->

                  </table>
                  @endif

                </td>
              </tr>
              <tr>
                <td width="832">
                <div style="text-align:center; font-size:14px; height:22px; padding:22px;">
                <!--
                 <a href="{{$_url('zkdt',['page'=>1])}}">首页</a>
                 @if($pagner->currentPage() > 1)
                 <a href="{{$_url('zkdt',['page'=>$pagner->currentPage()-1])}}">上一页</a>
                 @else
                 上一页
                 @endif
                 @if($pagner->currentPage() < $pagner->count())
                 <a href="{{$_url('zkdt',['page'=>$pagner->currentPage()+1])}}">下一页</a>
                 @else
                 下一页
                 @endif
                 &nbsp;
                 <a href="{{$_url('zkdt', ['page' => $pagner->count()])}}">尾页</a>
                 &nbsp;&nbsp;&nbsp;页次 {{$pagner->currentPage()}}/{{$pagner->count()}}页 　
                 共&nbsp;{{$pagner->total()}}&nbsp;条信息 &nbsp;
                 <br />
                -->
                <?php
                $articles->appends(['view' => request('view')]);
                 ?>
                {!! $articles->links() !!}
                </div>
                </td>
              </tr>
            </table>
              <br />
              <br /></td>
          </tr>


        </table>
          </td>
      </tr>
    </table>
      <table width="958" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="1" bgcolor="#bfd4e6"></td>
        </tr>
      </table></td>
  </tr>
</table>

<?php include $view . "/bottom.blade.php"?>
