<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Cate_cate extends Mdl_Table
{   
  
    protected $_table = 'cate';
    protected $_pk = 'cate_id';
    protected $_cols = 'cate_id,cate_name,from,icon,orderby';
    protected $_orderby = array('from'=>'ASC','orderby'=>'DESC');
    protected $_pre_cache_key = 'cate-list';

    
    public function create($data, $checked=false)
    {
        if(!$checked && !$data = $this->_check_schema($data)){
            return false;
        }
        return $this->db->insert($this->_table, $data, true);
    }

    public function update($pk, $data, $checked=false)
    {
        $this->_checkpk();
        if(!$checked && !$data = $this->_check_schema($data,  $pk)){
            return false;
        }
        return $this->db->update($this->_table, $data, $this->field($this->_pk, $pk));
    }

    public function update_priv($cate_id, $priv)
    {
        $data = addslashes(serialize($priv));
        if($rs = $this->update($cate_id, array('priv'=>$data), true)){
            $this->clear_cache($cate_id);
        }
        return $rs;
    }

    public function options($from='designer')
    {
        $options = array();
        if($items = $this->fetch_all()){
            foreach($items as $v){
                if($v['from'] == $from){
                    $options[$v['cate_id']] = $v['cate_name'];
                }
            }
        }
        return $options;
    }

    public function items_by_from($from='designer')
    {
        $cate_list = array();
        if($items = $this->fetch_all()){
            foreach($items as $v){
                if($v['from'] == $from){
                    $cate_list[$v['cate_id']] = $v['cate_name'];
                }
            }
        }
        return $cate_list;
    }

    public function cate($cate_id)
    {
        if($items = $this->fetch_all()){
            return $items[$cate_id];
        }
        return false;
    }

    public function check_priv($gid, $priv, &$cate_name='')
    {
        if(!$cate = $this->cate($gid)){
            return -1;
        }
        $cate_name = $cate_name['cate_name'];
        if(isset($cate['priv'][$priv])) return (int)$cate['priv'][$priv];
        return 0;
    }

    public function default_cate($from='designer')
    {
        if($items = $this->fetch_all()){
            foreach($items as $v){
                if($v['from'] == $from){
                    return $v;
                }
            }
        }
        return false;
    }
}