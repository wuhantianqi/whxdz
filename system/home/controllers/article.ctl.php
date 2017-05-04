<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Article extends Ctl
{
    
    protected $article_from = 'article';
    
    public function lists($cat_id=0,$page=1){
        $this->index($cat_id, $page);
    }
    
    public function index($cat_id=0,$page=1)
    {
       
        $filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 8;
        
        $cat_id = empty($cat_id) ? 0: (int) $cat_id;
        if(!empty($cat_id)){
            if($cids = K::M('article/cate')->children_ids($cat_id)){
                $filter['cat_id'] = explode(',', $cids);
            }
            $cate = K::M('article/cate')->cate($cat_id);
            if(!empty($cate) &&  $cate['from'] != $this->article_from){
                 $this->err->add('没有该分类', 201)->show();
            }
            $this->pagedata['cate']     = $cate;
            $leftcats = K::M('article/cate')->items_by_parent($cat_id,$this->article_from);
            if(empty($leftcats)){
                $leftcats= K::M('article/cate')->items_by_parent($cate['parent_id'],$this->article_from);
            }
        }else{
            $leftcats = K::M('article/cate')->items_by_from_parent($this->article_from);
        }
        
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $filter['from'] = $pager['from'] = $this->article_from;
        $orderby = array('orderby'=>'ASC','article_id'=>'DESC');
        if ($s = $this->GP('s')) {
            $pager['s'] = $s = htmlspecialchars($s);
            $filter['title'] = "LIKE:%" . $s . "%"; 
        }
        if($items = K::M('article/view')->items($filter, $orderby, $page, $limit, $count)){
        	$pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink("article:lists", array($cat_id,"{page}")), array('s' => $pager['s']));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->pagedata['cat_id'] = $cat_id;
        $this->pagedata['leftcats'] = $leftcats;
        K::M('helper/seo')->init('pctopt',array());
        $this->tmpl = 'article.html';
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
             K::M('helper/seo')->init('article_detail',array(
                 'title'=>$detail['title'],
                 'seo_title'=>$detail['seo_title'],
                 'seo_keywords'=>$detail['seo_keywords'],
                 'seo_description' => $detail['seo_description'],
             ));
            $leftcats = K::M('article/cate')->items_by_from_parent($this->article_from);
             $this->pagedata['leftcats'] = $leftcats;
             $this->pagedata['detail'] = $detail;
             $this->tmpl = 'article_detail.html';
        }
    }
    
}