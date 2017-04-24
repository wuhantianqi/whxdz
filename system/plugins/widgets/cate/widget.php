<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: widget.php 2034 2013-12-07 03:08:33Z langzhong $
 */

class Widget_Cate extends Model
{

	public function index(&$params)
	{
		$params['tpl'] = 'default.html';
        $data['data'] = K::M('designer/designer')->fetch_all();
        $data['selected'] = $params['selected'] ? $params['selected']  :0 ;
		return $data;
	}
    
    public function  indexlist(&$params){
        $params['tpl'] = 'default.html';
        if(!$filter['from']=$params['from']){
            $filter['from'] = 'designer';
        }      
        $cate = K::M('cate/cate')->items($filter, array('orderby'=>'asc'), 1, null);
        $data['selected'] = $params['selected'] ? $params['selected']  :0 ;
        foreach($cate as $k=>$val){
            $data['data'][$k] = $val;
        }
		return $data;
    }
    
}