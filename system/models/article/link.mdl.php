<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: link.mdl.php 2907 2014-01-08 08:00:55Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Article_Link extends Mdl_Table
{   
  
    protected $_table = 'article_link';
    protected $_pk = 'link_id';
    protected $_cols = 'link_id,title,link,orderby,dateline';
    protected $_pre_cache_key = 'article-link-list';

    
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

    public function filter($content, $limit=5)
    {
        static $filter = null;
        if($filter === null){
            if($items = $this->fetch_all()){
                $find = $replace = array();
                foreach($items as $v){
                    $find[] = "/{$v['title']}/";
                    $replace = "<a href=\"{$v['link']}\" target=\"_blank\">{$v['title']}</a>";
                }
                $filter = array('find'=>$find, 'replace'=>$replace);
            }
        }
        $limit = (int)$limit;
        if($filter['find'] && $filter['replace']){
            $content = preg_replace($filter['find'],$filter['replace'], $content, $limit);
        }
        return $content;
    }
}