<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

class Ctl_Mobile_Case extends Ctl_Mobile {
    
    public function index($page = 1){
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 10;
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $filter['attrs'] = $attr;
        $items = K::M('case/case')->items($filter,  array('orderby' => 'DESC', 'case_id' => 'DESC'), $page, $limit, $count);
        $this->pagedata['nextpage'] = $this->mklink('case:loaddata',  array('page' => '{page}'), array(),false);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl ='mobile/case.html';
    }
    
    public function  loaddata($page = 1){
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 10;
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $items = K::M('case/case')->items($filter,  array('orderby' => 'DESC', 'case_id' => 'DESC'), $page, $limit, $count);
  
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl ='mobile/case_loaddata.html';
    }
    
    public function detail($case_id = 0){
        if (!$case_id = (int) $case_id) {
            $this->error(404);
        }
        else if (!$case = K::M('case/case')->detail($case_id)) {
            $this->error(404);
        }
        elseif (!$case['audit']) {
            $this->error(404);
        }
        K::M('case/case')->update_count($case_id, 'views', 1);
        $this->pagedata['photos'] = K::M('case/photo')->items_by_case($case_id, 1, 50);
        $this->pagedata['detail'] = $case;
        $this->pagedata['is_like'] = K::M('case/like')->is_like($case_id, __IP);
        $this->tmpl = 'mobile/case_detail.html';
    }
    
    public function love($case_id)
    {
        if (!$case_id = (int) $case_id) {
            $this->err->add('案例不存在', 211);
        }
        else if (!$case = K::M('case/case')->detail($case_id)) {
            $this->err->add('案例不存在', 212);
        }
        elseif (!$case['audit']) {
            $this->err->add('该案例还未通过审核', 212);
        }
        elseif (K::M('case/like')->is_like($case_id, __IP)) {
            $this->err->add('已经喜欢过了', 212);
        }
        else {
            $data = array('case_id' => $case_id, 'uid' => $this->uid, 'create_ip' => __IP, 'dateline' => __TIME);
            K::M('case/like')->create($data);
            K::M('case/case')->update_count($case_id, 'likes', 1);
            $this->err->add('喜欢成功');
        }
    }
    
}