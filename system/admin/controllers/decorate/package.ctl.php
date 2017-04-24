<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Decorate_Package extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['title']){$filter['title'] = "LIKE:%".$SO['title']."%";}
        }
        if($items = K::M('decorate/package')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:decorate/package/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:decorate/package/so.html';
    }



    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
        if($_FILES['data']){
            foreach($_FILES['data'] as $k=>$v){
                foreach($v as $kk=>$vv){
                    $attachs[$kk][$k] = $vv;
                }
            }
            $upload = K::M('magic/upload');
            foreach($attachs as $k=>$attach){
                if($attach['error'] == UPLOAD_ERR_OK){
                    if($a = $upload->upload($attach, 'decorate')){
                        $data[$k] = $a['photo'];
                    }
                }
            }
        }

                if($package_id = K::M('decorate/package')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?decorate/package-index.html');
                }
            } 
        }else{
           $this->tmpl = 'admin:decorate/package/create.html';
        }
    }

    public function edit($package_id=null)
    {
        if(!($package_id = (int)$package_id) && !($package_id = $this->GP('package_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('decorate/package')->detail($package_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
        if($_FILES['data']){
            foreach($_FILES['data'] as $k=>$v){
                foreach($v as $kk=>$vv){
                    $attachs[$kk][$k] = $vv;
                }
            }
            $upload = K::M('magic/upload');
            foreach($attachs as $k=>$attach){
                if($attach['error'] == UPLOAD_ERR_OK){
                    if($a = $upload->upload($attach, 'decorate')){
                        $data[$k] = $a['photo'];
                    }
                }
            }
        }

                if(K::M('decorate/package')->update($package_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:decorate/package/edit.html';
        }
    }



    public function delete($package_id=null)
    {
        if($package_id = (int)$package_id){
            if(K::M('decorate/package')->delete($package_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('package_id')){
            if(K::M('decorate/package')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}