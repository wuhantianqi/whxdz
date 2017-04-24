<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: case.mdl.php 2220 2013-12-16 06:57:52Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Case_Case extends Mdl_Table
{   
  
    protected $_table = 'case';
    protected $_pk = 'case_id';
    protected $_cols = 'case_id,price,home_name,intro,designer_id,title,photo,size,views,likes,seo_title,sex,name,dianping,seo_keywords,seo_description,orderby,lastphotos,lasttime,audit,closed,clientip,dateline';
    protected $_orderby = array('orderby'=>'ASC', 'lasttime'=>'DESC');

    protected $_hot_orderby = array('likes'=>'DESC','orderby'=>'ASC');
    protected $_hot_filter = array('audit'=>'1', 'closed'=>'0');
    protected $_new_orderby = array('lasttime'=>'DESC');
    protected $_new_filter = array('audit'=>'1', 'closed'=>'0');

    public function items_by_designer($designer_id,$num=2){
        $designer_id = (int)$designer_id;
        $num = (int)$num;
        $sql = "SELECT  * FROM ".$this->table($this->_table)." WHERE designer_id={$designer_id} AND audit=1 and closed=0 order by `orderby` asc limit {$num} ";
        $items = array(); 
        if($rs = $this->db->query($sql)){
            while($row = $rs->fetch()){
                $items[$row[$this->_pk]] = $row;
            }
        }
        return $items;
    }

    public function items_by_manager($manager_id,$num=2){
        $manager_id = (int)$manager_id;
        $num = (int)$num;
        $sql = "SELECT  * FROM ".$this->table($this->_table)." WHERE manager_id={$manager_id} AND audit=1 and closed=0 order by `orderby` asc limit {$num} ";
        $items = array(); 
        if($rs = $this->db->query($sql)){
            while($row = $rs->fetch()){
                $items[$row[$this->_pk]] = $row;
            }
        }
        return $items;
    } 
    
    public function items($filter=array(), $orderby=null, $p=1, $l=50, &$count=0)
    {
        if($attrs = $filter['attrs']){
            if($attr_ids = K::M('verify/check')->ids($attrs)){
                if(is_numeric($attr_ids)){
                    $attr_sql = "SELECT case_id FROM ".$this->table('case_attr')." WHERE attr_value_id=$attr_ids GROUP BY case_id";
                }else{
                    $attr_count = array_sum(explode(',', $attr_ids));
                    $attr_sql = "SELECT case_id FROM ".$this->table('case_attr')." WHERE attr_value_id IN($attr_ids) GROUP BY case_id HAVING SUM(attr_value_id)=$attr_count";
                }
            }
        }
        if($filter['is_dianping']){
            $dianpingsql = " (LENGTH(dianping)>0) ";         
        }
        unset($filter['attrs'],$filter['is_dianping']);
        $where = $this->where($filter);
        if($attr_sql){
            $where .= " AND case_id IN($attr_sql)";
        }
        if($dianpingsql){
            $where.=" AND {$dianpingsql} ";
        }
        $orderby = $this->order($orderby);
        $limit = $this->limit($p, $l);
        $items = array();
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM ".$this->table($this->_table)." WHERE $where $orderby $limit";
        
        if($rs = $this->db->query($sql)){
            while($row = $rs->fetch()){
                $row = $this->_format_row($row);
                $items[$row[$this->_pk]] = $row;
            }
            $count = $this->db->GetOne("SELECT FOUND_ROWS()");
        }
        return $items;
    }
    
    public function create($data, $checked=false)
    {
        if(!$checked && !$data = $this->_check_schema($data)){
            return false;
        }
        $case_id = $this->db->insert($this->_table, $data, true);
        return $case_id;
    }

    public function update($case_id, $data, $checked=false)
    {
        if(!$checked && !$data = $this->_check_schema($data,  $case_id)){
            return false;
        }else if(!$case = $this->detail($case_id)){
            return false;
        }
       return  $this->db->update($this->_table, $data, $this->field($this->_pk, $case_id));
    }
    
    
    public function up_detail($pk, $audit = 1,$closed=false)
	{
		if(!$pk = (int)$pk){
			return false;
		}
		$this->_checkpk();	
        $audit = (int) $audit;
		$where = $this->_pk." < {$pk} AND audit={$audit}";
		if($closed && $this->field_exists('closed')){
			$where .= " AND closed='0'";
		}
		$sql = "SELECT * FROM ".$this->table($this->_table)." WHERE $where  ORDER BY ".$this->_pk." DESC LIMIT 1";
		if($detail = $this->db->GetRow($sql)){
			$detail = $this->_format_row($detail);
		}
		return $detail;
	}
    
    public function next_detail($pk,$audit = 1, $closed=false){
        if(!$pk = (int)$pk){
			return false;
		}
		$this->_checkpk();		
        $audit = (int) $audit;
		$where = $this->_pk." > {$pk} AND audit={$audit}";
		if($closed && $this->field_exists('closed')){
			$where .= " AND closed='0'";
		}
		$sql = "SELECT * FROM ".$this->table($this->_table)." WHERE $where  ORDER BY ".$this->_pk." ASC LIMIT 1";
		if($detail = $this->db->GetRow($sql)){
			$detail = $this->_format_row($detail);
		}
		return $detail;
    }
    



    public function update_last($case_id, $size=0, $num=1)
    {
        $lastpids = array(); 
        if(!$size = (int)$size){
            return false;
        }else if(!$num = (int)$num){
            return false;
        }else if(!$case_id = (int)$case_id){
            return false;
        }
        $filter = array('closed'=>0, 'case_id'=>$case_id);
        $photo = '';
        if($items = K::M('case/photo')->items($filter, array('photo_id'=>'DESC'), 1, 10)){
            foreach($items as $v){
                $lastpids[$v['photo_id']] = $v['photo_id'];
            }
            $last = array_shift($items);
            $photo = $last['photo'];
        }
        $pids = implode(',', $lastpids);
        $time = __CFG::TIME;
        $sql = "UPDATE ".$this->table($this->_table)." SET photo='{$photo}', lastphotos='{$pids}', lasttime='{$time}',`photos`=`photos`+$num,`size`=`size`+$size WHERE case_id='$case_id'";
        return $this->db->Execute($sql);
    }

    /**
     * 重置案例统计数
     */
    public function reset_count($case_id)
    {
        if(!$case_id = (int)$case_id){
            return false;
        }else if(!$data = K::M('case/photo')->count_by_case($case_id)){
            $data = array('case_id'=>$case_id, 'photos'=>0, 'size'=>0);
        }
        return $this->db->update($this->_table, array('photos'=>$data['photos'], 'size'=>$data['size']), "case_id='{$case_id}'");
    }

    public function format_items_ext($items)
    {
        if(empty($items)){
            return false;
        }
        $case_ids = $photo_ids = $designer_ids = array();
        foreach((array)$items as $k=>$v){
            $case_ids[$v['case_id']] = $v['case_id'];
            if($v['lastphotos']){
                foreach(explode(',', $v['lastphotos']) as $id){
                    $photo_ids[$id] = $id;
                }
            }
            if($v['designer_id']){
                $designer_ids[$v['designer_id']] = $v['designer_id'];
            }
        }
        if($photo_ids){
            $photo_list = K::M('case/photo')->items_by_ids($photo_ids);
        }
       
        if($designer_ids){
            $designer_list = K::M('designer/designer')->items_by_ids($designer_ids);
        }
        if($case_ids){
            $attr_list = K::M('case/attr')->items(array('case_id'=>$case_ids), null, 1, 500);
        }
        foreach((array)$items as $k=>$v){
            $photos = $designer = $home = array();
            if($v['lastphotos']){                    
                foreach(explode(',', $v['lastphotos']) as $id){
                    if($photo = $photo_list[$id]){
                        $photos[$id] = $photo;
                    }
                }
            }
  
            if(!$designer = $designer_list[$v['designer_id']]){
                $designer = array();
            }
            $v['ext'] = array('photos'=>$photos, 'home'=>$home, 'designer'=>$designer, 'attrs'=>array());
            $items[$k] = $v;            
        }
        $obj = K::M('data/attrvalue');
        foreach($attr_list as $k=>$v){
            if($items[$v['case_id']]){
                if($val = $obj->attrvalue($v['attr_value_id'])){
                    $items[$v['case_id']]['ext']['attrs'][$v['attr_value_id']] = $val['title'];
                }
            }
        }
        return $items;
    }
}