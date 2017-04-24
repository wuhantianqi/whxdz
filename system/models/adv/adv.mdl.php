<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: adv.mdl.php 3142 2014-01-20 10:17:59Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Adv_Adv extends Mdl_Table
{   
    
    protected $_table = 'adv';
    protected $_pk = 'adv_id';
    protected $_cols = 'adv_id,theme,page,title,from,config,desc,orderby,audit,closed,dateline';
    protected $_orderby = array('orderby'=>'ASC', 'adv_id'=>'DESC');
    protected $_pre_cache_key = 'adv-adv-list';

    protected static $_allow_from = array('text'=>'文字广告','photo'=>'图片广告','product'=>'产品广告','lunzhuan'=>'轮转广告','script'=>'代码广告');


    public function detail($adv_id, $closed=false)
    {
        if(!$adv_id = intval($adv_id)){
            return false;
        }else if(!$detail = $this->adv($adv_id)){
            return false;
        }else{
            $detail['from_title'] = self::$_allow_from[$detail['from']];
            $detail['items'] = K::M('adv/item')->items_by_adv($adv_id);
        }
        return $detail;
    }
    
    public function adv($adv_id)
    {
    	if(!$adv_id = intval($adv_id)){
    		return false;
    	}else if($items = $this->fetch_all()){
    		return $items[$adv_id];
    	}
    	return false;
    }

    public function adv_by_name($name, $theme='default')
    {
        if(!$name = trim($name)){
            return false;
        }else if($items = $this->fetch_all()){
            $adv = array();
            foreach($items as $k=>$v){
                if($v['title'] == $name){
                    if($v['theme'] == $theme){
                        return $v;
                    }else if($v['theme'] == 'default'){
                        $adv = $v;
                    }
                }
            }
            return $adv;
        }
        return false;
    }

    public function from_list()
    {
        return self::$_allow_from;
    }

    public function block($params, $content, $smarty)
    {
        if($adv_id = intval($params['adv_id'])){
            if(!$detail = $this->detail($adv_id)){
                return false;
            }
        }else if($params['name']){
            if(!$adv = $this->adv_by_name($params['name'], $params['theme'])){
                return false;
            }else if(!$detail = $this->detail($adv['adv_id'])){
                return false;
            }           
        }else{
            return false;
        }

        $nums = intval($params['limit']);
        $order = strtolower($params['order']);
        $order = in_array($order,array('asc','desc','rand')) ? $order : "asc";
        if($items = $detail['items']){
       
            $items = array_values($items);
            if('desc' == $order){
                $items = array_reverse($items);
            }else if('rand' == $order){
                shuffle($items);
            }
            if($nums > 0){
                $items = array_slice($items,0,$nums);
            }
            $data = '';
            $smarty->assign('adv', $adv);
            $index = 0;
            foreach($items as $item){
                $index++;
                $smarty->assign('index',$index);
                $smarty->assign('item', $item);
                $data .= $smarty->fetch("string:{$content}");
            }
            return $data;
        }
        return false;
    }    

    public function create($data, $checked=false)
    {
        if(!$checked && !($data = $this->_check($data))){
            return false;
        }
        $data['dateline'] = __CFG::TIME;
        if($adv_id = $this->db->insert($this->_table, $data, true)){
            $this->flush();
        }
        return $adv_id;
    }

    public function update($adv_id, $data, $checked=false)
    {
        if(!$adv_id = intval($adv_id)){
            return false;
        }else if(!$checked && !($data = $this->_check($data,  $adv_id))){
            return false;
        }
        if($ret = $this->db->update($this->_table, $data, $this->field($this->_pk, $adv_id))){
            $this->flush();
        }
        return $ret;
    }

    protected function _format_row($row)
    {
        $row['config'] = unserialize($row['config']);
        return $row;
    }

    protected function _check($data, $adv_id=null)
    {
        unset($data['adv_id'], $data['dateline']);
        if(!$adv_id || isset($data['title'])){
            if(empty($data['title'])){
                $this->err->add(' 广告位名称不能为空', 401);
                return false;
            }
        }
        if(!$adv_id && empty($data['theme'])){
        	$data['theme'] = 'default';
        }
        if(!$adv_id || isset($data['from'])){
            $from_list = self::$_allow_from;
            $from = (string)$data['from'];
            if(empty($from_list[$from])){
                $data['from'] = 'text';
            }          
        }
        if(isset($data['config'])){
            $data['config'] = serialize($data['config']);
        }
        if(isset($data['orderby'])){
            $data['orderby'] = (int)$data['orderby'];
        }
        if(isset($data['audit'])){
            $data['audit'] = $data['audit'] ? 1 : 0;
        }
        return parent::_check($data);
    }        

}