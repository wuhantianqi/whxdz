<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: widget.php 2750 2014-01-04 10:20:09Z youyi $
 */

class Widget_Data extends Model
{

    public function index(&$params)
    {
        
    }


	public function mapmarker(&$params)
	{
		$params['tpl'] = 'mapmarker.html';
		//117.332856,31.898782
		$data['map_x'] = $params['lng'];
		$data['map_y'] = $params['lat'];
		return $data;
	}
}