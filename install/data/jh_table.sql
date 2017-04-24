DROP TABLE IF EXISTS `jh_activity`;
CREATE TABLE `jh_activity` (
  `activity_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `thumb` varchar(150) DEFAULT '',
  `banner` varchar(150) DEFAULT '',
  `phone` varchar(30) DEFAULT '',
  `qq` varchar(30) DEFAULT '',
  `addr` varchar(255) DEFAULT '',
  `tmpl` varchar(255) DEFAULT '',
  `bg_time` int(10) DEFAULT '0',
  `end_time` int(10) DEFAULT '0',
  `end_sign` int(10) DEFAULT '0',
  `sign_num` mediumint(8) DEFAULT '0',
  `views` mediumint(8) DEFAULT '0',
  `lng` float(10,6) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `jt` varchar(200) DEFAULT '',
  `sj` varchar(200) DEFAULT '',
  `intro` varchar(510) DEFAULT NULL,
  `info` mediumtext,
  `orderby` smallint(6) DEFAULT '50',
  `audit` tinyint(1) DEFAULT '0',
  `clientip` varchar(15) DEFAULT '',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_activity_lanmu`;
CREATE TABLE `jh_activity_lanmu` (
  `lanmu_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` mediumint(8) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` mediumtext,
  `orderby` smallint(6) DEFAULT '50',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`lanmu_id`),
  KEY `activity_id` (`activity_id`),
  KEY `orderby` (`orderby`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_activity_yuyue`;
CREATE TABLE `jh_activity_yuyue` (
  `yuyue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` mediumint(9) DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`yuyue_id`),
  KEY `activity_id` (`activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_admin`;
CREATE TABLE `jh_admin` (
  `admin_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(15) DEFAULT '',
  `passwd` char(32) DEFAULT '',
  `role_id` smallint(6) DEFAULT '0',
  `last_login` int(10) DEFAULT '0',
  `last_ip` varchar(15) DEFAULT '0.0.0.0',
  `closed` tinyint(1) DEFAULT '0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_admin_role`;
CREATE TABLE `jh_admin_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) DEFAULT '',
  `role` enum('editor','admin','system','developer') DEFAULT NULL,
  `priv` mediumtext,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_adv`;
CREATE TABLE `jh_adv` (
  `adv_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) DEFAULT 'default',
  `page` varchar(50) DEFAULT '',
  `title` varchar(50) DEFAULT '',
  `from` enum('text','photo','product','script','lunzhuan') DEFAULT 'photo',
  `config` mediumtext,
  `desc` varchar(255) DEFAULT '',
  `orderby` smallint(6) unsigned DEFAULT '0',
  `audit` tinyint(1) DEFAULT '0',
  `closed` tinyint(1) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`adv_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_adv_item`;
CREATE TABLE `jh_adv_item` (
  `item_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `adv_id` smallint(6) unsigned DEFAULT '0',
  `city_ids` varchar(255) DEFAULT '',
  `title` varchar(100) DEFAULT '',
  `link` varchar(150) DEFAULT '',
  `thumb` varchar(150) DEFAULT '',
  `script` mediumtext,
  `clicks` mediumint(8) unsigned DEFAULT '0',
  `stime` int(10) NOT NULL DEFAULT '0',
  `orderby` smallint(6) unsigned DEFAULT '50',
  `closed` tinyint(1) unsigned DEFAULT '0',
  `ltime` int(10) NOT NULL DEFAULT '0',
  `desc` varchar(255) DEFAULT '',
  `target` enum('_self','_blank','_parent','_top') DEFAULT '_blank',
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_article`;
CREATE TABLE `jh_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` mediumint(8) unsigned DEFAULT '0',
  `from` enum('article','about','help','page') DEFAULT 'article',
  `page` varchar(15) DEFAULT '',
  `title` varchar(200) DEFAULT '',
  `thumb` varchar(150) DEFAULT '',
  `desc` varchar(255) DEFAULT '',
  `views` mediumint(8) DEFAULT '0',
  `favorites` mediumint(8) DEFAULT '0',
  `comments` mediumint(8) DEFAULT '0',
  `photos` smallint(6) DEFAULT '0',
  `orderby` smallint(6) unsigned DEFAULT '50',
  `hidden` tinyint(1) DEFAULT '0',
  `audit` tinyint(1) DEFAULT '0',
  `closed` tinyint(1) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`article_id`),
  KEY `cat_id` (`cat_id`,`from`,`audit`,`closed`,`hidden`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_article_cate`;
CREATE TABLE `jh_article_cate` (
  `cat_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) unsigned DEFAULT '0',
  `title` varchar(150) DEFAULT '',
  `level` tinyint(1) unsigned DEFAULT '1',
  `from` enum('about','help','page','article') DEFAULT 'article',
  `seo_title` varchar(255) DEFAULT '',
  `seo_keywords` varchar(255) DEFAULT '',
  `seo_description` varchar(255) DEFAULT '',
  `orderby` smallint(6) unsigned DEFAULT '50',
  `hidden` tinyint(1) DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_article_comment`;
CREATE TABLE `jh_article_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) DEFAULT '0',
  `nickname` varchar(64) DEFAULT '0',
  `content` varchar(512) DEFAULT '',
  `closed` tinyint(1) DEFAULT '0',
  `clientip` varchar(15) DEFAULT '0.0.0.0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_article_content`;
CREATE TABLE `jh_article_content` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `seo_title` varchar(150) DEFAULT '',
  `seo_keywords` varchar(255) DEFAULT '',
  `seo_description` varchar(255) DEFAULT '',
  `content` mediumtext,
  `clientip` varchar(15) DEFAULT '0.0.0.0',
  PRIMARY KEY (`content_id`),
  KEY `article_id` (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_article_link`;
CREATE TABLE `jh_article_link` (
  `link_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `link` varchar(150) DEFAULT '',
  `orderby` smallint(6) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_case`;
CREATE TABLE `jh_case` (
  `case_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designer_id` mediumint(8) DEFAULT '0',
  `manager_id` mediumint(8) DEFAULT '0',
  `title` varchar(150) DEFAULT '',
  `home_name` varchar(150) DEFAULT NULL,
  `photo` varchar(150) DEFAULT '',
  `price` varchar(32) DEFAULT NULL,
  `size` mediumint(8) DEFAULT '0',
  `views` mediumint(8) DEFAULT '0',
  `likes` mediumint(8) DEFAULT '0',
  `seo_title` varchar(150) DEFAULT '',
  `seo_keywords` varchar(255) DEFAULT '',
  `seo_description` varchar(255) DEFAULT '',
  `intro` varchar(1024) DEFAULT NULL,
  `photos` mediumint(8) DEFAULT '0',
  `lastphotos` varchar(150) DEFAULT '',
  `lasttime` int(10) DEFAULT '0',
  `sex` tinyint(1) DEFAULT '0',
  `name` varchar(32) DEFAULT NULL,
  `dianping` varchar(1024) DEFAULT NULL,
  `orderby` smallint(6) DEFAULT '50',
  `audit` tinyint(1) DEFAULT '0',
  `closed` tinyint(1) DEFAULT '0',
  `clientip` char(15) DEFAULT '0.0.0.0',
  `dateline` int(1) DEFAULT '0',
  PRIMARY KEY (`case_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_case_attr`;
CREATE TABLE `jh_case_attr` (
  `case_id` int(10) NOT NULL DEFAULT '0',
  `attr_id` smallint(6) NOT NULL DEFAULT '0',
  `attr_value_id` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`case_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_case_comment`;
CREATE TABLE `jh_case_comment` (
  `comment_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` mediumint(8) DEFAULT '0',
  `nickname` varchar(64) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT '0.0.0.0',
  `dateline` int(11) DEFAULT '0',
  `audit` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_case_like`;
CREATE TABLE `jh_case_like` (
  `like_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` mediumint(9) DEFAULT '0',
  `uid` mediumint(9) DEFAULT '0',
  `create_ip` varchar(15) DEFAULT '0',
  `dateline` int(11) DEFAULT '0',
  PRIMARY KEY (`like_id`),
  UNIQUE KEY `case_id` (`case_id`,`create_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_case_photo`;
CREATE TABLE `jh_case_photo` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` mediumint(8) DEFAULT '0',
  `title` varchar(150) DEFAULT '',
  `photo` varchar(150) DEFAULT '',
  `size` smallint(6) DEFAULT '0',
  `views` mediumint(8) DEFAULT '0',
  `orderby` smallint(6) DEFAULT '50',
  `closed` tinyint(1) DEFAULT '0',
  `clientip` char(15) DEFAULT '0.0.0.0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`photo_id`),
  KEY `case_id` (`case_id`,`closed`,`orderby`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_cate`;
CREATE TABLE `jh_cate` (
  `cate_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(30) DEFAULT '',
  `from` enum('designer','manager','team') DEFAULT 'designer',
  `orderby` smallint(5) DEFAULT '50',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_data_attr`;
CREATE TABLE `jh_data_attr` (
  `attr_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `from_id` smallint(6) DEFAULT '0',
  `multi` enum('Y','N') DEFAULT 'Y',
  `filter` enum('Y','N') DEFAULT 'Y',
  `orderby` smallint(6) DEFAULT '0',
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_data_attr_from`;
CREATE TABLE `jh_data_attr_from` (
  `from_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(30) DEFAULT '',
  `title` varchar(50) DEFAULT '',
  PRIMARY KEY (`from_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_data_attr_value`;
CREATE TABLE `jh_data_attr_value` (
  `attr_value_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `attr_id` smallint(6) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `orderby` smallint(6) DEFAULT '50',
  PRIMARY KEY (`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_decorate_package`;
CREATE TABLE `jh_decorate_package` (
  `package_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `face_pic` varchar(128) DEFAULT NULL,
  `htmls` text,
  `orderby` smallint(3) DEFAULT '50',
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_decorate_package_yuyue`;
CREATE TABLE `jh_decorate_package_yuyue` (
  `yuyue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` mediumint(9) DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`yuyue_id`),
  KEY `package_id` (`package_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_designer`;
CREATE TABLE `jh_designer` (
  `designer_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) DEFAULT NULL,
  `team_id` smallint(5) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `face_pic` varchar(128) DEFAULT NULL,
  `intro` mediumtext,
  `school` varchar(64) DEFAULT NULL,
  `model_case` varchar(1024) DEFAULT NULL,
  `concept` varchar(1024) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`designer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_designer_attr`;
CREATE TABLE `jh_designer_attr` (
  `designer_id` smallint(8) unsigned NOT NULL,
  `attr_id` smallint(6) unsigned DEFAULT NULL,
  `attr_value_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`designer_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_designer_yuyue`;
CREATE TABLE `jh_designer_yuyue` (
  `yuyue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designer_id` mediumint(9) DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`yuyue_id`),
  KEY `designer_id` (`designer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_gz_comment`;
CREATE TABLE `jh_gz_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` smallint(6) DEFAULT '0',
  `uid` mediumint(8) DEFAULT '0',
  `gz_id` mediumint(8) DEFAULT '0',
  `score1` tinyint(3) DEFAULT '0',
  `score2` tinyint(3) DEFAULT '0',
  `score3` tinyint(3) DEFAULT '0',
  `content` varchar(1024) DEFAULT '',
  `reply` varchar(1024) DEFAULT '',
  `reply_ip` varchar(15) DEFAULT '',
  `replay_time` int(10) DEFAULT '0',
  `audit` tinyint(1) DEFAULT '0',
  `closed` tinyint(1) DEFAULT '0',
  `clientip` varchar(15) DEFAULT '',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_links`;
CREATE TABLE `jh_links` (
  `link_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '',
  `link` varchar(150) DEFAULT '',
  `logo` varchar(150) DEFAULT '',
  `desc` varchar(512) DEFAULT '',
  `audit` tinyint(1) DEFAULT '0',
  `closed` tinyint(1) DEFAULT '0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_manager`;
CREATE TABLE `jh_manager` (
  `manager_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) DEFAULT NULL,
  `team_id` smallint(5) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `face_pic` varchar(128) DEFAULT NULL,
  `intro` mediumtext,
  `school` varchar(64) DEFAULT NULL,
  `model_case` varchar(1024) DEFAULT NULL,
  `concept` varchar(1024) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`manager_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_manager_attr`;
CREATE TABLE `jh_manager_attr` (
  `manager_id` smallint(8) unsigned NOT NULL,
  `attr_id` smallint(6) unsigned DEFAULT NULL,
  `attr_value_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`manager_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_manager_yuyue`;
CREATE TABLE `jh_manager_yuyue` (
  `yuyue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `manager_id` mediumint(9) DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`yuyue_id`),
  KEY `manager_id` (`manager_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_product`;
CREATE TABLE `jh_product` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(128) DEFAULT NULL,
  `cat_id` smallint(5) DEFAULT '0',
  `brand_id` smallint(5) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `my_price` int(11) DEFAULT '0',
  `face_pic` varchar(128) DEFAULT NULL,
  `content` text,
  `yue_num` int(11) DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_product_brand`;
CREATE TABLE `jh_product_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_product_cate`;
CREATE TABLE `jh_product_cate` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(64) DEFAULT NULL,
  `parent_id` smallint(5) DEFAULT '0',
  `orderby` smallint(5) DEFAULT '50',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_product_cate_maps`;
CREATE TABLE `jh_product_cate_maps` (
  `cat_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  KEY `cat_id` (`cat_id`,`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_product_yuyue`;
CREATE TABLE `jh_product_yuyue` (
  `yuyue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` mediumint(9) DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`yuyue_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_session`;
CREATE TABLE `jh_session` (
  `SSID` char(35) NOT NULL,
  `uid` mediumint(8) DEFAULT '0',
  `city_id` mediumint(8) DEFAULT '0',
  `ip` char(15) DEFAULT '0.0.0.0',
  `data` varchar(1024) DEFAULT NULL,
  `lastupdate` int(10) DEFAULT '0',
  PRIMARY KEY (`SSID`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_site`;
CREATE TABLE `jh_site` (
  `site_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `designer_id` smallint(8) DEFAULT NULL,
  `manager_id` smallint(8) DEFAULT NULL,
  `face_pic` varchar(128) DEFAULT NULL,
  `addr` varchar(128) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `audit` tinyint(1) DEFAULT '0',
  `intro` varchar(1024) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `mobile` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_site_attr`;
CREATE TABLE `jh_site_attr` (
  `site_id` mediumint(8) unsigned NOT NULL,
  `attr_id` smallint(6) unsigned DEFAULT NULL,
  `attr_value_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`site_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_site_notes`;
CREATE TABLE `jh_site_notes` (
  `notes_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` mediumint(8) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `content` text,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`notes_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_site_yuyue`;
CREATE TABLE `jh_site_yuyue` (
  `yuyue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` mediumint(9) DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`yuyue_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_sms_log`;
CREATE TABLE `jh_sms_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(50) DEFAULT '',
  `content` varchar(255) DEFAULT '',
  `sms` varchar(20) DEFAULT '',
  `status` tinyint(1) DEFAULT '0',
  `clientip` char(15) DEFAULT '',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_supplier`;
CREATE TABLE `jh_supplier` (
  `supplier_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(128) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `position` varchar(32) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `addr` varchar(128) DEFAULT NULL,
  `product` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_system_config`;
CREATE TABLE `jh_system_config` (
  `k` varchar(30) NOT NULL,
  `v` mediumtext,
  `title` varchar(30) DEFAULT '',
  `dateline` int(10) DEFAULT NULL,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_system_logs`;
CREATE TABLE `jh_system_logs` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(30) DEFAULT '',
  `action` varchar(50) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `content` mediumtext,
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_system_module`;
CREATE TABLE `jh_system_module` (
  `mod_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `module` enum('top','menu','module') DEFAULT 'module',
  `level` tinyint(1) DEFAULT '3',
  `ctl` varchar(20) DEFAULT '',
  `act` varchar(20) DEFAULT '',
  `title` varchar(20) DEFAULT '',
  `visible` tinyint(1) DEFAULT '1',
  `parent_id` smallint(6) DEFAULT '0',
  `orderby` smallint(6) DEFAULT '50',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`mod_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_systmpl`;
CREATE TABLE `jh_systmpl` (
  `systmpl_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `from` enum('seo','sms','mail') DEFAULT NULL,
  `key` varchar(50) DEFAULT '',
  `intro` varchar(1024) DEFAULT NULL,
  `tmpl` mediumtext,
  `tmpl1` mediumtext,
  `tmpl2` mediumtext,
  `dateline` int(10) DEFAULT '0',
  `is_open` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`systmpl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_tenders`;
CREATE TABLE `jh_tenders` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `home_name` varchar(150) DEFAULT NULL,
  `type_id` smallint(5) DEFAULT '0',
  `style_id` smallint(5) DEFAULT '0',
  `budget_id` smallint(5) DEFAULT '0',
  `service_id` smallint(5) DEFAULT '0',
  `house_type_id` smallint(5) DEFAULT '0',
  `way_id` smallint(6) DEFAULT '0',
  `addr` varchar(128) DEFAULT NULL,
  `demand` varchar(1024) DEFAULT NULL,
  `start_time` varchar(32) DEFAULT NULL,
  `area` mediumint(8) DEFAULT NULL,
  `audit` tinyint(1) DEFAULT '0',
  `create_ip` varchar(15) DEFAULT NULL,
  `dateline` int(11) DEFAULT '0',
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `city_id` (`audit`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_tenders_setting`;
CREATE TABLE `jh_tenders_setting` (
  `setting_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT '0',
  `name` varchar(32) DEFAULT NULL,
  `budget` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_themes`;
CREATE TABLE `jh_themes` (
  `theme_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(50) DEFAULT '',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(150) DEFAULT '',
  `config` mediumtext,
  `default` tinyint(1) DEFAULT '0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`theme_id`),
  KEY `theme` (`theme`,`default`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_tongji`;
CREATE TABLE `jh_tongji` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('pc','mobile') DEFAULT NULL,
  `mdl` varchar(15) DEFAULT NULL,
  `mdl_id` int(11) DEFAULT NULL,
  `source` varchar(32) DEFAULT NULL,
  `source_domain` varchar(64) DEFAULT NULL,
  `source_url` varchar(256) DEFAULT NULL,
  `keyword` varchar(128) DEFAULT NULL,
  `first_time` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `dateline` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `source` (`source`,`dateline`),
  KEY `type` (`type`,`mdl`,`source`,`dateline`),
  KEY `source_domain` (`source_domain`),
  KEY `keyword` (`keyword`),
  KEY `year` (`year`,`month`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_tuan`;
CREATE TABLE `jh_tuan` (
  `tuan_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `home_name` varchar(64) DEFAULT NULL,
  `home_kfs` varchar(64) DEFAULT NULL,
  `home_addr` varchar(255) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `face_pic` varchar(128) DEFAULT NULL,
  `youhui` int(11) DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `sign_num` int(11) DEFAULT '0',
  `contents` text,
  `closed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tuan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_tuan_yuyue`;
CREATE TABLE `jh_tuan_yuyue` (
  `yuyue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tuan_id` mediumint(9) DEFAULT '0',
  `mobile` varchar(20) DEFAULT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`yuyue_id`),
  KEY `tuan_id` (`tuan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `jh_upload_photo`;
CREATE TABLE `jh_upload_photo` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(30) DEFAULT '',
  `hash` char(32) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `photo` varchar(150) DEFAULT '',
  `size` smallint(6) DEFAULT '0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`photo_id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
