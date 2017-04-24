<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
if (!defined('__CORE_DIR')) {
    exit("Access Denied");
}

class Ctl_Product_Product extends Ctl {

    public function index($page = 1)
    {
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 50;
        if ($SO = $this->GP('SO')) {
            $pager['SO'] = $SO;
            if ($SO['product_name']) {
                $filter['product_name'] = "LIKE:%" . $SO['product_name'] . "%";
            }
            if ($SO['cat_id']) {
                $filter['cat_id'] = $SO['cat_id'];
            }
        }
        if ($items = K::M('product/product')->items($filter, null, $page, $limit, $count)) {
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO' => $SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->pagedata['cateList'] = K::M('product/cate')->fetch_all(); 
        $this->tmpl = 'admin:product/product/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:product/product/so.html';
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
                            if ($a = $upload->upload($attach, 'product')) {
                                $data[$k] = $a['photo'];

                                $size['photo'] = $cfg['product']['photo'] ? $cfg['product']['photo'] : 200;
                                $oImg->thumbs($a['file'], array($size['photo'] => $a['file']));
                            }
                        }
                    }
                }
                $data['price'] = (int)$data['price'];
                $data['my_price'] = $data['my_price'];
                if ($product_id = K::M('product/product')->create($data)) {
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?product/product-index.html');
                }
            }
        }
        else {
            $this->tmpl = 'admin:product/product/create.html';
        }
    }

    public function edit($product_id = null)
    {
        if (!($product_id = (int) $product_id) && !($product_id = $this->GP('product_id'))) {
            $this->err->add('未指定要修改的内容ID', 211);
        }
        else if (!$detail = K::M('product/product')->detail($product_id)) {
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
                            if ($a = $upload->upload($attach, 'product')) {
                                $data[$k] = $a['photo'];
                                $size['photo'] = $cfg['product']['photo'] ? $cfg['product']['photo'] : 200;
                                $oImg->thumbs($a['file'], array($size['photo'] => $a['file']));
                            }
                        }
                    }
                }
                $data['price'] = (int)$data['price'];
                $data['my_price'] = $data['my_price'];
                if (K::M('product/product')->update($product_id, $data)) {
                    $this->err->add('修改内容成功');
                }
            }
        }
        else {
            $detail['price'] = round($detail['price'],2);
            $detail['my_price'] = $detail['my_price'];
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'admin:product/product/edit.html';
        }
    }

    public function delete($product_id = null)
    {
        if ($product_id = (int) $product_id) {
            if (K::M('product/product')->delete($product_id)) {
                $this->err->add('删除成功');
            }
        }
        else if ($ids = $this->GP('product_id')) {
            if (K::M('product/product')->delete($ids)) {
                $this->err->add('批量删除成功');
            }
        }
        else {
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}
