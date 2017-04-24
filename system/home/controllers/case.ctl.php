<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: case.ctl.php 3137 2014-01-20 07:19:19Z youyi $
 */
class Ctl_Case extends Ctl {

    public function items($page = 1)
    {
        $this->index($page);
    }
    
    public function dianping($page =1){
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 15;
        $filter['audit'] = 1;
        //$filter['closed'] = 0;
        //$filter['is_dianping'] = 1;
        if ($items = K::M('case/comment')->items($filter, null, $page, $limit, $count)) {
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('case:dianping',array('page' => '{page}'), array(), true), array());
            $case_ids = array();
            foreach($items as $k=>$v){
                $case_ids[$v['case_id']] = $v['case_id'];
            }
            if($case_ids){
                $this->pagedata['case_list'] = K::M('case/case')->items_by_ids($case_ids);
            }
             $this->pagedata['items'] = $items;
        }       
        $this->pagedata['pager'] = $pager;
        K::M('helper/seo')->init('case_dianping',array());
        $this->tmpl = 'case_dianping.html';
    }
    
    public function index($page = 1)
    {
        $url = array();
        $attr_values = K::M('data/attr')->attrs_by_from('zx:case');
        $http_key = $attr_keys = array();
        foreach ($attr_values as $key => $value) {
            $http_key['attr' . $key] = 'attr' . $key;
        }
        $http_key['page'] = 'page';
        $num = count($http_key);
        $uri = explode('-', trim($this->request['uri'], '.html'));
        foreach ($uri as $k => $v) {
            if (!is_numeric($v)) {
                unset($uri[$k]);
            }
        }
        if (count($uri) > $num) {
            $uri = array_slice($uri, 0, $num);
        }
        else {
            $uri = array_pad($uri, $num, 0);
        }
        $url = array_combine($http_key, $uri);
        $page = empty($url['page']) ? 1 : (int) $url['page'];
        $attr = array();
        foreach ($attr_values as $key => $value) {
            $attr_values[$key]['link'] = $this->mklink('case:items', array_merge($url, array('attr' . $key => 0)), array(), true);
            if (empty($url['attr' . $key]))
                $attr_values[$key]['checked'] = true;
            foreach ($value['values'] as $k => $v) {
                $attr_values[$key]['values'][$k]['link'] = $this->mklink('case:items', array_merge($url, array('attr' . $key => $k)), array(), true);
                if (!empty($url['attr' . $key]) && $url['attr' . $key] == $k) {
                    $attr[] = $k;
                    $attr_values[$key]['values'][$k]['checked'] = true;
                }
            }
        }
        $order = array();
      
        $filter = $pager = array();
        $pager['page'] = max(intval($page), 1);
        $pager['limit'] = $limit = 6;
        $filter['audit'] = 1;
        $filter['closed'] = 0;
        $filter['attrs'] = $attr;
        if ($s = $this->GP('s')) {
            $pager['s'] = $s = htmlspecialchars($s);
            $filter['title'] = "LIKE:%" . $s . "%"; 
        }
        if ($items = K::M('case/case')->items($filter, $order, $page, $limit, $count)) {
            $designer_ids = array();
            foreach ($items as $k => $val) {
              if(!empty($val['designer_id'])){
                  $designer_ids[$val['designer_id']] = $val['designer_id'];                  
              }
              if(!empty($val['lastphotos'])){
                    $val['allphotos']= K::M('case/photo')->items_by_case($val['case_id']);
                    $items[$k] = $val;
                }
            }  
            if(!empty($designer_ids)){
                $this->pagedata['designer'] = K::M('designer/designer')->items_by_ids($designer_ids);
            }
            $pager['count'] = $count;
            $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('case:items', array_merge($url, array('page' => '{page}')), array(), true), array('s' => $pager['s']));
        }
        $this->pagedata['url_data'] = $url;
        $this->pagedata['attr'] = $attr;
        $this->pagedata['attr_values'] = $attr_values;
        $this->pagedata['case'] = $items;
        $this->pagedata['pager'] = $pager;
        K::M('helper/seo')->init('case',array());
        //获取url
        $curlnm =array_keys($_GET);
        $curlnm=explode("-",$curlnm[0]);
        $this->pagedata['curlnm'] = $curlnm[2];
        $this->tmpl = 'case.html';
    }

    public function detail($case_id, $page = 1)
    {
        if (!$case_id = (int) $case_id) {
            $this->error(404);
        }
        else if (!$detail = K::M('case/case')->detail($case_id)) {
            $this->error(404);
        }
        elseif ($detail['closed']){
            $this->error(404);
        }
        elseif (!$detail['audit']) {
            $this->error(404);
        }
        else {
            K::M('case/case')->update_count($case_id, 'views', 1);
            $this->pagedata['detail'] = $detail;
            $this->pagedata['designer']= $designer = K::M('designer/designer')->detail($detail['designer_id']);
            if($attrs = K::M('case/attr')->attrs_by_case($case_id)){
                $this->pagedata['attrvalues'] = array_keys($attrs);
            }
            $this->pagedata['photos'] = K::M('case/photo')->items_by_case($case_id, 1, 50);
            $filter = $pager = array();
            $pager['page'] = max(intval($page), 1);
            $pager['limit'] = $limit = 10;
            $filter['case_id'] = $case_id;
            $filter['audit'] = 1;
            if ($items = K::M('case/comment')->items($filter, array('comment_id'=>'DESC'), $page, $limit, $count)) {
                foreach ($items as $k => $v) {
                    $items[$k]['create_ip'] = $v['create_ip'] . '(' . K::M("misc/location")->location($v['create_ip']) . ')';
                }
                $pager['count'] = $count;
                $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink('case:detail', array($case_id,'{page}')), array());
            }
            $this->pagedata['items'] = $items;
            $this->pagedata['pager'] = $pager;            
            if ($case = K::M('case/view')->items(array('audit'=>1,'closed'=>0), array('likes'=>'desc'), 1, 4)) {
                $designer_ids = array();
                foreach ($case as $k => $val) {
                  if(!empty($val['designer_id'])){
                      $designer_ids[$val['designer_id']] = $val['designer_id'];
                  }
                }  
                if(!empty($designer_ids)){
                    $this->pagedata['designer_list'] = K::M('designer/designer')->items_by_ids($designer_ids);
                }
                $this->pagedata['case'] = $case;
            }
            $seo = array(
                'title' => $detail['title'],
                'designer' => $designer['name'],
                'home_name' => $detail['home_name'],
                'seo_title' => $detail['seo_title'],
                'seo_keywords' => $detail['seo_keywords'],
                'seo_description' => $detail['seo_description'],
            );
            K::M('helper/seo')->init('case_detail', $seo);
            $this->tmpl = 'case_detail.html';
        }
    }

    public function like($case_id)
    {
        if (!$case_id = (int) $case_id) {
            $this->err->add('案例不存在', 404);
        }
        else if (!$case = K::M('case/case')->detail($case_id)) {
            $this->err->add('案例不存在', 404);
        }
        elseif (!$case['audit']) {
            $this->err->add('该案例还未通过审核', 404);
        }
        elseif (K::M('case/like')->is_like($case_id, __IP)) {
            $this->err->add('已经喜欢过了', 212);
        }
        else {
            $data = array('case_id' => $case_id,  'create_ip' => __IP, 'dateline' => __TIME);
            K::M('case/like')->create($data);
            K::M('case/case')->update_count($case_id, 'likes', 1);
            $this->err->add('喜欢成功');
        }
    }

    public function comment($case_id)
    {
        if (!$case_id = (int) $case_id) {
            $this->err->add('案例不存在', 404);
        }
        else if (!$case = K::M('case/case')->detail($case_id)) {
            $this->err->add('案例不存在', 404);
        }
        elseif (!$case['audit']) {
            $this->err->add('该案例还未通过审核', 404);
        }
        elseif (!$data = $this->GP('data')) {
            $this->err->add('至少说点什么吧！', 212);
        }
        else {
            $data['case_id'] = $case_id;
            if(K::M('case/comment')->create($data)){
                $this->err->add('操作成功！');
            }
        }
    }

}
