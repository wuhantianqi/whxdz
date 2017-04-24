<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: widget.php 5340 2014-05-26 06:36:27Z langzhong $
 */

class Widget_Tenders extends Model
{

    public function bottomform(&$params)
    {           
        $params['tpl'] =  $params['tpl'] ? $params['tpl'] : 'bottomform.html';
        return true;
    }
    public function templateform(&$params)
    {           
        $params['tpl'] =  $params['tpl'] ? $params['tpl'] : 'templateform.html';
        return true;
    }
  //   public function index(&$params)
  //   {   
		// $params['tpl']   = $params['tpl'] ? $params['tpl'] :  'widget/tenders/default.html'; 
  //       $data['setting'] = K::M('tenders/setting')->fetch_all_setting();
  //       $data['type']    = K::M('tenders/setting')->get_type();
  //       $data['count']   = K::M('tenders/tenders')->count();
  //       return $data;
  //   }
	
	
}