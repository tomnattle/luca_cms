<?php include $view . "/top.blade.php"?>
<?php $articleR = $repository('article'); ?>
<table width="958" border="0" align="center" cellpadding="0" cellspacing="0" class="bg">
  <tr>
    <td height="26" valign="top">&nbsp;</td>
    <td width="19">&nbsp;</td>
    <td width="210">&nbsp;</td>
  </tr>
  <tr>
    <td height="289" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="362" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="37"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="9%" align="center"><img src="/company/cmsa/img/biao.jpg" width="9" height="11" /></td>
                <td width="77%"><a href="?view=zkgk&" class="r14b">智库概况</a></td>
                <td width="14%"><a href="?view=zkgk&" class="b12">更多&gt;</a></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="0" cellspacing="19" class="bk">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="/company/cmsa/upimage/fI2oCHs6DY.jpg" width="322" height="82" /></td>
                  </tr>
                  <tr>
                    <td height="18"></td>
                  </tr>
                  <tr>
                    <td class="b142">&nbsp;&nbsp;&nbsp;&nbsp;
{{strip_tags($articleR->get(34)['context'])}}

 <a href="?view=zkgk&" class="b14">[详细] </a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="37"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="9%" align="center"><img src="/company/cmsa/img/biao.jpg" width="9" height="11" /></td>
                <td width="77%"><a href="?view=msyj&" class="r14b">民生研究</a></td>
                <td width="14%"><a href="?view=msyj&" class="b12">更多&gt;</a></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="17" class="bk2">
                <tr>
                  <td>
                  <ul class="ul1">
  <?php
  $g_id = 12;
  $c_id = 0;
  $artRep = $repository('article');
  $articles = $artRep->getList($company['id'], $g_id, $c_id, 9, 'desc');
  ?>
  @foreach($articles as $article)
   <li><a href='?view=msyj&id={{$article['id']}}' class='b14'>{{str_limit($article['title'], 40, '...')}}</a></li>
@endforeach
           </ul>
                  </td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="362" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="37"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="9%" align="center"><img src="/company/cmsa/img/biao.jpg" width="9" height="11" /></td>
                      <td width="77%"><a href="?view=zkdt&" class="r14b">智库动态</a></td>
                      <td width="14%"><a href="?view=zkdt&" class="b12">更多&gt;</a></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="19" class="bk">
                    <tr>
                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td valign="top">
                                <?php
                                $g_id = 9;
                                $c_id = 0;
                                $artRep = $repository('article');
                                $articles = $artRep->getList($company['id'], $g_id, $c_id, 4, 'desc');
                                ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="150"><img src='/company/cmsa/upimage/ARiBeowfNJ.jpg' width=150 height=97 border='0'/><!--暂无图片--></td>
                                <td width="10">&nbsp;</td>
                                <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    @foreach($articles as $key => $article)
                                    <?php
                                        if($key > 0)
                                            break;
                                     ?>
                                  <tr>
                                    <td height="35" valign="top"><a href="?view=zkdt&id={{$article['id']}}" class="blue14">{{str_limit($article['title'], $limit = 50, $end = '...')}}</a></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp; <a href="?view=zkdt&" class="blue12">[详细] </a></td>
                                  </tr>
                                  @endforeach
                                </table></td>
                              </tr>
                            </table>
                            </td>
                          </tr>
                          <tr>
                            <td height="10"></td>
                          </tr>
                          <tr>
                            <td class="b142">
                            <ul class="ul1">
@foreach($articles as $key => $article)
<?php
    if($key == 0)
        continue;
 ?>
   <li><a href='?view=zkdt&id={{$article['id']}}' class='b14'>{{str_limit($article['title'], $limit = 36, $end = '...')}}</a></li>
