<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: case.ctl.php 2917 2014-01-08 09:10:10Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Case_Case extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['case_id']){$filter['case_id'] = $SO['case_id'];}

            if(is_numeric($SO['audit'])){$filter['audit'] = $SO['audit'];}
            if($SO['title']){$filter['title'] = "LIKE:%".$SO['title']."%";}
            if(is_array($SO['dateline'])){if($SO['dateline'][0] && $SO['dateline'][1]){$a = strtotime($SO['dateline'][0]); $b = strtotime($SO['dateline'][1])+86400;$filter['dateline'] = $a."~".$b;}}
        }
        $filter['closed'] = 0 ;
        if($items = K::M('case/case')->items($filter, array('case_id'=>'desc'), $page, $limit, $count)){
        	$pager['count'] = $count;
             $designer_ids = array();
            foreach($items as $k=>$v){
                
                if($v['designer_id']){
                    $designer_ids[$v['designer_id']] = $v['designer_id'];
                }
            }
              
            if(!empty($designer_ids)){
                $this->pagedata['designer_list'] = K::M('designer/designer')->items_by_ids($designer_ids);
            }
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:case/case/items.html';
    }

    public function audit($page=1)
    {
        $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 50;
        $filter = array('audit'=>0, 'closed'=>0); 
        if($items = K::M('case/case')->items($filter, null, $page, $limit, $count)){
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:case/case/audit.html';        
    }

    public function update($from='audit', $case_id=null)
    {
        $data = array();
        if($from == 'audit'){
            $data = array('audit'=>'1');
            $msg = '审核';
        }
        if($data){
            if($case_id = (int)$case_id){
                if(K::M('case/case')->update($case_id,  $data)){
                    $this->err->add($msg.'成功');
                }
            }else if($ids = $this->GP('case_id')){
                foreach((array)$ids as $id){
                    K::M('case/case')->update((int)$id,  $data);
                }
                $this->err->add("批量{$msg}成功");
            }else{
                $this->err->add("未指定要{$msg}的内容ID", 401);
            }
        }else{
            $this->err->add('未定义操作', 201);
        }
    }

    public function so()
    {
        $this->tmpl = 'admin:case/case/so.html';
    }

    public function detail($case_id=null)
    {
        if(!$case_id = (int)$case_id){
            $this->err->add('非指定相册ID', 211);
        }else if(!$case = K::M('case/case')->detail($case_id)){
            $this->err->add('相册不存在或已经删除', 212);
        }else{
            $pager = array('case_id'=>$case_id);
            $pager['page'] = (int)$page;
            $pager['limit'] = $limit = 50;
            $pager['count'] = $count = 0;
            $this->pagedata['detail'] = $detail;
            if($items = K::M('case/photo')->items_by_case($case_id, $page, $limit, $count)){
                $this->pagedata['items'] = $items;
                $pager['count'] = $count;
                $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink("case/case:detail", array('{page}')));
            }
            $this->pagedata['pager'] = $pager;
            $this->pagedata['case'] = $case;
            $this->tmpl = 'admin:case/case/detail.html';
        }
    }

    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                if($case_id = K::M('case/case')->create($data)){
                    if(!$attr = $this->GP('attr')){
                        $attr = array();
                    }
                    K::M('case/attr')->update($case_id, $attr);
                    
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', $this->mklink('case/case:index'));
                }
            } 
        }else{
           $this->tmpl = 'admin:case/case/create.html';
        }
    }

    public function edit($case_id=null)
    {
        if(!($case_id = (int)$case_id) && !($case_id = $this->GP('case_id'))){
            $this->err->add('未指定要修改的内容ID', 211);
        }else if(!$detail = K::M('case/case')->detail($case_id)){
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                if(K::M('case/case')->update($case_id, $data)){
                    if(!$attr = $this->GP('attr')){
                        $attr = array();
                    }    
                    K::M('case/attr')->update($case_id, $attr);   
                    $this->err->add('修改内容成功');
                }  
            } 
        }else{
            if($attrs = K::M('case/attr')->attrs_by_case($case_id)){
                $this->pagedata['attrs'] = $attrs;
                $detail['attrvalues'] = array_keys($attrs);
            }
                   
            $this->pagedata['detail'] = $detail;            
        	$this->tmpl = 'admin:case/case/edit.html';
        }
    }

    public function delete($case_id=null)
    {
        if($case_id = (int)$case_id){
            if(K::M('case/case')->delete($case_id)){
                $this->err->add('删除成功');
            }
        }else if($ids = $this->GP('case_id')){
            if(K::M('case/case')->delete($ids)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}