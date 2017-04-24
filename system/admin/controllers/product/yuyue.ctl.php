<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Product_Yuyue extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['product_id']){$filter['product_id'] = $SO['product_id'];}
            if($SO['mobile']){$filter['mobile'] = "LIKE:%".$SO['mobile']."%";}
            if($SO['contact']){$filter['contact'] = "LIKE:%".$SO['contact']."%";}
        }
        if($items = K::M('product/yuyue')->items($filter, null, $page, $limit, $count)){
            foreach($items as $k=>$v){

                $items[$k]['create_ip'] = $v['create_ip'].'('. K::M("misc/location")->location($v['create_ip']) .')';
                if($v['product_id']){
                    $product_ids[$v['product_id']] = $v['product_id'];
                }   
            } 
     
          
            if(!empty($product_ids)){
                $this->pagedata['product_list'] = K::M('product/product')->items_by_ids($product_ids);
            }
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:product/yuyue/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:product/yuyue/so.html';
    }



    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if($yuyue_id = K::M('product/yuyue')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?product/yuyue-index.html');
                }
            } 
        }else{
           $this->tmpl = 'admin:product/yuyue/create.html';
        }
    }

    public function edit($yuyue_id=null)
    {
        if(!($yuyue_id = (int)$yuyue_id) && !($yuyue_id = $this->GP('yuyue_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('product/yuyue')->detail($yuyue_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $data['is_read'] = 1;
                if(K::M('product/yuyue')->update($yuyue_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:product/yuyue/edit.html';
        }
    }



    public function delete($yuyue_id=null)
    {
        if($yuyue_id = (int)$yuyue_id){
            if(K::M('product/yuyue')->delete($yuyue_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('yuyue_id')){
            if(K::M('product/yuyue')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}