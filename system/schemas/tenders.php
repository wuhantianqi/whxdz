<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * $Id: tenders.php 3173 2014-01-22 14:23:06Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

return array (
  'id' => 
  array (
    'field' => 'id',
    'label' => 'ID',
    'pk' => true,
    'add' => false,
    'edit' => false,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => true,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ),
  
  
  'name' => 
  array (
    'field' => 'name',
    'label' => '称呼',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => true,
    'type' => 'text',
    'comment' => '',
    'default' => '',
    'SO' => 'like',
  ),
  'mobile' => 
  array (
    'field' => 'mobile',
    'label' => '手机',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => false,
    'show' => false,
    'list' => true,
    'type' => 'mobile',
    'comment' => '',
    'default' => '',
    'SO' => 'like',
  ),
  
  'home_name' => 
  array (
    'field' => 'home_name',
    'label' => '小区名称',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'text',
    'comment' => '可为空，在没有小区ID的选择的时候',
    'default' => '',
    'SO' => false,
  ),
      'type_id' => 
  array (
    'field' => 'type_id',
    'label' => '招标类型',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => '=',
  ),
      
      'way_id' => 
  array (
    'field' => 'way_id',
    'label' => '装修方式',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => '=',
  ), 
    'style_id' => 
  array (
    'field' => 'style_id',
    'label' => '喜欢风格',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => '=',
  ),
      'budget_id' => 
  array (
    'field' => 'budget_id',
    'label' => '预算范围',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => '=',
  ),
      'service_id' => 
  array (
    'field' => 'service_id',
    'label' => '服务需求',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => '=',
  ),
      'house_type_id' => 
  array (
    'field' => 'house_type_id',
    'label' => '空间户型',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => '=',
  ),
  'addr' => 
  array (
    'field' => 'addr',
    'label' => '地址',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'text',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ),
  'demand' => 
  array (
    'field' => 'demand',
    'label' => '其他需求',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'textarea',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ),
  'feedback' => 
  array (
    'field' => 'feedback',
    'label' => '客服反馈',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'textarea',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ),
  'start_time' => 
  array (
    'field' => 'start_time',
    'label' => '开始时间',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'date',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ),
  'area' => 
  array (
    'field' => 'area',
    'label' => '面积',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => false,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ),
  
    'audit' => 
  array (
    'field' => 'audit',
    'label' => '是否审核',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => true,
    'type' => 'number',
    'comment' => '',
    'default' => '',
    'SO' => '=',
  ),
  'create_ip' => 
  array (
    'field' => 'create_ip',
    'label' => 'IP',
    'pk' => false,
    'add' => true,
    'edit' => false,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => true,
    'type' => 'clientip',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ),  
  'dateline' => 
  array (
    'field' => 'dateline',
    'label' => '创建时间',
    'pk' => false,
    'add' => true,
    'edit' => false,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => true,
    'type' => 'dateline',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ) ,    'is_read' => 
  array (
    'field' => 'is_read',
    'label' => '是否读取',
    'pk' => false,
    'add' => true,
    'edit' => true,
    'html' => false,
    'empty' => true,
    'show' => false,
    'list' => true,
    'type' => 'int',
    'comment' => '',
    'default' => '',
    'SO' => false,
  ),
);