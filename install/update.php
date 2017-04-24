<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: update.php 3180 2014-01-23 02:02:52Z youyi $
 */
ini_set("display_errors","On");
error_reporting(E_ALL ^ E_NOTICE);
define('__APP__', 'install');
define('__APP_DIR', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('__BASE_DIR', dirname(__APP_DIR).DIRECTORY_SEPARATOR);
define('__CORE_DIR',dirname(__APP_DIR).DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR);
header("Content-type: text/html; charset=UTF-8");
if(!file_exists(__CORE_DIR.'config.php')){
	exit('亲没有检测到你安装过江湖婚庆程序，请先进行安装');
}
require(__CORE_DIR."framework/kernel.php");
class index extends Kernel
{

	protected function _init()
	{
		if(('success' != $_GET['step']) && file_exists(__CORE_DIR.'data/update.lock')){
			exit('您已经安装过本系统，如果想重新安装，请删除system/data目录下update.lock文件');
		}else if(!file_exists(__CORE_DIR.'data/install.lock')){
			file_put_contents(__CORE_DIR.'data/install.lock', '1');
		}
		parent::_init();
	}

	protected function _run()
	{
		$this->admin = K::M('admin/auth');
		if(!$this->admin->token()){
			exit('请先以管理员身份登录后台再进行安装, <a href="../admin/index.php" target="_blank">登录后台</a>');
		}
		$this->update();
	}

	public function update()
	{
		$tablepre = $this->db->_tablepre;
		$sql = file_get_contents(__APP_DIR.'data/jh_update.'.JH_RELEASE.'.sql');
		//$sql = str_replace("\r\n", "\n", $sql);
		$sql = preg_replace('/\/\*.*?\*\//i', '',$sql);
		$sql = str_replace("\r", "\n", str_replace(' jh_', ' '.$tablepre, $sql));
		$sql = str_replace("\r", "\n", str_replace(' `jh_', ' `'.$tablepre, $sql));
		$ret = array();
		$num = 0;
		foreach(explode(";\n", trim($sql)) as $query) {
			$ret[$num] = '';
			$queries = explode("\n", trim($query));
			foreach($queries as $query) {
				$ret[$num] .= (isset($query[0]) && $query[0] == '#') || (isset($query[1]) && isset($query[1]) && $query[0].$query[1] == '--') ? '' : $query;
			}
			$num++;
		}
		unset($sql);
		foreach($ret as $query) {
			$query = trim($query);
			if($query) {
				$this->db->query($query);
			}
		}
		//update.lock
		file_put_contents(__CORE_DIR.'data/update.lock', '1');
		//clear cache
		$this->load_model('cache/cache')->clean();
		exit('恭喜您升级《江湖家居门户系统》成功,当前版本为:'.JH_VERSION.' '.JH_RELEASE);
	}
}
new Index();