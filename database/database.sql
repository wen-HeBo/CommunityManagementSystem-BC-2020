/*
Navicat MySQL Data Transfer

Source Server         : 111
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2020-06-13 15:10:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `AID` varchar(20) NOT NULL,
  `APASSWORD` varchar(20) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1001', '123456');

-- ----------------------------
-- Table structure for `annou`
-- ----------------------------
DROP TABLE IF EXISTS `annou`;
CREATE TABLE `annou` (
  `AHEADE` varchar(30) NOT NULL DEFAULT '',
  `ADATE` datetime(6) DEFAULT NULL,
  `ABODY` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`AHEADE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of annou
-- ----------------------------
INSERT INTO `annou` VALUES ('ssssssss', '2020-06-12 23:23:49.000000', 'aab');
INSERT INTO `annou` VALUES ('停电通知', '2020-06-13 09:30:24.000000', '<p style=\"text-align: center;\"><img src=\"../images/imgUploads/20200613_ss.jpg\" alt=\"undefined\"><img src=\"../images/imgUploads/20200612_full_res (3).jpg\" alt=\"undefined\"></p><p>1）停电结束时间可能根据天气原因和特殊情况顺延。');

-- ----------------------------
-- Table structure for `food`
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `FID` char(3) NOT NULL,
  `FNAME` varchar(10) DEFAULT NULL,
  `PRICE` decimal(3,1) DEFAULT NULL,
  `FIMG` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES ('001', '米饭', '1.0', '../images/rice.jpg');
INSERT INTO `food` VALUES ('002', '沙拉', '12.0', '../images/salad.jpg');
INSERT INTO `food` VALUES ('003', '狮子头', '16.0', '../images/food1.png');
INSERT INTO `food` VALUES ('004', '水煮肉片', '22.0', '../images/food2.jpg');
INSERT INTO `food` VALUES ('100', '狮子头', '14.0', '../images/food1.png');

-- ----------------------------
-- Table structure for `health`
-- ----------------------------
DROP TABLE IF EXISTS `health`;
CREATE TABLE `health` (
  `UID` varchar(20) NOT NULL,
  `HDATE` datetime(6) NOT NULL,
  `TRM` decimal(3,1) DEFAULT NULL,
  `TALL` decimal(5,1) DEFAULT NULL,
  `WEIGHT` decimal(3,1) DEFAULT NULL,
  `DBP` int(3) DEFAULT NULL,
  `SBP` int(3) DEFAULT NULL,
  `RATE` int(3) DEFAULT NULL,
  `SPORT` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`UID`,`HDATE`),
  CONSTRAINT `HEAUID` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of health
-- ----------------------------
INSERT INTO `health` VALUES ('whb', '2020-06-10 20:48:38.000000', '36.4', '178.0', '60.0', '72', '112', '75', '是');

-- ----------------------------
-- Table structure for `history`
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `UID` varchar(20) NOT NULL,
  `OHDATE` datetime(6) NOT NULL,
  `OHID` char(3) DEFAULT NULL,
  PRIMARY KEY (`UID`,`OHDATE`),
  CONSTRAINT `HISUID` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of history
-- ----------------------------
INSERT INTO `history` VALUES ('whb', '2020-06-06 13:36:08.000000', '002');
INSERT INTO `history` VALUES ('whb', '2020-06-06 13:36:38.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-06 13:36:56.000000', '004');
INSERT INTO `history` VALUES ('whb', '2020-06-07 14:25:17.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-08 13:37:11.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-08 13:37:25.000000', '003');
INSERT INTO `history` VALUES ('whb', '2020-06-09 13:38:14.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-10 13:38:27.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-10 13:38:40.000000', '002');
INSERT INTO `history` VALUES ('whb', '2020-06-11 13:38:56.000000', '002');
INSERT INTO `history` VALUES ('whb', '2020-06-11 13:39:07.000000', '003');
INSERT INTO `history` VALUES ('whb', '2020-06-12 13:39:25.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-12 13:39:39.000000', '004');
INSERT INTO `history` VALUES ('whb', '2020-06-12 13:39:56.000000', '003');
INSERT INTO `history` VALUES ('whb', '2020-06-13 13:40:11.000000', '003');
INSERT INTO `history` VALUES ('whb', '2020-06-13 13:40:30.000000', '002');
INSERT INTO `history` VALUES ('whb', '2020-06-13 13:40:46.000000', '004');
INSERT INTO `history` VALUES ('whb', '2020-06-14 13:40:57.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-15 13:41:11.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-15 13:41:23.000000', '002');
INSERT INTO `history` VALUES ('whb', '2020-06-15 13:41:32.000000', '003');
INSERT INTO `history` VALUES ('whb', '2020-06-16 13:41:49.000000', '001');
INSERT INTO `history` VALUES ('whb', '2020-06-16 13:42:07.000000', '003');
INSERT INTO `history` VALUES ('whb', '2020-06-16 13:42:18.000000', '002');
INSERT INTO `history` VALUES ('whb', '2020-06-16 13:42:32.000000', '004');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `UID` varchar(20) NOT NULL,
  `UPASSWORD` varchar(40) NOT NULL,
  `PHOTO` varchar(64) DEFAULT NULL,
  `NAME` varchar(5) DEFAULT NULL,
  `SEX` char(1) DEFAULT NULL,
  `TEL` varchar(12) DEFAULT NULL,
  `ADD` varchar(30) DEFAULT NULL,
  `EMAIL` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('111', '7c4a8d09ca3762af61e59520943dc26494f8941b', null, null, null, null, null, null);
INSERT INTO `user` VALUES ('whb', '7c4a8d09ca3762af61e59520943dc26494f8941b', '../images/ss.jpg', '温合博', '男', '19957823277', '6幢302', '1398933890@qq.com');
INSERT INTO `user` VALUES ('wxy', '7c222fb2927d828af22f592134e8932480637c0d', null, null, null, null, null, null);
INSERT INTO `user` VALUES ('zj', '7c4a8d09ca3762af61e59520943dc26494f8941b', null, null, null, null, null, null);
