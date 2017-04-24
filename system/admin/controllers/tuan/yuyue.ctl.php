<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Tuan_Yuyue extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['tuan_id']){$filter['tuan_id'] = $SO['tuan_id'];}
if($SO['mobile']){$filter['mobile'] = "LIKE:%".$SO['mobile']."%";}
if($SO['contact']){$filter['contact'] = "LIKE:%".$SO['contact']."%";}
        }
        if($items = K::M('tuan/yuyue')->items($filter, null, $page, $limit, $count)){
            $tuan_ids = array();
            foreach($items as $k=>$v){
                if($v['tuan_id']){
                    $tuan_ids[$v['tuan_id']] = $v['tuan_id'];
                }
            }
            if(!empty($tuan_ids)) $this->pagedata['tuan'] = K::M('tuan/tuan')->items_by_ids($tuan_ids);
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:tuan/yuyue/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:tuan/yuyue/so.html';
    }



    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if($yuyue_id = K::M('tuan/yuyue')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?tuan/yuyue-index.html');
                }
            } 
        }else{
           $this->tmpl = 'admin:tuan/yuyue/create.html';
        }
    }

    public function edit($yuyue_id=null)
    {
        if(!($yuyue_id = (int)$yuyue_id) && !($yuyue_id = $this->GP('yuyue_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('tuan/yuyue')->detail($yuyue_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $data['is_read'] = 1;
                if(K::M('tuan/yuyue')->update($yuyue_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:tuan/yuyue/edit.html';
        }
    }



    public function delete($yuyue_id=null)
    {
        if($yuyue_id = (int)$yuyue_id){
            if(K::M('tuan/yuyue')->delete($yuyue_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('yuyue_id')){
            if(K::M('tuan/yuyue')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}