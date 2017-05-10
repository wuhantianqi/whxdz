<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

class Ctl_Taocan extends Ctl {
    
    public $_call = 'index';
    
    public function  index($id=0){
         // $ids=4;
        // if(!empty($ids)){
        //     if(!$detail = K::M('decorate/package')->detail($ids)){
        //         $this->error(404);die;
        //     }
        // }
        // $items = K::M('decorate/package')->items(array(),array('orderby'=>'asc'),1,3);
        // if(empty($detail)){
        //     foreach($items as $v){
        //         $detail = $v; break;
        //     }
        // }
        // $this->pagedata['items'] = $items;
        // $this->pagedata['detail'] = $detail;
        // K::M('helper/seo')->init('taocan',array('title'=>  $detail['title']));
        if($id == 6){
            K::M('helper/seo')->init('pcfull',array());
            $this->tmpl = 'taocan6.html';
        }else if($id == 3){
            K::M('helper/seo')->init('pclight',array());
            $this->tmpl = 'taocan3.html';
        }
        
    }
    
}