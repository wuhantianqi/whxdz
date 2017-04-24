<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: widget.php 5340 2014-05-26 06:36:27Z langzhong $
 */

class Widget_Case extends Model
{

    public function index(&$params)
    {
		$params['tpl']      = $params['tpl'] ? $params['tpl'] :  'widget/case/default.html'; 
        $params['limit']    = $params['limit'] ? $params['limit'] : 7;    
        $items = K::M('case/case')->items(array('audit'=>1,'closed'=>0),array('orderby'=>'desc','views'=>'desc'),1,$params['limit']);
        $designer_ids = array();
        foreach($items as $k=>$v){ 
            $items[$k]['attr'] = K::M('case/attr')->attrs_ids_by_case($v['case_id']);
        } 
        $data['data'] = $items; 
        return $data;
    }
	
	
	
    
	public function cate (&$params){
		$attr_values = K::M('data/attr')->attrs_by_from('zx:case');
        $attr_keys = array();
        foreach ($attr_values as $key => $value) {
            $http_key['attr' . $key] = 0;
        }
        
        $url = array();
        foreach ($attr_values as $key => $value) {
            foreach ($value['values'] as $k => $v) {
                $link = K::M('helper/link')->mklink('case:items', array_merge($http_key, array('attr' . $key => $k)), array(), true);
                $url[] = array('title'=>$v['title'],'link'=>$link); 
            }
        }
		shuffle($url);
        $data['url'] = $url;
        $params['tpl'] = $params['tpl'] ? $params['tpl'] :  'widget/case/cate.html'; 
        return $data;
	}
	
	
	
	
	
    public function cloud(&$params){
        $attr_values = K::M('data/attr')->attrs_by_from('zx:case');
        $attr_keys = array();
        foreach ($attr_values as $key => $value) {
            $http_key['attr' . $key] = 0;
        }
        
        $url = array();
        foreach ($attr_values as $key => $value) {
            foreach ($value['values'] as $k => $v) {
                $link = K::M('helper/link')->mklink('case:items', array_merge($http_key, array('attr' . $key => $k)), array(), true);
                $url[] = '{text: "'.$v['title'].'", weight: '.rand(1,10).', link: "'.$link.'"}';
            }
        }
        $data['cloud_words'] = join(',',$url);
        $params['tpl'] = $params['tpl'] ? $params['tpl'] :  'cloud.html'; 
        return $data;
        
    }
    
    
}