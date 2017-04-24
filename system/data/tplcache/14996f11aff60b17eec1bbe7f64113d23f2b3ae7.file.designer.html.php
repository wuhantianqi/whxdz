<?php /* Smarty version Smarty-3.1.8, created on 2017-04-14 17:31:41
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\designer.html" */ ?>
<?php /*%%SmartyHeaderCode:1994858f096fd2eaf74-47727060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14996f11aff60b17eec1bbe7f64113d23f2b3ae7' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\designer.html',
      1 => 1490920442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1994858f096fd2eaf74-47727060',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f096fd367f90_72469536',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f096fd367f90_72469536')) {function content_58f096fd367f90_72469536($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_function_widget')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.widget.php';
?><?php echo $_smarty_tpl->getSubTemplate ("block/sheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("block/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <!--<div class="crumbs">
        <ul class="margin">
            <li>您当前的位置:</li>
            <li><a href="<?php echo smarty_function_link(array('ctl'=>'index'),$_smarty_tpl);?>
" >首页</a></li>
            <li>><a href="<?php echo smarty_function_link(array('ctl'=>'designer'),$_smarty_tpl);?>
">设计师</a></li>
        </ul>
    </div>-->
    <div class="clear"></div>
    <div class="site-banner"style="background:url(/themes/default/images/banner-sj.jpg) no-repeat center;"></div>
    <?php echo smarty_function_widget(array('id'=>"tenders/templateform"),$_smarty_tpl);?>

    <div class="site-content margin">
        <div class="designer-case">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <li>
                    <span><a href="<?php echo smarty_function_link(array('ctl'=>'designer:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['designer_id']),$_smarty_tpl);?>
" target="_blank" ><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
" alt=""></a></span>
                    <span class="popupform">
                        <p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                        <p>预约设计</p>
                    </span>
                </li>
                <?php } ?>    
            </ul>
        </div>
        <div class="site-page page"><?php echo $_smarty_tpl->tpl_vars['pager']->value['pagebar'];?>
</div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("block/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>