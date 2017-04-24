<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Site extends Ctl
{   
    
    public function items($page = 1){
        $this->index($page);
    }
    
    public function index($page=1)
    {
        
        $filter = $pager = $url = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 10;
        if ($s = $this->GP('s')) {
            $pager['s'] = $s = htmlspecialchars($s);
            $filter['title'] = "LIKE:%" . $s . "%"; 
        }
        if($items = K::M('site/site')->items($filter, null, $page, $limit, $count)){
            $manager_ids = array();
             foreach($items as $k=>$v){
                if($v['manager_id']){
                    $manager_ids[$v['manager_id']] = $v['manager_id'];
                }
                if($attr = K::M('site/attr')->attrs_ids_by_site($v['site_id'])){
                $items[$k]['attr'] = $attr; 
            }
            } 
            if(!empty($manager_ids)){
                $this->pagedata['manager_list'] = K::M('manager/manager')->items_by_ids($manager_ids);
            }
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('site:items', array('{page}')), array('s' => $pager['s']));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->pagedata['status'] = K::M('site/site')->get_status();
        
        K::M('helper/seo')->init('site',array());
        $this->tmpl = 'site.html';
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
            $this->pagedata['manager'] = K::M('manager/manager')->detail($detail['manager_id']);
            $this->pagedata['items']  = K::M('site/notes')->items(array('site_id'=>$site_id), null, 1, 20);
            K::M('site/site')->update_count($site_id,'views');
            K::M('helper/seo')->init('site_detail',array('site'=>$detail['title'],'addr'=>$detail['addr']));
            $this->tmpl = 'site_detail.html';
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
                $this->pagedata['site'] = $detail;
                $this->tmpl = 'site_yuyue.html';              
            }
        }
    }
    
    
    
}