<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */


if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Bao extends Ctl
{
    public function index()
    {
        K::M('helper/seo')->init('bao',array());
        $this->tmpl = 'bao.html';
    }
    
}