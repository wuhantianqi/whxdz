<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

class Ctl_Manager extends Ctl 
{
    public function items($page = 1)
    {
        $this->index($page);
    }
    
    public function  index($page=1)
    {
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 12;
        
       if ($s = $this->GP('s')) {
            $pager['s'] = $s = htmlspecialchars($s);
            $filter['name'] = "LIKE:%" . $s . "%"; 
        }
        if ($items = K::M('manager/manager')->items(array(), null, $page, $limit, $count)) {
            foreach($items as $k=>$val){
                 $items[$k]['attr'] = K::M('manager/attr')->attrs_ids_by_manager($val['manager_id']);
                 $items[$k]['site'] = K::M('site/site')->items_by_manager($val['manager_id'],4);
                 $items[$k]['cate'] = K::M('cate/cate')->detail($val['cate_id']);
            }    
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('manager:items', array('{page}')),  array('s' => $pager['s']));
        }
        $renqi = K::M('manager/manager')->items(array(), array('views'=>'desc'), 1, 10);
        
        foreach($renqi as $k=>$val){
            $renqi[$k]['attr'] = K::M('manager/attr')->attrs_ids_by_manager($val['manager_id']);
        }
        $this->pagedata['renqi'] = $renqi;
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        K::M('helper/seo')->init('pcmanager',array());
        $this->tmpl = 'manager.html';
    }
    
    public function  detail($manager_id=null, $page=1)
    {
         if (!($manager_id = (int) $manager_id) && !($manager_id = (int)$this->GP('manager_id'))) {
            $this->error(404);
        } else if (!$detail = K::M('manager/manager')->detail($manager_id)) {
            $this->error(404);
        }else{
            $renqi = K::M('manager/manager')->items(array(), array('views'=>'desc'), 1, 8);

            foreach($renqi as $k=>$val){
                $renqi[$k]['attr'] = K::M('manager/attr')->attrs_ids_by_manager($val['manager_id']);
            }
            $detail['cate'] = K::M('cate/cate')->detail($detail['cate_id']);
            $this->pagedata['renqi'] = $renqi;
            $this->pagedata['detail'] = $detail;
            if($attrs = K::M('manager/attr')->attrs_ids_by_manager($manager_id)){
                $this->pagedata['attrvalues'] = $attrs;
            }
            
            $filter = $pager = array();
            $pager['page'] = max(intval($page), 1);
            $pager['limit'] = $limit = 12;
            $filter['manager_id'] = $manager_id;
            $filter['audit'] = 1;
            $filter['closed'] = 0;
            if ($items = K::M('site/site')->items($filter, $order, $page, $limit, $count)) {
                $pager['count'] = $count;
                $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('manager:detail',  array($manager_id,  '{page}')));
            }
            $this->pagedata['items'] = $items;
            $this->pagedata['pager'] = $pager;
            K::M('manager/manager')->update_count($manager_id,'views');
            K::M('helper/seo')->init('pcmanager_detail',array());
            $this->tmpl = 'manager_detail.html';
        }       
    }
    
    
    public function yuyue($manager_id){
        if(!($manager_id = (int)$manager_id) && !($manager_id = (int)$this->GP('manager_id'))){
            $this->error(404);
        }else if(!$detail = K::M('manager/manager')->detail($manager_id)){
            $this->error(404);
        }else{
            if($this->checksubmit('data')){
               if(!$data = $this->GP('data')){
                    $this->err->add('非法的数据提交', 201);
                }else{
                    $data['manager_id'] = $manager_id;
                    if($yuyue_id = K::M('manager/yuyue')->create($data)){
                        $obj = K::M('sms/sms');
                        $obj->send($data['mobile'],'sms_manager_yuyue',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'manager'=>$detail['name']));
                        $obj->admin('sms_admin_manager',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'manager'=>$detail['name']));
                        K::M('net/tongji')->commit('manager',$yuyue_id,  $this->request['ismobile']);
                        $this->err->add('预约成功！');
                    }
                } 
            }else{
                $this->pagedata['manager'] = $detail;
                $this->tmpl = 'manager_yuyue.html';              
            }
        }
    }
    
}