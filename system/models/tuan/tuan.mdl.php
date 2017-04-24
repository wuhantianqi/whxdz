<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Tuan_Tuan extends Mdl_Table
{   
  
    protected $_table = 'tuan';
    protected $_pk = 'tuan_id';
    protected $_cols = 'tuan_id,home_name,home_kfs,home_addr,title,face_pic,youhui,end_time,sign_num,contents,closed';
    
    protected $_hot_orderby = array('sign_num'=>'DESC',  'tuan_id'=>'DESC');
    
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
    
    protected function _format_row($row)
	{
        $row['endtime'] = strtotime($row['end_time']) - __TIME;
        $row['endtime'] = $row['endtime']> 0 ? $row['endtime']:0;
		return $row;
	}

    public function items_by_hot($filter=array(),$limit=20)
    {
        $hot_filter['end_time'] = '>:'.__CFG::TIME;;
        $filter['closed'] = 0;
        $filter = array_merge($hot_filter, (array)$filter);
        return $this->items($filter, $this->_hot_orderby, 1, $limit);        
    }

    public function format_items_ext($items)
	{
        foreach($items as $k=>$v){
            $endtime = strtotime($v['end_time']) - __TIME;
            $items[$k]['endtime'] = $endtime > 0 ? $endtime:0;
        } 
		return $items;
	}
    
}