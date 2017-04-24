<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: message.ctl.php 3704 2014-03-10 03:41:45Z langzhong $
 */

class Ctl_Message extends Ctl
{
    
    public function index($type)
    {
       if($type != 'yes' && $type != 'no' && $type != 'notice'){
            $this->err->add("您所访问的页面不存在!");
       }else{
           $this->pagedata['type'] = $type;
           $this->tmpl = 'message.html';
       }
    }
    

}    