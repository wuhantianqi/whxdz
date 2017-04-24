<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: widget.php 2415 2013-12-20 16:25:04Z youyi $
 */

class Widget_Attr extends Model 
{
	
	public function index(&$params)
	{
	}

    public function attr(&$params)
    {
		$params['tpl'] = $params['tpl'] ? $params['tpl'] : ($params['type']=='filter' ? 'attr-filter.html' : 'attr-form.html');
		$data['value'] = array();
		if($params['value']){
			if(!is_array($params['value'])){
				$data['value'] = explode(',', $params['value']);
			}
			$data['value'] = $params['value'];
		}
		if($params['from_id']){
			$data['attrs'] = K::M('data/attr')->attrs_by_from($params['from']);
		}else if($params['from']){
			$data['attrs'] = K::M('data/attr')->attrs_by_from($params['from']);
		}
        return $data;           
    }
    

    public function form(&$params)
    {
		$params['tpl'] = $params['tpl'] ? $params['tpl'] : 'attr-form.html';
		$data['value'] = array();
		if($params['value']){
			if(!is_array($params['value'])){
				$params['value'] = explode(',', $params['value']);
			}
			$data['value'] = $params['value'];
		}
        $data['attrs'] = K::M('data/attr')->attrs_by_from($params['from']);
        return $data;          	
    }
    
    public function  fromlimit(&$params){
        $params['tpl'] = $params['tpl'] ? $params['tpl'] : 'fromlimit.html';
		$data['value'] = array();
		if($params['value']){
			if(!is_array($params['value'])){
				$params['value'] = explode(',', $params['value']);
			}
            $data['value'] = $params['value'];
		}
        if($params['attr']){
             $data['attr'] = $params['attr'];
        }
        if($params['html']){
            $data['html'] = $params['html'] ;
        }else{
            $data['html'] = 'p';
        }
        $data['limit'] = isset($params['limit']) ? $params['limit'] : 10;
        $data['title'] = isset($params['title']) ? $params['title'] : 0;
        $data['attrs'] = K::M('data/attr')->attrs_by_from($params['from']);
        return $data;          	
    } 
    

    public function from(&$params)
    {
		$params['tpl'] = $params['tpl'] ? $params['tpl'] : 'widget:default/option.html';
		if($params['value']){
			if(!is_array($params['value'])){
				$params['value'] = explode(',', $params['value']);
			}
			$data['value'] = $params['value'];
		}		
		$data['options'] = K::M('data/attrfrom')->options();
		return $data;
    }
}