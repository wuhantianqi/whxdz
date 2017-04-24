<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: widget.php 2034 2013-12-07 03:08:33Z langzhong $
 */

class Widget_Product extends Model
{

	public function cate(&$params)
	{
		$params['tpl'] = 'cate.html';
        $data['cate'] = K::M('product/cate')->fetch_all();
        $data['selected'] = isset($params['selected']) ? $params['selected'] : 0;
		return $data;
	}
    
    public function brand(&$params){
        $params['tpl'] = 'brand.html';
        //$data['brand'] = K::M('product/brand')->items_by_cat($params['cat_id']);
        $data['brand'] = K::M('product/brand')->fetch_all();
        $data['selected'] = isset($params['selected']) ? $params['selected'] : 0;
		return $data;
    }
    
}