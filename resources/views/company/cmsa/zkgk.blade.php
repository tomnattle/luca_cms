<?php include $view . "/top.blade.php"?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
  <tr>
    <td align="center"><table width="958" border="0" cellpadding="0" cellspacing="0"  style="background-image: url(/images/2.jpg);background-repeat: no-repeat;
background-position: top;">
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
                      <td align="center"><a href="/index.html" class="b12">首页</a></td>
                      <td width="20" align="center"><img src="/company/cmsa/img/biao5.jpg" width="4" height="7" /></td>
                      <td align="center" class="r12">智库概况</td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        <tr>
        <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td align="center" class="blue14b">智库概况</td>
                <td  align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
              </tr>
            </table></td>



          </tr>
          <tr>
            <td align="left"><BLOCKQUOTE style="MARGIN-RIGHT: 0px" dir=ltr>
<P style="LINE-HEIGHT: 2"><FONT size=3></FONT>&nbsp;</P>
<P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp; 为贯彻落实中办、国办《关于加强中国特色新型智库建设的意见》，以建设“专业化高端智库”为目标，在中国民生研究院的基础上组建民生智库。</FONT></P>
<P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp;&nbsp;期待更多有志于民生问题研究的专家学者共同参与。</FONT></P>
<P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <IMG border=0 src="/company/cmsa/http://www.cmsa.org.cn/ehszzhizuoyl/uploadfile/201604/20160410132531648.jpg"></FONT></P></BLOCKQUOTE></td>
          </tr>
          <tr>
            <td height="50">&nbsp;</td>
          </tr>
                      <tr>
              <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                  <td width="120" align="center" class="blue14b">智库领导</td>
                  <td align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
                </tr>
              </table></td>
            </tr>
<tr>
<table width="832" border="0" cellspacing="0" cellpadding="0">
                <td width="832" height="35" align="center" bgcolor="#dfe9f1" class="blue14b">高级顾问（以姓氏笔画排序）</td>
                      </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top" colspan="2">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>

            <?php

            $g_id = 7;
            $c_id = 9;
            $artRep = $repository('article');
            $articles = $artRep->getList($company['id'], $g_id, $c_id, $page = 1, $page_num = 15);
            ?>

            @foreach($articles as $article)
            <div class="col">
            <table width="416" border="0" cellpadding="0" cellspacing="0" class="bk6">
              <tr>
                <td width="149"><a href="/shownews/ehsz_2477.html"><img src="{{url('storage/' . $article['cover'])}}" width="149" height="192" /></a></td>
                <td valign="top"><table width="100%" border="0" cellspacing="15" cellpadding="0">
                  <tr>
                    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" align="left"><a href="/shownews/ehsz_2477.html" class="b14" style="font-family:'宋体'; font-weight:bold;">{{$article['title']}}</a> <span class="blue142">国防大学战略教研部原副主任国际战略研究所所长、少将</span></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;{{str_limit(strip_tags($article['context']), 150)}}<a href="/company/home?view=detail&id={{$article['id']}}" class="blue12">[更多]</a></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            </div>
            @endforeach
            <div style="clear:both"></div>
            <style>
            .col{ width: 50%; float: left;}
            </style>


                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
    </tr>
    </table>


<tr>
<table width="832" border="0" cellspacing="0" cellpadding="0">
   <tr>
   <td height="45" align="center"></td>
  </tr>                <td width="832" height="35" align="center" bgcolor="#dfe9f1" class="blue14b">理事长</td>
                      </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>

   <td align="center"><table width="149" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center"><a href="/shownews/ehsz_2215.html"><img src="/company/cmsa/upimage/IoQ9Mfuied.jpg" /></a></td>
                          </tr>
                                                    <tr>
                            <td align="center" bgcolor="#e0e6f2"><a href="/shownews/ehsz_2215.html"  class="blue14">郭克莎</a></td>
                          </tr>
                          <tr>
                            <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;">中国社会科学院经济政策研究中心主任 <a href="/shownews/ehsz_2215.html" class="blue12">[详细]</a></div></td>
                          </tr>
                                                  </table></td>
    </tr>
    </table>


<tr>
<table width="832" border="0" cellspacing="0" cellpadding="0">
   <tr>
   <td height="45" align="center"></td>
  </tr>                <td width="832" height="35" align="center" bgcolor="#dfe9f1" class="blue14b">执行理事长兼秘书长</td>
                      </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>

   <td align="center"><table width="149" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center"><a href="/shownews/ehsz_60.html"><img src="/company/cmsa/upimage/0ASbm1fPyx.jpg" /></a></td>
                          </tr>
                                                    <tr>
                            <td align="center" bgcolor="#e0e6f2"><a href="/shownews/ehsz_60.html"  class="blue14">李小宁</a></td>
                          </tr>
                          <tr>
                            <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;"></div></td>
                          </tr>
                                                  </table></td>
    </tr>
    </table>


<tr>
<table width="832" border="0" cellspacing="0" cellpadding="0">
   <tr>
   <td height="45" align="center"></td>
  </tr>                <td width="832" height="35" align="center" bgcolor="#dfe9f1" class="blue14b">副秘书长</td>
                      </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
<td align='left' width='260'></td>   <td align="left"><table width="149" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center"><a href="/shownews/ehsz_2240.html"><img src="/company/cmsa/upimage/yo8mvX9HYs.jpg" width="149" height="192" /></a></td>
                          </tr>
                          <tr>
                            <td align="center" bgcolor="#e0e6f2"><a href="/shownews/ehsz_2240.html"  class="blue14">刘树桂</a></td>
                          </tr>
                          <tr>
                            <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;">副秘书长</div></td>
                          </tr>
                        </table></td>

   <td align="left"><table width="149" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center"><a href="/shownews/ehsz_2241.html"><img src="/company/cmsa/upimage/rYfPiyLW7l.jpg" width="149" height="192" /></a></td>
                          </tr>
                          <tr>
                            <td align="center" bgcolor="#e0e6f2"><a href="/shownews/ehsz_2241.html"  class="blue14">穆秀芳</a></td>
                          </tr>
                          <tr>
                            <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;">秘书长助理</div></td>
                          </tr>
                        </table></td>

<td align='left' width='230'></td> </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
    </tr>
    </table>


     <tr>
        <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td align="center" class="blue14b">智库概况</td>
                <td  align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
              </tr>
            </table></td>



          </tr>
          <tr>
            <td align="left"><P align=center><IMG border=0 src="/company/cmsa/ehszzhizuoyl/uploadfile/201608/20160802093450461.jpg"></P></td>
          </tr>
          <tr>
            <td height="50">&nbsp;</td>
          </tr>

      </tr>
       <tr>
              <td height="35">
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
