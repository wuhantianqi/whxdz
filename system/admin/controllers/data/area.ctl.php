<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: area.ctl.php 2034 2013-12-07 03:08:33Z langzhong $
 */

class Ctl_Data_Area extends Ctl
{
    
    public function index($page=1)
    {
    	$filter = $pager = array();
    	$pager['page'] = max(intval($page), 1);
    	$pager['limit'] = $limit = 50;
        if($SO = $this->GP('SO')){
            $pager['SO'] = $SO;
            if($SO['area_id']){$filter['area_id'] = $SO['area_id'];}
            if($SO['city_id']){$filter['city_id'] = $SO['city_id'];}
            if($SO['area_name']){$filter['area_name'] = "LIKE:%".$SO['area_name']."%";}
        }
        if($items = K::M('data/area')->items($filter, null, $page, $limit, $count)){
        	$pager['count'] = $count;
        	$pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
        }
        $this->pagedata['city_list'] = K::M('data/city')->fetch_all();
        $this->pagedata['items'] = $items;
        $this->pagedata['pager'] = $pager;
        $this->tmpl = 'admin:data/area/items.html';
    }

    public function so()
    {
        $this->tmpl = 'admin:data/area/so.html';
    }

    public function detail($pk)
    {
    	$this->pagedata['detail'] = K::M('data/area')->detail($pk);
    	$this->tmpl = 'admin:data/area/detail.html';
    }

    public function create()
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else if($area_id = K::M('data/area')->create($data)){
                $this->err->add('修改内容成功');
                $this->err->set_data('forward', '?data/area-index.html');

            }
        }else{
           $this->tmpl = 'admin:data/area/create.html';
        }
    }

    public function edit($pk=null)
    {
        if($this->checksubmit()){
            if(!$data = $this->GP('data')){
                $this->err->add('非法的数据提交', 201);
            }else if(!$area_id = $this->GP('area_id')){
                $this->err->add('未指要修改ID', 202);
            }else if(K::M('data/area')->update($area_id, $data)){
                $this->err->add('修改内容成功');

            }
        }else{
        	$this->pagedata['detail'] = K::M('data/area')->detail($pk);
        	$this->tmpl = 'admin:data/area/edit.html';
        }
    }

    public function delete($pk=null)
    {
        if(!empty($pk)){
            if(K::M('data/area')->delete($pk)){
                $this->err->add('删除成功');
            }
        }else if($pks = $this->GP('area_id')){
            if(K::M('data/area')->delete($pks)){
                $this->err->add('批量删除成功');
            }
        }else{
            $this->err->add('未指定要删除的内容ID', 401);
        }
    }

	public function city($city_id)
	{
		if(!$city_id = intval($city_id)){
			$this->err->add('未指定城市ID', 211);
		}else{
			$areas = K::M('data/area')->areas_by_city($city_id);
			$this->err->set_data('areas', array_values((array)$areas));
		}
		$this->err->json();
	}
}