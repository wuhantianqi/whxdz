<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

class Ctl_Mobile_Index extends Ctl_Mobile {
    
    public function index(){
    	/*文章列表start*/
    	$filter = $pager = array();
    	$pager['page'] = 1;
    	$pager['limit'] = $limit = 8;
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $filter['from'] = $pager['from'] = "article";
        $orderby = array('orderby'=>'ASC','article_id'=>'DESC');
        $items = K::M('article/view')->items($filter, $orderby, $page, $limit, $count);
        $this->pagedata['items'] = $items;
        /*文单列表end*/
        K::M('helper/seo')->init('mindex',array());
        $this->tmpl ='mobile/index.html';
    }
    
}