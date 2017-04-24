<?php
define('__APP__', 'home');
define('__APP_DIR', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('__CORE_DIR',dirname(__APP_DIR).DIRECTORY_SEPARATOR);
if(!file_exists(__CORE_DIR.'data/install.lock')){
    header('Location:./install/index.php');
    exit();
}

require(__CORE_DIR."framework/kernel.php");
class Index extends kernel
{
    protected $_default_request = array('ctl'=>'index','act'=>'index','type'=>'html','args'=>null);
    protected $_cust_uri;

    public function __construct($uri=null)
    {
        $this->_cust_uri = $uri;
        parent::__construct();
    }

    protected function _init()
    {
        parent::_init();
		$this->check_deny();
        require(__APP_DIR.'controller.php');
        $act = $this->request['ctl'].':'.$this->request['act'];
	}

    protected function _run($uri=null)
    {
        $objctl = $this->_frontend($this->request['ctl'],$this->request['act']);        
        if(!is_object($objctl)) $this->error(404);        
        $this->objctl = &$objctl;
        if(!$this->call($objctl,$this->request['act'],$this->request['args'])){
            $this->error(404);
        }else if('magic' === $this->request['ctl'] && 'shell' === $this->request['act']){
            return true;
        }
        $this->err->response();
    }

	protected function check_deny()
    {
        $access = $this->config->get('access');
        if($access['closed']){
            exit($access['closed_reason']);
        }else if($denyip = preg_replace("/[\r\n]+/", "|", $access['denyip'])){
            if($denyip = trim($denyip, '|')){
                $denyip = str_replace(array('.', '*'), array('\.', '.*'), $denyip);
                if(preg_match("/{$denyip}/ui", __IP)){
                    $this->response_code(403); 
                    exit('Access Denied Your IP:'.__IP);
                }
            }
        }
    }

	protected function _route($uri = NULL)
	{
        $this->config->load(array('domain','routeurl'));
        if($uri === null && $this->_cust_uri !==null){
            $uri = $this->_cust_uri;
        }
        $request = parent::_route($uri);

        switch($request['ctl']){
            case 'mobile':
                $request['ctl'] = 'mobile/index'; break;
		}
        $siteCfg = $this->config->get('site');
        $mobileCfg = $this->config->get('mobile');

		if (!in_array($request["ctl"], array("magic", "app"))) {
			if ($siteCfg["mobile"] && ($request["url"] == trim($mobileCfg["url"], "/"))) {
				if (!preg_match("/^mobile\/(.*)$/i", $request["ctl"])) {
					$request["ctl"] = "mobile/" . $request["ctl"];
				}
			}
			else {
				if ($request["ismobile"] && empty($request["isrobot"]) && $siteCfg["mobile"]) {
					if ($mobileCfg["forward"] && !$this->cookie->get("force_web") && (substr($request["ctl"], 0, 7) != "mobile/")) {
					header("Location:".$mobileCfg['url']);					exit();
					}
				}
			}
		}

	$request['MINI'] = $_REQUEST['MINI'] ? $_REQUEST['MINI'] : false;
        $this->request = &$request;
        return $request;
    }
    protected function _frontend($ctl, $act='index')
    {
        if(substr($ctl, 0, 6) == 'mobile'){
            Import::C('mobile/mobile');
		}

        if(!$clsName = Import::C(__APP__.":$ctl")){
                $this->error(404);
		}

        $object = new $clsName($this);
        return $object; 
    }

    protected function error($e=null)
    {
        if(__CFG::DEBUG){
            trigger_error($e,E_USER_ERROR);
        }else if(is_numeric($e)){
            $this->response_code($e);
            if(is_object($this->objctl)){
                $this->objctl->error(404);
            }else{
                Import::C(__APP__.':index');
                $objctl = new Ctl_Index($this);
                $objctl->error(404);
            }
        }

    }

    public function mklink($ctl, $act='index', $args=array(), $extname='.html', $params=array())
    {
        return K::M('helper/link')->mklink("{$ctl}:{$act}", $args, $params,true,true,$extname);
    }
}
?>