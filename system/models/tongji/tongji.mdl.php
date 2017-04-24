<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
if (!defined('__CORE_DIR')) {
    exit("Access Denied");
}

class Mdl_Tongji_Tongji extends Mdl_Table {

    protected $_table = 'tongji';
    protected $_pk = 'id';
    protected $_cols = 'id,type,mdl,mdl_id,source,source_domain,source_url,keyword,first_time,year,month,day,create_ip,dateline';

    protected $_source_means = array('via'=>'外链推广','other'=>'其他','baidu'=>'百度','google'=>'谷歌','soso'=>'搜搜','360'=>'360','sogou'=>'搜狗','bing'=>'必应');
    protected $_mdl  = array('tender'=>'招标','tuan'=>'小区团装','activity'=>'活动','designer'=>'预约设计','package'=>'套装','site'=>'工地','product'=>'产品');
    protected $_type = array('pc'=>'网站','mobile'=>'手机');

    public function  getCfg($key){
        return $this->$key;
    }
    
    public function create($data, $checked = false)
    {
        if (!$checked && !$data = $this->_check_schema($data)) {
            return false;
        }
        return $this->db->insert($this->_table, $data, true);
    }


    public function source($bgtime, $endtime, $limit = 10)
    {

        $bgtime = (int) $bgtime;
        $endtime = (int) $endtime;
        $limit = (int) $limit;
        $sql = "select  source,count(1) as num from " . $this->table($this->_table) . "  where dateline > '{$bgtime}' AND  dateline <='{$endtime}' group by  source  order by  count(1) desc limit 0,{$limit} ";
        $total = 0;
        if ($rs = $this->db->Execute($sql)) {
            while ($row = $rs->fetch()) {
                $items[] = $row;
                $total += $row['num'];
            }
        }
        if ($total > 0) {
            foreach ($items as $k => $v) {
                $items[$k]['name'] = $this->_source_means[$v['source']];
                $items[$k]['bfb']  = round($v['num'] *100/$total,2);
            }
            return $items;
        }
        return array();
    }
    
    
    public function keywords($bgtime, $endtime, $limit = 10){
        $bgtime = (int) $bgtime;
        $endtime = (int) $endtime;
        $limit = (int) $limit;
        $sql = "select  keyword,count(1) as num from " . $this->table($this->_table) . "  where dateline > '{$bgtime}' AND  dateline <='{$endtime}' AND  source not in ('via','other')  AND keyword is not null group by  keyword  order by  count(1) desc limit 0,{$limit} ";
        $items = array();
        if ($rs = $this->db->Execute($sql)) {
            while ($row = $rs->fetch()) {
                $items[] = $row;
            }
        }
        return $items;
    }
    
    public function via($bgtime, $endtime, $limit = 10){
       $bgtime = (int) $bgtime;
        $endtime = (int) $endtime;
        $limit = (int) $limit;
        $sql = "select  keyword,count(1) as num from " . $this->table($this->_table) . "  where dateline > '{$bgtime}' AND  dateline <='{$endtime}' AND  `source` ='via'  AND keyword is not null group by  keyword  order by  count(1) desc limit 0,{$limit} ";
        $items = array();
        if ($rs = $this->db->Execute($sql)) {
            while ($row = $rs->fetch()) {
                $items[] = $row;
            }
        }
        return $items; 
    }
    
    public function domain($bgtime, $endtime, $limit = 10){
       $bgtime = (int) $bgtime;
        $endtime = (int) $endtime;
        $limit = (int) $limit;
        $sql = "select  source_domain,count(1) as num from " . $this->table($this->_table) . "  where dateline > '{$bgtime}' AND  dateline <='{$endtime}'  AND source_domain is not null group by  source_domain  order by  count(1) desc limit 0,{$limit} ";
        $items = array();
        if ($rs = $this->db->Execute($sql)) {
            while ($row = $rs->fetch()) {
                $items[] = $row;
            }
        }
        return $items;  
    }
    
    
    public function qushiYue($year = 0,$mdl = null,$type=null,$source = null){
        $year = (int)$year;
        $where = " where  `year`='{$year}' ";
        if(!empty($mdl) && isset($this->_mdl[$mdl])){
            $mdl = self::_quote($mdl);
            $where .=" AND  `mdl`={$mdl} ";
        }
        if(!empty($type) && isset($this->_type[$type])){
            $type = self::_quote($type);
            $where .=" AND  `type`={$type} ";
        }
        if(!empty($source) && isset($this->_source_means[$source])){
            $source = self::_quote($source);
            $where .=" AND  `source`={$source} ";
        }
        $items = array();
        $sql = "select  `month`,count(1) as num from  " . $this->table($this->_table) . " {$where}  group by  `month`  order by  `month` asc";
        if ($rs = $this->db->Execute($sql)) {
            while ($row = $rs->fetch()) {
                $items[] = $row;
            }
        }
        return $items;
    }
    
    public function qushiDay($year = 0,$month=0,$mdl = null,$type=null,$source = null){
        $year = (int)$year;
        $month = (int) $month;
        $where = " where  `year`='{$year}' and  `month`='{$month}' ";
        if(!empty($mdl) && isset($this->_mdl[$mdl])){
            $mdl = self::_quote($mdl);
            $where .=" AND  `mdl`={$mdl} ";
        }
        if(!empty($type) && isset($this->_type[$type])){
            $type = self::_quote($type);
            $where .=" AND  `type`={$type} ";
        }
        if(!empty($source) && isset($this->_source_means[$source])){
            $source = self::_quote($source);
            $where .=" AND  `source`={$source} ";
        }
        $items = array();
        $sql = "select  `day`,count(1) as num from  " . $this->table($this->_table) . " {$where}  group by  `day`  order by  `day` asc";
        if ($rs = $this->db->Execute($sql)) {
            while ($row = $rs->fetch()) {
                $items[] = $row;
            }
        }
        return $items;
    }
    
    
    
    

}
