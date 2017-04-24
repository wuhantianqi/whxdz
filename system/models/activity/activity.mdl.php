<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: activity.mdl.php 4196 2014-03-26 11:20:30Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Activity_Activity extends Mdl_Table
{   
  
    protected $_table = 'activity';
    protected $_pk = 'activity_id';
    protected $_cols = 'activity_id,title,thumb,banner,phone,qq,addr,tmpl,bg_time,end_time,end_sign,sign_num,views,lng,lat,jt,sj,intro,info,orderby,audit,clientip,dateline';
    protected $_orderby = array('orderby'=>'ASC', 'activity_id'=>'DESC');

    protected $_hot_orderby = array('sign_num'=>'DESC', 'orderby'=>'ASC', 'activity_id'=>'DESC');
    protected $_hot_filter = array('audit'=>'1');
    protected $_new_orderby = array('activity_id'=>'DESC');
    protected $_new_filter = array('audit'=>'1');
    
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

    public function items_by_hot($filter=array(), $limit=20)
    {
        $filter['end_time'] = '>:'.__CFG::TIME;
        return parent::items_by_hot($filter, $limit);
    }

    protected function _format_row($row)
    {
        $row['expire'] = false;
        if($row['bg_time'] > __CFG::TIME){
            $row['expire_label'] = K::M('helper/format')->time($row['bg_time'], 'Y-m-d').'开始';
        }else if($row['end_time'] > __CFG::TIME){
            $row['expire_label'] = K::M('helper/format')->time($row['end_time'], 'Y-m-d').'结束';
        }else{
            $row['expire'] = true;
            $row['expire_label'] = '已经过期'; 
        }
        return $row;        
    }
}