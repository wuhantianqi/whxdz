<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Designer_Designer extends Mdl_Table
{   
  
    protected $_table = 'designer';
    protected $_pk = 'designer_id';
    protected $_cols = 'designer_id,cate_id,team_id,name,face_pic,intro,school,model_case,concept,views';
    protected $_orderby = array('views'=>'DESC', 'designer_id'=>'DESC');
    protected $_pre_cache_key = 'designer-list';
    
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
                $items[$k]['case_num'] = K::M('case/case')->count(array('designer_id'=>$v['designer_id'],'closed'=>'0','audit'=>'1'));
                $items[$k]['cate'] = $cat_temp;
                $items[$k]['team'] = $team_temp;
            }
        }
        return $items;
    }
    
    
    
}