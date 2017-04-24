<?php
/**
 * Copy Right TTPET.COM
 * Each engineer has a duty to keep the code elegant
 * $Id mail.mdl.php shzhrui<anhuike@gmail.com>$
 */

Import::L('phpmailer/class.phpmailer.php');
class Mdl_Helper_Mail extends PHPMailer
{
	
	protected $from_mail = 'anhuike@qq.com';
	protected $from_name = '江湖婚庆门户系统';
    
    private  $_datetime;

    private  $_email = null;
	public function __construct(&$system)
	{
		parent::__construct(true);
		$this->CharSet = 'UTF-8';
		$cfg = $system->config->get('mail');
		$site = $system->config->get('site');
		if(strtolower($cfg['mode']) == 'smtp'){
			$this->IsSMTP();
			$this->Host       = $cfg['smtp']['host'];
			$this->Port       = $cfg['smtp']['port'];
			$this->SMTPAuth   = true;
			$this->Username   = $cfg['smtp']['uname'];
			$this->Password   = $cfg['smtp']['passwd'];
		}else{
			$this->IsMail();
		}
		$this->from_mail = $cfg['sender'];
		$this->from_name = $site['title'];
  
        $this->_email = $cfg['email'];
        $this->_datetime = date('Y-m-d H:i:s',__TIME);
        
		$this->SetFrom($this->from_mail, $this->from_name);	
	}
	
	public function MsgHTML($body,$basedir='')
	{
		$body = "<body>{$body}<p>本邮件由系统自动发出，请勿直接回复</p></body>";
		parent::MsgHTML($body,$basedir);
	}
    
    public function systemmail($key = null,$data = array()){
        
        return $this->sendmail($this->_email, '管理员通知邮件！', $key, $data);
    }

    public function body($key,$data){
        $detail = K::M('system/systmpl')->detail_by_key($key);
        if(!$detail['is_open']) return false;
        $content = $detail['tmpl'];
        $content = str_replace('{dateline}',$this->_datetime,$content);
        $content = str_replace('{sitename}',$this->from_name,$content);
        foreach($data  as $k=>$v){
            $k = '{'.$k.'}';
            $v = htmlspecialchars($v);
            $content = str_replace($k,$v,$content);
        }
        return $content;
    }
	public function sendmail($to, $title, $key,$data)
	{   
        if(!$body = $this->body($key, $data)) return false;
		$check = K::M('verify/check');
		if(is_array($to)){
			$this->AddAddress($to[0], $to[1]);
		}else if($check->mail($to)){
			$this->AddAddress($to);
		}else{
			$this->errmsg = '错误的收件人地址';
			return false;
		}
      
		$this->Subject = $title;
		$this->AltBody = $this->AltBody ? $this->AltBody : K::M('content/html')->text($body);
		$this->MsgHTML($body);
		return $this->send();
	}

	public function clear()
	{
		$this->ClearAddresses();
		$this->ClearAttachments();
	}

	public function send()
	{
		try{
			parent::Send();
			$this->clear();
			return true;
		}catch(phpmailerException $e){
			$this->errmsg = $e->errorMessage();
			return false;
		}catch(Exception $e){
			$this->errmsg = $e->errorMessage();
			return false;
		}
		return false;
	}
}