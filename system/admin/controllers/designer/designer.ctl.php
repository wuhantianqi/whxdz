<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
if (!defined('__CORE_DIR')) {
    exit("Access Denied");
}

class Ctl_Designer_Designer extends Ctl {

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
        if ($items = K::M('designer/designer')->items($filter, null, $page, $limit, $count)) {
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO' => $SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:designer/designer/items.html';
    }

    public function so() {
        $this->tmpl = 'admin:designer/designer/so.html';
    }

    public function create(){
        if ($this->checksubmit()){
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
                            if ($a = $upload->upload($attach, 'designer')){
                                $data[$k] = $a['photo'];
                                $size['thumb'] = $cfg['team']['thumb'] ? $cfg['team']['thumb'] : 200;
                                $size['small'] = $cfg['team']['small'] ? $cfg['team']['small'] : 200;

                                 $oImg->thumbs($a['file'], array($size['thumb'] => $a['file'].'_thumb.jpg', $size['small'] => $a['file'].'_small.jpg'));
                            }
                        }
                    }
                }
                if ($designer_id = K::M('designer/designer')->create($data)){
                    if($attr=  $this->GP('attr')){
                        K::M('designer/attr')->update($designer_id,$attr);       
                    }
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?designer/designer-index.html');
                }
            }
        } else {
            $this->tmpl = 'admin:designer/designer/create.html';
        }
    }

    public function edit($designer_id = null) {
        if (!($designer_id = (int) $designer_id) && !($designer_id = $this->GP('designer_id'))) {
            $this->err->add('未指定要修改的内容ID', 211);
        } else if (!$detail = K::M('designer/designer')->detail($designer_id)) {
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
                            if ($a = $upload->upload($attach, 'designer')) {
                     
                                $data[$k] = $a['photo'];

                                $size['thumb'] = $cfg['team']['thumb'] ? $cfg['team']['thumb'] : 200;
                                $size['small'] = $cfg['team']['small'] ? $cfg['team']['small'] : 200;

                               $oImg->thumbs($a['file'], array($size['thumb'] => $a['file'].'_thumb.jpg', $size['small'] => $a['file'].'_small.jpg'));
                            }
                        }
                    }
                }

                if (K::M('designer/designer')->update($designer_id, $data)) {
                    if($attr=  $this->GP('attr')){
                        K::M('designer/attr')->update($designer_id,$attr);       
                    }
                    $this->err->add('修改内容成功');
                }
            }
        } else {
             $this->pagedata['attr'] = K::M('designer/attr')->attrs_ids_by_designer($designer_id);
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'admin:designer/designer/edit.html';
        }
    }

    public function delete($designer_id = null) {
        if ($designer_id = (int) $designer_id) {
            if (K::M('designer/designer')->delete($designer_id)) {
                $this->err->add('删除成功');
            }
        } else if ($ids = $this->GP('designer_id')) {
            if (K::M('designer/designer')->delete($ids)) {
                $this->err->add('批量删除成功');
            }
        } else {
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}