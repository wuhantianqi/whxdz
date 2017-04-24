<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: notes.ctl.php 2138 2013-12-13 03:44:59Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Site_Notes extends Ctl
{
    
    public function index($site_id,$page=1)
    {
        if(!$site_id){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('site/site')->detail($site_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else{
            $filter = $pager = array();
            $pager['page'] = max(intval($page), 1);
            $pager['limit'] = $limit = 50;
            if($SO = $this->GP('SO')){
                $pager['SO'] = $SO;
                if($SO['status']){$filter['status'] = $SO['status'];}
            }
            $filter['site_id'] = $site_id;
            if($items = K::M('site/notes')->items($filter, null, $page, $limit, $count)){
                $pager['count'] = $count;
                $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array($site_id, '{page}')), array('SO'=>$SO));
            }
            $this->pagedata['status'] = K::M('site/site')->get_status();
            $this->pagedata['items'] = $items;
            $this->pagedata['pager'] = $pager;
            $this->pagedata['site_id'] = $site_id;
            $this->pagedata['site'] = $detail;
            $this->tmpl = 'admin:site/notes/items.html';
        }
    }

    public function so($site_id)
    {   if(!$site_id){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('site/site')->detail($site_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else{
        $this->pagedata['status'] = K::M('site/site')->get_status();
        $this->pagedata['site_id'] = $site_id;
        $this->tmpl = 'admin:site/notes/so.html';
        }
    }



    public function create($site_id)
    {
        if(!$site_id){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('site/site')->detail($site_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else{

            if($this->checksubmit()){
                if(!$data = $this->GP('data')){
                    $this->err->add('非法的数据提交', 201);
                }else{
                    if($data['status'] < $detail['status']){
                        $this->err->add('工地步骤不正确', 201);
                    }else{
                        $data['site_id'] = $site_id;
                        $data['create_ip'] = __IP;
                        if($notes_id = K::M('site/notes')->create($data)){
                            K::M('site/site')->update($site_id,array('status'=>$data['status']));
                            $this->err->add('添加内容成功');
                            $this->err->set_data('forward', '?site/notes-index-'.$site_id.'.html');
                        }
                    }
                } 
            }else{
               $this->pagedata['status'] = K::M('site/site')->get_status();
               $this->pagedata['site_id'] = $site_id; 
               $this->tmpl = 'admin:site/notes/create.html';
            }
        }
        
    }

    public function edit($notes_id=null)
    {   
        if(!($notes_id = (int)$notes_id) && !($notes_id = $this->GP('notes_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('site/notes')->detail($notes_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                if(!$site = K::M('site/site')->detail($detail['site_id'])){
                    $this->err->add('您要修改的内容不存在或已经删除', 212);
                }else{
                    if(K::M('site/notes')->update($notes_id, $data)){
                        K::M('site/site')->update($detail['site_id'],array('status'=>$data['status']));
                        $this->err->add('修改内容成功');
                    }  
                }
            } 
        }else{
            $this->pagedata['status'] = K::M('site/site')->get_status();
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:site/notes/edit.html';
        }
    }

    public function delete($notes_id=null)
    {
        if($notes_id = (int)$notes_id){
            if(K::M('site/notes')->delete($notes_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('notes_id')){
            if(K::M('site/notes')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}