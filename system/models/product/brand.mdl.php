<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Product_Brand extends Mdl_Table
{   
  
    protected $_table = 'product_brand';
    protected $_pk = 'brand_id';
    protected $_cols = 'brand_id,brand_name';
    protected $_pre_cache_key = 'product_brand';
    
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
    
    public function  items_by_cat($cat_id){
        $brandids = K::M('product/maps')->brand_by_cat($cat_id);
        if(empty($brandids)) return array();
        return $this->items_by_ids($brandids);
    }
}