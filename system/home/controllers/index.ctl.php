<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */


if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Index extends Ctl
{
    public function index()
    {
   		// 获取效果栏目分类
   		$attr_values = K::M('data/attr')->attrs_by_from('zx:case');
   		foreach ($attr_values as $key => $value) {
   		    $http_key['attr' . $key] = 'attr' . $key;
   		}
   		foreach ($attr_values as $key => $value) {
   		    $attr_values[$key]['link'] = $this->mklink('case:items', array_merge($url, array('attr' . $key => 0)), array(), true);
   		    if (empty($url['attr' . $key]))
   		        $attr_values[$key]['checked'] = true;
   		    foreach ($value['values'] as $k => $v) {
   		        $attr_values[$key]['values'][$k]['link'] = $this->mklink('case:items', array_merge($url, array('attr' . $key => $k)), array(), true);
   		        if (!empty($url['attr' . $key]) && $url['attr' . $key] == $k) {
   		            $attr[] = $k;
   		            $attr_values[$key]['values'][$k]['checked'] = true;
   		        }
   		    }
   		}
   		$this->pagedata['attr_values'] = $attr_values;
   		//获取效果栏目分类结束 
   		//获取指定的装修知识文章
   		$filter = array('cat_id'=>array('8'),'audit'=>'1','closed'=>'0','from'=>'article');
   		$orderby = array('orderby'=>'ASC','article_id'=>'DESC');
   		$page = 1; $limit = 5; $count = ''; 
   		$items = K::M('article/view')->items($filter, $orderby, $page, $limit, $count);
   		$this->pagedata['items'] = $items;
   		//获取指定的装修知识文章
      K::M('helper/seo')->init('index',array());
      $this->tmpl = 'index.html';
    }
    
}