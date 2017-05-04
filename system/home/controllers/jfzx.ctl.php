<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: case.ctl.php 3137 2014-01-20 07:19:19Z youyi $
 */
class Ctl_Jfzx extends Ctl {

    public function index($page = 1)
    {
        K::M('helper/seo')->init('pcoldhome',array());
        $this->tmpl = 'jfzx.html';
    }


}
