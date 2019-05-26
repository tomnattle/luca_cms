<?php include $view . "/top.blade.php"?>
<?php
$g_id = 9;
$has_cat = false;
$artRep = $repository('article');
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
    <tr>
        <td align="center" valign="top"><table width="958" border="0" cellpadding="0" cellspacing="0" class="bg_ldgh">
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
                                        <td align="center" class="r12">智库交流</td>
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
                                <td width="88" align="center" class="blue14b">支持鼓励</td>
                                <td width="149" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
                            </tr>
                        </table></td>
                    </tr>
                    <tr>
                        <td align="left"><BLOCKQUOTE style="MARGIN-RIGHT: 0px" dir=ltr>
                            <P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp;&nbsp; 民生智库的孕育诞生、成长发展是中央高层领导人、理论界以及社会各界知名人士关心关怀、支持鼓励的成果。成立以来，民生智库始终与党中央保持高度一致，积极及时地将党和国家在新时期新阶段的方针、政策传达贯彻到地区经济社会发展实践中，并将地方民生问题研究成果及时汇报给有关部门，为高层决策提供理论和实践依据，为各地经济、政治、文化和社会建设提供了政策帮助和发展平台。</FONT><A name=_GoBack></A><FONT size=3>党和国家领导人以及各级党政部门领导对智库的成绩给予充分肯定，对研究院在未来一个时期的发展表示关注，并对研究院的前景寄予殷切期望。同时，鼓励民生智库坚持以“研究民生，服务民生，改善民生”为宗旨，在社会主义现代化建设事业中当好领导的参谋助手，勇挑重担，不辱使命，实现科学发展。</FONT></P></BLOCKQUOTE>
                            <P align=center><FONT size=3></FONT></P></td>
                        </tr>
                        <tr>
                            <td height="50" align="left">&nbsp;</td>
                        </tr>
                        @endif
                        <tr>
                            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                                    <td width="88" align="center" class="blue14b">精彩记录</td>
                                    <td width="190" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                            <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        @if($id > 0)
                                        <?php
                                        $article = $artRep->get($id);
                                        ?>
                                        <table width="832" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="832" style="line-height:20px; padding-top:10px;"><table width="829" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td height="30"><div align="center" class="STYLE3t">{{$article['title']}}</div></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="30">
                                                            <div align="center">
                                                                <img src="{{url('storage/' . $article['cover'])}}" onload=javascript:DrawImage(this,900,600); name="bigpic" id="bigpic"  style="padding:11px; border:1px solid #e9e9e9" /></div>
                                                            </div>
                                                        </td>
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
                                                @else
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <?php
                                                    $g_id = 13;
                                                    $c_id = 0;
                                                    $articles = $artRep->getList($company['id'], $g_id, $c_id, 15);
                                                    ?>
                                                    <tr>
                                                    @foreach($articles as $key => $article)
                                                    @if($key % 3 ==0)
                                                    </tr>
                                                    @endif
                                                        <td align="left">
                                                        <table width="149" border="0" cellspacing="0" style="margin-bottom:15px;" cellpadding="0">
                                                            <tr>
                                                                <td align="center"><a href="?view=zkjl&id={{$article['id']}}" ><img src="{{url('storage/' . $article['cover'])}}" width="263" height="179" /></a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" bgcolor="#e0e6f2"><table width="100%" border="0" cellspacing="10" cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" HEIGHT="43"><a href="?view=zkjl&id={{$article['id']}}" class="blue12">{{str_limit($article['title'], $limit = 76, $end = '...')}}</a></td>
                                                                    </tr>
                                                                </table></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    @endforeach
                                                </table>
                                                @endif
                                            </td>
                                        </tr>
                                    </table></td>
                                </tr>
                            </table>
                            @if($id == 0)
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
                            @endif
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
<style>
ul {list-style-type: none; list-style: none;}
li {float: left;list-style-type: none; list-style: none;}
</style>
        <?php include $view . "/bottom.blade.php"?>
