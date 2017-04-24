<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Product_Cate extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 1000;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['cat_name']){$filter['cat_name'] = "LIKE:%".$SO['cat_name']."%";}
        }
        if($items = K::M('product/cate')->items($filter, null, $page, $limit, $count)){
            
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:product/cate/items.html';
    }




    public function create($parent_id = 0)
    {   
        $parent_id = (int)$parent_id;
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $data['parent_id'] = $parent_id;
                if($cat_id = K::M('product/cate')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?product/cate-index.html');
                }
            } 
        }else{
           $this->pagedata['parent_id'] = $parent_id;
           $this->tmpl = 'admin:product/cate/create.html';
        }
    }

    
    
    
    public function edit($cat_id=null)
    {
        if(!($cat_id = (int)$cat_id) && !($cat_id = $this->GP('cat_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('product/cate')->detail($cat_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if(K::M('product/cate')->update($cat_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:product/cate/edit.html';
        }
    }



    public function delete($cat_id=null)
    {
        if($cat_id = (int)$cat_id){
            if(K::M('product/cate')->delete($cat_id)){
                $this->err->add('删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }
    
    public function update(){
        if($order = $this->GP('order')){
           foreach($order as $k=>$v){
               K::M('product/cate')->update($k,array('orderby'=>$v));
           }              
        }     
        $this->err->add('更新成功');
    }
    

}