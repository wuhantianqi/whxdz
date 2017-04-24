<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Cate_cate extends Ctl
{
    
    public function index($page=1)
    {

    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;            
        }
        if($items = K::M('cate/cate')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:cate/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:cate/so.html';
    }

    public function priv($cate_id=null)
    {
        if(!($cate_id = (int)$cate_id) && !($cate_id = (int)$this->GP('cate_id'))){
            $this->err->add('未指定要修改的用户组', 211);
        }else if(!$group = K::M('cate/cate')->detail($cate_id)){
            $this->err->add('用户组不存在或已经删除', 212);
        }else if($priv = $this->checksubmit('priv')){
            if(K::M('cate/cate')->update_priv($cate_id, $priv)){
                $this->err->add('修改权限成功');
            }
        }else{
            $this->pagedata['group'] = $group;
            $this->pagedata['priv'] = (array)$group['priv'];
            $this->tmpl = 'admin:cate/priv.html';
        }
    }

    public function detail($cate_id = null)
    {
        if(!$cate_id = (int)$cate_id){
            $this->err->add('未指定要查看内容的ID', 211);
        }else if(!$detail = K::M('cate/cate')->detail($cate_id)){
            $this->err->add('您要查看的内容不存在或已经删除', 212);
        }else{
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'admin:cate/detail.html';
        }
    }

    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if($cate_id = K::M('cate/cate')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?cate/cate-index.html');
                }
            } 
        }else{
            $this->pagedata['from_list'] = array(1=>'设计师',2=>'项目经理',3=>'团队');
            $this->tmpl = 'admin:cate/create.html';
        }
    }

    public function edit($cate_id=null)
    {
        if(!($cate_id = (int)$cate_id) && !($cate_id = $this->GP('cate_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('cate/cate')->detail($cate_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                if(K::M('cate/cate')->update($cate_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
            $this->pagedata['from_list'] = array(1=>'设计师',2=>'项目经理',3=>'团队');
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:cate/edit.html';
        }
    }

    public function doaudit($cate_id=null)
    {
        if($cate_id = (int)$cate_id){
            if(K::M('cate/cate')->batch($cate_id, array('audit'=>1))){
                $this->err->add('审核内容成功');
            }
        }else if($ids = $this->GP('cate_id')){
            if(K::M('cate/cate')->batch($ids, array('audit'=>1))){
                $this->err->add('批量审核内容成功');
            }
        }else{
            $this->err->add('未指定要审核的内容', 401);
        }
    }

    public function delete($cate_id=null)
    {
        if($cate_id = (int)$cate_id){
            if(K::M('cate/cate')->delete($cate_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('cate_id')){
            if(K::M('cate/cate')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}