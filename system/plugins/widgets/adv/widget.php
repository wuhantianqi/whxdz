<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: widget.php 6072 2014-08-12 12:23:29Z youyi $
 */

class Widget_Adv extends Model
{

    public function index(&$params)
    {
        $data = $params;
        if($adv_id = intval($params['adv_id'])){
            if(!$detail = K::M('adv/adv')->detail($adv_id)){
                return false;
            }
        }else if($params['name']){
            if(!$theme = $params['theme']){
                $theme = TPL_THEME;
            }
            if(!$adv = K::M('adv/adv')->adv_by_name($params['name'], $theme)){
                return false;
            }else if(!$detail = K::M('adv/adv')->detail($adv['adv_id'])){
                return false;
            }
        }else{
            return false;
        }
        $data['adv'] = $detail;
        if(empty($params['tpl'])){
            $params['tpl'] = "adv_{$adv[from]}.html";
        }
        
        $nums = intval($params['limit']);
        $order = strtolower($params['order']);
        $order = in_array($order,array('asc','desc','rand')) ? $order : "asc";
        if($items = $detail['items']){
            $item_list = array();
            foreach($items as $k=>$v){
                if($v['stime'] && ($v['stime'] > __TIME)){
                    continue;
                }else if($v['ltime'] && ($v['ltime'] < __TIME)){
                    continue;
                }
                $item_list[$k] = $v;
            }
            if(empty($item_list)){
                return false;
            }
            $item_list = array_values($item_list);
            if('desc' == $order){
                $item_list = array_reverse($item_list);
            }else if('rand' == $order){
                shuffle($item_list);
            }
            if($nums > 0){
                $item_list = array_slice($item_list,0,$nums);
            }
            $data['items'] = $item_list;
        }
        return $data;
    }
}