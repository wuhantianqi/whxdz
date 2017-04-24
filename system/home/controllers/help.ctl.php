<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Help extends Ctl
{
    public $_call = 'index';
     
     
     public function index($page){
        $page = htmlspecialchars($page);       
        $items =  K::M('article/view')->items(array('from'=>'help','closed'=>0),array('article_id'=>'ASC'),1,200); 
        foreach($items as $v){
            if($v['page'] == $page){
                $detail=$v;
            }
        }
        if($detail){
            $this->pagedata['page'] = $page;
            $this->pagedata['items'] = $items;
            $this->pagedata['cate'] =  K::M('article/cate')->fetch_all();
            $this->pagedata['detail'] = K::M('article/view')->detail($detail['article_id']); 
            K::M('helper/seo')->init('help_detail',array('title'=>$detail['title']));
            $this->tmpl = 'help.html';
        }else{
            $this->error(404);
        }
     }
    
}