<?php /* Smarty version Smarty-3.0.6, created on 2017-08-04 10:33:58
         compiled from "F:/chenjin/temp/admin\common/main.htm" */ ?>
<?php /*%%SmartyHeaderCode:137275983dd162992a8-98921884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2caaaa103570407bb16e7ce944be951527b00fba' => 
    array (
      0 => 'F:/chenjin/temp/admin\\common/main.htm',
      1 => 1477385370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137275983dd162992a8-98921884',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('sys_name')->value;?>
</title>
<link href="<?php echo $_smarty_tpl->getVariable('admin_temp_path')->value;?>
/css/general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('admin_temp_path')->value;?>
/css/addon.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('admin_temp_path')->value;?>
/css/addmain.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="98%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="45%"><table width="100%" style="border:1px solid #bbdde5;" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" class="tbhead">服务器信息</td>
  </tr>
  <tr>
    <td class="newtable">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="160" height="38" class="dott">主机名：</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['domain'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">服务器端口：</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['server_port'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">服务器操作系统：</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['os'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">WEB服务器： </td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['web_server'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">MySQL 版本：</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['mysql'];?>
</td>
      </tr>
    </table>
	</td>
  </tr>
</table></td>
    <td width="55%"><table width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #bbdde5;">
  <tr>
    <td height="30" class="tbhead">PHP信息</td>
  </tr>
  <tr>
    <td class="newtable">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="160" height="38" class="dott">PHP版本：</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['php_ver'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">安全模式：</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['safe_mode'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">GD版本：</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['gd'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">页面编码： </td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['char_set'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">Socket支持：</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['socket'];?>
</td>
      </tr>
    </table>
	</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" style="border:1px solid #bbdde5;" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" class="tbhead">版权信息</td>
  </tr>
  <tr>
    <td class="newtable">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="160" height="38" class="dott">版权所有：				</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['copyright'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">程序版本：				</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['version'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">技术支持：				</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['support'];?>
</td>
      </tr>
      <tr>
        <td height="38" class="dott">服务热线：				</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['service'];?>
 </td>
      </tr>
      <tr>
        <td height="38" class="dott">联系QQ：				</td>
        <td class="dott"><?php echo $_smarty_tpl->getVariable('sys_info')->value['qq'];?>
 </td>
      </tr>
    </table>
	</td>
  </tr>
</table></td>
  </tr>
</table>
</body>
</html>
