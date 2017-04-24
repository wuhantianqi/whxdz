<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: widget.php 3464 2014-02-25 09:09:38Z langzhong $
 */

class Widget_Home extends Model
{

    
    public function index(&$params)
    {
		$data['limit'] = $params['limit'] ? $params['limit'] : 4;
        $filter = array('audit'=>1);
        $tuan = K::M('tuan/tuan')->items($filter,array('tuan_id'=>'DESC') , 1,$data['limit']);
        foreach($tuan as $key=>$val){
            $tuan[$key]['end_time'] = strtotime($val['end_time']) - __TIME + rand(0,99);
        }
        $data['tuan'] = $tuan;
        $params['tpl'] = $params['tpl'] ? $params['tpl']  : 'index.html'; 
        return $data;        
    }
  
  
    
    public function site(&$params){
        $data['limit'] = $params['limit'] ? $params['limit'] : 4;
     
        $filter = array('audit'=>1);
        if($params['city_id']){
            $filter['city_id'] = (int)$params['city_id'];
        }
        $site = K::M('home/site')->items($filter,array('site_id'=>'DESC') , 1,$data['limit']);
        $siteCfg = K::M('home/site')->get_status(); 
        
        foreach($site  as $k=>$val){
            $site[$k]['status_means'] = isset($siteCfg[$val['status']]) ?  $siteCfg[$val['status']] : '';
        }
        $data['site'] = $site;
        $params['tpl'] = 'site.html'; 
        return $data;
    }
    
    
    public function tuan(&$params){
  
        $params['home_id'] = (int)$params['home_id'];
        if(empty($params['home_id'])) return;     
        $tuan = K::M('home/tuan')->detail_by_home_id($params['home_id']);
        if(!empty($tuan)){
            $tuan['end_time'] =  strtotime($tuan['end_time']) - __TIME;
            $data['tuan'] = $tuan;
        }
        $data['home'] = K::M('home/main')->detail($params['home_id']);
        $params['tpl'] = 'tuan.html'; 
        return $data;
    }
    
   
}