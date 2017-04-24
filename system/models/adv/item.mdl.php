<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: item.mdl.php 3171 2014-01-22 09:42:54Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Adv_Item extends Mdl_Table
{   
  
    protected $_table = 'adv_item';
    protected $_pk = 'item_id';
    protected $_cols = 'item_id,adv_id,city_ids,title,link,thumb,script,clicks,stime,ltime,desc,target,orderby,closed,dateline';
    protected $_orderby = array('orderby'=>'ASC', 'item_id'=>'ASC');
    protected $_pre_cache_key = 'adv-item-list';
    
    public function create($data)
    {
        if(!$data = $this->_check($data)){
            return false;
        }
        $data['dateline'] = __CFG::TIME;
        if($item_id = $this->db->insert($this->_table, $data, true)){
            $this->flush();
        }
        return $item_id;
    }

    public function update($item_id, $data, $checked=false)
    {
        if(!$item_id = intval($item_id)){
            return false;
        }else if(!$checked && !($data = $this->_check($data,  $item_id))){
            return false;
        }
        if($ret = $this->db->update($this->_table, $data, $this->field($this->_pk, $item_id), true)){
            $this->flush();
        }
        return $ret;
    }

    public function items_by_adv($adv_id)
    {
        $items = array();
        if(!$adv_id = intval($adv_id)){
            return false;
        }else if($ret = $this->fetch_all()){
            foreach($ret as $k=>$v){
                if($v['adv_id'] == $adv_id){
                    $items[$k] = $v;
                }
            }
        }
        return $items;
    }

    public function item($item_id)
    {
        if(!$item_id = intval($item_id)){
            return false;
        }else if($items = $this->fetch_all()){
            return $items[$item_id];
        }
        return false;
    }

    protected function _format_row($row)
    {
        $row['city_ids'] = empty($row['city_ids']) ? array() : implode(',', (array)$row['city_ids']);
        $row['stime_format'] = empty($row['stime']) ? 0 : date('Y-m-d', $row['stime']);
        $row['ltime_format'] = empty($row['ltime']) ? 0 : date('Y-m-d', $row['ltime']);
        return $row;
    }

    protected function _check($data, $item_id=null)
    {
        if(!$item_id || isset($data['title'])){
            if(empty($data['title'])){
                $this->err->add('广告标题不能为空', 451);
                return false;
            }
        }
        if(!$item_id || isset($data['adv_id'])){
            if(!$data['adv_id'] = intval($data['adv_id'])){
                $this->err->add(' 未指定要保存到的广告位', 452);
                return false;
            }
        }
        if(isset($data['stime'])){
            $data['stime'] = empty($data['stime']) ? 0 : strtotime($data['stime']);
        }
        if(isset($data['ltime'])){
            $data['ltime'] = empty($data['ltime']) ? 0 : strtotime($data['ltime']);
        }
       
        return parent::_check($data);       
    }
}