<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: comment.ctl.php 2335 2013-12-18 17:15:56Z youyi $
 */
if (!defined('__CORE_DIR')) {
    exit("Access Denied");
}

class Ctl_Case_Comment extends Ctl {

    public function index($page = 1)
    {
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 50;
        if ($SO = $this->GP('SO')) {
            $pager['SO'] = $SO;
            if ($SO['case_id']) {
                $filter['case_id'] = $SO['case_id'];
            }

            if ($SO['content']) {
                $filter['content'] = "LIKE:%" . $SO['content'] . "%";
            }
            if ($SO['audit']) {
                $filter['audit'] = $SO['audit'];
            }
        }
        if ($items = K::M('case/comment')->items($filter, null, $page, $limit, $count)) {
            $caseids = array();
            foreach ($items as $k => $v) {
            
                $caseids[$v['case_id']] = $v['case_id'];
                $items[$k]['create_ip'] = $v['create_ip'] . '(' . K::M("misc/location")->location($v['create_ip']) . ')';
            }
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO' => $SO));
        }
        $this->pagedata['caseList'] = K::M('case/case')->items_by_ids($caseids);
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:case/comment/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:case/comment/so.html';
    }

    public function create()
    {
        if ($this->checksubmit()) {
            if (!$data = $this->GP('data')) {
                $this->err->add('非法的数据提交', 201);
            }
            else {

                if ($comment_id = K::M('case/comment')->create($data)) {
                    $this->err->add('添加内容成功');
                    $this->err->set_data('forward', '?case/comment-index.html');
                }
            }
        }
        else {
            $this->tmpl = 'admin:case/comment/create.html';
        }
    }

    public function edit($comment_id = null)
    {
        if (!($comment_id = (int) $comment_id) && !($comment_id = $this->GP('comment_id'))) {
            $this->err->add('未指定要修改的内容ID', 211);
        }
        else if (!$detail = K::M('case/comment')->detail($comment_id)) {
            $this->err->add('您要修改的内容不存在或已经删除', 212);
        }
        else if ($this->checksubmit('data')) {
            if (!$data = $this->GP('data')) {
                $this->err->add('非法的数据提交', 201);
            }
            else {

                if (K::M('case/comment')->update($comment_id, $data)) {
                    $this->err->add('修改内容成功');
                }
            }
        }
        else {
   
            $this->pagedata['detail'] = $detail;
            $this->tmpl = 'admin:case/comment/edit.html';
        }
    }

    public function doaudit($comment_id = null)
    {
        if ($comment_id = (int) $comment_id) {
            if (K::M('case/comment')->batch($comment_id, array('audit' => 1))) {
                $this->err->add('审核内容成功');
            }
        }
        else if ($ids = $this->GP('comment_id')) {
            if (K::M('case/comment')->batch($ids, array('audit' => 1))) {
                $this->err->add('批量审核内容成功');
            }
        }
        else {
            $this->err->add('未指定要审核的内容', 401);
        }
    }

    public function delete($comment_id = null)
    {
        if ($comment_id = (int) $comment_id) {
            if (K::M('case/comment')->delete($comment_id)) {
                $this->err->add('删除成功');
            }
        }
        else if ($ids = $this->GP('comment_id')) {
            if (K::M('case/comment')->delete($ids)) {
                $this->err->add('批量删除成功');
            }
        }
        else {
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

}
