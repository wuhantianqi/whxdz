<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: block.mdl.php 3709 2014-03-10 05:55:52Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Block_Block extends Mdl_Table
{   
  
 

    public function calldata($params, $content, $smarty)
    {
   
        if(!$mdl = K::M($params['mdl'])){
            return false;
        }
       
        $hash = $params['hash'] ? $params['hash'] : md5(var_export($params, true));
        $ttl = $params['ttl'] ? $params['ttl'] : 3600;
        $nocache = isset($params['nocache']) ? $params['nocache'] : ($ttl < 0 ? true : false);
        $noext = isset($params['noext']) ? $params['noext'] : false;
        if(!$nocache && !$items = $this->cache->get($hash)){
            $limit = $params['limit'] ? (int)$params['limit'] : 10;
            $filter = $params;
            unset($filter['mdl'], $filter['order'], $filter['limit'], $filter['hash'], $filter['ttl'], $filter['nocache']);
            if(!empty($from)) unset($filter['from']); //有地方需要用到 from
            $items = array();
            if('hot' == $params['order']){
                $items = $mdl->items_by_hot($filter, $limit);
            }else if('new' == $params['order']){
                $items = $mdl->items_by_new($filter, $limit);
            }else{
                $filter['closed'] = 0;
                $filter['audit'] = 1;
                $order = $this->_parse_orderby($params['order']);
                $items = $mdl->items($filter, $order, 1, $limit);
            }
            if(empty($noext)){
                $items = $mdl->format_items_ext($items);
            }
            if(empty($nocache)){
                $this->cache->set($hash, $items, $ttl);
            }
        }
        if($items){
            $data = '';
            $index = 0;
            $iteration = 1;
            $count = count($items);
            $smarty->assign('count', $count);
            $smarty->assign('limit', $limit);
            $smarty->assign('first', true);
            foreach($items as $item){
                $smarty->assign('index', $index++);
                $smarty->assign('iteration', $iteration++);
                if($count>$index){
                    $smarty->assign('last', false);
                }else{
                   $smarty->assign('last', true); 
                }
                $smarty->assign('item', $item);
                $data .= $smarty->fetch("string:{$content}");
                $smarty->assign('first', false);
            }
            return $data;
        }
        return false;
    }

    protected function _parse_orderby($order=null)
    {
        $orderby = array();
        if(is_array($order)){
            return $order;
        }else if($order && is_string($order)){
            foreach(explode(',', $order) as $v){
                if(strpos($v, ':')){
                    if(list($key, $val) = explode(':', $v)){
                        $val = strtoupper($val);
                        if(in_array($val, array('ASC', 'DESC'))){
                            $orderby[$key] = $val;
                        }
                    }
                }
            }
        }
        return $orderby;      
    }
}