<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_Product extends Ctl
{
    
    public function __construct(&$system)
    {
        parent::__construct($system);
        $uri = $this->request['uri'];
        if(preg_match('/product-([\d\-]+).html/i', $uri, $m)){
            $this->request['act'] = 'index';
            $this->request['args'] = explode('-', trim($m[1], '-'));
        }
    }


    public function items($cat_id=0,$brand_id=0,$page=1)
    {
        $this->index($cat_id, $brand_id, $page);
    }
    
    public function  index($cat_id=0, $brand_id=0, $page=1)
    {
        $pager = $filter = array();
        $pager['cat_id'] = $cat_id = (int)$cat_id;
        $pager['brand_id'] = $brand_id = (int)$brand_id;
        $pager['page'] = $page = max((int)$page, 1);
        $cate_list = K::M('product/cate')->fetch_all();
        $top_cate = array();
        if($cate = $cate_list[$cat_id]){
            if(empty($cate['parent_id'])){
                $top_cate = $cate;
            }else{
                foreach($cate_list as $v){
                    if($v['cat_id'] == $cate['parent_id']){
                        $top_cate = $v;
                    }
                }
            }
            if($cat_ids = K::M('product/cate')->children_ids($cat_id)){
                if(is_numeric($cat_ids)){
                    $filter['cat_id'] = $cat_ids;
                }else{
                    $filter['cat_id'] = explode(',', $cat_id);

                }
            }
            $pager['has_children'] = false;
            if($a = K::M('product/cate')->children_ids($top_cate['cat_id'])){
                if(!is_numeric($a)){
                    $pager['has_children'] = true;
                }
            }
            if($brand_list = K::M('product/brand')->items_by_cat($cat_id)){
                $this->pagedata['brand_list'] = $brand_list; 
            }
        }
        if($brand_id){
            $filter['brand_id'] = $brand_id;
        }
        if ($s = $this->GP('s')) {
            $pager['s'] = $s = htmlspecialchars($s);
            $filter['product_name'] = "LIKE:%" . $s . "%"; 
        }
        $pager['limit'] = $limit = 20;
        $pager['count'] = $count = 0;
        if ($items = K::M('product/product')->items($filter, null, $page, $limit, $count)) {
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('product:items', array($cat_id, $brand_id, '{page}')), array('s' => $pager['s']));
            $this->pagedata['items'] = $items;
        }
        K::M('helper/seo')->init('product',array(
                'cat_name'      =>  isset($cate) ? $cate['cat_name'] : '',
                'brand_name'    => isset($brand_list[$brand_id]) ? $brand_list[$brand_id]['brand_name'] : ''
        ));
        $this->pagedata['cate'] = $cate;          
        $this->pagedata['pager'] = $pager;
        $this->pagedata['top_cate'] = $top_cate;
        $this->pagedata['cate_list'] = $cate_list;
        $this->tmpl = 'product.html';
    }
    
    public function detail($product_id)
    {
        if(!($product_id = (int)$product_id) && !($product_id = (int)$this->GP('product_id'))){
            $this->error(404);
        }else if(!$detail = K::M('product/product')->detail($product_id)){
            $this->error(404);
        }else{
            K::M('helper/seo')->init('product_detail',array(
                'title'      =>  $detail['product_name'],    
            ));
            $this->pagedata['cate'] = K::M('product/cate')->detail($detail['cat_id']);
            $this->pagedata['brand'] = K::M('product/brand')->detail($detail['brand_id']);
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'product_detail.html';
        }
    }
    
    
    public function yuyue($product_id){
        var_dump("888");exit;
        if(!($product_id = (int)$product_id) && !($product_id = (int)$this->GP('product_id'))){
            $this->err->add('没有您要的数据', 211);
        }else if(!$detail = K::M('product/product')->detail($product_id)){
            $this->err->add('没有您要的数据', 212);
        }else{
            if($this->checksubmit('data')){
               if(!$data = $this->GP('data')){
                    $this->err->add('非法的数据提交', 201);
                }else{
                    $data['product_id'] = $product_id;
                    if($yuyue_id = K::M('product/yuyue')->create($data)){
                        $obj = K::M('sms/sms');
                        $obj->send($data['mobile'],'sms_product_yuyue',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'product'=>$detail['product_name']));
                        $obj->admin('sms_admin_product',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'product'=>$detail['product_name']));
                        K::M('net/tongji')->commit('product',$yuyue_id,  $this->request['ismobile']);
                        K::M('product/product')->update_count($product_id,'yue_num');
                        $this->err->add('提交申请成功');
                    }
                } 
            }else{
                $this->pagedata['detail'] = $detail;
                $this->tmpl = 'product_yuyue.html';              
            }
        }
    }
    
}
    