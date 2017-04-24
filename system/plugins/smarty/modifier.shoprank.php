<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: modifier.shoprank.php 3053 2014-01-15 02:00:13Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

function smarty_modifier_shoprank($credit)
{
    $credit = (int)$credit;
    $rankCfg = K::$system->config->get('shop_rank');
    for($i=20; $i>0; $i--){
        if($rankCfg['rank_'.$i] <= $credit){
            return 'rank_'.$i;
        }
    }
    return 'rank_1';
}