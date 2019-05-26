<?php include $view . "/top.blade.php"?>
<?php
$g_id = 10;
$has_cat = false;
$artRep = $repository('article');
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
    <tr>
        <td align="center"><table width="958" border="0" cellpadding="0" cellspacing="0"  style="background-image: url(/images/3.jpg);background-repeat: no-repeat;
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
                                        <td align="center" class="r12">智库专家</td>
                                    </tr>
                                </table></td>
                            </tr>
                        </table></td>
                    </tr>
                    @if ($id == 0)
                    <tr>
                        <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                                <td align="center" class="blue14b">专家简介</td>
                                <td  align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
                            </tr>
                        </table></td>
                    </tr>
                    <tr>
                        <td align="left"><BLOCKQUOTE style="MARGIN-RIGHT: 0px" dir=ltr>
                            <P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp;&nbsp; 民生智库在致力于民生问题研究的同时，应各级党政机关要求，长期承担着部分地方党政干部的培训任务。特邀研究员为培训课程骨干师资，主要来自三个方面：为中央政治局集体学习授课的专家学者、中央重要文件起草人以及在长期的培训过程中受到学员们一致好评的授课人。多年来，特邀研究员们秉持强烈的社会责任感和社会公益心，不辞辛劳，无私奉献，为培训工作呕心沥血，为各地区经济社会发展献计献策，得到了受训党政干部的一致好评。</FONT></P></BLOCKQUOTE></td>
                        </tr>
                        <tr>
                            <td height="50">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                                    <td width="120" align="center" class="blue14b">学术委员会</td>
                                    <td align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
                                </tr>
                            </table></td>
                        </tr>
                        <tr>
                            <table width="832" border="0" cellspacing="0" cellpadding="0">
                                <td width="832" height="35" align="center" bgcolor="#dfe9f1" class="blue14b">主任</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" colspan="2">
                                <?php
                                $c_id = 17;
                                $articles = $artRep->getList($company['id'], $g_id, $c_id, 100);
                                ?>
                                @foreach($articles as $key => $article)
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center"><table width="149" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center"><a href="?view=zkzj&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="149" height="192" /></a></td>
                                            </tr>
                                            <tr>
                                                <td align="center" bgcolor="#e0e6f2"><a href="?view=zkzj&id={{$article['id']}}"  class="blue14">
                                                    {{$article['title']}}</a></td>
                                            </tr>
                                            <tr>
                                                <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;">
                                                    <?php
                                                      $ext = json_decode($article['extra'], 1);
                                                      if(isset($ext['sub-title']))
                                                        echo $ext['sub-title'];
                                                    ?></div></td>
                                            </tr>
                                        </table></td>
                                    </tr>
                                </table>
                                @endforeach


                                <tr>
                                    <table width="832" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="45" align="center"></td>
                                        </tr>                <td width="832" height="35" align="center" bgcolor="#dfe9f1" class="blue14b">副主任（以姓氏笔画排序）</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" colspan="2">

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <?php
                                            $c_id = 18;
                                            $articles = $artRep->getList($company['id'], $g_id, $c_id, 100);
                                            ?>
                                            <tr>
                                            @foreach($articles as $key => $article)
                                            @if($key % 5 ==0)
                                            </tr>
                                            @endif
                                                <td align="left">
                                                    <table width="149" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:15px">
                                                        <tr>
                                                            <td align="center"><a href="?view=zkzj&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="149" height="192" /></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" bgcolor="#e0e6f2"><a href="?view=zkzj&id={{$article['id']}}"  class="blue14">{{$article['title']}}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;">
                                                                <?php
                                                                  $ext = json_decode($article['extra'], 1);
                                                                  if(isset($ext['sub-title']))
                                                                    echo $ext['sub-title'];
                                                                ?></div></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            @endforeach
                                            </tr>
                                        </table>


                                            <tr>
                                                <table width="832" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td height="45" align="center"></td>
                                                    </tr>                <td width="832" height="35" align="center" bgcolor="#dfe9f1" class="blue14b">秘书长</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" valign="top" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center">
                                                                <?php
                                                                $c_id = 19;
                                                                $articles = $artRep->getList($company['id'], $g_id, $c_id, 100);
                                                                ?>
                                                                @foreach($articles as $key => $article)
                                                                <table width="149" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td align="center"><a href="?view=zkzj&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="149" height="192" /></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" bgcolor="#e0e6f2"><a href="?view=zkzj&id={{$article['id']}}"  class="blue14">{{$article['title']}}</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;"><?php
                                                                      $ext = json_decode($article['extra'], 1);
                                                                      if(isset($ext['sub-title']))
                                                                        echo $ext['sub-title'];
                                                                    ?></div></td>
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
                                                            </tr>             <td width="832" height="35" align="center" colspan="2" bgcolor="#dfe9f1" class="blue14b" style="position:relative">学术委员会委员（以姓氏笔画排序）<!--<a href="/moreinfo/ehsz_26.html"  style="position:absolute; left:773px; font-size:12px; color:#000; text-decoration:none; font-weight:normal;">更多</a>--></td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="top" colspan="2">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <?php
                                                                $c_id = 20;
                                                                $articles = $artRep->getList($company['id'], $g_id, $c_id, 100);
                                                                ?>
                                                                <tr>
                                                                @foreach($articles as $key => $article)
                                                                @if($key % 5 ==0)
                                                                </tr>
                                                                @endif
                                                                    <td align="left">
                                                                        <table width="149" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:15px">
                                                                            <tr>
                                                                                <td align="center"><a href="?view=zkzj&id={{$article['id']}}"><img src="{{url('storage/' . $article['cover'])}}" width="149" height="192" /></a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center" bgcolor="#e0e6f2"><a href="?view=zkzj&id={{$article['id']}}"  class="blue14">{{$article['title']}}</a></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center" bgcolor="#e0e6f2" height="42"><div style="height:42px;overflow:hidden;">
                                                                                    <?php
                                                                                      $ext = json_decode($article['extra'], 1);
                                                                                      if(isset($ext['sub-title']))
                                                                                        echo $ext['sub-title'];
                                                                                    ?></div></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                @endforeach
                                                            </table>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                </tr>
                                                            </table>



                                                        </tr>
                                                        <tr>
                                                            <td height="35">
                                                            </td>
                                                        </tr>
                                                    </table>
@else
<tr>
    <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
            <td width="88" align="center" class="blue14b">智库专家</td>
            <td width="149" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
        </tr>
    </table></td>
</tr>
<tr>
    <td align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <?php
                    $article = $artRep->get($id);
                    ?>
                    <table width="829" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="30">
                                <div align="center">
                                    <img src="{{url('storage/' . $article['cover'])}}" onload=javascript:DrawImage(this,900,600); name="bigpic" id="bigpic"  style="padding:11px; border:1px solid #e9e9e9" /></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="30"><div align="center" class="STYLE3t">{{$article['title']}}</div></td>
                        </tr>
                        <tr>
                            <td height="30" align=center><b><?php
                              $ext = json_decode($article['extra'], 1);
                              if(isset($ext['sub-title']))
                                echo $ext['sub-title'];
                            ?></b></td>
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

                </td>
            </tr>
        </table>
    </td>
</tr>
@endif

                    <table width="958" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="1" bgcolor="#bfd4e6"></td>
                        </tr>
                    </table></td>
                </tr>
            </table>

            <?php include $view . "/bottom.blade.php"?>
