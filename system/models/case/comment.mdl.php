<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: comment.mdl.php 2335 2013-12-18 17:15:56Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Case_Comment extends Mdl_Table
{   
  
    protected $_table = 'case_comment';
    protected $_pk = 'comment_id';
    protected $_cols = 'comment_id,case_id,nickname,content,create_ip,dateline,audit';

    
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
    
    public function format_items_ext($items)
	{
        $case_id = array();
        foreach($items as $val){
            if($val['case_id']){
                $case_id[$val['case_id']] = $val['case_id'];
            }
        }
        if(!empty($case_id)){
            $case = K::M('case/case')->items_by_ids($case_id);
            foreach($items  as $k=>$v){
                $items[$k]['case'] = isset($case[$v['case_id']]) ? $case[$v['case_id']] : array();
            }
        }
        
		return $items;
	}

    
}