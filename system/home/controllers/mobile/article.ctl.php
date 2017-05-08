<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_Mobile_Article extends Ctl_Mobile {
    protected $article_from = 'article';
     
    public function index($page=1)
    {
        $filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $filter['from'] = $pager['from'] = $this->article_from;
        $orderby = array('orderby'=>'ASC','article_id'=>'DESC');
        $items = K::M('article/view')->items($filter, $orderby, $page, $limit, $count);
        $this->pagedata['nextpage'] = $this->mklink('article:loaddata',  array('page' => '{page}'), array(),false);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        K::M('helper/seo')->init('mmoreleran',array());
        $this->tmpl = 'mobile/article.html';
    }

    public function loaddata($page=1)
    {
        $filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $filter['from'] = $pager['from'] = $this->article_from;
        $orderby = array('orderby'=>'ASC','article_id'=>'DESC');
        $items = K::M('article/view')->items($filter, $orderby, $page, $limit, $count);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'mobile/article-loaddata.html';
    }
    
    public function detail($article_id){
        if(!($article_id = (int)$article_id) && !($article_id = (int)$this->GP('article_id'))){
           $this->error(404);
        }else if(!$detail = K::M('article/view')->detail($article_id)){
            $this->error(404);
        }elseif($detail['from']!=$this->article_from){
           $this->error(404);
        }else{
             K::M('article/view')->update_count($article_id,'views');
             $this->pagedata['detail'] = $detail;
             $this->tmpl = 'mobile/article_detail.html';
        }
    }
    
    
}