@endforeach
                           </ul>
                            </td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="37"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="9%" align="center"><img src="/company/cmsa/img/biao.jpg" width="9" height="11" /></td>
                      <td width="77%"><a href="?view=msjt&" class="r14b">民生大讲堂</a></td>
                      <td width="14%"><a href="?view=msjt&" class="b12">更多&gt;</a></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="19" class="bk2">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td valign="top">
                              <?php
                              $g_id = 9;
                              $c_id = 0;
                              $artRep = $repository('article');
                              $articles = $artRep->getList($company['id'], $g_id, $c_id, 4, 'desc');
                              ?>
                              @foreach($articles as $key => $article)
                              <?php
                                  if($key > 0)
                                      break;
                               ?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="152"><img src="/company/cmsa/upimage/tuXT6GJAE2.jpg" width="152" height="97" /></td>
                                <td width="10">&nbsp;</td>
                                <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td height="35" valign="top"><a href="?view=msjt&id={{$article['id']}}" class="blue14">{{str_limit($article['title'], $limit = 50, $end = '...')}}</a></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;&nbsp;&nbsp;&nbsp; <a href="?view=msjt&id={{$article['id']}}" class="blue12">[详细] </a></td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table>
                          @endforeach
                        </td>
                        </tr>
                        <tr>
                          <td height="10"></td>
                        </tr>
                        <tr>
                          <td class="b142"><ul class="ul1">
                              @foreach($articles as $key => $article)
                              <?php
                                  if($key == 0)
                                      continue;
                               ?>
                                 <li><a href='?view=msjt&id={{$article['id']}}' class='b14'>{{str_limit($article['title'], $limit = 36, $end = '...')}}</a></li>
                              @endforeach
                            </ul></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="37"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="5%" align="center"><img src="/company/cmsa/img/biao.jpg" width="9" height="11" /></td>
              <td width="88%"><a href="?view=zkzj&" class="r14b">智库专家</a></td>
              <td width="7%"><a href="?view=zkzj&" class="b12">更多&gt;</a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #b1c7d7;">
              <tr>
                <td><div class="rollBox">
  <a href="javascript:;" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" id="fdgfddf1" onmouseout="ISL_StopDown()" class="img1" hidefocus="true"></a>
       <div id="demoo" style="overflow:hidden;width:680px; float:left;">
  <table cellpadding="0" cellspacing="0" border="0">
  <tr><td id="demo1o" valign="top" align="center">
  <div class="Cont" id="ISL_Cont">
  <div class="ScrCont">

  <div id="List1">

          <?php
          $g_id = 10;
          $c_id = 18;
          $artRep = $repository('article');
          $articles = $artRep->getList($company['id'], $g_id, $c_id, 10, 'desc');
          ?>
          @foreach($articles as $key => $article)
  <!-- 图片列表 begin -->
          <div class="pic" ><table width="139" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><a href="?view=zkzj&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="111" height="143" /></a></td>
                </tr>
                <tr>
                  <td height="26" align="center"><a href="?view=zkzj&id={{$article['id']}}" class="blue14">{{str_limit($article['title'], $limit = 8, $end = '...')}}</a></td>
                </tr>
                <tr>
                  <td align="center"></td>
                </tr>
              </table></div>
            @endforeach
         <div class="pic" ><table width="139" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><a href="?view=zkzj&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="111" height="143" /></a></td>
                </tr>
                <tr>
                  <td height="26" align="center"><a href="?view=zkzj&id={{$article['id']}}" class="blue14">{{str_limit($article['title'], $limit = 8, $end = '...')}}</a></td>
                </tr>
                <tr>
                  <td align="center"></td>
                </tr>
              </table></div>

    <!-- 图片列表 end -->
  </div>
  <div id="List2"></div>
  </div>
               </div>
               </td>
<td id="demo2o" valign="top"></td>
</tr>
</table></div>
               <a href="javascript:;"  onmousedown="ISL_GoUp()"  id="fdgfddf2" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()" class="img2" hidefocus="true"></a>
               <script type="text/javascript">
