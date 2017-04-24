<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */


if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Tuan extends Ctl
{   
    
    public function items($page = 1){
        $this->index($page);
    }
    
    public function index($page=1)
    {
        $filter = $pager = $url = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 9;
       if ($s = $this->GP('s')) {
            $pager['s'] = $s = htmlspecialchars($s);
            $filter['home_name'] = "LIKE:%" . $s . "%"; 
        }
        $filter['closed'] = 0;
        if($items = K::M('tuan/tuan')->items($filter, array('tuan_id'=>'desc'), $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('tuan:items', array('{page}')),  array('s' => $pager['s']));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        K::M('helper/seo')->init('tuan',array());
        $this->tmpl = 'tuan.html';
    }
    
    public function detail($tuan_id){    
        if(!($tuan_id = (int)$tuan_id) && !($tuan_id = (int)$this->GP('tuan_id'))){
            $this->error(404);
        }else if(!$detail = K::M('tuan/tuan')->detail($tuan_id)){
            $this->error(404);
        }else {
            $this->pagedata['detail'] = $detail;
            $this->pagedata['baoming'] = K::M('tuan/yuyue')->items(array('tuan_id'=>$tuan_id),null,1,20);
            
            K::M('helper/seo')->init('tuan_detail',array(
                'home_name' => $detail['home_name'],
                'title'  => $detail['title'],
            ));
            $this->tmpl = 'tuan_detail.html';
        }        
    }
    
    public function yuyue($tuan_id){
        if(!($tuan_id = (int)$tuan_id) && !($tuan_id = (int)$this->GP('tuan_id'))){
            $this->err->add('没有您要的数据', 211);
        }else if(!$detail = K::M('tuan/tuan')->detail($tuan_id)){
            $this->err->add('没有您要的数据', 212);
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
                $this->tmpl = 'tuan_yuyue.html';              
            }
        }
    }
    
}