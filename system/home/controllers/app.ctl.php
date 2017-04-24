<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_App extends Ctl {
    
    public function index(){
        
        
        K::M('helper/seo')->init('app',array());
        $this->tmpl = 'app.html';
    }
    
}