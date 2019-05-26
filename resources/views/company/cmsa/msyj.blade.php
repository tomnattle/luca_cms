<?php include $view . "/top.blade.php"?>
<?php
$g_id = 12;
$has_cat = false;
$artRep = $repository('article');
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
    <tr>
        <td align="center" valign="top"><table width="958" border="0" cellpadding="0" cellspacing="0" class="bg_xsyj">
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
                                        <td align="center" class="r12">民生研究</td>
                                    </tr>
                                </table></td>
                            </tr>
                        </table></td>
                    </tr>
                    @if($id == 0)
                    <tr>
                        <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                                <td width="88" align="center" class="blue14b">研究概况</td>
                                <td width="149" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
                            </tr>
                        </table></td>
                    </tr>
                    <tr>
                        <td align="left"><BLOCKQUOTE style="MARGIN-RIGHT: 0px" dir=ltr>
                            <P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp;&nbsp; 近年来，党和政府越来越重视改善民生问题，尤其是党的十八大明确提出了改善民生的目标。根据国家形势发展的要求，我院加大了对民生问题的研究，在保留原有核心专家的同时又吸纳了一批优秀的中青年学者，为国家经济、社会、科技、民生等领域的发展进一步提供新思路和理论研究。</FONT></P>
                            <P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp;&nbsp; 作为长期致力于改善民生工作的研究机构，民生智库以马列主义、毛泽东思想、邓小平理论、“三个代表”重要思想和科学发展观为指导，深入贯彻党的十八大精神，以服务民生、研究民生、改善民生为主线，以项目为载体、以资源为纽带、以服务为宗旨，不断优化资源配置方式，深化各方合作层次，切切实实地将民生研究工作落到实处。</FONT></P></BLOCKQUOTE></td>
                        </tr>
                        <tr>
                            <td height="50" align="left">&nbsp;</td>
                        </tr>

                        <tr>
                            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                                    <td width="88" align="center" class="blue14b">推荐学者</td>
                                    <td width="190" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                            <td align="left"></td>
                        </tr>
                        <tr>
                            <td height="50" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><div class="rollBox"> <a href="javascript:;" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()" class="img1" hidefocus="true"></a>
                                        <div class="Cont" id="ISL_Cont">
                                            <div class="ScrCont">
                                                <div id="List1">
                                                    <!-- 图片列表 begin -->
                                                    <?php
                                                    $c_id = 0;
                                                    $articles = $artRep->getList($company['id'], 10, 18,  10);
                                                    ?>
                                                    @foreach($articles as $key => $article)
                                                    <div class="pic" >
                                                        <table width="139" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="center"><a href="?view=zkzj&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="111" height="143" /></a></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="26" align="center"><a href="?view=zkzj&id={{$article['id']}}" class="blue14">{{str_limit($article['title'], $limit = 6, $end = '...')}}</a></td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    @endforeach
                                                    <!-- 图片列表 end -->
                                                </div>
                                                <div id="List2"></div>
                                            </div>
                                        </div>
                                        <a href="javascript:;"  onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()" class="img2" hidefocus="true"></a> </div></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="50" align="left"><img src="/company/cmsa/img/bg3.jpg" width="832" height="51" /></td>
                        </tr>
                        @endif

                    </table>
                    <table width="832" border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                                    <td width="88" align="center" class="blue14b">学术文章</td>
                                    <td width="190" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                @if($id == 0)
                                <?php
                                $c_id = 0;
                                $articles = $artRep->getList($company['id'], $g_id, $c_id, 4, 'desc');
                                ?>
                                @foreach($articles as $key => $article)
                                <table width="100%" border="0" cellpadding="0" cellspacing="20" class="bk7">
                                    <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="67"><a href="?view=msyj&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="67" height="83" /></a></td>
                                                <td width="21">&nbsp;</td>
                                                <td width="704" align="left" valign="top"><a href="?view=msyj&id={{$article['id']}}" class="blue14">{{$article['title']}}</a><br />
                                                </td>
                                            </tr>
                                        </table></td>
                                    </tr>
                                </table>
                                @endforeach
                                <table width="832" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center" valign="top">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="45" align="center"><div style="text-align:center; width:100%; font-size:14px; height:22px; padding:22px;">
                                            <?php
                                            $articles->appends(['view' => request('view')]);
                                            ?>
                                            {!! $articles->links() !!}
                                        </div></td>
                                    </tr>
                                </table>
                                @else
                                <?php
                                $article = $artRep->get($id);
                                ?>
                                <table width="832" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="832" style="line-height:20px; padding-top:10px;"><table width="829" border="0" cellspacing="0" cellpadding="0">
                                            
                                            <tr>
                                                <td height="30">
                                                    <div align="center">
                                                        <img src="{{url('storage/' . $article['cover'])}}" tppabs="http://www.cmsa.org.cn/upimage/kkR0hETBDr.jpg" onload=javascript:DrawImage(this,900,600); name="bigpic" id="bigpic"  style="padding:11px; border:1px solid #e9e9e9" /></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="30"><div align="center" class="STYLE3t">{{$article['title']}}</div></td>
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
                                        </table>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="45" align="center"></div> </td>
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
