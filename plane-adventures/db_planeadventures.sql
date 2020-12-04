/*
Navicat MySQL Data Transfer

Source Server         : conn
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_planeadventures

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-25 20:58:23
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tb_koleksi`
-- ----------------------------
DROP TABLE IF EXISTS `tb_koleksi`;
CREATE TABLE `tb_koleksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `jenis koleksi` varchar(50) DEFAULT NULL,
  `skor koleksi` int(11) DEFAULT NULL,
  `skor total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_koleksi
-- ----------------------------
INSERT INTO `tb_koleksi` VALUES ('63', 'Madqi', 'Soul Stone', '50', '5245');
INSERT INTO `tb_koleksi` VALUES ('98', 'Iqdam', 'Soul Stone', '50', '220');
INSERT INTO `tb_koleksi` VALUES ('99', 'Dam', 'Soul Stone', '50', '165');
