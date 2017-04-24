<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

class Ctl_Package extends Ctl {
    
    
    public function  yuyue($package_id){
        if(!($package_id = (int)$package_id) && !($package_id = (int)$this->GP('package_id'))){
            $this->error(404);
        }else if(!$detail = K::M('decorate/package')->detail($package_id)){
            $this->error(404);
        }else{
            if($this->checksubmit('data')){
               if(!$data = $this->GP('data')){
                    $this->err->add('非法的数据提交', 201);
                }else{
                    $data['package_id'] = $package_id;
                    if($yuyue_id = K::M('decorate/yuyue')->create($data)){
                        $obj = K::M('sms/sms');
                        $obj->send($data['mobile'],'sms_package_yuyue',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'title'=>$detail['title']));
                        $obj->admin('sms_admin_package',array('name'=>$data['contact'] ? $data['contact'] : '业主','mobile'=>$data['mobile'],'title'=>$detail['title']));
                         K::M('net/tongji')->commit('package',$yuyue_id,  $this->request['ismobile']);
                        $this->err->add('恭喜您预约成功');
                    }
                } 
            }else{
                $this->pagedata['detail'] = $detail;
                $this->tmpl = 'package_yuyue.html';              
            }
        }
        
        
    }
    
    
}