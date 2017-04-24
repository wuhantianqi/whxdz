<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Manager_Manager extends Mdl_Table
{   
  
    protected $_table = 'manager';
    protected $_pk = 'manager_id';
    protected $_cols = 'manager_id,cate_id,team_id,name,face_pic,intro,school,model_case,concept,views';
    protected $_orderby = array('views'=>'DESC', 'manager_id'=>'DESC');
    protected $_pre_cache_key = 'manager-list';

    protected $_hot_orderby = array('cate_id'=>'DESC','views'=>'DESC' );
    protected $_hot_filter = array('closed'=>'0','audit'=>'1');
    
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
        if(empty($items)){
            return false;
        }else{
            foreach($items as $k => $v){
                $cat_temp = K::M('cate/cate')->detail($v['cate_id']);
                $team_temp = K::M('cate/cate')->detail($v['team_id']);
                $items[$k]['site_num'] = K::M('site/site')->count(array('manager_id'=>$v['manager_id'],'audit'=>'1'));
                $items[$k]['cate'] = $cat_temp;
                $items[$k]['team'] = $team_temp;
            }
        }
        return $items;
    }   
    
}