var speed=1//速度数值越大速度越慢
var demo=document.getElementById("demoo");
var demo2=document.getElementById("demo2o");
var demo1=document.getElementById("demo1o");
demo2.innerHTML=demo1.innerHTML
function Marquee(){
if(demo2.offsetWidth-demo.scrollLeft<=0)
demo.scrollLeft-=demo1.offsetWidth
else{
demo.scrollLeft++
}
}
var MyMar=setInterval(Marquee,speed)
document.getElementById("fdgfddf1").onmouseover = function(){clearInterval(MyMar);demo1.innerHTML=1;}
document.getElementById("fdgfddf2").onmouseover = function(){clearInterval(MyMar);demo1.innerHTML=1;}
demo.onmouseover=function() {clearInterval(MyMar)}
demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
</script>
               </div>
               <script language="javascript" type="text/javascript">
               </script></td>
              </tr>
            </table></td>
        </tr>
      </table>


      <!-- <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="37"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="5%" align="center"><img src="/company/cmsa/img/biao.jpg" width="9" height="11" /></td>
              <td width="88%"><a href="/about/ehsz_47.html" class="r14b">中民金控投资有限公司</a></td>
              <td width="7%"><a href="/about/ehsz_47.html" class="b12">更多&gt;</a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #b1c7d7;">
              <tr>
                <td>
            <div class="nr001">
                 中民金控投资有限公司是中国民生研究院为落实国家发展战略设立的控股企业。经营范围主要有：企业并购、金融投资、投资管理咨询、资产管理和金融服务等。
 联系电话：010-68005797
 邮 箱：gpc@cmsa.org.cn            </div>


               </td>
              </tr>
            </table></td>
        </tr>
      </table> -->


      </td>
    <td>&nbsp;</td>
    <td width="210" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="26">&nbsp;</td>
      </tr>
      <tr>
        <td><img src="/company/cmsa/img/lmmc_yzzc.jpg" width="210" height="30" /></td>
      </tr>
      <tr>
        <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="14" class="bk4">
          <tr>
            <td valign="top"><div style="height:200px; overflow:hidden">&nbsp;&nbsp;&nbsp;

{{strip_tags($articleR->get(34)['context'])}}
 </div> <a href="?view=zkgk&" class="blue12">[详细]</a></td>

          </tr>
        </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>
          <td width="78%" height="38"><img src="/company/cmsa/img/lmmc_ldgh.jpg" height="33" /></td>
         <td width="22%"><a href="?view=zkjl&" class="b12">更多&gt;</a></td>
        </tr>
        <tr>
          <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="14" class="bk3">
              <tr>
                <td valign="top">
                  <ul class="ul1">
                      <?php
                      $g_id = 13;
                      $c_id = 0;
                      $artRep = $repository('article');
                      $articles = $artRep->getList($company['id'], $g_id, $c_id, 9, 'desc');
                      ?>
                      @foreach($articles as $key => $article)

   <li><a href='?view=zkjl&id={{$article['id']}}' class='b12'>{{str_limit($article['title'], $limit = 24, $end = '...')}}</a></li>
   @endforeach
                     </ul></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="40"><img src="/company/cmsa/img/wyls.jpg" height="33" /></td>
         <td width="22%"><a href="?view=msdt&" class="b12">更多&gt;</a></td>
        </tr>
        <tr>
          <td colspan="2" valign="top"><table width="100%" height="209" border="0" cellpadding="0" cellspacing="14" class="bk3">
            <tr>
              <td valign="top"><ul class="ul1">
                  <?php
                  $g_id = 16;
                  $c_id = 24;
                  $artRep = $repository('article');
                  $articles = $artRep->getList($company['id'], $g_id, $c_id, 9, 'desc');
                  ?>
                  @foreach($articles as $key => $article)

                <li><a href='?view=msdt&id={{$article['id']}}' class='b12'>{{str_limit($article['title'], $limit = 24, $end = '...')}}</a></li>
                @endforeach

    </ul></td>
            </tr>
          </table></td>
        </tr>
      </table>
      </td>
  </tr>
</table>

<?php include $view . "/bottom.blade.php"?>
