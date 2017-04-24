<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: site.ctl.php 2088 2013-12-10 08:07:53Z langzhong $
 */
if (!defined('__CORE_DIR')) {
    exit("Access Denied");
}

class Ctl_Site_Site extends Ctl {

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

            if ($SO['status']) {
                $filter['status'] = $SO['status'];
            }
        }
        if ($items = K::M('site/site')->items($filter, null, $page, $limit, $count)) {
            $designer_ids = array();
            foreach ($items as $k => $v) {
                if ($v['designer_id']) {
                    $designer_ids[$v['designer_id']] = $v['designer_id'];
                }
            }
            if (!empty($designer_ids)) {
                $this->pagedata['designer_list'] = K::M('designer/designer')->items_by_ids($designer_ids);
            }
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO' => $SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->pagedata['status'] = K::M('site/site')->get_status();
        $this->tmpl = 'admin:site/site/items.html';
    }

    public function so()
    {
        $this->pagedata['status'] = K::M('site/site')->get_status();
        $this->tmpl = 'admin:site/site/so.html';
    }

    public function create()
    {
        if ($this->checksubmit()) {
            if (!$data = $this->GP('data')) {
                $this->err->add('非法的数据提交', 201);
            }
            else {
                if ($_FILES['data']) {
                    foreach ($_FILES['data'] as $k => $v) {
                        foreach ($v as $kk => $vv) {
                            $attachs[$kk][$k] = $vv;
                        }
                    }

                    $cfg = K::$system->config->get('attach');
                    $oImg = K::M('image/gd');
                    $upload = K::M('magic/upload');
                    foreach ($attachs as $k => $attach) {
                        if ($attach['error'] == UPLOAD_ERR_OK) {
                            if ($a = $upload->upload($attach, 'site')) {
                                $data[$k] = $a['photo'];

                                $size['photo'] = $cfg['site']['photo'] ? $cfg['site']['photo'] : 200;
                                $oImg->thumbs($a['file'], array($size['photo'] => $a['file']));
                            }
                        }
                    }
                }

                $data['create_ip'] = __IP;
                if ($site_id = K::M('site/site')->create($data)) {
                    if (!$attr = $this->GP('attr')) {
                        $attr = array();
                    }
                    K::M('site/attr')->update($site_id, $attr);
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?site/site-index.html');
                }
            }
        }
        else {

            $this->pagedata['status'] = K::M('site/site')->get_status();
            $this->tmpl = 'admin:site/site/create.html';
        }
    }

    public function edit($site_id = null)
    {
        if (!($site_id = (int) $site_id) && !($site_id = $this->GP('site_id'))) {
            $this->err->add('未指定要修改的内容ID', 211);
        }
        else if (!$detail = K::M('site/site')->detail($site_id)) {
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }
        else if ($this->checksubmit('data')) {
            if (!$data = $this->GP('data')) {
                $this->err->add('非法的数据提交', 201);
            }
            else {
                if ($_FILES['data']) {
                    foreach ($_FILES['data'] as $k => $v) {
                        foreach ($v as $kk => $vv) {
                            $attachs[$kk][$k] = $vv;
                        }
                    }
                    $cfg = K::$system->config->get('attach');
                    $oImg = K::M('image/gd');
                    $upload = K::M('magic/upload');
                    foreach ($attachs as $k => $attach) {
                        if ($attach['error'] == UPLOAD_ERR_OK) {
                            if ($a = $upload->upload($attach, 'site')) {
                                $data[$k] = $a['photo'];
                                $size['photo'] = $cfg['site']['photo'] ? $cfg['site']['photo'] : 200;
                                $oImg->thumbs($a['file'], array($size['photo'] => $a['file']));
                            }
                        }
                    }
                }

                if (K::M('site/site')->update($site_id, $data)) {
                    if (!$attr = $this->GP('attr')) {
                        $attr = array();
                    }
                    K::M('site/attr')->update($site_id, $attr);
                    $this->err->add('修改内容成功');
                }
            }
        }
        else {
            $this->pagedata['attr'] = K::M('site/attr')->attrs_ids_by_site($site_id);
            $this->pagedata['detail'] = $detail;
            $this->pagedata['status'] = K::M('site/site')->get_status();
            $this->tmpl = 'admin:site/site/edit.html';
        }
    }

    public function delete($site_id = null)
    {
        if ($site_id = (int) $site_id) {
            if (K::M('site/site')->delete($site_id)) {
                $this->err->add('删除成功');
            }
        }
        else if ($ids = $this->GP('site_id')) {
            if (K::M('site/site')->delete($ids)) {
                $this->err->add('批量删除成功');
            }
        }
        else {
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}
