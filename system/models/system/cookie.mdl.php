<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: cookie.mdl.php 4767 2014-04-26 10:51:18Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_System_Cookie extends Model
{
    public $_COOKIE;
    public $GUID = null;

    public function __construct(&$system)
    {
        self::$system = &$system;
        $this->Instance();
        //register_shutdown_function(array(&$this,'update'));
    }
    
    public function Instance()
    {
        $_clen = strlen(__CFG::C_PREFIX);
        $filter = K::M('content/filter');
        foreach($_COOKIE as $k => $v) {
            if(substr($k, 0, $_clen) == __CFG::C_PREFIX) {
                $this->_COOKIE[(substr($k, $_clen))] = $filter->addslashes($v);
            }
        }
        if(!$this->GUID = $this->_COOKIE['GUID']){
            $this->GUID = 'KT-'.K::GUID('cookie');
            $this->set('GUID',$this->GUID);
        }
    }

    public function set($key, $value, $life=NULL, $prefix = '', $domain=null)
    {
        $prefix = $prefix ? $prefix : __CFG::C_PREFIX;
        if($life === NULL){ //默认30天过期
            $life = __CFG::TIME + __CFG::C_EXPIRE;
        }else{
            $life = $life ? ($life + __CFG::TIME) : 0;
        }
        $https = $_SERVER['SERVER_PORT'] == 443 ? 1 : 0;
        $httponly = __CFG::C_HTTPONLY ? true : false;
        $cookiepath = ($httponly && PHP_VERSION < '5.2.0') ? __CFG::C_PATH.'; HttpOnly' : __CFG::C_PATH;
        $site = K::$system->config->get('site');
        //if(!defined('IN_ADMIN') && $site['multi_city'] && $site['city_domain']){
        if($domain === null){
            $domain = __CFG::C_DOMAIN;
            if(empty($domain) && ($site['multi_city'] && $site['city_domain'])){
                $domain = '.'.trim($site['city_domain'], '.');
            }
        }
        if(PHP_VERSION < '5.2.0') {
            setcookie($prefix.$key, $value, $life, $cookiepath, $domain, $https);
        } else {
            setcookie($prefix.$key, $value, $life, $cookiepath, $domain, $https, $httponly);
        }
        $this->_COOKIE[$key] = $value;      
    }

    public function get($key)
    {
        return $this->_COOKIE[$key];
    }

    public function delete($key)
    {   
        //多城市子域名有时会出错加了同删除根域和当前域名cookie
        $this->set($key, '', -86400, '', '');
        $this->set($key, '', -86400);
    }

    public function clear()
    {
        foreach($this->_COOKIE as $k=>$v){
            $this->set($k, '', -86400);
        }
    }

    public function update()
    {
    
    }
    
    public function fetch_all()
    {
        return $this->_COOKIE;
    }
}