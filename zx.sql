-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 04 月 13 日 18:00
-- 服务器版本: 5.5.53
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zx`
--

-- --------------------------------------------------------

--
-- 表的结构 `jh_activity`
--

CREATE TABLE IF NOT EXISTS `jh_activity` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `jh_activity`
--

INSERT INTO `jh_activity` (`activity_id`, `title`, `thumb`, `banner`, `phone`, `qq`, `addr`, `tmpl`, `bg_time`, `end_time`, `end_sign`, `sign_num`, `views`, `lng`, `lat`, `jt`, `sj`, `intro`, `info`, `orderby`, `audit`, `clientip`, `dateline`) VALUES
(1, '畅享活动', 'photo/201703/20170324_5307424D25BC833B2D86A5CF45DECE75.png', 'photo/201703/20170327_38D1AD63DE2197386B67E51669C06571.jpg', '', '', '', '', 0, 0, 0, 0, 0, 0.000000, 0.000000, '', '', '', '<div style="text-align:center;">\r\n	<img src="/./attachs/photo/201703/20170327_7C6909A1F799081158CBAA3A0B39A1B1.jpg?PID47" alt="" /><br />\r\n</div>', 50, 1, '192.168.0.113', 1490335638);

-- --------------------------------------------------------

--
-- 表的结构 `jh_activity_lanmu`
--

CREATE TABLE IF NOT EXISTS `jh_activity_lanmu` (
  `lanmu_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` mediumint(8) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` mediumtext,
  `orderby` smallint(6) DEFAULT '50',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`lanmu_id`),
  KEY `activity_id` (`activity_id`),
  KEY `orderby` (`orderby`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_activity_yuyue`
--

CREATE TABLE IF NOT EXISTS `jh_activity_yuyue` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_admin`
--

CREATE TABLE IF NOT EXISTS `jh_admin` (
  `admin_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(15) DEFAULT '',
  `passwd` char(32) DEFAULT '',
  `role_id` smallint(6) DEFAULT '0',
  `last_login` int(10) DEFAULT '0',
  `last_ip` varchar(15) DEFAULT '0.0.0.0',
  `closed` tinyint(1) DEFAULT '0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `jh_admin`
--

INSERT INTO `jh_admin` (`admin_id`, `admin_name`, `passwd`, `role_id`, `last_login`, `last_ip`, `closed`, `dateline`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1491474899, '192.168.0.113', 0, 1489649892);

-- --------------------------------------------------------

--
-- 表的结构 `jh_admin_role`
--

CREATE TABLE IF NOT EXISTS `jh_admin_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) DEFAULT '',
  `role` enum('editor','admin','system','developer') DEFAULT NULL,
  `priv` mediumtext,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `jh_admin_role`
--

INSERT INTO `jh_admin_role` (`role_id`, `role_name`, `role`, `priv`) VALUES
(1, '系统管理员', 'system', ''),
(2, '开发人员', 'developer', '119,120,121,122,123,124,125,126,128,104,106,108,112,114,107,105,111,110,109,113,116,117,118'),
(3, '管理员', 'admin', '386,470,471,500,506,514,516,517,48,49,50,51,52,53,54,55,56,57,8,26,28,35,44,27,9,33,31,32,37,159,160,142,383,384,385,144,146,188,189,430,419,420,217,220,218,219,417,455,447,448,449,450,433,434,435,436,437,438,439,440,441,442,443,444,445,446,451,452,453,454,512,513,231,232,355,356,357,375,421,425,365,366,367,368,369,376,422,426,370,371,372,373,374,377,423,427,360,361,362,363,364,387,388,389,390,428,429,424,507,508,509,270,271,272,293,294,295,303,304,305,306,307,308,309,310,311,312,313,314,320,321,322,323,324,350,351,352,353,354,378,379,414,380,416,381,382,409,393,394,395,396,403,404,405,406,407,408,397,398,399,400,401,402,493,494,495,496,497,498,499,457,469,458,459,460,461,462,463,464,465,466,467,468,521,254,255,256,257,258,259,518,260,262,263,264,520,522,266,267,268,519,326,418,327,328,329,330,331,332,410,411,412,413,484,485,486,487,488,489,490,491,492,223,224,228,229,230,456,287,288,289,290,291,292,297,298,299,300,301,302,415,113,114,115,116,117,119,120,122,123,124,515,338,339,340,341,342,333,344,335,336,337,345,346,347,348,349,479,480,481,482,483,474,475,476,477,478,502,503,504,505,275,277,278,343,245');

-- --------------------------------------------------------

--
-- 表的结构 `jh_adv`
--

CREATE TABLE IF NOT EXISTS `jh_adv` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

--
-- 转存表中的数据 `jh_adv`
--

INSERT INTO `jh_adv` (`adv_id`, `theme`, `page`, `title`, `from`, `config`, `desc`, `orderby`, `audit`, `closed`, `dateline`) VALUES
(133, 'default', '', '首页banner广告', 'lunzhuan', 'a:2:{s:5:"width";s:4:"1920";s:6:"height";s:3:"400";}', '', 50, 1, 0, 1421051321),
(134, 'default', '', '首页家装套系广告位', 'photo', 'a:2:{s:5:"width";s:3:"280";s:6:"height";s:3:"100";}', '', 50, 1, 1, 1421218401),
(135, 'default', '', '首页优惠活动下通栏广告', 'photo', 'a:2:{s:5:"width";s:4:"1100";s:6:"height";s:2:"80";}', '', 50, 1, 1, 1421225264),
(136, 'default', '', '首页团装小区下通栏广告', 'photo', 'a:2:{s:5:"width";s:4:"1100";s:6:"height";s:2:"80";}', '', 50, 1, 1, 1421227008),
(137, 'default', '', '平价材料列表banner广告', 'lunzhuan', 'a:2:{s:5:"width";s:4:"1100";s:6:"height";s:3:"250";}', '', 50, 1, 0, 1421827147),
(138, 'default', '', '全站列表页右侧边栏广告', 'photo', 'a:2:{s:5:"width";s:3:"260";s:6:"height";s:3:"200";}', '', 50, 1, 0, 1421227008),
(139, 'default', '', '手机版首页广告位', 'lunzhuan', 'a:2:{s:5:"width";s:0:"";s:6:"height";s:0:"";}', '', 50, 1, 0, 1490851738),
(140, 'default', '', '主页装修实景', 'photo', 'a:2:{s:5:"width";s:3:"278";s:6:"height";s:3:"360";}', '', 50, 1, 0, 1490852274),
(141, 'default', '', '主页小白必读', 'photo', 'a:2:{s:5:"width";s:3:"330";s:6:"height";s:3:"126";}', '', 50, 1, 0, 1490852312),
(142, 'default', '', '广告位', 'photo', 'a:2:{s:5:"width";s:3:"278";s:6:"height";s:3:"360";}', '', 50, 1, 0, 1490852342),
(143, 'default', '', '广告位', 'photo', 'a:2:{s:5:"width";s:3:"278";s:6:"height";s:3:"360";}', '', 50, 1, 0, 1490852363),
(144, 'default', '', '主页小白必读右侧', 'photo', 'a:2:{s:5:"width";s:3:"330";s:6:"height";s:3:"126";}', '', 50, 1, 0, 1490852562);

-- --------------------------------------------------------

--
-- 表的结构 `jh_adv_item`
--

CREATE TABLE IF NOT EXISTS `jh_adv_item` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=162 ;

--
-- 转存表中的数据 `jh_adv_item`
--

INSERT INTO `jh_adv_item` (`item_id`, `adv_id`, `city_ids`, `title`, `link`, `thumb`, `script`, `clicks`, `stime`, `orderby`, `closed`, `ltime`, `desc`, `target`, `dateline`) VALUES
(147, 133, '', '##', '##', 'photo/201501/20150113_1750D1B9798A01F9FA50234F6381EAA9.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1421051346),
(148, 134, '', '##', 'index.php?taocan.html', 'photo/201501/20150114_69C464DF1D6AB8A412545D301CFB2E89.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1421218479),
(149, 134, '', '##', 'index.php?taocan.html', 'photo/201501/20150114_E411DC815F3FBAF12103CF6D3350CC43.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1421218489),
(150, 134, '', '##', 'index.php?taocan.html', 'photo/201501/20150114_85EA605D793BD94E3D8F5A1C952EC0A8.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1421218498),
(151, 135, '', '##', '##', 'photo/201501/20150114_74E0BFE444058736AE59C3FB2D0D40C3.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1421225276),
(152, 136, '', '##', '##', 'photo/201501/20150114_1A1DCF7762561BFBC36248E8D52CBAAE.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1421227022),
(153, 137, '', '##', '##', 'photo/201501/20150121_C69C8DC5DAFD82666862152D2DBCEBCB.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1421827160),
(154, 133, '', '123445', '', 'photo/201703/20170327_021CDF68E3CBBB057EAA5A54E0E4B57F.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1490599807),
(155, 139, '', '213545', '', 'photo/201703/20170330_17B8A19DF7276614CD45104A862524F3.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1490851777),
(156, 139, '', '345656', '', 'photo/201703/20170330_C5C62A1867592E88703DFFD8803F706B.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1490851844),
(157, 140, '', '主页装修实景NO.1', '/index.php?article-detail-38.html', 'photo/201703/20170330_DA302FF7E6904A880003858C774F63AD.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1490852639),
(158, 140, '', '主页装修实景NO.2', '/index.php?article-detail-38.html', 'photo/201703/20170330_3310FDE741AEE7DFF7ACE1BA8EF0A98F.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1490852720),
(159, 140, '', '主页装修实景NO.3', '/index.php?article-detail-38.html', 'photo/201703/20170330_884102623B417B1F17B85FA7DEDC0721.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1490852744),
(160, 140, '', '主页装修实景NO.4', '/index.php?article-detail-38.html', 'photo/201703/20170330_E0CA68314D8A1958C75C0FFDF5A75539.jpg', NULL, 0, 0, 50, 0, 0, '', '_blank', 1490852764),
(161, 141, '', '小白', '', 'photo/201703/20170330_80434035162CAB018321D7B6CF663DEE.png', NULL, 0, 0, 50, 0, 0, '', '_blank', 1490857273);

-- --------------------------------------------------------

--
-- 表的结构 `jh_article`
--

CREATE TABLE IF NOT EXISTS `jh_article` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `jh_article`
--

INSERT INTO `jh_article` (`article_id`, `cat_id`, `from`, `page`, `title`, `thumb`, `desc`, `views`, `favorites`, `comments`, `photos`, `orderby`, `hidden`, `audit`, `closed`, `dateline`) VALUES
(1, 1, 'about', 'about', '品牌介绍', '', '武汉市鑫大众装饰设计工程有限公司介绍', 1, 0, 0, 0, 50, 0, 1, 0, 1394529052),
(2, 1, 'about', 'culture', '企业文化', '', '企业文化', 1, 0, 0, 0, 50, 0, 1, 0, 1394529098),
(3, 1, 'about', 'jobs', '人才直聘', '', '企业文化', 1, 0, 0, 0, 50, 0, 1, 0, 1394529160),
(4, 1, 'about', 'contact', '联系我们', '', '武汉市鑫大众装饰设计工程有限公司联系方式', 1, 0, 0, 0, 50, 0, 1, 0, 1394529182),
(5, 1, 'about', 'lc', '企业历程', '', '企业历程', 1, 0, 0, 0, 50, 0, 1, 1, 1394529379),
(6, 1, 'about', 'contact', '联系我们', '', '联系我们', 1, 0, 0, 0, 50, 0, 1, 1, 1394529393),
(7, 4, 'help', '', '亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？', '', '亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？', 1, 0, 0, 0, 50, 0, 1, 1, 1394535097),
(8, 12, 'article', '', '这是一篇测试的文章', '', '这是一篇测试的文章', 2, 0, 0, 0, 50, 0, 1, 1, 1394589678),
(9, 9, '', '', '388即住套餐', 'photo/201403/20140312_31B6CE8BB0818F3D1275C2F614250172.png', '388套餐', 1, 0, 0, 0, 50, 0, 1, 0, 1394591448),
(10, 9, 'article', '', '688乐居套餐', 'photo/201403/20140312_CB6F7D23DB1201745421E37028D6CF4D.png', '688套餐', 3, 0, 0, 0, 50, 0, 1, 1, 1394591763),
(11, 9, 'article', '', '988豪华套餐', 'photo/201403/20140312_12ECFF3BD075F0A458758CFD4E4DDEF4.png', '988套餐', 2, 0, 0, 0, 50, 0, 1, 1, 1394592063),
(12, 14, 'article', '', '锦旗飘飘 江湖家居用高品质向广大客户致敬', '', '今天是伟大党的生日，五星红旗飘扬地格外鲜艳、炫目;今天是华然的荣誉之日，锦旗传递着客户对我们的信任和感谢。　　7月1日，一位科学家园的业主带着一面锦旗来到华然&私享家，他对工作人员说：“感谢华然为他装饰了美好的新家，特别感谢设计师黄前胜、监理沈磊、项目经理葛基林。”面对业主的真心感谢，华然行政部杨经理代表华然企业感谢这位业主的支持，并回赠一份纪念礼品表示华然的感谢之情。…', 4, 0, 0, 0, 50, 0, 1, 1, 1394619546),
(13, 14, 'article', '', '恭喜业主张先生入住家天下新装房', '', '恭喜业主张先生入住家天下新装房', 5, 0, 0, 0, 50, 0, 1, 1, 1394619873),
(14, 10, 'article', '', '江湖科技成立一周年感谢亲们的支持，优惠促销火爆进行', 'photo/201403/20140312_2F18FC4FC662515EC86355CF247E1013.jpg', '合肥江湖信息科技有限公司是江湖家居装修装饰系统和江湖婚庆婚嫁门户系统唯一官方机构！成立于2012年10月，目前旗下有家居装修装饰系统和婚庆门户系统。企业正以稳步的发展速度日益壮大，我们以诚心的态度做好装修系统，我们团队都是来自上海大型网络公司，以专业的技术确保每一个产品的质量。www.ijh.cc为官方唯一域名！我们会不断的努力将程序做的越来越好，不做二流技术服务公司，我们做的不仅仅是模…', 5, 0, 0, 0, 50, 0, 1, 1, 1394620308),
(15, 11, 'article', '', '江湖裝企优惠活动江湖裝企优惠活动', 'photo/201404/20140404_BCA45B2A222A270393F1814A54216BCF.png', '江湖裝企优惠活动', 21, 0, 0, 0, 50, 0, 1, 1, 1396591800),
(16, 4, 'help', 'qianyue', '签约流程', '', '签约流程', 1, 0, 0, 0, 50, 0, 1, 0, 1399627368),
(17, 4, 'help', 'hetong', '合同范本', '', '合同范本', 1, 0, 0, 0, 50, 0, 1, 0, 1399627423),
(18, 5, 'help', 'yusuan', '装修预算', '', '装修预算', 1, 0, 0, 0, 50, 0, 1, 0, 1399627470),
(19, 5, 'help', 'zb', '装修准备', '', '装修准备', 1, 0, 0, 0, 50, 0, 1, 0, 1399627628),
(20, 8, 'article', '', '关于家里装修，你最后悔的事情有哪些？', 'photo/201703/20170318_2B3AB844D16F88E9283D9F28B8A885CD.jpeg', '导语：我家装修是自己设计的，基本上已经避开了很多不合理。血泪教训有以下几点吧。', 1, 0, 0, 0, 50, 0, 1, 1, 1489818691),
(21, 8, 'article', '', '如何找一家靠谱的装修公司？', 'photo/201703/20170318_F337EB8E07EEDB3A391302CB2B53648A.jpeg', '如何找一家靠谱的装修公司？现在很多人装修都是通过与装修公司合作的方式来完成的，不管是清包，半包还是全包，找一家靠谱的装修公司最重要，能让你的家装达到事半功倍的效果。但是现在市面上那么多装修公司，良莠不齐，我们该怎么去找合适自家的装修公司呢?优优美家这就来给你支招，怎么样找一家靠谱的装修公司。', 1, 0, 0, 0, 50, 0, 1, 1, 1489818903),
(22, 8, 'article', '', '失之毫厘 量房不准让装修预算不断超支', 'photo/201703/20170318_62F36C0E50F42D68F1BFCC10E43AA375.jpeg', '在我们近三个月来的读者反馈中，有约92%的读者反映家里的装修出现预算超支的情况。的确，实际装修费用高于预算费用的现象正普遍存在于目前的家装业，究其原因，除了一些不正规的装修中隐藏的猫腻之外，还有一个很重要的原因，就是由马虎粗略、技术不成熟所造成的设计施工误差。正是这些误差造成了业主在装修期间不断的被动接受着预算的超额。', 1, 0, 0, 0, 50, 0, 1, 1, 1489818957),
(23, 8, 'article', '', '睡眠质量不好？必看卧室装修攻略！', '', '匆忙的上班族，忙碌了一天，回到家晚上能够在温馨舒适的卧室里享受甜蜜安详的梦乡，是一件多么幸福的事情。但有些不太合适的卧室设计往往会影响你的睡眠质量，所以为了世界的和平，为了可爱的你，卧室设计大法，马上呈上。', 1, 0, 0, 0, 50, 0, 1, 1, 1489819032),
(24, 8, 'article', '', '再次装修，我一定会这么做！', '', '算一下，我装修完现在这套房子也有两年多的时间了，虽然整体上满意，但以完美的标准看，毕竟还差很远。一直有个愿望，把自己在最近这次，以及之前几次装修，甚至给朋友做装修设计的遗憾写出来。大家都懂，成功的经验当然让人喜悦，但往往是一丝丝遗憾，更加萦绕心头，久久挥之不去。', 3, 0, 0, 0, 50, 0, 1, 1, 1489819067),
(25, 8, 'article', '', '「莫兰迪色」有多好用？看完她家你就知道了！', '', '莫兰迪色最近实在太火了，其实它不深奥，简单来说，就是一群灰度高的颜色。', 7, 0, 0, 0, 50, 0, 1, 1, 1489819139),
(26, 9, 'article', '', '我要装修', 'photo/201703/20170327_C2A9E56D27E11696A03067502A24920E.jpg', '我要装修我要装修我要装修我要装修我要装修我要装修我要装修', 6, 0, 0, 0, 50, 0, 1, 1, 1490597134),
(27, 8, 'article', '', '旧房翻新不懂没关系，但防水你一定要懂', 'photo/201703/20170327_9B3896E3A7E1BA2D7530780E8123DE64.jpg', '导语：最近小编看到不少城中村正在改造，也有很多业主来咨询旧房翻新服务。确实，未来几年里，二手房、旧房的装修需求将会逐步攀升。而由于年代久远了，不少旧房墙体防水、防潮的性能十分差，那么让我们一起看看旧房防水有哪些注意点吧~', 17, 0, 0, 0, 50, 0, 1, 0, 1490613908),
(28, 8, 'article', '', '竣工验收做好这几步，让你安心住进美家', 'photo/201703/20170327_8AB14631B758D535473F82D7A6FC4DF7.jpg', '导语：家里装修接近尾声了，想去验收下各阶段的施工质量，却不知从何入手？都说内行看门道，外行看热闹，今天小编就来给你支几招，让你也能看懂竣工验收的门道，不做只看热闹的装修外行！', 8, 0, 0, 0, 50, 0, 1, 0, 1490615177),
(29, 8, 'article', '', '预定整体厨柜时哪些陷阱让你的预算超支？', 'photo/201703/20170327_C4EDD23FE061CF92F22939927EA53EC9.jpg', '导语：现代整体厨房已经从最早的使用功能开始向人性化、个性化、多风格的方向发展。随之而来的也是整体厨柜的价格越来越高，但其中哪些是不必要却会增加你预算的陷阱，你真的了解吗？', 5, 0, 0, 0, 50, 0, 1, 0, 1490615701),
(30, 8, 'article', '', '婚房装修预算有重点 花钱花到刀刃上', 'photo/201703/20170327_7AD2F516546A922B035E4FCE6EEA4152.jpg', '导语：结婚可是人生大事，婚房装修更是结婚准备里十分重要的一关。婚房装修可以说是样样要花钱，那么婚房装修该怎么做能花钱花到刀刃上呢?婚房装修预算又该怎么做呢?接下来就跟着兔狗小编来看看怎么做婚房装修预算才能让花钱更合理吧。', 3, 0, 0, 0, 50, 0, 1, 0, 1490616330),
(31, 8, 'article', '', '借你一双慧眼 做好装修预算', 'photo/201703/20170327_12B2D9E2EE17AE8D9DF2ED3F785C5714.jpg', '导语：在家庭装修中，什么最重要?大多数的人都会说，当然是钱最重要了。那么打算装修预算花多少钱呢?又如何花这些钱来搞装修呢?除了要做好设计外，还要找一家各方面都不错的装修公司，这是关系装修好坏的重要前提，关于装修预算、装修设计方案等才能顺利进行。', 1, 0, 0, 0, 50, 0, 1, 0, 1490616575),
(32, 8, 'article', '', '玄关风水装修常识大全，你一定要看！', 'photo/201703/20170327_CB4B1FB7271BA06C020862F022ACA946.jpg', '导语：玄关是家庭装修中不得不重点考虑的地方，别看小小的玄关，它可也是有风水讲究的哦！从风水学中所了解到的是玄关可以起到调节室内外气流的作用，使利于家宅运的旺气和不利于家宅运的晦气可以的到很好的自然流通，所以本期小编要给大家讲解一下玄关风水常识都有哪些。', 2, 0, 0, 0, 50, 0, 1, 0, 1490616927),
(33, 8, 'article', '', '2017年，如何设计一个“草木色”的阳台？', 'photo/201703/20170327_48520F1181249758C91091C0C373AD44.jpg', '导语：作为2017年的流行色，“greenery”即草木色，有着唤醒春天及苏醒、复原、修复的含义，最适合用作阳台设计，给你带来身心无限的放松，治愈工作繁忙的每一天。那么是否堆满植物完成了呢？', 2, 0, 0, 0, 50, 0, 1, 0, 1490617357),
(34, 8, 'article', '', '告别土low！6款电视背景墙设计', 'photo/201703/20170327_AD92BD106E6F92D1A3759BA7633AC3DC.jpg', '导语：在小户型装修中，客厅的装修是一个必不可少的环节。而在客厅电视背景墙又是客厅装修中一个十分重要的部分。想要拥有一面美观的客厅电视背景墙，有一定的设计讲究。那么我们该如何打造一面适合自己的客厅背景墙呢？', 1, 0, 0, 0, 50, 0, 1, 0, 1490617552),
(35, 8, 'article', '', '哇哦！原来可以这么美：10款卧室床头背景墙设计', 'photo/201703/20170327_E7EE1A726E8DAB6C833ABEB0C5DC25B8.jpg', '导语：卧室床头背景墙是家中不可忽视的部分。相信再怎么喜欢简约风格的朋友们，也不能忍受自己的卧室背景墙呈现“光秃秃”的样子。针对单调的卧室床头背景墙，很多人会选择悬挂装饰画或者手绘彩色图案来或者是添加其它装饰物来为其增色，使它看起来更加丰富、美观。', 5, 0, 0, 0, 50, 0, 1, 0, 1490617797),
(36, 8, 'article', '', '看看如何调整好家具与家居环境之间的关系', 'photo/201703/20170327_5A560C1B5ACD7B9148CB4B15BC0FF015.jpg', '导语：大家在日常生活中肯定都会遇到家装风格搭配的问题，家具与家居环境的和谐程度对于整体家居视觉效果有着很大的影响作用。好的家具不仅自身要美观、大方，更要能与周围环境相得益彰，营造舒适的家装风格。', 3, 0, 0, 0, 50, 0, 1, 0, 1490618020),
(37, 9, 'article', '', '美式风格两室两厅全包7万装修实景', 'photo/201703/20170327_48503D3B7729A999ADE97BDE3F69CFC5.jpg', '本案例采用实木纹理,复古的皮质沙发,复古的壁橱，流露出一股浓浓的美洲风情.外观和用料仍保持自然、淳朴的风格。', 3, 0, 0, 0, 50, 0, 1, 0, 1490620518),
(38, 9, 'article', '', '美式风格别墅装修半包30万装修实景', 'photo/201703/20170327_CB9AB42707A6D4A0C15058A2B7C5F1D0.jpg', '此户型为一套独栋别墅，以美式风格为主，满足业主对中产品质生活的追求与喜好。', 22, 0, 0, 0, 50, 0, 1, 0, 1490621496);

-- --------------------------------------------------------

--
-- 表的结构 `jh_article_cate`
--

CREATE TABLE IF NOT EXISTS `jh_article_cate` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `jh_article_cate`
--

INSERT INTO `jh_article_cate` (`cat_id`, `parent_id`, `title`, `level`, `from`, `seo_title`, `seo_keywords`, `seo_description`, `orderby`, `hidden`, `dateline`) VALUES
(1, 0, '关于我们', 1, 'about', '', '', '', 500, 1, 1386742671),
(2, 0, '网站帮助', 1, 'help', '', '', '', 5000, 1, 1386742686),
(3, 0, '单页面管理', 1, 'page', '', '', '', 5000, 1, 1386742766),
(4, 2, '新手指南', 2, 'help', '', '', '', 5000, 0, 1386742837),
(5, 2, '装修指南', 2, 'help', '', '', '', 5000, 0, 1386742847),
(6, 2, '合作方案', 2, 'help', '', '', '', 5000, 0, 1386746224),
(7, 2, '本站服务', 2, 'help', '', '', '', 5000, 0, 1386746236),
(8, 0, '装修知识', 1, 'article', '', '', '', 50, 0, 1394527077),
(9, 0, '装修日记', 1, 'article', '', '', '', 50, 0, 1394527326),
(10, 0, '企业资讯', 1, 'article', '', '', '', 50, 0, 1394527346);

-- --------------------------------------------------------

--
-- 表的结构 `jh_article_comment`
--

CREATE TABLE IF NOT EXISTS `jh_article_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) DEFAULT '0',
  `nickname` varchar(64) DEFAULT '0',
  `content` varchar(512) DEFAULT '',
  `closed` tinyint(1) DEFAULT '0',
  `clientip` varchar(15) DEFAULT '0.0.0.0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_article_content`
--

CREATE TABLE IF NOT EXISTS `jh_article_content` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `seo_title` varchar(150) DEFAULT '',
  `seo_keywords` varchar(255) DEFAULT '',
  `seo_description` varchar(255) DEFAULT '',
  `content` mediumtext,
  `clientip` varchar(15) DEFAULT '0.0.0.0',
  PRIMARY KEY (`content_id`),
  KEY `article_id` (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `jh_article_content`
--

INSERT INTO `jh_article_content` (`content_id`, `article_id`, `seo_title`, `seo_keywords`, `seo_description`, `content`, `clientip`) VALUES
(1, 1, '', '', '', '<p>\r\n	<span style="line-height:1.5;font-size:24px;"><span style="font-size:24px;color:#E53333;line-height:1.5;">十年如一日的口碑积累最值得我们骄傲</span></span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#999999;">Ten years such as one day of the accumulation of reputation worthy of our pride</span> \r\n</p>\r\n<hr style="page-break-after:always;" class="ke-pagebreak" />\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">　</span><span style="font-size:16px;color:#333333;line-height:2;">　</span><span style="font-size:16px;color:#333333;line-height:2;">武汉市鑫大众装饰设计工程有限公司成立于2002年，是一家以新房装修、旧房改造、工装、全案设计为一体的综合性装饰公司。公司有着创新的设计、合理的报价，还有一批独立的专业化的施工队伍，确保施工绿色环保，安全文明.公司本着“质量第一，追求完美‘的设计理念，凭借超前的设计构思、合理的预算报价、精良的施工工艺，优质的全程服务，真诚的为每一位顾客，量身定制全新、优雅、舒适的居家生活、文化空间。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">　　自公司成立以来，全体员工一直秉承“以质量求生存，以信誉求发展”的经营理念，始终坚持以客户的需求和满意为核心，以“诚信为宗旨，不断的用优质、精美、具有创造力的空间装饰产品为客户提供更多的价值回馈，从而使公司不断发展壮大. 为了让更多追求高品质生活的业主享受到尊贵、优雅、原创的设计。我们竭尽全力把工作做到极至，用我们的专业赢得社会的尊重.现在已经发展成一支有极强凝聚力的团队.我们认为专业是作品成功的关键，通过完善的设计方案、材料配置方案指导施工中的每一个环节。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">　　设计中心与成品定制工厂、精品施工队合作。确保把每个作品都打造成充分体现屋主个性，具备高品位，优雅，精致，高质量的成功作品。我们跟踪每个项目的施工过程，并且做详细的跟踪现场记录，包括文字和图片。我们重视每一个客户的沟通，认真听取心声。深知打造一件成功的作品需要付出深入细致的努力，并且需要很强的耐心。我们重视作品的“质”远大于重视“量”。让作品的成功给客户带去优雅享受的同时也带去他的成就感。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">　　我们的设计团队善于挑战自我，我们不重复自己，不抄袭别人，每一个项目都认真推敲，公司推行“设计一体化”的综合解决方案，将客户的要求量身定做，设计方案独树一帜，没有雷同，精心打造超出客户期望的设计效果。 三鑫承诺 诚信是金 品质是金 服务是金 。</span> \r\n</p>\r\n<br />', '127.0.0.1'),
(2, 2, '', '', '', '<blockquote>\r\n	<span style="font-size:24px;color:#E53333;line-height:1.5;">大众18年，做最有温度的服务</span> \r\n	<p>\r\n		<span style="font-size:16px;color:#999999;line-height:1.5;">Volkswagen 18 years, do the most temperature service</span> \r\n	</p>\r\n</blockquote>\r\n<hr style="page-break-after:always;" class="ke-pagebreak" />\r\n<blockquote>\r\n	<span style="font-size:24px;color:#E53333;line-height:1.5;"></span> \r\n	<p>\r\n		<span style="font-size:16px;color:#999999;line-height:1.5;"></span> \r\n	</p>\r\n	<p>\r\n		<br />\r\n	</p>\r\n<span style="font-size:16px;color:#333333;line-height:2;">服务得第一步就是用心，服务不能说“不”；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">设身处地的为客户着想，做到“温暖人心”的服务；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">保持微笑可以传递给客户正能量，为客户做好每个细节，做好每件小事；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">在客户想到之前就替他们做到。</span><br />\r\n<br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">公司愿景</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">通过不断的技术创新和资源整合，提供更便捷的亲民装修服务；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">成为行业内更卓越的装修服务提供商。</span><br />\r\n<br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">企业价值观&nbsp;</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">在经营中促进企业发展，注重专业价值，服务价值，品牌价值</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">在效益中提升企业标准，注重人文、诚信、创新、超越价值 &nbsp; &nbsp;</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">在奉献中实现企业与每一位员工的价值，回馈客户与社会</span> \r\n</blockquote>\r\n<blockquote>\r\n</blockquote>\r\n<blockquote>\r\n</blockquote>\r\n<blockquote>\r\n</blockquote>', '127.0.0.1'),
(3, 3, '', '', '', '<blockquote>\r\n	<p>\r\n		<br />\r\n	</p>\r\n	<p>\r\n		<span style="font-size:18px;color:#E53333;line-height:2;">市场部经理</span> \r\n	</p>\r\n<span style="font-size:16px;color:#333333;line-height:2;">1，性格活跃，沟通表达及团队协作能力强，2年以上家装行业市场部工作经验；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">2，对楼盘炒作以及定点爆破有成熟思路和独到见解；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">3，具备一定得管理思路，善于进行团队组建与内训。</span> \r\n</blockquote>\r\n<blockquote>\r\n	<br />\r\n<span style="font-size:18px;color:#E53333;line-height:2;">设计部经理</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">1，五年以上相关工作经验，有一年以上家装设计师管理工作经验；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">2，谈单、促单能力强，能把握客户心理；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">3，沟通能力强，有管控能力，有团队贡献精神；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">4，执行力强，有责任感，有工作激情。</span> \r\n</blockquote>\r\n<blockquote>\r\n	<br />\r\n<span style="font-size:18px;color:#E53333;line-height:2;">家装设计师</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">1，学习能力强，热爱设计工作，有创新精神；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">2，富有创意及执行力，有责任感，表达能力强；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">3，善于沟通，能抓住客户的需求并提供个性化的设计服务，有团队协作精神。</span> \r\n</blockquote>\r\n<blockquote>\r\n	<br />\r\n<span style="font-size:18px;color:#E53333;line-height:2;">工程监理</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">1，精通水电、瓦、木、油等工种施工工艺及验收标准；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">2、具有良好的沟通能力，解决问题能力强，执行力强；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">3，高度的敬业精神及高涨的工作激情，工作态度积极乐观；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">4，做事细致踏实、认真负责、作风正派。</span> \r\n</blockquote>\r\n<blockquote>\r\n	<br />\r\n<span style="font-size:18px;color:#E53333;line-height:2;">网络客服</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">1，有一定线上沟通技巧，文字描述能力强；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">2，头脑灵活，有创新能力，工作踏实，有韧性；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">3，衣着整洁大方，心地善良，能耐心解决客户的所有问题；</span><br />\r\n<span style="font-size:16px;color:#333333;line-height:2;">4，打字速度快。</span> \r\n</blockquote>\r\n<blockquote>\r\n	<span style="color:#E53333;"><br />\r\n</span>\r\n</blockquote>\r\n<blockquote>\r\n	<span style="font-size:16px;color:#E53333;">【</span><span style="font-size:16px;color:#E53333;">人才直招热线：15207187756 &nbsp;牛经理</span><span style="font-size:16px;color:#E53333;">】</span> \r\n</blockquote>\r\n<p>\r\n	<br />\r\n</p>', '127.0.0.1'),
(4, 4, '', '', '', '<p>\r\n	<blockquote>\r\n		<p>\r\n			<br />\r\n		</p>\r\n		<p>\r\n			<span style="font-size:16px;color:#333333;line-height:2;">武汉市鑫大众装饰设计工程有限公司</span>\r\n		</p>\r\n		<p>\r\n			<span style="font-size:16px;color:#333333;line-height:2;">座机：027-82882911</span>\r\n		</p>\r\n		<p>\r\n			<span style="font-size:16px;color:#333333;line-height:2;">总部地址：江岸区二七路航天双城A座1405-1407</span>\r\n		</p>\r\n		<p>\r\n			<br />\r\n		</p>\r\n		<p>\r\n			<span style="font-size:16px;color:#333333;line-height:2;">装修设计直达热线：15207187756 &nbsp; 牛经理</span>\r\n		</p>\r\n		<p>\r\n			<br />\r\n		</p>\r\n		<p>\r\n			<span style="font-size:16px;color:#333333;line-height:2;">家居装修建材方面的合作请联系：13971172755 &nbsp;王经理</span>\r\n		</p>\r\n		<p>\r\n			<span style="font-size:16px;color:#333333;line-height:2;">网络广告业务合作请将你的合作资料以邮件形式发送至：cnwangchang@qq.com</span>\r\n		</p>\r\n		<p>\r\n			<span style="font-size:16px;color:#333333;line-height:2;">网站友情链接请加QQ联系：</span><span style="font-size:16px;color:#333333;line-height:2;">879672406</span>\r\n		</p>\r\n	</blockquote>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '127.0.0.1'),
(5, 5, '', '', '', '<h1 style="color:#333333;font-weight:normal;font-size:20px;font-family:宋体, ''Arial Narrow'';background-color:#D9D9D9;">\r\n	<h1 style="color:#333333;font-weight:normal;font-size:20px;font-family:宋体, ''Arial Narrow'';background-color:#D9D9D9;">\r\n		企业历程\r\n	</h1>\r\n</h1>', '127.0.0.1'),
(6, 6, '', '', '', '联系我们', '127.0.0.1'),
(7, 7, '', '', '', '<p>\r\n	<br />\r\n</p>\r\n\r\n	亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？\r\n\r\n\r\n<p>\r\n	亲请注意了亲，这是什么？提前爆料？江湖家居手机真的么？\r\n</p>\r\n<p>\r\n	<img src="http://www.ijh.cc/data/ueditor/13211394164132.jpg" title="未命名.jpg" border="0" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong><span style="font-size:20px;">江湖只会不停的努力！选择江湖，您早晚会觉得大赚，而且真的大赚</span></strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '127.0.0.1'),
(8, 8, '', '', '', '这是一篇测试的文章', '127.0.0.1'),
(9, 9, '', '', '', '<img src="http://www.zqyx.com/./attachs/photo/201403/20140312_C471FAB5B31467F57320370ABCFFFA7A.jpg?PID18" alt="" /><img src="http://www.zqyx.com/./attachs/photo/201403/20140312_3E1787092B5C7F104DFD39CFF6435762.jpg?PID19" alt="" /><img src="http://www.zqyx.com/./attachs/photo/201403/20140312_7315D758A934D605CE88512E76AEF276.jpg?PID20" alt="" />', '127.0.0.1'),
(10, 10, '', '', '', '<img src="http://www.zqyx.com/./attachs/photo/201403/20140312_8CDEFC2376ED8B5613B62E1E65E71A8A.jpg?PID22" width="700" height="467" alt="" /><img src="http://www.zqyx.com/./attachs/photo/201403/20140312_7131AC8BD3E708E945EB2B33666C0AC2.jpg?PID23" width="700" height="473" alt="" /><img src="http://www.zqyx.com/./attachs/photo/201403/20140312_9C21821E93DC3FC1885C5C3612C10F11.jpg?PID24" width="700" height="464" alt="" /><img src="http://www.zqyx.com/./attachs/photo/201403/20140312_CB0375648053A1EC1F4A40F747FBF0ED.jpg?PID25" width="700" height="699" alt="" />', '127.0.0.1'),
(11, 11, '', '', '', '<img src="http://www.zqyx.com/./attachs/photo/201403/20140312_70D96F73C76DD096280D1EBA6D4CB9E5.jpg?PID28" width="700" height="440" alt="" />', '127.0.0.1'),
(12, 12, '', '', '', '<p>\r\n	<span>&nbsp;今天是伟大党的生日，五星红旗飘扬地格外鲜艳、炫目;今天是华然的荣誉之日，锦旗传递着客户对我们的信任和感谢。</span> \r\n</p>\r\n<p style="color:#666666;font-family:宋体, ''Arial Narrow'';font-size:14px;">\r\n	<span>　　7月1日，一位科学家园的业主带着一面锦旗来到华然&amp;私享家，他对工作人员说：“感谢华然为他装饰了美好的新家，特别感谢设计师黄前胜、监理沈磊、项目经理葛基林。”面对业主的真心感谢，华然行政部杨经理代表华然企业感谢这位业主的支持，并回赠一份纪念礼品表示华然的感谢之情。</span> \r\n</p>\r\n<p style="color:#666666;font-family:宋体, ''Arial Narrow'';font-size:14px;">\r\n	<span><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<img src="http://www.huaran.com.cn/upfiles/2014/01/05/f34c257a511cb076.jpg" border="0" /> \r\n</p>\r\n<p style="color:#666666;font-family:宋体, ''Arial Narrow'';font-size:14px;text-align:center;">\r\n	<span>从左到右：设计师黄前胜、科学家园业主、监理部阮经理、工程部刘经理</span> \r\n</p>\r\n<p>\r\n	<img src="http://www.huaran.com.cn/upfiles/2014/01/05/de36ea95019dccf2.jpg" border="0" /> \r\n</p>\r\n<p style="color:#666666;font-family:宋体, ''Arial Narrow'';font-size:14px;text-align:center;">\r\n	<span style="line-height:21px;">华然回赠业主送上纪念礼品以作感谢</span> \r\n</p>\r\n<p style="color:#666666;font-family:宋体, ''Arial Narrow'';font-size:14px;">\r\n	<span style="line-height:21px;">　　6月28日下午，一位手持锦旗的男士出现在华然前台：“你好!我找下你们施工管理中心。”原来，他是华润幸福里21栋1006室的业主，特意带着锦旗过来感谢华然及施工部的工作人员。</span> \r\n</p>\r\n<p style="color:#666666;font-family:宋体, ''Arial Narrow'';font-size:14px;">\r\n	<span style="line-height:21px;"><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<p>\r\n		<img src="http://www.huaran.com.cn/upfiles/2014/01/05/5b3f4d33e286a43c.jpg" border="0" /> \r\n	</p>\r\n	<p>\r\n		从左到右：项目部长周先进、幸福里业主、监理部阮经理\r\n	</p>\r\n	<p>\r\n		<span style="line-height:21px;">　　一面锦旗，它涵盖了华然服务过的广大业主对华然的信任和支持，也肯定了华然为每一所房子付出的辛苦和努力，这是华然装饰与业主之间的双向信任。带着这份信任，华然会在装饰安徽的道路上，用最精湛的华派工艺打造最完美的“一家一世界”。</span> \r\n	</p>\r\n	<p>\r\n		<span style="line-height:21px;"><br />\r\n</span> \r\n	</p>\r\n	<p>\r\n		<img src="http://www.huaran.com.cn/upfiles/2014/01/05/b0289fa0b0b50b36.jpg" border="0" /> \r\n	</p>\r\n</p>', '127.0.0.1'),
(13, 13, '', '', '', '恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房恭喜业主张先生入住家天下新装房', '127.0.0.1'),
(14, 14, '', '', '', '<p style="color:#7D7C7C;font-family:''Microsoft Yahei'', 宋体, ''Arial Narrow'';font-size:14px;text-indent:30px;background-color:#FFFFFF;">\r\n	合肥江湖信息科技有限公司是江湖家居装修装饰系统和江湖婚庆婚嫁门户系统 唯一官方机构！成立于2012年10月，目前旗下有<strong>家居装修装饰系统</strong>和<strong>婚庆门户系统</strong>。企业正以稳步的发展速度日益壮大，我们以诚心的态度做好装修系统， 我们团队都是来自上海大型网络公司，以专业的技术确保每一个产品的质量。<a href="http://www.ijh.cc/">www.ijh.cc</a>为官方唯一域名！我们会不断的努力将程序做的越来越好，不做二流技术服务公司，我们做的不仅仅是模板，更是一个大联盟，我们不断的努力和商友们一起战斗！\r\n</p>\r\n<p style="color:#7D7C7C;font-family:''Microsoft Yahei'', 宋体, ''Arial Narrow'';font-size:14px;text-indent:30px;background-color:#FFFFFF;">\r\n	立足于互联网蓬勃发展的趋势，我们为广大商户提供全方位专业服务，致力于研发目前国内最专业、功能最强大，扩展性能最自由灵活的高端行业地方门户通用系统，已在行业领域占领一席之地。随着市场建站需求越来越多，并且大多数客户都面临一个建站花费代价昂贵的难题，我们的出现为大家解决了这个难题，你只要花费相对于请人建站十分之一的支出，购买本公司程序的商业使用授权直接运用或是进行二次开发，就可轻松并且在极短的时间内建成一家方方面面具备，竞争性超强，功能超强大的地方门户型网站。\r\n</p>\r\n<p style="color:#7D7C7C;font-family:''Microsoft Yahei'', 宋体, ''Arial Narrow'';font-size:14px;text-indent:30px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="color:#7D7C7C;font-family:''Microsoft Yahei'', 宋体, ''Arial Narrow'';font-size:14px;text-indent:30px;background-color:#FFFFFF;">\r\n	喜欢这个系统的报名吧\r\n</p>', '127.0.0.1'),
(15, 15, '', '', '', '江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动江湖裝企优惠活动', '127.0.0.1'),
(16, 16, '', '', '', '签约流程', '127.0.0.1'),
(17, 17, '', '', '', '合同范本', '127.0.0.1'),
(18, 18, '', '', '', '装修预算', '127.0.0.1'),
(19, 19, '', '', '', '装修准备', '127.0.0.1'),
(20, 20, '', '', '', '<p>\r\n	1：储物空间绝对越多越好。\r\n</p>\r\n<p>\r\n	　　家里不好用的边边角角可以全部做成柜子，柜子里面全部留空。<br />\r\n不管是鞋柜，衣柜，还是橱柜。竖挡板、横挡板，不是出于结构需要，全部废掉。<br />\r\n留一根特别结实的横挂就ok了！\r\n</p>\r\n<p>\r\n	　　网上、宜家有很多布艺隔断。收纳箱。完全可以用做里面的自由分隔，会灵活很多。&nbsp;<br />\r\n实在需要横隔断的话，在柜体两边打上对称的卡口。做几个可以拆卸的横板。&nbsp;\r\n</p>\r\n<p>\r\n	　　这样就不至于像我现在，衣柜里大部分衣服不能挂起来只能折起来。鞋柜里大部分靴子也要折起来了。<br />\r\n　　买能储物的实体床，比买架空的床合适太多。架空型的不但不能储物，还藏灰。&nbsp;<br />\r\n　　2：开放式的东西越少越好。\r\n</p>\r\n<p>\r\n	　　开放厨房，除非你家是以清淡类的为主，煲汤啊，西式餐饮啊，不然还是建议封闭厨房吧。\r\n</p>\r\n<p>\r\n	　　开放架子的家具。比如书柜，比如置物柜，封闭一下虽然没有开放式的看起来洋气，但是可以省你很多擦桌子的功夫，也不会让你的收藏品和书都占满灰尘。<br />\r\n<br />\r\n　　3：电器买就买预算内最贵的。\r\n</p>\r\n<p>\r\n	　　我家“一咬牙一跺脚”买下来的电器和“啊啊啊真便宜啊赶紧买吧”买下来的电器完全不是一码事。贵的越用越舒心，便宜的越用越闹心。特别是在厨卫这一块，使用率那么高，还是买好的吧。<br />\r\n　　特意提一下热水器。当时我执意要用燃气热水器，我老公和全家人非要用太阳能。没斗争过。太阳能是节能，但是用它多少年能补上它和燃气热水器的差价呢？而且太阳能的特点就是，只能让你夏天洗热水澡，冬天洗冷水澡。家里一天想洗澡的人超过两个，就别想好好洗澡。事实是，就算当天只有我一个人要洗澡，我也要一边洗一边紧锣密鼓的计算我还能洗多久。\r\n</p>\r\n<p>\r\n	　　我家的人都很环保，只有我不是，我需要一点生活品质。所以这件事说得比较多，全当吐槽。<br />\r\n　　4：儿童房应该全部空置。\r\n</p>\r\n<p>\r\n	　　这一点是针对新婚无孩的人提出的。有孩子的及不打算要孩子的忽略。\r\n</p>\r\n<p>\r\n	　　有的人把儿童房弄得很漂亮，装饰得很满。我呢，是随便的简单装修儿童房。但是综合我和朋友的经验，我认为儿童房应该全部空置。等她出生之后，可以在里面铺上全屋的垫子，爬，供她玩。也可以摆放她的小床。大了可以变成她的玩具屋。直至大到搬进独立的小床，按她的要求和喜好给她装一个完美的屋子。<br />\r\n　　5：飘窗上不用做太好的台面。\r\n</p>\r\n<p>\r\n	　　如果后期要摆垫子用来坐的话，台面都被挡住了。好不好真看不出来。\r\n</p>\r\n<p>\r\n	　　如果是摆花花草草，我觉得也不需要什么石英石的。普通人造大理石就ok了。<br />\r\n&nbsp;　6：窗帘盒没有必要做。\r\n</p>\r\n<p>\r\n	　　我是接触了装修公司才知道有窗帘盒这个东西的，就是把你的窗帘杆档一下。其实现在很多窗帘杆挂在外面也很有格调的，根本不用挡，这个钱是白花的。<br />\r\n　　我家窗帘全部是一匹布直垂，加任何坠子、垂幔、折线等费钱的东西。还算划得来。\r\n</p>\r\n<p>\r\n	　　一个小小遗憾是，窗帘装了两层，我到现在不知道里面那层纱有什么作用。不如做一匹遮光帘吧，睡懒觉必备。&nbsp;<br />\r\n　　7：厨房台面外延一定要做挡水。\r\n</p>\r\n<p>\r\n	　　如果石英石的不能做，那就用人造石好了。\r\n</p>\r\n<p>\r\n	　　洗菜池用下沉的安装方式。<br />\r\n　　8：主卫到主卧门的这一块应该用瓷砖。\r\n</p>\r\n<p>\r\n	　　哪怕整个主卧都是木地板，这一小块也应该单独用瓷砖做。\r\n</p>\r\n<p>\r\n	　　这个具体是针对我自己家而言的，我家的主卫和主卧是直对的，大概一个平方米吧。\r\n</p>\r\n<p>\r\n	　　其他布局的这条就忽略吧<br />\r\n　　9：酒吧和浴缸确实不大用。\r\n</p>\r\n<p>\r\n	　　但是为了满足我和我老公的幻想，再让我们装我们还会装上。\r\n</p>', '192.168.0.113'),
(21, 21, '', '', '', '<p>\r\n	首先我们来看看哪些<a href="http://www.eecn.cc/tenders.html" target="_blank">装修公司</a>不能找。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	　　1、设计师开的皮包<a href="http://www.eecn.cc/tenders.html" target="_blank">装修公司</a>不能找\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	　　当然说这个有个前提，我的意思是个人设计师开的皮包<a href="http://www.eecn.cc/tenders.html" target="_blank">装修公司</a>。有很多在<a href="http://www.eecn.cc/tenders.html" target="_blank">装饰公司</a>工作的设计师，等手上的客户多了起来，羽翼也丰满了而后自立门户开了<a href="http://www.eecn.cc/tenders.html" target="_blank">装饰公司</a>。虽说很多设计师设计确实有一套，但创业开公司后依托的平台有限，收不上合理的设计费。于是乎脑筋都动在了装修上了。不少业主冲着设计去的，而后稀里糊涂就做了装修，杯具了。设计师设计做的好其实与施工做得好完全是两码事。住宅装饰设计你一个设计师捣鼓捣鼓问题不大，但要挑起施工大梁并对工人进行技术培训就完全两回事了。很多设计师开的<a href="http://www.eecn.cc/tenders.html" target="_blank">装饰公司</a>，无非是从老东家处挖了点装修工人，在材料监管，施工现场安全以及培训上都无法真正落实，更别提保修了。&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	　　这样的施工真的无法保障，不说价格上没有一个定价，“看菜吃饭”式的定价，就连施工队伍都无法固定，往往业务不持续，工人都是临时从其他<a href="http://www.eecn.cc/tenders.html" target="_blank">装饰公司</a>临时拉来的。所以说，设计和施工是两个不同的专业，虽然有交集，但毕竟设计为脑力劳动，而施工管理更偏向于管理工作，找的不巧找个个体设计师开的<a href="http://www.eecn.cc/tenders.html" target="_blank">装修公司</a>做施工，连最基础的维修保障都没有，不值得。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '192.168.0.113'),
(22, 22, '', '', '', '<p>\r\n	在我们近三个月来的读者反馈中，有约92%的读者反映家里的装修出现预算超支的情况。的确，实际装修费用高于预算费用的现象正普遍存在于目前的家装业，究其原因，除了一些不正规的装修中隐藏的猫腻之外，还有一个很重要的原因，就是由马虎粗略、技术不成熟所造成的设计施工误差。正是这些误差造成了业主在装修期间不断的被动接受着预算的超额。\r\n</p>\r\n<p>\r\n	<a href="http://zixun.jia.com/tag/864/" target="_blank">量房</a>验房的误差说起来不是大事，但却无形中使业主的预算超支，设计效果不理想。差之毫厘，谬以千里。量房不准确，说起来也就几厘米的事情，很多人可能觉得根本不值一提。可是为什么当你上了装修的船之后就不得不一次又一次的拿出你预料之外的钱呢，其实，很可能就是当初那不起眼的几厘米在作怪。量房不准究竟会造成哪些遗憾，让我们一起来看一看吧。\r\n</p>\r\n<p>\r\n	1.电视、挂画怎么挂都是歪的。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	把电视和画挂上墙时却发现挂来挂去怎么看都是歪的。其实并不是挂歪了，而是量房不精准以至于直到装修结束还不知道墙体本身就是歪斜的。\r\n</p>\r\n<p>\r\n	2.吊柜顶部与屋顶不平行。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	错误的量房结果导致错误的设计。吊柜顶明明是平的，却因为屋顶的不平而产生了左右宽度不一致的难看缝隙，想弥补也来不及了。\r\n</p>', '192.168.0.113'),
(23, 23, '', '', '', '<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	【色彩搭配】<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>的床、柜子、椅子等适合木质的材质，因为木色是最原始的色彩，纯朴大方，自然舒适，更适宜睡眠环境。<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>的床品、窗帘、壁画在颜色和花色选择，也应该避免过于刺激的色彩、过于混乱夸张的图案。蓝色和绿色对睡前安定情绪有作用。墙面适合淡蓝、浅绿、白色等让人安静、舒适的颜色，使人睡意更浓。&nbsp;\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　如果<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>的主色调已经定好，但是稍微有些偏颇，就可以利用其它颜色来改善卧室颜色风水。&nbsp;\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　例如：可以用一些中性色(如黑、白、灰、银等)来调整，也可选择一些摆设(如花卉、装饰物、工艺品等)来进行微调。 但若<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>整体冷色系过重，可适当选择有点暖色区块的物件，增加房间温度，越大的房间越需要暖色调来调和。&nbsp;<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>颜色不宜：大面积使用深色、黑色、橘色、红色。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201703/20170316_16F969E022FA0E20D39879EEBE4FC7A5.png?PID762" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　【光线营造】一般来说，光线的亮度影响着人大脑神经中枢的活跃程度，对于<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>来说适宜的亮度能更好的促进睡眠质量。<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>一般适合安装壁灯、吊灯、筒灯、地灯、台灯、落地灯、顶灯等。尽量不要在床头设置太近太亮的灯，要是某些时候必须使用亮度高的灯具则尽量选择可调节的亮度的灯具，在睡眠前可调低亮度。如果对黑暗具有不安全感的人，则可以增加地灯，有助于入眠。尽量不要把吊灯安装在床头位置，避免因安装不到位而造成意外伤害，尤其尽量避免水晶灯安装在床头。&nbsp;\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>减少使用光线太强的暖光，虽暖色光能增加房间温度，但过强光线不宜助眠。若有条件可在夏冬季更换灯泡，冬季偏暖光，但夏季偏冷光，还可适当调整夜晚房间温度。&nbsp;<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>灯罩的遮光作用相对比较重要，灯罩可以过滤光源直接发出的强光，使灯光变的柔和舒适，保护我们的眼睛免受伤害。相对来说，<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>更适合选择灯罩向上的灯具，让光线更加柔和。至于灯罩朝上容易积灰的问题其实是一个思维误区，灯罩向上，灰落在灯罩里，看不到，一年打理一次即可。&nbsp;\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　【地面装饰】地上<a href="http://www.eecn.cc/" target="_blank"><span style="color:#E53333;">装修</span></a>材料也就地砖、地板和地毯几种，尽管用地砖铺<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>地上的状况也不少见，但是<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>地上不要选择地砖。终究<a href="http://www.eecn.cc/case-items-75-0-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>地上最好能够脚感舒畅、保温又静音。而满意这种请求的，即是地板和地毯了。地板中静音又舒畅的是软木地板，而假如不惧清洁的话，也能够选择满铺地板。不过权衡之下，最好的计划是全铺地板，在床边铺一小块地毯即可。相同，在选择地上<a href="http://www.eecn.cc/" target="_blank"><span style="color:#E53333;">装修</span></a>材料时也要注重其环保性。\r\n</p>', '192.168.0.113'),
(24, 24, '', '', '', '<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	这些遗憾里边，有审美范畴的，也有实用范畴的。我把这些“错误”或“正确”的经验总结出来供大家参考，希望你们因此少走些弯路，毕竟这极耗心血的<a href="http://www.eecn.cc/" target="_blank"><span style="color:#E53333;">装修</span></a>工程，人生中也经历不了几次。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　而这次的标题，也没有像往常一样仔细雕琢，而只是我信手写下的一个短句，打出来才发现，这才是心声吐露，比精心设计的标题直接和有力得多，而且，看起来，可以写很多期，这次是系列之一。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<strong><br />\r\n</strong>\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<strong>　　1. 书架墙要实木感觉的</strong>\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　我家<a href="http://www.eecn.cc/" target="_blank"><span style="color:#E53333;">装修</span></a>，最大的遗憾是那个6米宽、2.8米高的白色爱格板书架墙。我每次仔细审视它时，都会激发无限动力去寻找蜂蜜色的实木书架代替。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　当时，我们过分注重了环保、成本以及搁板会不会变形的因素，以为只要有书总是美的，但事实上，真正好看的书架是蜂蜜色甚至深至棕色、黑色的实木做成的，其次是实木贴皮。板材要想显出高级的效果，边角、细节的处理上一定要极为精致，而国内的工艺通常没这么高的标准。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170222_B342CDE37A5864C8B5504A61F8ABECEC.png?PID580" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　图片看似漂亮，其实国内这种白色板材书架墙的实物，一般都会比较low\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170222_84C03407C3B13445C8043BE4F55D72C0.png?PID581" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　即便还是做板材书架墙，板材厚度，颜色也要认真考虑，不能随意，否则很容易留遗憾\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170222_46D101B59F1336EDD0F212194A13076C.png?PID582" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　实木或者实木贴皮的质感是板材难以模仿的\r\n</p>', '192.168.0.113');
INSERT INTO `jh_article_content` (`content_id`, `article_id`, `seo_title`, `seo_keywords`, `seo_description`, `content`, `clientip`) VALUES
(25, 25, '', '', '', '<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	今天推荐的居住榜样&nbsp;<strong>胖达白</strong>&nbsp;家就有不少莫兰迪色，色彩丰富但看着却一点都不乱。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　她还有不少配色的心得：“搭配前先统一空间整体色调整，再围绕配色来选家具和饰品。搭配时多用拼图软件，把家具的饰品拼在一起，迅速就能看到整体效果！”\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_1A5EA31214B8464072E97776B18F9098.png?PID500" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　<a href="http://www.eecn.cc/case-items-74-0-0-0-1.html" target="_blank"><span style="color:#E53333;">客厅</span></a>没有<a href="http://www.eecn.cc/" target="_blank"><span style="color:#E53333;">装修</span></a>主灯，在房间四周和正中共安装10盏筒灯，电视柜上方凹槽处安装灯带，不过图片P过头了，看不到筒灯了，请大家自行想象，哈哈~~超爱这把墨绿扶手椅，为它特意搭配了墙上的大D海报。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_65F50D5A78DE6087EF507C506786FE34.png?PID501" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　电视柜最上方有一层灰色的柜门，和其他灰色相呼应。电视柜下方装一个台面，可以摆放一些装饰品。做法是用木榫板打底，表面贴装大理石。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_3699668DDE7432F460862EFCE27F7F55.png?PID502" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　<a href="http://www.eecn.cc/case-items-0-91-0-0-1.html" target="_blank"><span style="color:#E53333;">玄关</span></a>装了一个顶天立地的大柜子，收纳空间很足。柜门没装拉手，安装了反弹器，从负面看上去很简洁，家里很多柜子都是这种设计。玄关的<a href="http://www.eecn.cc/case-items-0-36-0-0-1.html" target="_blank"><span style="color:#E53333;">吊顶</span></a>是木质吊顶，木工板打底，表面贴了原木饰面板。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_7D5D77A6B7F925263E6180AA03094660.png?PID503" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　<a href="http://www.eecn.cc/case-items-76-0-0-0-1.html" target="_blank"><span style="color:#E53333;">餐厅</span></a>的设计让我对设计师佩服的五体投地啊，硬生生给我加出了一个西厨，以捷可以继续当烘焙小能手啦！<a href="http://www.eecn.cc/case-items-0-92-0-0-1.html" target="_blank"><span style="color:#E53333;">橱柜</span></a>总长3米35，冰箱、烤箱、微波炉都在这个区域。我是个装备控，各种小家电齐全，料理机、厨师机、咖啡机都可以摆放在这里~~\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_3AC3DB410C78E48C84AE85FDA217E0A9.png?PID504" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　<a href="http://www.eecn.cc/case-items-76-0-0-0-1.html" target="_blank"><span style="color:#E53333;">餐厅</span></a>很喜欢的一个角度~砌了一面白色文化砖墙，用白色勾缝剂勾缝，表面涂刷白色乳胶漆，方便日后打理。餐椅和吊灯很好地中和了铁艺桌腿的工业感，灯光打开的时候很温馨，特别想回家吃饭。餐桌是家里买的最早的一件家具，等了2个多月才抢这张，到手果然没有失望，纹理很美，特别有质感，而且表面光滑容易打理，不易渗油污。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_921217D0F74179EDF0C5D441509AD4F4.png?PID505" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　餐<a href="http://www.eecn.cc/case-items-0-38-0-0-1.html" target="_blank"><span style="color:#E53333;">吧台</span></a>左边是储物间和隐形门，右边是黑板墙。<a href="http://www.eecn.cc/case-items-0-38-0-0-1.html" target="_blank"><span style="color:#E53333;">吧台</span></a>和黑板墙都是木工按照设计图纸现场制作的。设计师妹子来拍照还顺手帮我画了个黑板画。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_C6AA7EF2AD71325AE116883609C212FF.png?PID506" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　餐<a href="http://www.eecn.cc/case-items-0-38-0-0-1.html" target="_blank"><span style="color:#E53333;">吧台</span></a>中间厨图片太少，因为基本只有这一个角度可拍。墙上横杆购自宜家，搭配了挂勾，筷子桶，沥水架，调料蓝，锅盖架等配件，超级实用~最左侧的窄高柜是木工大叔自行设计的，代替了砖砌门垛，增加了展示收纳空间，超级有才有木有！\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_259E6790996D8495B7B93996F209A0F3.png?PID507" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　从中厨看<a href="http://www.eecn.cc/case-items-76-0-0-0-1.html" target="_blank"><span style="color:#E53333;">餐厅</span></a>，玻璃移门是从窄高柜的外侧和<a href="http://www.eecn.cc/case-items-76-0-0-0-1.html" target="_blank"><span style="color:#E53333;">餐厅</span></a>文化砖墙之间的夹层推拉的，这也都是木工大叔的作品哦，效果还不错。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_59A53415515C731ADD0AE93862468B84.png?PID508" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　床头<a href="http://www.eecn.cc/case-items-75-0-0-0-1.html" target="_blank"><span style="color:#E53333;">卧室</span></a>以浅灰色+原木色为主，搭配了粉色金色的饰品。全景镜头拍出来显得床宽3米，实际上还是1米8*2米的床。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_8E510E3C65ECB4B28E14AC2E017E5CF8.png?PID509" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　主卧的书房之间的墙敲掉往书房挪了十来公分，就为了这一整面墙的衣柜。同时，为了配合床的极简款式，柜门调整为平板样式，木工大叔经验丰富，用了特殊方法让门板不变形，只是实木板难免开裂，也想用木榫板做柜门的住友要考量好。特意选了黄铜拉手，和整体色调搭配，质量不错很有分量，配我家柜门萌萌哒，老公不让铺地板，折中的办法就是用了木纹砖，仿真效果还不错。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_3B16BA56FEF5665E06BDA44D6FCEC758.png?PID510" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　家里最爱的角落，最爱的灯和最爱的椅子，坐在这儿真心就不想起来了，大家也都很爱在这里拍照，显得特别温柔。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_7EFB26FE4FF943C44F3F470094A7F078.png?PID511" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　次卧，公公婆婆来的时候偶尔住一下。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_873CBC661F4E7C703434A090017F6DFE.png?PID512" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　HAY的这把椅子和string书桌简直配一脸，我是恋物癖的典型代表，总是喜欢各种美丽但无用的东西，罗兰其实一直在进行，小配饰买了一大堆，看到喜欢的就想带回家~\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_F68F79173C357097D882DED43F0BA000.png?PID513" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　<a href="http://www.eecn.cc/case-items-86-0-0-0-1.html" target="_blank"><span style="color:#E53333;">书房</span></a>历尽周折，最后变成了现在的样子，和一开始设计的平面布局完全不同，好在效果还说的过去。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_FC29971C2BDDA8C58C5857AA9D2D4240.png?PID514" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　书桌一早就看上了，中间白色和两边原木色桌板都可以掀起来放东西，不过摆了电脑之后使用起来略有不便。\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;text-align:center;">\r\n	<img src="http://www.eecn.cc/attachs/photo/201702/20170213_13F7A6718D62AA57E95E9248C8008472.png?PID515" alt="" />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	<br />\r\n</p>\r\n<p style="font-family:微软雅黑;color:#333333;font-size:14px;background-color:#FFFFFF;">\r\n	　　<a href="http://www.eecn.cc/case-items-78-0-0-0-1.html" target="_blank">卫生间</a>花砖和浴室柜均购自淘宝，当时挑砖挑到眼花，光样砖就看了五六家，最后还是选了这款大花砖，600*600的尺寸，比较省工钱，不过还是少了些北欧感。\r\n</p>', '192.168.0.113'),
(26, 26, '', '', '', '我要装修我要装修我要装修我要装修我要装修我要装修<img src="/./attachs/photo/201703/20170327_1333157996DBE0511669F00A02EE7AD3.jpg?PID37" alt="" />', '192.168.0.101'),
(27, 27, '', '', '', '<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：最近小编看到不少城中村正在改造，也有很多业主来咨询旧房翻新服务。确实，未来几年里，二手房、旧房的装修需求将会逐步攀升。而由于年代久远了，不少旧房墙体防水、防潮的性能十分差，那么让我们一起看看旧房防水有哪些注意点吧~</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">一、防水处理的流程</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">所谓破旧迎新，旧房翻新第一步要对需要拆除的部分全部拆除，并尽可能清除出现场。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">确定好施工方案后，根据需要对墙体进行改造，改造完成后要确定好水平位置，然后进行地面找平。地面不平整会导致防水层厚度不均匀，容易造成开裂渗漏；地漏、墙角、管道等处的接缝尤其要注意。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">地面完成后要进行墙面处理，一般墙面要做30cm左右的防水层，卫生间淋浴房要做到180cm。一般涂料要刷2-3遍，第1遍和第2遍之间要有一定时间间隔，具体时间要看涂料干透的时间，要达到与基层结合牢固、没有裂纹和气泡、不脱落。</span> \r\n</p>\r\n<p class="MsoNormal" style="text-align:left;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">防水层涂刷好之后要铺设保护层，主要是防止后续的施工过程破坏防水层。最后便是闭水试验了，试验的深度不低于2cm，持续时间不少于24小时，如果没有渗漏现象（主要还是水面高度变化）就算合格了，防水工程也告一段落。</span> \r\n</p>\r\n<p class="MsoNormal" style="text-align:left;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">二、旧房防水注意事项</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">从整个防水处理的流程来看，我们理了一下要注意的地方：</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">（1）卫生角的标高要核对清楚、正确，尤其是地漏的标高位置。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">（2）防水材料建议使用水泥基防水涂料，可以有效防止地砖或墙面瓷砖发生巩固、起壳的情况。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">（3）接缝处应该使用高弹性的柔性防水涂料，这些接缝处会移位，最容易发生渗水。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">（4）家里有浴缸的，和浴缸相邻的墙面防水层高度要比浴缸再高出30cm。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">（5）阴阳角要做加强处理，应做成圆弧形的，阴角等地方要铺贴防水无纺布。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">（6）施工过程中除了防水，还要防火，尽量穿着软底鞋进出，避免破坏防水层。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">（7）最后，也是最重要的一点，和邻居搞好关系。无论是拆除还是闭水，都难免影响上下左右邻居的日常生活，一旦防水没做好，水渗漏到别人家里，也是相当麻烦的。</span> \r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">建议各位业主在翻新的过程中，保持和施工师傅的沟通，毕竟房屋上了年纪，折腾不起。更重要的是，施工质量直接影响翻新后的居住质量，如果发现防水没做好，一定要重做哦！</span> \r\n</p>', '192.168.0.113'),
(28, 28, '', '', '', '<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：家里装修接近尾声了，想去验收下各阶段的施工质量，却不知从何入手？都说内行看门道，外行看热闹，今天小编就来给你支几招，让你也能看懂</span><span style="font-size:16px;color:#333333;line-height:2;">竣工验收</span><span style="font-size:16px;color:#333333;line-height:2;">的门道，不做只看热闹的装修外行！</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">一、水电验收：仍需注意</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170315160710_72497.jpg" alt="竣工验收做好这几步，让你安心住进美家" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">电路安装验收主要是通过</span><span style="font-size:16px;color:#333333;line-height:2;">灯具</span><span style="font-size:16px;color:#333333;line-height:2;">试亮、开关试控制来看看照明、通电是否正常，你也可以用电工专业试电笔对每一个插座进行测试，看是否通电。</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">水路安装验收主要是查看管路是否固定牢固，可以打开水龙头来检查其是否会抖动；另外还需要看</span><span style="font-size:16px;color:#333333;line-height:2;">水管</span><span style="font-size:16px;color:#333333;line-height:2;">给水是否畅通，有没有漏水现象，这个比较简便的办法主要是看接头和弯头的位置是否有水珠或者出现渗漏，可以拿一张纸巾擦拭接头、弯头检测；此外，需要检查有</span><span style="font-size:16px;color:#333333;line-height:2;">地漏</span><span style="font-size:16px;color:#333333;line-height:2;">的房间是否存在“泛水”和“倒坡”现象，可以打开水龙头或者花洒，过一段时间后看地面流水是否通畅，有没有局部积水现象。最后，还应对马桶和</span><span style="font-size:16px;color:#333333;line-height:2;">面盆</span><span style="font-size:16px;color:#333333;line-height:2;">的下水是否顺畅进行试水检验。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170315160837_59493.jpg" alt="竣工验收做好这几步，让你安心住进美家" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">二、油漆验收：眼看手摸</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">验收的时候，要注意检查</span><span style="font-size:16px;color:#333333;line-height:2;">涂料</span><span style="font-size:16px;color:#333333;line-height:2;">的品种、颜色以及涂膜应与样板一致。油漆的验收应在涂料干燥后，在自然光线下可以采用目测和手感的方法。油漆表面应平整、光洁；清漆木纹清晰，大面无裹棱、流附和皱皮，颜色基本一致、无刷纹；墙面的乳胶漆没有脱皮、漏刷、透底的问题，大面无流坠，皱皮，表面颜色一致，无明显刷纹。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">三、墙地砖验收：内外兼顾</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">验收墙砖、地砖首先看砖面是否平整，缝隙是否规整一致，砖面是否有破碎、崩角，另外要注意花砖和腰线位置是否正确，有没有出现偏位或高度错误等现象。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170315160746_51261.jpg" alt="竣工验收做好这几步，让你安心住进美家" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">此外，大家还要特别记得检测内在的</span><span style="font-size:16px;color:#333333;line-height:2;">空鼓</span><span style="font-size:16px;color:#333333;line-height:2;">率。可以使用一个金属小锤，轻轻敲打墙、地砖的四角与中间，看看是否有空洞的声音。墙、地砖的局部空鼓率不能超过总铺砖面积的5%，否则会出现脱落问题。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">四、木工验收：灵活好用</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;"><br />\r\n</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170315160809_46838.jpg" alt="竣工验收做好这几步，让你安心住进美家" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">对于现场制作的</span><span style="font-size:16px;color:#333333;line-height:2;">木门</span><span style="font-size:16px;color:#333333;line-height:2;">，应验收门的开启方向是否合理，开合是否灵活，有没有阻滞和反弹现象。另外，还要查看门缝是否合理、严密；对于柜体柜门来说，要看开关是否正常，柜门开合操作是否轻便、有无异声；另外，应查看柜门把手和各种锁具安装位置是否正确，开启是否正常。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">知道以上几点，验收新家，你还会因为是外行不知所措而忐忑吗?</span> \r\n</p>', '192.168.0.113'),
(29, 29, '', '', '', '<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">导语：现代整体厨房已经从最早的使用功能开始向人性化、个性化、多风格的方向发展。一套完整的整体厨房已经不再是简单的柜体组合，而应该是一个含有柜体、内饰、配件的组合产品，款式也已从上下两排单柜组合，开始向人性化、个性化的艺术型、创意型产品发展。随之而来的也是整体厨柜的价格越来越高，但其中哪些是不必要却会增加你预算的陷阱，你真的了解吗？</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">一、问清整体厨房价格计算方法</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170315113544_11997.jpg" alt="预定整体厨柜时哪些陷阱让你的预算超支？" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">整体厨房价格计算方式一般分延米法和柜体计价法两种，前者更适用于我们以前的厨柜计算方法，因为正如我们之前讲的，现代厨柜已经不只是简单的柜体组合，而是柜体、内饰、配件的组合产品，这些内饰配件档次有高低，柜体工艺设计也存在简繁差异，所以不能用一个简单的“延米”概念来进行产品定价销售，而该采用柜体计价法，又称菜单法，会更科学。</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">如果商家使用“延米”这种方式，是容易对大家进行产品价格误导。例如，把防潮面板更换成玻璃门，需要增加玻璃、滑轨或者气压支撑的费用，但在商家的报价单中，没有玻璃、滑轨或者气压支撑的价格，这样你就多支付了一笔不必要的开支，因此大家在选择厨柜时，一定要明确标准配置单中是否有自己要更换的材料报价。</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">此外，商家给的厨柜标准配置单中也会模糊大家不易注意或者不懂的细节部分报价，但这些细节往往也会增加一笔不小的开支，让小编来告诉你有哪些你可以注意但往往会忽略的细节：门板封边、饰面板，层板不同材质及不同数量的报价。这么说可能还是听不出哪里会是商家向您不合理收费的陷阱，那就来举个例子吧，比如：门板封边由PVC材料升级到铝质封边是否需要加收费用，或者一个柜体中标准配置了多少层板，如果增加层板数量，是否要增收费用等。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">二、问清免费与收费</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">大家在选购厨柜过程中，不能轻信销售员的口头介绍，而是应向销售员索要产品的标准配置单，在拿到标准配置单后，还要仔细琢磨，因为里面门道很多。</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">在标准配置单中，一般都规定了厨柜吊柜、地柜、台面的标准尺寸，超出标准尺寸的部分要按照一定比例加收费用，不同的厂家标准尺寸、加收费用比例都不相同。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170315113645_14206.jpg" alt="预定整体厨柜时哪些陷阱让你的预算超支？" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">此外，通常情况下厨柜厂家免费提供的基本配件会包括踢脚铝板、调整脚、铰链、拉手、吊码和连接膨胀塞。不过，虽然这些配件属于免费范围，但是消费者还需要了解这些配件免费的类型和数量，因为更换这些配件的材料或者增加其数量都会导致费用的增加。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">三、问清可去除的附加件</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170315113621_31559.jpg" alt="预定整体厨柜时哪些陷阱让你的预算超支？" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">目前市场上常见的附加件包括米箱、拉篮、挂钩、盘碗架、调味架、垃圾桶、防水垫等。有些附加件去除后并不会导致厨柜无法使用却会为你节省很大一笔开支预算。例如，去掉调味篮后厨柜仍能使用，但如果去掉拉手，厨柜就可能无法打开。此外，大家应该根据自己的资金支付能力和实际需要来选择附加件，不要盲目增加附加件，最后导致厨柜费用超标准。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;line-height:2;color:#333333;">以上，就是小编能跟大家一起分享的内容了，希望大家可以用自己预算内最少的钱买到最称心的厨柜哦！</span> \r\n</p>', '192.168.0.113'),
(30, 30, '', '', '', '<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：结婚可是人生大事，</span><span style="font-size:16px;color:#333333;line-height:2;">婚房</span><span style="font-size:16px;color:#333333;line-height:2;">装修更是结婚准备里十分重要的一关。婚房装修可以说是样样要花钱，那么婚房装修该怎么做能花钱花到刀刃上呢?婚房装修预算又该怎么做呢?接下来就跟着兔狗小编来看看怎么做婚房装修预算才能让花钱更合理吧。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160108170244_61951.jpg" alt="婚房装修预算有重点  花钱花到刀刃上" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">婚房装修预算不超支，帮手先找好</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">新人们忙于工作，难有时间自己跑市场、买材料、监督工程。即便是请假装修，奔波劳顿后难免花容失色、心力憔悴。不如交给专业公司，把住预算关防止挨宰的同时质量也有保证。一个好监理能为你节省下的“冤枉钱”往往超过你请他所花的费用。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">生活缺经验，建材需配好</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">新人们一般都没有装修经验，对于市场上基础建材难识优劣，建议新人去大的建材超市购买品牌产品，虽然价格高一点，但质量更有保证。若是请了专业人士做监理，这个差价也省了。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">平时做饭少，厨房不必好</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">现在城市的生活节奏快，许多新人都没有多少下厨的经验，工作繁忙使得现在的小夫妻们做饭的机会很少，经常一日三餐两顿都在外面解决，所以在</span><span style="font-size:16px;color:#333333;line-height:2;">厨房</span><span style="font-size:16px;color:#333333;line-height:2;">配置方面不必花费太大。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">将来变化多，家具少而精</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">新婚的家庭结构是一个动态变化的过程因此，我们必须要为以后的成长预留空间。工作室、健身房会变成婴儿房，玩具柜会演变成</span><span style="font-size:16px;color:#333333;line-height:2;">书柜</span><span style="font-size:16px;color:#333333;line-height:2;">，所以家具的选择应是“少而精”。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">新品更新快，电器慢些添</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">现在的家电产品更新速度奇快，今天还是等离子的天下明天就都换成了液晶屏电视，新产品和新技术研发速度相当快，新产品的质量和功能都比老款更优越，所以慢点添置有好处。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160108170305_26428.jpg" alt="婚房装修预算有重点  花钱花到刀刃上" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">想法未成熟，摆设尽量少</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">不少人婚房装修追求一步到位，四处采购装饰摆设将</span><span style="font-size:16px;color:#333333;line-height:2;">房间</span><span style="font-size:16px;color:#333333;line-height:2;">充实。但一时间难以考虑周全，盲目买回来使本来不太大的房间更显得窄小杂乱。宁少勿多，宁简勿乱，多给以后留点空间不好么?</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">婚房装修与父母同住</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">新婚夫妇与父母亲同住，人口多，两代人的生活差异大，装修要兼顾多方面的要求，功能区域的设置也要更加科学。应当花钱请专业负责的设计师帮你统筹协调好家庭成员的不同需求。要做到功能设计合理并不是件容易事，它能帮助您充分利用好有限的空间。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">平时摆设多，储物要做好</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">与父母亲同住，两家的生活用品并一家，东西多了没处放，都堆在外面多影响新婚的气氛。以后添了小宝宝空间更加紧张。装修时应多设置些储物空间，这样日子才显得井井有条。与父母同住最好有分别的大容量的储物空间，这样婚房就整洁了。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">平日下厨多，厨柜要添好</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">家里人多了，烧饭肯定成了每天少不了的事，烧饭的时间和清洁的工作量也比较大，所以</span><span style="font-size:16px;color:#333333;line-height:2;">厨柜</span><span style="font-size:16px;color:#333333;line-height:2;">一定要选择结实耐用好打理的，台面也要好清洁。厨房的预算应当适当有所增加。这里的厨房倒并不一定要美观，而是要配置好，结实耐用，好打理，价格自然是下不来。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">家中老幼全，建材更环保</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">与父母一起住要不了几年就会上有老下有小，老人和孩子的身体抵抗力都比较弱，装修的时候应当多考虑买</span><span style="font-size:16px;color:#333333;line-height:2;">环保建材</span><span style="font-size:16px;color:#333333;line-height:2;">，环保建材的市场价格略高，做预算的时候应多留一些余地。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">上面就是小编介绍的婚房装修预算的相关知识，大家要注意哦在婚房装修的时候一定要做好各个环节，才能够让自己的婚房设计得更加完美，不会留下一些装修遗憾。</span> \r\n</p>', '192.168.0.113'),
(31, 31, '', '', '', '<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：在家庭装修中，什么最重要?大多数的人都会说，当然是钱最重要了。那么打算装修预算花多少钱呢?又如何花这些钱来搞装修呢?除了要做好设计外，还要找一家各方面都不错的装修公司，这是关系装修好坏的重要前提，关于装修预算、装修设计方案等才能顺利进行。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160108170439_94808.jpg" alt="借你一双慧眼 做好装修预算" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">一、了解装修方式，装修预算大前提</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装修时与装修公司洽谈时的第一个问题往往就是确定装修的方式，目前市场上最常见的装修方式有清包、</span><span style="font-size:16px;color:#333333;line-height:2;">半包</span><span style="font-size:16px;color:#333333;line-height:2;">、全包和套餐装修等四种，下面兔狗小编给大家介绍全包、半包和</span><span style="font-size:16px;color:#333333;line-height:2;">清包</span><span style="font-size:16px;color:#333333;line-height:2;">三种方式。</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">1.所谓的</span><span style="font-size:16px;color:#333333;line-height:2;">全包</span><span style="font-size:16px;color:#333333;line-height:2;">也叫包工包料，所有材料采购和施工都由施工方负责。全包有好有坏，好的是全包相对省时省力省心，责权比较清晰。一旦装修出现质量问题，装饰公司的责任无法推脱。但是全包费用较高，因为材料价格、种类繁杂，装修户了解甚少，一旦装饰公司虚报价格，或与材料商联手欺骗业主，很难识别。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">2.半包装修是介于清包和半包之间的一种方式，施工方负责施工和辅料的采购，主料由业主采购。半包装修的优点在于选择主要部分掌握主动权，主要材料自己购买，不论在安全上还是经济上都更放心。但同时也存在缺点，半包还是要花不少时间去跑建材市场，不能轻松装修，在签合同时一定要清楚注明哪些由装修公司提供，哪些由业主自己购买，否则很容易在后期被装潢公司钻空子，弄得自己什么都要买，很疲惫也很被动。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">3.所谓清包，就是清包工，是指业主自行购买所有材料，找装饰公司或装修队伍来施工的一种工程承包方式。清包自由度和控制力大，自己选材料，可以充分体现自己的意愿。通过逛市场，可以对装料的种类、价格和性能有个大直观的了解。但是清包需要投入较多的时间和精力，而且清包需要对材料相当了解，否则在与材料商打交道的过程中，难免不吃亏上当。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160108170453_76555.jpg" alt="借你一双慧眼 做好装修预算" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">二、装修预算的计算方式，了解细节</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">计算方式一般分为两种：</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">1.材料费和</span><span style="font-size:16px;color:#333333;line-height:2;">人工费</span><span style="font-size:16px;color:#333333;line-height:2;">。总造价=直接费用+直接费用*综合系数，而一般情况下，人工费是80-150元/工作日，综合系数包括税金和管理费，即综合系数=税金3.41%+管理费5-10%。这种计算方法价格透明，每一项材料的单价都很清晰。也有的公司用一种比较简单的计算方式，即总造价=材料费+人工费。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">2.单项工程总和。即将各项工程的单项造价逐一算出，然后相加，即木龙骨工程+水电工程+油漆工程+木工+泥瓦工程+泥工+洁具安装+五金</span><span style="font-size:16px;color:#333333;line-height:2;">灯具</span><span style="font-size:16px;color:#333333;line-height:2;">，其总和就是总造价。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160108170514_52503.jpg" alt="借你一双慧眼 做好装修预算" />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">三、认真检查，是否存在漏洞</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">确认装修预算要注意一些事项，首先是确定可用资金，决定装修之前，先看看自己可以承受那种档次的装修，这是必须要做的第一件事。其次是合理定位装修档次，再者是要与装修公司全面沟通。最后了解主材市场行情。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">四、装修预算审核方式，精明结算有保障</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装修预算审核时，必须保证装修预算与图纸相对应，图纸上所绘制的每项工程都要在预算书上体现出来。这样可以减少日后因为装修预算与装修不符的冲突。装修预算审核的时候要注意看清楚装修预算的内容，白纸黑字还是好的，一般来说，一份合格的装修预算至少包括项目名称、单价、数量、总价、材料结构、制造和安装工艺技术标准等。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">上面就是小编介绍的装修预算计算与审核的相关知识，相信大家对装修预算已经有些了解了吧。想要知道更多有关装修预算的知识，可以关注我们。</span>\r\n</p>', '192.168.0.113');
INSERT INTO `jh_article_content` (`content_id`, `article_id`, `seo_title`, `seo_keywords`, `seo_description`, `content`, `clientip`) VALUES
(32, 32, '', '', '', '<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：</span><span style="font-size:16px;color:#333333;line-height:2;">玄关是家庭装修中不得不重点考虑的地方，</span><span style="font-size:16px;color:#333333;line-height:2;">别看小小的玄关，它可也是有风水讲究的哦！</span><span style="font-size:16px;color:#333333;line-height:2;">从风水学中所了解到的是玄关可以起到调节室内外气流的作用，使利于家宅运的旺气和不利于家宅运的晦气可以的到很好的自然流通</span><span style="font-size:16px;color:#333333;line-height:2;">，</span><span style="font-size:16px;color:#333333;line-height:2;">所以本期小编要给大家讲解一下</span><span style="font-size:16px;color:#333333;line-height:2;">玄关</span><span style="font-size:16px;color:#333333;line-height:2;">风水</span><span style="font-size:16px;color:#333333;line-height:2;">常识都有哪些</span><span style="font-size:16px;color:#333333;line-height:2;">。</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="text-align:center;margin-left:0pt;">\r\n	<img src="https://pic.tugou.com/jingyan/20170224164757_98689.jpg" alt="玄关风水装修常识大全，你一定要看！" /> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">一、</span><span style="font-size:16px;color:#333333;line-height:2;">玄关</span><span style="font-size:16px;color:#333333;line-height:2;">下实上透</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">玄关间隔设计应以下面实心，防止旺运外泄，上面以通透为主。通透能够保证进门的采光，不会因为玄关给完全挡住了。因此可以用通透的磨砂玻璃或者空心的</span><span style="font-size:16px;color:#333333;line-height:2;">博古架</span><span style="font-size:16px;color:#333333;line-height:2;">之类。上面的材质可以选择透光性好的玻璃材质，而下面最好是能够选择实心而又厚实的材质。</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">二、</span><span style="font-size:16px;color:#333333;line-height:2;">玄关高度适中</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">玄关高度要适中，一般是两米左右，若是客厅玄关的间融太高，处身其中便会有压迫感。风水学上认为，客厅玄关如果设置得太高，就会完全阻挡了屋外之气，从而</span><span style="font-size:16px;color:#333333;line-height:2;">隔断</span><span style="font-size:16px;color:#333333;line-height:2;">了来自屋外的新鲜空气或生气，是非常不可取的。而太低，则没有效果，无论在风水方面以及实用方面均不妥当。</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="text-align:center;margin-left:0pt;">\r\n	<img src="https://pic.tugou.com/jingyan/20170224164817_73356.jpg" alt="玄关风水装修常识大全，你一定要看！" /> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">三、</span><span style="font-size:16px;color:#333333;line-height:2;">玄关保持明亮</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">客厅玄关宜保持明亮，而</span><span style="font-size:16px;color:#333333;line-height:2;">很多住宅的玄关没有自然光源，所以要在采光这方面多下点功夫，除了间隔采用通透的磨砂玻璃之外，还可以在用到室内的灯光来照射</span><span style="font-size:16px;color:#333333;line-height:2;">，</span><span style="font-size:16px;color:#333333;line-height:2;">如安装一些小的</span><span style="font-size:16px;color:#333333;line-height:2;">射灯</span><span style="font-size:16px;color:#333333;line-height:2;">，既能够保证采光，还能够提升室内效果，同时也才</span><span style="font-size:16px;color:#333333;line-height:2;">符合风水学上</span><span style="font-size:16px;color:#333333;line-height:2;">“厅明室暗”之说。</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">四、</span><span style="font-size:16px;color:#333333;line-height:2;">玄关宜洁净</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">客厅玄关宜保持干净清爽，若是在周围堆放太多杂物，不但会令客厅玄关显得杂乱无章，而且也会对</span><span style="font-size:16px;color:#333333;line-height:2;">住宅风水</span><span style="font-size:16px;color:#333333;line-height:2;">产生不好的影响。玄关如果杂物太多则会挡住了进门的财气，而又使屋内的浊气排不出去，还会影响美观性。此外，</span><span style="font-size:16px;color:#333333;line-height:2;">客厅</span><span style="font-size:16px;color:#333333;line-height:2;">玄关处凌乱昏暗，一进门就感觉整个居室挤迫压抑，影响心情。</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="text-align:center;margin-left:0pt;">\r\n	<img src="https://pic.tugou.com/jingyan/20170224164832_76096.jpg" alt="玄关风水装修常识大全，你一定要看！" /> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">五、</span><span style="font-size:16px;color:#333333;line-height:2;">玄关颜色搭配</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">玄关颜色以</span><span style="font-size:16px;color:#333333;line-height:2;">暖色调</span><span style="font-size:16px;color:#333333;line-height:2;">为主</span><span style="font-size:16px;color:#333333;line-height:2;">，</span><span style="font-size:16px;color:#333333;line-height:2;">采用色调较为明亮而非花哨的木板，不要采用太深的颜色，因为色调太深便易有笨拙之感，令本来并不宽敞的客厅玄关有局促之嫌，容易使人有压抑感，暖色调</span><span style="font-size:16px;color:#333333;line-height:2;">给人带来一种舒适，温馨的感觉，让人很快的忘掉烦恼，体会到家的幸福。</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">六、</span><span style="font-size:16px;color:#333333;line-height:2;">玄关忌靠</span><span style="font-size:16px;color:#333333;line-height:2;">窗户</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">玄关最好不紧挨窗户，</span><span style="font-size:16px;color:#333333;line-height:2;">因为临近窗户宜导致才气外泄，影响运势，</span><span style="font-size:16px;color:#333333;line-height:2;">可以在玄关位置用吊灯和吸顶灯这些主灯搭配，点缀一些射灯、</span><span style="font-size:16px;color:#333333;line-height:2;">壁灯</span><span style="font-size:16px;color:#333333;line-height:2;">、</span><span style="font-size:16px;color:#333333;line-height:2;">荧光灯</span><span style="font-size:16px;color:#333333;line-height:2;">这些辅助光源</span><span style="font-size:16px;color:#333333;line-height:2;">，增加采光</span><span style="font-size:16px;color:#333333;line-height:2;">。</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="text-align:center;margin-left:0pt;">\r\n	<img src="https://pic.tugou.com/jingyan/20170224164849_24838.jpg" alt="玄关风水装修常识大全，你一定要看！" /> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">七、</span><span style="font-size:16px;color:#333333;line-height:2;">玄关摆件</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">玄关禁忌摆放时钟，</span><span style="font-size:16px;color:#333333;line-height:2;">时钟放在客厅的进门处，一是给人在成心理上的压抑感，二是开门见钟（谐音终），所包含的寓意不好。</span><span style="font-size:16px;color:#333333;line-height:2;">&nbsp;古人多摆放狮子、麒麟这些 具有灵性的猛兽在门口镇守，而现在由于家居空间面积小，我们想要摆设这些风水摆件的话可以选择，可以选择小的麒麟、貔貅、铜</span><span style="font-size:16px;color:#333333;line-height:2;">葫芦</span><span style="font-size:16px;color:#333333;line-height:2;">等，</span><span style="font-size:16px;color:#333333;line-height:2;">以作镇宅只用</span><span style="font-size:16px;color:#333333;line-height:2;">。这样既然不会受到空间的限制又能起到调节风水的作用。除了这些你还可以摆放叶面大生长旺盛的植物。这样在一定程度是还能够旺财助风水。</span> \r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" align="justify" style="margin-left:0pt;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">风水对于我们家庭装修是在是太重要了，小编为大家整理的玄关风水常识，你们都看懂了吗？以上就是小编带来的全部资讯了，如果您还想了解更多关于家居装修的知识和经验，请广大网友关注我们哦！</span> \r\n</p>', '192.168.0.113'),
(33, 33, '', '', '', '<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：作为</span><span style="font-size:16px;color:#333333;line-height:2;">2017</span><span style="font-size:16px;color:#333333;line-height:2;">年的流行色，“</span><span style="font-size:16px;color:#333333;line-height:2;">greenery</span><span style="font-size:16px;color:#333333;line-height:2;">”即草木色，有着唤醒春天及苏醒、复原、修复的含义，最适合用作</span><span style="font-size:16px;color:#333333;line-height:2;">阳台</span><span style="font-size:16px;color:#333333;line-height:2;">设计，给你带来身心无限的放松，治愈工作繁忙的每一天。那么是否堆满植物完成了呢？楼楼楼，下面让小编来展示一下阳台设计的多种进阶玩法吧</span><span style="font-size:16px;color:#333333;line-height:2;">~</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170220135737_50246.jpg" alt="2017年，如何设计一个“草木色”的阳台？" />\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">一、养花养草养虫子</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">一说到绿色，大多数装修业主最先想到的就是花花草草了，就像很多可爱的爷爷一样，会选择在阳台养殖盆花。在装修阳台时，不妨利用</span><span style="font-size:16px;color:#333333;line-height:2;">瓷砖</span><span style="font-size:16px;color:#333333;line-height:2;">将整体色调设计为原木色，后期在</span><span style="font-size:16px;color:#333333;line-height:2;">地面</span><span style="font-size:16px;color:#333333;line-height:2;">摆放好绿植就可以了。这样做有助于更突显青翠的绿色，保证颜色的协调。当然，一个实木质感的置物架是很好的搭配，可以减少植物对地面空间的占用，同时可以增加收纳。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170220135745_24439.jpg" alt="2017年，如何设计一个“草木色”的阳台？" />\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">二、墙面也能做处理</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">想要高阶一点的绿植玩法，可以选择在阳台一端的地面预留部分空间，种植常春藤、</span><span style="font-size:16px;color:#333333;line-height:2;">绿萝</span><span style="font-size:16px;color:#333333;line-height:2;">等藤蔓类的绿植，慢慢爬满一整面墙，也是很可爱的一种做法。不过要注意前期要选择表面较为粗糙、耐蚀、耐潮的墙砖，并咨询设计师会否对墙面造成压力，后期也要注重修建过度生长的植物。这样设计的好处之一便是节省了空间，同时更有格调。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170220135753_77581.jpg" alt="2017年，如何设计一个“草木色”的阳台？" />\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">三、主材也能很出彩</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">部分装修业主，可能和小编一样手残而不善养花草，不用担心，谁说阳台一定要养东西呢？通过主材的选择搭配也能实现草木色的阳台，比如略带复古味道的瓷砖，清新的绿色阳台窗帘，都是很不错的选择，而且平常也不用怎么打理，唯一要注意的是保持阳台和各空间的风格一致，避免产生突兀的感觉。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">&nbsp;</span>\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170220135805_12654.jpg" alt="2017年，如何设计一个“草木色”的阳台？" />\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">四、个性搭配最方便</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">更为简便的方法，就是在阳台摆放上绿色的阳台椅、摆件等，建议可以选择藤制家具，略带东南亚风情，也更有自然的味道。不过，放在阳台的桌椅要注意避免阳光暴晒、雨水冲刷，导致掉色、磨损、开裂等现象，影响整体的美观。</span>\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal" style="text-align:center;">\r\n	<img src="https://pic.tugou.com/jingyan/20170220135820_58429.jpg" alt="2017年，如何设计一个“草木色”的阳台？" />\r\n</p>\r\n<p class="MsoNormal">\r\n	<br />\r\n</p>\r\n<p class="MsoNormal">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">不管采用哪种方式来设计你的阳台，别忘了做好通风的工作，无论是植物还是桌椅，还是我们的身心，都需要清新的空气，以及温暖的阳光，希望大家在</span><span style="font-size:16px;color:#333333;line-height:2;">2017</span><span style="font-size:16px;color:#333333;line-height:2;">年都能拥有一个</span><span style="font-size:16px;color:#333333;line-height:2;">fashion</span><span style="font-size:16px;color:#333333;line-height:2;">又</span><span style="font-size:16px;color:#333333;line-height:2;">fresh</span><span style="font-size:16px;color:#333333;line-height:2;">的阳台啦</span><span style="font-size:16px;color:#333333;line-height:2;">~</span>\r\n</p>', '192.168.0.113'),
(34, 34, '', '', '', '<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：在小户型装修中，客厅的装修是一个必不可少的环节。而在客厅</span><span style="font-size:16px;color:#333333;line-height:2;">电视背景墙</span><span style="font-size:16px;color:#333333;line-height:2;">又是</span><span style="font-size:16px;color:#333333;line-height:2;">客厅</span><span style="font-size:16px;color:#333333;line-height:2;">装修中一个十分重要的部分。想要拥有一面美观的客厅电视背景墙，有一定的设计讲究。那么我们该如何打造一面适合自己的</span><span style="font-size:16px;color:#333333;line-height:2;">客厅背景墙</span><span style="font-size:16px;color:#333333;line-height:2;">呢？接下来，小编将为您介绍的是6款小户型电视背景墙装修设计案例，一起来看看吧！</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809194741_77525.jpg" alt="告别土low！6款电视背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装修设计案例1、</span><span style="font-size:16px;color:#333333;line-height:2;">小户型最显的就是温馨感，在电视背景墙上进行一些小花纹的设置，让整个空间的温馨度瞬间提升起来，同时也避免了整个电视背景墙的空白。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809194352_81496.jpg" alt="告别土low！6款电视背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装修设计案例2、</span><span style="font-size:16px;color:#333333;line-height:2;">　在电视墙上设置柜体，能增加收纳的空间，也很好的运用了电视墙的空间。而且跟</span><span style="font-size:16px;color:#333333;line-height:2;">沙发</span><span style="font-size:16px;color:#333333;line-height:2;">背景墙上的灯光做成对比，让整个空间更加的温馨。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809194408_83186.jpg" alt="告别土low！6款电视背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装修设计案例3、</span><span style="font-size:16px;color:#333333;line-height:2;">以大地色系为基底，深浅色的搭配构织成现代人文、简洁俐落的居家风格。横推门阻隔后端厨房和</span><span style="font-size:16px;color:#333333;line-height:2;">卫浴</span><span style="font-size:16px;color:#333333;line-height:2;">空间。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809194423_43960.jpg" alt="告别土low！6款电视背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装修设计案例4、</span><span style="font-size:16px;color:#333333;line-height:2;">　在小户型装修中，每寸空间的运用都是很关键的。像这样在</span><span style="font-size:16px;color:#333333;line-height:2;">客厅</span><span style="font-size:16px;color:#333333;line-height:2;">电视墙</span><span style="font-size:16px;color:#333333;line-height:2;">上放置置物架，不仅利用了电视墙的空间，同时也对电视墙进行的一番的装点。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809194640_51991.jpg" alt="告别土low！6款电视背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装修设计案例5、</span><span style="font-size:16px;color:#333333;line-height:2;">以白色及粉藕色穿插布局全室，素净清爽。但是电视墙不遵循这种风格，通过独特花纹的壁纸进行装饰，让整个空间瞬间又出现了不一样的亮点。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img alt="告别土low！6款电视背景墙设计" src="http://pic.tugou.com/jingyan/20160809194443_65400.jpg" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装修设计案例6、</span><span style="font-size:16px;color:#333333;line-height:2;">以浅色与白色为主，并</span><span style="font-size:16px;color:#333333;line-height:2;">结合框景概念，使</span><span style="font-size:16px;color:#333333;line-height:2;">玄关</span><span style="font-size:16px;color:#333333;line-height:2;">与客厅都更为精致。棕色玻璃延伸电视墙语汇，于左侧隐藏通往主卧的入口，视觉显得一致又简洁。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">小编总结：其实小户型房屋的客厅电视背景墙设计案例很多，小编觉得适合自己的才是最好的，所以希望您在学习完这6种客厅电视背景墙设计案例后，能找到适合自己的客厅电视背景墙设计案例。并打造属于自己的客厅电视背景墙。</span>\r\n</p>', '192.168.0.113'),
(35, 35, '', '', '', '<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：卧室床头背景墙是家中不可忽视的部分。相信再怎么喜欢</span><span style="font-size:16px;color:#333333;line-height:2;">简约风格</span><span style="font-size:16px;color:#333333;line-height:2;">的朋友们，也不能忍受自己的</span><span style="font-size:16px;color:#333333;line-height:2;">卧室</span><span style="font-size:16px;color:#333333;line-height:2;">背景墙呈现“光秃秃”的样子。针对单调的卧室床头背景墙，很多人会选择悬挂装饰画或者手绘彩色图案来或者是添加其它装饰物来为其增色，使它看起来更加丰富、美观。下面小编将为大家介绍的是10大的卧室床头背景墙设计案例以及效果美图，一起来学习一下吧！</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809185951_20222.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips1：收纳设计</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">卧室床头空间可以作为收纳设计，既为背景墙增加设计感，又能增添一处方便的收纳之地，让</span><span style="font-size:16px;color:#333333;line-height:2;">床头柜</span><span style="font-size:16px;color:#333333;line-height:2;">成为一个完全装饰的小单品。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190002_39990.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips2：软包设计</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">卧室床头的软包设计，柔软舒适，给睡眠暖暖的温馨感，另外软包形式别有高贵典雅风韵，为卧室增添典雅韵致。软包、</span><span style="font-size:16px;color:#333333;line-height:2;">收纳柜</span><span style="font-size:16px;color:#333333;line-height:2;">与床头灯统一在一面墙，单一之地，满足生活的多种功能。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190013_89478.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips3：墙纸</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">如果觉得卧室单调，张贴</span><span style="font-size:16px;color:#333333;line-height:2;">墙纸</span><span style="font-size:16px;color:#333333;line-height:2;">也是一种简便又能营造美观的方式，选择与卧室风格相符合的壁纸覆盖墙面的单调，营造出一个饱满的生活空间。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190028_48604.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips4：几何结构</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">这款带独立</span><span style="font-size:16px;color:#333333;line-height:2;">卫浴</span><span style="font-size:16px;color:#333333;line-height:2;">设计，统一空间里功能丰富让生活更加便利，另外，卧室与卫浴之间以半墙</span><span style="font-size:16px;color:#333333;line-height:2;">隔断</span><span style="font-size:16px;color:#333333;line-height:2;">，并作出三角立体设计，给人空间的梦幻奇趣感。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190043_45807.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips5：床头挂画</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">用</span><span style="font-size:16px;color:#333333;line-height:2;">床头</span><span style="font-size:16px;color:#333333;line-height:2;">挂画</span><span style="font-size:16px;color:#333333;line-height:2;">来填充空白的床头墙面简直是懒人福利，一款与室内风格色系相契合的挂画为卧室天才不少，卧室里添加一个小</span><span style="font-size:16px;color:#333333;line-height:2;">书房</span><span style="font-size:16px;color:#333333;line-height:2;">，让静静的读书空间为卧室多一份书香。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190104_33647.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips6：瓷砖拼贴</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">大胆的使用</span><span style="font-size:16px;color:#333333;line-height:2;">瓷砖</span><span style="font-size:16px;color:#333333;line-height:2;">拼贴墙面，复古的纹理，浓厚的色系搭配，即使是瓷砖材质也毫无冰冷之感。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190124_52922.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips7：窗户设计</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">如果条件允许的话可以直接将床与卧室小窗相搭配，引入采光的同时，让床头空间多了别致的设计，另外窗台也可以作为小小的收纳空间。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190609_33039.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips8：层次设计</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">原木床古朴的肌理展示给我们一种自然的亲切，床头以木板和</span><span style="font-size:16px;color:#333333;line-height:2;">混凝土</span><span style="font-size:16px;color:#333333;line-height:2;">做出错落的层次设计，简约但不简单，搭配三幅水墨拼接画，让</span><span style="font-size:16px;color:#333333;line-height:2;">房间</span><span style="font-size:16px;color:#333333;line-height:2;">内韵味无穷。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190529_74980.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips9</span><span style="font-size:16px;color:#333333;line-height:2;">：</span><span style="font-size:16px;color:#333333;line-height:2;">悬空设计</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">床头柜以嵌到墙面的悬空方式打造，颇具空间奇趣感，也更为简约，空间看起来更清爽一些，壁灯设计取代了</span><span style="font-size:16px;color:#333333;line-height:2;">台灯</span><span style="font-size:16px;color:#333333;line-height:2;">，节省了空间。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/jingyan/20160809190547_15903.jpg" alt="哇哦！原来可以这么美：10款卧室床头背景墙设计" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">Tips10</span><span style="font-size:16px;color:#333333;line-height:2;">：</span><span style="font-size:16px;color:#333333;line-height:2;">DIY小物</span>\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">这款卧室床头架构了一小小的个羽毛垂帘，DIY形式装饰床头背景墙，填充了床头的单身空白。家居生活中DIY的形式带着一种无可取代的回忆特质，带来丝丝温馨情致。</span>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">小编总结：卧室床头背景墙的装饰设计虽然不难，但要想拥有一面美观的卧室床头背景墙，依旧需要我们的精心设计哦！以上就是小编为您介绍的10大的卧室床头背景墙设计案例以及效果美图，希望对您有所帮助。如果您还有其他关于卧室床头背景墙设计案例的问题或者其它家装类的问题，欢迎到我们的官网进行咨询哦！</span>\r\n</p>', '192.168.0.113'),
(36, 36, '', '', '', '<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">导语：大家在日常生活中肯定都会遇到家装风格搭配的问题，家具与家居环境的和谐程度对于</span><span style="font-size:16px;color:#333333;line-height:2;">整体家居</span><span style="font-size:16px;color:#333333;line-height:2;">视觉效果有着很大的影响作用。好的家具不仅自身要美观、大方，更要能与周围环境相得益彰，营造舒适的家装风格。下面就和兔狗小编来详细了解一下家装风格的相关知识，看看如何调整好家具与家居环境之间的关系。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="http://pic.tugou.com/jingyan/20160115184122_20072.jpg" alt="家装风格有套路" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">家装风格：深色坐镇 居室缤纷而不轻佻</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">一些人希望让自己的家装风格显得色彩缤纷，比如将墙壁涂刷成鲜艳的色彩，但是又担心过分艳丽的颜色会令</span><span style="font-size:16px;color:#333333;line-height:2;">房间</span><span style="font-size:16px;color:#333333;line-height:2;">变得轻佻、庸俗。其实，只要在家具和饰品搭配上用点心思，你所担心的情况完全可以避免。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">对于色彩鲜艳的墙面来说，一套深色家具是最合适的了。值得注意的是，如果墙面颜色是</span><span style="font-size:16px;color:#333333;line-height:2;">暖色调</span><span style="font-size:16px;color:#333333;line-height:2;">，比如桃红色，那么家具的色调最好也是暖色调的，可以选择樱</span><span style="font-size:16px;color:#333333;line-height:2;">桃木</span><span style="font-size:16px;color:#333333;line-height:2;">等材质的家具;如果墙面颜色偏冷色调，如水蓝色、果绿色等，那么家具就要避免选择上述材质，黑胡桃则更为理想。深色家具往往显得沉稳、大气，能够压住“阵脚”，让家装风格在缤纷美丽的同时，不会失去优雅格调。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="http://pic.tugou.com/jingyan/20160115184141_50942.jpg" alt="家装风格有套路" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">家装风格：收敛色彩 突出恬淡纯净味道</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">都市生活过于纷繁和喧闹，因此许多人都希望自己的家能展现出宁静、自然的一面，让疲惫的心灵有个休憩的港湾。减少色彩的选择，浅淡的色调更容易带给人们这样的家居空间。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">淡淡的蓝灰色能够帮助人们放松紧张的神经，将这种颜色使用在墙面、</span><span style="font-size:16px;color:#333333;line-height:2;">窗帘</span><span style="font-size:16px;color:#333333;line-height:2;">等处，会令房间显得恬淡而柔和，并有一种隐约闪现的怀旧情怀。在这样的空间里，搭配灰白色的木质家具或是冷色系的布艺家具都是不错的选择。比如有做旧工艺的灰白色木角桌、淡蓝底色带有古典粉色花卉的布</span><span style="font-size:16px;color:#333333;line-height:2;">沙发</span><span style="font-size:16px;color:#333333;line-height:2;">。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="http://pic.tugou.com/jingyan/20160115184149_87604.jpg" alt="家装风格有套路" /> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">家装风格：主题呼应 对比统一皆出精彩</span> \r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">如果能够提前对家居空间有一个主题定位，那么在搭配家具和饰品的时候就更能做到有的放矢。无论是追求和谐统一的视觉感受，还是富有冲击力的对比效果，家具和周围环境的主题呼应都能帮你实现愿望。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">比如你想要营造出清新、自然的客厅主题氛围，那么浅绿色和自然元素的运用就必不可少。带有浅绿色花纹的沙发是整个客厅的视觉焦点，用同样颜色的窗帘、各种绿色植物来与它进行呼应，整个空间的自然风情应运而生。此外，木质桌面的茶几又与其上的根雕艺术品、木质</span><span style="font-size:16px;color:#333333;line-height:2;">台灯</span><span style="font-size:16px;color:#333333;line-height:2;">座、竹帘等饰品达成了十分和谐统一的视觉效果。如果你选择了更加具有挑战性的斑马纹壁纸做为餐厅墙面的装饰，那么黑白对比的主题也要体现在家具的选择上。只要整个空间的主题是一致的，即便是黑白这样强烈的对比色也能勾勒出美好的家居图景。</span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<span style="font-size:16px;color:#333333;line-height:2;">上面就是兔狗小编介绍的家装风格的相关知识，大家知道该如何调整好家具与家居环境之间的关系了吗?兔狗小编建议网友们在装修设计时最好参与到其中去，这样才能更好的发现问题解决问题。想要了解更多家装风格的知识，可以关注我们哦。</span> \r\n</p>', '192.168.0.113'),
(37, 37, '', '', '', '<h2 class="pd-title" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:24px;color:#E53333;line-height:2;">户型解读</span> \r\n</h2>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404133_2952409.jpg" alt="用户设计图" style="width:580px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">“本案例采用实木纹理,复古的皮质沙发,复古的壁橱，流露出一股浓浓的美洲风情.外观和用料仍保持自然、淳朴的风格。”</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<h2 class="pd-title" style="text-align:center;">\r\n	<span style="font-size:24px;color:#E53333;line-height:2;">完工全景</span> \r\n</h2>\r\n<p>\r\n	<span style="font-size:18px;color:#E53333;line-height:2;"><br />\r\n</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404454_2184308.jpg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">复古的美式沙发摒弃了巴洛克和洛可可风格所追求的新奇和浮华，而是建立在一种对古典文化新的认识基础上，强调实用性。</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"><br />\r\n</span>\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404454_133684.jpg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">吊顶造型经过了简化，将审美舞台完全让给了吊灯，达到了整体的和谐，反而更加美观。</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"><br />\r\n</span>\r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404454_3105303.jpg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">深咖色的实木家具给人以尊贵之感。</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"><br />\r\n</span>\r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404454_6517346.jpg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">圆形餐桌椅设于多边形厅室的中间，给人留下了更灵活的通行空间；同时让吊灯可以位于吊顶中间，更好地传递光源。</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"><br />\r\n</span>\r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404456_1496239.jpg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">玄关进门便达多边形餐厅，一边欣赏着油画，曲折几步才能到达客厅，丰富了空间的层次感，也不失为一种意趣。</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"><br />\r\n</span>\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"><br />\r\n</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404455_5292831.jpg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">儿童双层床也是深色的实木材质，很是安全耐用。</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"><br />\r\n</span>\r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404455_197694.jpg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">简约的实木家具，与那 似蕴含了花鸟之约的床品，容你尽情享受自然、雅致的美式生活。</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"><br />\r\n</span>\r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/1475404456_971278.jpg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">取消了常用的卫浴底柜门，替代以隐藏设计的抽屉，使空间更整洁、美观。</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>', '192.168.0.113');
INSERT INTO `jh_article_content` (`content_id`, `article_id`, `seo_title`, `seo_keywords`, `seo_description`, `content`, `clientip`) VALUES
(38, 38, '', '', '', '<h2 class="pd-title" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:24px;color:#E53333;line-height:2;">户型解读</span> \r\n</h2>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182257_9014.png" alt="用户设计图" style="width:580px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">“</span><span style="font-size:16px;color:#333333;line-height:2;">此户型为一套独栋别墅，以美式风格为主，满足业主对中产品质生活的追求与喜好。</span><span style="font-size:16px;color:#333333;line-height:2;">”</span> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<h2 class="pd-title" style="text-align:center;">\r\n	<span style="font-size:24px;color:#E53333;line-height:2;">完工全景</span> \r\n</h2>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182314_6871.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">钢琴的黑白琴键弹奏出乐章，恰如两组黑白沙发承载着人言暖语。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182326_7293.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">纱白窗帘柔和了刺眼的阳光，也温柔了岁月。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182348_2696.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">进食是一种古老而郑重的仪式，一筷一箸摄取自然的生命力。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182358_1552.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">高低错落摆放瓶瓶罐罐，目光跳跃也能在心底哼唱愉快的小曲。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182409_8254.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">私密的谈话坐躺随意，四肢摩擦着柔软的地毯，心房悄悄打开。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182419_8973.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">装饰品一定要分类摆放整齐，闪闪惹人爱。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182429_4939.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p style="text-align:center;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;"></span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">紫罗兰和轻纱的搭配满足了一切对于小公主骄纵的幻想。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182442_5353.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">脚踩毛绒绒的地毯，一个人对着镜子练习酒会的舞步。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182453_9487.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">树木是年轮的史官，书籍是历史的馈赠，书页翻动传来古人智慧的低语。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p style="text-align:center;">\r\n	<img src="http://pic.tugou.com/realcase/20160624182504_1300.jpeg" alt="设计图" style="width:680px;" /> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<span style="font-size:16px;color:#333333;line-height:2;">对镜理仪容，每一张裙摆都要划出完美的弧度再踏出浴室。</span> \r\n</p>\r\n<p class="pd-img-desc" style="text-align:center;vertical-align:baseline;">\r\n	<br />\r\n</p>', '192.168.0.113');

-- --------------------------------------------------------

--
-- 表的结构 `jh_article_link`
--

CREATE TABLE IF NOT EXISTS `jh_article_link` (
  `link_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `link` varchar(150) DEFAULT '',
  `orderby` smallint(6) unsigned DEFAULT '0',
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_case`
--

CREATE TABLE IF NOT EXISTS `jh_case` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `jh_case`
--

INSERT INTO `jh_case` (`case_id`, `designer_id`, `manager_id`, `title`, `home_name`, `photo`, `price`, `size`, `views`, `likes`, `seo_title`, `seo_keywords`, `seo_description`, `intro`, `photos`, `lastphotos`, `lasttime`, `sex`, `name`, `dianping`, `orderby`, `audit`, `closed`, `clientip`, `dateline`) VALUES
(1, 4, 0, '鲜艳巴西现代小户型装修案例', '福星惠誉福星城', 'photo/201703/20170318_1DECA826119AF069D72DC75980F8FC41.jpeg', '98000', 886708, 331, 1, '', '', '', '热情的红色墙体映入眼帘，装扮成照片墙，艳丽绚烂有内涵。', 6, '6,5,4,3,2,1', 1489817166, 0, '陈女士', '我们家刚装修完，总体来说还是很好的，和我的想象不相上下。当时去公司看的时候，就觉得他们的服务蛮好就定下来了。', 50, 1, 0, '192.168.0.113', 1489817112),
(2, 4, 0, '时尚现代小户型装潢案例', '卧龙丽景湾', 'photo/201703/20170318_80213752E5781B461A122FF570540EED.jpeg', '87000', 456972, 321, 1, '', '', '', '40平精装蜗居，卧室和客厅没有明显的划分，整体浴室，开敞式环保节能型整体厨房，小户型是一种生活方式，代表方便、快捷、时尚、优雅的生活。', 7, '13,12,11,10,9,8,7', 1489817617, 0, '王先生', '我非常喜欢这个风格，装修下来整体效果比较满意，感谢贵公司的辛勤服务，以后买房了再考虑换个风格试试，谢谢了。', 50, 1, 0, '192.168.0.113', 1489817591),
(3, 4, 0, '多彩简欧小户型装修案例欣赏', '龙阳一号', 'photo/201703/20170318_F69A4069C01F42D16245CE2068D90B0C.jpeg', '56000', 328959, 654, 0, '', '', '', '本案一改传统阁楼的低沉，采用暖色调增加空间亮度，沙发背景墙的炫彩油画与粉红色地毯相互照应。', 7, '20,19,18,17,16,15,14', 1489817848, 0, '叶女士', '阁楼倾斜的房梁在本案中毫无压迫感，直角形书架嵌在墙面上与房梁的坡度巧妙结合，开放式厨房规划的整洁有序，偌大的三开门冰箱放置在墙边，可以储存许多可口的食物，感觉非常好啊。', 50, 1, 0, '192.168.0.113', 1489817807),
(4, 4, 0, '温馨混搭风格小户型单身公寓装潢案例', '福星国际城', 'photo/201703/20170318_70416B3820138FC4F30B26E85B84A17B.jpeg', '119000', 816912, 274, 1, '', '', '', '再小的面积也要满足主人的公主梦，浪漫的紫色纱幔装点了带有精致花纹的铁艺床，飘逸唯美。', 7, '27,26,25,24,23,22,21', 1489818050, 1, '郝女士', '整个房间的一般空间都被麻雀虽小五脏俱全，进门的玄关鞋柜设计的精美又漂亮，搭配半身镜，出门前还方便整理妆容。公寓面积不大，却有着非常清晰的功能规划。这个多功能 区域占领，两排壁柜是担起了整个公寓的收纳重任。', 50, 1, 0, '192.168.0.113', 1489818026),
(5, 4, 0, '唯美中式别墅效果图鉴赏', '', 'photo/201703/20170318_680B6A7BD7A7719AE91EDE4B964BA49C.jpeg', '520000', 971628, 661, 0, '', '', '', '这样的客厅令人眼前一亮，将客厅放置在阳光房中，采用原木色软装，绿色装饰藤蔓和鸟笼，随风飘荡的素色窗帘，仿佛置身自然之中。', 7, '34,33,32,31,30,29,28', 1489818352, 0, '', '长方形西式餐桌与中式风格的完美搭配，营造出别样韵味，中式传统四柱床，木制品的香味弥漫在整个空间中，淡绿色银杏叶墙纸与原木色家具的完美结合，床头的立体小鸟将静态空间转变为动态。', 50, 1, 0, '192.168.0.113', 1489818328),
(6, 4, 0, '98平米清新新古典风格别墅装修案例欣赏', '', 'photo/201703/20170318_14EF480D65BBC683A706899E03F37E08.jpeg', '610000', 486638, 284, 2, '', '', '', '入门玄关处摆放了一座艺术模型，旁边两盏台灯古典温和，装饰柜简单大方，颜色的挑选很沉稳。', 6, '40,39,38,37,36,35', 1489818447, 0, '王先生', '客厅很明亮，有黄色的灯带的装饰，中间还有一盏豪华的水晶吊灯。电视背景墙隔断很有艺术感。客厅很明亮，有黄色的灯带的装饰，中间还有一盏豪华的水晶吊灯。电视背景墙隔断很有艺术感。', 50, 1, 0, '192.168.0.113', 1489818414);

-- --------------------------------------------------------

--
-- 表的结构 `jh_case_attr`
--

CREATE TABLE IF NOT EXISTS `jh_case_attr` (
  `case_id` int(10) NOT NULL DEFAULT '0',
  `attr_id` smallint(6) NOT NULL DEFAULT '0',
  `attr_value_id` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`case_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jh_case_attr`
--

INSERT INTO `jh_case_attr` (`case_id`, `attr_id`, `attr_value_id`) VALUES
(1, 4, 17),
(1, 5, 24),
(2, 4, 17),
(2, 5, 24),
(3, 4, 17),
(3, 4, 19),
(4, 4, 36),
(4, 5, 24),
(4, 5, 39),
(5, 4, 18),
(5, 5, 37),
(6, 4, 34),
(6, 5, 37);

-- --------------------------------------------------------

--
-- 表的结构 `jh_case_comment`
--

CREATE TABLE IF NOT EXISTS `jh_case_comment` (
  `comment_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` mediumint(8) DEFAULT '0',
  `nickname` varchar(64) DEFAULT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT '0.0.0.0',
  `dateline` int(11) DEFAULT '0',
  `audit` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `jh_case_comment`
--

INSERT INTO `jh_case_comment` (`comment_id`, `case_id`, `nickname`, `content`, `create_ip`, `dateline`, `audit`) VALUES
(1, 0, '王先生', '客厅很明亮，有黄色的灯带的装饰，中间还有一盏豪华的水晶吊灯。电视背景墙隔断很有艺术感。客厅很明亮，有黄色的灯带的装饰，中间还有一盏豪华的水晶吊灯。电视背景墙隔断很有艺术感。', '127.0.0.1', 1489824773, 1),
(2, 0, '陈先生', '客厅很明亮，有黄色的灯带的装饰，中间还有一盏豪华的水晶吊灯。电视背景墙隔断很有艺术感。客厅很明亮，有黄色的灯带的装饰，中间还有一盏豪华的水晶吊灯。电视背景墙隔断很有艺术感。', '127.0.0.1', 1489824936, 1),
(3, 0, '軣先生', '客厅很明亮', '127.0.0.1', 1489824965, 1),
(4, 0, '陈女士', '客厅很明亮，有黄色的灯带的装饰，中间还有一盏豪华的水晶吊灯。电视背景墙隔断很有艺术感。客厅很明亮，有黄色的灯带的装饰，中间还有一盏豪华的水晶吊灯。电视背景墙隔断很有艺术感。', '127.0.0.1', 1489824983, 1),
(5, 6, '水晶吊灯', '水晶吊灯水晶吊灯水晶吊灯水晶吊灯', '192.168.0.101', 1491037247, 0),
(6, 6, '测试11111', '测试11111测试11111测试11111测试11111', '192.168.0.101', 1491038492, 0),
(7, 6, '测试11111', '测试11111测试11111', '192.168.0.101', 1491039126, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jh_case_like`
--

CREATE TABLE IF NOT EXISTS `jh_case_like` (
  `like_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `case_id` mediumint(9) DEFAULT '0',
  `uid` mediumint(9) DEFAULT '0',
  `create_ip` varchar(15) DEFAULT '0',
  `dateline` int(11) DEFAULT '0',
  PRIMARY KEY (`like_id`),
  UNIQUE KEY `case_id` (`case_id`,`create_ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `jh_case_like`
--

INSERT INTO `jh_case_like` (`like_id`, `case_id`, `uid`, `create_ip`, `dateline`) VALUES
(1, 6, 0, '192.168.0.101', 1490249004),
(2, 6, 0, '192.168.0.113', 1490860196),
(3, 4, 0, '192.168.0.113', 1490860225),
(4, 1, 0, '192.168.0.101', 1491039613),
(5, 2, 0, '192.168.0.113', 1491478506);

-- --------------------------------------------------------

--
-- 表的结构 `jh_case_photo`
--

CREATE TABLE IF NOT EXISTS `jh_case_photo` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `jh_case_photo`
--

INSERT INTO `jh_case_photo` (`photo_id`, `case_id`, `title`, `photo`, `size`, `views`, `orderby`, `closed`, `clientip`, `dateline`) VALUES
(1, 1, '鲜艳巴西现代小户型装修案例', 'photo/201703/20170318_FA65C59A62AA829B8F386C9774040EC5.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817158),
(2, 1, '鲜艳巴西现代小户型装修案例', 'photo/201703/20170318_05CBB007C98D9E066C130CA9694CA320.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817160),
(3, 1, '鲜艳巴西现代小户型装修案例', 'photo/201703/20170318_CF687844FAA092C891B53C584B8C14EA.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817161),
(4, 1, '鲜艳巴西现代小户型装修案例', 'photo/201703/20170318_FC07E67194B8FB06BA45738E0FCB81F7.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817163),
(5, 1, '鲜艳巴西现代小户型装修案例', 'photo/201703/20170318_1940960A0885AD2275BE4E760F633DD4.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817164),
(6, 1, '鲜艳巴西现代小户型装修案例', 'photo/201703/20170318_1DECA826119AF069D72DC75980F8FC41.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817166),
(7, 2, '时尚现代小户型装潢案例', 'photo/201703/20170318_C3FCC7E6613935FA8A80257A09C6580A.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817609),
(8, 2, '时尚现代小户型装潢案例', 'photo/201703/20170318_3AED2DDE80EF323478578443FFE0CF29.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817610),
(9, 2, '时尚现代小户型装潢案例', 'photo/201703/20170318_F92BFDA2EC4B719638A7759F63905F0D.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817611),
(10, 2, '时尚现代小户型装潢案例', 'photo/201703/20170318_032F33D5449773732CCF42AF51B846C3.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817613),
(11, 2, '时尚现代小户型装潢案例', 'photo/201703/20170318_DE08A8EFDE94B421F2B59B96C5BF46D8.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817614),
(12, 2, '时尚现代小户型装潢案例', 'photo/201703/20170318_C9DD9025B7C34CA6CD2A1213CE085CA1.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817615),
(13, 2, '时尚现代小户型装潢案例', 'photo/201703/20170318_80213752E5781B461A122FF570540EED.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817617),
(14, 3, '20161028110006_123', 'photo/201703/20170318_B132D6D90625726788B8C16AA544B9B0.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817841),
(15, 3, '20161028110006_143', 'photo/201703/20170318_C56132E832BD86470D7291F6A2684F58.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817842),
(16, 3, '20161028110006_2452', 'photo/201703/20170318_DB80F0D3F77C99B3C1390E2A0FE81666.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817843),
(17, 3, '20161028110006_2980', 'photo/201703/20170318_B93EF825CB31A34B10E6D2984C46A7F3.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817844),
(18, 3, '20161028110006_5235', 'photo/201703/20170318_72E9840ABE11EB61F7B3265B6E665A4F.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817846),
(19, 3, '20161028110006_6062', 'photo/201703/20170318_48CE0BE9387B5C017533510DB41D74F0.jpeg', 30605, 0, 50, 0, '192.168.0.113', 1489817847),
(20, 3, '20161028110006_7721', 'photo/201703/20170318_F69A4069C01F42D16245CE2068D90B0C.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489817848),
(21, 4, '20160715175012_7215', 'photo/201703/20170318_334DDBD9647207A80375C844374FE377.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818040),
(22, 4, '20160715175013_671', 'photo/201703/20170318_2DC9119076DB0EBDDD56105A96F68E8F.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818042),
(23, 4, '20160715175013_3576', 'photo/201703/20170318_BEF5BDC1DF81E639147B3209E8AA3030.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818043),
(24, 4, '20160715175013_3860', 'photo/201703/20170318_9ECAF8E1E02A740415DCFB5E6F47E5E9.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818045),
(25, 4, '20160715175013_8874', 'photo/201703/20170318_F80703764843FB6C92828F8071D88E8B.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818047),
(26, 4, '20160715175013_9208', 'photo/201703/20170318_9962D7469D3D0C2B1C6F3BBE302326B8.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818048),
(27, 4, '20160715175013_9870', 'photo/201703/20170318_70416B3820138FC4F30B26E85B84A17B.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818050),
(28, 5, '20161122092713_3811', 'photo/201703/20170318_F47D2F3024313602AE3E2DF4F37368D7.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818343),
(29, 5, '20161122092714_263', 'photo/201703/20170318_78864B00FA1832E321B6278C3BD01F10.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818345),
(30, 5, '20161122092714_2828', 'photo/201703/20170318_078FBF851706F28AD18A969050D0CC63.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818346),
(31, 5, '20161122092714_3732', 'photo/201703/20170318_A2FC42073ED5E637D1EE90BB58EC1926.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818348),
(32, 5, '20161122092714_5093', 'photo/201703/20170318_3CFC625842A3D16CD2092AC8016CF6FA.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818349),
(33, 5, '20161122092714_6683', 'photo/201703/20170318_3068A9E4479205B82FCBD324F402A242.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818351),
(34, 5, '20161122092714_9730', 'photo/201703/20170318_680B6A7BD7A7719AE91EDE4B964BA49C.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818352),
(35, 6, '20160718194028_9821', 'photo/201703/20170318_5A873029880333C890B1F4B0012DDA20.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818439),
(36, 6, '20160718194029_4582', 'photo/201703/20170318_F28EFBC2FEFE5ECD2F4D0E93E454BE2F.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818441),
(37, 6, '20160718194029_6445', 'photo/201703/20170318_20870A0A70905EE514397267F750C617.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818442),
(38, 6, '20160718194029_7094', 'photo/201703/20170318_D344D938ACB09DA8A6FFBDFB07E47026.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818444),
(39, 6, '20160718194029_9601', 'photo/201703/20170318_E7ADE13ECC52866CB0A7AF58027311EE.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818445),
(40, 6, '20160718194029_9631', 'photo/201703/20170318_14EF480D65BBC683A706899E03F37E08.jpeg', 32767, 0, 50, 0, '192.168.0.113', 1489818447);

-- --------------------------------------------------------

--
-- 表的结构 `jh_cate`
--

CREATE TABLE IF NOT EXISTS `jh_cate` (
  `cate_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(30) DEFAULT '',
  `from` enum('designer','manager','team') DEFAULT 'designer',
  `orderby` smallint(5) DEFAULT '50',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `jh_cate`
--

INSERT INTO `jh_cate` (`cate_id`, `cate_name`, `from`, `orderby`) VALUES
(10, '普通设计师', 'designer', 50),
(11, '高级设计师', 'designer', 50),
(13, '总部', 'team', 1),
(15, '普通项目经理', 'manager', 50),
(16, '明星项目经理', 'manager', 50);

-- --------------------------------------------------------

--
-- 表的结构 `jh_data_attr`
--

CREATE TABLE IF NOT EXISTS `jh_data_attr` (
  `attr_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `from_id` smallint(6) DEFAULT '0',
  `multi` enum('Y','N') DEFAULT 'Y',
  `filter` enum('Y','N') DEFAULT 'Y',
  `orderby` smallint(6) DEFAULT '0',
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `jh_data_attr`
--

INSERT INTO `jh_data_attr` (`attr_id`, `title`, `from_id`, `multi`, `filter`, `orderby`) VALUES
(1, '职位', 1, 'N', 'Y', 50),
(2, '经验', 1, 'N', 'Y', 50),
(4, '风格', 2, 'Y', 'Y', 50),
(6, '工装', 2, 'N', 'Y', 50),
(5, '户型', 2, 'Y', 'Y', 50);

-- --------------------------------------------------------

--
-- 表的结构 `jh_data_attr_from`
--

CREATE TABLE IF NOT EXISTS `jh_data_attr_from` (
  `from_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(30) DEFAULT '',
  `title` varchar(50) DEFAULT '',
  PRIMARY KEY (`from_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `jh_data_attr_from`
--

INSERT INTO `jh_data_attr_from` (`from_id`, `from`, `title`) VALUES
(2, 'zx:case', '效果图'),
(1, 'zx:designer', '设计师');

-- --------------------------------------------------------

--
-- 表的结构 `jh_data_attr_value`
--

CREATE TABLE IF NOT EXISTS `jh_data_attr_value` (
  `attr_value_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `attr_id` smallint(6) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `orderby` smallint(6) DEFAULT '50',
  PRIMARY KEY (`attr_value_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- 转存表中的数据 `jh_data_attr_value`
--

INSERT INTO `jh_data_attr_value` (`attr_value_id`, `attr_id`, `title`, `orderby`) VALUES
(27, 5, '四房', 50),
(26, 5, '三房', 50),
(25, 5, '两房', 50),
(24, 5, '小户型', 50),
(7, 2, '0-1年', 50),
(8, 2, '1-3年', 50),
(9, 2, '3-5年', 50),
(10, 2, '5-8年', 50),
(11, 2, '8年以上', 50),
(17, 4, '简约现代', 50),
(18, 4, '中式', 50),
(19, 4, '欧式', 50),
(20, 4, '美式', 50),
(21, 4, '日韩', 50),
(22, 4, '东南亚', 50),
(23, 4, '地中海', 50),
(34, 4, '新古典', 50),
(35, 4, '田园', 50),
(36, 4, '混搭', 50),
(37, 5, '别墅', 50),
(38, 5, '复式', 50),
(39, 5, '公寓', 50),
(40, 6, '大型办公室', 50),
(41, 6, '小型办公室', 50),
(42, 6, '酒店宾馆', 50),
(43, 6, '酒吧', 50),
(44, 6, '茶楼', 50),
(45, 6, '店面', 50),
(46, 6, '网咖', 50);

-- --------------------------------------------------------

--
-- 表的结构 `jh_decorate_package`
--

CREATE TABLE IF NOT EXISTS `jh_decorate_package` (
  `package_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `face_pic` varchar(128) DEFAULT NULL,
  `htmls` text,
  `orderby` smallint(3) DEFAULT '50',
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `jh_decorate_package`
--

INSERT INTO `jh_decorate_package` (`package_id`, `title`, `face_pic`, `htmls`, `orderby`) VALUES
(1, '优惠券', 'photo/201703/20170322_161034A98199C32134F53CAA0F7D2F7C.jpg', '1288元优惠券', 0),
(2, '精美礼品', 'photo/201703/20170322_FC77A3A5FF4B85EA47457F2E1631329D.jpg', '精美礼品', 0),
(3, '推荐客户', 'photo/201703/20170322_65A7FAB595B50CAC7DF4A95D2B0AF9AE.jpg', '优保计划', 0);

-- --------------------------------------------------------

--
-- 表的结构 `jh_decorate_package_yuyue`
--

CREATE TABLE IF NOT EXISTS `jh_decorate_package_yuyue` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `jh_decorate_package_yuyue`
--

INSERT INTO `jh_decorate_package_yuyue` (`yuyue_id`, `package_id`, `mobile`, `contact`, `content`, `dateline`, `create_ip`, `is_read`) VALUES
(23, 1, '13325698562', '请输入您的姓名', NULL, 1490774096, '192.168.0.101', 0);

-- --------------------------------------------------------

--
-- 表的结构 `jh_designer`
--

CREATE TABLE IF NOT EXISTS `jh_designer` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `jh_designer`
--

INSERT INTO `jh_designer` (`designer_id`, `cate_id`, `team_id`, `name`, `face_pic`, `intro`, `school`, `model_case`, `concept`, `views`) VALUES
(1, 11, 13, '牛秀', 'photo/201703/20170331_38066CF3350A2358DB4617F0D73908C4.jpg', '<div id="wrap730" style="margin:0px;padding:0px;border:0px;font-size:12px;vertical-align:baseline;background:#FFFFFF;color:#666666;font-family:微软雅黑, Arial, HELVETICA;">\r\n	<div class="wrap-con" style="margin:0px;padding:0px;border:0px;vertical-align:baseline;background:transparent;">\r\n		<div class="mycon" style="margin:0px;padding:0px;border:0px;font-size:14px;vertical-align:baseline;background:transparent;">\r\n			<p style="vertical-align:baseline;background:transparent;">\r\n				拥有13年室内装饰设计经验，在广州上海等地设计机构主持设计工作多年。现任鑫大众装饰高级主任设计师。毕业于华中科技大学2003级建筑学专业。\r\n			</p>\r\n			<div>\r\n				<br />\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<div class="clear" style="margin:0px;padding:0px;border:0px;font-size:12px;vertical-align:baseline;background:#FFFFFF;color:#666666;font-family:微软雅黑, Arial, HELVETICA;">\r\n</div>', '华中科技大学', '福星惠誉福星城', '专业专注，引领生活。', 1495),
(2, 11, 13, '胡珍', 'photo/201703/20170331_EB102CE3B47583592031C8D82E280D41.jpg', '<span style="color:#666666;font-family:微软雅黑, Arial, HELVETICA;font-size:14px;background-color:#FFFFFF;">毕业于昆明理工大学环境艺术系，从事家装行业6年，以“遵循经济、实用、美观的原则，符合施工工艺，紧跟时代脉搏，创造更人性化、具有可行性的室内空间”设计宗旨服务客户。成功案例：万锦江城，同馨花园，外滩棕榈泉，奥山世纪城，广电江湾，保利香槟国际，碧海花园，长青国际，联发九都府，三金鑫城国际，水墨兰轩，水墨清华，育才家园，武铁佳苑，世茂龙湾，枫华锦都。‍‍</span>', '昆明理工大学', '万锦江城，同馨花园，外滩棕榈泉，奥山世纪城，广电江湾，保利香槟国际，碧海花园，长青国际，联发九都府，三金鑫城国际，水墨兰轩，水墨清华，育才家园，武铁佳苑，世茂龙湾，枫华锦都。‍', '艺术与技术的完美结合', 2723),
(3, 11, 13, '骆畅', 'photo/201703/20170331_E95B9D21A7069B139041FFE40E9F8569.jpg', '<div id="wrap730" style="margin:0px;padding:0px;border:0px;font-size:12px;vertical-align:baseline;background:#FFFFFF;color:#666666;font-family:微软雅黑, Arial, HELVETICA;">\r\n	<div class="wrap-con" style="margin:0px;padding:0px;border:0px;vertical-align:baseline;background:transparent;">\r\n		<div class="mycon" style="margin:0px;padding:0px;border:0px;font-size:14px;vertical-align:baseline;background:transparent;">\r\n			<p style="vertical-align:baseline;background:transparent;">\r\n				毕业于武汉科技大学，电脑与艺术设计，从事家装设计5年。擅长风格：后现代，现代简约，地中海，简约欧式，新古典。设计心语：用心做设计，把客户的家当成自己的家来设计，以最低的成本，做出最好的效果。\r\n			</p>\r\n			<div>\r\n				<br />\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>\r\n<div class="clear" style="margin:0px;padding:0px;border:0px;font-size:12px;vertical-align:baseline;background:#FFFFFF;color:#666666;font-family:微软雅黑, Arial, HELVETICA;">\r\n</div>', '武汉科技大学', '福星惠誉福星城', '没有做不出的，只有想不到的。', 2212),
(4, 11, 13, '邹茜', 'photo/201703/20170331_1BE9FAE01A03AA87DCF99C18DE697489.jpg', '<span style="color:#666666;font-family:微软雅黑, Arial, HELVETICA;font-size:14px;background-color:#FFFFFF;">中国住宅装饰中级注册设计师 2013年“品味空间”特邀设计师 2014年度武汉建筑装饰行业优秀设计师</span>', '武汉设计学院', '福星城、银湖翡翠、融科天城、中城国际、万景江城、复地东湖国际、奥林匹克花园、常青花园、百步亭现代城、汉口花园、绿地国际金融城', '“珍惜有限空间，品味无限创意”', 3180),
(5, 11, 13, '陈珊', 'photo/201703/20170331_22801FA682403E58D663C5A9B3ECF2C7.jpg', '<span style="color:#666666;font-family:微软雅黑, Arial, HELVETICA;font-size:14px;background-color:#FFFFFF;">毕业于湖北工业大学——环境艺术设计，从事家装行业九年，负责设计：融科天城，绿地国际金融城，万锦江城，葛洲坝城市广场，百步亭现代城，卧龙丽景湾~‍‍</span>', '湖北工业大学', '融科天城，绿地国际金融城，万锦江城，葛洲坝城市广场，百步亭现代城，卧龙丽景湾~‍‍', '最合适的设计就是最好的。', 2817),
(6, 11, 13, '徐燦', 'photo/201703/20170331_7BEECCFCB23C0BAEDBB9E05927C828D9.jpg', '<span style="color:#666666;font-family:微软雅黑, Arial, HELVETICA;font-size:14px;background-color:#FFFFFF;">‍‍‍‍武汉纺织大学，环境艺术系，从事家装行业11年，负责设计北京大成律师事务所（武汉），青岛嘉禾，沭阳嘉禾，麻城嘉禾，中国院子，F天下等案例‍</span>', '武汉纺织大学', '福星惠誉福星城', '设计来源予生活', 2812);

-- --------------------------------------------------------

--
-- 表的结构 `jh_designer_attr`
--

CREATE TABLE IF NOT EXISTS `jh_designer_attr` (
  `designer_id` smallint(8) unsigned NOT NULL,
  `attr_id` smallint(6) unsigned DEFAULT NULL,
  `attr_value_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`designer_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jh_designer_attr`
--

INSERT INTO `jh_designer_attr` (`designer_id`, `attr_id`, `attr_value_id`) VALUES
(1, 2, 11),
(2, 2, 10),
(3, 2, 10),
(6, 2, 10),
(4, 2, 10),
(5, 2, 10);

-- --------------------------------------------------------

--
-- 表的结构 `jh_designer_yuyue`
--

CREATE TABLE IF NOT EXISTS `jh_designer_yuyue` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_gz_comment`
--

CREATE TABLE IF NOT EXISTS `jh_gz_comment` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_links`
--

CREATE TABLE IF NOT EXISTS `jh_links` (
  `link_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '',
  `link` varchar(150) DEFAULT '',
  `logo` varchar(150) DEFAULT '',
  `desc` varchar(512) DEFAULT '',
  `audit` tinyint(1) DEFAULT '0',
  `closed` tinyint(1) DEFAULT '0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `jh_links`
--

INSERT INTO `jh_links` (`link_id`, `title`, `link`, `logo`, `desc`, `audit`, `closed`, `dateline`) VALUES
(1, '江湖家居', 'http://www.ijh.cc', '', '江湖家居', 1, 0, 1387787545),
(2, '江湖婚庆', 'http://www.ijh.cc', '', '', 0, 0, 1396590006);

-- --------------------------------------------------------

--
-- 表的结构 `jh_manager`
--

CREATE TABLE IF NOT EXISTS `jh_manager` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `jh_manager`
--

INSERT INTO `jh_manager` (`manager_id`, `cate_id`, `team_id`, `name`, `face_pic`, `intro`, `school`, `model_case`, `concept`, `views`) VALUES
(1, 16, 13, '阎老大', 'photo/201703/20170318_1D06EEF1F31EF21490226D9DE11E14CB.jpg', '<p class="reader-word-layer reader-word-s1-7">\r\n	为人朴实正直，有积极进取的心态，努力拼搏。性格沉稳内敛，做事细心踏实，个性坚韧，能吃苦耐劳，对工作有很强的责任感！有很强进取心和团队协作精神，学习能力、适应能力、承受压力能力较强，善于挑战自我。能够胜任今后的工作，并在实践中不断学习进步!我不认为我比其他人都强，但我有自信做到比其他人强。\r\n</p>\r\n<div>\r\n	<br />\r\n</div>', NULL, '福星城', '服务力就是我们的生命力', 0),
(2, 16, 13, '李天倚', 'photo/201703/20170318_6286904E4548200DFECB9C3D3A33DB10.jpg', '<span>为人朴实正直，有积极进取的心态，努力拼搏。性格沉稳内敛，做事细心踏实，个性坚韧，能吃苦耐劳，对工作有很强的责任感！有很强进取心和团队协作精神，学习能力、适应能力、承受压力能力较强，善于挑战自我。能够胜任今后的工作，并在实践中不断学习进步!我不认为我比其他人都强，</span><span>但我有自信做到比其他人强。</span>', NULL, '福星城', '服务里就是我们的生命力', 3),
(3, 16, 13, '陈天而', 'photo/201703/20170318_CC0172279B2CC2E233C237033CAFDFAD.jpg', '<span>为人朴实正直，有积极进取的心态，努力拼搏。性格沉稳内敛，做事细心踏实，个性坚韧，能吃苦耐劳，对工作有很强的责任感！有很强进取心和团队协作精神，学习能力、适应能力、承受压力能力较强，善于挑战自我。能够胜任今后的工作，并在实践中不断学习进步!我不认为我比其他人都强，</span><span>但我有自信做到比其他人强。</span>', NULL, '福星城', '服务力就就是我们的生命力', 11),
(4, 16, 13, '西天三', 'photo/201703/20170318_4541C1E010B88959964128DEC6BFE577.jpg', '<span>为人朴实正直，有积极进取的心态，努力拼搏。性格沉稳内敛，做事细心踏实，个性坚韧，能吃苦耐劳，对工作有很强的责任感！有很强进取心和团队协作精神，学习能力、适应能力、承受压力能力较强，善于挑战自我。能够胜任今后的工作，并在实践中不断学习进步!我不认为我比其他人都强，</span><span>但我有自信做到比其他人强。</span>', NULL, '福星城', '服务力就是我们的生命力', 0),
(5, 16, 13, '刘老四', 'photo/201703/20170318_AF9E0B82861FC3145D317DB5CEECD588.jpg', '<span>为人朴实正直，有积极进取的心态，努力拼搏。性格沉稳内敛，做事细心踏实，个性坚韧，能吃苦耐劳，对工作有很强的责任感！有很强进取心和团队协作精神，学习能力、适应能力、承受压力能力较强，善于挑战自我。能够胜任今后的工作，并在实践中不断学习进步!我不认为我比其他人都强，</span><span>但我有自信做到比其他人强。</span>', NULL, '福星城', '服务力就是我们的生命力', 17);

-- --------------------------------------------------------

--
-- 表的结构 `jh_manager_attr`
--

CREATE TABLE IF NOT EXISTS `jh_manager_attr` (
  `manager_id` smallint(8) unsigned NOT NULL,
  `attr_id` smallint(6) unsigned DEFAULT NULL,
  `attr_value_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`manager_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `jh_manager_yuyue`
--

CREATE TABLE IF NOT EXISTS `jh_manager_yuyue` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_product`
--

CREATE TABLE IF NOT EXISTS `jh_product` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_product_brand`
--

CREATE TABLE IF NOT EXISTS `jh_product_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_product_cate`
--

CREATE TABLE IF NOT EXISTS `jh_product_cate` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(64) DEFAULT NULL,
  `parent_id` smallint(5) DEFAULT '0',
  `orderby` smallint(5) DEFAULT '50',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_product_cate_maps`
--

CREATE TABLE IF NOT EXISTS `jh_product_cate_maps` (
  `cat_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  KEY `cat_id` (`cat_id`,`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `jh_product_yuyue`
--

CREATE TABLE IF NOT EXISTS `jh_product_yuyue` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_session`
--

CREATE TABLE IF NOT EXISTS `jh_session` (
  `SSID` char(35) NOT NULL,
  `uid` mediumint(8) DEFAULT '0',
  `city_id` mediumint(8) DEFAULT '0',
  `ip` char(15) DEFAULT '0.0.0.0',
  `data` varchar(1024) DEFAULT NULL,
  `lastupdate` int(10) DEFAULT '0',
  PRIMARY KEY (`SSID`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `jh_site`
--

CREATE TABLE IF NOT EXISTS `jh_site` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `jh_site`
--

INSERT INTO `jh_site` (`site_id`, `title`, `designer_id`, `manager_id`, `face_pic`, `addr`, `status`, `audit`, `intro`, `dateline`, `create_ip`, `views`, `mobile`) VALUES
(1, '福星惠誉福星城业主房屋装修', 4, 1, 'photo/201703/20170318_12AC62D275AD74A7DC8AC22B4A0DB50C.jpg', '常青路福星惠誉福星城', 5, 1, '福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修福星惠誉福星城业主房屋装修', 1489821287, '192.168.0.113', 0, '13971172755'),
(2, '一楼装修房屋装修', 4, 5, 'photo/201703/20170318_26BDBC651BE4769C28E993E8607F5BA5.jpg', '', 2, 1, '一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修一楼装修房屋装修', 1489821350, '192.168.0.113', 2, '13971172756'),
(3, '中式别墅业主装修房子了', 4, 5, 'photo/201703/20170318_C00C8E21A08C03BA2F1C72F40F0F46CD.jpg', '常青路复兴会了福利局哦了万劳动局1101号', 6, 1, '中式别墅业主装修房子了中式别墅业主装修房子了中式别墅业主装修房子了中式别墅业主装修房子了中式别墅业主装修房子了', 1489821406, '192.168.0.113', 1, '13971172757'),
(4, '完美的装修工地在线咔嚓', 4, 5, 'photo/201703/20170318_198BE2FAC69DF0D68AC65297F88CE366.jpg', '湖北武汉市江汉区119好', 3, 1, '完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓完美的装修工地在线咔嚓', 1489821484, '192.168.0.113', 1, '13971172758'),
(5, '最后一个装修工地在专修', 4, 5, 'photo/201703/20170318_08645D3013F8034B32733C0DAB342A7E.jpg', '汉口候车站后面', 7, 1, '最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修最后一个装修工地在专修', 1489821536, '192.168.0.113', 16, '13971172759');

-- --------------------------------------------------------

--
-- 表的结构 `jh_site_attr`
--

CREATE TABLE IF NOT EXISTS `jh_site_attr` (
  `site_id` mediumint(8) unsigned NOT NULL,
  `attr_id` smallint(6) unsigned DEFAULT NULL,
  `attr_value_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`site_id`,`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jh_site_attr`
--

INSERT INTO `jh_site_attr` (`site_id`, `attr_id`, `attr_value_id`) VALUES
(1, 5, 24),
(1, 4, 17),
(2, 4, 18),
(2, 5, 24),
(2, 6, 40),
(3, 5, 24),
(3, 4, 18),
(4, 4, 18),
(4, 5, 25),
(5, 4, 34),
(5, 5, 25);

-- --------------------------------------------------------

--
-- 表的结构 `jh_site_notes`
--

CREATE TABLE IF NOT EXISTS `jh_site_notes` (
  `notes_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` mediumint(8) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `content` text,
  `dateline` int(11) DEFAULT NULL,
  `create_ip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`notes_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `jh_site_notes`
--

INSERT INTO `jh_site_notes` (`notes_id`, `site_id`, `status`, `content`, `dateline`, `create_ip`) VALUES
(1, 5, 1, '开工了<span>开工了</span><span>开工了</span><span>开工了</span><span>开工了</span><span>开工了</span><span>开工了</span><span>开工了</span>', 1489821580, '192.168.0.113'),
(2, 5, 2, '水电改造了<span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><span>水电改造了</span><img src="/./attachs/photo/201703/20170318_B5523BAEBB1E99F718685341D9F9578D.jpg?PID22" alt="" />', 1489821612, '192.168.0.113'),
(3, 5, 7, '测试<span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span><span>测试</span>', 1489821634, '192.168.0.113'),
(4, 4, 3, '防辐射服是电风扇是', 1489822648, '192.168.0.113'),
(5, 3, 6, '日记日记日记<span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span><span>日记日记日记</span>', 1489822673, '192.168.0.113'),
(6, 2, 2, '该总在', 1489822715, '192.168.0.113'),
(7, 1, 5, '咋你这个阶段', 1489822735, '192.168.0.113');

-- --------------------------------------------------------

--
-- 表的结构 `jh_site_yuyue`
--

CREATE TABLE IF NOT EXISTS `jh_site_yuyue` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_sms_log`
--

CREATE TABLE IF NOT EXISTS `jh_sms_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(50) DEFAULT '',
  `content` varchar(255) DEFAULT '',
  `sms` varchar(20) DEFAULT '',
  `status` tinyint(1) DEFAULT '0',
  `clientip` char(15) DEFAULT '',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `jh_sms_log`
--

INSERT INTO `jh_sms_log` (`log_id`, `mobile`, `content`, `sms`, `status`, `clientip`, `dateline`) VALUES
(1, '13325698562', '尊敬的456,您的手机号13325698562于2017-03-29 14:30:24在鑫大众装饰申请了装修服务！稍后客服将会联系您确认需求！【鑫大众装饰】', '56dx', 0, '127.0.0.1', 1490769024);

-- --------------------------------------------------------

--
-- 表的结构 `jh_supplier`
--

CREATE TABLE IF NOT EXISTS `jh_supplier` (
  `supplier_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(128) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `position` varchar(32) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `addr` varchar(128) DEFAULT NULL,
  `product` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_system_config`
--

CREATE TABLE IF NOT EXISTS `jh_system_config` (
  `k` varchar(30) NOT NULL,
  `v` mediumtext,
  `title` varchar(30) DEFAULT '',
  `dateline` int(10) DEFAULT NULL,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `jh_system_config`
--

INSERT INTO `jh_system_config` (`k`, `v`, `title`, `dateline`) VALUES
('attach', 'a:16:{s:3:"dir";s:9:"./attachs";s:3:"url";s:9:"./attachs";s:10:"allow_exts";s:16:"jpg,gif,png,jpeg";s:10:"allow_size";s:4:"2048";s:13:"watermarktype";s:0:"";s:13:"watermarktext";a:4:{s:4:"font";s:8:"cyzt.ttf";s:4:"size";s:2:"14";s:5:"color";s:7:"#000000";s:4:"text";s:7:"@{name}";}s:15:"watermarkstatus";s:1:"9";s:16:"watermarkquality";s:2:"90";s:12:"thumbquality";s:2:"90";s:5:"thumb";s:3:"200";s:9:"casephoto";a:3:{s:5:"photo";s:4:"1200";s:5:"thumb";s:7:"390X310";s:5:"small";s:7:"200X200";}s:4:"team";a:2:{s:5:"thumb";s:7:"300X400";s:5:"small";s:7:"200X200";}s:4:"tuan";a:2:{s:5:"thumb";s:7:"300X400";s:5:"small";s:7:"210X280";}s:4:"site";a:1:{s:5:"photo";s:7:"350X280";}s:7:"product";a:1:{s:5:"photo";s:3:"200";}s:6:"editor";a:2:{s:5:"photo";s:4:"1366";s:5:"thumb";s:3:"200";}}', '附件设置', 1491020731),
('config', 'a:2:{s:4:"hash";s:8360:"6956424F5277304B47676F414141414E535568455567414141483041414141744341594141414344446D545341414141475852465748525462325A30643246795A5142425A4739695A53424A6257466E5A564A6C5957523563636C6C5041414141794270564668305745314D4F6D4E76625335685A4739695A53353462584141414141414144772F654842685932746C644342695A576470626A30693737752F496942705A443069567A564E4D4531775132566F61556836636D5654656B355559337072597A6C6B496A382B494478344F6E68746347316C6447456765473173626E4D366544306959575276596D5536626E4D366257563059533869494867366547317764477339496B466B62324A6C4946684E5543424462334A6C494455754D43316A4D445977494459784C6A457A4E4463334E7977674D6A41784D4338774D6938784D6930784E7A6F7A4D6A6F774D4341674943416749434167496A346750484A6B5A6A70535245596765473173626E4D36636D526D50534A6F644852774F693876643364334C6E637A4C6D39795A7938784F546B354C7A41794C7A49794C584A6B5A69317A6557353059586774626E4D6A496A346750484A6B5A6A70455A584E6A636D6C7764476C76626942795A47593659574A76645851394969496765473173626E4D366547317750534A6F644852774F693876626E4D7559575276596D5575593239744C336868634338784C6A41764969423462577875637A70346258424E545430696148523063446F764C32357A4C6D466B62324A6C4C6D4E7662533934595841764D5334774C3231744C79496765473173626E4D36633352535A575939496D6830644841364C793975637935685A4739695A53356A62323076654746774C7A45754D43397A56486C775A5339535A584E7664584A6A5A564A6C5A694D694948687463447044636D566864473979564739766244306951575276596D5567554768766447397A6147397749454E544E5342586157356B6233647A496942346258424E5454704A626E4E305957356A5A556C4550534A346258417561576C6B4F6B55334D3055784E5459354D4449314D7A457852544D344D554933516A46475154597A4D304E474E54597A496942346258424E5454704562324E316257567564456C4550534A34625841755A476C6B4F6B55334D3055784E545A424D4449314D7A457852544D344D554933516A46475154597A4D304E474E54597A496A3467504868746345314E4F6B526C636D6C325A575247636D397449484E30556D566D4F6D6C7563335268626D4E6C53555139496E687463433570615751365254637A525445314E6A63774D6A557A4D5446464D7A6778516A64434D555A424E6A4D7A513059314E6A4D6949484E30556D566D4F6D5276593356745A57353053555139496E68746343356B615751365254637A525445314E6A67774D6A557A4D5446464D7A6778516A64434D555A424E6A4D7A513059314E6A4D694C7A3467504339795A4759365247567A59334A70634852706232342B49447776636D526D4F6C4A45526A3467504339344F6E68746347316C6447452B4944772F654842685932746C6443426C626D5139496E4969507A3637555966634141414973306C455156523432757963435778555652534737394253704341574B6367715167566B4559774C6771675246526663514E77696F6B614A476F4F4345414B4B454E53344C776949714B43345339474943305A6C55304645525648454254634552634343624E307330426E50795879547555376554476435725A33704F386B665A715A33376E74392F7A336E2F4F666357337942514D4234567265736E766349504E493971774F5737665468707930364C704A2F7567744B424B483466364267676D424F457466704C356774714C546D79784E4D45647A482B317A42564D4641727175574A64677347437A34323658662B5148426C594C6476506478543663497471517A6D58324B316964504F6F53336376673850386E37306539316450693870665736767143396F4858456D4F61434269343946795734726541515946754475754C7030634C376E69696637302F794F6E756A6646345A4D66632B687A4737557268757041556972686B7966355450367854705070657645306A524F394D3566576F61797947534A4B4B686369496963564E425A794B692B7A6E64737971745144444D656E34484343714961493073687970414F3477426D6C71755A6B777246725366434A654E686A466F69387346707775755A5137564F6A634A7A6955715855737139494F66304530653664566B536C4B7834414C4262344C56676D50514A4F3944666E394536445245714936355158417933766F59337277586B56784247744D46385A54674C6347744546384D3259634C68677132436B594B31676932735A412B396B69765874744346644F485A2F6763336A684F734A44586C776B32436A62786E666459454630456379464E506251584663564D5153454C5142665348337A6E43464A45415A4867524261514C6F345A6771386850653677373547656E4A306D6D43676F6F3953635473376542664768614B4135654A35674F4A4667752B424651536D457170587A37317242523959312B754C397A374D414E4C5350596E354E4854634B7A684A305A66772F48756E56613430463751526E514C6147315256346279346575524E767635586E6E45756531716A776854565845367350596C734A65587768704A636A695064772F517036437A7572714A4138306C32796475545338594B444254305156354E3570714671705A6D675348437334485842434D4751434E49445553716364594950436576614E376D436E6F55756F70645A57453879626F6B6C4944335371386D576B713956694E30702B453777454747335067547551356A5651316D586F514F614A4341575A3050305145546934344B4C5341586C7A4E553030624C59497A303557774D47556A6239535A342F694964665A676D725279444A494D4B557141666A764D346F7776347977537242766554362B6F542F3639415242703251556E5047733672744A4254336C3552515778427068586A34554A523371655667787A4457746C416E30422F78755771464671687A5031476C6B516E7646655251447437442B4E784D496A3151432B63376E5470374A74366D684A354E6E6A3059676155352F427A4272337A6E65484C384E31616E7271455645587A776B516668756C665267667A7649304963537268767866632B45587A5039373253725970636D597070447531484C746664794A6155583770622B424C50564A73793879476E495648675849685A5338672F6A43695154376C316965426F76486B444B554A562B6C6551337078726170672F4370337743796B6A4951644F42394C56632B36694A4D6C4B5952342F586E35696976657A682F745251716579434A5338682F464B62636B6542346B5863392B6643546F4A6E6F5845504479336B6B553446652F4F73577075726345585543573853636374744F6855775539423155394135622B61536151334A6F54574671753069486D47686F7432335971744D51735164666C34614448452F5955487678584864565A796A5A416D4B4C49453233693067597249735A527432377A775876326D2F66546C4D58362B472F7961355078626F337865616932457A53416838306833787A547474454773395351482B2F432B5A6554666B67546E31507A666D547A666C66546B4939392F79707756796478734F704475783674533356635057436F3478385837302F7738686B35625163546341547A324D334C77736A6A6E624D2B633535746739363965784A792F6D324158376C4772423542527043766877784651716478764A62684E634B5A4C3936596B7A7A4C42625653316E386E6E4A64787244387137515361344933647A48494A4C782B6E57367047385830325673426552714C582B71594A7271434B4757794976593067764A357756755454664D4A666D3055375A45784375432F4A75453978523232434E30584B744E2B57636B6A6B643062637978694A365774414E62353473654463697636757748574343323746643642634D5355513770454E7A7875336A556765344E4D38497646684C726B6D51734D46687758364556796F706568687A5A49773578304C344473624E635242304A66514164477456643968363862706A4A70466547303037613166772B6732384C5A62394948694E31307071573463783355674461724F5A4E35597449712B7261542F2B6C4E6F57336E305A527271325634394149377874346A744A4F34327846535A38357436327755534362656943654777636A5A31792B675731697653444D6F7A30546B544A55506B556A315656552F65306F734B33636336354869526B4E5258656D325559366145393742304F6554775A613244432B2B786254666730544C5659545A462B574977794B74314D6857432B31554E77347738783871786F754C2B3666344761494C304A3559715437557044306A556E6C3771735638704E2B49436B79515453727A6242566D4B6B3653624539326C49656F4377486C7251725632596334384A2F796D5A6274446B70697670326F3638586E4248464D476F4175547A4E4D3370577932437569547776577A6746423143352B50316F455337424B71696248697339332B51376D4F46366731664B486A424250764E655648477A7A644A37424456456C744F616455306766705939396631464B73656F476A7638504F6C704137645A446B687A6A6E314C487768356542464E5647797153635070337A52666439474E42303649647761782F6975486A61596C51626B617175314F7753764E2B476A567039547170316E676D31645863437234346836326A50586B374F5448635973354764484D3361523566314F316F5A783274545263335172616F4A304C544F754D73486563694B6D44334253476E693552693039665871704352353348686E7859505641596A385450707173326D56646C416734326F6F494C31716177445956682F634C586A48424C567074757478676E413948364C314E685042396647392B545A44754E346B664D7452636549734A62694C556468764751382B69524E4E652B306F54507257716E71363938686D51744A685157326A436634335346636359514370645243694F5A7270686F7A747A453069522B6C722F4975596436376F614366516B55562F65617871646D3867766C6831446F6361725A4F4E644942712B376A54526435685376556171696A7A534F70762F6E736C7235694441394C6855475637664159386537544458667367627A2F6859707566766444763564753768627542552F6378454B42733353473855682F4372536A4671324E6B4F79664D67665763566F6A4972536A5045546348704E466557772B63616A6654736575692F4B666B71536A4E704C6C36764278354F516F5346446C4C6F6D6267503850444663524165656D355447542B492B5871623843455131526136632F63323139336E46756D62574E6E466C68646F54567269554B2B57574D304B502B383349745A556B61364B73776E6A5A373479457A356B4744704F3747626E626A6371655A655663774D4F6E62416C654A76757076316F676E766830577744595675397552574C794D647A325779534F39623048564165576C7233716F35545A4649347975337A2F765041756D666566727048756D6365365A356C705030727741444766685A7833374E41374141414141424A52553545726B4A6767673D3D";s:4:"host";s:132:"687474703A2F2F77777725732E696A682E63632F696E6465782E7068703F63746C3D6C697374656E26686F73743D2573266B65793D25732676657273696F6E3D2573";}', '系统设置', NULL),
('mail', 'a:4:{s:6:"sender";s:15:"shzhrui@126.com";s:4:"mode";s:4:"mail";s:4:"smtp";a:4:{s:4:"host";s:0:"";s:4:"port";s:0:"";s:5:"uname";s:0:"";s:6:"passwd";s:0:"";}s:5:"email";s:16:"330680860@qq.com";}', '邮件设置', 1389170720),
('sms', 'a:5:{s:5:"comid";s:4:"1345";s:9:"smsnumber";s:5:"10690";s:5:"uname";s:6:"test15";s:6:"passwd";s:6:"151515";s:6:"mobile";s:11:"18905691229";}', '短信设置', 1419213199),
('site_config', 'a:2:{s:4:"hash";s:8360:"6956424F5277304B47676F414141414E535568455567414141483041414141744341594141414344446D545341414141475852465748525462325A30643246795A5142425A4739695A53424A6257466E5A564A6C5957523563636C6C5041414141794270564668305745314D4F6D4E76625335685A4739695A53353462584141414141414144772F654842685932746C644342695A576470626A30693737752F496942705A443069567A564E4D4531775132566F61556836636D5654656B355559337072597A6C6B496A382B494478344F6E68746347316C6447456765473173626E4D366544306959575276596D5536626E4D366257563059533869494867366547317764477339496B466B62324A6C4946684E5543424462334A6C494455754D43316A4D445977494459784C6A457A4E4463334E7977674D6A41784D4338774D6938784D6930784E7A6F7A4D6A6F774D4341674943416749434167496A346750484A6B5A6A70535245596765473173626E4D36636D526D50534A6F644852774F693876643364334C6E637A4C6D39795A7938784F546B354C7A41794C7A49794C584A6B5A69317A6557353059586774626E4D6A496A346750484A6B5A6A70455A584E6A636D6C7764476C76626942795A47593659574A76645851394969496765473173626E4D366547317750534A6F644852774F693876626E4D7559575276596D5575593239744C336868634338784C6A41764969423462577875637A70346258424E545430696148523063446F764C32357A4C6D466B62324A6C4C6D4E7662533934595841764D5334774C3231744C79496765473173626E4D36633352535A575939496D6830644841364C793975637935685A4739695A53356A62323076654746774C7A45754D43397A56486C775A5339535A584E7664584A6A5A564A6C5A694D694948687463447044636D566864473979564739766244306951575276596D5567554768766447397A6147397749454E544E5342586157356B6233647A496942346258424E5454704A626E4E305957356A5A556C4550534A346258417561576C6B4F6B55334D3055784E5459354D4449314D7A457852544D344D554933516A46475154597A4D304E474E54597A496942346258424E5454704562324E316257567564456C4550534A34625841755A476C6B4F6B55334D3055784E545A424D4449314D7A457852544D344D554933516A46475154597A4D304E474E54597A496A3467504868746345314E4F6B526C636D6C325A575247636D397449484E30556D566D4F6D6C7563335268626D4E6C53555139496E687463433570615751365254637A525445314E6A63774D6A557A4D5446464D7A6778516A64434D555A424E6A4D7A513059314E6A4D6949484E30556D566D4F6D5276593356745A57353053555139496E68746343356B615751365254637A525445314E6A67774D6A557A4D5446464D7A6778516A64434D555A424E6A4D7A513059314E6A4D694C7A3467504339795A4759365247567A59334A70634852706232342B49447776636D526D4F6C4A45526A3467504339344F6E68746347316C6447452B4944772F654842685932746C6443426C626D5139496E4969507A3637555966634141414973306C455156523432757963435778555652534737394253704341574B6367715167566B4559774C6771675246526663514E77696F6B614A476F4F4345414B4B454E53344C776949714B43345339474943305A6C55304645525648454254634552634343624E307330426E50795879547555376554476435725A33704F386B665A715A33376E74392F7A336E2F4F666357337942514D4234567265736E766349504E493971774F5737665468707930364C704A2F7567744B424B483466364267676D424F457466704C356774714C546D79784E4D45647A482B317A42564D4641727175574A64677347437A34323658662B5148426C594C6476506478543663497471517A6D58324B316964504F6F53336376673850386E37306539316450693870665736767143396F4858456D4F61434269343946795734726541515946754475754C7030634C376E69696637302F794F6E756A6646345A4D66632B687A4737557268757041556972686B7966355450367854705070657645306A524F394D3566576F61797947534A4B4B686369496963564E425A794B692B7A6E64737971745144444D656E34484343714961493073687970414F3477426D6C71755A6B777246725366434A654E686A466F69387346707775755A5137564F6A634A7A6955715855737139494F66304530653664566B536C4B7834414C4262344C56676D50514A4F3944666E394536445245714936355158417933766F59337277586B56784247744D46385A54674C6347744546384D3259634C68677132436B594B31676932735A412B396B69765874744346644F485A2F6763336A684F734A44586C776B32436A62786E666459454630456379464E506251584663564D5153454C5142665348337A6E43464A45415A4867524261514C6F345A6771386850653677373547656E4A306D6D43676F6F3953635473376542664768614B4135654A35674F4A4667752B424651536D457170587A37317242523959312B754C397A374D414E4C5350596E354E4854634B7A684A305A66772F48756E56613430463751526E514C6147315256346279346575524E767635586E6E45756531716A776854565845367350596C734A65587768704A636A695064772F517036437A7572714A4138306C32796475545338594B444254305156354E3570714671705A6D675348437334485842434D4751434E49445553716364594950436576614E376D436E6F55756F70645A57453879626F6B6C4944335371386D576B713956694E30702B453777454747335067547551356A5651316D586F514F614A4341575A3050305145546934344B4C5341586C7A4E553030624C59497A303557774D47556A6239535A342F694964665A676D725279444A494D4B557141666A764D346F7776347977537242766554362B6F542F3639415242703251556E5047733672744A4254336C3552515778427068586A34554A523371655667787A4457746C416E30422F78755771464671687A5031476C6B516E7646655251447437442B4E784D496A3151432B63376E5470374A74366D684A354E6E6A3059676155352F427A4272337A6E65484C384E31616E7271455645587A776B516668756C665267667A7649304963537268767866632B45587A5039373253725970636D597070447531484C746664794A6155583770622B424C50564A73793879476E495648675849685A5338672F6A43695154376C316965426F76486B444B554A562B6C6551337078726170672F4370337743796B6A4951644F42394C56632B36694A4D6C4B5952342F586E35696976657A682F745251716579434A5338682F464B62636B6542346B5863392B6643546F4A6E6F5845504479336B6B553446652F4F73577075726345585543573853636374744F6855775539423155394135622B61536151334A6F54574671753069486D47686F7432335971744D51735164666C34614448452F5955487678584864565A796A5A416D4B4C49453233693067597249735A527432377A775876326D2F66546C4D58362B472F7961355078626F337865616932457A53416838306833787A547474454773395351482B2F432B5A6554666B67546E31507A666D547A666C66546B4939392F79707756796478734F704475783674533356635057436F3478385837302F7738686B35625163546341547A324D334C77736A6A6E624D2B633535746739363965784A792F6D324158376C4772423542527043766877784651716478764A62684E634B5A4C3936596B7A7A4C42625653316E386E6E4A64787244387137515361344933647A48494A4C782B6E57367047385830325673426552714C582B71594A7271434B4757794976593067764A357756755454664D4A666D3055375A45784375432F4A75453978523232434E30584B744E2B57636B6A6B643062637978694A365774414E62353473654463697636757748574343323746643642634D5355513770454E7A7875336A556765344E4D38497646684C726B6D51734D46687758364556796F706568687A5A49773578304C344473624E635242304A66514164477456643968363862706A4A70466547303037613166772B6732384C5A62394948694E31307071573463783355674461724F5A4E35597449712B7261542F2B6C4E6F57336E305A527271325634394149377874346A744A4F34327846535A38357436327755534362656943654777636A5A31792B675731697653444D6F7A30546B544A55506B556A315656552F65306F734B33636336354869526B4E5258656D325559366145393742304F6554775A613244432B2B786254666730544C5659545A462B574977794B74314D6857432B31554E77347738783871786F754C2B3666344761494C304A3559715437557044306A556E6C3771735638704E2B49436B79515453727A6242566D4B6B3653624539326C49656F4377486C7251725632596334384A2F796D5A6274446B70697670326F3638586E4248464D476F4175547A4E4D3370577932437569547776577A6746423143352B50316F455337424B71696248697339332B51376D4F46366731664B486A424250764E655648477A7A644A37424456456C744F616455306766705939396631464B73656F476A7638504F6C704137645A446B687A6A6E314C487768356542464E5647797153635070337A52666439474E42303649647761782F6975486A61596C51626B617175314F7753764E2B476A567039547170316E676D31645863437234346836326A50586B374F5448635973354764484D3361523566314F316F5A783274545263335172616F4A304C544F754D73486563694B6D44334253476E693552693039665871704352353348686E7859505641596A385450707173326D56646C416734326F6F494C31716177445956682F634C586A48424C567074757478676E413948364C314E685042396647392B545A44754E346B664D7452636549734A62694C556468764751382B69524E4E652B306F54507257716E71363938686D51744A685157326A436634335346636359514370645243694F5A7270686F7A747A453069522B6C722F4975596436376F614366516B55562F65617871646D3867766C6831446F6361725A4F4E644942712B376A54526435685376556171696A7A534F70762F6E736C7235694441394C6855475637664159386537544458667367627A2F6859707566766444763564753768627542552F6378454B42733353473855682F4372536A4671324E6B4F79664D67665763566F6A4972536A5045546348704E466557772B63616A6654736575692F4B666B71536A4E704C6C36764278354F516F5346446C4C6F6D6267503850444663524165656D355447542B492B5871623843455131526136632F63323139336E46756D62574E6E466C68646F54567269554B2B57574D304B502B383349745A556B61364B73776E6A5A373479457A356B4744704F3747626E626A6371655A655663774D4F6E62416C654A76757076316F676E766830577744595675397552574C794D647A325779534F39623048564165576C7233716F35545A4649347975337A2F765041756D666566727048756D6365365A356C705030727741444766685A7833374E41374141414141424A52553545726B4A6767673D3D";s:4:"host";s:114:"687474703A2F2F7777772E696A682E63632F696E6465782E7068703F63746C3D6D6F6E69746F72696E6726686F73743D2573266B65793D2573";}', '配置设置', 1389324222),
('site', 'a:17:{s:5:"title";s:15:"鑫大众装饰";s:7:"siteurl";s:20:"http://192.168.0.101";s:4:"logo";s:58:"photo/201703/20170325_ECC1D1E99DEAAF5958FCD00E1A2CE8F9.png";s:6:"weixin";s:58:"photo/201703/20170324_8D67255419D55A346B23D182157C6320.jpg";s:6:"shouji";s:58:"photo/201703/20170324_EEC3DF8B3FD867D8063D7A5722B36695.png";s:7:"android";s:1:"#";s:3:"ios";s:1:"#";s:4:"mail";s:15:"ijianghu@qq.com";s:4:"kfqq";s:8:"18012219";s:5:"phone";s:12:"027-87011088";s:9:"cellphone";s:12:"139-71172755";s:4:"addr";s:52:"武汉市江岸区二七路航天双城A座1405-1407";s:6:"mobile";s:1:"1";s:7:"rewrite";s:1:"0";s:6:"tongji";s:0:"";s:7:"jianjie";s:0:"";s:3:"icp";s:14:"备案号00000";}', '配置设置', 1490686146),
('mobile', 'a:3:{s:5:"title";s:36:"江湖装企营销网系统手机版";s:3:"url";s:14:"http://m.zx.cc";s:7:"forward";s:1:"1";}', '3G版设置', 1490842469),
('access', 'a:7:{s:6:"denyip";s:17:"127.0.0.9\r\n8.20.*";s:12:"mobile_count";s:1:"2";s:11:"mobile_time";s:1:"0";s:13:"tenders_count";s:2:"20";s:12:"tenders_time";s:1:"0";s:6:"closed";s:1:"0";s:13:"closed_reason";s:25:"网站正在升级中....";}', '访问控制', 1490773848);

-- --------------------------------------------------------

--
-- 表的结构 `jh_system_logs`
--

CREATE TABLE IF NOT EXISTS `jh_system_logs` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(30) DEFAULT '',
  `action` varchar(50) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `content` mediumtext,
  `dateline` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_system_module`
--

CREATE TABLE IF NOT EXISTS `jh_system_module` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1095 ;

--
-- 转存表中的数据 `jh_system_module`
--

INSERT INTO `jh_system_module` (`mod_id`, `module`, `level`, `ctl`, `act`, `title`, `visible`, `parent_id`, `orderby`, `dateline`) VALUES
(1, 'top', 1, '', '', '设置', 1, 0, 10, 1356434427),
(601, 'top', 1, '', '', '系统', 1, 0, 9, 1383820332),
(5, 'top', 1, '', '', '运营', 1, 0, 60, 1356434427),
(6, 'menu', 2, '', '', '权限管理', 1, 601, 20, 1356434427),
(7, 'menu', 2, '', '', '模块管理', 1, 601, 30, 1356434427),
(8, 'module', 3, 'module/menu', 'index', '导航菜单管理', 1, 7, 1, 1356434427),
(9, 'module', 3, 'module/ctl', 'index', '控制模型管理', 1, 7, 11, 1356434427),
(26, 'module', 3, 'module/menu', 'create', '添加导航菜单', 0, 7, 2, 1356434427),
(27, 'module', 3, 'module/menu', 'save', '保存导航菜单', 0, 7, 6, 1356434427),
(28, 'module', 3, 'module/menu', 'edit', '编辑导航菜单', 0, 7, 3, 1356434427),
(32, 'module', 3, 'module/ctl', 'save', '保存控制模块', 0, 7, 14, 1356434427),
(31, 'module', 3, 'module/ctl', 'batch', '指量添加控制模块', 0, 7, 13, 1356434427),
(33, 'module', 3, 'module/ctl', 'detail', '管理控制模型', 0, 7, 12, 1356434427),
(35, 'module', 3, 'module/menu', 'update', '更新导航菜单', 0, 7, 4, 1356434427),
(37, 'module', 3, 'module/ctl', 'remove', '删除控制模块', 0, 7, 15, 1356434427),
(44, 'module', 3, 'module/menu', 'remove', '删除导航菜单', 0, 7, 5, 1356437401),
(48, 'module', 3, 'admin/role', 'index', '角色管理', 1, 6, 1, 1356437591),
(49, 'module', 3, 'admin/admin', 'index', '管理员管理', 1, 6, 2, 1356437975),
(50, 'module', 3, 'admin/role', 'create', '创建角色', 0, 6, 50, 1356437975),
(51, 'module', 3, 'admin/role', 'detail', '管理角色', 0, 6, 50, 1356437975),
(52, 'module', 3, 'admin/role', 'save', '保存角色', 0, 6, 50, 1356437975),
(53, 'module', 3, 'admin/role', 'delete', '删除角色', 0, 6, 50, 1356437975),
(54, 'module', 3, 'admin/admin', 'create', '创建管理员', 0, 6, 50, 1356437975),
(55, 'module', 3, 'admin/admin', 'edit', '修改管理员', 0, 6, 50, 1356437975),
(56, 'module', 3, 'admin/admin', 'save', '保存管理员', 0, 6, 50, 1356437975),
(57, 'module', 3, 'admin/admin', 'delete', '删除管理员', 0, 6, 50, 1356437975),
(1057, 'module', 3, 'decorate/package', 'so', '搜索套餐', 0, 1051, 50, 1398251469),
(127, 'top', 1, '', '', '工具', 1, 0, 70, 1357609135),
(68, 'menu', 2, '', '', '广告管理', 1, 5, 30, 1356513698),
(979, 'module', 3, 'tenders/tenders', 'delete', '删除申请', 0, 970, 50, 1394274094),
(949, 'module', 3, 'case/case', 'detail', '案例图片', 0, 941, 50, 1394176905),
(950, 'module', 3, 'case/photo', 'upload', '上传图片', 0, 941, 50, 1394176905),
(85, 'menu', 2, '', '', '文章管理', 1, 928, 20, 1356600322),
(344, 'module', 3, 'article/cate', 'create', '添加分类', 0, 85, 21, 1372153529),
(338, 'module', 3, 'article/article', 'index', '文章列表', 1, 85, 10, 1372087400),
(339, 'module', 3, 'article/article', 'so', '搜索文章', 0, 85, 11, 1372087400),
(340, 'module', 3, 'article/article', 'create', '添加文章', 1, 85, 12, 1372087400),
(341, 'module', 3, 'article/article', 'edit', '修改文章', 0, 85, 13, 1372087400),
(953, 'module', 3, 'case/comment', 'index', '案例评论', 1, 941, 50, 1394176905),
(954, 'module', 3, 'case/comment', 'create', '新增评论', 0, 941, 50, 1394176905),
(955, 'module', 3, 'case/comment', 'edit', '修改评论', 0, 941, 50, 1394176905),
(956, 'module', 3, 'case/comment', 'delete', '删除评论', 0, 941, 50, 1394176905),
(113, 'module', 3, 'adv/adv', 'index', '广告位管理', 1, 68, 50, 1357460157),
(114, 'module', 3, 'adv/adv', 'detail', '管理广告位', 0, 68, 50, 1357460260),
(115, 'module', 3, 'adv/adv', 'edit', '编辑广告位', 0, 68, 50, 1357460260),
(116, 'module', 3, 'adv/adv', 'create', '创建广告位', 1, 68, 50, 1357460260),
(117, 'module', 3, 'adv/adv', 'delete', '删除广告位', 0, 68, 50, 1357460260),
(119, 'module', 3, 'adv/item', 'create', '添加广告', 0, 68, 50, 1357460574),
(120, 'module', 3, 'adv/item', 'edit', '修改广告', 0, 68, 50, 1357460574),
(386, 'module', 3, 'system/config', 'site', '基本设置', 1, 269, 1, 1372869314),
(122, 'module', 3, 'adv/item', 'delete', '删除广告', 0, 68, 50, 1357460574),
(123, 'module', 3, 'adv/adv', 'update', '更新广告位', 0, 68, 50, 1357462189),
(124, 'module', 3, 'adv/item', 'update', '更新广告内容', 0, 68, 50, 1357463273),
(345, 'module', 3, 'article/comment', 'index', '评论列表', 1, 85, 50, 1372154080),
(342, 'module', 3, 'article/article', 'delete', '删除文章', 0, 85, 14, 1372087400),
(951, 'module', 3, 'case/photo', 'delete', '删除图片', 0, 941, 50, 1394176905),
(952, 'module', 3, 'case/photo', 'update', '更新图片', 0, 941, 50, 1394176905),
(346, 'module', 3, 'article/comment', 'create', '添加评论', 0, 85, 50, 1372154613),
(347, 'module', 3, 'article/comment', 'edit', '修改评论', 0, 85, 50, 1372154613),
(348, 'module', 3, 'article/comment', 'delete', '删除评论', 0, 85, 50, 1372154613),
(244, 'menu', 2, '', '', '站长工具', 1, 127, 52, 1366388132),
(245, 'module', 3, 'tools/cache', 'clean', '清空缓存', 1, 244, 50, 1366388194),
(1066, 'module', 3, 'activity/lanmu', 'edit', '编辑栏目', 0, 991, 50, 1398332770),
(1065, 'module', 3, 'activity/lanmu', 'create', '新增栏目', 0, 991, 50, 1398332770),
(1064, 'module', 3, 'activity/lanmu', 'index', '活动栏目', 0, 991, 50, 1398332770),
(1063, 'module', 3, 'activity/activity', 'doaudit', '审核活动', 0, 991, 50, 1398332470),
(269, 'menu', 2, '', '', '网站设置', 1, 1, 1, 1370085075),
(279, 'menu', 2, '', '', '数据库管理', 1, 127, 50, 1371537222),
(478, 'module', 3, 'article/about', 'delete', '删除内容', 0, 473, 50, 1375413188),
(477, 'module', 3, 'article/about', 'edit', '修改内容', 0, 473, 50, 1375413188),
(476, 'module', 3, 'article/about', 'create', '添加内容', 0, 473, 50, 1375413188),
(475, 'module', 3, 'article/about', 'so', '搜索内容', 1, 473, 50, 1375413188),
(580, 'module', 3, 'data/attr', 'deletefrom', '删除分类', 0, 325, 8, 1383357607),
(579, 'module', 3, 'data/attr', 'editfrom', '修改分类', 0, 325, 7, 1383357607),
(578, 'module', 3, 'data/attr', 'createfrom', '添加分类', 0, 325, 6, 1383357607),
(577, 'module', 3, 'data/attr', 'attrfrom', '属性分类', 1, 325, 5, 1383357607),
(474, 'module', 3, 'article/about', 'index', '内容列表', 1, 473, 50, 1375413188),
(473, 'menu', 2, '', '', '关于我们', 1, 928, 40, 1375412919),
(472, 'menu', 2, '', '', '帮助中心', 1, 928, 30, 1375412896),
(325, 'menu', 2, '', '', '属性管理', 1, 1, 4, 1372043122),
(326, 'module', 3, 'data/attr', 'index', '属性列表', 1, 325, 10, 1372043187),
(327, 'module', 3, 'data/attr', 'create', '添加属性', 1, 325, 12, 1372043187),
(328, 'module', 3, 'data/attr', 'update', '更新属性', 0, 325, 13, 1372043187),
(329, 'module', 3, 'data/attr', 'delete', '删除属性', 0, 325, 14, 1372043187),
(330, 'module', 3, 'data/attr', 'detail', '管理属性', 0, 325, 15, 1372053817),
(331, 'module', 3, 'data/attr', 'updatevalue', '更新选项', 0, 325, 16, 1372053880),
(332, 'module', 3, 'data/attr', 'delvalue', '删除选项', 0, 325, 17, 1372053880),
(333, 'module', 3, 'article/cate', 'index', '分类列表', 1, 933, 20, 1372065450),
(335, 'module', 3, 'article/cate', 'edit', '编辑分类', 0, 933, 22, 1372065450),
(336, 'module', 3, 'article/cate', 'delete', '删除分类', 0, 933, 23, 1372065450),
(337, 'module', 3, 'article/cate', 'update', '更新分类', 0, 933, 24, 1372065450),
(349, 'module', 3, 'article/comment', 'so', '搜索评论', 0, 85, 50, 1372154635),
(586, 'module', 3, 'article/article', 'dialog', '选择文章', 0, 85, 25, 1383553687),
(569, 'module', 3, 'article/link', 'update', '更新标签', 0, 85, 50, 1383104861),
(568, 'module', 3, 'article/link', 'delete', '删除标签', 0, 85, 50, 1383104861),
(566, 'module', 3, 'article/link', 'create', '添加标签', 0, 85, 50, 1383104861),
(567, 'module', 3, 'article/link', 'edit', '修改标签', 0, 85, 50, 1383104861),
(1056, 'module', 3, 'decorate/package', 'delete', '删除套餐', 0, 1051, 50, 1398251469),
(1055, 'module', 3, 'decorate/package', 'edit', '修改套餐', 0, 1051, 50, 1398251469),
(1051, 'menu', 2, '', '', '装修套餐', 1, 1025, 50, 1398250133),
(1052, 'menu', 2, '', '', '套装报名', 1, 1025, 50, 1398250143),
(1053, 'module', 3, 'decorate/package', 'index', '套餐管理', 1, 1051, 50, 1398251469),
(1054, 'module', 3, 'decorate/package', 'create', '新增套餐', 1, 1051, 40, 1398251469),
(1041, 'menu', 2, '', '', '团装报名', 1, 1025, 50, 1397558684),
(1042, 'module', 3, 'product/brand', 'bind', '绑定品牌', 0, 1039, 50, 1397616301),
(1049, 'top', 1, '', '', '活动', 1, 0, 31, 1398249987),
(1050, 'menu', 2, '', '', '活动报名', 1, 1049, 50, 1398250029),
(565, 'module', 3, 'article/link', 'index', '连接标签', 0, 85, 50, 1383104861),
(978, 'module', 3, 'tenders/tenders', 'edit', '编辑申请', 0, 970, 50, 1394274094),
(977, 'module', 3, 'tenders/tenders', 'create', '新增申请', 0, 970, 50, 1394274094),
(973, 'module', 3, 'tenders/setting', 'edit', '修改配置', 0, 970, 50, 1394274094),
(974, 'module', 3, 'tenders/setting', 'delete', '删除配置', 0, 970, 50, 1394274094),
(975, 'module', 3, 'tenders/setting', 'so', '搜索配置', 0, 970, 50, 1394274094),
(976, 'module', 3, 'tenders/tenders', 'index', '申请列表', 1, 970, 50, 1394274094),
(418, 'module', 3, 'data/attr', 'so', '搜索属性', 0, 325, 11, 1373645218),
(1040, 'menu', 2, '', '', '产品分类', 1, 1002, 52, 1397558601),
(1039, 'menu', 2, '', '', '品牌管理', 1, 1002, 51, 1397558508),
(1037, 'module', 3, 'tenders/tenders', 'audit', '待审核申请', 1, 970, 50, 1395129114),
(1036, 'module', 3, 'tuan/yuyue', 'so', '搜索报名', 0, 1041, 50, 1394680043),
(1035, 'module', 3, 'tuan/yuyue', 'delete', '删除报名', 0, 1041, 50, 1394680043),
(1017, 'module', 3, 'product/product', 'edit', '修改产品', 0, 1003, 50, 1394613224),
(1018, 'module', 3, 'product/product', 'delete', '删除产品', 0, 1003, 50, 1394613224),
(1019, 'module', 3, 'product/product', 'so', '搜索产品', 0, 1003, 50, 1394613224),
(1020, 'module', 3, 'product/yuyue', 'index', '产品预约', 1, 1003, 50, 1394618115),
(1021, 'module', 3, 'product/yuyue', 'create', '新增预约', 0, 1003, 50, 1394618115),
(1022, 'module', 3, 'product/yuyue', 'edit', '编辑预约', 0, 1003, 50, 1394618115),
(1023, 'module', 3, 'product/yuyue', 'delete', '删除预约', 0, 1003, 50, 1394618115),
(1024, 'module', 3, 'product/yuyue', 'so', '搜索预约', 0, 1003, 50, 1394618115),
(1025, 'top', 1, '', '', '团装', 1, 0, 30, 1394632355),
(1026, 'menu', 2, '', '', '团装管理', 1, 1025, 50, 1394632371),
(1027, 'module', 3, 'tuan/tuan', 'index', '团装列表', 1, 1026, 50, 1394632458),
(1028, 'module', 3, 'tuan/tuan', 'create', '新增团装', 1, 1026, 40, 1394632458),
(1029, 'module', 3, 'tuan/tuan', 'edit', '修改团装', 0, 1026, 50, 1394632458),
(1030, 'module', 3, 'tuan/tuan', 'delete', '删除团装', 0, 1026, 50, 1394632458),
(1031, 'module', 3, 'tuan/tuan', 'so', '搜索团装', 0, 1026, 50, 1394632458),
(1032, 'module', 3, 'tuan/yuyue', 'index', '报名列表', 1, 1041, 50, 1394680043),
(1033, 'module', 3, 'tuan/yuyue', 'create', '新增报名', 0, 1041, 50, 1394680043),
(1034, 'module', 3, 'tuan/yuyue', 'edit', '编辑报名', 0, 1041, 50, 1394680043),
(957, 'module', 3, 'case/comment', 'so', '搜索评论', 0, 941, 50, 1394176905),
(958, 'module', 3, 'case/comment', 'doaudit', '审核评论', 0, 941, 50, 1394176905),
(959, 'menu', 2, '', '', '在建工地', 1, 934, 50, 1394245708),
(671, 'module', 3, 'system/theme', 'index', '模板管理', 1, 670, 50, 1384760203),
(670, 'menu', 2, '', '', '模板设置', 1, 1, 50, 1384760168),
(1016, 'module', 3, 'product/product', 'create', '新增产品', 0, 1003, 50, 1394613224),
(470, 'module', 3, 'system/config', 'attach', '附件设置', 1, 269, 2, 1374459620),
(479, 'module', 3, 'article/help', 'index', '帮助管理', 1, 472, 50, 1375413284),
(480, 'module', 3, 'article/help', 'so', '搜索帮助', 1, 472, 50, 1375413284),
(481, 'module', 3, 'article/help', 'create', '添加帮助', 0, 472, 50, 1375413284),
(482, 'module', 3, 'article/help', 'edit', '修改帮助', 0, 472, 50, 1375413284),
(483, 'module', 3, 'article/help', 'delete', '删除帮助', 0, 472, 50, 1375413284),
(972, 'module', 3, 'tenders/setting', 'create', '新增配置', 0, 970, 50, 1394274094),
(971, 'module', 3, 'tenders/setting', 'index', '装修配置', 1, 970, 50, 1394274094),
(970, 'menu', 2, '', '', '装修申请', 1, 934, 50, 1394273935),
(969, 'module', 3, 'site/notes', 'so', '搜索日记', 0, 959, 50, 1394245982),
(968, 'module', 3, 'site/notes', 'delete', '删除日记', 0, 959, 50, 1394245982),
(966, 'module', 3, 'site/notes', 'create', '新增日记', 0, 959, 50, 1394245982),
(967, 'module', 3, 'site/notes', 'edit', '修改日记', 0, 959, 50, 1394245982),
(500, 'module', 3, 'system/config', 'mail', '邮件设置', 1, 269, 40, 1375789137),
(501, 'menu', 2, '', '', '友情连接', 1, 5, 50, 1376153711),
(502, 'module', 3, 'market/links', 'index', '友链管理', 1, 501, 50, 1376153822),
(503, 'module', 3, 'market/links', 'create', '添加友链', 0, 501, 50, 1376153822),
(504, 'module', 3, 'market/links', 'edit', '修改友链', 0, 501, 50, 1376153822),
(505, 'module', 3, 'market/links', 'delete', '删除友链', 0, 501, 50, 1376153822),
(506, 'module', 3, 'system/config', 'sms', '短信设置', 1, 269, 50, 1376155472),
(885, 'module', 3, 'system/smstmpl', 'index', '短信模板', 1, 269, 50, 1387875598),
(515, 'module', 3, 'adv/adv', 'so', '搜索广告位', 0, 68, 50, 1376479539),
(516, 'module', 3, 'magic/upload', 'editor', '编辑器上传图片', 0, 269, 50, 1376590326),
(886, 'module', 3, 'system/smstmpl', 'create', '新增模板', 0, 269, 50, 1387875598),
(887, 'module', 3, 'system/smstmpl', 'edit', '修改模板', 0, 269, 50, 1387875598),
(888, 'module', 3, 'system/emailtmpl', 'index', '邮件模板', 1, 269, 41, 1388025272),
(889, 'module', 3, 'system/emailtmpl', 'create', '新增模板', 0, 269, 41, 1388025272),
(890, 'module', 3, 'system/emailtmpl', 'edit', '修改模板', 0, 269, 41, 1388025272),
(894, 'module', 3, 'system/seotmpl', 'index', '全站SEO', 1, 269, 50, 1388044619),
(895, 'module', 3, 'system/seotmpl', 'create', '新增模板', 0, 269, 50, 1388044619),
(896, 'module', 3, 'system/seotmpl', 'edit', '修改模板', 0, 269, 50, 1388044619),
(1076, 'module', 3, 'tongji/tongji', 'domain', '来源域名', 1, 1070, 50, 1398506370),
(554, 'module', 3, 'tools/database', 'index', '数据库管理', 1, 279, 50, 1380561710),
(929, 'menu', 2, '', '', '开发者工具', 1, 127, 50, 1393667779),
(930, 'module', 3, 'tools/developer', 'module', '模块生成器', 1, 929, 50, 1393667835),
(931, 'module', 3, 'tools/developer', 'config', '配置生成器', 1, 929, 50, 1393667835),
(932, 'module', 3, 'tools/developer', 'schema', '关联表Schema', 0, 929, 50, 1393667835),
(933, 'menu', 2, '', '', '分类管理', 1, 928, 10, 1393836431),
(934, 'top', 1, '', '', '模块', 1, 0, 20, 1393853387),
(935, 'menu', 2, '', '', '设计师管理', 1, 934, 48, 1393853434),
(936, 'module', 3, 'designer/designer', 'create', '添加设计师', 1, 935, 50, 1393853553),
(937, 'module', 3, 'designer/designer', 'index', '设计师列表', 1, 935, 50, 1393853553),
(938, 'module', 3, 'designer/designer', 'edit', '修改设计师', 0, 935, 50, 1393853553),
(939, 'module', 3, 'designer/designer', 'delete', '删除设计师', 0, 935, 50, 1393853553),
(940, 'module', 3, 'designer/designer', 'so', '搜索设计师', 0, 935, 50, 1393853553),
(941, 'menu', 2, '', '', '案例效果图', 1, 934, 50, 1394176296),
(942, 'module', 3, 'case/case', 'index', '案例管理', 1, 941, 50, 1394176905),
(943, 'module', 3, 'case/case', 'create', '添加案例', 0, 941, 50, 1394176905),
(944, 'module', 3, 'case/case', 'edit', '修改案例', 0, 941, 50, 1394176905),
(945, 'module', 3, 'case/case', 'delete', '删除案例', 0, 941, 50, 1394176905),
(946, 'module', 3, 'case/case', 'so', '搜索案例', 0, 941, 50, 1394176905),
(947, 'module', 3, 'case/case', 'update', '更新案例', 0, 941, 50, 1394176905),
(948, 'module', 3, 'case/case', 'audit', '审核案例', 1, 941, 50, 1394176905),
(1015, 'module', 3, 'product/product', 'index', '产品管理', 1, 1003, 50, 1394613224),
(1014, 'module', 3, 'product/brand', 'cate', '查找品牌', 0, 1039, 50, 1394610113),
(1013, 'module', 3, 'product/brand', 'so', '搜索品牌', 0, 1039, 50, 1394610113),
(1012, 'module', 3, 'product/brand', 'delete', '删除品牌', 0, 1039, 50, 1394610113),
(1011, 'module', 3, 'product/brand', 'edit', '修改品牌', 0, 1039, 50, 1394610113),
(1010, 'module', 3, 'product/brand', 'create', '新增品牌', 0, 1039, 50, 1394610113),
(1009, 'module', 3, 'product/brand', 'index', '品牌管理', 1, 1039, 50, 1394610113),
(1008, 'module', 3, 'product/cate', 'update', '更新排序', 0, 1040, 50, 1394608914),
(1007, 'module', 3, 'product/cate', 'delete', '删除分类', 0, 1040, 50, 1394608914),
(1001, 'module', 3, 'activity/yuyue', 'so', '搜索报名', 0, 1050, 50, 1394595269),
(1002, 'top', 1, '', '', '产品', 1, 0, 50, 1394608209),
(1003, 'menu', 2, '', '', '产品管理', 1, 1002, 54, 1394608816),
(1004, 'module', 3, 'product/cate', 'index', '产品分类', 1, 1040, 50, 1394608914),
(1005, 'module', 3, 'product/cate', 'create', '新增分类', 0, 1040, 50, 1394608914),
(1006, 'module', 3, 'product/cate', 'edit', '编辑分类', 0, 1040, 50, 1394608914),
(965, 'module', 3, 'site/notes', 'index', '工地日记', 0, 959, 50, 1394245982),
(964, 'module', 3, 'site/site', 'so', '搜索工地', 0, 959, 50, 1394245982),
(963, 'module', 3, 'site/site', 'delete', '删除工地', 0, 959, 50, 1394245982),
(928, 'top', 1, '', '', '文章', 1, 0, 60, 1393667048),
(960, 'module', 3, 'site/site', 'index', '在建工地', 1, 959, 50, 1394245982),
(961, 'module', 3, 'site/site', 'create', '新增工地', 1, 959, 10, 1394245982),
(962, 'module', 3, 'site/site', 'edit', '修改工地', 0, 959, 50, 1394245982),
(1075, 'module', 3, 'tongji/tongji', 'via', '外链推广', 1, 1070, 50, 1398505992),
(1074, 'module', 3, 'tongji/tongji', 'keyword', '关键字分析', 1, 1070, 50, 1398503622),
(1073, 'module', 3, 'tongji/tongji', 'qushi', '预约趋势', 1, 1070, 3, 1398475771),
(1071, 'module', 3, 'tongji/tongji', 'source', '来源统计', 1, 1070, 2, 1398417648),
(1072, 'module', 3, 'tongji/tongji', 'index', '统计明细', 1, 1070, 1, 1398422078),
(833, 'module', 3, 'system/config', 'mobile', '3G版设置', 1, 269, 9, 1386842790),
(1062, 'module', 3, 'decorate/yuyue', 'so', '搜索预约', 0, 1052, 50, 1398321930),
(1061, 'module', 3, 'decorate/yuyue', 'delete', '删除预约', 0, 1052, 50, 1398321930),
(1060, 'module', 3, 'decorate/yuyue', 'edit', '编辑预约', 0, 1052, 50, 1398321930),
(1058, 'module', 3, 'decorate/yuyue', 'index', '套装预约', 1, 1052, 50, 1398321930),
(1059, 'module', 3, 'decorate/yuyue', 'create', '新增预约', 0, 1052, 50, 1398321930),
(1000, 'module', 3, 'activity/yuyue', 'delete', '删除报名', 0, 1050, 50, 1394595269),
(999, 'module', 3, 'activity/yuyue', 'edit', '编辑报名', 0, 1050, 50, 1394595269),
(998, 'module', 3, 'activity/yuyue', 'create', '新增报名', 0, 1050, 50, 1394595269),
(997, 'module', 3, 'activity/yuyue', 'index', '报名管理', 1, 1050, 50, 1394595269),
(996, 'module', 3, 'activity/activity', 'so', '搜索活动', 0, 991, 50, 1394525738),
(995, 'module', 3, 'activity/activity', 'delete', '删除活动', 0, 991, 50, 1394525738),
(994, 'module', 3, 'activity/activity', 'edit', '修改活动', 0, 991, 50, 1394525738),
(993, 'module', 3, 'activity/activity', 'create', '新增活动', 0, 991, 50, 1394525738),
(992, 'module', 3, 'activity/activity', 'index', '活动列表', 1, 991, 50, 1394525738),
(991, 'menu', 2, '', '', '活动管理', 1, 1049, 11, 1394525556),
(990, 'module', 3, 'site/yuyue', 'so', '搜索预约', 0, 959, 50, 1394523857),
(989, 'module', 3, 'site/yuyue', 'delete', '删除预约', 0, 959, 50, 1394523857),
(988, 'module', 3, 'site/yuyue', 'edit', '修改预约', 0, 959, 50, 1394523857),
(987, 'module', 3, 'site/yuyue', 'create', '新增预约', 0, 959, 50, 1394523857),
(986, 'module', 3, 'site/yuyue', 'index', '工地预约', 1, 959, 50, 1394523857),
(985, 'module', 3, 'designer/yuyue', 'so', '搜索预约', 0, 935, 50, 1394441582),
(984, 'module', 3, 'designer/yuyue', 'delete', '删除预约', 0, 935, 50, 1394441582),
(983, 'module', 3, 'designer/yuyue', 'edit', '编辑预约', 0, 935, 50, 1394441582),
(982, 'module', 3, 'designer/yuyue', 'create', '新增预约', 0, 935, 50, 1394441582),
(980, 'module', 3, 'tenders/tenders', 'so', '搜索申请', 0, 970, 50, 1394274094),
(981, 'module', 3, 'designer/yuyue', 'index', '预约设计师', 1, 935, 50, 1394441582),
(1070, 'menu', 2, '', '', '数据分析', 1, 5, 50, 1398333249),
(1069, 'module', 3, 'activity/lanmu', 'activity', '活动栏目', 0, 991, 50, 1398332770),
(1068, 'module', 3, 'activity/lanmu', 'so', '搜索栏目', 0, 991, 50, 1398332770),
(1067, 'module', 3, 'activity/lanmu', 'delete', '删除栏目', 0, 991, 50, 1398332770),
(921, 'module', 3, 'article/link', 'so', '搜索标签', 0, 85, 50, 1389168755),
(922, 'module', 3, 'system/theme', 'config', '管理模板', 0, 670, 50, 1389258144),
(923, 'module', 3, 'system/theme', 'install', '安装模板', 0, 670, 50, 1389258144),
(924, 'module', 3, 'system/theme', 'uninstall', '卸载模板', 0, 670, 50, 1389258144),
(925, 'module', 3, 'system/theme', 'setdefault', '设置默认模板', 0, 670, 50, 1389258144),
(927, 'module', 3, 'system/seotmpl', 'config', '配置SEO', 0, 269, 50, 1390032700),
(1077, 'module', 3, 'system/config', 'access', '访问控制', 1, 269, 50, 1419053776),
(1078, 'module', 3, 'sms/log', 'index', '短信日志', 1, 269, 49, 1419056807),
(1079, 'module', 3, 'sms/log', 'so', '短信搜索', 0, 269, 49, 1419057054),
(1080, 'module', 3, 'cate/cate', 'index', '分类管理', 1, 269, 50, 1419399781),
(1081, 'module', 3, 'cate/cate', 'create', '添加分类', 0, 269, 50, 1421228268),
(1082, 'menu', 2, '', '', '项目经理管理', 1, 934, 49, 1421229889),
(1083, 'module', 3, 'manager/manager', 'create', '添加项目经理', 1, 1082, 50, 1421230235),
(1084, 'module', 3, 'manager/manager', 'index', '项目经理列表', 1, 1082, 50, 1421230235),
(1085, 'module', 3, 'manager/manager', 'edit', '修改项目经理', 0, 1082, 50, 1421230235),
(1086, 'module', 3, 'manager/manager', 'delete', '删除项目经理', 0, 1082, 50, 1421230235),
(1087, 'module', 3, 'manager/manager', 'so', '搜索项目经理', 0, 1082, 50, 1421230235),
(1088, 'module', 3, 'manager/yuyue', 'index', '预约项目经理', 1, 1082, 50, 1421230235),
(1089, 'module', 3, 'manager/yuyue', 'create', '新增预约', 0, 1082, 50, 1421230235),
(1090, 'module', 3, 'manager/yuyue', 'edit', '编辑预约', 0, 1082, 50, 1421230235),
(1091, 'module', 3, 'manager/yuyue', 'delete', '删除预约', 0, 1082, 50, 1421230235),
(1092, 'module', 3, 'manager/yuyue', 'so', '搜索预约', 0, 1082, 50, 1421230235),
(1093, 'module', 3, 'cate/cate', 'edit', '修改分类', 0, 269, 50, 1421726375),
(1094, 'module', 3, 'cate/cate', 'delete', '删除分类', 0, 269, 50, 1421726375);

-- --------------------------------------------------------

--
-- 表的结构 `jh_systmpl`
--

CREATE TABLE IF NOT EXISTS `jh_systmpl` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- 转存表中的数据 `jh_systmpl`
--

INSERT INTO `jh_systmpl` (`systmpl_id`, `title`, `from`, `key`, `intro`, `tmpl`, `tmpl1`, `tmpl2`, `dateline`, `is_open`) VALUES
(1, '业主申请装修收到短信模板', 'sms', 'sms_tenders', '1、{mobile}手机号码,\r\n2、{name}注意不一定会有值没有值得时候会使用业主2个字！', '尊敬的{name},您的手机号{mobile}于{dateline}在{sitename}申请了装修服务！稍后客服将会联系您确认需求！【{sitename}】', NULL, NULL, 1387876702, 1),
(76, '在建工地详情页', 'seo', 'seo_site_detail', 'a:2:{s:4:"site";s:12:"工地名称";s:4:"addr";s:12:"工地地址";}', '{site_title}{site}{addr}', '{site_title}{site}{addr}', '{site_title}{site}{addr}', 1394525361, 1),
(77, '关于我们', 'seo', 'seo_about', 'a:1:{s:5:"title";s:6:"标题";}', '{site_title}{title}', '{site_title}{title}', '{site_title}{title}', 1394530478, 1),
(2, '业主预约设计师收到短信模板', 'sms', 'sms_designer_yuyue', '1、{name} 业主名称\r\n2、{mobile} 业主手机号码\r\n3、{designer} 设计师名称', '尊敬的{name}您于{dateline}在{sitename}预约了设计师"{designer}"给您设计房屋装修！预祝您装修愉快！【sitename】', NULL, NULL, 1387877024, 0),
(66, '首页SEO调整', 'seo', 'seo_index', 'a:0:{}', '武汉市鑫大众装饰设计工程有限公司【官网】', '鑫大众装饰,武汉鑫大众,武汉装修公司,武汉家装公司,汉口装修公司,江岸家装公司,装饰设计', '鑫大众装饰是一家集装饰顾问、设计、施工、建材、监理服务为一体，实现装饰服务标准化、施工专业化、产品工厂化、采购规模化的专业品牌装饰公司，是武汉服务最好，信誉最好，口碑最好的装饰设计公司【装饰设计咨询：15207187756】', 1394416675, 1),
(67, '我要装修页面SEO', 'seo', 'seo_tenders', 'a:0:{}', '装修找{site_title}最省心！报名立省2000元！{phone}', '合肥装修，合肥装修公司', '装修找{site_title}最省心！报名立省2000元！', 1394433949, 1),
(68, '案例列表', 'seo', 'seo_case', 'a:0:{}', '{site_title}装修案例', '设计效果图,装修案例,案例实景', '{site_title}装修实景效果图', 1394434462, 1),
(70, '案例详情', 'seo', 'seo_case_detail', 'a:6:{s:5:"title";s:6:"标题";s:8:"designer";s:9:"设计师";s:9:"home_name";s:12:"小区楼盘";s:9:"seo_title";s:9:"SEO标题";s:12:"seo_keywords";s:12:"SEO关键字";s:15:"seo_description";s:9:"SEO描述";}', '{title}-{home_name}小区案例-{designer}之作', '{home_name}小区案例-{designer}之作', '{home_name}小区案例-{designer}之作', 1394444312, 1),
(71, '设计师列表', 'seo', 'seo_designer', 'a:0:{}', '{site_title}设计师列表', '{site_title}设计师列表', '{site_title}设计师列表', 1394449123, 1),
(72, '业主预约设计师通知管理员', 'sms', 'sms_admin_designer', '1、{name}业主\r\n2、{mobile}手机\r\n3、{designer}设计师', '尊敬的管理员：业主"{name}"于{dateline}在您的网站预约了{designer}的设计;联系电话:{mobile}！【{sitename}】', NULL, NULL, 1394504116, 0),
(73, '设计师详情', 'seo', 'seo_designer_detail', 'a:1:{s:4:"name";s:15:"设计师名称";}', '{site_title}设计师{name}介绍', '{site_title}设计师{name}介绍', '{site_title}设计师{name}介绍', 1394506405, 1),
(74, '装修保障页面', 'seo', 'seo_bao', 'a:0:{}', '{site_title}保障', '{site_title}保障', '{site_title}保障', 1394506612, 1),
(75, '在建工地列表页', 'seo', 'seo_site', 'a:0:{}', '{site_title}在建工地', '{site_title}在建工地', '{site_title}在建工地', 1394506689, 1),
(78, '业主报名活动', 'sms', 'sms_activity_yuyue', '1、{name} 业主名称\r\n2、{mobile} 业主手机号码\r\n3、{activity} 活动', '尊敬的{name}您于{dateline}在{sitename}报名了"{activity}"！预祝您装修愉快！【{sitename}】', NULL, NULL, 1394596703, 1),
(79, '业主报名活动通知管理员', 'sms', 'sms_admin_activity', '1、{name}\r\n2、{mobile}\r\n3、{activity}', '尊敬的管理员：业主"{name}"于{dateline}在您的网站报名了“{activity}”;联系电话:{mobile}！【{sitename}】', NULL, NULL, 1394596777, 0),
(80, '优惠活动列表', 'seo', 'seo_activity', 'a:0:{}', '{site_title}', '{site_title}', '{site_title}', 1394596844, 1),
(81, '优惠活动详情', 'seo', 'seo_activity_detail', 'a:4:{s:5:"title";s:6:"标题";s:9:"seo_title";s:9:"SEO标题";s:12:"seo_keywords";s:12:"SEO关键字";s:15:"seo_description";s:9:"SEO描述";}', '{site_title}{title}', '{site_title}{title}', '{site_title}{title}', 1394597010, 1),
(93, '产品详情页面', 'seo', 'seo_product_detail', 'a:1:{s:5:"title";s:12:"产品名称";}', '{title}', '{title}', '{title}', 1399536531, 1),
(95, '手机下载页面的SEO', 'seo', 'seo_app', 'a:0:{}', '{site_title}手机版本', '{site_title}手机版本', '{site_title}手机版本', 1399629595, 1),
(83, '帮助中心详情', 'seo', 'seo_help_detail', 'a:4:{s:5:"title";s:6:"标题";s:9:"seo_title";s:9:"SEO标题";s:12:"seo_keywords";s:12:"SEO关键字";s:15:"seo_description";s:9:"SEO描述";}', '{title}', '{title}', '{title}', 1394603798, 1),
(84, '装修资讯列表页', 'seo', 'seo_article', 'a:1:{s:4:"cate";s:6:"分类";}', '{site_title}{cate}', '{site_title}{cate}', '{site_title}{cate}', 1394603912, 1),
(85, '文章详情', 'seo', 'seo_article_detail', 'a:4:{s:5:"title";s:6:"标题";s:9:"seo_title";s:9:"SEO标题";s:12:"seo_keywords";s:12:"SEO关键字";s:15:"seo_description";s:9:"SEO描述";}', '{title}', '{title}', '{title}', 1394603985, 1),
(16, '招标通知管理员邮件', 'mail', 'email_tenders', '1、{name}\r\n2、{mobile}', '<p>\r\n	尊敬的管理员：\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp;{name} 在{dateline} 在网站发布了招标！请速度联系！\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; 联系方式{mobile}\r\n</p>', NULL, NULL, 1388040012, 1),
(86, '平价材料列表', 'seo', 'seo_product', 'a:2:{s:8:"cat_name";s:6:"分类";s:10:"brand_name";s:6:"品牌";}', '{cat_name} {brand_name}产品列表{site_title}', '{cat_name} {brand_name}产品列表{site_title}', '{cat_name} {brand_name}产品列表{site_title}', 1394617429, 1),
(87, '业主申请评价材料优惠通知业主', 'sms', 'sms_product_yuyue', '1、{name} 业主名称\r\n2、{mobile} 业主手机号码\r\n3、{product} 产品', '尊敬的{name}您于{dateline}在{sitename}询问了产品"{product}"的优惠！【{sitename}】', NULL, NULL, 1394618599, 0),
(88, '业主申请平价材料优惠通知管理员', 'sms', 'sms_admin_product', '1、{name} 业主名称\r\n2、{mobile} 业主手机号码\r\n3、{product} 活动', '尊敬的管理员：业主"{name}"于{dateline}在您的网站申请了“{product}”优惠价格;联系电话:{mobile}！【{sitename}】', NULL, NULL, 1394618713, 0),
(89, '团装列表', 'seo', 'seo_tuan', 'a:0:{}', '{site_title}小区团装列表', '{site_title}小区团装列表', '{site_title}小区团装列表', 1394676699, 1),
(90, '团装详情', 'seo', 'seo_tuan_detail', 'a:2:{s:9:"home_name";s:12:"小区名称";s:5:"title";s:6:"标题";}', '{home_name}{title}', '{home_name}{title}', '{home_name}{title}', 1394679432, 1),
(91, '业主报名团装收到短信', 'sms', 'sms_tuan_yuyue', '1、{name} 业主名称\r\n2、{mobile} 业主手机号码\r\n3、{tuan} 小区', '尊敬的{name}您于{dateline}在{sitename}报名了"{tuan}"的团装活动！预祝您装修愉快！【sitename】', NULL, NULL, 1394682006, 1),
(92, '业主团装活动报名通知管理员', 'sms', 'sms_admin_tuan', '1、{name} 业主名称\r\n2、{mobile} 业主手机号码\r\n3、{tuan} 团装', '尊敬的管理员：业主"{name}"于{dateline}在您的网站申请了“{tuan}”团装活动;联系电话:{mobile}！【{sitename}】', NULL, NULL, 1394682061, 0),
(94, '业主心声SEO', 'seo', 'seo_case_dianping', 'a:0:{}', '{site_title}业主心声', '{site_title}业主心声', '{site_title}业主心声', 1399606971, 1),
(96, '装修套餐SEO', 'seo', 'seo_taocan', 'a:1:{s:5:"title";s:12:"套餐名称";}', '{title}{site_title}', '{site_title}{title}', '{site_title}{title}', 1399687687, 1),
(97, '业主报名套餐装修通知业主', 'sms', 'sms_package_yuyue', '1、{name} 业主名称\r\n2、{mobile} 业主手机号码\r\n3、{title} 套餐', '尊敬的{name}您于{dateline}在{sitename}报名了"{title}"的套餐装修！预祝您装修愉快！【{sitename}】', NULL, NULL, 1399688474, 0),
(98, '业主申请装修套餐通知管理员', 'sms', 'sms_admin_package', '1、{name} 业主名称\r\n2、{mobile} 业主手机号码\r\n3、{title} 套餐', '尊敬的管理员：业主"{name}"于{dateline}在您的网站申请了“{title}”套餐装修;联系电话:{mobile}！【{sitename}】', NULL, NULL, 1399689289, 0),
(99, '工具页面', 'seo', 'seo_tools', 'a:1:{s:5:"title";s:6:"标题";}', '{title}{site_title}', '{title}{site_title}', '{title}{site_title}', 1399709515, 1),
(69, '业主申请装修通知管理员', 'sms', 'sms_admin_tenders', '1、{name}业主\r\n2、{mobile}业主手机', '管理员同志您好！{name}于{dateline}在您的网站申请了装修，业主联系电话如下:\r\n{mobile}!【sitename】', NULL, NULL, 1394443903, 0),
(100, '业主在线报价通知短信模版', 'sms', 'sms_tenders_budget', '1、{name}业主 2、{mobile}业主手机3、{budget}预算', '尊敬的{name}，您于{dateline}在{sitename}申请的在线报价预算结果为￥{budget}（仅供参考）！预祝您装修愉快！【{sitename}】', NULL, NULL, 1422072364, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jh_tenders`
--

CREATE TABLE IF NOT EXISTS `jh_tenders` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `jh_tenders`
--

INSERT INTO `jh_tenders` (`id`, `name`, `mobile`, `home_name`, `type_id`, `style_id`, `budget_id`, `service_id`, `house_type_id`, `way_id`, `addr`, `demand`, `start_time`, `area`, `audit`, `create_ip`, `dateline`, `is_read`) VALUES
(1, '王先生', '13971172755', '', 14, 31, 21, 16, 26, 12, '常青路福星惠誉福星城', '装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求装修要求', '2017-03-01', 139, 1, '192.168.0.113', 1489822391, 0),
(2, '岑先生', '18971355511', '福星惠誉富鑫诚', 15, 31, 20, 17, 26, 13, '汉口城市广场', '汉口城市广场汉口城市广场汉口城市广场汉口城市广场汉口城市广场汉口城市广场汉口城市广场汉口城市广场汉口城市广场汉口城市广场', '2017-03-25', 788, 1, '192.168.0.113', 1489822452, 0),
(3, '红女士', '17771603360', '万科创奇', 14, 31, 20, 16, 23, 12, '万科创奇万科创奇万科创奇万科创奇', '万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇万科创奇', '2017-03-23', 123, 1, '192.168.0.113', 1489822500, 0),
(4, '邹先生', '13407169470', '福星国际城', 14, 31, 20, 16, 24, 12, '常青路福星惠誉福星还曾', '常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾常青路福星惠誉福星还曾', '2017-03-31', 90, 1, '192.168.0.113', 1489822562, 0),
(5, '456', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '127.0.0.1', 1490769024, 0),
(6, 'yfhfh', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '127.0.0.1', 1490769263, 0),
(7, '5tryrt', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '127.0.0.1', 1490769314, 0),
(8, '5tryrt', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '127.0.0.1', 1490769334, 0),
(9, '5tryrt', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '127.0.0.1', 1490769994, 0),
(10, 'yfhfh', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490770104, 0),
(11, 'yfhfh', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490770137, 0),
(12, 'yfhfh', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490770281, 0),
(13, 'yfhfh', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490770400, 0),
(14, 'yfhfh', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490770489, 0),
(15, 'yfhfh', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490770565, 0),
(16, '测试', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490773913, 0),
(17, '奎屯', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490773978, 0),
(18, '十', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490774046, 0),
(19, '夺', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490775263, 0),
(20, '56565', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1490777165, 0),
(21, '56565', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1490777172, 0),
(22, '56565', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1490777173, 0),
(23, 'sdfds', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1490777459, 0),
(24, 'dfsdf', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1490777506, 0),
(25, 'df', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1490778598, 0),
(26, 'tytyu', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '127.0.0.1', 1490838774, 0),
(27, '测试', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1491033497, 0),
(28, '测试', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1491033534, 0),
(29, '23434', '13325698562', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.101', 1491358751, 0),
(30, '王畅', '13971172755', NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '192.168.0.113', 1491368044, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jh_tenders_setting`
--

CREATE TABLE IF NOT EXISTS `jh_tenders_setting` (
  `setting_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT '0',
  `name` varchar(32) DEFAULT NULL,
  `budget` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `jh_tenders_setting`
--

INSERT INTO `jh_tenders_setting` (`setting_id`, `type`, `name`, `budget`) VALUES
(13, 6, '半包', 0),
(12, 6, '全包', 0),
(14, 1, '家装', 0),
(15, 1, '工装', 0),
(16, 4, '新房装修', 0),
(17, 4, '旧房改造', 0),
(18, 4, '局部装修', 0),
(19, 4, '全案设计', 0),
(20, 3, '经济', 600),
(21, 3, '精装', 800),
(22, 3, '豪装', 1000),
(23, 5, '小户型', 0),
(24, 5, '两房', 0),
(25, 5, '三房', 0),
(26, 5, '四房', 0),
(27, 5, '别墅', 0),
(28, 5, '复式', 0),
(29, 5, '公寓', 0),
(30, 5, '工装', 0),
(31, 2, '现代简约', 0),
(32, 2, '中式', 0),
(33, 2, '欧式', 0),
(34, 2, '美式', 0),
(35, 2, '田园', 0),
(36, 2, '混搭', 0);

-- --------------------------------------------------------

--
-- 表的结构 `jh_themes`
--

CREATE TABLE IF NOT EXISTS `jh_themes` (
  `theme_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(50) DEFAULT '',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(150) DEFAULT '',
  `config` mediumtext,
  `default` tinyint(1) DEFAULT '0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`theme_id`),
  KEY `theme` (`theme`,`default`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `jh_themes`
--

INSERT INTO `jh_themes` (`theme_id`, `theme`, `title`, `thumb`, `config`, `default`, `dateline`) VALUES
(1, 'default', '默认模板', 'thumb.jpg', NULL, 1, 1394416067);

-- --------------------------------------------------------

--
-- 表的结构 `jh_tongji`
--

CREATE TABLE IF NOT EXISTS `jh_tongji` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- 转存表中的数据 `jh_tongji`
--

INSERT INTO `jh_tongji` (`id`, `type`, `mdl`, `mdl_id`, `source`, `source_domain`, `source_url`, `keyword`, `first_time`, `year`, `month`, `day`, `create_ip`, `dateline`) VALUES
(1, 'pc', 'package', 1, 'other', NULL, NULL, NULL, 1490604543, 2017, 3, 27, '192.168.0.101', 1490604543),
(2, 'pc', 'package', 2, 'other', NULL, NULL, NULL, 1490605671, 2017, 3, 27, '192.168.0.101', 1490605671),
(3, 'pc', 'package', 3, 'other', NULL, NULL, NULL, 1490701218, 2017, 3, 28, '192.168.0.101', 1490701218),
(4, 'pc', 'package', 4, 'other', NULL, NULL, NULL, 1490702067, 2017, 3, 28, '192.168.0.101', 1490702067),
(5, 'pc', 'package', 5, 'other', NULL, NULL, NULL, 1490702479, 2017, 3, 28, '192.168.0.101', 1490702479),
(6, 'pc', 'package', 6, 'other', NULL, NULL, NULL, 1490702582, 2017, 3, 28, '192.168.0.101', 1490702582),
(7, 'pc', 'package', 7, 'other', NULL, NULL, NULL, 1490702688, 2017, 3, 28, '192.168.0.101', 1490702688),
(8, 'pc', 'package', 8, 'other', NULL, NULL, NULL, 1490702738, 2017, 3, 28, '192.168.0.101', 1490702738),
(9, 'pc', 'package', 9, 'other', NULL, NULL, NULL, 1490702819, 2017, 3, 28, '192.168.0.101', 1490702819),
(10, 'pc', 'package', 10, 'other', NULL, NULL, NULL, 1490702997, 2017, 3, 28, '192.168.0.101', 1490702997),
(11, 'pc', 'package', 11, 'other', NULL, NULL, NULL, 1490703099, 2017, 3, 28, '192.168.0.101', 1490703099),
(12, 'pc', 'package', 12, 'other', NULL, NULL, NULL, 1490703910, 2017, 3, 28, '192.168.0.101', 1490703910),
(13, 'pc', 'package', 13, 'other', NULL, NULL, NULL, 1490704319, 2017, 3, 28, '192.168.0.101', 1490704319),
(14, 'pc', 'package', 14, 'other', NULL, NULL, NULL, 1490704370, 2017, 3, 28, '192.168.0.101', 1490704370),
(15, 'pc', 'package', 15, 'other', NULL, NULL, NULL, 1490704393, 2017, 3, 28, '192.168.0.101', 1490704393),
(16, 'pc', 'package', 16, 'other', NULL, NULL, NULL, 1490704413, 2017, 3, 28, '192.168.0.101', 1490704413),
(17, 'pc', 'package', 17, 'other', NULL, NULL, NULL, 1490747578, 2017, 3, 29, '192.168.0.113', 1490747578),
(18, 'pc', 'package', 18, 'other', NULL, NULL, NULL, 1490751365, 2017, 3, 29, '192.168.0.113', 1490751365),
(19, 'pc', 'package', 19, 'other', NULL, NULL, NULL, 1490751819, 2017, 3, 29, '192.168.0.113', 1490751819),
(20, 'pc', 'package', 20, 'other', NULL, NULL, NULL, 1490751844, 2017, 3, 29, '192.168.0.113', 1490751844),
(21, 'pc', 'package', 21, 'other', NULL, NULL, NULL, 1490758289, 2017, 3, 29, '192.168.0.101', 1490758289),
(22, 'pc', 'package', 22, 'other', NULL, NULL, NULL, 1490758315, 2017, 3, 29, '192.168.0.113', 1490758315),
(23, 'pc', 'tender', 5, 'other', NULL, NULL, NULL, 1490769024, 2017, 3, 29, '127.0.0.1', 1490769024),
(24, 'pc', 'tender', 6, 'other', NULL, NULL, NULL, 1490769263, 2017, 3, 29, '127.0.0.1', 1490769263),
(25, 'pc', 'tender', 7, 'other', NULL, NULL, NULL, 1490769314, 2017, 3, 29, '127.0.0.1', 1490769314),
(26, 'pc', 'tender', 8, 'other', NULL, NULL, NULL, 1490769334, 2017, 3, 29, '127.0.0.1', 1490769334),
(27, 'pc', 'tender', 9, 'other', NULL, NULL, NULL, 1490769994, 2017, 3, 29, '127.0.0.1', 1490769994),
(28, 'pc', 'tender', 10, 'other', NULL, NULL, NULL, 1490770104, 2017, 3, 29, '127.0.0.1', 1490770104),
(29, 'pc', 'tender', 11, 'other', NULL, NULL, NULL, 1490770137, 2017, 3, 29, '127.0.0.1', 1490770137),
(30, 'pc', 'tender', 12, 'other', NULL, NULL, NULL, 1490770281, 2017, 3, 29, '127.0.0.1', 1490770281),
(31, 'pc', 'tender', 13, 'other', NULL, NULL, NULL, 1490770400, 2017, 3, 29, '127.0.0.1', 1490770400),
(32, 'pc', 'tender', 14, 'other', NULL, NULL, NULL, 1490770489, 2017, 3, 29, '127.0.0.1', 1490770489),
(33, 'pc', 'tender', 15, 'other', NULL, NULL, NULL, 1490770565, 2017, 3, 29, '127.0.0.1', 1490770565),
(34, 'pc', 'tender', 16, 'other', NULL, NULL, NULL, 1490773913, 2017, 3, 29, '127.0.0.1', 1490773913),
(35, 'pc', 'tender', 17, 'other', NULL, NULL, NULL, 1490773978, 2017, 3, 29, '127.0.0.1', 1490773978),
(36, 'pc', 'tender', 18, 'other', NULL, NULL, NULL, 1490774046, 2017, 3, 29, '127.0.0.1', 1490774046),
(37, 'pc', 'package', 23, 'other', NULL, NULL, NULL, 1490774096, 2017, 3, 29, '192.168.0.101', 1490774096),
(38, 'pc', 'tender', 19, 'other', NULL, NULL, NULL, 1490775263, 2017, 3, 29, '127.0.0.1', 1490775263),
(39, 'pc', 'tender', 20, 'other', NULL, NULL, NULL, 1490777165, 2017, 3, 29, '192.168.0.101', 1490777165),
(40, 'pc', 'tender', 21, 'other', NULL, NULL, NULL, 1490777172, 2017, 3, 29, '192.168.0.101', 1490777172),
(41, 'pc', 'tender', 22, 'other', NULL, NULL, NULL, 1490777173, 2017, 3, 29, '192.168.0.101', 1490777173),
(42, 'pc', 'tender', 23, 'other', NULL, NULL, NULL, 1490777459, 2017, 3, 29, '192.168.0.101', 1490777459),
(43, 'pc', 'tender', 24, 'other', NULL, NULL, NULL, 1490777506, 2017, 3, 29, '192.168.0.101', 1490777506),
(44, 'pc', 'tender', 25, 'other', NULL, NULL, NULL, 1490778598, 2017, 3, 29, '192.168.0.101', 1490778598),
(45, 'pc', 'tender', 26, 'other', NULL, NULL, NULL, 1490838774, 2017, 3, 30, '127.0.0.1', 1490838774),
(46, 'pc', 'tender', 27, 'other', NULL, NULL, NULL, 1491033497, 2017, 4, 1, '192.168.0.101', 1491033497),
(47, 'pc', 'tender', 28, 'other', NULL, NULL, NULL, 1491033534, 2017, 4, 1, '192.168.0.101', 1491033534),
(48, 'pc', 'tender', 29, 'other', NULL, NULL, NULL, 1491358751, 2017, 4, 5, '192.168.0.101', 1491358751),
(49, 'pc', 'tender', 30, 'other', NULL, NULL, NULL, 1491368044, 2017, 4, 5, '192.168.0.113', 1491368044);

-- --------------------------------------------------------

--
-- 表的结构 `jh_tuan`
--

CREATE TABLE IF NOT EXISTS `jh_tuan` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_tuan_yuyue`
--

CREATE TABLE IF NOT EXISTS `jh_tuan_yuyue` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `jh_upload_photo`
--

CREATE TABLE IF NOT EXISTS `jh_upload_photo` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(30) DEFAULT '',
  `hash` char(32) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `photo` varchar(150) DEFAULT '',
  `size` smallint(6) DEFAULT '0',
  `dateline` int(10) DEFAULT '0',
  PRIMARY KEY (`photo_id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- 转存表中的数据 `jh_upload_photo`
--

INSERT INTO `jh_upload_photo` (`photo_id`, `from`, `hash`, `name`, `photo`, `size`, `dateline`) VALUES
(1, 'designer', 'ccc236c13f5a64129c2e3276292bbcb5', '段同浩.jpg', 'photo/201703/20170318_66B1970C595F048CCD12ED11228948E5.jpg', 32767, 1489814891),
(2, 'designer', '722a3c678a92ffc45e45f221c94f3e97', '颜春华.jpg', 'photo/201703/20170318_CA74211A348D92F25C935F2C7EE6002A.jpg', 32767, 1489814989),
(3, 'designer', '78e50d0d1525e853bd7dfab9dae4c0af', '颜春华.jpg', 'photo/201703/20170318_11093A7816D90740685E36925D575264.jpg', 32767, 1489815238),
(4, 'designer', '5c0f643fdeffd375d0c9a412f7801fa6', '段同浩.jpg', 'photo/201703/20170318_8CC6C7D69EFF79BB38854D9D4AC6CC3A.jpg', 32767, 1489815259),
(5, 'designer', 'daa7fa2b9cd2d1fa8c0c5ad51f1971b7', '郝美艳.jpg', 'photo/201703/20170318_0A7975AE6467A0009B63B3FBFBC70E7E.jpg', 32767, 1489815554),
(6, 'designer', 'd78488b8ba5b9a4cb59a74e306806546', '叶尚美.jpg', 'photo/201703/20170318_8A050D0F48E82499579B7EE01866FF61.jpg', 32767, 1489815632),
(7, 'designer', 'ce554f52925790d1cc8542474f7b1a32', '陈晓丽.jpg', 'photo/201703/20170318_835F37C852639C0003754B0E1A99E9DE.jpg', 32767, 1489815690),
(8, 'designer', 'e11b068c9b1cbcc1128af89421874d5a', '王汉川.jpg', 'photo/201703/20170318_67189A29D5036C29A974F271D863CA90.jpg', 32767, 1489815771),
(9, 'article', 'ac511c43f8bee7a642c56a08c7199677', '20160712182335_7889.jpeg', 'photo/201703/20170318_2B3AB844D16F88E9283D9F28B8A885CD.jpeg', 32767, 1489818691),
(10, 'article', '8d5c10d8868ca63928f7b1cd490221e9', '20160718194029_7094.jpeg', 'photo/201703/20170318_F337EB8E07EEDB3A391302CB2B53648A.jpeg', 32767, 1489818903),
(11, 'article', '48351c38ee9d2982cab19566405c414c', '20160718194028_9821.jpeg', 'photo/201703/20170318_62F36C0E50F42D68F1BFCC10E43AA375.jpeg', 32767, 1489818957),
(12, 'manager', 'fd15c8a7bfbd75193d986c0dc5050525', '阎老大.jpg', 'photo/201703/20170318_1D06EEF1F31EF21490226D9DE11E14CB.jpg', 32767, 1489820961),
(13, 'manager', 'a4c845dbc602813a13ddfe672fcc94c6', '李天倚.jpg', 'photo/201703/20170318_6286904E4548200DFECB9C3D3A33DB10.jpg', 32767, 1489820994),
(14, 'manager', 'e5f16a062b5830a77e6d52351f328ce8', '陈天而.jpg', 'photo/201703/20170318_CC0172279B2CC2E233C237033CAFDFAD.jpg', 32767, 1489821026),
(15, 'manager', 'e522d40f9c16dc4b0fd31d8d18fc3bb5', '西天三.jpg', 'photo/201703/20170318_4541C1E010B88959964128DEC6BFE577.jpg', 32767, 1489821054),
(16, 'manager', '3a4b3ba5855bfa2dd1d19f07f6aac924', '刘老四.jpg', 'photo/201703/20170318_AF9E0B82861FC3145D317DB5CEECD588.jpg', 32767, 1489821100),
(17, 'site', '9abb4656cb09d248fb951431b90ccec0', 'timg (1).jpg', 'photo/201703/20170318_12AC62D275AD74A7DC8AC22B4A0DB50C.jpg', 32767, 1489821287),
(18, 'site', 'b21f7b37d9629f4ead0725174a731258', '20150920_9575141117D1EE4EE68ADC817982431F.jpg', 'photo/201703/20170318_26BDBC651BE4769C28E993E8607F5BA5.jpg', 32767, 1489821350),
(19, 'site', 'ae8e9bb442579bdf7926a38ae8ebb96c', '1-1F1101F6330-L.jpg', 'photo/201703/20170318_C00C8E21A08C03BA2F1C72F40F0F46CD.jpg', 32767, 1489821427),
(20, 'site', 'c581ef02494a6b509147dfe85c65b326', '1-1F2251523190-L.jpg', 'photo/201703/20170318_198BE2FAC69DF0D68AC65297F88CE366.jpg', 32767, 1489821484),
(21, 'site', '5b3c6e2c0a3294a98e4c7424fdf6b90a', '1-1F112102045420.jpg', 'photo/201703/20170318_08645D3013F8034B32733C0DAB342A7E.jpg', 32767, 1489821536),
(22, '', 'f73fa0dad6fdb45df4a5c29588af7239', '1-1F1111126160-L.jpg', 'photo/201703/20170318_B5523BAEBB1E99F718685341D9F9578D.jpg', 32767, 1489821609),
(23, 'config', '4b4806e28f7a850b1e8cd0007d4dbeef', 'logo-z.png', 'photo/201703/20170318_EAF7B1091D8B62F0D74610D20711DB2A.png', 3203, 1489826286),
(24, 'decorate', '7328f064ffd213589d1c5e59e5a978ab', 'zyh-w1.jpg', 'photo/201703/20170322_161034A98199C32134F53CAA0F7D2F7C.jpg', 32767, 1490163029),
(25, 'decorate', 'd8032f0cc89784646fd723cc1fde5f18', 'zyh-w2.jpg', 'photo/201703/20170322_FC77A3A5FF4B85EA47457F2E1631329D.jpg', 32767, 1490163048),
(26, 'decorate', '11c70ef3f633c699dc35187abeea918d', 'zyh-w3.jpg', 'photo/201703/20170322_65A7FAB595B50CAC7DF4A95D2B0AF9AE.jpg', 32767, 1490163062),
(27, 'config', '0f952f8881f43e1f0e877e12ed7d4010', 'logo-z.png', 'photo/201703/20170324_08242F938910E8EAB7FB056606F7DDAD.png', 5546, 1490331050),
(28, 'config', '211c6acb8d655f2c5f4491f6b32417c2', 'QQ图片20161222172855.jpg', 'photo/201703/20170324_8D67255419D55A346B23D182157C6320.jpg', 32683, 1490331050),
(29, 'config', 'a259d674d6e55516701faa68d16a3764', '20160507_8E4C0CD2797CCB6285B46DDEC5EA5904.png', 'photo/201703/20170324_EEC3DF8B3FD867D8063D7A5722B36695.png', 29142, 1490331050),
(30, 'config', 'f9b7abd6409ca59c0211404cb74319dd', 'logo-z.png', 'photo/201703/20170324_A45897B65B16A12E1257C1CFD9E764D4.png', 5132, 1490332631),
(31, 'config', '88cf0f66ec4b6997045ad0e50a39616c', 'logo-z.png', 'photo/201703/20170324_99E4DC8FF1CCD1E59D71DFC6F93AB17D.png', 5599, 1490333136),
(32, 'config', '979f65eeab093ff292443f0f149d93e2', 'logo-z.png', 'photo/201703/20170324_7183A50303C5F9AA3287D07E34220EBF.png', 5556, 1490333226),
(33, '', '46e9ad9155c5c347a4ba6cfbb5e136c3', '【武汉旧房翻新】兔狗旧房翻新_局部翻新.png', 'photo/201703/20170324_B6D792AE422FBBB51A318C2E4DF89ED5.png', 32767, 1490335619),
(34, 'activity', '0e4e7aca0b2416d6db8b4fa3f7930c17', 'yh-libao.png', 'photo/201703/20170324_5307424D25BC833B2D86A5CF45DECE75.png', 32767, 1490335638),
(35, 'activity', '1761a5291541d6a7e22052dc9dcfb5c8', 'xhx-banner.jpg', 'photo/201703/20170324_206E85D54CEDA9CF60800D1C9EC226CF.jpg', 32767, 1490335638),
(36, 'config', '861489ace20b16fd614ca6d32fabfff6', 'logo-z.png', 'photo/201703/20170325_ECC1D1E99DEAAF5958FCD00E1A2CE8F9.png', 5668, 1490378443),
(37, '', 'fe795da9b8acdcedb4acb626b70abf49', 'aaa3.jpg', 'photo/201703/20170327_1333157996DBE0511669F00A02EE7AD3.jpg', 32767, 1490597111),
(38, 'article', '44fa3123098894d3dfc0caa744fa0e1e', 'aaa2.jpg', 'photo/201703/20170327_C2A9E56D27E11696A03067502A24920E.jpg', 32767, 1490597134),
(39, 'adv', 'b72d306d3291d85c792f3cd3bcae06d6', 'xfbanner.jpg', 'photo/201703/20170327_021CDF68E3CBBB057EAA5A54E0E4B57F.jpg', 32767, 1490599807),
(40, '', '14d8c3b75b4203b6d951c39190d799c8', 'h1.jpg', 'photo/201703/20170327_A283E97689451D0EEC1151F0E8998231.jpg', 32767, 1490601039),
(41, '', '5e09c02cd8cf54d24bb4195b8597fb15', 'h2.jpg', 'photo/201703/20170327_59F867144A0EC4A8810623A86BC2455D.jpg', 32767, 1490601042),
(42, '', '9b5c4e25678a216ea276edce12d1dbc8', 'h22.jpg', 'photo/201703/20170327_1DFD42C9E74FBEA5CE5354CC1FF367AF.jpg', 32767, 1490601044),
(43, '', '81f65a963ae6be81ff6b6fa0cd5aa950', 'h3.jpg', 'photo/201703/20170327_DC96C01ED912B37CDA19CFBA0E24832E.jpg', 32767, 1490601046),
(44, '', '448b2224d7536519cee4f55b77fb0ae5', 'h4.jpg', 'photo/201703/20170327_1E59475378183C1E090074CBF57FC81D.jpg', 32767, 1490601048),
(45, 'activity', '03fa63159132fb1fbb62a9f9f154f82b', '喜迎国庆，秋季家装节.jpg', 'photo/201703/20170327_D0B978B126513801B1E18607C4F852DD.jpg', 32767, 1490601055),
(46, '', '7df305cd02fb4db4ec5a879a82d9d531', 'h1.jpg', 'photo/201703/20170327_BA45096EC661C29A67C06F2E84ED5859.jpg', 32767, 1490601250),
(47, '', 'e2787d7d3dcc33998411ea5b7250b653', 'hdwen.jpg', 'photo/201703/20170327_7C6909A1F799081158CBAA3A0B39A1B1.jpg', 32767, 1490603559),
(48, 'activity', 'c2e8ba3e2b18412974674baf741a5320', 'hdbanner.jpg', 'photo/201703/20170327_38D1AD63DE2197386B67E51669C06571.jpg', 32767, 1490603567),
(49, '', 'bf87c876fa43400ebea7313a9a881eea', '未标题-1.jpg', 'photo/201703/20170327_347B812C519BAC4B0FB7FD1E0FBB163B.jpg', 31625, 1490606038),
(50, 'article', '932d1048ea9c9350b1cbc21ca36bd1c6', '20170315182844_83863.jpg', 'photo/201703/20170327_9B3896E3A7E1BA2D7530780E8123DE64.jpg', 28554, 1490613908),
(51, 'article', '99307892cc5d21a7836901c8da41ce6d', '20170315160710_72497.jpg', 'photo/201703/20170327_8AB14631B758D535473F82D7A6FC4DF7.jpg', 21759, 1490615196),
(52, 'article', 'f0d6765ba6b0d899487f4822e7045cb0', '20170315113544_11997.jpg', 'photo/201703/20170327_C4EDD23FE061CF92F22939927EA53EC9.jpg', 27433, 1490615701),
(53, 'article', 'fa64f9a3baab3bb23e697fb3d57e6585', '20160108170244_61951.jpg', 'photo/201703/20170327_7AD2F516546A922B035E4FCE6EEA4152.jpg', 32767, 1490616330),
(54, 'article', '668f29d7789433562c90d261e6d22887', '20160108170439_94808.jpg', 'photo/201703/20170327_12B2D9E2EE17AE8D9DF2ED3F785C5714.jpg', 32434, 1490616575),
(55, 'article', '5136d12fab71d8812f6b6a9f8e31f95e', '20170224164757_98689.jpg', 'photo/201703/20170327_CB4B1FB7271BA06C020862F022ACA946.jpg', 25591, 1490616927),
(56, 'article', '8e195733a20e46b5413ad5011e4a3a0b', '20170220135805_12654.jpg', 'photo/201703/20170327_48520F1181249758C91091C0C373AD44.jpg', 32767, 1490617357),
(57, 'article', 'fbdee16f0c908250afbb60e278ac1a66', '20160809194352_81496.jpg', 'photo/201703/20170327_AD92BD106E6F92D1A3759BA7633AC3DC.jpg', 32767, 1490617552),
(58, 'article', 'a5110b30da21f767fd0f7555a4071191', '20160809190013_89478.jpg', 'photo/201703/20170327_E7EE1A726E8DAB6C833ABEB0C5DC25B8.jpg', 30331, 1490617797),
(59, 'article', 'd411e0f684dfb3c1da2b3b96e0f6408a', '20160115184122_20072.jpg', 'photo/201703/20170327_5A560C1B5ACD7B9148CB4B15BC0FF015.jpg', 29312, 1490618020),
(60, 'article', 'aea1da5e36b8c87134b4a5af7d0c9bc9', '未标题-1.jpg', 'photo/201703/20170327_48503D3B7729A999ADE97BDE3F69CFC5.jpg', 16971, 1490620518),
(61, 'article', '97259331a36a4257d8085801e77f7719', '未标题-1.jpg', 'photo/201703/20170327_CB9AB42707A6D4A0C15058A2B7C5F1D0.jpg', 27894, 1490621496),
(62, 'designer', 'd31d7c4ac2a927e6a18c2283e389a038', '邹茜1.jpg', 'photo/201703/20170329_0A26ADF2FFC48A7E20102830D500AD83.jpg', 32767, 1490783890),
(63, 'designer', 'e2f333e855ed6130eb35d56d7889da07', '徐灿1.jpg', 'photo/201703/20170329_A351384DBA338308628CBE7B3BA9F9EF.jpg', 32767, 1490783940),
(64, 'designer', '0392ad581d52dc1c57859df3c619e887', '陈珊1.jpg', 'photo/201703/20170329_3AFF16C65F79AAB55E46E56E89909CC7.jpg', 32767, 1490783979),
(65, 'designer', '0e8d7471d1c1134e21b5be77d895867d', '胡珍1.jpg', 'photo/201703/20170330_909BC4B9A107929A7A639D3E02FC9DD2.jpg', 32767, 1490850428),
(66, 'designer', '8941a0c05d25441a701f92e354ca7cd8', '骆畅1.jpg', 'photo/201703/20170330_123CE74247B72D5986661A7CA709BED7.jpg', 32767, 1490850449),
(67, 'adv', '6f0beb6f3245eaba7cd95a86b9e4a363', 'aaa2.jpg', 'photo/201703/20170330_17B8A19DF7276614CD45104A862524F3.jpg', 32767, 1490851777),
(68, 'adv', 'e30666fe9461f6a44918b46fe5f397eb', 'aaa3.jpg', 'photo/201703/20170330_C5C62A1867592E88703DFFD8803F706B.jpg', 32767, 1490851844),
(69, 'adv', '429010aa135ba3a2f42db6533c40e35f', 'zrj-1.jpg', 'photo/201703/20170330_DA302FF7E6904A880003858C774F63AD.jpg', 32767, 1490852639),
(70, 'adv', 'aca8c816ba1f5075cbbfc4e34a57091f', 'zrj-2.jpg', 'photo/201703/20170330_3310FDE741AEE7DFF7ACE1BA8EF0A98F.jpg', 32767, 1490852720),
(71, 'adv', '45709adf81f95a903b95ddcdcc8d3b87', 'zrj-3.jpg', 'photo/201703/20170330_884102623B417B1F17B85FA7DEDC0721.jpg', 32767, 1490852744),
(72, 'adv', '7abeb424a02250f66379a0f3b50860ee', 'zrj-4.jpg', 'photo/201703/20170330_E0CA68314D8A1958C75C0FFDF5A75539.jpg', 32767, 1490852764),
(73, 'adv', '1073323f75c687b4647cf5cdc1503005', 'youce-tt1.png', 'photo/201703/20170330_80434035162CAB018321D7B6CF663DEE.png', 32767, 1490857273),
(74, 'designer', '013d637f3b4bddb1ad7c17f29867a895', '邹茜1.jpg', 'photo/201703/20170331_FCA671DAE3DE5D4C7F356648FACDF4C1.jpg', 32767, 1490949001),
(75, 'designer', '9f2cddc316932512194698a33fda5a11', '陈珊1.jpg', 'photo/201703/20170331_0AD98AC7103E81D8EC91886C8BDA3C84.jpg', 32767, 1490949017),
(76, 'designer', 'caa2c2647b61e1fe626bd78c6c9228a1', '徐燦.jpg', 'photo/201703/20170331_5BE86BB0FBFCADA76255A88C5977763E.jpg', 32767, 1490949032),
(77, 'designer', 'ce8dd9c26f23d59f3c26def463ed02cc', '胡珍1.jpg', 'photo/201703/20170331_4FD46A2E5DCBF7C4F27ED1D26E45913C.jpg', 32767, 1490949049),
(78, 'designer', '060dfeb63116b7eafa10d74d2873a1e5', '骆畅1.jpg', 'photo/201703/20170331_92FA6EC5AD9B0A85D4B0C513F3C5F254.jpg', 32767, 1490949064),
(79, 'designer', 'f8ce033a51ba4d5db29175d5a652d479', '邹茜2.jpg', 'photo/201703/20170331_1BE9FAE01A03AA87DCF99C18DE697489.jpg', 32767, 1490951469),
(80, 'designer', '5a10e3a57a7f97f78c6f1e4d5a67e459', '陈珊2.jpg', 'photo/201703/20170331_22801FA682403E58D663C5A9B3ECF2C7.jpg', 32767, 1490951487),
(81, 'designer', '6f34e30ed6c68ce3a25ea03ba0778cd1', '徐燦2.jpg', 'photo/201703/20170331_25273423CA4E637FF562539BEC648787.jpg', 32767, 1490951506),
(82, 'designer', '16c7d4164c2315fed4c8096a0a48492a', '胡珍2.jpg', 'photo/201703/20170331_EB102CE3B47583592031C8D82E280D41.jpg', 32767, 1490951522),
(83, 'designer', '3a2c5ca93c49940f551fd5ab4732aad5', '骆畅2.jpg', 'photo/201703/20170331_E95B9D21A7069B139041FFE40E9F8569.jpg', 32767, 1490951542),
(84, 'designer', '1aa13a9d1ebe231468594954cf8f47fe', '徐燦2.jpg', 'photo/201703/20170331_7BEECCFCB23C0BAEDBB9E05927C828D9.jpg', 32767, 1490953242),
(85, 'designer', 'd8a3a38434dccd6cb41038df66642847', '牛秀.jpg', 'photo/201703/20170331_38066CF3350A2358DB4617F0D73908C4.jpg', 32767, 1490953280);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
