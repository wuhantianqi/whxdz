<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: site.php 2034 2013-12-07 03:08:33Z langzhong $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

return array (
  'title' => 
  array (
    'label' => '网站名称',
    'field' => 'title',
    'type' => 'text',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => false,
  ),
  'siteurl' => 
  array (
    'label' => '网站网址',
    'field' => 'siteurl',
    'type' => 'text',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => false,
  ),

  'mail' => 
  array (
    'label' => '联系邮箱',
    'field' => 'mail',
    'type' => 'mail',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => false,
  ),
  'kfqq' => 
  array (
    'label' => '客服QQ',
    'field' => 'kfqq',
    'type' => 'text',
    'default' => '',
    'comment' => '多个QQ用\\",\\"分隔',
    'html' => false,
    'empty' => false,
  ),
  'phone' => 
  array (
    'label' => '联系电话',
    'field' => 'phone',
    'type' => 'text',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => false,
  ),
 'rewrite' => 
  array (
    'label' => '伪静态',
    'field' => 'rewrite',
    'type' => 'text',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => true,
  ),
  'mobile' => 
  array (
    'label' => '3G手机版',
    'field' => 'mobile',
    'type' => 'text',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => true,
  ),
 
'logo' => 
  array (
    'label' => 'LOGO',
    'field' => 'logo',
    'type' => 'text',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => true,
  ),
'weixin' => 
  array (
    'label' => '微信二维码',
    'field' => 'weixin',
    'type' => 'text',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => true,
  ), 
    
  'tongji' => 
  array (
    'label' => '统计代码',
    'field' => 'tongji',
    'type' => 'textarea',
    'default' => '',
    'comment' => '',
    'html' => true,
    'empty' => true,
  ),
  'icp' => 
  array (
    'label' => '备案信息',
    'field' => 'icp',
    'type' => 'text',
    'default' => '',
    'comment' => '',
    'html' => false,
    'empty' => false,
  ),
);