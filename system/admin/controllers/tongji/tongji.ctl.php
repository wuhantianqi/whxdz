<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */
class Ctl_Tongji_Tongji extends Ctl
{       
        
        public function index($page = 1){
            $filter = $pager = array();
            $pager['page'] = max(intval($page), 1);
            $pager['limit'] = $limit = 50;
            if($SO = $this->GP('SO')){
                $bg_time = (int)(strtotime($SO['bg_time']));
                $end_time = (int)(strtotime($SO['end_time']));
                if(!empty($bg_time)&&!empty($end_time)){
                    $filter['dateline'] = $bg_time."~".$end_time;
                }
                if(!empty($SO['mdl_id'])){
                    $filter['mdl_id'] = $SO['mdl_id'];
                }
                if(!empty($SO['mdl'])){
                    $filter['mdl'] = $SO['mdl'];
                }
                if(!empty($SO['type'])){
                    $filter['type'] = $SO['type'];
                }
                if(!empty($SO['source'])){
                    $filter['source'] = $SO['source'];
                }
            }
            if($items = K::M('tongji/tongji')->items($filter, null, $page, $limit, $count)){
                foreach($items as $k=>$v){
                    $items[$k]['create_ip'] = $v['create_ip'].'('. K::M("misc/location")->location($v['create_ip']) .')';
                }
                $pager['count'] = $count;
                $pager['pagebar'] = $this->mkpage($count, $limit, $page, $this->mklink(null, array('{page}')), array('SO'=>$SO));
            }
            $this->pagedata['items'] = $items;
            $this->pagedata['pager'] = $pager;
            $this->pagedata['type'] =   K::M('tongji/tongji')->getCfg('_type');
            $this->pagedata['mdl'] =    K::M('tongji/tongji')->getCfg('_mdl');
            $this->pagedata['source'] = K::M('tongji/tongji')->getCfg('_source_means');
            $this->pagedata['SO'] = $SO;   
            $this->tmpl = 'admin:tongji/index.html';
        }
    
        public function source(){
            $time = 86400*30;
            $bg_time = __TIME - $time ;
            $end_time = __TIME;
            if($SO = $this->GP('SO')){
                $bg_time = (int)(strtotime($SO['bg_time']));
                $end_time = (int)(strtotime($SO['end_time']));
            }else{
                $SO['bg_time'] = date('Y-m-d',$bg_time);
                $SO['end_time'] = date('Y-m-d',$end_time);
            }
            $source = K::M('tongji/tongji')->source($bg_time,$end_time);
            $items = array();
            $items2 = array();
            foreach($source as $v){
                $items[] = "['".$v['name']."',   ".$v['bfb']."]";
                $items2[] = "['".$v['name']."',   ".$v['num']."]";
            }
            
            $this->pagedata['show'] = join(',',$items);
            $this->pagedata['show2'] = join(',',$items2);
            $this->pagedata['SO'] = $SO;           
            $this->tmpl = 'admin:tongji/source.html';
        }
        
        public function keyword(){
            $time = 86400*30;
            $bg_time = __TIME - $time ;
            $end_time = __TIME;
            if($SO = $this->GP('SO')){
                $bg_time = (int)(strtotime($SO['bg_time']));
                $end_time = (int)(strtotime($SO['end_time']));
            }else{
                $SO['bg_time'] = date('Y-m-d',$bg_time);
                $SO['end_time'] = date('Y-m-d',$end_time);
            }
            $this->pagedata['keywords'] = K::M('tongji/tongji')->keywords($bg_time,$end_time,30);
            $this->pagedata['SO'] = $SO;           
            $this->tmpl = 'admin:tongji/keyword.html';
        }
        public function via(){
            $time = 86400*30;
            $bg_time = __TIME - $time ;
            $end_time = __TIME;
            if($SO = $this->GP('SO')){
                $bg_time = (int)(strtotime($SO['bg_time']));
                $end_time = (int)(strtotime($SO['end_time']));
            }else{
                $SO['bg_time'] = date('Y-m-d',$bg_time);
                $SO['end_time'] = date('Y-m-d',$end_time);
            }
            $this->pagedata['via'] = K::M('tongji/tongji')->via($bg_time,$end_time,30);
            $this->pagedata['SO'] = $SO;           
            $this->tmpl = 'admin:tongji/via.html';
        }
       
        public function domain(){
            $time = 86400*30;
            $bg_time = __TIME - $time ;
            $end_time = __TIME;
            if($SO = $this->GP('SO')){
                $bg_time = (int)(strtotime($SO['bg_time']));
                $end_time = (int)(strtotime($SO['end_time']));
            }else{
                $SO['bg_time'] = date('Y-m-d',$bg_time);
                $SO['end_time'] = date('Y-m-d',$end_time);
            }
            $this->pagedata['domain'] = K::M('tongji/tongji')->domain($bg_time,$end_time,30);
            $this->pagedata['SO'] = $SO;           
            $this->tmpl = 'admin:tongji/domain.html';
        }
        
        public function qushi(){
            if($SO = $this->GP('SO')){
                $year  = (int)$SO['year'];
                $month = (int)$SO['month']; 
                $mdl = $SO['mdl'];
                $type = $SO['type'];
                $source = $SO['source'];
            }else{
                $year  = $SO['year']  = date('Y',__TIME);
                $month = $SO['month'] = date('n',__TIME);  
                $mdl = $type = $source = null;
            }
            $items1  = K::M('tongji/tongji')->qushiYue($year,$mdl,$type,$source);
            $items2  = K::M('tongji/tongji')->qushiDay($year,$month,$mdl,$type,$source);
            
            $this->pagedata['items1'] = $items1;
            $this->pagedata['items2'] = $items2;
            $this->pagedata['type'] =   K::M('tongji/tongji')->getCfg('_type');
            $this->pagedata['mdl'] =    K::M('tongji/tongji')->getCfg('_mdl');
            $this->pagedata['source'] = K::M('tongji/tongji')->getCfg('_source_means');
            $this->pagedata['SO'] = $SO;       
            $this->tmpl = 'admin:tongji/qushi.html';
        }
        
        
        //弄测试数据！
        /*public function make(){
            $source =  array('via','other','baidu','google','soso','360','sogou','bing');  
            $mdl = array('tender','tuan','activity','designer','package','site','product');
            $keyword = array('装修公司','合肥装修公司','装修','什么公司好','江湖','不知道什么','随便写写');
            for($i=0;$i<100;$i++){
                $time = __TIME - rand(0,100000) * $i;
                if($i%3==0)$ismobile = true;
                else $ismobile = false;
                $s = $source[array_rand($source)];
                $data = array(
                    'mdl'=>$mdl[array_rand($mdl)],
                    'mdl_id'=> (int)$i,
                    'first_time' => $time,
                    'dateline'=>$time,
                    'type'=>$ismobile? 'mobile':'pc',
                    'year'=>date('Y',$time),
                    'month'=>date('n',$time),
                    'day'=>date('j',$time),
                    'create_ip'=>__IP,
                    'source' => $s,
                    'source_domain' => $s.'.com',
                    'source_url' => $s.'.com',
                    'keyword' => $keyword[array_rand($keyword)],
                 );
                K::M('tongji/tongji')->create($data);        
            }
        }*/
        
        
}