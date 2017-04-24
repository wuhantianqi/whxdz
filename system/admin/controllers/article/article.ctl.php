<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: article.ctl.php 2034 2013-12-07 03:08:33Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Article_Article extends Ctl
{

    protected $article_from = 'article';
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['article_id']){$filter['article_id'] = $SO['article_id'];}
            if($SO['cat_id']){
                if($cids = K::M('article/cate')->children_ids($SO['cat_id'])){
                    $filter['cat_id'] = explode(',', $cids);
                }
            }
            if($SO['title']){$filter['title'] = "LIKE:%".$SO['title']."%";}
            if(is_array($SO['dateline'])){
                if($SO['dateline'][0] && $SO['dateline'][1]){
                    $a = strtotime($SO['dateline'][0]); 
                    $b = strtotime($SO['dateline'][1]);
                    $filter['dateline'] = $a."~".$b;
                }
            }
            if(is_numeric($SO['hidden'])){
                $filter['hidden'] = $SO['hidden'] ? 1 : 0;
            }
            if(is_numeric($SO['audit'])){
                $filter['audit'] = $SO['audit'] ? 1 : 0;
            }            
        }
        $filter['closed'] = 0;
        $filter['from'] = $pager['from'] = $this->article_from;
        $orderby = array('orderby'=>'ASC','article_id'=>'DESC');
        if($items = K::M('article/view')->items($filter, $orderby, $page, $limit, $count)){
        	$pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink("article/article:index", array("{page}")), array("SO"=>$SO));
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:article/article/items.html';
    }

    public function so($target=null, $multi=null)
    {
        $pager['from'] = $this->article_from;
        if($target == 'dialog'){
            $pager['multi'] = $multi == 'Y' ? 'Y' : 'N';
            $pager['target'] = $target;
        }
        $this->pagedata['pager'] = $pager;   
        $this->tmpl = 'admin:article/article/so.html';
    }

    public function dialog($multi=1, $page=1)
    {
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 10;
        $pager['multi'] = $multi = $multi ? 1 : 0;

        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['article_id']){$filter['article_id'] = $SO['article_id'];}
            if($SO['cat_id']){
                if($cids = K::M('article/cate')->children_ids($SO['cat_id'])){
                    $filter['cat_id'] = explode(',', $cids);
                }
            }
            if($SO['title']){$filter['title'] = "LIKE:%".$SO['title']."%";}
            if(is_array($SO['dateline'])){
                if($SO['dateline'][0] && $SO['dateline'][1]){
                    $a = strtotime($SO['dateline'][0]); 
                    $b = strtotime($SO['dateline'][1]);
                    $filter['dateline'] = $a."~".$b;
                }
            }
            if(is_numeric($SO['hidden'])){
                $filter['hidden'] = $SO['hidden'] ? 1 : 0;
            }
            if(is_numeric($SO['audit'])){
                $filter['audit'] = $SO['audit'] ? 1 : 0;
            }            
        }
        $filter['closed'] = 0;
        $filter['from'] = $pager['from'] = $this->article_from;
        $orderby = array('orderby'=>'ASC','article_id'=>'DESC');
        if($items = K::M('article/view')->items($filter, $orderby, $page, $limit, $count)){
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array($multi, '{page}')), array('SO'=>$SO));;
        }
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:article/article/dialog.html';       
    }

    public function create()
    {   
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                $data['from'] = $this->article_from;
                if($article_id = K::M('article/handler')->create($data)){
                    if($photos = $this->__upload()){
                        K::M('article/handler')->update($article_id, $photos);
                    }
                    $this->err->add('添加文章成功');
                    $this->err->set_data('forward', '?article/'.$this->article_from.'-index.html');
                }
            }
        }else{
            $pager['from'] = $this->article_from;
            $this->pagedata['pager'] = $pager;            
            $this->tmpl = 'admin:article/article/create.html';
        }
    }

    public function edit($article_id=null)
    {
        if(!($article_id = (int)$article_id) && !($article_id = (int)$this->GP('article_id'))){
            $this->err->add('未指要修改文章ID', 211);
        }else if(!$detail = K::M('article/view')->detail($article_id)){
            $this->err->add('文章不存在或已经删除', 212);
        }else if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
                if(K::M('article/handler')->update($article_id, $data)){
                    if($photos = $this->__upload($detail)){
                        K::M('article/handler')->update($article_id, $photos);
                    }
                    $this->err->add('修改文章成功');
                }                
            } 
        }else{
            $pager['from'] = $this->article_from;
            $this->pagedata['pager'] = $pager;
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:article/article/edit.html';
        }
    }

    public function delete($pk=null)
    {
        if(!empty($pk)){
            if(K::M('article/handler')->delete($pk)){
                $this->err->add('删除成功');
            }
        }else if($pks = $this->GP('article_id')){
            if(K::M('article/handler')->delete($pks)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

    protected function __upload($article=array())
    {
        $photos = array();
        if($_FILES['data']){
            foreach($_FILES['data'] as $k=>$v){
                foreach($v as $kk=>$vv){
                    $attachs[$kk][$k] = $vv;
                }
            }
            $upload = K::M('magic/upload');
            foreach($attachs as $k=>$attach){
                if($attach['error'] == UPLOAD_ERR_OK){
                    if($a = $upload->upload($attach, 'article', $article[$k])){
                        $photos[$k] = $a['photo'];
                    }
                }
            }
        }
        return $photos;      
    }

}