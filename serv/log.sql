/*
Navicat MySQL Data Transfer

Source Server         : LocalMySQL
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : hotspot

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2013-10-25 08:43:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(11) DEFAULT NULL,
  `smspass` varchar(6) DEFAULT NULL,
  `logtime` int(11) DEFAULT NULL,
  `clientinfo` text,
  PRIMARY KEY (`id`),
  KEY `idx` (`mobile`,`smspass`,`logtime`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2034 DEFAULT CHARSET=utf8;