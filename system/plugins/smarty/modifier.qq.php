<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: modifier.qq.php 2034 2013-12-07 03:08:33Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

/**
 * 敏感词替换
 */
function smarty_modifier_qq($qqs, $title='')
{
	if(empty($qqs)){
		return false;
	}
	static $site = null;
	if(empty($title)){
		if($site === null){
			$site = K::$system->config->get('site');
		}
		$title = $site['title'];
	}
	if(!is_array($qqs)){
		$qqs = explode(',', $qqs);
	}
	$content = '';
	foreach((array)$qqs as $qq){
		$content .= '<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin='.$qq.'&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:'.$qq.':51" alt="'.$title.'" title="'.$title.'"/></a>';
	}
	return $content;
}