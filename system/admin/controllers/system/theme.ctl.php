<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: theme.ctl.php 2961 2014-01-10 01:58:09Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_System_Theme extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($items = K::M('system/theme')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
            $themes = array();
            foreach($items as $k=>$v){
                $themes[$v['theme']] = $v;
            }
        }
        if($items = K::M('system/theme')->load_themes()){
            foreach($items as $k=>$v){
                if(empty($themes[$k])){
                    $themes[$k] = $v;
                }else{
                    $themes[$k] = array_merge($v, $themes[$k]);
                }
            }
        }
        $this->pagedata['themes'] = $themes;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:system/theme/items.html';
    }

    public function install($ident)
    {
        if(K::M('system/theme')->theme($ident)){
            $this->err->add('模板已经安装过了', 211);
        }else if(K::M('system/theme')->install($ident)){
            $this->err->add('安装模板成功');
        }
    }

    public function uninstall($theme_id)
    {
        if(!$theme_id = (int)$theme_id){
            $this->err->add('未定义操作', 211);
        }else if(!$theme = K::M('system/theme')->detail($theme_id)){
            $this->err->add('模板不存在或未安装', 222);
        }else if($theme['theme'] == 'default'){
            $this->err->add('系统模板不能删除', 223);
        }else if($theme['default']){
            $this->err->add('不能删除当前使用的模板', 224);
        }else if(K::M('system/theme')->delete($theme_id)){            
            $this->err->add('卸载模板成功');
        }
    }

    public function config($theme_id=null)
    {
       if(!$theme_id = (int)$theme_id){
            $this->err->add('未定义操作', 211);
        }else if(!$theme = K::M('system/theme')->detail($theme_id)){
            $this->err->add('模板不存在或未安装', 222);
        }else{
            $str ="<?xml version=\"1.0\" encoding=\"UTF-8\" ?><config>\n\r";
            //1000个广告位即可
            $adv  = K::M('adv/adv')->items(array('theme'=>$theme['theme']),null,1,1000);
            $items= array();
            foreach($adv as $v){
                $items[] = '<adv name="'.$v['title'].'" from="'.$v['from'].'" width="'.$v['config']['width'].'" height="'.$v['config']['height'].'"></adv>';
            }
            $str.= join("\n\r",$items);
            $str.="\n\r</config>";
            file_put_contents(__TPL_DIR.$theme['theme'].'/config.xml',$str);
            $this->err->add('备份成功！');
        }
    }

    public function setdefault($theme_id)
    {
        if(!$theme_id = (int)$theme_id){
            $this->err->add('未定义操作', 211);
        }else if(!$theme = K::M('system/theme')->detail($theme_id)){
            $this->err->add('模板不存在或未安装', 222);
        }else if(K::M('system/theme')->set_default($theme_id)){
            $this->err->add('设置默认模板成功');
        }
    }

}