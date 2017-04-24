<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: view.mdl.php 2335 2013-12-18 17:15:56Z youyi $
 */


if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Case_View extends Mdl_Table
{   
    protected $_table = 'case';
    protected $_pk = 'case_id';
    
    public function items($filter=array(), $orderby=null, $p=1, $l=20, &$count=0)
    {
        if($attrs = $filter['attrs']){
            $attr_ids = join(',',$attrs);
            $attr_count = array_sum($attrs);
            $attr_sql = "SELECT case_id FROM ".$this->table('case_attr')." WHERE attr_value_id IN($attr_ids) GROUP BY case_id HAVING SUM(attr_value_id)=$attr_count";
        }
      
        unset($filter['attrs']);
        $where = $this->where($filter);
        if($attr_sql){
            $where .= " AND case_id IN($attr_sql)";
        }
        $orderby = $this->order($orderby, null);
        $limit = $this->limit($p, $l);
        $items = array();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM ".$this->table($this->_table)."  WHERE $where $orderby $limit";
      
        if($rs = $this->db->query($sql)){
            while($row = $rs->fetch()){
                $row = $this->_format_row($row);
                if($this->_pk){
                    $items[$row[$this->_pk]] = $row;
                }else{
                    $items[] = $row;
                }
            }
            $count = $this->db->GetOne("SELECT FOUND_ROWS()");
        }
        return $items;
    }
    
    
}