<?php include $view . "/top.blade.php"?>
<?php
$g_id = 11;
$has_cat = false;
$artRep = $repository('article');
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
  <tr>
    <td align="center"><table width="958" border="0" cellpadding="0" cellspacing="0"  style="background-image: url(/images/4.jpg);background-repeat: no-repeat;
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
                      <td align="center" class="r12">民生大讲堂</td>
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
                <td align="center" class="blue14b">民生大讲堂</td>
                <td  align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><BLOCKQUOTE style="MARGIN-RIGHT: 0px" dir=ltr>
<P style="LINE-HEIGHT: 2"><FONT size=3>&nbsp;&nbsp;&nbsp; 建设马克思主义学习型政党，是党的十八届五中全会从全面推进中国特色社会主义伟大事业和党的建设新的伟大工程的全局出发，提出的一项重大战略任务。把各级党组织建设成为学习型党组织，是建设马克思主义学习型政党的基础工程。进入新阶段以来，党中央坚持把学习放在更加突出的位置，中央政治局带头坚持集体学习制度，各地普遍建立了党委中心组学习制度，有力推动了党的思想理论建设和党的事业的蓬勃发展，也推动了党的执政能力的提高和党的先进性的发展。为响应中央号召，并应各级党组织的要求，民生智库常年开办“民生大讲堂”，充分利用自身资源优势，在各地开展活动。大讲堂由民生智库主办，各地组织、宣传部门承办。授课内容涵盖现代化建设所需要的经济、政治、文化、科技、社会和国际等各方面知识，以及反映当代世界发展趋势的现代市场经济、现代国际关系、现代社会管理和现代信息技术等方面的知识。</FONT></P></BLOCKQUOTE></td>
          </tr>
          <tr>
            <td height="50">&nbsp;</td>
          </tr>
                   <tr>
            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td width="112" align="center" class="blue14b">近期讲堂动态</td>
                <td width="166" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left">
            <?php
            $c_id = 0;
            $articles = $artRep->getList($company['id'], $g_id, $c_id, 1, 'desc');
            ?>
            @foreach($articles as $key => $article)
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="bk6">
              <tr>
                <td width="149"><a href="?view=msjt&id={{$article['id']}}"><img src="/company/cmsa/upimage/R4xWTIfzJW.jpg" width="263" height="179" /></a></td>
                <td valign="top"><table width="100%" border="0" cellspacing="18" cellpadding="0">
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="30" align="left"><span class="b142"><a href="?view=msjt&id={{$article['id']}}"  class="b142">{{$article['title']}}</td>
                          </tr>
                          <tr>
                            <td align="left">
                            {!! htmlspecialchars_decode($article['context'])!!}
                        </td>
                        </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
            </table>
        @endforeach
        </td>
          </tr>
          @endif
           <tr>
              <td height="50">&nbsp;</td>
            </tr>
          <tr>
            <td height="45" align="left" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td width="88" align="center" class="blue14b">各地讲堂</td>
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
                            <td width="832" style="line-height:20px; padding-top:10px;">
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
                            @else
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <?php
                                $g_id = 11;
                                $c_id = 16;
                                $articles = $artRep->getList($company['id'], $g_id, $c_id, 12 , 'desc');
                                ?>
                                <tr>
                                @foreach($articles as $key => $article)
                                @if($key % 3 ==0)
                                </tr>
                                @endif
                                    <td align="left">
                                    <table width="149" border="0" cellspacing="0" style="margin-bottom:15px;" cellpadding="0">
                                        <tr>
                                            <td align="center"><a href="?view=msjt&id={{$article['id']}}" ><img src="{{url('storage/' . $article['cover'])}}" width="263" height="179" /></a></td>
                                        </tr>
                                        <tr>
                                            <td align="center" bgcolor="#e0e6f2"><table width="100%" border="0" cellspacing="10" cellpadding="0">
                                                <tr>
                                                    <td align="left" HEIGHT="43"><a href="?view=msjt&id={{$article['id']}}" class="blue12">{{str_limit($article['title'], $limit = 76, $end = '...')}}</a></td>
                                                </tr>
                                            </table></td>
                                        </tr>
                                    </table>
                                </td>
                                @endforeach
                            </table>
                            @endif
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30">&nbsp;</td>
                      </tr>
                    </table>

                    <table width="832" border="0" cellspacing="0" cellpadding="0">

            <tr>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="45" align="center">
                  <div style="text-align:center; font-size:14px; height:22px; padding:22px;">
                      @if($id == 0)
                      <?php
                      $articles->appends(['view' => request('view')]);
                      ?>
                      {!! $articles->links() !!}
                      @endif
              </div></td>
            </tr>
          </table>
</td>
              </tr>
            </table></td>
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
