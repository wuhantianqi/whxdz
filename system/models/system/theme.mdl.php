<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: theme.mdl.php 3167 2014-01-22 08:55:05Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_System_Theme extends Mdl_Table
{   
  
    protected $_table = 'themes';
    protected $_pk = 'theme_id';
    protected $_cols = 'theme_id,theme,title,thumb,config,default,dateline';
    protected $_orderby = array('theme_id'=>'ASC');
    protected $_pre_cache_key = 'system-themes-list';

    public function create($data, $checked=false)
    {
        if(!$checked && !$data = $this->_check_schema($data)){
            return false;
        }
        if($theme_id = $this->db->insert($this->_table, $data, true)){
            $this->flush();
        }
        return $theme_id;
    }

    public function update($pk, $data, $checked=false)
    {
        $this->_checkpk();
        if(!$checked && !$data = $this->_check_schema($data,  $pk)){
            return false;
        }
        if($rs = $this->db->update($this->_table, $data, $this->field($this->_pk, $pk))){
            $this->flush();
        }
        return $rs;
    }

    public function theme($key=null, $theme_id=0)
    {
        if($items = $this->fetch_all()){
            if(empty($key) && ($theme_id = (int)$theme_id)){
                return $items[$theme_id];
            }
            foreach($items as $k=>$v){
                if($v['theme'] == $key){
                    return $v;
                }
            }
        }
        return false;       
    }

    public function install($ident)
    {
        $xml = __CFG::TMPL_DIR.$ident.DIRECTORY_SEPARATOR.'theme.xml';
        if(!$data = $this->parse_xml($xml)){
            $this->err->add('模板不存在或模板配置文件不正确', 231);
        }else if($theme = $this->theme($ident)){
            $this->err->add('该模板已经安装', 232);
        }else{
            $a = array('theme'=>$ident);
            $a['title'] = $data['title'];
            $a['thumb'] = $data['thumb'];
            if($theme_id = $this->create($a)){
                //config.xml todo....
    			$config = __CFG::TMPL_DIR.$ident.DIRECTORY_SEPARATOR.'config.xml';
       
                if($data = $this->parse_xml($config)){
                    if(!empty($data['adv'])){
                        $oAdv = K::M('adv/adv');
                        $advs = array();
                        foreach($data['adv'] as $v){
                            if($v['name'] && $v['from']){
                                if(!$oAdv->adv_by_name($v['name'],$ident)){
                                    $a = array('theme'=>$ident, 'title'=>(string)$v['name'], 'from'=>(string)$v['from']);
                                    if($v['width'] && $v['height']){
                                        $a['config'] = array('width'=>(int)$v['width'], 'height'=>(int)$v['height']);
                                    }
                                    $advs[] = $a;
                                }                                
                            }
                        }
                        if($advs){
                            foreach($advs as $v){
                                $oAdv->create($v);
                            }
                        }
                    }
                }                
            }
            return $theme_id;
        }
        return false;
    }

    public function default_theme()
    {
        if($this->default_theme){
            return $this->default_theme;
        }else if($items = $this->fetch_all()){
            foreach($items as $k=>$v){
                if($v['default']){
                    return $v;
                }
            }
            return $this->theme('default');
        }
        return false;
    }

    public function set_default($theme_id)
    {
        $theme_id = (int)$theme_id;
        $this->db->update($this->_table, array('default'=>0), 1);
        return $this->update($theme_id, array('default'=>1), true);
    }

    public function load_themes()
    {
        $themes = array();
        $d = dir(__CFG::TMPL_DIR);
        while (false !== ($entry = $d->read())) {
            $path = $d->path.DIRECTORY_SEPARATOR.$entry;
            $xml = $path.DIRECTORY_SEPARATOR.'theme.xml';
            if(is_dir($path)){
                if($data = $this->parse_xml($xml)){
                    $themes[$entry] = $data;
                }
            }
        }
        $d->close();
        return $themes;
    }

    public function parse_xml($xml)
    {
        $result = array();
        if(!file_exists($xml)){
            return false;
        }else if($data = simplexml_load_file($xml)){
            $data = (array)$data;
            foreach($data as $k=>$v){
                if(isset($v['@attributes'])){
                    $v['attrs'] = $v['@attributes'];
                    //unset($v['@attributes']);
                }else if($v instanceof SimpleXMLElement){
                    if($v = (array)$v){
                        foreach($v as $kk=>$vv){
                            if($vv instanceof SimpleXMLElement){
                                $vv = (array)$vv;
                            }
                            $v[(string)$kk] = $vv;
                        }
                    }
                } 
                $result[(string)$k] = $v;
            }
        }
        return $result;
    }

    protected function _format_row($row)
    {
        if($row['config']){
            $config = unserialize($row['config']);
            $row['config'] = $config ? $config : array();
        }
        return $row;
    }

    public function options()
    {
        $options = array();
        if($items = $this->fetch_all()){
            foreach($items as $k=>$v){
                $options[$v['theme_id']] = $v['title'];
            }
        }
        return $options;        
    }    
}