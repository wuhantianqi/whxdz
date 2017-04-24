<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: config.ctl.php 2034 2013-12-07 03:08:33Z langzhong $
 */

class Ctl_System_Config extends Ctl
{
    
    public $__call = 'index';

    public function index($k='index')
    {
        if($k == 'ucenter'){
            $this->ucenter();
        }else if($this->checksubmit()){
            $this->save($k);
        }else{
            $this->setting($k);
        }
    }

    public function setting($k=null)
    {
  		if(empty($k)){
  			$this->err->add('很抱歉，您请求的页面不存在', 201);
  		}else if(($cfg = $this->system->config->get($k)) === null){
            $this->err->add('很抱歉，您请求的页面不存在', 201);
        }else{
            $pager['K'] = $k;
            $this->pagedata['pager'] = $pager;
            $this->pagedata['config'] = $cfg;
  			$this->tmpl = "admin:config/{$k}.html";
  		}
    }

    public function save()
    {
    	if(!$pk = $this->GP('K')){
    		$this->err->add('非法的请求', 201);
    	}else if(!$data = $this->GP('config')){
    		$this->err->add('非法的数据提交', 202);
    	}else if(($cfg = $this->system->config->get($pk)) === null){
    		$this->err->add('你要保存的设置不存在', 203);
    	}else{
            if($_FILES['config']){
                foreach($_FILES['config'] as $k=>$v){
                    foreach($v as $kk=>$vv){
                        $attachs[$kk][$k] = $vv;
                    }
                }
                $upload = K::M('magic/upload');
                foreach($attachs as $k=>$attach){
                    if($attach['error'] == UPLOAD_ERR_OK){
                        if($a = $upload->upload($attach, 'config')){
                            $data[$k] = $a['photo'];
                        }
                    }
                }
            }
            if($this->system->config->set($pk, $data)){
        		$this->err->add('保存数据成功');
        	}
        }
    }

   

}