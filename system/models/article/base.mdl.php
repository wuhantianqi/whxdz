<?php
/**
 * Copy Right IJH.CC
 * Each engineer has a duty to keep the code elegant
 * Author @shzhrui<Anhuike@gmail.com>
 * $Id: base.mdl.php 2634 2013-12-30 08:23:44Z youyi $
 */

if(!defined('__CORE_DIR')){
    exit("Access Denied");
}

class Mdl_article_Base extends Mdl_Table
{   
    
    protected $_table = 'article';
    protected $_pk = 'article_id';
    protected $_cols = 'article_id,cat_id,from,page,title,thumb,desc,views,favorites,comments,photos,hidden,orderby,audit,closed,dateline';
	protected $_orderby = array('orderby'=>'ASC', 'article_id'=>'DESC');

    protected $_hot_orderby = array('views'=>'DESC', 'orderby'=>'ASC');
    protected $_hot_filter = array('from'=>'article','hidden'=>'0', 'audit'=>'1', 'closed'=>'0');
    protected $_new_orderby = array('article_id'=>'DESC');
    protected $_new_filter = array('from'=>'article','hidden'=>'0', 'audit'=>'1', 'closed'=>'0');

}