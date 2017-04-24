<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: tenders.ctl.php 2034 2013-12-07 03:08:33Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Tenders_Tenders extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['name']){$filter['name'] = "LIKE:%".$SO['name']."%";}
            if($SO['mobile']){$filter['mobile'] = "LIKE:%".$SO['mobile']."%";}
            if($SO['audit']){$filter['audit'] = $SO['audit'];}
        }
        

        if($items = K::M('tenders/tenders')->items($filter, null, $page, $limit, $count)){
             foreach($items as $k=>$v){
             
                $items[$k]['create_ip'] = $v['create_ip'].'('. K::M("misc/location")->location($v['create_ip']) .')';
            }
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }

        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:tenders/tenders/items.html';
    }

    public function audit($page =1){
        $filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        $filter['audit'] = 0;
        if($items = K::M('tenders/tenders')->items($filter, null, $page, $limit, $count)){
             foreach($items as $k=>$v){
             
                $items[$k]['create_ip'] = $v['create_ip'].'('. K::M("misc/location")->location($v['create_ip']) .')';
            }
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }

        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:tenders/tenders/items.html';
    }
    
    
    public function so()
    {
        $this->tmpl = 'admin:tenders/tenders/so.html';
    }



    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{

                $data['create_ip'] = __IP;
                $data['dateline']  = __TIME;
                if($id = K::M('tenders/tenders')->create($data)){
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?tenders/tenders-index.html');
                }
            } 
        }else{
           $this->pagedata['setting'] = K::M('tenders/setting')->fetch_all_setting();
           $this->pagedata['type']  = K::M('tenders/setting')->get_type();
           $this->tmpl = 'admin:tenders/tenders/create.html';
        }
    }

    public function edit($id=null)
    {
        if(!($id = (int)$id) && !($id = $this->GP('id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('tenders/tenders')->detail($id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $data['is_read'] = 1;
                if(K::M('tenders/tenders')->update($id, $data)){
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
          
            $this->pagedata['setting'] = K::M('tenders/setting')->fetch_all_setting();
           $this->pagedata['type']  = K::M('tenders/setting')->get_type();
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:tenders/tenders/edit.html';
        }
    }

    public function delete($id=null)
    {
        if($id = (int)$id){
            if(K::M('tenders/tenders')->delete($id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('id')){
            if(K::M('tenders/tenders')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}