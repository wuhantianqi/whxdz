<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: cache.mdl.php 2073 2013-12-09 10:28:22Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_Cache_Cache
{   
	public $__CACHE = array();
	public $cache = null;

	public function __construct()
	{
		$this->cache = K::M("cache/file");
	}
    
    public function set($key, $val, $ttl=0)
    {
        $ttl = intval($ttl);
        $this->__CACHE[$key] = $val;
        if($ttl < 0 || __CFG::DEBUG){
            return false;
        }        
    	return $this->cache->set($key, $val, $ttl);
    }

    public function get($key)
    {

        if($data = $this->__CACHE[$key]){
            return $data;
        }else if(__CFG::DEBUG){
            return false;
        }        
    	return $this->cache->get($key);
    }

    public function delete($key)
    {
        unset($this->__CACHE[$key]);
    	return $this->cache->delete($key);
    }

    public function flush()
    {
        $this->__CACHE = array();
    	return $this->cache->flush();
    }

    public function clean()
    {
        $this->__CACHE = array();
        $this->cache->clean();
    }
}