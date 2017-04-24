<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Activity extends Ctl
{
    
    
    public function lists($page=1){
        $this->index($page);
    }
    
    public function index($page=1)
    {
       
        $filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;
        
      
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        if($items = K::M('activity/activity')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink("activity:lists", array("{page}")), array());
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;

        K::M('helper/seo')->init('activity',array());
        $this->tmpl = 'activity.html';
    }
    
    
    public function detail($activity_id){
        if(!($activity_id = (int)$activity_id) && !($activity_id = (int)$this->GP('activity_id'))){
            $this->error(404);
        }else if(!$detail = K::M('activity/activity')->detail($activity_id)){
            $this->error(404);
        }else{
            $this->pagedata['lanmu_list'] = K::M('activity/lanmu')->items_by_activity($activity_id);
            K::M('helper/seo')->init('activity_detail',array(
                        'title'=>$detail['title'],
                        'seo_title'=>$detail['seo_title'],
                        'seo_keywords'=>$detail['seo_keywords'],
                        'seo_description' => $detail['seo_description'],
                    ));
            $this->pagedata['detail'] = $detail;
            $this->tmpl = $detail['tmpl'] ? $detail['tmpl'] : 'activity_detail.html';
        }
    }
    
      public function yuyue($activity_id){
        if(!($activity_id = (int)$activity_id) && !($activity_id = (int)$this->GP('activity_id'))){
            $this->err->add('没有您要的数据', 404);
        }else if(!$detail = K::M('activity/activity')->detail($activity_id)){
            $this->err->add('没有您要的数据', 404);
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
                $this->tmpl = 'activity_yuyue.html';              
            }
        }
    }
    
}