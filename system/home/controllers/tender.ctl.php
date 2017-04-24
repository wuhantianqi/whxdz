<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */


if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Tender extends Ctl
{
    private  $_tenders_allow_fields ='type_id,style_id,budget_id,service_id,house_type_id,way_id,name,mobile,home_name,addr,demand,area';

    public function index()
    {
       
        $this->pagedata['setting'] = K::M('tenders/setting')->fetch_all_setting();
        $this->pagedata['type']  = K::M('tenders/setting')->get_type();
        K::M('helper/seo')->init('tenders',array());
        $this->tmpl = 'tender.html';
    }
    public function six()
    {
        $this->tmpl = 'six.html';
    }
    public function eight()
    {
       
        $this->tmpl = 'eight.html';
    }
    /**
     * 全局弹出表单
     * @return [type] [description]
     */
    public function eject()
    {
        $this->tmpl = 'eject.html';
    }

    public function save(){        
         if($data= $this->checksubmit('data')){
            if(!$data = $this->check_fields($data,$this->_tenders_allow_fields)){
                $this->err->add('非法的数据提交', 201);
            }else{
                $budgetdata = $_POST['data'];
                $data['create_ip'] = __IP;
                $data['dateline']  = __TIME;
                if($id = K::M('tenders/tenders')->create($data)){
                    $obj = K::M('sms/sms');
                    $smsdata = $maildata = array('name'=>$data['name'] ? $data['name'] : '业主','mobile'=>$data['mobile']);
                    $smsmod = 'sms_tenders';
                    if($smsdata['budget'] = $this->getbudget($budgetdata)){
                        $smsmod = 'sms_tenders_budget';
                    }
                    // $obj->send($data['mobile'],$smsmod,$smsdata);
                    $obj->admin('sms_admin_tenders',$maildata);
                    K::M('helper/mail')->systemmail('email_tenders',$maildata);
                    K::M('net/tongji')->commit('tender',$id,  $this->request['ismobile']);
                    $this->err->add('恭喜您提交成功！');
                    $this->err->set_data('forward',  $this->mklink('index',array(),array(),true));
                }
            } 
        }else{
            $this->err->add('非法的数据提交', 201); 
        }  
    }
    
    public function  yuyue()
    {
        $this->tmpl = 'tender_yuyue.html';
    }    

    public function  getbudget($budgetdata)
    {
        if($b = K::M('tenders/setting')->detail($budgetdata['budget_id'])){
        $t = 1120;
        $w = 2160;
        $budget = $budgetdata['area'] * $b['budget'] + $t * $dabudgetdataa['tnum'] + $w * $budgetdata['snum'];    
        return $budget;  
        }else{
            return false;
        }
    }

}