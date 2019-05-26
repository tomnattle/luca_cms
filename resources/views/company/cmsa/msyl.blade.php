<?php include $view . "/top.blade.php"?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
  <tr>
    <td align="center" valign="top"><table width="958" border="0" cellpadding="0" cellspacing="0" class="bg_msyy">
      <tr>
        <td align="center" valign="top"><table width="832" border="0" cellspacing="0" cellpadding="0">
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
                      <td align="center" class="r12">民生语录</td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td width="30" align="center" class="blue14b">民生</td>
                <td width="149" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><BLOCKQUOTE style="MARGIN-RIGHT: 0px" dir=ltr>
<P style="LINE-HEIGHT: 2"><FONT size=3>&#160;&#160;&#160; “民生”一词最早见于《左传·宣公十二年》：“民生在勤，勤则不匮。”《辞海》对“民生”的解释是“人民的生计”，《汉语大词典》对“民生”的解释是“民众的生计、生活”。</FONT></P></BLOCKQUOTE></td>
          </tr>
          <tr>
            <td height="50" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td width="88" align="center" class="blue14b">名人语录</td>
                <td width="190" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="44%"><div>
<div class="tabmenu">
<ul>
 <li class='on' id='PARm0' onmouseover='PARMenu(0);'>中国古代</li>
<li class='out' id='PARm1' onmouseover='PARMenu(1);'>中国近现代</li>
<li class='out' id='PARm2' onmouseover='PARMenu(2);'>其他国家</li>
</ul>
</div></td>
    <td width="56%" style="border-bottom:1px solid #abc7de;">&nbsp;</td>
  </tr>
</table>
<div class="tabbox" style="clear:both">

<?php

$g_id = 14;
$c_id = 12;
$artRep = $repository('article');
$articles = $artRep->getList($company['id'], $g_id, $c_id, 100);
?>

<div id='content0' class='content0'>

@foreach($articles as $article)
 <table width="100%" border="0" cellpadding="0" cellspacing="20" class="bk7">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="67"><img src="{{$article['cover']}}" width="67" height="83" /></td>
                    <td width="21">&nbsp;</td>
                    <td width="704" valign="middle"><span class="STYLE5">{{$article['title']}}</span></td>
                  </tr>
                </table></td>
                </tr>
            </table>


@endforeach

</div><div id='content1' class='content1'  style='display: none;'>
<?php

$g_id = 14;
$c_id = 13;
$artRep = $repository('article');
$articles = $artRep->getList($company['id'], $g_id, $c_id, 100);
?>
  @foreach($articles as $article)
 <table width="100%" border="0" cellpadding="0" cellspacing="20" class="bk7">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="67"><img src="{{$article['cover']}}" width="67" height="83" /></td>
                    <td width="21">&nbsp;</td>
                    <td width="704" valign="middle"><span class="STYLE5">{{$article['title']}}</span></td>
                  </tr>
                </table></td>
                </tr>
            </table>


@endforeach

</div><div id='content2' class='content1'  style='display: none;'>
<?php

$g_id = 14;
$c_id = 14;
$artRep = $repository('article');
$articles = $artRep->getList($company['id'], $g_id, $c_id, 100);
?>
  @foreach($articles as $article)
 <table width="100%" border="0" cellpadding="0" cellspacing="20" class="bk7">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="67"><img src="{{$article['cover']}}" width="67" height="83" /></td>
                    <td width="21">&nbsp;</td>
                    <td width="704" valign="middle"><span class="STYLE5">{{$article['title']}}</span></td>
                  </tr>
                </table></td>
                </tr>
            </table>


@endforeach

  

</div></div><!--end tabbox-->
            
              <!--end tabmenu-->
          
</td>
          </tr>
          
          
        </table>
          <table width="832" border="0" cellspacing="0" cellpadding="0">
            
            <tr>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="45" align="center">&nbsp;</td>
            </tr>
          </table>          </td>
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
