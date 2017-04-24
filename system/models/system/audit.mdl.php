<?php

class Mdl_System_Audit extends Mdl_Table
{   
    
    /**
     * @param string $auth 权限
     * @param array $member 用户信息
     * @return int  -1 代表没有权限  0 代表需要审核  1 代表不需要审核
     */
    public function audit($auth,$member){
        
        if(empty($member)) return 0; // 支持一下点评的时候需要匿名来点评； 
        
        $cfg = K::M('system/config')->get('audit');
        
        $key = $auth.'_'.$member['from'].'_';
        switch($member['from']){
            
            case 'member':
            case 'designer':
                if(!empty($member['verify_name'])){
                    $key.='Y';
                }else{
                    $key.='N';
                }                
                break;
            case 'company':
                $company = K::M('company/company')->company_by_uid($member['uid']);
                if($company['is_vip']){
                    $key.='V';
                }else{
                    if(!empty($member['verify_name'])){
                        $key.='Y';
                    }else{
                        $key.='N';
                    } 
                }
                break;
            case 'shop':
                $shop = K::M('shop/shop')->shop_by_uid($member['uid']);
                if($shop['is_vip']){
                    $key.='V';
                }else{
                    if(!empty($member['verify_name'])){
                        $key.='Y';
                    }else{
                        $key.='N';
                    } 
                }
                break;          
        }
        if(isset($cfg[$key])) return (int)$cfg[$key];        
        return 0;        
    }
        
}