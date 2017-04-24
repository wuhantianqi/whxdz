<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Activity_Lanmu extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['lanmu_id']){$filter['lanmu_id'] = $SO['lanmu_id'];}
            if($SO['activity_id']){$filter['activity_id'] = $SO['activity_id'];}
            if($SO['title']){$filter['title'] = "LIKE:%".$SO['title']."%";}
            if(is_array($SO['dateline'])){if($SO['dateline'][0] && $SO['dateline'][1]){$a = strtotime($SO['dateline'][0]); $b = strtotime($SO['dateline'][1])+86400;$filter['dateline'] = $a."~".$b;}}
        }
        if($items = K::M('activity/lanmu')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:activity/lanmu/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:activity/lanmu/so.html';
    }

    public function activity($activity_id=null)
    {
        if(!($activity_id = (int)$activity_id) && !($activity_id = (int)$this->GP('activity_id'))){
            $this->err->add('未指定活动ID', 211);
        }else if(!$activity = K::M('activity/activity')->detail($activity_id)){
            $this->err->add('活动不存在或已经删除', 212);
        }else{
            $this->pagedata['items'] = K::M('activity/lanmu')->items_by_activity($activity_id);
            $this->pagedata['activity'] = $activity;
            $this->tmpl = 'admin:activity/lanmu/activity.html';
        }
    }

    public function create($activity_id=null)
    {
        if(!($activity_id = (int)$activity_id) && !($activity_id = (int)$this->GP('activity_id'))){
            $this->err->add('未指定活动ID', 211);
        }else if(!$activity = K::M('activity/activity')->detail($activity_id)){
            $this->err->add('活动不存在或已经删除', 212);
        }else if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $data['activity_id'] = $activity_id;
                if($lanmu_id = K::M('activity/lanmu')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?activity/lanmu-activity-'.$activity_id.'.html');
                }
            } 
        }else{
            $this->pagedata['activity'] = $activity;
            $this->tmpl = 'admin:activity/lanmu/create.html';
        }
    }

    public function edit($lanmu_id=null)
    {
        if(!($lanmu_id = (int)$lanmu_id) && !($lanmu_id = $this->GP('lanmu_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('activity/lanmu')->detail($lanmu_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                if(K::M('activity/lanmu')->update($lanmu_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:activity/lanmu/edit.html';
        }
    }



    public function delete($lanmu_id=null)
    {
        if($lanmu_id = (int)$lanmu_id){
            if(K::M('activity/lanmu')->delete($lanmu_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('lanmu_id')){
            if(K::M('activity/lanmu')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}