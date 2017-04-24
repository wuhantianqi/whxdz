<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: sms.mdl.php 3459 2014-02-25 08:02:44Z langzhong $
 */

class Mdl_Sms_Sms extends Model
{   
    
	protected $sms = null;

    private  $_datetime;
    
    private  $_sitename;
    
    public function __construct(&$system)
    {
        parent::__construct($system);
    	$this->sms = K::M('sms/56dxw');
        $cfg = K::$system->config->get('site');
        $this->_sitename = $cfg['title'];
        $this->_datetime = date('Y-m-d H:i:s',__TIME);
        
    }
    
    //通知管理员的短信接口
    public function admin($key,$data=array())
    {
        $cfg = K::$system->config->get('sms');
        if(empty($cfg['mobile'])) return false;
        //一般接口都支持 ,分割的多个手机号 如果不支持的请在做逻辑处理！
        $email = explode(',',$cfg['mobile']);
        foreach($email  as $mail){
        
            $this->send($mail,$key,$data);
        }
        return  true;
    }
    
    
    public function send($mobile, $key, $data=array())
    {   
        $content = $this->content($key, $data);
        if($content === false) return false;
        if(!defined('IN_ADMIN')){
            if(!$this->check_sms(__IP, $title)){
                $this->err->add($title, 451);
                return false;
            }
        }
    	if(!$this->sms->send($mobile, $content)){
    		//$msg = $this->sms->lastmsg;
    		//$this->err->add($msg, 450);
			if(__CFG::DEBUG){
				$this->err->add('短信接口错误:['.$this->sms->lastcode.':'.$this->lastmsg.']', 450);
			}else{
				$this->err->add('发送短信失败，短信接口错误', 450);
			}
            K::M('sms/log')->create(array('mobile'=>$mobile, 'content'=>$content, 'sms'=>'56dx', 'status'=>0));
    		return false;
    	}
        K::M('sms/log')->create(array('mobile'=>$mobile, 'content'=>$content, 'sms'=>'56dx', 'status'=>1));
    	return true;
    }

    public function content($key,$data)
    {
        $detail = K::M('system/systmpl')->detail_by_key($key);
        if(!$detail['is_open']){
                    return false;
                }      
        if(!$detail['is_open']) return false;
        $content = $detail['tmpl'];
        $content = str_replace('{dateline}',$this->_datetime,$content);
        $content = str_replace('{sitename}',$this->_sitename,$content);
        foreach($data  as $k=>$v){
            $k = '{'.$k.'}';
            $v = htmlspecialchars($v);
            $content = str_replace($k,$v,$content);
        }
        return $content; //仅仅56短信需要
    }

    public function check_sms($clienip=null, &$title='')
    {
        $clienip = $clienip ? $clienip : __IP;
        $access = K::$system->config->get('access');
        if($mobile_time = (int)$access['mobile_time']){
            if((__TIME - $mobile_time*60) < K::M('sms/log')->lasttime_by_ip($clienip)){
                $title = '两次短信间隔不能少于'.$mobile_time.'分钟';
                return false;
            }
        }
        if($mobile_count = (int)$access['mobile_count']){
            $time = __TIME - 86400;
            if($mobile_count <= K::M('sms/log')->count("clientip='{$clientip}' AND dateline>$time")){
                $title = '同一IP24小时只能发送'.$mobile_count.'短信';
                return false;
            }
        }
        return true;
    }
}