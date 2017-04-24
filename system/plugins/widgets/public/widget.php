<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: widget.php 5454 2014-06-11 05:17:35Z langzhong $
 */

class Widget_Public extends Model
{

    public function help(&$params)
    {   
        $data['cate_list']      = K::M('article/cate')->fetch_all();
        $data['content_list']   = K::M('article/view')->items(array('from'=>'help','closed'=>0),array('article_id'=>'ASC'),1,50);
        $params['tpl'] = 'widget/public/help.html';
        return $data;
    }

    public function kefu(&$params)
    {           
        $params['tpl'] =  $params['tpl'] ? $params['tpl'] : 'kefu.html';
        return true;
    }

    public function share(&$params)
    {
        $params['tpl'] =  $params['tpl'] ? $params['tpl'] : 'share.html';
        return $params;     
    }
}