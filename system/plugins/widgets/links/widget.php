<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: widget.php 2034 2013-12-07 03:08:33Z langzhong $
 */

class Widget_Links extends Model
{

	public function index(&$params)
	{
		$params['tpl'] = 'default.html';
		return K::M('market/links')->fetch_all();
	}
}