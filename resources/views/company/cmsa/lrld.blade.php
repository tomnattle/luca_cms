<?php include $view . "/top.blade.php"?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
  <tr>
    <td align="center"><table width="958" border="0" cellpadding="0" cellspacing="0" style="background-image: url(/images/99.jpg);background-repeat: no-repeat;background-position: top;">
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
                    <td width='20' align='center'><img src='/img/biao5.jpg' width='4' height='7' /></td><td align='center' class='r12'>历任领导</td>                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="45" align="left" valign="top"><table width="350" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td align="center" class="blue14b">历任领导</td>
                <td align="left"><img src="/company/cmsa/img/biao4.jpg" width="80" height="6" /></td>
              </tr>
            </table></td>
          </tr>

          <tr>
            <td align="left"><table width="832" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="832" style="line-height:20px; padding-top:10px;">
                  <div class="main">
  <?php
  $g_id = 8;
  $c_id = 0;
  $articleR = $repository('article');
  $articles = $articleR->getList($company['id'], $g_id, $c_id, 15);
  ?>
  @foreach($articles as $article)
    <div class="leaders">
      <div class="leaders_main">
        <div class="leaders_main_picture4">
          <img src="{{url('storage/' . $article['cover'])}}" alt="" />
        </div>
        <div class="leaders_main_font">
          <div class="font_header">
            <span>{{$article['title']}}</span>
          </div>
          <div class="font_main">
            <p>{!! htmlspecialchars_decode($article['context'])!!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach


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
<style>
body,h1,h2,h3,p,span,div,ul,li{
	margin: 0;
	padding: 0;
}
a{
	text-decoration: none;
	color: #000;
}
body{
	font-size: 12px;
	font-family: "宋体";
}
.main{
	margin: auto auto 20px auto;
	display: table;
}
.title{
	margin: 30px 0 0 0;
	text-align: left;
	font-size: 18px;
}
.leaders_main_picture{
	float: left;
	margin-right: 10px;
}
.leaders_main_picture img{
	width: 120px;
}
.leaders_main_picture2{
	float: left;
	margin-right: 10px;
}
.leaders_main_picture2 img{
	width: 120px;
}
.leaders_main_picture3{
	float: left;
	margin-right: 10px;
}
.leaders_main_picture3 img{
	width: 120px;
}
.leaders_main_picture4{
	float: left;
	margin-right: 10px;
}
.leaders_main_picture4 img{
	width: 120px;
}
.font_header{
	margin-bottom: 10px;
}
.font_header span{
	margin-right: 30px;
	font-size: 18px;
	font-family: "微软雅黑";
}
.font_main{
	text-indent: 2em;
	word-break:break-all;
	line-height: 22px;
}
.leaders_main_font{
	width: 670px;
	float: left;
	margin-left: 30px;
}
.leaders_main{
	display: table;
	margin-top: 40px;
}
.leaders{
	padding-bottom: 40px;
	border-bottom: 1px dashed #000;
}
</style>
<?php include $view . "/bottom.blade.php"?>
