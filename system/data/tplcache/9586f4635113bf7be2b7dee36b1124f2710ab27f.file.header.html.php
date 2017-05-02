<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 11:17:43
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\block\header.html" */ ?>
<?php /*%%SmartyHeaderCode:108015907fa576e3944-65658059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9586f4635113bf7be2b7dee36b1124f2710ab27f' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\block\\header.html',
      1 => 1493693352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108015907fa576e3944-65658059',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5907fa5770e8d4_63482325',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907fa5770e8d4_63482325')) {function content_5907fa5770e8d4_63482325($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?>    <div class="top-nav">
        <div class="nav margin">
            <ul>
                <li><i></i>新浪微博</li>
                <li><i></i>公众微信</li>
                <li>服务热线: <em><?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['phone'];?>
</em></li>
            </ul>
            <p><i></i>欢迎访问<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['title'];?>
,我们将竭诚为您服务！</p>
        </div>
    </div>
    <div class="top-menu">
        <div class="menu margin">
            <ul>
                <li><a href="<?php echo smarty_function_link(array('ctl'=>'index'),$_smarty_tpl);?>
">&nbsp;&nbsp;&nbsp;首&nbsp;&nbsp;页</a></li>
                <li><a href="<?php echo smarty_function_link(array('ctl'=>'xfzx'),$_smarty_tpl);?>
">新房装修</a></li>
                <li><a href="<?php echo smarty_function_link(array('ctl'=>'jfzx'),$_smarty_tpl);?>
">旧房装修</a></li>
                <li><a href="<?php echo smarty_function_link(array('ctl'=>'designer'),$_smarty_tpl);?>
">设计团队</a></li>
                <li><a href="<?php echo smarty_function_link(array('ctl'=>'case'),$_smarty_tpl);?>
">案例美图</a></li>
                <li><a href="<?php echo smarty_function_link(array('ctl'=>'activity:detail','arg0'=>1),$_smarty_tpl);?>
">畅享活动</a></li>
                <li><a href="/index.php?about-about.html">走进我们</a></li>
            </ul>
            <h1></h1>
        </div>
        <!-- 副导航临时切换使用 -->
        <?php echo $_smarty_tpl->getSubTemplate ("block/vice-nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>















	    <?php }} ?>