# MySQL-Front Dump 2.5
#
# Host: localhost   Database: aaccu
# --------------------------------------------------------
# Server version 4.1.14-nt


#
# Table structure for table 'library'
#

DROP TABLE IF EXISTS `library`;
CREATE TABLE `library` (
  `lib` int(255) unsigned NOT NULL auto_increment,
  `mem_id` int(255) unsigned default NULL,
  `pdate` date default NULL,
  `name` varchar(255) default NULL,
  `file` varchar(255) default NULL,
  `remark` longtext,
  PRIMARY KEY  (`lib`),
  UNIQUE KEY `lib` (`lib`),
  KEY `lib_2` (`lib`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

