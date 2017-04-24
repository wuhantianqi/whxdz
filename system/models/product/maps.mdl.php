<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: attr.mdl.php 2216 2013-12-16 06:39:13Z langzhong $
 */

class Mdl_Product_Maps extends Mdl_Table
{   
  
    protected $_table = 'product_cate_maps';
    protected $_pk = 'cat_id,brand_id';
    protected $_cols = 'cat_id,brand_id';
   
    public function update($cat_id, $data, $checked=false)
    {
        if(!$checked && !$cat_id = intval($cat_id)){
            return false;
        }
        $sql = array();
        foreach((array)$data as $v){
            if(is_numeric($v)){
                $sql[] = "('{$cat_id}', '{$v}')";
            }
        }
        $this->db->Execute("DELETE FROM ".$this->table($this->_table)." WHERE cat_id='$cat_id'");
        if($sql){
            $sql = "INSERT INTO ".$this->table($this->_table)." VALUES".implode(',', $sql);
            $this->db->Execute($sql);
        }
    }

    public function brand_by_cat($cat_id)
    {
        if(!$cat_id = intval($cat_id)){
            return false;
        }
        $return = array();
        $sql = "SELECT * FROM ".$this->table($this->_table)." WHERE cat_id='$cat_id'";
        if($rs = $this->db->Execute($sql)){
            while($row = $rs->fetch()){
                $return[] = $row['brand_id'];
            }
        }
        return $return;
    } 
  
}