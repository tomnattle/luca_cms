<?php include $view . "/top.blade.php"?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="bg2">
  <tr>
    <td align="center"><table width="958" border="0" cellpadding="0" cellspacing="0" style="background-image: url(/images/10.jpg);background-repeat: no-repeat;background-position: top;">
      <tr>
        <td align="center"><table width="832" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="72" valign="top"><table width="100%" height="41" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="32%">&nbsp;</td>
                <td width="8%" class="b12b">当前位置：</td>
                <td width="74%" align="left"><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="20" align="center"><img src="/company/cmsa/img/biao5.jpg" width="4" height="7" /></td>
                    <td align="center"><a href="/" class="b12">首页</a></td>
                    <td width='20' align='center'><img src='/img/biao5.jpg' width='4' height='7' /></td><td align='center' class='r12'>联系我们</td>                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="45" align="left" valign="top"><table width="370" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="22"><img src="/company/cmsa/img/biao3.jpg" width="17" height="17" /></td>
                <td width="170" align="center" class="blue14b">联系我们</td>
                <td width="197" align="left"><img src="/company/cmsa/img/biao4.jpg" width="119" height="6" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left"><table width="832" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="832" style="line-height:20px; padding-top:10px;">
                
                <table width="829" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                    <!--<td height="30"><div align="center" class="STYLE3t"></div></td>-->
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td style="line-height:24px; padding:3px 50px 30px 70px;"><p align="center">
    <span style="font-size:14px;"><strong>民生智库</strong></span> 
</p>
<p align="center">
    <br />
</p>
<blockquote>
    <?php 
    $artRep = $repository('article');
    echo $artRep->get(40)['context'];
    ?>
</blockquote></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
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