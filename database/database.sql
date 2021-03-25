/*
Navicat MySQL Data Transfer

Source Server         : 1
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : database

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2021-03-25 18:06:32
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
-- Table structure for `advise`
-- ----------------------------
DROP TABLE IF EXISTS `advise`;
CREATE TABLE `advise` (
  `symptom` varchar(255) NOT NULL,
  `advice` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`symptom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of advise
-- ----------------------------
INSERT INTO `advise` VALUES ('high_blood_food', '减少钠盐摄入，增加膳食中的钾摄入。');
INSERT INTO `advise` VALUES ('high_blood_sport', '运动前需进行专业评估，每周保持中等强度运动4-7次。');
INSERT INTO `advise` VALUES ('high_bmi_food', '控制日常饮食,油炸等高热量食物不能摄入。');
INSERT INTO `advise` VALUES ('high_bmi_sport', '每天建议累计低强度运动30分钟，如走路、游泳等。');
INSERT INTO `advise` VALUES ('high_rate_food', '饮食低脂肪，低动物蛋白，低热量，低盐，低糖，高维生素和多纤维素。');
INSERT INTO `advise` VALUES ('high_rate_sport', '不适合剧烈运动，可以进行平缓的有氧运动。');
INSERT INTO `advise` VALUES ('high_temp_food', '宜吃富含维生素的水果和蔬菜；忌吃油腻的食物。');
INSERT INTO `advise` VALUES ('high_temp_sport', '不建议进行运动。');
INSERT INTO `advise` VALUES ('low_blood_food', '多喝水；食用适量的盐，少食多餐。');
INSERT INTO `advise` VALUES ('low_blood_sport', '适当增强锻炼，以便改善血管的调节功能。');
INSERT INTO `advise` VALUES ('low_bmi_food', '进食高质量蛋白质、维生素及矿物质。');
INSERT INTO `advise` VALUES ('low_bmi_sport', '以无氧运动为主，一周一次，一次不要超过一个小时。');
INSERT INTO `advise` VALUES ('low_rate_food', '多吃一些新鲜的蔬菜水果、低脂、低胆固醇的食物。');
INSERT INTO `advise` VALUES ('low_rate_sport', '进行耐力性的有氧练习比如长跑，游泳，有氧操等。');
INSERT INTO `advise` VALUES ('low_temp_food', '宜吃碳水化合物含量高的食物；忌吃寒凉性的食物。');
INSERT INTO `advise` VALUES ('low_temp_sport', '适当的运动增加血容量、肌肉量，提高机体的代谢能力。');

-- ----------------------------
-- Table structure for `annou`
-- ----------------------------
DROP TABLE IF EXISTS `annou`;
CREATE TABLE `annou` (
  `AHEADE` varchar(30) NOT NULL DEFAULT '',
  `ADATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ABODY` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ADATE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of annou
-- ----------------------------
INSERT INTO `annou` VALUES ('多国人士继续积极评价《抗击新冠肺炎疫情的中国行动》白皮书', '2020-06-10 08:02:00', '新华社北京6月10日电 综合新华社驻外记者报道：中国日前发布《抗击新冠肺炎疫情的中国行动》白皮书，记录了中国抗击新冠肺炎疫情的艰辛历程和有效做法，阐明了全球抗疫的中国理念、中国主张。多国官员、专家等继续对此积极评价，认为中国经验值得他国借鉴，还对中国提供抗疫援助表示感谢。');
INSERT INTO `annou` VALUES ('6月10日最新疫情通报︱杭州无新增！', '2020-06-13 11:00:48', '6月9日0-24时，全市无新增新冠肺炎本地确诊病例、境外输入确诊病例和无症状感染者。\n截至6月9日24时，全市累计报告新冠肺炎确诊病例为169例和根据国家要求重新纳入我市的病例12例（即2月10日国家核减的在我市治愈的TR188新加坡航班湖北籍病例9例和河南籍病例3例）以及境外输入病例6例，已全部治愈出院。全市连续111天无新增本地确诊病例。');
INSERT INTO `annou` VALUES ('杭州师范大学', '2020-06-15 17:06:00', '杭州师范大学杭州师范大学杭州师范大学杭州师范大学杭州师范大学');
INSERT INTO `annou` VALUES ('新冠肺炎', '2021-03-03 12:47:09', '新冠肺炎，武汉爆发。');
INSERT INTO `annou` VALUES ('夜以继日攻关！我国疫苗研发为疫情防控斗争提供坚强支撑', '2021-03-03 16:03:40', '我国5个已获批开展临床试验的新冠病毒疫苗，有望今年7月陆续完成二期临床试验。这在全球进入临床试验阶段的疫苗中占了“半壁江山”。\n\n立足于多年积累的科研基础，我国科技界集中优质资源，争分夺秒开展攻关。在确保安全有效、标准不降的前提下，最大限度提速疫苗研发，为本国和全球应对新冠肺炎疫情提供有力支撑。');
INSERT INTO `annou` VALUES ('ppKritt', '2021-03-25 16:11:11', '<img src=\"../images/imgUploads/20210325_pp6.jpg\" alt=\"undefined\">');
INSERT INTO `annou` VALUES ('测试', '2021-03-25 17:44:46', '123');

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
INSERT INTO `food` VALUES ('001', '剁椒鱼头', '48.0', '../images/duojiaoyutou.jpg');
INSERT INTO `food` VALUES ('002', '沙拉', '12.0', '../images/salad.jpg');
INSERT INTO `food` VALUES ('003', '狮子头', '16.0', '../images/food1.png');
INSERT INTO `food` VALUES ('004', '水煮肉片', '22.0', '../images/food2.jpg');
INSERT INTO `food` VALUES ('005', '牛肉', '32.0', '../images/beaf.jpg');
INSERT INTO `food` VALUES ('006', '红烧肉', '22.0', '../images/hongshaochaocai.jpg');

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
INSERT INTO `health` VALUES ('whb', '2021-03-02 18:49:01.000000', '36.7', '177.8', '61.9', '88', '114', '66', '否');
INSERT INTO `health` VALUES ('whb', '2021-03-10 19:06:46.000000', '36.5', '178.2', '61.3', '71', '117', '73', '否');
INSERT INTO `health` VALUES ('whb ', '2021-03-11 18:48:05.000000', '36.0', '178.0', '60.8', '80', '118', '68', '是');
INSERT INTO `health` VALUES ('whb', '2021-03-20 18:45:40.000000', '36.2', '178.0', '60.1', '83', '116', '73', '是');
INSERT INTO `health` VALUES ('whb', '2021-03-22 18:45:29.000000', '36.5', '178.2', '62.0', '78', '120', '78', '否');
INSERT INTO `health` VALUES ('whb', '2021-03-23 18:45:06.000000', '36.4', '178.0', '61.0', '77', '110', '65', '是');
INSERT INTO `health` VALUES ('whb', '2021-03-24 18:45:01.000000', '36.7', '178.3', '60.0', '76', '115', '68', '否');

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
INSERT INTO `history` VALUES ('whb', '2021-03-18 13:42:32.000000', '004');
INSERT INTO `history` VALUES ('whb', '2021-03-25 02:25:55.000000', '001');
INSERT INTO `history` VALUES ('whb', '2021-03-25 02:30:27.000000', '002');

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
INSERT INTO `user` VALUES ('whb', '7c4a8d09ca3762af61e59520943dc26494f8941b', '../images/', 'ppKri', '男', '12345678977', '6幢302', 'whbwhb@qq.com');
