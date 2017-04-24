<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

class Ctl_Designer extends Ctl 
{
    public function items($page = 1)
    {
        $this->index($page);
    }
    
    public function  index($page=1)
    {
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 8;
        
       if ($s = $this->GP('s')) {
            $pager['s'] = $s = htmlspecialchars($s);
            $filter['name'] = "LIKE:%" . $s . "%"; 
        }
        if ($items = K::M('designer/designer')->items(array(), null, $page, $limit, $count)) {
            foreach($items as $k=>$val){
                 $items[$k]['attr'] = K::M('designer/attr')->attrs_ids_by_designer($val['designer_id']);
                 $items[$k]['case'] = K::M('case/case')->items_by_designer($val['designer_id'],4);
                 $items[$k]['cate'] = K::M('cate/cate')->detail($val['cate_id']);
                 $items[$k]['team'] = K::M('cate/cate')->detail($val['team_id']);
            }    
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('designer:items', array('{page}')),  array('s' => $pager['s']));
        }
        $renqi = K::M('designer/designer')->items(array(), array('views'=>'desc'), 1, 10);
        
        foreach($renqi as $k=>$val){
            $renqi[$k]['attr'] = K::M('designer/attr')->attrs_ids_by_designer($val['designer_id']);
        }
        $this->pagedata['renqi'] = $renqi;
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        K::M('helper/seo')->init('designer',array());
        $this->tmpl = 'designer.html';
    }
    
    public function  detail($designer_id=null, $page=1)
    {
         if (!($designer_id = (int) $designer_id) && !($designer_id = (int)$this->GP('designer_id'))) {
            $this->error(404);
        } else if (!$detail = K::M('designer/designer')->detail($designer_id)) {
            $this->error(404);
        }else{
            $renqi = K::M('designer/designer')->items(array(), array('views'=>'desc'), 1, 8);

            foreach($renqi as $k=>$val){
                $renqi[$k]['attr'] = K::M('designer/attr')->attrs_ids_by_designer($val['designer_id']);
            }
            $detail['cate'] = K::M('cate/cate')->detail($detail['cate_id']); 
            $detail['team'] = K::M('cate/cate')->detail($detail['team_id']); 
            $this->pagedata['renqi'] = $renqi;
            $this->pagedata['detail'] = $detail;
            if($attrs = K::M('designer/attr')->attrs_ids_by_designer($designer_id)){
                $this->pagedata['attrvalues'] = $attrs;
            }
            
            $filter = $pager = array();
            $pager['page'] = max(intval($page), 1);
            $pager['limit'] = $limit = 12;
            $filter['designer_id'] = $designer_id;
            $filter['audit'] = 1;
            $filter['closed'] = 0;
            if ($items = K::M('case/case')->items($filter, $order, $page, $limit, $count)) {
                $pager['count'] = $count;
                $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('designer:detail',  array($designer_id,  '{page}')));
            }
            $this->pagedata['items'] = $items;
            $this->pagedata['pager'] = $pager;
            K::M('designer/designer')->update_count($designer_id,'views');
            K::M('helper/seo')->init('designer_detail',array('name'=>$detail['name']));
            $this->tmpl = 'designer_detail.html';
        }       
    }
    
    
    public function yuyue($designer_id){
        if(!($designer_id = (int)$designer_id) && !($designer_id = (int)$this->GP('designer_id'))){
            $this->error(404);
        }else if(!$detail = K::M('designer/designer')->detail($designer_id)){
            $this->error(404);
        }else{
            if($this->checksubmit('data')){
               if(!$data = $this->GP('data')){
                    $this->err->add('非法的数据提交', 201);
                }else{
                    $data['designer_id'] = $designer_id;
                    if($yuyue_id = K::M('designer/yuyue')->create($data)){
                        $obj = K::M('sms/sms');
                        $obj->send($data['mobile'],'sms_designer_yuyue',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'designer'=>$detail['name']));
                        $obj->admin('sms_admin_designer',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'designer'=>$detail['name']));
                        K::M('net/tongji')->commit('designer',$yuyue_id,  $this->request['ismobile']);
                        $this->err->add('预约成功！');
                    }
                } 
            }else{
                $this->pagedata['designer'] = $detail;
                $this->tmpl = 'designer_yuyue.html';              
            }
        }
    }
    
}