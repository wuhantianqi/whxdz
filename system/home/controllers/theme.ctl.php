<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

class Ctl_Theme extends Ctl
{
    
    public $_call = 'index';

    public function index($theme = 'default')
    {
        if(empty($theme)){
            $this->error(404);
        }
         if(!$themeinfo = K::M('system/theme')->theme($theme)){
            $this->error(404);
        }else{
            header("Expires: -1");
            header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
            header("Pragma: no-cache");
            K::M('system/cookie')->delete('theme');
            K::M('system/cookie')->set('theme',$theme);
            header("Location: /index.php");
        }        
    }
     
}    