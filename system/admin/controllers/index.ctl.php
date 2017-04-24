<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author shzhrui<anhuike@gmail.com>
 * $Id: index.ctl.php 2975 2014-01-10 06:21:32Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Index extends Ctl
{
    

    public function index()
    {
        $this->tmpl = 'admin:page/index.html';
        $this->output();
    }

    public function welcome()
    {

        $sysinfo = array(
            'version' => JH_VERSION . '.'. JH_RELEASE ,
            'server_domain' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]',
            'server_os' => PHP_OS,
            'web_server' => $_SERVER["SERVER_SOFTWARE"],
            'php_version' => PHP_VERSION,
            'mysql_version' => mysql_get_server_info(),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'max_execution_time' => ini_get('max_execution_time') . '秒',
            'memory_limit' => ini_get('memory_limit'),
            'safe_mode' => (boolean) ini_get('safe_mode') ?  'YES' : 'NO',
            'zlib' => function_exists('gzclose') ?  'YES' : 'NO',
            'curl' => function_exists("curl_getinfo") ? 'YES' : 'NO',
            'timezone' => function_exists("date_default_timezone_get") ? date_default_timezone_get() : 'NO'
        );
        if(function_exists('gd_info')){
            $gd_info = @gd_info();
            $sysinfo['gd_version'] = $gd_info["GD Version"];
        }else{
            $sysinfo['gd_version'] = '<span class="red">NO</span>';
        }
        $this->pagedata['sysinfo'] = $sysinfo;
        $this->pagedata['counts'] = array(
            'activity'=> K::M('activity/yuyue')->count(' is_read = 0 '),
            'site'=> K::M('site/yuyue')->count(' is_read = 0 '),
            'tenders'=> K::M('tenders/tenders')->count(' is_read = 0 '),
            'tuan'=> K::M('tuan/yuyue')->count(' is_read = 0 '),
            'product'=> K::M('product/yuyue')->count(' is_read = 0 '),
            'designer'=> K::M('designer/yuyue')->count(' is_read = 0 '),
            'package' => K::M('decorate/yuyue')->count(' is_read = 0 '),
        );
        $this->tmpl = 'admin:page/welcome.html';
    }

    public function login()
    {
        if($_POST['admin_name']){
            if(!$name = $this->GP('admin_name')){
                $this->err->add('登录名不能为空',401);
            }else if(!$passwd = $this->GP('admin_pwd')){
                $this->err->add('登录密码不能为空',402);
            }else if(!$code = $this->GP('verify_code')){
                $this->err->add('验证码不能为空',403);
            }else if(!K::M('magic/verify')->check($code)){
                 $this->err->add('验证码不正确',403);
            }else if($this->system->admin->login($name,$passwd)){
                header("Location:?index.html");
                exit();
            }
        }else{
            $this->tmpl = 'admin:page/login.html';
            $this->output();
        }
        $this->err->show("?index/login.html");
    }

    public function loginout()
    {
        $this->admin->loginout();
        $this->err->add("帐户已经安全退出!!");
    }

    public function modifypasswd()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 211);
            }else if(empty($data['oldpasswd'])){
                $this->err->add('旧密码不能为空', 212);
            }else if($data['newpasswd'] != $data['confirmpasswd']){
                $this->err->add('两次密码不相同', 213);
            }else if($this->admin->modifypasswd($data['oldpasswd'], $data['newpasswd'])){
                $this->err->add('修改密码成功,需重新登录');
            }
        }else{
            $this->tmpl = 'admin:admin/admin/modifypasswd.html';
        }
    }

    public function verify()
    {
        K::M('magic/verify')->output();
    }

    public function page($page)
    {
        $uri = $this->request['uri'];
        if(preg_match('/page-(\w+).html/i', $uri, $match)){
            $page = $match[1];
            $this->tmpl = "admin:page/{$page}.html";
        }
    }

    public function top()
    {
        $this->pagedata['top_menu'] = $this->admin->tree();
        $this->tmpl = 'admin:context/top.html'; 
    }

    public function ijh()
    {
        $cfg = $this->system->config->get('site_config');
        header("Content-type: image/png");
        echo base64_decode(K::M('secure/crypt')->hexstr($cfg['hash']));
        exit();
    }

    public function context($mid=null)
    {
        $menu_tree = $this->admin->tree();
        if(!$mid = intval($mid)){
            $tree = array_shift($menu_tree);
        }else{
            $tree = $menu_tree[$mid];
        }
        $this->pagedata['menu_tree'] = $tree['menu'];
        $this->tmpl = 'admin:context/menu.html';
    }
}