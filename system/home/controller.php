<?php
if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl extends Factory
{
    protected $_allow_fields = '';
    
    public function __construct(&$system)
    {
        parent::__construct($system);
        $this->cookie = $system->cookie;
        $this->InitializeApp();
    }

    //初始化当前应用程序控制器
    protected function InitializeApp()
    {   
        $this->err->template('view:page/notice.html');
        $this->system->objctl = &$this;
        $this->seo = K::M('helper/seo');
    }

	protected function _init_pagedata()
	{
		parent::_init_pagedata();
		$theme = $this->default_theme();
		$site = $this->system->config->get('site');
		$this->pagedata['pager']['url'] = $site['url'];
		$this->pagedata['pager']['res'] = __CFG::RES_URL;
		$this->pagedata['pager']['sitecount'] = K::M('magic/magic')->sitecount();
		$this->pagedata['request'] = $this->request;
		$this->pagedata['pager']['theme'] = $site['siteurl'] . '/themes';
		$this->pagedata['pager']['themepath'] = $site['siteurl'] . '/themes/' . $theme['theme'];
        $this->pagedata['SEO'] = $this->seo->_SEO;
        $this->pagedata['nowtime'] = $this->pagedata['pager']['dateline'] = __TIME;
        $output = K::M('system/frontend');
        $output->setCompileDir(__CFG::DIR.'data/tplcache');
        //添加表单选项
        $this->pagedata['setting'] = K::M('tenders/setting')->fetch_all_setting();
        $this->pagedata['type']  = K::M('tenders/setting')->get_type();
    }

    //数组键值过滤。通常用户过滤不允许前台修改的表字段
    public function check_fields($data, $fields=null)
    {
        if($fields === null){
            $fields = $this->_allow_fields;
        }
        if(!is_array($fields)){
            $fields = explode(',', $fields);
        }
        foreach((array)$data as $k=>$v){
            if(!in_array($k, $fields)){
                unset($data[$k]);
            }
        }       
        return $data;
    }
    
    protected function set_resource_view(&$output)
    {
        $theme = $this->default_theme();
        $output->setTemplateDir(__CFG::TMPL_DIR.$theme['theme']);
        $output->registerFilter('pre', array($this, 'smarty_pre_filter'));
        $output->registerFilter('post', array($this, 'smarty_post_filter'));
        $output->default_template_handler_func = array($this, 'theme_default_handler');
    }

    public function smarty_pre_filter($source, $smarty)
    {
        $s = array(
                '/(<\{KT[^\}]*\}>)/', '/(<\{\/KT\}>)/', 
                '/(<\{AD[^\}]*\}>)/', '/(<\{\/AD\}>)/',
                '/(<\{calldata[^\}]*\}>)/', '/(<\{\/calldata\}>)/'
                );
        $r = array('\1<{literal}>', '<{/literal}>\1','\1<{literal}>', '<{/literal}>\1','\1<{literal}>', '<{/literal}>\1');
        return preg_replace($s, $r, $source);
    }

    public function smarty_post_filter($source, $smarty)
    {
        if($file_dependency = $smarty->properties['file_dependency']){
            list($hash, $info) = each($file_dependency);
            $tmpl = $smarty->template_resource;
            if($info[2] == 'file'){
                $theme = substr($info[0], strlen(__CFG::TMPL_DIR), -strlen($tmpl));
                $theme = str_replace('\\', '/', $theme);
                $theme = str_replace('/', '', $theme);
                $site = $this->system->config->get('site');
                $theme_url = trim($site['url'], '/').'/themes/'.$theme;
                return preg_replace('/%THEME%/', $theme_url, $source); 
            }
        }
        return $source;
    }

    public function theme_default_handler($type, $name, &$content, &$modified, Smarty $smarty)
    {
        if($type == 'file'){
            $file = __CFG::TMPL_DIR.'default'.DIRECTORY_SEPARATOR.$name;
            return $file;
        }
        return false;
    }   

    public function error($error)
    {
        if(is_numeric($error)){
            $this->system->response_code($error);
        }
        if(defined('IN_MOBILE')){
            $this->tmpl = "mobile/page/{$error}.html";
        }else{
            $this->tmpl = "page/{$error}.html";
        }
        $this->output();
    }

    public function shutdown()
    {
		
	}

	protected function default_theme()
	{
		static $theme;

		if ($theme === NULL) {
			if (empty($theme)) {
				$cookie_theme = K::M("system/cookie")->get("theme");

				if ($cookie_theme) {
					$theme = K::M("system/theme")->theme($cookie_theme);

					if (empty($theme)) {
						$theme = K::M("system/theme")->default_theme();
					}
				}
				else {
					$theme = K::M("system/theme")->default_theme();
				}
			}
		}

		return $theme;
	}
}
?>