<?php /* Smarty version Smarty-3.0.6, created on 2017-08-06 22:40:29
         compiled from "E:/xiangmu/phpstudy/WWW/chenjin/temp/default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:737159872a5d7f6067-84429416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '717a8520cc3b6dc4502ce2b75a1c87cc6cbfd581' => 
    array (
      0 => 'E:/xiangmu/phpstudy/WWW/chenjin/temp/default\\index.html',
      1 => 1497251042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '737159872a5d7f6067-84429416',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->getVariable('page_title')->value;?>
-南昌微信小程序开发,南昌APP制作开发,江西APP开发,南昌手机APP定制开发</title>
<meta name="keywords" content="南昌微信小程序开发,南昌APP制作开发,江西APP开发,南昌手机客户端开发">
<meta name="description" content="南昌市辰锦科技拥有专业的APP定制开发团队，拥有多年与国内知名公司丰富的成功合作经验，为客户提供微信小程序、APP定制开发，网站与移动客户端相结合的产品定制等。">
<link rel="stylesheet" type="text/css" href="/css/base.css" />
<link rel="stylesheet" type="text/css" href="/css/qh.css"/>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<script src="/js/jquery.js" type="text/javascript"></script> 
<script src="/js/common.js" type="text/javascript"></script> 
<script src="/js/jquery.lazyload.js" type="text/javascript"></script> 
<script src="/js/jquery.easing.1.3.js" type="text/javascript"></script> 
<script src="/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
</head>
<body>
<!--wrapper-->
<div class="wrapper"> 
  <?php $_template = new Smarty_Internal_Template('common/top.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> 
  <!--page_stage_1-->
  <div id="page_stage_1" class="page-stage-1"> 
    <!--container-->
    <div class="container"> 
      
      <!--tTxt-->
      <div class="tTxt fix-png" > 
        <!--闪光动画-->
        <div class="lightEffe"><i class="light t2"></i></div>
		<div id="animate-area1"></div>
	 
	 
        <!--/闪光动画--> 
      </div>
      <!--/tTxt--> 
      
      <!--icolist-->
      <ul class="icolist">
        <li class="ico-s" >
          <div class="img fix-png"></div>
          <div class="txt fix-png" >南昌APP UI设计</div>
        </li>
        <li class="ico-y" >
          <div class="img fix-png"></div>
          <div class="txt fix-png" >南昌小程序 设计与开发</div>
        </li>
        <li class="ico-d" >
          <div class="img fix-png" ></div>
          <div class="txt fix-png" >南昌APP 定制开发</div>
        </li>
        <li class="ico-m" >
          <div class="img fix-png" ></div>
          <div class="txt fix-png" >南昌移动产品规划与咨询</div>
        </li>
      </ul>
      <!--/icolist--> 
    </div>
    <!--/container--> 
    
  </div>
</div>
<!--/page_stage_1--> 
<!--page_stage_3-->
<div id="page_stage_3" class="page-stage-3 scrollBox"> 
  <!--container-->
  <div class="container">
    <div class="case" style="height:141px;line-height:181px"><a href="javascript:" style="margin-right:7px"> <img src="/images/band.png" alt="辰锦科技南昌微信小程序开发品牌客户"> </a></div>
    <!--修改第三部分的滚动-->
    <div class="multipleColumn" style="margin:0 auto">
      <div class="bd">
        <div class="ulWrap">
          <?php if ($_smarty_tpl->getVariable('brand1')->value){?>
          <ul>
            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('brand1')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <li>
			  <div class="view view-fifth">
                    <img src="<?php echo $_smarty_tpl->getVariable('brand1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pic'];?>
" alt="<?php echo $_smarty_tpl->getVariable('brand1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
" />
                </div>
            </li>
            <?php endfor; endif; ?>
          </ul>
          <?php }?>
          <?php if ($_smarty_tpl->getVariable('brand2')->value){?>
          <ul>
            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('brand2')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <li>
               
			    <div class="view view-fifth">
                    <img src="<?php echo $_smarty_tpl->getVariable('brand2')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pic'];?>
"  alt="<?php echo $_smarty_tpl->getVariable('brand1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
" />
                   
                </div>
            </li>
            <?php endfor; endif; ?>
          </ul>
          <?php }?>
          <?php if ($_smarty_tpl->getVariable('brand3')->value){?>
          <ul>
            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('brand3')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <li>
               <div class="view view-fifth">
                    <img src="<?php echo $_smarty_tpl->getVariable('brand3')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pic'];?>
"  alt="<?php echo $_smarty_tpl->getVariable('brand1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
" />
                </div>
            </li>
            <?php endfor; endif; ?>
          </ul>
          <?php }?>
        </div>
        <!-- ulWrap End --> 
      </div>
      <!-- bd End -->
      <div class="hd"> <a class="next"></a> <a class="prev"></a> </div>
    </div>
    <!-- multipleColumn End --> 
    
    <script type="text/javascript">
	var vis = $(".ulWrap ul").length;
	//多行/多列的滚动解决思路在于：把每次滚动的n个li放到1个ul里面，然后用SuperSlide每次滚动1个ul，相当于每次滚动n个li
	if(vis > 1)
	jQuery(".multipleColumn").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"leftLoop",vis:vis});
	</script> 
    
  </div>
  <!--/container--> 
  
</div>

<!--/page_stage_3--> 
<!--page_stage_2-->
<div id="page_stage_2" class="page-stage-2 scrollBox"> 
  <!--container-->
  <div class="container">
    <div class="case"><a href="/case/" style="margin-right:7px"> <img src="/images/case.png" alt="辰锦科技南昌微信小程序开发品牌案例"> </a>  </div>
    <div class="examples_body">
      <ul class="bannerHolder">
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('cases')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li>
			<div class="drawbox">
				<div class="drawbox-front">
					<a href="/case/view.php?id=<?php echo $_smarty_tpl->getVariable('cases')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
" title="<?php echo $_smarty_tpl->getVariable('cases')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['name'];?>
">
						<img width="582px" height="257px"  data-original="<?php echo $_smarty_tpl->getVariable('cases')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pic'];?>
" src="<?php echo $_smarty_tpl->getVariable('cases')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pic'];?>
" alt="<?php echo $_smarty_tpl->getVariable('cases')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['brief'];?>
" border="0">
					</a>
				</div>
			</div>
          <b class="titleb">所属行业：<?php echo $_smarty_tpl->getVariable('cases')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['trade'];?>
</b> 
        </li>
        <?php endfor; endif; ?>
      </ul>
	  <div class="clear:both;height:0"></div>
    </div>
    <div class="home-more-wrapper"><a href="/case/" class="home-more" id="homeMore">查看更多</a></div>
  </div>
  <!--/container--> 
</div>
<!--/page_stage_2--> 

 

<!--page_stage_4-->
<div id="page_stage_4" class="page-stage-4 scrollBox"> 
  <!--container-->
  <div class="container">
    <div class="tableLeft left">
      <ul class="tabs">
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('about')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']==0){?>class="active"<?php }?>><a href="javascript:void(0);"><?php echo $_smarty_tpl->getVariable('about')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
</a></li>
        <?php endfor; endif; ?>
      </ul>
      <div class="tab_container">
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('about')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <div id="tab<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
" class="tab_content" style="display:<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']==0){?>block<?php }else{ ?>none<?php }?>; ">
          <div class="imgLeft left"> <img src="<?php echo $_smarty_tpl->getVariable('about')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pic'];?>
" alt="<?php echo $_smarty_tpl->getVariable('about')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
" width="226px" height="136px"> </div>
          <div class="textRight right">
            <p class="text"><?php echo $_smarty_tpl->getVariable('about')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['brief'];?>
</p>
          </div>
        </div>
        <?php endfor; endif; ?>
      </div>
    </div>
    <div class="tableRight right">
      <div class="title">
        <p class="left">最新动态</p>
        <a href="/article/" class="right"> </a> </div>
      <ul class="left">
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('article1')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li> <a href="/article/view.php?id=<?php echo $_smarty_tpl->getVariable('article1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
"> <span><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']+1;?>
</span><?php echo $_smarty_tpl->getVariable('article1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
 </a> </li>
        <?php endfor; endif; ?>
      </ul>
      <ul class="right">
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('article2')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <li> <a href="/article/view.php?id=<?php echo $_smarty_tpl->getVariable('article2')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
"> <span><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']+6;?>
</span><?php echo $_smarty_tpl->getVariable('article2')->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
 </a> </li>
        <?php endfor; endif; ?>
      </ul>
    </div>
  </div>
  <!--/container--> 
  
</div>
<!--/page_stage_4--> 

<?php $_template = new Smarty_Internal_Template('common/bottom.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> 

</div>

<!--/wrapper--> 


<!--[if lt IE 7]>     
<script src="js/DD_belatedPNG.js" type="text/javascript"></script>
<script type="text/javascript">
    $(window).load(function () {             
        DD_belatedPNG.fix(".fix-png");         
    });     
</script> 
<![endif]--> 
<script>
$(document).ready(function() {        
    //On Click Event  
    $("ul.tabs li").click(function() {  
        $("ul.tabs li").removeClass("active"); //Remove any "active" class  
        $(this).addClass("active"); //Add "active" class to selected tab  
        $(".tab_content").hide(); //Hide all tab content  
         
        $("#tab" + $(this).index()).fadeIn(); //Fade in the active content  
    });  
  
}); 	
	$(function(){			
		//头部动画
		$("#page_stage_1 .tTxt").delay(500).animate({"top":80,"opacity":1},600,"easeOutCubic");
		
		$("#page_stage_1 .icolist li").each(function(i) {
			var obj=$("#page_stage_1 .icolist li");
			var length=obj.length;
			var width=obj.width()+94;
			var j=length-1-i;
            $(this).delay((i+1)*900).animate({"top":"296px","opacity":1},2000,"easeInOutElastic",function(){			
				$(this).find(".img").addClass("rotate");
				$(this).animate({"left":j*216+width},(j+1)*600,"easeOutCubic",function(){
					$(this).delay((j+1)*600).find(".txt").fadeIn(1000,"easeOutCubic")
					$(this).find(".img").removeClass("rotate");	
					//鼠标经过效果
					$(this).bind("mouseover",function(){
						$(this).find(".img").addClass("rotate");
						$(this).find(".img").stop().animate({"top":-40},300,"easeInOutCubic");						
					})
					$(this).bind("mouseleave",function(){
						$(this).find(".img").removeClass("rotate");	
						$(this).find(".img").stop().animate({"top":0},800,"easeOutElastic");		
					})
				});		
			});
        });
		
		 
		
		
		$(window).scroll(function(){		
			var sObjs=$(".scrollBox");
			var top=$(window).scrollTop();//滚动的高度
			sObjs.each(function() {
               if(top>$(this).offset().top-350) {
				  //执行显示动画
				  boxsAnimate($(this));
				}
            });
			
			var qrcode=$("#static_Login");
			if($(window).scrollTop()>150){
				qrcode.show();
			}else{
				qrcode.hide();
			}
		})
		
	})
</script>

</body>
</html>