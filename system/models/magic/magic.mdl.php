<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: magic.mdl.php 3053 2014-01-15 02:00:13Z youyi $
 */

class Mdl_Magic_Magic extends Model 
{
    

    public function sitecount()
    {
    	if(!$sitecount = $this->cache->get('site-info-count')){
    		$sitecount = array('designer'=>0);
 
    		$sitecount['designer'] = K::M('designer/designer')->count();
    
    		$this->cache->set('site-info-count', $sitecount, 86400);
    	}
    	return $sitecount;
    }
}