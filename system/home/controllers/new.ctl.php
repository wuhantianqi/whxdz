<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_New extends Ctl
{   
    
    public function index($page=1)
    {
        $this->tmpl = 'llife.html';
    }  
    
    
}