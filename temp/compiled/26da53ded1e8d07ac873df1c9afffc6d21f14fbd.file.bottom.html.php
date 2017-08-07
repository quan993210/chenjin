<?php /* Smarty version Smarty-3.0.6, created on 2017-08-07 21:58:14
         compiled from "E:/xiangmu/phpstudy/WWW/chenjin/temp/default\common/bottom.html" */ ?>
<?php /*%%SmartyHeaderCode:13625598871f656d8b2-37072225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26da53ded1e8d07ac873df1c9afffc6d21f14fbd' => 
    array (
      0 => 'E:/xiangmu/phpstudy/WWW/chenjin/temp/default\\common/bottom.html',
      1 => 1497251036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13625598871f656d8b2-37072225',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!--footer-->
<div class="footer <?php if ($_smarty_tpl->getVariable('menu')->value!='index'){?>footer2<?php }?>">
  <div class="container">
    <div class="footerTop">
      <div class="footerLogo left"> <a title="南昌微信小程序开发,南昌市辰锦网络科技有限公司" href="http://www.chenjin.cc"><img src="/images/footerlogo.jpg"></a> </div>
      <div class="lx left">
        <p class="wf">关于辰锦</p>
        <ul>
          <li> <a href="http://www.chenjin.cc" title="南昌微信小程序开发、APP开发首页"> 网站首页 </a>
          </li>
          <li> <a href="/about/" title="南昌微信小程序、APP开发团队介绍"> 关于我们 </a>
          </li>
          <li> <a href="/case/" title="南昌微信小程序、APP品牌案例"> 品牌案例 </a>
          </li>
          <li> <a href="http://wangzhankf.com" title="南昌网站开发"> 网站开发 </a>
          </li>
        </ul>
      </div>
      <div class="qq-zx left">
        <p class="wf">联系我们</p>
        <p style="margin-bottom:3px">QQ:250686110</p>
        <p class="qq2"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=250686110&amp;site=qq&amp;menu=yes"></a></p>
        <p style="margin-bottom:3px">QQ:578210654</p>
        <p class="qq1"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=578210654&amp;site=qq&amp;menu=yes"></a></p>
      </div>
      <div class="tell right">
        <div class="tel"> <img src="/images/tel.jpg" alt="南昌APP开发电话:4006631655"> </div>
        <p style="text-align:right;margin-bottom:8px;">地址：南昌市北京东路东方银座1单元2104室</p>
        <p style="padding-left:38px;">邮箱：jnknet@126.com</p>
      </div>
    </div>
    <div class="yqlj" style="line-height:25px;"> 
    <b>友情链接</b>&nbsp;&nbsp; 
    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('link')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
    <a href="<?php echo $_smarty_tpl->getVariable('link')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['url'];?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('link')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
</a>&nbsp;&nbsp; 
    <?php endfor; endif; ?>
    </div>
    <div id="copy"><span class="copy">COPYRIGHT © 2012-2016 <a href="http://www.chenjin.cc">辰锦科技</a>. All Rights Reserved. 版权所有<a target="_blank" href="http://www.miitbeian.gov.cn/">赣ICP备12005825号-1</a>  &nbsp;</span></div>
  </div>
  <div class="clear"></div>
  <div id="static_Login">
    <div class="qrcodeBox">
      <div class="qrcodeCom"><a class="zx" href="javascript:void(0);"><img src="/images/qd.png"></a></div>
      <div class="qrcodeCom"><a class="manq" target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=250686110&amp;site=qq&amp;menu=yes"></a></div>
      <div class="qrcodeCom"><a class="feq" target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=578210654&amp;site=qq&amp;menu=yes"></a></div>
      <div class="qrcodeCom">
        <p id="del"  onclick="document.getElementById('static_Login').style.display='none';jQuery('#footerN').css('marginBottom',0);jQuery('.footer').css('height',350)"></p>
      </div>
    </div>
  </div>
</div>
<!--/footer-->
