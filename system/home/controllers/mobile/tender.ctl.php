<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_Mobile_Tender extends Ctl_Mobile {
    
    public function index(){
        $this->pagedata['setting'] = K::M('tenders/setting')->fetch_all_setting();
        $this->pagedata['type']  = K::M('tenders/setting')->get_type();
        $this->tmpl = 'mobile/tender.html';
    }
    
    public function save()
	{
		if(!$data = $this->GP('data')){
			$this->err->add('联系人不能为空', 211);
		}else{
			$data['create_ip'] = __IP;
			$data['dateline']  = __TIME;
			if($id = K::M('tenders/tenders')->create($data)){
				$obj = K::M('sms/sms');
				$obj->send($data['mobile'],'sms_tenders',array('name'=>$data['name'] ? $data['name'] : '业主','mobile'=>$data['mobile']));
				$obj->admin('sms_admin_tenders',array('name'=>$data['name'] ? $data['name'] : '业主','mobile'=>$data['mobile']));
				K::M('helper/mail')->systemmail('email_tenders',array('name'=>$data['name'] ? $data['name'] : '业主','mobile'=>$data['mobile']));
				K::M('net/tongji')->commit('tender',$id,  $this->request['ismobile']);
				$this->err->add('恭喜您申请装修成功！');
	 
			}		
		}
	}
    
    
}