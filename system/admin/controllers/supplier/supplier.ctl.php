<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Supplier_Supplier extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['supplier_name']){$filter['supplier_name'] = "LIKE:%".$SO['supplier_name']."%";}
if($SO['name']){$filter['name'] = "LIKE:%".$SO['name']."%";}
if($SO['position']){$filter['position'] = "LIKE:%".$SO['position']."%";}
if($SO['tel']){$filter['tel'] = "LIKE:%".$SO['tel']."%";}
if($SO['mobile']){$filter['mobile'] = "LIKE:%".$SO['mobile']."%";}
if($SO['product']){$filter['product'] = "LIKE:%".$SO['product']."%";}
        }
        if($items = K::M('supplier/supplier')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:supplier/supplier/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:supplier/supplier/so.html';
    }



    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if($supplier_id = K::M('supplier/supplier')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?supplier/supplier-index.html');
                }
            } 
        }else{
           $this->tmpl = 'admin:supplier/supplier/create.html';
        }
    }

    public function edit($supplier_id=null)
    {
        if(!($supplier_id = (int)$supplier_id) && !($supplier_id = $this->GP('supplier_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('supplier/supplier')->detail($supplier_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if(K::M('supplier/supplier')->update($supplier_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:supplier/supplier/edit.html';
        }
    }



    public function delete($supplier_id=null)
    {
        if($supplier_id = (int)$supplier_id){
            if(K::M('supplier/supplier')->delete($supplier_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('supplier_id')){
            if(K::M('supplier/supplier')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}