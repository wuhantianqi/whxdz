<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: item.ctl.php 2034 2013-12-07 03:08:33Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Ctl_Adv_Item extends Ctl
{
    
    public function create($adv_id=null)
    {
        if(!($adv_id = intval($adv_id)) && !($adv_id = intval($this->GP('adv_id')))){
            $this->err->add('未指定对应的广告位ID', 211);
        }else if(!$adv = K::M('adv/adv')->adv($adv_id)){
             $this->err->add('广告位不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
               if($attachs = $_FILES['data']){
                    if($photos = $this->__upload($attachs)){
                        $data = $data + $photos;
                    }
                }
                $data['adv_id'] = $adv_id;
                if($item_id = K::M('adv/item')->create($data)){
                    $this->err->add('添加广告成功');
                    $this->err->set_data('forward', '?adv/adv-detail-'.$adv_id.'.html');
                }
            } 
        }else{
            $this->pagedata['adv'] = $adv;
            $this->tmpl = 'admin:adv/item/create.html';
        }
    }

    public function edit($item_id=null)
    {
        if(!($item_id = intval($item_id)) && !($item_id = intval($this->GP('item_id')))){
            $this->err->add('未指要修改广告的ID', 211);
        }else if(!$detail = K::M('adv/item')->item($item_id)){
            $this->err->add('你要修改的广告不存在或已经删除', 212);
        }else if(!$adv = K::M('adv/adv')->adv($detail['adv_id'])){
            $this->err->add('所在的广告位不存在或已经删除', 212);
        }else if($this->checksubmit('data')){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else{
               if($attachs = $_FILES['data']){
                    if($photos = $this->__upload($attachs, $detail)){
                        $data = $data + $photos;
                    }
                }
                if(K::M('adv/item')->update($item_id, $data)){
                    $this->err->add('修改广告成功');
                    $this->err->set_data('forward', '?adv/adv-detail-'.$detail['adv_id'].'.html');
                }
            } 
        }else{
            $this->pagedata['adv'] = $adv;
        	$this->pagedata['detail'] = $detail;
        	$this->tmpl = 'admin:adv/item/edit.html';
        }
    }

    public function update()
    {
        if(!$adv_id = (int)$this->GP('adv_id')){
            $this->err->add('未指定对应的广告位ID', 211);
        }else if($orderby = $this->GP('orderby')){
            $obj = K::M('adv/item');
            foreach((array)$orderby as $item_id=>$order){
                $item_id = (int)$item_id;
                $order = (int)$order;
                $obj->update($item_id, array('orderby'=>$order));
            }
            $this->err->add('更新数据成功');
        }
    }

    public function delete($pk=null)
    {
        if(!empty($pk)){
            if(K::M('adv/item')->delete($pk, true)){
                $this->err->add('删除广告成功');
            }
        }else if($pks = $this->GP('item_id')){
            if(K::M('adv/item')->delete($pks, true)){
                $this->err->add('批量删除广告成功');
            }
        }else{
            $this->err->add('未指定要删除的广告ID', 401);
        }
    }

    protected function __upload($data, $item=array())
    {
        $attachs = $photos = array();
        if($data){
            foreach($data as $k=>$v){
                foreach($v as $kk=>$vv){
                    $attachs[$kk][$k] = $vv;
                }
            }
            $upload = K::M('magic/upload');
            foreach($attachs as $k=>$attach){
                if($attach['error'] == UPLOAD_ERR_OK){
                    if($a = $upload->upload($attach, 'adv', $item[$k])){
                        $photos[$k] = $a['photo'];
                    }
                }
            }
        }
        return $photos;
    }

}