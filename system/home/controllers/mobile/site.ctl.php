<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_Mobile_Site extends Ctl_Mobile {
    
    public function index($page = 1){
        $filter = $pager = $url = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;
        if($SO = $this->GP('SO')){
            if($SO['mobile']){
                $url['mobile'] = htmlspecialchars($SO['mobile']);
                $filter['mobile'] = $url['mobile'];
            }
        }
        if($items = K::M('site/site')->items($filter, null, $page, $limit, $count)){
            $designer_ids = array();
             foreach($items as $k=>$v){
                if($v['designer_id']){
                    $designer_ids[$v['designer_id']] = $v['designer_id'];
                }
            } 
            if(!empty($designer_ids)){
                $this->pagedata['designer_list'] = K::M('designer/designer')->items_by_ids($designer_ids);
            }
        }
        $this->pagedata['nextpage'] = $this->mklink('site:loaddata',  array('page' => '{page}'), array('SO'=>$url),false);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->pagedata['status'] = K::M('site/site')->get_status();
        $this->tmpl = 'mobile/site.html';      
    }
    
    public function loaddata($page = 1){
        
        $filter = $pager = $url = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;
        if($SO = $this->GP('SO')){
            if($SO['mobile']){
                $url['mobile'] = htmlspecialchars($SO['mobile']);
                $filter['mobile'] = $url['mobile'];
            }
        }
        if($items = K::M('site/site')->items($filter, null, $page, $limit, $count)){
            $designer_ids = array();
             foreach($items as $k=>$v){
                if($v['designer_id']){
                    $designer_ids[$v['designer_id']] = $v['designer_id'];
                }
            } 
            if(!empty($designer_ids)){
                $this->pagedata['designer_list'] = K::M('designer/designer')->items_by_ids($designer_ids);
            }
        }
        $this->pagedata['nextpage'] = $this->mklink('site:loaddata',  array('page' => '{page}'), array('SO'=>$url),false);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->pagedata['status'] = K::M('site/site')->get_status();
        $this->tmpl = 'mobile/site_loaddata.html';  
    }
    public function detail($site_id=0){
         if (!($site_id = (int) $site_id) && !($site_id = (int)$this->GP('site_id'))) {
            $this->error(404);
        }
        else if (!$detail = K::M('site/site')->detail($site_id)) {
           $this->error(404);
        } 
        else{
            $this->pagedata['attr'] = K::M('site/attr')->attrs_ids_by_site($site_id);
            $this->pagedata['detail'] = $detail;
            $this->pagedata['status'] = K::M('site/site')->get_status();
            $this->pagedata['designer'] = K::M('designer/designer')->detail($detail['designer_id']);
            $this->pagedata['items']  = K::M('site/notes')->items(array('site_id'=>$site_id), null, 1, 20);
            $this->tmpl = 'mobile/site_detail.html';
        }
    }
    public function yuyue($site_id){
        if(!($site_id = (int)$site_id) && !($site_id = (int)$this->GP('site_id'))){
            $this->error(404);
        }else if(!$detail = K::M('site/site')->detail($site_id)){
            $this->error(404);
        }else{
            if($this->checksubmit('data')){
               if(!$data = $this->GP('data')){
                    $this->err->add('非法的数据提交', 201);
                }else{
                    $data['site_id'] = $site_id;
                    if($yuyue_id = K::M('site/yuyue')->create($data)){
                        $obj = K::M('sms/sms');
                        $obj->send($data['mobile'],'sms_site_yuyue',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'site'=>$detail['title']));
                        $obj->admin('sms_admin_site',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'site'=>$detail['title']));
                         K::M('net/tongji')->commit('site',$yuyue_id,  $this->request['ismobile']);
                        $this->err->add('恭喜您预约成功');
                    }
                } 
            }else{
                $this->pagedata['detail'] = $detail;
                $this->tmpl = 'mobile/site_yuyue.html';              
            }
        }
    }
    
}