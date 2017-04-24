<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Product_Product extends Mdl_Table
{   
  
    protected $_table = 'product';
    protected $_pk = 'product_id';
    protected $_cols = 'product_id,product_name,cat_id,brand_id,price,my_price,face_pic,content,yue_num';
    
    protected $_orderby = array('product_id'=>'desc');
    protected $_hot_orderby = array('yue_num'=>'desc','product_id'=>'desc');
    protected $_hot_filter = array();
    
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
}