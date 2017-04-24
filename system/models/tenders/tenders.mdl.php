<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: tenders.mdl.php 3158 2014-01-21 15:30:47Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Tenders_Tenders extends Mdl_Table
{   
  
    protected $_table = 'tenders';
    protected $_pk = 'id';
    protected $_cols = 'id,title,type_id,style_id,budget_id,service_id,house_type_id,way_id,name,mobile,home_name,addr,demand,start_time,area,audit,create_ip,dateline,is_read';
    protected $_orderby = array('id'=>'DESC');

    public function create($data, $checked=false)
    {
       
        if(!$checked && !$data = $this->_check_schema($data)){
            return false;
        }else if(!defined('IN_ADMIN')){
            if(!$this->check_tenders_count()){
                return false;
            }
        }        
        return $this->db->insert($this->_table, $data, true);
    }

    protected function check_tenders_count()
    {
        $access = K::$system->config->get('access');
        if($tenders_count = (int)$access['tenders_count']){
            if($tenders_count < $this->count(array('create_ip'=>__IP, 'dateline'=>'>:'.(__TIME-86400)))){
                $this->err->add('同一IP24小时只能发布'.$tenders_count.'招标', 501);
                return false;
            }
        }
        if($tenders_time = (int)$access['tenders_time']){
            $time = __TIME - $tenders_time*60;
            if($this->count(array('create_ip'=>__IP, 'dateline'=>'>:'.$time))){
                $this->err->add('同一IP两个招标的间隔'.$tenders_time.'分钟', 502);
                return false;
            }
        }
        return true;
    }

    public function update($pk, $data, $checked=false)
    {
        $this->_checkpk();
        if(!$checked && !$data = $this->_check_schema($data,  $pk)){
            return false;
        }
        return $this->db->update($this->_table, $data, $this->field($this->_pk, $pk));
    }

    public function update_sign($tenders_id, $company_id)
    {
        if(!($tenders_id = (int)$tenders_id) || !($company_id = (int)$company_id)){
            return false;
        }
        return $this->update($tenders_id, array('status'=>1,'sign_company_id'=>$company_id, 'sign_time'=>__CFG::TIME), true);
    }

    

    protected function _format_row($row)
    {
        static $tenders_attrs = null;
        if($tenders_attrs === null){
            $tenders_attrs = K::M('tenders/setting')->fetch_all();
        }
        if($types = K::M('tenders/setting')->get_type()){
            foreach($types as $k=>$v){
                if($type = $tenders_attrs[$row[$k.'_id']]){
                    $row[$k.'_title'] = $type['name'];
                }                
            }
        }
        return $row;                           
    }
}