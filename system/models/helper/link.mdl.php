<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: link.mdl.php 3224 2014-01-28 13:10:06Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Helper_Link extends Model
{
    private  $_ctl = array('tenders','site','gs','home','designer','activity','index','company','blog');
    /**
     * 生成连接函数
     * $ctl  参数由 "ctl:act" 组合
     * $args 可以是数组也可以是字符串，这里会传递到action方法中的参数，也可以是字符串格式如 "%s-%s-%d" 会尝试用$params来调用vsprintf
     */
    public function mklink($ctl, $args=array(), $params=array(), $http=false, $rewrite=true, $ext='.html')
    {
        $x = $ctl;
        static $site = null;
        if($site === null){
            $site = K::$system->config->get('site');
        }
        $link = '';
        $request = K::$system->request;
        if(strpos($ctl,':')){
            $a = explode(':',$ctl);
            $ctl = $a[0];
            $act = $a[1];
        }else{
            $act = null;
        }
        $rewrite = $rewrite && $site['rewrite'];
        $link = $this->_parse_rewrite($ctl, $act, $args, $rewrite, $ext);
        if(is_array($params)){
            //$link = vsprintf($link, $params);
            $params = http_build_query($params);
        }else if(!is_string($params)){
            $params = '';
        }
        if(empty($rewrite) || 'ajax' === $http || defined('IN_ADMIN')){
            $link = "index.php?{$link}";
        }
        if($params){
            if(strpos('?', $link) === false){
                $link .= '?'.$params;
            }else{
                $link .= '&'.$params;
            }
        }
        $prefix = '';
        if($http){
            $prefix = $site['siteurl'];
            if(strpos((string)$http, 'http://') === 0){
                $prefix = $http;
            }else if('mobile' === $http || defined('IN_MOBILE')){
                $mobile = K::$system->config->get('mobile');
                $prefix = $mobile['url'];
            }else if('base' == $http || 'empty' == $http || 'ajax' == $http){
                $prefix = '';
            }
            $link = $prefix.'/'.$link;
        }
        return $link;           
    }
    
    public function mkctl($ctl, $type='button', $args=null, $extname='.html', $attrs=array())
    {
        if(strpos($ctl,':')){
            $a = explode(':',$ctl);
            $ctl = $a[0];
            $act = $a[1];
        }else{
            $act = 'index';
        }
        $link = 'javascript:;'; $attr = ''; $nopriv = false;
        if($type == 'button' || $type == 'submit'){
            $attrs['class'] =  $attrs['class'] ? $attrs['class'] : 'bt-big';
        }
        if(!$mod =K::M('module/view')->ctlmap($ctl,$act)){
            $nopriv = true;
            $attrs['tips'] = '模块不存在';
            $attrs['disabled'] = 'disabled';
            $attrs["class"] = $attrs['class'] ? ($attrs['class'].' disabled') : 'disabled';
        }else if(!K::$system->admin->check_priv($mod['mod_id'])){
            $nopriv = true;
            $attrs['tips'] = '没有权限';
            $attrs['disabled'] = 'disabled';
            $attrs["class"] = $attrs['class'] ? ($attrs['class'].' disabled') : 'disabled';
        }else{
            if($args === null){
                $args = '';
            }else if(is_array($args)){
                $a = '';
                foreach($args as $k=>$v){
                    $a .= "-{$v}";
                }
                $args = $a;
            }else if(!$args){
                $args = '';
            }
            $args = trim($args,'-');
            $args = $args ? "-{$args}" : '';
            $link = "?{$ctl}-{$act}{$args}{$extname}";
            if($type == 'submit'){
                $attr = 'action="'.$link.'" '.$attr;
            }else if($type == 'button'){
                $attr = 'action="'.$link.'" '.$attr;
            }else{
                $attr = 'href="'.$link.'" '.$attr;
            }
        }
        foreach((array)$attrs as $k=>$v){
            if(strlen($v)>5 && substr($v, 0, 5) == 'none:'){ //不显示的属性
                $attrs[$k] = substr($v, 5);
                continue;
            }else if(strlen($v)>5 && substr($v, 0, 5) == 'mini:'){
                if($nopriv){ //没有权限指令忽略
                    continue;
                }
                $k = "mini-{$k}";
                $v = substr($v,5);
            }else if(strlen($v)>4 && substr($v, 0, 4) == 'win:'){
                if($nopriv){ //没有权限指令忽略
                    continue;
                }
                $k = "win-{$k}";
                $v = substr($v,4);
            }
            $attr .= $k.'="'.$v.'" ';
        }
        $title = $attrs['title'] ? $attrs['title'] : $mod['title']; 
        if($nopriv && $attrs['priv'] == 'hide'){
            return '';
        }else if($type == 'submit'){
            $title = isset($attrs['value']) ? $attrs['value'] : $title;
            $attr = $value.' '.$attr;
            $attr = $nopriv ? "type='submit' {$attr}" : $attr;
            //$attr =  $attrs['class'] ? $attr : "{$attr} class='bt-big'";
            return "<button {$attr}>{$title}</button>";            
        }else if($type == 'button'){
            $title = isset($attrs['value']) ? $attrs['value'] : $title;
            $attr = $value.' '.$attr;
            $attr = $nopriv ? "type='button' {$attr}" : $attr;
            //$attr =  $attrs['class'] ? $attr : "{$attr} class='bt-big'";
            return "<button {$attr}>{$title}</button>";
        }else if($nopriv){
            return "<label {$attr}>{$title}</label>";
        }else{
            return "<a {$attr}>{$title}</a>";
        }
    }


    protected function _parse_rewrite($ctl, $act=null, $args=array(), $rewrite=true, $ext='.html')
    {
        $link = '';
        $link = "{$ctl}";
        $link .= $act ? "-{$act}" : '';
        if(!empty($args)){
            if(is_array($args)){
                $link .= '-'.implode('-', $args);
            }else if(is_string($args)){
                $link .= '-'.trim($args, '-');
                if(strpos($link, '.html')){
                    $ext = '';
                }
            }
        }
        $link .= $ext;
        return $link;
        /*
        if($rewrite || !defined('IN_ADMIN')){
            $link = "{$ctl}";
            $link .= $act ? "-{$act}" : '';
            if(!empty($args)){
                if(is_array($args)){
                    $link .= '-'.implode('-', $args);
                }else if(is_string($args)){
                    $link .= '-'.trim($args, '-');
                    if(strpos($link, '.html')){
                        $ext = '';
                    }
                }
            }
            $link .= $ext;          
        }else{
            $link = "ctl={$ctl}&act={$act}";
            if(!empty($args)){
                if(is_array($args)){
                    $link .= '&' . http_build_query($args);
                }else if(is_string($args)){
                    $link .= '&'.trim($args, '&');
                }
            }           
        }
        return $link;
        */
    }

}