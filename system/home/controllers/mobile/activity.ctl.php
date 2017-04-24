<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_Mobile_Activity extends Ctl_Mobile {
    
    
    public function index($page=1)
    {
        $filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;  
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $items = K::M('activity/activity')->items($filter, null, $page, $limit);
        $this->pagedata['nextpage'] = $this->mklink('activity:loaddata',  array('page' => '{page}'), array(),false);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'mobile/activity.html';
    }
    
    public function loaddata($page=1)
    {
        $filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;  
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $items = K::M('activity/activity')->items($filter, null, $page, $limit);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'mobile/activity_loaddata.html';
    }
    
    public function detail($activity_id = 0){
        if(!($activity_id = (int)$activity_id) && !($activity_id = (int)$this->GP('activity_id'))){
            $this->error(404);
        }else if(!$detail = K::M('activity/activity')->detail($activity_id)){
            $this->error(404);
        }else{
          
            $detail['endtime'] = $detail['end_time'] - __TIME;
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'mobile/activity_detail.html';
        }
    }
    
      public function yuyue($activity_id = 0){
        if(!($activity_id = (int)$activity_id) && !($activity_id = (int)$this->GP('activity_id'))){
            $this->error(404);
        }else if(!$detail = K::M('activity/activity')->detail($activity_id)){
            $this->error(404);
        }else{
            if($this->checksubmit('data')){
               if(!$data = $this->GP('data')){
                    $this->err->add('非法的数据提交', 201);
                }else{
                    $data['activity_id'] = $activity_id;
                    if($yuyue_id = K::M('activity/yuyue')->create($data)){
                        $obj = K::M('sms/sms');
                        $obj->send($data['mobile'],'sms_activity_yuyue',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'activity'=>$detail['title']));
                        $obj->admin('sms_admin_activity',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'activity'=>$detail['title']));
                         K::M('net/tongji')->commit('activity',$yuyue_id,  $this->request['ismobile']);
                        $this->err->add('报名成功！');
                    }
                } 
            }else{
                $this->pagedata['detail'] = $detail;
                $this->tmpl = 'mobile/activity_yuyue.html';              
            }
        }
    }
}