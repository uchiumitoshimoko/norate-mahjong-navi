/*
MySQL Data Transfer
Source Host: localhost
Source Database: geeklydb_test
Target Host: localhost
Target Database: geeklydb_test
Date: 2019/07/10 21:40:46
*/

SET FOREIGN_KEY_CHECKS=0;


-- ----------------------------
-- Table structure for m_login_user_authorities
-- ----------------------------
DROP TABLE IF EXISTS `m_login_user_authorities`;
CREATE TABLE `m_login_user_authorities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT 'm_logini_usersのID',
  `menu_cd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0:無効、1:有効',
  `modified_user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4086 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for m_login_users
-- ----------------------------
DROP TABLE IF EXISTS `m_login_users`;
CREATE TABLE `m_login_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユニーク値である',
  `login_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cybozu_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'サイボウズID',
  `cp_user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `charge_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'メールアドレス',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0:無効、1:有効',
  `mendan_flg` int(11) NOT NULL DEFAULT 1 COMMENT '面談予定者フラグ',
  `ca_rank` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT 0,
  `no_imgdat` mediumblob DEFAULT NULL,
  `no_mime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `m_login_user_authorities` VALUES ('1405', '5', '0', '1', null, '2015-07-10 14:31:31', '2015-07-10 14:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1406', '5', '1', '1', null, '2015-07-10 14:31:31', '2015-07-10 14:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1407', '5', '2', '1', null, '2015-07-10 14:31:31', '2015-07-10 14:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1408', '5', '3', '1', null, '2015-07-10 14:31:31', '2015-07-10 14:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1409', '5', '4', '1', null, '2015-07-10 14:31:31', '2015-07-10 14:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1410', '5', '5', '1', null, '2015-07-10 14:31:31', '2015-07-10 14:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1411', '5', '6', '1', null, '2015-07-10 14:31:31', '2015-07-10 14:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1412', '5', '7', '1', null, '2015-07-10 14:31:31', '2015-07-10 14:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1413', '5', '8', '1', null, '2015-07-10 14:31:32', '2015-07-10 14:31:32', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1414', '5', '9', '1', null, '2015-07-10 14:31:32', '2015-07-10 14:31:32', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1415', '5', '10', '1', null, '2015-07-10 14:31:32', '2015-07-10 14:31:32', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1416', '5', '11', '1', null, '2015-07-10 14:31:32', '2015-07-10 14:31:32', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1417', '5', '12', '1', null, '2015-07-10 14:31:32', '2015-07-10 14:31:32', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1418', '5', '13', '1', null, '2015-07-10 14:31:32', '2015-07-10 14:31:32', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1419', '5', '14', '1', null, '2015-07-10 14:31:32', '2015-07-10 14:31:32', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1420', '16', '0', '1', null, '2015-07-14 14:45:45', '2015-07-14 14:45:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1421', '16', '1', '0', null, '2015-07-14 14:45:45', '2015-07-14 14:45:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1422', '16', '2', '0', null, '2015-07-14 14:45:46', '2015-07-14 14:45:46', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1423', '16', '3', '0', null, '2015-07-14 14:45:46', '2015-07-14 14:45:46', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1424', '16', '4', '0', null, '2015-07-14 14:45:46', '2015-07-14 14:45:46', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1425', '16', '5', '0', null, '2015-07-14 14:45:46', '2015-07-14 14:45:46', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1426', '16', '6', '0', null, '2015-07-14 14:45:46', '2015-07-14 14:45:46', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1427', '16', '7', '0', null, '2015-07-14 14:45:46', '2015-07-14 14:45:46', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1428', '16', '8', '0', null, '2015-07-14 14:45:46', '2015-07-14 14:45:46', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1429', '16', '9', '0', null, '2015-07-14 14:45:46', '2015-07-14 14:45:46', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1430', '16', '10', '0', null, '2015-07-14 14:45:47', '2015-07-14 14:45:47', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1431', '16', '11', '0', null, '2015-07-14 14:45:47', '2015-07-14 14:45:47', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1432', '16', '12', '0', null, '2015-07-14 14:45:47', '2015-07-14 14:45:47', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1433', '16', '13', '0', null, '2015-07-14 14:45:47', '2015-07-14 14:45:47', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1434', '16', '14', '0', null, '2015-07-14 14:45:47', '2015-07-14 14:45:47', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1435', '17', '0', '1', null, '2015-07-17 15:31:29', '2015-07-17 15:31:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1436', '17', '1', '1', null, '2015-07-17 15:31:29', '2015-07-17 15:31:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1437', '17', '2', '1', null, '2015-07-17 15:31:29', '2015-07-17 15:31:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1438', '17', '3', '1', null, '2015-07-17 15:31:29', '2015-07-17 15:31:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1439', '17', '4', '1', null, '2015-07-17 15:31:30', '2015-07-17 15:31:30', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1440', '17', '5', '1', null, '2015-07-17 15:31:30', '2015-07-17 15:31:30', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1441', '17', '6', '1', null, '2015-07-17 15:31:30', '2015-07-17 15:31:30', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1442', '17', '7', '1', null, '2015-07-17 15:31:30', '2015-07-17 15:31:30', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1443', '17', '8', '1', null, '2015-07-17 15:31:30', '2015-07-17 15:31:30', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1444', '17', '9', '1', null, '2015-07-17 15:31:30', '2015-07-17 15:31:30', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1445', '17', '10', '1', null, '2015-07-17 15:31:30', '2015-07-17 15:31:30', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1446', '17', '11', '1', null, '2015-07-17 15:31:31', '2015-07-17 15:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1447', '17', '12', '1', null, '2015-07-17 15:31:31', '2015-07-17 15:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1448', '17', '13', '1', null, '2015-07-17 15:31:31', '2015-07-17 15:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1449', '17', '14', '1', null, '2015-07-17 15:31:31', '2015-07-17 15:31:31', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1679', '4', '0', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1680', '4', '1', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1681', '4', '2', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1682', '4', '3', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1683', '4', '4', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1684', '4', '5', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1685', '4', '6', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1686', '4', '7', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1687', '4', '90', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1688', '4', '91', '1', null, '2015-08-14 11:41:22', '2015-08-14 11:41:22', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1779', '24', '0', '1', null, '2015-08-18 14:24:54', '2015-08-18 14:24:54', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1780', '24', '1', '1', null, '2015-08-18 14:24:54', '2015-08-18 14:24:54', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1781', '24', '2', '1', null, '2015-08-18 14:24:54', '2015-08-18 14:24:54', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1782', '24', '3', '1', null, '2015-08-18 14:24:54', '2015-08-18 14:24:54', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1783', '24', '4', '1', null, '2015-08-18 14:24:55', '2015-08-18 14:24:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1784', '24', '5', '1', null, '2015-08-18 14:24:55', '2015-08-18 14:24:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1785', '24', '6', '1', null, '2015-08-18 14:24:55', '2015-08-18 14:24:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1786', '24', '7', '1', null, '2015-08-18 14:24:55', '2015-08-18 14:24:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1787', '24', '90', '1', null, '2015-08-18 14:24:55', '2015-08-18 14:24:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1788', '24', '91', '1', null, '2015-08-18 14:24:55', '2015-08-18 14:24:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1953', '28', '0', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1954', '28', '1', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1955', '28', '2', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1956', '28', '3', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1957', '28', '4', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1958', '28', '5', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1959', '28', '6', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1960', '28', '7', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1961', '28', '8', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1962', '28', '90', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1963', '28', '91', '1', null, '2015-09-10 15:48:20', '2015-09-10 15:48:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1964', '29', '0', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1965', '29', '1', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1966', '29', '2', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1967', '29', '3', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1968', '29', '4', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1969', '29', '5', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1970', '29', '6', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1971', '29', '7', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1972', '29', '8', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1973', '29', '90', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1974', '29', '91', '1', null, '2015-09-10 15:49:04', '2015-09-10 15:49:04', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1975', '30', '0', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1976', '30', '1', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1977', '30', '2', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1978', '30', '3', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1979', '30', '4', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1980', '30', '5', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1981', '30', '6', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1982', '30', '7', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1983', '30', '8', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1984', '30', '90', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1985', '30', '91', '1', null, '2015-09-10 15:49:50', '2015-09-10 15:49:50', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1997', '32', '0', '1', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1998', '32', '1', '1', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('1999', '32', '2', '1', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2000', '32', '3', '1', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2001', '32', '4', '0', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2002', '32', '5', '0', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2003', '32', '6', '0', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2004', '32', '7', '0', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2005', '32', '8', '0', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2006', '32', '90', '0', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2007', '32', '91', '0', null, '2015-09-10 15:51:15', '2015-09-10 15:51:15', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2008', '33', '0', '1', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2009', '33', '1', '1', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2010', '33', '2', '1', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2011', '33', '3', '1', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2012', '33', '4', '0', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2013', '33', '5', '0', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2014', '33', '6', '0', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2015', '33', '7', '0', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2016', '33', '8', '0', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2017', '33', '90', '0', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2018', '33', '91', '0', null, '2015-09-10 15:52:03', '2015-09-10 15:52:03', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2019', '34', '0', '1', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2020', '34', '1', '1', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2021', '34', '2', '1', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2022', '34', '3', '1', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2023', '34', '4', '0', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2024', '34', '5', '0', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2025', '34', '6', '0', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2026', '34', '7', '0', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2027', '34', '8', '0', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2028', '34', '90', '0', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2029', '34', '91', '0', null, '2015-09-10 15:52:41', '2015-09-10 15:52:41', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2030', '35', '0', '1', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2031', '35', '1', '1', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2032', '35', '2', '1', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2033', '35', '3', '1', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2034', '35', '4', '0', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2035', '35', '5', '0', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2036', '35', '6', '0', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2037', '35', '7', '0', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2038', '35', '8', '0', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2039', '35', '90', '0', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2040', '35', '91', '0', null, '2015-09-10 15:53:20', '2015-09-10 15:53:20', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2041', '36', '0', '1', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2042', '36', '1', '1', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2043', '36', '2', '1', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2044', '36', '3', '1', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2045', '36', '4', '0', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2046', '36', '5', '0', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2047', '36', '6', '0', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2048', '36', '7', '0', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2049', '36', '8', '0', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2050', '36', '90', '0', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2051', '36', '91', '0', null, '2015-09-10 15:54:02', '2015-09-10 15:54:02', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2063', '38', '0', '1', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2064', '38', '1', '1', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2065', '38', '2', '1', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2066', '38', '3', '1', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2067', '38', '4', '0', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2068', '38', '5', '0', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2069', '38', '6', '0', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2070', '38', '7', '0', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2071', '38', '8', '0', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2072', '38', '90', '0', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2073', '38', '91', '0', null, '2015-09-10 15:55:27', '2015-09-10 15:55:27', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2074', '39', '0', '1', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2075', '39', '1', '1', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2076', '39', '2', '1', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2077', '39', '3', '1', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2078', '39', '4', '0', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2079', '39', '5', '0', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2080', '39', '6', '0', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2081', '39', '7', '0', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2082', '39', '8', '0', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2083', '39', '90', '0', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2084', '39', '91', '0', null, '2015-09-10 15:56:07', '2015-09-10 15:56:07', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2085', '40', '0', '1', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2086', '40', '1', '1', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2087', '40', '2', '1', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2088', '40', '3', '1', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2089', '40', '4', '0', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2090', '40', '5', '0', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2091', '40', '6', '0', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2092', '40', '7', '0', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2093', '40', '8', '0', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2094', '40', '90', '0', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2095', '40', '91', '0', null, '2015-09-10 15:56:40', '2015-09-10 15:56:40', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2096', '41', '0', '1', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2097', '41', '1', '1', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2098', '41', '2', '1', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2099', '41', '3', '1', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2100', '41', '4', '0', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2101', '41', '5', '0', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2102', '41', '6', '0', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2103', '41', '7', '0', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2104', '41', '8', '0', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2105', '41', '90', '0', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2106', '41', '91', '0', null, '2015-09-10 15:57:18', '2015-09-10 15:57:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2140', '23', '0', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2141', '23', '1', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2142', '23', '2', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2143', '23', '3', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2144', '23', '4', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2145', '23', '5', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2146', '23', '6', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2147', '23', '7', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2148', '23', '8', '0', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2149', '23', '90', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2150', '23', '91', '1', null, '2015-09-11 09:11:11', '2015-09-11 09:11:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2195', '43', '0', '1', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2196', '43', '1', '1', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2197', '43', '2', '1', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2198', '43', '3', '1', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2199', '43', '4', '0', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2200', '43', '5', '0', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2201', '43', '6', '0', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2202', '43', '7', '0', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2203', '43', '8', '0', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2204', '43', '90', '0', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2205', '43', '91', '0', null, '2015-09-14 16:54:24', '2015-09-14 16:54:24', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2206', '21', '0', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2207', '21', '1', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2208', '21', '2', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2209', '21', '3', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2210', '21', '4', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2211', '21', '5', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2212', '21', '6', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2213', '21', '7', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2214', '21', '8', '0', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2215', '21', '90', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2216', '21', '91', '1', null, '2015-09-15 12:46:11', '2015-09-15 12:46:11', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2217', '31', '0', '1', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2218', '31', '1', '1', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2219', '31', '2', '1', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2220', '31', '3', '1', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2221', '31', '4', '0', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2222', '31', '5', '0', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2223', '31', '6', '0', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2224', '31', '7', '0', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2225', '31', '8', '0', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2226', '31', '90', '0', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2227', '31', '91', '0', null, '2015-09-15 16:03:18', '2015-09-15 16:03:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2337', '44', '0', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2338', '44', '1', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2339', '44', '2', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2340', '44', '3', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2341', '44', '4', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2342', '44', '5', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2343', '44', '6', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2344', '44', '7', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2345', '44', '8', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2346', '44', '9', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2347', '44', '10', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2348', '44', '90', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2349', '44', '91', '1', null, '2015-12-09 17:21:44', '2015-12-09 17:21:44', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2520', '27', '0', '1', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2521', '27', '1', '1', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2522', '27', '2', '1', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2523', '27', '3', '1', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2524', '27', '4', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2525', '27', '5', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2526', '27', '6', '1', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2527', '27', '7', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2528', '27', '8', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2529', '27', '9', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2530', '27', '10', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2531', '27', '90', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2532', '27', '91', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2533', '27', '100', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2534', '27', '101', '0', null, '2017-04-05 16:45:29', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2580', '37', '0', '1', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2581', '37', '1', '1', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2582', '37', '2', '1', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2583', '37', '3', '1', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2584', '37', '4', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2585', '37', '5', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2586', '37', '6', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2587', '37', '7', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2588', '37', '8', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2589', '37', '9', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2590', '37', '10', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2591', '37', '90', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2592', '37', '91', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2593', '37', '100', '1', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2594', '37', '101', '0', null, '2017-04-07 12:49:58', '2017-04-07 12:49:58', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2728', '45', '0', '1', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2729', '45', '1', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2730', '45', '2', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2731', '45', '3', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2732', '45', '4', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2733', '45', '5', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2734', '45', '6', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2735', '45', '7', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2736', '45', '8', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2737', '45', '9', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2738', '45', '10', '1', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2739', '45', '11', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2740', '45', '12', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2741', '45', '13', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2742', '45', '90', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2743', '45', '91', '1', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2744', '45', '100', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2745', '45', '101', '0', null, '2018-08-24 12:48:33', '2018-08-24 12:48:33', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2803', '22', '0', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2804', '22', '1', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2805', '22', '2', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2806', '22', '3', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2807', '22', '4', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2808', '22', '5', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2809', '22', '6', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2810', '22', '7', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2811', '22', '8', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2812', '22', '9', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2813', '22', '10', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2814', '22', '11', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2815', '22', '12', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2816', '22', '13', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2817', '22', '90', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2818', '22', '91', '1', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2819', '22', '92', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2820', '22', '100', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2821', '22', '101', '0', null, '2018-09-28 18:04:05', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2955', '42', '0', '1', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2956', '42', '1', '1', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2957', '42', '2', '1', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2958', '42', '3', '1', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2959', '42', '4', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2960', '42', '5', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2961', '42', '6', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2962', '42', '7', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2963', '42', '8', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2964', '42', '9', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2965', '42', '10', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2966', '42', '11', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2967', '42', '12', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2968', '42', '13', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2969', '42', '90', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2970', '42', '91', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2971', '42', '92', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2972', '42', '100', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('2973', '42', '101', '0', null, '2018-11-01 12:25:45', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3612', '25', '0', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3613', '25', '1', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3614', '25', '2', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3615', '25', '3', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3616', '25', '4', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3617', '25', '5', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3618', '25', '6', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3619', '25', '7', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3620', '25', '8', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3621', '25', '9', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3622', '25', '10', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3623', '25', '11', '0', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3624', '25', '12', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3625', '25', '13', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3626', '25', '14', '0', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3627', '25', '90', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3628', '25', '91', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3629', '25', '92', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3630', '25', '100', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3631', '25', '101', '1', null, '2019-04-24 14:19:55', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3876', '26', '0', '1', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3877', '26', '1', '1', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3878', '26', '2', '1', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3879', '26', '3', '1', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3880', '26', '4', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3881', '26', '5', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3882', '26', '6', '1', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3883', '26', '7', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3884', '26', '8', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3885', '26', '9', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3886', '26', '10', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3887', '26', '11', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3888', '26', '12', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3889', '26', '13', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3890', '26', '14', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3891', '26', '15', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3892', '26', '90', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3893', '26', '91', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3894', '26', '92', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3895', '26', '100', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('3896', '26', '101', '0', null, '2019-06-27 11:19:05', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4065', '18', '0', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4066', '18', '1', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4067', '18', '2', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4068', '18', '3', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4069', '18', '4', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4070', '18', '5', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4071', '18', '6', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4072', '18', '7', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4073', '18', '8', '0', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4074', '18', '9', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4075', '18', '10', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4076', '18', '11', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4077', '18', '12', '0', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4078', '18', '13', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4079', '18', '14', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4080', '18', '15', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4081', '18', '90', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4082', '18', '91', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4083', '18', '92', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4084', '18', '100', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_user_authorities` VALUES ('4085', '18', '101', '1', null, '2019-06-27 11:39:18', '2019-06-27 11:39:18', '0', null);
INSERT INTO `m_login_users` VALUES ('18', 'uchiumi', 'uchiumi', 'DIGITALSTAGE', '8', '1112', '内海敏昭', 'f94017@gmail.com', '1', '1', 'S', '1', 0xFFD8FFE1001845786966000049492A00080000000000000000000000FFEC00114475636B7900010004000000500000FFE10374687474703A2F2F6E732E61646F62652E636F6D2F7861702F312E302F003C3F787061636B657420626567696E3D22EFBBBF222069643D2257354D304D7043656869487A7265537A4E54637A6B633964223F3E203C783A786D706D65746120786D6C6E733A783D2261646F62653A6E733A6D6574612F2220783A786D70746B3D2241646F626520584D5020436F726520352E352D633031342037392E3135313438312C20323031332F30332F31332D31323A30393A31352020202020202020223E203C7264663A52444620786D6C6E733A7264663D22687474703A2F2F7777772E77332E6F72672F313939392F30322F32322D7264662D73796E7461782D6E7323223E203C7264663A4465736372697074696F6E207264663A61626F75743D222220786D6C6E733A786D704D4D3D22687474703A2F2F6E732E61646F62652E636F6D2F7861702F312E302F6D6D2F2220786D6C6E733A73745265663D22687474703A2F2F6E732E61646F62652E636F6D2F7861702F312E302F73547970652F5265736F75726365526566232220786D6C6E733A786D703D22687474703A2F2F6E732E61646F62652E636F6D2F7861702F312E302F2220786D704D4D3A4F726967696E616C446F63756D656E7449443D22786D702E6469643A46423746313137343037323036383131383038334542383343363242443743312220786D704D4D3A446F63756D656E7449443D22786D702E6469643A31344337383142344437453931314532383444394430353333373335423633382220786D704D4D3A496E7374616E636549443D22786D702E6969643A31344337383142334437453931314532383444394430353333373335423633382220786D703A43726561746F72546F6F6C3D2241646F62652050686F746F73686F7020434320284D6163696E746F736829223E203C786D704D4D3A4465726976656446726F6D2073745265663A696E7374616E636549443D22786D702E6969643A35626136663165322D623137352D343365382D623263652D383438383235323436353234222073745265663A646F63756D656E7449443D22786D702E6469643A4642374631313734303732303638313138303833454238334336324244374331222F3E203C2F7264663A4465736372697074696F6E3E203C2F7264663A5244463E203C2F783A786D706D6574613E203C3F787061636B657420656E643D2272223F3EFFEE000E41646F62650064C000000001FFDB0084000202020202020202020203020202030403020203040504040404040506050505050505060607070807070609090A0A09090C0C0C0C0C0C0C0C0C0C0C0C0C0C0C01030303050405090606090D0B090B0D0F0E0E0E0E0F0F0C0C0C0C0C0F0F0C0C0C0C0C0C0F0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0CFFC000110800AA015403011100021101031101FFC400B70000020105010101000000000000000000000403060708090A05020101010101010101010100000000000000000001020304050607100002010302030404090B0203050900000102030004051106211207314113082232140951617181331586B63891B1C1D142529223345495A116F07235E1F14344366282738324742646171101000201030203060503030403000000000102112131034104511205F0617181C11391A1E12232B1D1F142521462821506A2C233FFDA000C03010002110311003F00D03FB65DFF007537F1B7EBA03DB2EFFBA9BF8DBF5D01ED977FDD4DFC6DFAE80F6CBBFEEA6FE36FD7407B65DFF7537F1B7EBA03DB2EFF00BA9BF8DBF5D01ED977FDD4DFC6DFAE80F6CBBFEEA6FE36FD7407B65DFF007537F1B7EBA03DB2EFFBA9BF8DBF5D01ED977FDD4DFC6DFAE80F6CBBFEEA6FE36FD7407B65DFF7537F1B7EBA03DB2EFF00BA9BF8DBF5D066F7BB8EE6E24F39BD1B479E4753FEE1D5598907FF00C7727DC4D6A9BB37D9D4F28AF4382402824515255301504CAB454C16A0955682655A2A50B5048128250828AFA0BF1541F5CA7E0A0FDE4340721A0FCE53F0507C95F8A83E4A0AA222944465682265AA2165A2222B410B2D510914442C2AC08C8AA8F8D38FC55070F55E67A450140501405014050140501405014050670FBB7FF1A1D1AFB45F777275AA6ECDF6754C057A1C1228A92A99454132AD153AAD4132AD04EAB51532A6B41305D28A94293504823A0FB0828AFAD06A077B7051F0E809FCC283F797E2A0397E2A0FCE5F8A83E4A0A0F831D11195228222BAD510B2694442CB41032D5442CB41032D510B0A2216156047551C3C5795E91405014050140501405014050140501419C5EEDEFC68F467ED17DDCC9D6A9BB37D9D53A8AF43827515954CA2827515153AAD030AB5153AA515305EE1504CA941305A2A409AD4C8C7EF317E62B63F970DA367B87765CACB93CE4D2DA6D6DBE849B8BF9E188CB20891412C14000F60E66452579B5A7C48CCCF963596A233FEF10EA667FA8996DED6BB6EDB6E6D3B1C4CD8EC3E0B2D2F8B6B676B34D11B9B81730326B7D34408E6D3F94BA00071E7CFDD8CE8F5D7B2BC5336B444F5C6BB7FA633D3C67AFC97EBA27EF2AB0B5972585EB0417396B4B053E06E3C6C51BDEC733333AC57719786364910A88A45E5D4820EBA8D2F9A25C6DDB72562269AC784EF8F18F1FA366FD2BEB174DBAD3B7A3DC9D38DD169B82CC2C7F585923725ED8492027C1BDB57D2581C10468E38E879491C69BB96759898C4C74F6FF0B9A5283E0A551F0534A644656A885928884AF71A08592A88196885D96AA206141030AA88585043A71AD0E1D6BCAF40A0280A0280A0280A0280A0280A0280A0CE2F76EFE347A33F68BEEE64EB74DD9BECEAAD45769714EA2A09D45153A8A81955A2A745A81803BAA2A754A0982EB51532A5158BFE6E7CC227972E945CEEBB04B1BCDDB95B94B0DAB8BBD900567F5E7B978832C9247047C5F93B0B26BDB59B5BCB1974E2E19E6B796271A397AEAE75EF76758B7F6437EF5732171BAB2F736EB6D8FB0598C10E3AC8485E1B4B548391625F4999F4D39892C75635C67369CCBE971F1F1F6D168AEB333ACCEB9FD3C1403EF0B58E74C37D570E2B096F3AA359B4CD2C0219F5595752198236A1988058E9A13A574C63479AFCB37B666631F0FA2A2FAEF0F6F87B3821CA49E0BABC189C8AF832CF6FE10E4BAB498EA7C589885748E55E528469C56B178D347A38B962D311338C784ED3E31F2FC55474ABAF1BBFA1DD42C5750BA659FF0067DC18C98FD616A8AFF5766F1F33ABCF637D6BA970BE8853182790E92C4C085619CF9365BF14771FB6DD3698F6DDD65F447ABFB57AEFD36DBDD47DA7272DA65E10994C533879B1D90455373633901757859B4D7401868C3830AF444E5F2A6B35998B6F1ED9F84F45D72B551195A82364AA884AE9410B255440477502EEB551032D50B30A220615440C2888B4E341C38579DE81405014050140501405014050140501419C7EEDCFC697467ED17DDCC9D6A9BB37D9D56A8AECE29D0514C28A81945A061575A8A654514C22D413AAEB5153AAD4512CB0DB4335CDCCC96F6D6E8D24F3CAC1111106ACCCCDA00001A926A9B39AFF00349BB7A85E6DBAFDBB76A6CAB47CDE26C8CD8FD9172B2491D84383B46D16FD564E2A6FA46625B41CC029F56BE7F7BDC578EB99DBA3F4DE89E9F3CB9E93BCCFBBA47CB758CC1FBB7BCCBEE1BE08FB7EC71767AA2FD67777B1A23A8F44944D4B30F9ABC51EAB4E8FA77FFD7A99CDB96B11F399FC1756F7DD39D71B75B7963DCBB7B211F891A5C340F29923074D494651CC07676F755AFA8CCE7F6CB36F46ED66231CBAEFAD71F9ED2B8398F74A6E88E289F1FBE2DE5BA65D6F2C9AD5D1496034F0981D0F2B6BDBDDC2B1FF0091B44E3CB2DFFE2BB4BC696F6F6D9484BEEA0EAFDA626E320F96B18AEE1133244B21EC41FCB624FEF0ED03E1D2B7FF003AF1199ACE163D33B1CE2BC9FB9537935EB06E4F2CBB8F1D88DC771363B191E49F6F753F683EB273C70C923C790446FA392D2162745D0BA83AEA0F0FADDBDEB6E3CC3F31EA5DA5A9CD34EB5D231D63DB6747D0CB0DD410DCDB4C9716F708B2C13C6C191D1C6AACAC35041075045747CB7D15AB91115AA2265A82065D2AA2075AA85D8550B32E9442EEB550B30A05DC551169C688E1B6BCEF40A0280A0280A0280A0280A0280A0280A0CE4F76DFE34BA31F68BEEE64EB54DD9BECEABD45767130A292A650540CA8A8B065168A6116A0614514CAAD65532AD058CF33FBA9365F97DEAD679A75B79176EDDD8DA48DA13E3E457D8A2E507B4F3CC34A9338875E1ACDAF111E2D7DFBBFF66D93EC1DC5BDA48DAE325B932E6C60BC980678EC2C4158E352788E6625DBE126BF2FEAD36BF2447487EDFD3A6BC7C538EB3333F46CA7118DB6B72ACA3D23A768D4E9FAABCFDBF1C46259EE79ED68C7457F6F8F85B91C80CA06AD5F5A38F2F85C9DC5A342F7823B552E83571AE9A777CD5CB93F66CDF0CCF2692F226BC46B59FC501D5A361C8786A74FCD5C679B49CBD74E198BC63C5A10F3C9B7ECB67F5C31F90C75A85837CE3A2973C015005CC2E5A1BA4D46A1947A04FE5EDAF5FA3F24FDB989D9DBD5EB1C93598DE231FE5B98F287BA4EF2F2E1D2ACC4972D773418938C9A691B99C9C6CF259AF3FC079611C0D7D989CC3F2BCF5F2DE6191E56AB8A365A22165AA2165A05985690BBAD10BBAD50B30A249671550B30AB021D38D5470D55E67A0501405014050140501405014050140506727BB6BF1A7D18FB45F773275AA6ECDF67564A2BB38C1851514CA0A065054534A3B054534A34145308B5244EA28B09D454182FEF17BB9ED7CB65FC5070190DC788B59BFE4323C9F9D0572E59C55EEF4FAF9B97E4A7BC9E6DA7E9D797FC0BEE25FA9464259B227DBC883C382E1C0899C311C9CFEB0078F1AFCF7733F76F315D7A3F5334FB15C5F4F1F9F466A6065C266D07D5996B5C8BF2EAAB6B34721E1DA480DAF6FC55DF8BB597CAE5EF313A2B38236B688C6EEA4B7C7FE95EC889A4625E1BDA2F39879F771D9C4925CE42EA3B7B74F5A479155541FDE2C45627866DABA4734D6345B9BFDE3B066BA185B0DD5657797B8D4476A8E0AB7C4B27A9FEB5E6E6EDB159F2EEF6F6BDC5E6D9B4623C5AC6F3D9D27C96E0BEDB9D43B4824BAB1C14325A67ECC2177B743F4770A071E41FB407CB5C3D3BB88ACFDBB461F67B9EDBEE714DAB3998D7E31FA2FEFBB16F616E89EF3C1C176B70984DEB7863875D4C49756969280389D54B73687E5AFD15367E3FBE8FDF13EE6C788ADBC48C8A085855440C2A9281D69085D86A2A8558768A21571550B38AA85985043A7A55470CF5E7771405014050140501405014050140501419CBEEDAFC69F463ED17DDCC9D6A9BB37D9D59A0AECE4650765420CA0A4AC1A8C540CA0E3514D28A8A6545454EA292275151618B3E6FB0316E9E9DECDDB060175739EEA2ED4B3B380AF36ACF904329D3E0F043EBF1571E7C7971D6767D2F4B8B7DD9B46D11999F08FF002B91BA7686D2C85B94CFC104F8AC597296B79208ECD163D7F9B2292ABAA81C0B1D057C8B5694897DAE1EE2F33169DF1F162EE3B78794CC76FE4DA183DE18CB6EA65A492938AB69EED6ED01856E5C9E645431885849A862BC879870ABC9F76948B4E71EDD1D78BB8AF372CF1456331FF4E3F09F1FAE8CBFC75FC8614433F8B14685A198F1D500ED24F6EBF0D738E69CE258E6E0AE7310B6DD427D977963E36F36F131C5BF936C9CED25C32AB314448F56721549E5504E80D63EFCE6262675DA23ABD7C3C3358D2234F1DA162F606F8F287D40958F4EB358CCD7B15C456D3CBCB771426E6E2233470896E56346768C160A84F01F11AEFDCF1F93136898DBF371ECFD42FCDE68AE3798FE3E1BF45E6BADAF65B871394C0DC47AE2EFEDE5B5B46662C44732140A0B13C003C35AF917999E4CE73EF7D28E48A56311A758FEAC64F7787B66CA93A9DD3ECA5A346B7FB86EAE7137C4F1966C685B4B9461A0FD95461A1FDED7B6BF4B4EEABF76BC7D6D5CBF3DDE7A4F25BB4BF77131E5A5E2931F1CCC4FC3A367C457B5F9B4445510B0A12818558440C281661550AB8E3550B482AA157156092CE3B6892874E35470C95E7771405014050140501405014050140501419CBEEDAFC6A7463ED17DDCC9D6A9BB37D9D5AA0AED2E4652A0657BAA2C1B41C28A6631503482A4AC195145830A2B22651455BBEA5D858DC596D5C95EA86FF6F6E7C4E4ADD88F5648EE1535FE1735E3EEED149A5A7FDD1F9E8FB3E8F5BF27DEE3AFFAB8EDFF00C7F77FF5787BC3016D9A7BCC4E56D57218E69196EACA61CD14C849052443C195876835F9FEEAB6AF2E3C25F7FD3BB88A522F5D271F82DA4FD13D897F9C977349B5F1D0EE7B8B15C4DC6E8788CD9138C45118B21331E1108C040BC7D1F47B38577AF2725F79C7F57B23BF8A6D19EB8C44479B39F36D9CE75DF19D70BAD87B5B681DAD211E159595A0B4B4B763AF2448BA2824F6D70E1889BCF8630F0F737B79627ACCE67E2A2176B63F273E2EEA5D066B6DDC4B73B672F273136E66E12A82A4152C0681C71D351D86B1DAE6BA67131B4FD25F4F97B9F267319A5E317AE9AF84EBFD3E6F16C3A29B131B1498FC16C5C2603193E41B2F756961088ADDB23269CF7823006929034E61C74E0341C2B7DC7DDE59F2CE91EE669EA93C519F34CCE31B444E3C271BABCBDB68B1760B6F6CA10A1510853DFA83AEB5C2F4F2C4443CDC7CB3CB69B4ADE74670B6761D43DED6515B2A259EE2C8656D67D00E47BE8B95D01EF0E093F357D4EDEDE7EEA23FDB1F43D4693C3E931789FF00F599CC7C2D1AFCA63F365C1AFBCFC1226156110B0A0858510BB0AD1259C52124AC82AA1671C2A851BBE89259EAA20D38D11C31D707A050141B8A8ACFACADB6FA438BE80D9ED34F2CB7DD328A6DF77FBA2DED5F6D4991F639FEBB937249046D74B72B201EA0079F4E5F479E82CBF4CBCBF74BB7074876366325B1EEB338EDD9B43766777E75E93237705B6D1C9E1FC7F62B37B55945A7131C4852652F3789CF1E8AA7941197A33D147D90F828F645F45BCA4F2EF0F5786FB199B83C994880E7B54B02A61F0A520F316248D745E5EDA0AB772F969E9159F4A367EEBC7ED2BBC4BE3EEB62B6F6CEE77217F66F710E7EE2086ECDADC22DCE2723148252C3D8EE217B741CD212472906ED3CB8E2BA59BFB6CEE1BCD8F90DB971079B4DBDB63A7F73907B931DCED092E6E67B73124CE5678DFC08C898825B4239BD6140A64F66E2FA81D1DC96071DD3DB5BABC7F33B91C06E1DD50DDCD6F35AC794BAB2861BA9642648E15945C2D9A831B46BA78813C4E6242B4CFF0094BE8B26FBE87587FB432380C5EEEDCFBBB03B9B0D15CE5E0F69B6C2E365BAB59A3932D1C771CE248F8CB1C6914838A272E848537D0EDA5D246EA17964DF3B57A5C98C1D60DBBD44C74FB4AFF2D7593820C8612D6E61B7B986497C36796E539A128C39017E68D55D55A83C3E9EF968E9FEF0E8DEE4CCDFF4E6F705D430379DC4CF94BFC95AE3314F849DE38ADA0C8DB0BDB680DA72F2BC5938D6598F1490210F41ACAA0283397DDB3F8D4E8C7DA2FBB993AD53766DB3AB64EEAED2E4652A0697BAA29A5ECA29A4ECA8A692A4A985A10656B2265EEAAAF1F71E2E3CB61EE6D255E74056568F4D798467988D3E4ECF8EBC9DDF1FDCE398F0D5F47D2FB99EDF9E2D1D74FC5E5EE0884972B728748EEA28E55F9C69FA2BE677F4CDA2DD261F4BB0B629E59DE2661E70BAB3B4B29EE6E57531AE800E075FD3AD71A72569499B3D13C57E4E48AD54B60EF627B9BC6BD9E0B7BB9D1EEA3C5F3AB4D14009446923D79B4665D0B69A6BC2BCFC118999B69EE7D0EF2988AD6999C6233D27E0A6315BA6C22CB93697D6998B1BBB9BAB79E3B591247B3B8B720C91B04274E507D2078AF7F6D79E9CB1C77CEFEEF07B39BB59E6E2C6B16888DFFD5EDF9AE75D5D44B10784801C6A01EFAF672F246330F89C5C5699C4A80CB5F2BDC471025BC356661DDCC46807CC4D79293137F83E9796694F8AE46C9C447089320F6EA937A4AB278615999F4E662DA02C74503535FA0ECB8B59B4BF3FEA9DCCC71D78A274DE75FA74DD700D7D17C246DD948442DDF5A10B5442CD5A24BBD202AFD9550AB765542ADDF442AF551077D11C315707A050140E4791C845653E362BEB88F1D74EB25CD824AE2191D742ACF183CAC4683424507CA5F5EC56B3D8C7773C76372EAF7366B2308A464F519D01E562BAF02470A05681C93239096CA0C6CB7D71263AD5DA4B6B0795CC31BB6A59923279549D4EA40A08EEAF2EEF6459AF6EA6BB95512259667691824602A282C49D140D00EEA05E83D3BECD66726863C965AF7208653394B99E494194A842FA3B1F4B9401AF6E941E650391642FE0B3BAC7C37D710D85E946BDB1495D6198C67990C9183CADCA46A351C2813A0283397DDB3F8D4E8C7DA2FBB993AD53766DB3AB74EEAECE4612A06D6A29A5EC1514D276514D25490C2514C2D6553AD04CBDD5154D6E30556D4A2855E468C7C034E23F3D7CBF508C61F67D32D9F367C56FA7BC8EDD905CC6B346183F237C2BC470EFE35F0FEEF92DFBA330FD0538A6D13E59C4ADA67136A59E5B21739BBCC7E1F27948FC53E24EB0DD30E054BBF165423B01D149E3A6B5A8E39BDA6D6C444F8BEB705F96F4AD299B4574DB4FD65E461321B113317973B67238996F215691A30F1C6E227D3C4F4BD1E6E623D26ED234D6B8CF0CD2DE6AC69F475EE6DCB5E2F2F36623EBD3E1F0DA171ED2F25BD8A6F0C08ED610AD6ECAC19591FE06EF02B9C5A6DB6CF9F6AD6B89DE6772B8EB417F99B4B304BF8F2A9663C755D40626BAF65C737E5C31DF72471F0CDBC19244000003403B057ECE1FCF9F0684236A085AAA206A05DEB485DE90855FB2A855BB0D10AB55428F5510FED5070C35C1DC5014050141B8EF301E4E7C90797EDC1B9766EE6DE1D78BCDC582C5AE417218FC563AF3100CF6FE343E2DDA58A2851A8F13B39683107697973DB1B87A77E58374DE61F7E62A7EB6752A1D999FDD934984FF006EC9692E49EC98621639A5C82DCC68BE91B98047CC1B979872EA087557CA7EE7B3F359D43F2D9D0BC2E6BA8977B52F0C78C172D6CB73EC91DAC3712DC5EDCE96D6D0A219794C8E51352ABAF330D42CD7577A11D59E83E571387EAB6CE9F6B5D67ECCDFE0AE45C5ADFD95EDB86E467B6BEB09AE2DA5E53A73049095D57980E61A86577943F2293F98CC2E7B7CEE5DFD88DB3B331383CC5FD9E271B90B59F725CDDE37D15071CC19A2B7E6E2F2381A8E50A0F373286BD680A0280A0CE5F76CFE353A31F68BEEE64EB54DD9B6CEAD93BABB4B9194A81A5A8A697B2A29B4ECA0652A4B465684185AC8997BAAACA75ECAC8432B666FAC668506B301CF07FCC3BBE7ECAF3F75C3F778E63ABD9D973FD9E5899DBAACC642286FE392CAE10A1E2AE78F30F8BF2F6D7E4B9359F2CF47ED78B34FDD1AC31FE0E8EC3B3AE2F6FB68E66FADB177F3CD7192C2DD486FB9649583BBA4B7426765D40D109F44701C2BD54E5CC562D39889D1F638F9FB4E5CFDEE28F3637AE6B9FF00B6B3189F7C29FCBF4176C6FECA59E437E634EE2C745378B69653068E3958B0939A548C46AB18207A3A1D7B3B29CFDC663CB19C3BD3BAEDFB7ACFFC7E3AD6D31ACCEB31F0F379B32BF3793DAEDCB38B1968896F691AA2451A7045551A0551DC00E1A57CEBDBCB3887CBE38FBB3E7B6EAE3A7167ED39137F27A4D143CE011EAAB1D135F80B1D4FCD5F7BD27B7F2FEE98D65F9CF5CEEE2D1E4AEDB7CFAAF61AFBCFCBA3341F0DD94440DDF5A210B5442ED5A24B3D202CFD955928DD940AB5542AF55107ED511C315707A05014050141B59F3E3E7E376F527A9BBDB6DF423AD392CAF403756DEB5C5DDE1A2B092CEDAE4DC5AF859188C591B386E94392413A01FBA683C2DB3E61FA3D8FF2DFE463615E6EFF0007767473AD3FEEDEA3E27EAFC837D5D87FAE6E2EFDA7C65B6314FF00CA756E481DDF8E9CBAF0A0BCBB2BCE1F42F1DE713CDEE7EEB3F61FFF0036F319829307B4BA9F94C1DDE431F6738B48923FACB112C505D4B653BF32CC9CAA4F2A820212E818DBE75BAC7B5774ECAE8D749768F507676FEB2E9F365AFF00211EC1DAB36D9DBB889B22F1B2DAE3CDC317B8120E69252A8881FF00798B040A73DDF7D65E9B7443AB3D41DCDD50DC7FED8C2673A679FDBF8BBDF63BCBDF17257B2D9B5BC1E1D9413BAF3889BD2650A34E2C3850609D0140501419CBEED9FC6A7463ED17DDCC9D6A9BB36D9D5AA5769723295034BDD514D276514D466A0650D49532A68B0614D644EA6AAA653599120A2AD9EEFB08A0BB6CADB10EAC796F6253C55C769D3E3EDAF85EA3DBC4DBCF5DFABF53E95DCDA691C76F97C14CDADD5AACAB2C522BF37EC9D341F97BEBE5F172C565F539296B4624BE572D696E59A6995745F497B001F0D5E7E5F37BE1AE0E19C2D2DF5F1C9E45AE241CB69180B021ED3C75D4FCB5C3869169CCBBF3F24D2BE5AEEC8AE952C2F82BDBC43CD34F7AD1CAFF001448BCA3E6E635FA8F4FFDD499EB97E2FD4F3178ACF485CD26BDEF9AF83411B1A4221635A1031A885D8D6892CE69085A43550ABF6550AB77D10ABD5441DF4470C75C1E81405014050140501405014050140501419CBEEDAFC69F463ED17DDCC9D6A9BB37D9D59A5767232A6A10694D160D21A8198CD4534A78D4532A6A2A7534913A9A8B0981A099753A01DA6A2B1BB79E5F2780DCB7586DC7AC5065E7967DBB998C110DC40CDCDE0B770921079587691A3761AFCD77B37E1E598B7F1B4E93F49F7C3F63D871F1F3F045B8F7AC445A3AC4F8FC27F4786703732EB35A5D2B249E914F13941F9FB3F2D7CABD673A3EA71F262352071FE91F1D3C4653E8F33F30D7E2EEACC5E23A3A5B3E26F15B4F25B82F4DBD95BF3843A48E0E891EBDEEFD8BF9FE015E8EDB8797B8B6291A78F48797B9E6E2EDEBE6BCFF0079F82FB2B6D9E90ECD37BB832B1E3B0F6D7511CC672E3D0B7865BC963B7592563C23883B229763A28F49881A91FADED3B6FB348A44E5F8CF50EF3FE4F24F24C623E8AF35D78F683D95DDE37C93411135510B1A12818D58440C681663C6AA1590D542CE6AA15635492AC689287BEA8E192BCEEE280A0280A0280A0280A0280A0280A0283397DDB5F8D3E8C7DA2FBB993AD53766FB3AB1435D9CA0CA9A81943453286A0694F11514CA9A29943504EA68A614D64596EA4F98EE8BF4916E937BEFCC7D964AD06B2602D0B5EE475D350A6D6D8492293DDCC00F8EB7149962796368D7E1ED861F74D3CE4E4BCC679A5E9CF4FB60E3F2180E99E16D3319DDCEF3689779036D68D159FB5F21611C22699584618F3300589D001D269E5ACB54ACEB36E9EDF36C6B7EE3B6864369E64EFA9AD6CB6C63EDA4BFC9E5EF265B68EC23B653235DFB4B1510989416E7D46835D786B5E3E4E0AF357C968CC4BD5C3DEDBB3B7DDADB18FC3E131D73E0C21E9575A3A39BEAD9E3D91D5ADB1BF70DED935A630DCE4AD31D9990C2DA30971B792412B70E2AEAA3C45D1828AF83CBE89C9C53FB3F7D37F7C3F47C3FFB1F6BCB5CDEDF6AF3D2D9C7C627C27C2758652EDCDA58FDD3696D98F6EB69301392D651E2E74984E118AB73DCC6481A32952A87507504EBC2BBF0FA44673CB18FFA7FBB973FAED6231C13169FF774F9475F8CFE0BBF6563678EB78ED2C6DA3B4B6886890C6A147CBC3B4FC66BEC56B158C44621F9FE5E5BF2DBCD79999F7B03FDE4BD43B3D95E58B71601A488E4FA9B7D67B6B1F6AFC59E17905CDEB85EF0B6F03027B8B0AF4F057599F0FABCF79CCC47B623F5C30A7C9AF9F6BDDA98EC474CFACD71264F69E3912CF03BE0F3CF7B8D8468B1C378AA19A781382AB81E220E043A81CBABF1E76635A6DB7875F97F6FC3C1B90DABBEB676FAB1FACF66EE8C5EE7B1E1CF718DBA8AE0213DD208D8943F13006B8CD66376AB7ADB6954AC6A36898D10BB1AD081CD10B31AA1663C4D10AB9AA859CD50B31A221D78D51C33579DDC501405014050140501405014050140506727BB6FF1A7D18FB45F773275AA6ECDB67560A6BB38C18534953086A0654D4534875145328D50787B9F796D5D918C9735BBB70D86DCC5C2096BCBF9D2156E51A9540C4176D3B154127B8522B33B336E4AD7760D7507DE27D3BC178F67B076EDFEF1BDD592DB25787EAEB16238070183CECBF118D35ADC71F8A66D3B463E3BFE1FAB02BA97E757ADDBF85F4477549B5B0CC4C6985DBC0D823738D347B805AE5C69DA0C9A1F82BAC44433158B47EE9CFB7847D72D7C6EFDCF73797733ADCC80C3231F106A4BB1F5DCB71E62C7BFB6A66665D6B1FB5B63F73E6063C967BADFBC27124B738FC7E2308970E3B05E3CF7520527BFF949AD4E5B62225D319AEACC7F78E6DBEA5F503A1D93D93D3656BF16718DC1D43C12C7CDEDF84B4247841D5830649B4B854D087F08A9F80E78A99899F9331C7F72D113D3FAF4FD3C270E592EF098C86DAC2E72CF8F4B2B78F9EE67C734AF72D35DC84882F4B1D1658946A5635F454F1D4D3EDC4E6D2BC9C9311158C4CFE13F3F1C371DEEA2F301BF2CFAB9B97A156D888F3DD20B9B292EFEB8C50616184C85A82B1E419A62A563C905113A85D5A6F0DC283E296C4D7CD1A427DBB5666F98C6913D3E1A78F8FBB7DA1D0E5716DCF4FBD57AC36FB9FACBB6BA578594DCC3D28C634F9B9A370DCB97CDAC737844027E8AD1223DDF4847757B38F4AEBA385691999F97C5ADAC54ED670CD35C4A5A690AB1E6521B8B0E1A822B78F0759CF45F4DB1BEB2FB6B2D364F0594BBC364AD3592D7258F9E4B69E3656D4012C654D30C5A913FCB567DF4B7DE07D4ADBF1E36D7797B1EFF00C5B9113C97416CB22A1381E5B985791CE9DBE24649FDEAE76E38963CB6AED3F8EBF9B62DD34F35BD1FEA6BC763699D3B673CE421C16702DABB3F01A453F334126A4E802BF31FDDAE73C730B1C988FDD18FE8C8A2C34D41D41EC35CDBDCBB1D6A85DDAAA1673A0AA1563442CE6AA176356041AF1AA386AAF33B8A0280A0280A0280A0280A0280A0280A0CE3F76E7E34BA33F68BEEE64EB54DD9BECEAB94D76714EA68A614D420CA1A4A9846A83519D7EF3D9BEADF786EBD97D3AB9B1DB981C2E426C6DB6E48625B9C85DFB29686E25469B9A28D1A453E1958F9B4D0F371AEB5AC39C44DB599D3DDF96BFE1AE6DDDD4EDD1BD7213E5F71E7AFB3D91BA7F0C5FE42E1EE2558FF00755A42DCA3E21C2B79E8D52915B469AFB6EA2A6C9B1F15C49C2302343AF104F0268ED9D54BE7B313DA63E768B9A4781359153D61CE402C07ED1553D952748CE09898D96FDA237B2DB4971E21826D4C5139E5E6FF009C03A8D0F755ACC446A9D756F0FDCD5712B607CC65B729E48B3BB7DE3D7B017B2B80DF9028AE3CDD1AE996D83AA5BAF15D24E99F53BA9D70B6C24DB1B7F219BBC9EF0909712D8DAC8F6F0C8C38F2B3008AABF0F0E26B1169B4C474866F3E5ACE37FAB8E2BEB0CFE7FA898D833785C66DBCF751331699ECA4EF6092DBD8439C98F34E96E0BAA5A725D97E4EE0A9C415AED6C5B12D5626B3ACCCE379D2667AE7DB475DDE5E3CB5F4C3CB46C1B3D8DD3CC3451BBA46FB97735C46AD90CBDDAA8569EEA4E248D47A1183CA83828ED278DF966D3974BDE6748D23C3DBAFBD5E7543A8382E8EF4CB7A752372DC37D49B1B0D7595BC2EDFCC9BC042D1C0A74E2F2BF2C69C38B30ACD63CF671B4F961C716EDDDF9DDE9BA73BBE373CC2F3756F0CA5C6673D79DA4DCDECAD2BC6BA762A730441FB2AAA07015EC88C7F65AD7CB18F02375B9555C63ED2CAFEFB2375100B6BE8C691EA7819253A8D351DA2B399DA3727338C7C571E3BC6125D8770D2188F8854F02DC3523E7ADE48CCE25E8DBE51E34B0018E8AEDCC070E248ECF80D4973BE655D62775C91CD904672CAC8754D751C08D7B6930B89DE74C32F3A57E6BFA93D398B17698BDD0D7F865D15F6EE5F9AEED4206D79220CC2487B7FF0DD47C46B33589DD8F2C63F6E93EDD1B15E84F9CFDABD5FDD163B072385936EEECBF8276B2923944F657335B234B2C4848578D8C6A5D436A0E84736BA6BCAF5C2C79A3766531EFAC3459DAAA17735602CC68925D8D5116BC688E1B2BCEF40A0280A0280A0280A0280A0280A0280A0CE2F76EFE347A33F68BEEE64EB74DD9BECEAB14D76714CA6A10614D14C29A82DEF57F7EDBF4CFA65BCF7BCE4F8983C6C8D8F45D357BC9B486D506BF0CD2203F00D4D588D5267472DF9ECBBB5D5F5D1B833CB24B2B866E2CCB21D037CA4EA4D76C3A46D187931DD80D6CA4FA10C7CEC9DDA9D58FE8AB2D4C6F29A17771082798CEE5DF4EDD054948B44EBD5E7CB781EE2E61F50CC026A46A796404295F8343C35A6571AE637524DE245027336925B4DCCDC75E5D7B7E43A8AB989CC93ACCF861BC9F7353C6B83F31D6E0832A67F01331EF292D8CFCBAFCEA6BCFCD39FC67E8D12F7B275EB23EDBB2BCB560773DAEDAC26E08CE67AAB9679891E0AFA58FB0B98A10D2889D97C671A7A67C21D9CD578A31136C6AE588B5F33388AFF005FD3FACE7A345D044F0E2D73969B912DB3CAED8B8308BE30BC36D2C45CDD093E8FC15602364275D7BB4AE969D76638E2B6AE6379E9EE7693D23DC8FBC7A57D37DD535E437F73B876CE2B2179796F209A29279ED237999245E0C39C9E23B6BC96DDDEBA478B573EF78EAE261F606C0E8A63EE47B76F6C89DC7B9ED95886FAAB0EC05B46C3B0ACF78E87E489ABD1C11889962D99B47BB5FA7F768017963696EE7725E57E1A8F41477B7CBDC2BAF9E331386E5EBADFAD85999A40D771B3A2DBDA211ACB7121E58D233DC4F791FA2ACCC40A8D6EA644BF69BD07F0C2BE9C4072C3503E21FEB570C5623A4ECFC8EF1FFF00A05D79B9F520EBD84B683E7D2AE1BC3D6B6C978499295982AC7A2F36A3BDBB4FCBA5670988D20EC9B8A438EFE5B17B8F4560556D1B4624313F985231338671A636647794FCD496BE61BA4D713930F8DB96CA07604800DC030907E5E6D2B95B66B68C3A5676AE6E65D8D02EC6AA1763542EC68928F5E341C37D79DE81405014050140501405014050140501419C5EEDEFC68F467ED17DDCC9D6A9BB37D9D5429AF44B8A753591329A2A753506047BC4B791DBFD1BC260226226DD59E88CCA0F06B6C7C4F3C80FFF0030C55BA1EF73EDB8A7D6EDD402001144575D00E73A1FCF5A989D261D7ABF21979CDE3BEA742238D81D386BA1FF00415BDA742666367A32CDE019C8E290C4B11E041E66F93E7A9BB5A3C4BD9DA2BA8B91F8B43CBA91AFA40F3FE9A4268F367911AEEEE36F445D47CF1EA4716E0E0FFA7653331391BA3F734E401CCF987C7020F8D06DABB235D78A7B7C5AD72E59CD7E6AD55F9A5EA462FAABD77EBA6F4927BC9B319FDEF716DB5724668FD8D7098C2F8F822923D0BB3B476F118F94E80736BDB5D2B98D3A3857135DB7D7EAB6135DED26CCDDCA30991B7C37D5D22E1F151DF23DCDADE3C4AB0CF7133A7F322F143332000904283C2B18B3AF9E2666D11A6311AFB7E0EAC3DDED93396F265D02B9693C46836FC964CDAEBFD15E5C5B01F92315C797F92D5CFE79E0EAE1EB4F999EA46E3B5BAF69DBDB7AF1B6A6D321CB47EC58467825963D7B04B726793FF7857A6BB7958E3F1F1D7DBE4C53802B389645D4280B145A7ED0EC0477E838D6B7D7C1B9C95C74BED79582E3402D319232D92E9F4929E0F27C1A28E034AC4444CE47BF25DC66DEE5CE8ACCE83975EDD493FA2B54BE4C4204B80D3589D75D110F0EE24926AC67CD8F732F226BE730CC227D4CF3C6809E00316FD66917CFB9672F4FC5546BD875F13D9D5230DAF2E811B4E6F9CF1ACDA73B2E3A2F5749F734FB777FEC8DC532EB0E073988BE7D3812B05D44E483F20AE6989756E5C11A83A83C41AC39A066AA85D8D040C6A8858D1116BC6A8E1CEBCCF40A0280A0280A0280A0280A0280A0280A0CE1F76F70F3A1D1AFB45F777275AA6ECDF6754C2BD0E0954D4954C0D413AB515A78F7956EF17BBDB61ECA86512C782C34D7F790AF6ACF92B85500FC915A86F91AB75D969AE5A88CBAF89A489E92B5D78A587EEAB7C3F3D6ADB4BA3EE384FF00281524493966E3DA35FD1489F057D4B27381C7E9A73AF71207FDF4B4649D214EDFCC39659B872BDCAAA91DA00D7503E2D2B569C47BD9C6B0F2AE2648CDA5C03AF83234131F806BA8D7E0E04D6A662235267C1B3DF7646FB5D8993F375998E536C9B77A4F36E3471C4AB61DEE5D5974ED3FCD1A570BC6BAF598FAADB5896B230F92CE78D89CF59E06C6CA3CD630ED9B1B9F61125ADECE60586E990CBCC1AF5FC40CD20E21D811A70A4CE635F891E68D7E5B46DE0A8E6B1DD2D6573B665C149147D36BAB8C96E0B692D105CE3646922826FAC671E998C481539589009D076D589C4EBD7F36678E7689C446671E19DFE3E0DF7F413AF1274CBDD8B9FEABCB0DBE2B378D1B9ACB6D595A016907D6D91CACF6D60969171088B3DC2B055EC0A6B1E58F3478442F25A6D139EBF573F56AA51120791EE6E260034AE7566238F3B13DEE4F3127BEB7359DDA2B93BC922416B6BE84ACC6249470D491ABB8F92ACEDF18D14E5B411DB4963146E488225F0D7BB82127E5249AE95D3447E04636ECFA7387750E0F700BC785636DD3189C94BC95E0BB508BA98E253CBDFC138FCFC7B2BA79731995953114EEF24102B72AC529999BE3D39403F39A93ADA2209F72ADB0B91E3DE78BAF124927B87370D6B16DB466313AAE1E2273CAC46BCE21575D781F44EA3F3566D1AAEB97577D3ECC3E7F606C8CE4B278B2E63018DBD964FDE79ED63918FE5635CDCF0AA99A88819AA8809A2216356047AD5470EF5E57A4501405014050140501405014050140506707BB83879CFE8D7DA2FBBB93AD53766FB3AA5535DDC1F60E9544CA6A2A50C07124003B49EEA839BFF32DBFC750FABDBCF76ACA65B4BBBB986219CF11636A820B5D3BBE8D41F96BAC3A56310C4C994491451A6ACCC1891C78F31FFB2A5A63AAEB9D5EA4211A3B19509D02C8FA1F934A91B44FB96D97992A8536BA8E11A3C8C3BCEBAF1FF4AB1999893C54A64232D0DB447F6F9DD88E1DFF00935D055B62745CA939A669ADEE23D740E8B2AAF78311F4BF2826AC63C99EB849D2177FA45D629BA5F87EB92DADCBD9CFD54E98DEEC7B19E32C1CCF7591B167208D3979ADE399493DC4D4B56319EBF566F1388C78ADE4381BDB3BFDC984B9DD38B7B6D8B1497B670C17E67B4BA943C28C989641C92CEDCC0EABA6A149D78566263A2CE3C72AA4DA4F2C9801FEE7B669B797F2B2AAD73286B41ED023E5CAB37AC1B84C75E6F47D23C4548D99F2D62739F8FBBF4EAC92DF5D5B8E2F28BD1CF2F18ECF45947C3EFADDDB877A2DAB178045657AF062112420129335C4B3A8E1C155BE0A447523F97BA3AF8E58BB0CDC885F5FE648796397E33C58FC83B057488D32E8862B75BB125F12790318ACC91FF8406ACDF39AC5275C8F5A4602F1B91755F0BB397B4AC7A0D0FC34AEBBA7C08B126C957892642351DBC16B5E689D882F79C8925DBB11AAC44283A6A75000D6AD67495D54CD8C1A95988D44926848EE0180E03E3AE5C7AEE92A8AD34537EF1A9E4D47A5EB71E7D08AEF6888DE75499F1DFC15DE21B8A2F16D6D470F8B5E3A5729F7E856731974F1E58F2FF5D7403A537BCC19930305A1D0EBA7B216B7EDF923AE70C5B75F166AA8849A2226354424EB551F3AF1D2A0E26FFC45799E91FE2280FF0011407F88A03FC4501FE2280FF11407F88A03FC4501FE2280FF0011407F88A03FC4501FE228335FDDD7F8C7E8F7FD3BFF00D83E83E93FF4F64BD5FD35AA6ECDF67512BD95E8704B507DAD595781BCBFF476ECFEA3FE8B7FFD27F51FD3C9F43FFB7FBBF1E9591CBA6E8F561FA4FF00A5C5DBDBF44BFF0006BAF4775BC6F5A2EDFA35FD3D95277F9333F37AF61FD0DA7FF6D376FCA7B2A71FF16C8DD76AF67F487F356BFB0A5EFF00D74FFE01ECECFDAECA74862DB2831DBF349F27AA7B6B9D7F8FCCB29E9FFE8B1F6FF5C7D6FF0093F67E2F86BAF2FF001F9C1D4EE37FA7B2ECF5DFD4F5BB3F67E3F86B15F92ABB6ED8FB7E8C76F6FABFF1AD2AE5CDFC7FB93B2FE98F67F563E8FE93E8CFD37C5FBB5D67AECED3BBD19FB23F5FFA67FCE7B2B3C9B4EC499FFC841EBF6FECFABEA8ECA53A6CA724FA68FB7E8C767ABEAF75669B4FC121E6B7D0276FD28EDECECEFA7E0421BFFF00CF7ABFB1D9F37654FF004D9CEBB43CFB5FA3C6767D39ECEDF5BBEA717F09F6EAE8F72DBD4C97CA3D4F5BE92AC6FF0033AC2B5C47AEBDBFD2B7676F756EDB93FCA3E6E92FC987E1B7A71EBFD0DEFAFDBFD6CFD9F17C15C218BEEC9E6AD39CA26A8216AD40F8A888E83FFFD9, 'image/jpeg', null, '2015-08-11 17:26:46', '2019-06-27 11:39:18', '0', '2015-12-04 11:08:33');
INSERT INTO `m_login_users` VALUES ('22', 'yamaoka', 'yamaoka', 'DIGITALSTAGE', null, null, '山岡', 'yamaoka@digitalstage.jp', '0', '1', null, '0', null, null, null, '2015-08-14 10:07:22', '2018-09-28 18:04:05', '0', null);
INSERT INTO `m_login_users` VALUES ('25', 'okuyama', 'NCdYD3x', 'okuyama', '', null, '奥山貴広', 'okuyama@geekly.co.jp', '0', '0', '', '0', null, null, null, '2015-08-31 20:31:26', '2019-04-24 14:19:55', '0', null);
INSERT INTO `m_login_users` VALUES ('26', 'kasahara', '2m7OXZp', 'kasahara', '945', '', '笠原和夫a', 'okuyama@geekly.co.jp', '1', '1', 'A', '0', null, null, null, '2015-09-01 19:38:52', '2019-06-27 11:19:05', '0', null);
INSERT INTO `m_login_users` VALUES ('27', 'yanagi', '4551', 'yanagi', null, null, '柳宏明', 'yanagi@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-01 19:39:21', '2017-04-05 16:45:29', '0', null);
INSERT INTO `m_login_users` VALUES ('28', 'yamane', 'pTv6K1E', 'yamane', null, null, '山根一城', 'yamane@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:48:20', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('29', 'nishiuchi', 'RIxRkMv', 'nishiuchi', null, null, '西内信', 'nishiuchi@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:49:04', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('30', 'matsumura', '60g4hD0', 'matsumura', null, null, '松村達哉', 'matsumura@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:49:50', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('31', 'shinohara', 'ZeSSAzX', 'shinohara', null, null, '篠原百合', 'shinohara@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:50:34', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('32', 'katagiri', 'sex8XIe', 'katagiri', null, null, '片桐智', 'katagiri@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:51:15', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('33', 'hoshiya', 'HjJ9Sg0', 'hoshiya', null, null, '星谷健太', 'hoshiya@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:52:03', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('34', 'imai', 'dTL9tSe', 'imai', null, null, '今井大貴', 'imai@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:52:41', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('35', 'yamamoto', '1550Axt', 'yamamoto', null, null, '山本和稔', 'yamamoto@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:53:20', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('36', 'hamaguchi', 'kNr3REc', 'hamaguchi', null, null, '濱口万李亜', 'hamaguchi@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:54:02', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('37', 'saheki', 'Pxg67Qg', 'saheki', null, null, '佐伯叡一', 'saheki@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:54:38', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('38', 'ichikawa', '0X73Qtd', 'ichikawa', null, null, '市川未音', 'ichikawa@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:55:27', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('39', 'koshiishi', 'klhBHCc', 'koshiishi', null, null, '越石翔子', 'koshiishi@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:56:07', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('40', 'komori', 'raw2NDV', 'komori', null, null, '小森瑞季', 'komori@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:56:40', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('41', 'yano', 'FsY4Geb', 'yano', null, null, '矢野竜平', 'yano@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-10 15:57:18', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('42', 'admin', 'nVhESFh', 'admin', '8', null, '面談予約センター', 'info@geekly.co.jp', '0', '0', null, '0', null, null, null, '2015-09-10 15:58:39', '2018-11-01 12:25:45', '0', null);
INSERT INTO `m_login_users` VALUES ('43', 'support', 'JYkUks5', 'support', null, null, '西尾藍', 'nakajima@geekly.co.jp', '0', '1', null, '0', null, null, null, '2015-09-14 16:54:03', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('44', 'uchiumi3', 'RV8iVUA', 'yamaoka', null, null, '内海３', 'f94017@hotmail.com', '0', '1', null, '0', null, null, null, '2015-12-09 17:21:33', '2018-10-01 13:17:28', '0', null);
INSERT INTO `m_login_users` VALUES ('45', 'test', 'test', 'test', null, null, 'test', 'test@test.jp', '0', '1', null, '0', null, null, null, '2016-07-29 11:14:05', '2018-08-24 12:48:33', '0', null);
