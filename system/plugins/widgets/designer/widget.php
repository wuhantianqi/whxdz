<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: widget.php 2034 2013-12-07 03:08:33Z langzhong $
 */

class Widget_Designer extends Model
{

	public function index(&$params)
	{
		$params['tpl'] = 'default.html';
        $data['data'] = K::M('designer/designer')->fetch_all();
        $data['selected'] = $params['selected'] ? $params['selected']  :0 ;
		return $data;
	}
    
    public function  indexlist(&$params){
        $params['tpl'] = 'widget/designer/index.html';
        $limit = empty($params['limit']) ? 7 : (int)$params['limit'];
        $items = K::M('designer/designer')->items(array(), array('views'=>'desc'), 1, $limit);
        foreach($items as $k=>$val){
            $items[$k]['attr'] = K::M('designer/attr')->attrs_ids_by_designer($val['designer_id']);
        }
		return $items;
    }

    
    
    public function casehot(&$params){
        $limit = empty($params['limit']) ? 5 : (int)$params['limit'];
        $filter = array('audit'=>1,'closed'=>0);
        if(isset($params['designer_id'])){
            $filter['designer_id'] = (int)$params['designer_id'];
        }
        
        $data['case'] = K::M('case/view')->items($filter, array('views'=>'desc'), 1, $limit);
        $designer_ids = array();
        foreach ($data['case'] as $k => $val) {
          if(!empty($val['designer_id'])){
              $designer_ids[$val['designer_id']] = $val['designer_id'];
          }
        }  
        if(!empty($designer_ids)){
            $data['designer'] = K::M('designer/designer')->items_by_ids($designer_ids);
        }
        $params['tpl'] =  'widget/designer/casehot.html';
        return $data;
    }
    
}