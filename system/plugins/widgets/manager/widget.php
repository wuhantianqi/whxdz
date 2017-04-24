<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: widget.php 2034 2013-12-07 03:08:33Z langzhong $
 */

class Widget_manager extends Model
{

	public function index(&$params)
	{
		$params['tpl'] = 'default.html';
        $data['data'] = K::M('manager/manager')->fetch_all();
        $data['selected'] = $params['selected'] ? $params['selected']  :0 ;
		return $data;
	}
    
    public function  indexlist(&$params){
        $params['tpl'] = 'widget/manager/index.html';
        $limit = empty($params['limit']) ? 7 : (int)$params['limit'];
        $items = K::M('manager/manager')->items(array(), array('views'=>'desc'), 1, $limit);
        foreach($items as $k=>$val){
            $items[$k]['attr'] = K::M('manager/attr')->attrs_ids_by_manager($val['manager_id']);
        }
		return $items;
    }

    
    
    public function casehot(&$params){
        $limit = empty($params['limit']) ? 5 : (int)$params['limit'];
        $filter = array('audit'=>1,'closed'=>0);
        if(isset($params['manager_id'])){
            $filter['manager_id'] = (int)$params['manager_id'];
        }
        
        $data['case'] = K::M('case/view')->items($filter, array('views'=>'desc'), 1, $limit);
        $manager_ids = array();
        foreach ($data['case'] as $k => $val) {
          if(!empty($val['manager_id'])){
              $manager_ids[$val['manager_id']] = $val['manager_id'];
          }
        }  
        if(!empty($manager_ids)){
            $data['manager'] = K::M('manager/manager')->items_by_ids($manager_ids);
        }
        $params['tpl'] =  'widget/manager/casehot.html';
        return $data;
    }
    
}