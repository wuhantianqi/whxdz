<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_Mobile_Tuan extends Ctl_Mobile {
    
     public function index($page=1)
    {
        $filter = $pager = $url = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;
         if($SO = $this->GP('SO')){
            if($SO['title']){
                $url['title'] = htmlspecialchars($SO['title']);
                $this->pagedata['so_title'] = $url['title'];
                $filter['home_name'] = "LIKE:%".$url['title']."%";
           
            }
        }
        $filter['closed'] = 0;
        $items = K::M('tuan/tuan')->items($filter, array('tuan_id'=>'desc'), $page, $limit);
        $this->pagedata['nextpage'] = $this->mklink('tuan:loaddata',  array('page' => '{page}'), array('SO'=>$url),false);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
       
        $this->tmpl = 'mobile/tuan.html';
    }
    
    public function  loaddata($page=1){
        $filter = $pager = $url = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;
         if($SO = $this->GP('SO')){
            if($SO['title']){
                $url['title'] = htmlspecialchars($SO['title']);
                $this->pagedata['so_title'] = $url['title'];
                $filter['home_name'] = "LIKE:%".$url['title']."%";
           
            }
        }
        $filter['closed'] = 0;
        $items = K::M('tuan/tuan')->items($filter, array('tuan_id'=>'desc'), $page, $limit);
        $this->pagedata['nextpage'] = $this->mklink('tuan:loaddata',  array('page' => '{page}'), array('SO'=>$url),false);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'mobile/tuan_loaddata.html';
        
    }
    public function detail($tuan_id){    
        if(!($tuan_id = (int)$tuan_id) && !($tuan_id = (int)$this->GP('tuan_id'))){
            $this->error(404);
        }else if(!$detail = K::M('tuan/tuan')->detail($tuan_id)){
            $this->error(404);
        }else {
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'mobile/tuan_detail.html';
        }        
    }
   public function yuyue($tuan_id){
        if(!($tuan_id = (int)$tuan_id) && !($tuan_id = (int)$this->GP('tuan_id'))){
            $this->error(404);
        }else if(!$detail = K::M('tuan/tuan')->detail($tuan_id)){
            $this->error(404);
        }else{
            if($this->checksubmit('data')){
               if(!$data = $this->GP('data')){
                    $this->err->add('非法的数据提交', 201);
                }else{
                    $data['tuan_id'] = $tuan_id;
                    if($yuyue_id = K::M('tuan/yuyue')->create($data)){
                        K::M('tuan/tuan')->update_count($tuan_id,'sign_num');
                        $obj = K::M('sms/sms');
                        $obj->send($data['mobile'],'sms_tuan_yuyue',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'tuan'=>$detail['home_name']));
                        $obj->admin('sms_admin_tuan',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'tuan'=>$detail['home_name']));
                        K::M('net/tongji')->commit('tuan',$yuyue_id,  $this->request['ismobile']);
                        $this->err->add('添加内容成功');
                    }
                } 
            }else{
                $this->pagedata['detail'] = $detail;
                $this->tmpl = 'mobile/tuan_yuyue.html';              
            }
        }
    }         
            
    
}