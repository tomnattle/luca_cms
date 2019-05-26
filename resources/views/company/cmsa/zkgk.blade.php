<?php include $view . "/top.blade.php"?>
<?php $artRep = $repository('article');?>
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
                                        <td align="center"><a href="/" class="b12">首页</a></td>
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
                            <P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp;  
                             {!! htmlspecialchars_decode($artRep->get(34)['context'])!!}</td>
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

                                        <?php
                                        $g_id = 7;
                                        $c_id = 9;
                                        
                                        $articles = $artRep->getList($company['id'], $g_id, $c_id, 30);
                                        ?>
                                        @foreach($articles as $article)
                                        <div class="col">
                                            <table width="416" border="0" style="margin-bottom:15px;" cellpadding="0" cellspacing="0" class="bk6">
                                                <tr>
                                                    <td width="149"><a href="?view=detail&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="149" height="192" /></a></td>
                                                    <td valign="top"><table width="100%" border="0" cellspacing="15" cellpadding="0">
                                                        <tr>
                                                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td height="30" align="left"><a href="?view=detail&id={{$article['id']}}" class="b14" style="font-family:'宋体'; font-weight:bold;">{{$article['title']}}</a> <span class="blue142">
                                                                        <?php
                                                                        $ext = json_decode($article['extra'], 1);
                                                                        if(isset($ext['sub-title']))
                                                                        echo $ext['sub-title'];
                                                                        ?>
                                                                    </span></td>
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

                                                        <td align="center">
                                                            <?php
                                                            $g_id = 7;
                                                            $c_id = 21;
                                                            $artRep = $repository('article');
                                                            $articles = $artRep->getList($company['id'], $g_id, $c_id, 30);
                                                            ?>
                                                            @foreach($articles as $article)
                                                            <table width="149" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="center"><a href="?view=detail&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" /></a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" bgcolor="#e0e6f2"><a href="?view=detail&id={{$article['id']}}"  class="blue14">{{$article['title']}}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" bgcolor="#e0e6f2" height="42">
                                                                    <div style="height:42px;overflow:hidden;"><?php
                                                                $ext = json_decode($article['extra'], 1);
                                                                if(isset($ext['sub-title']))
                                                                echo $ext['sub-title'];
                                                                ?> <a href="?view=detail&id={{$article['id']}}" class="blue12">[详细]</a></div></td>
                                                            </tr>
                                                        </table>
                                                            @endforeach
                                                    </td>
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
                                                        <td align="center" valign="top" colspan="2">
                                                            <?php
                                                            $g_id = 7;
                                                            $c_id = 22;
                                                            $artRep = $repository('article');
                                                            $articles = $artRep->getList($company['id'], $g_id, $c_id, 30);
                                                            ?>
                                                            @foreach($articles as $article)
                                                            <table width="149" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="center"><a href="?view=detail&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" /></a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" bgcolor="#e0e6f2"><a href="?view=detail&id={{$article['id']}}"  class="blue14">{{$article['title']}}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" bgcolor="#e0e6f2" height="42">
                                                                    <div style="height:42px;overflow:hidden;"><?php
                                                                $ext = json_decode($article['extra'], 1);
                                                                if(isset($ext['sub-title']))
                                                                echo $ext['sub-title'];
                                                                ?> <a href="?view=detail&id={{$article['id']}}" class="blue12">[详细]</a></div></td>
                                                            </tr>
                                                        </table>
                                                            @endforeach


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

                                                                        <?php
                                                                        $g_id = 7;
                                                                        $c_id = 23;
                                                                        $artRep = $repository('article');
                                                                        $articles = $artRep->getList($company['id'], $g_id, $c_id, 30);
                                                                        ?>
                                                                        @foreach($articles as $article)
                                                                        <td align="center" ><table width="149" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td align="center"><a href="?view=detail&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="149" height="192" /></a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center" bgcolor="#e0e6f2"><a href="?view=detail&id={{$article['id']}}"  class="blue14">{{$article['title']}}</a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;"><?php
                                                                            $ext = json_decode($article['extra'], 1);
                                                                            if(isset($ext['sub-title']))
                                                                            echo $ext['sub-title'];
                                                                            ?></div></td>
                                                                            </tr>
                                                                        </table></td>
                                                                        @endforeach
                                                                        </tr>
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
                                                                        <td align="left"><P align=center>{!! htmlspecialchars_decode($artRep->get(2478)['context'])!!}</P></td>
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
