<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
if (!defined('__CORE_DIR')) {
    exit("Access Denied");
}

class Ctl_Manager_Manager extends Ctl {

    public function index($page = 1) {
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 50;
        if ($SO = $this->GP('SO')) {
            $pager['SO'] = $SO;
            if ($SO['name']) {
                $filter['name'] = "LIKE:%" . $SO['name'] . "%";
            }
        }
        if ($items = K::M('manager/manager')->items($filter, null, $page, $limit, $count)) {
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO' => $SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:manager/manager/items.html';
    }

    public function so() {
        $this->tmpl = 'admin:manager/manager/so.html';
    }

    public function create() {
        if ($this->checksubmit()) {
            if (!$data = $this->GP('data')) {
                $this->err->add('非法的数据提交', 201);
            } else {
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
                            if ($a = $upload->upload($attach, 'manager')) {
                                $data[$k] = $a['photo'];

                                $size['thumb'] = $cfg['team']['thumb'] ? $cfg['team']['thumb'] : 200;
                                $size['small'] = $cfg['team']['small'] ? $cfg['team']['small'] : 200;

                                 $oImg->thumbs($a['file'], array($size['thumb'] => $a['file'].'_thumb.jpg', $size['small'] => $a['file'].'_small.jpg'));
                            }
                        }
                    }
                }

                if ($manager_id = K::M('manager/manager')->create($data)) {
                    if($attr=  $this->GP('attr')){
                        K::M('manager/attr')->update($manager_id,$attr);       
                    }
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?manager/manager-index.html');
                }
            }
        } else {
            $this->tmpl = 'admin:manager/manager/create.html';
        }
    }

    public function edit($manager_id = null) {
        if (!($manager_id = (int) $manager_id) && !($manager_id = $this->GP('manager_id'))) {
            $this->err->add('未指定要修改的内容ID', 211);
        } else if (!$detail = K::M('manager/manager')->detail($manager_id)) {
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        } else if ($this->checksubmit('data')) {
            if (!$data = $this->GP('data')) {
                $this->err->add('非法的数据提交', 201);
            } else {
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
                            if ($a = $upload->upload($attach, 'manager')) {
                     
                                $data[$k] = $a['photo'];

                                $size['thumb'] = $cfg['team']['thumb'] ? $cfg['team']['thumb'] : 200;
                                $size['small'] = $cfg['team']['small'] ? $cfg['team']['small'] : 200;

                               $oImg->thumbs($a['file'], array($size['thumb'] => $a['file'].'_thumb.jpg', $size['small'] => $a['file'].'_small.jpg'));
                            }
                        }
                    }
                }

                if (K::M('manager/manager')->update($manager_id, $data)) {
                    if($attr=  $this->GP('attr')){
                        K::M('manager/attr')->update($manager_id,$attr);       
                    }
                    $this->err->add('修改内容成功');
                }
            }
        } else {
             $this->pagedata['attr'] = K::M('manager/attr')->attrs_ids_by_manager($manager_id);
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'admin:manager/manager/edit.html';
        }
    }

    public function delete($manager_id = null) {
        if ($manager_id = (int) $manager_id) {
            if (K::M('manager/manager')->delete($manager_id)) {
                $this->err->add('删除成功');
            }
        } else if ($ids = $this->GP('manager_id')) {
            if (K::M('manager/manager')->delete($ids)) {
                $this->err->add('批量删除成功');
            }
        } else {
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}