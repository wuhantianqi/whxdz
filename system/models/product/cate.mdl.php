<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Product_Cate extends Mdl_Table
{   
  
    protected $_table = 'product_cate';
    protected $_pk = 'cat_id';
    protected $_cols = 'cat_id,cat_name,parent_id,orderby';
    protected $_pre_cache_key = 'product_cate';
    protected $_orderby = array('parent_id'=>'ASC', 'orderby'=>'ASC');
    
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
 
    public function children_ids($cat_id, $glue=',')
    {
        if(!$cat_id = (int)$cat_id){
            return false;
        }
        $cat_ids = array($cat_id=>$cat_id);
        if($items = $this->fetch_all()){
            foreach((array)$items as $k=>$v){
                if(in_array($v['parent_id'], $cat_ids)){
                    $cat_ids[$v['cat_id']] = $v['cat_id'];
                }
            }
        }
        return implode($glue, $cat_ids);
    }
    
}