<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Tuan_Tuan extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['home_name']){$filter['home_name'] = "LIKE:%".$SO['home_name']."%";}
            if($SO['title']){$filter['title'] = "LIKE:%".$SO['title']."%";}
        }
        $filter['closed'] = '0'; 
        if($items = K::M('tuan/tuan')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:tuan/tuan/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:tuan/tuan/so.html';
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
            $cfg = K::$system->config->get('attach');
            $oImg = K::M('image/gd');
            $upload = K::M('magic/upload');
            foreach ($attachs as $k => $attach) {
                if ($attach['error'] == UPLOAD_ERR_OK) {
                    if ($a = $upload->upload($attach, 'tuan')) {
                        $data[$k] = $a['photo'];

                        $size['thumb'] = $cfg['tuan']['thumb'] ? $cfg['tuan']['thumb'] : 200;
                        $size['small'] = $cfg['tuan']['small'] ? $cfg['tuan']['small'] : 200;

                        $oImg->thumbs($a['file'], array($size['thumb'] => $a['file'].'_thumb.jpg', $size['small'] => $a['file'].'_small.jpg'));
                    }
                }
            }
        }

                if($tuan_id = K::M('tuan/tuan')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?tuan/tuan-index.html');
                }
            } 
        }else{
           $this->tmpl = 'admin:tuan/tuan/create.html';
        }
    }

    public function edit($tuan_id=null)
    {
        if(!($tuan_id = (int)$tuan_id) && !($tuan_id = $this->GP('tuan_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('tuan/tuan')->detail($tuan_id)){
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
           $cfg = K::$system->config->get('attach');
            $oImg = K::M('image/gd');
            $upload = K::M('magic/upload');
            foreach ($attachs as $k => $attach) {
                if ($attach['error'] == UPLOAD_ERR_OK) {
                    if ($a = $upload->upload($attach, 'tuan')) {
                        $data[$k] = $a['photo'];

                        $size['thumb'] = $cfg['tuan']['thumb'] ? $cfg['tuan']['thumb'] : 200;
                        $size['small'] = $cfg['tuan']['small'] ? $cfg['tuan']['small'] : 200;

                        $oImg->thumbs($a['file'], array($size['thumb'] => $a['file'].'_thumb.jpg', $size['small'] => $a['file'].'_small.jpg'));
                    }
                }
            }
        }

                if(K::M('tuan/tuan')->update($tuan_id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:tuan/tuan/edit.html';
        }
    }



    public function delete($tuan_id=null)
    {
        if($tuan_id = (int)$tuan_id){
            if(K::M('tuan/tuan')->delete($tuan_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('tuan_id')){
            if(K::M('tuan/tuan')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}