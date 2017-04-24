<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: adv.ctl.php 2034 2013-12-07 03:08:33Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Adv_Adv extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['adv_id']){
                $filter['adv_id'] = $SO['adv_id'];
            }else{
                if($SO['title']){$filter['title'] = "LIKE:%".$SO['title']."%";}
                if($SO['key']){$filter['key'] = "LIKE:%".$SO['key']."%";}
                if(is_array($SO['dateline'])){
                    if($SO['dateline'][0] && $SO['dateline'][1]){
                        $a = strtotime($SO['dateline'][0]); 
                        $b = strtotime($SO['dateline'][1]);
                        $filter['dateline'] = $a."~".$b;
                    }
                }
                if(is_numeric($SO['audit'])){
                    $filter['audit'] = $SO['audit'] ? 1 : 0;
                }
            }
        }
        $filter['closed'] = '0';
        $theme = K::M('system/theme')->default_theme();
        if(!$theme){
             $this->err->add('请在设置=>模板设置安装一下模板', 211);
        }else{
            $filter['theme'] = $theme['theme'];
            if($items = K::M('adv/adv')->items($filter, null, $page, $limit, $count)){
                $pager['count'] = $count;
                $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
            }
            $this->pagedata['items'] = $items;
            $this->pagedata['pager'] = $pager;
            $this->pagedata['from_list'] = K::M('adv/adv')->from_list();
            $this->tmpl = 'admin:adv/adv/items.html';
        }
    }

    public function so()
    {
        $this->tmpl = 'admin:adv/adv/so.html';
    }

    public function detail($adv_id=null)
    {
        if(!$adv_id = intval($adv_id)){
            $this->err->add('未指定广告位的ID', 211);
        }else if(!$detail = K::M('adv/adv')->detail($adv_id)){
            $this->err->add('你要管理的广告位不存在', 212);
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:adv/adv/detail.html';
        }
    }

    public function create()
    {
        if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $theme = K::M('system/theme')->default_theme();
                if(!$theme){
                     $this->err->add('请在设置=>模板设置安装一下模板', 211);
                }else{
                    $data['theme'] = $theme['theme'];
                    if($adv_id = K::M('adv/adv')->create($data)){
                        $this->err->add('修改内容成功');
                        $this->err->set_data('forward', '?adv/adv-index.html');
                    }
                }
            } 
        }else{
            $this->pagedata['from_list'] = K::M('adv/adv')->from_list();
            $this->tmpl = 'admin:adv/adv/create.html';
        }
    }

    public function edit($adv_id=null)
    {
        if(!($adv_id = intval($adv_id)) && !($adv_id = intval($this->GP('adv_id')))){
            $this->err->add('未指要修改广告的ID', 211);
        }else if(!$detail = K::M('adv/adv')->adv($adv_id)){
            $this->err->add('你要修改的广告位不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else if(K::M('adv/adv')->update($adv_id, $data)){
                $this->err->add('修改内容成功');
                $this->err->set_data('forward', '?adv/adv-index.html');
            }
        }else{
            $this->pagedata['from_list'] = K::M('adv/adv')->from_list();
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:adv/adv/edit.html';
        }
    }

    public function delete($pk=null)
    {
        if(!empty($pk)){
            if(K::M('adv/adv')->delete($pk)){
                $this->err->add('删除成功');
            }
        }else if($pks = $this->GP('adv_id')){
            if(K::M('adv/adv')->delete($pks)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}