<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Product_Brand extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['brand_name']){$filter['brand_name'] = "LIKE:%".$SO['brand_name']."%";}
        }
        if($items = K::M('product/brand')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->pagedata['cateList'] = K::M('product/cate')->fetch_all(); 
        $this->tmpl = 'admin:product/brand/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:product/brand/so.html';
    }



    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if($brand_id = K::M('product/brand')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?product/brand-index.html');
                }
            } 
        }else{
           $this->tmpl = 'admin:product/brand/create.html';
        }
    }

    public function edit($brand_id=null)
    {
        if(!($brand_id = (int)$brand_id) && !($brand_id = $this->GP('brand_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('product/brand')->detail($brand_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if(K::M('product/brand')->update($brand_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:product/brand/edit.html';
        }
    }
    
    
    public function bind($cat_id){
        if(!($cat_id = (int)$cat_id) && !($cat_id = $this->GP('cat_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('product/cate')->detail($cat_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit()){
            $data = $this->GP('data');
            K::M('product/maps')->update($cat_id,$data);
            
            $this->err->add('操作成功');
        }else{
        	$this->pagedata['detail'] = $detail;
            $this->pagedata['brand_ids'] = K::M('product/maps')->brand_by_cat($cat_id);
            $this->pagedata['brands'] =  K::M('product/brand')->fetch_all();
        	$this->tmpl = 'admin:product/brand/bind.html';
        }
    }


    public function delete($brand_id=null)
    {
        if($brand_id = (int)$brand_id){
            if(K::M('product/brand')->delete($brand_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('brand_id')){
            if(K::M('product/brand')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

    
    public function cate($cat_id = null){
        if(!$cat_id = intval($cat_id)){
			$this->err->add('未指定分类', 211);
		}else{
			$brand = K::M('product/brand')->items_by_cat($cat_id);
			$this->err->set_data('brand', array_values((array)$brand));
		}
		$this->err->json();
    }
    
    
    
    
    
    
    
}