<?php
/**
 * Copy	Right Anhuike.com
 * $Id function.widget.php shzhrui<anhuike@gmail.com>
 */
if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

function smarty_block_AD($params, $content,	$smarty, &$repeat)
{
	static $obj = null;
	if($obj === null){
		$obj = K::M('adv/adv');
	}	
    $params['theme'] = TPL_THEME;
	if(!$repeat && $content){
		return $obj->block($params, $content, $smarty);
	}
}