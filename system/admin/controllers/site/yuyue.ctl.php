<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
if (!defined('__CORE_DIR')) {
    exit("Access Denied");
}

class Ctl_Site_Yuyue extends Ctl {

    public function index($page = 1)
    {
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 50;
        if ($SO = $this->GP('SO')) {
            $pager['SO'] = $SO;
            if ($SO['site_id']) {
                $filter['site_id'] = $SO['site_id'];
            }
            if ($SO['mobile']) {
                $filter['mobile'] = "LIKE:%" . $SO['mobile'] . "%";
            }
            if ($SO['contact']) {
                $filter['contact'] = "LIKE:%" . $SO['contact'] . "%";
            }
        }
        if ($items = K::M('site/yuyue')->items($filter, array('yuyue_id'=>'desc'), $page, $limit, $count)) {
            $site_ids = array();
            foreach ($items as $val) {
                if (!empty($val['site_id'])) {
                    $site_ids[$val['site_id']] = $val['site_id'];
                }
            }
            if(!empty($site_ids)) $this->pagedata['site'] = K::M ('site/site')->items_by_ids($site_ids);
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO' => $SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:site/yuyue/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:site/yuyue/so.html';
    }

    public function detail($yuyue_id = null)
    {
        if (!$yuyue_id = (int) $yuyue_id) {
            $this->err->add('未指定要查看内容的ID', 211);
        }
        else if (!$detail = K::M('site/yuyue')->detail($yuyue_id)) {
            $this->err->add('您要查看的内容不存在或已经删除', 212);
        }
        else {
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'admin:site/yuyue/detail.html';
        }
    }

    public function create()
    {
        if ($this->checksubmit()) {
            if (!$data = $this->GP('data')) {
                $this->err->add('非法的数据提交', 201);
            }
            else {

                if ($yuyue_id = K::M('site/yuyue')->create($data)) {
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?site/yuyue-index.html');
                }
            }
        }
        else {
            $this->tmpl = 'admin:site/yuyue/create.html';
        }
    }

    public function edit($yuyue_id = null)
    {
        if (!($yuyue_id = (int) $yuyue_id) && !($yuyue_id = $this->GP('yuyue_id'))) {
            $this->err->add('未指定要修改的内容ID', 211);
        }
        else if (!$detail = K::M('site/yuyue')->detail($yuyue_id)) {
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }
        else if ($this->checksubmit('data')) {
            if (!$data = $this->GP('data')) {
                $this->err->add('非法的数据提交', 201);
            }
            else {
                $data['is_read'] = 1;
                if (K::M('site/yuyue')->update($yuyue_id, $data)) {
                    $this->err->add('修改内容成功');
                }
            }
        }
        else {
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'admin:site/yuyue/edit.html';
        }
    }

    public function doaudit($yuyue_id = null)
    {
        if ($yuyue_id = (int) $yuyue_id) {
            if (K::M('site/yuyue')->batch($yuyue_id, array('audit' => 1))) {
                $this->err->add('审核内容成功');
            }
        }
        else if ($ids = $this->GP('yuyue_id')) {
            if (K::M('site/yuyue')->batch($ids, array('audit' => 1))) {
                $this->err->add('批量审核内容成功');
            }
        }
        else {
            $this->err->add('未指定要审核的内容', 401);
        }
    }

    public function delete($yuyue_id = null)
    {
        if ($yuyue_id = (int) $yuyue_id) {
            if (K::M('site/yuyue')->delete($yuyue_id)) {
                $this->err->add('删除成功');
            }
        }
        else if ($ids = $this->GP('yuyue_id')) {
            if (K::M('site/yuyue')->delete($ids)) {
                $this->err->add('批量删除成功');
            }
        }
        else {
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}
