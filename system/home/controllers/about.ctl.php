<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: about.ctl.php 4973 2014-05-09 08:07:30Z langzhong $
 */

class Ctl_About extends Ctl {
    
     public $_call = 'index';
     
     
     public function index($page){
         
        $page = htmlspecialchars($page);          
        $this->pagedata['info'] =  K::M('article/view')->item_by_page($page);
        if(empty($this->pagedata['info'])){
            $this->error(404);
        }else{
            $items =  K::M('article/view')->items(array('from'=>'about','closed'=>0),array('article_id'=>'ASC'),1,50); 
            $this->pagedata['page'] = $page;
            $this->pagedata['items'] = $items;
             K::M('helper/seo')->init('about',array('title'=>  $this->pagedata['info']['title']));
            $this->tmpl = 'about.html';
        }
     }
    
}