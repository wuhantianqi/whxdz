<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: site.mdl.php 2196 2013-12-14 11:19:20Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Site_Site extends Mdl_Table
{   
  
    protected $_table = 'site';
    protected $_pk = 'site_id';
    protected $_cols = 'site_id,title,designer_id,manager_id,views,face_pic,addr,status,audit,intro,dateline,create_ip,mobile';

    protected $_orderby = array('site_id'=>'DESC');
    protected $_hot_orderby = array('views'=>'DESC',  'site_id'=>'DESC');
    protected $_hot_filter = array('closed'=>'0');

    
    protected $_status = array(1=>'开工大吉',2=>'水电改造',3=>'泥瓦工阶段',4=>'木工阶段',5=>'油漆阶段',6=>'安装',7=>'验收完成');
    
    public function get_status(){
        
        return $this->_status;
    }

    public function create($data, $checked=false)
    {
        if(!$checked && !$data = $this->_check_schema($data)){
            return false;
        }
        return $this->db->insert($this->_table, $data, true);
    }

    public function items_by_manager($manager_id,$num=2){
        $manager_id = (int)$manager_id;
        $num = (int)$num;
        $sql = "SELECT  * FROM ".$this->table($this->_table)." WHERE manager_id={$manager_id} AND audit=1  limit {$num} ";
        $items = array(); 
        if($rs = $this->db->query($sql)){
            while($row = $rs->fetch()){
                $items[$row[$this->_pk]] = $row;
            }
        }
        return $items;
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
        $row['status_title'] = $this->_status[$row['status']];
        return $row;
    }
    
    public function format_items_ext($items)
	{   
        $manager_id = array();
        foreach($items as $k=>$val){
            if($attr = K::M('site/attr')->attrs_ids_by_site($val['site_id'])){
                $items[$k]['attr'] = $attr; 
            }
            if($val['manager_id']) {
                $manager_id[$val['manager_id']] = $val['manager_id'];
            }
            $items[$k]['cfg'] = $this->_status;
        }
        if(!empty($manager_id)){
            $manager = K::M('manager/manager')->items_by_ids($manager_id);
            foreach($items as $k=>$v){
                $items[$k]['manager'] = isset($manager[$v['manager_id']]) ? $manager[$v['manager_id']] : array();
            }
        }
		return $items;
	}    
}