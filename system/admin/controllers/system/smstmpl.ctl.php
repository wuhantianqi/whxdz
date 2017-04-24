<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: smstmpl.ctl.php 3053 2014-01-15 02:00:13Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_System_Smstmpl extends Ctl
{
    private $_from = 'sms';
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        $filter['from'] = $this->_from;
        if($items = K::M('system/systmpl')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:system/smstmpl/items.html';
    }





    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $data['from'] = $this->_from;
                if($systmpl_id = K::M('system/systmpl')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?system/smstmpl-index.html');
                }
            } 
        }else{
           $this->tmpl = 'admin:system/smstmpl/create.html';
        }
    }

    public function edit($systmpl_id=null)
    {
        if(!($systmpl_id = (int)$systmpl_id) && !($systmpl_id = $this->GP('systmpl_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('system/systmpl')->detail($systmpl_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $data['from'] = $this->_from;
                if(K::M('system/systmpl')->update($systmpl_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:system/smstmpl/edit.html';
        }
    }





}