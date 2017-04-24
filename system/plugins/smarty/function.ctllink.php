<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: function.ctllink.php 2034 2013-12-07 03:08:33Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

function smarty_function_ctllink($params, &$smarty)
{   
	static $oLink = null;
	if($oLink === null){
		 $oLink = K::M('helper/link');
	}
    $ctl = $params['ctl'];
    $type = $params['type'];
    $extname = $params['extname'] ? $params['extname'] : '.html';
    $args=isset($params['args']) ? $params['args'] : array();
    unset($params['ctl'], $params['type'], $params['extname'],$params['args']);
    if(defined('IN_ADMIN')){
    	return $oLink->mkctl($params['ctl'], $type, $args, $params, $extname);
	}else{
		return $oLink->mklink($params['ctl'], $type, $args, $params, $extname);
	}
}