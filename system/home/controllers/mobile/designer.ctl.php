<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_Mobile_Designer extends Ctl_Mobile {
    
    public function  index($page=1){
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 12;
        if ($items = K::M('designer/designer')->items(array(), null, $page, $limit, $count)) {
            foreach($items as $k=>$val){
                 $items[$k]['attr'] = K::M('designer/attr')->attrs_ids_by_designer($val['designer_id']);
                 $items[$k]['case'] = K::M('case/case')->items_by_designer($val['designer_id'],2);
                 $items[$k]['cate'] = K::M('cate/cate')->detail($val['cate_id']);
            }      
        }
        $this->pagedata['nextpage'] = $this->mklink('designer:loaddata',  array('page' => '{page}'), array(),false);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'mobile/designer.html';
    }
    
    public function loaddata($page =1){
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 12;
        if ($items = K::M('designer/designer')->items(array(), null, $page, $limit, $count)) {
            foreach($items as $k=>$val){
                 $items[$k]['attr'] = K::M('designer/attr')->attrs_ids_by_designer($val['designer_id']);
                 $items[$k]['case'] = K::M('case/case')->items_by_designer($val['designer_id'],2);
                 $items[$k]['cate'] = K::M('cate/cate')->detail($val['cate_id']);
            }      
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'mobile/designer_loaddata.html';
    }
    
       public function  detail($designer_id=null){
         if (!($designer_id = (int) $designer_id) && !($designer_id = (int)$this->GP('designer_id'))) {
            $this->error(404);
        } else if (!$detail = K::M('designer/designer')->detail($designer_id)) {
            $this->error(404);
        }else{
            $detail['cate'] = K::M('cate/cate')->detail($detail['cate_id']); 
            $this->pagedata['detail'] = $detail;
            if($attrs = K::M('designer/attr')->attrs_ids_by_designer($designer_id)){
                $this->pagedata['attrvalues'] = $attrs;
            }
            $filter['designer_id'] = $designer_id;
            $filter['audit'] = 1;
            $items = K::M('case/case')->items($filter, $order, 1, 2);
            $this->pagedata['items'] = $items;
            $this->pagedata['pager'] = $pager;
            K::M('designer/designer')->update_count($designer_id,'views');
            $this->tmpl = 'mobile/designer_detail.html';
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
                $this->pagedata['detail'] = $detail;
                $this->tmpl = 'mobile/designer_yuyue.html';              
            }
        }
    }
}
    