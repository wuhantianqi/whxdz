<?php

/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id$
 */

class Mdl_Net_Tongji
{
    
    private $_mdl = array('tender','tuan','activity','designer','package','site','product');
    
    public function start(){        
       $data = array('isrobot'=>false,'ismobile'=>'false');
       $obj = K::M('net/sniffer');
       $data['isrobot'] = $obj->check_robot();
       $data['ismobile'] = $obj->check_mobile();       
       $from = $obj->robot_from();
       $cookie = K::M('system/cookie');
       if(!empty($from) && empty($data['isrobot'])){
           $cookie->set('q',$from['q']);
           $cookie->set('from',$from['from']);
           $cookie->set('referer',$from['referer']);
           $cookie->set('time',__TIME);
       }elseif(!empty($_GET['via'])){
           $_GET['via'] = htmlspecialchars($_GET['via']);
           $cookie->set('via',$_GET['via']);
           $cookie->set('time',__TIME);
           $cookie->set('referer',$_SERVER['HTTP_REFERER']);
       }
       return $data;
    }
    
    
    public function commit($mdl,$id,$ismobile=false){
        if(!in_array($mdl,$this->_mdl)) return false;
        $cookie = K::M('system/cookie');
        $data = array(
                    'mdl'=>$mdl,
                    'mdl_id'=> (int)$id,
                    'first_time' => __TIME,
                    'dateline'=>__TIME,
                    'type'=>$ismobile? 'mobile':'pc',
                    'year'=>date('Y',__TIME),
                    'month'=>date('n',__TIME),
                    'day'=>date('j',__TIME),
                    'create_ip'=>__IP,
                    'source' => 'other',
                 );
        if($from = $cookie->get('from')){
            $referer = $cookie->get('referer');
            if(!empty($referer)){
                $local = parse_url($referer);
                if(!empty($local['host'])){
                    $data['source_domain'] = htmlspecialchars($local['host']);
                }
            }
            $data['first_time'] = (int)$cookie->get('time');
            $data['source'] = htmlspecialchars($from);
            $data['source_url'] = htmlspecialchars($referer);
            $data['keyword']  = htmlspecialchars($cookie->get('q'));
        }elseif($via = $cookie->get('via')){
            $referer = $cookie->get('referer');
            if(!empty($referer)){
                $local = parse_url($referer);
                if(!empty($local['host'])){
                    $data['source_domain'] = htmlspecialchars($local['host']);
                }
            }
            $data['first_time'] = (int)$cookie->get('time');
            $data['source']  = 'via';
            $data['keyword'] = htmlspecialchars($via);
            $data['source_url'] = htmlspecialchars($referer);
        }
        K::M('tongji/tongji')->create($data);        
        return true;
    }
    
    
      
}