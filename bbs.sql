/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : bbs

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-20 23:37:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bbs_administrator`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_administrator`;
CREATE TABLE `bbs_administrator` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `phone` varchar(20) NOT NULL COMMENT '联系电话',
  `auth_id` tinyint(1) DEFAULT '1' COMMENT '1超级管理员 2普通管理员',
  `last_login_ip` int(10) DEFAULT '1' COMMENT '上次登陆ip',
  `login_times` mediumint(9) DEFAULT '0' COMMENT '登陆次数',
  `status` tinyint(1) DEFAULT '1' COMMENT '1正常   2冻结',
  `is_del` tinyint(1) DEFAULT '1' COMMENT '1未删除   2已删除',
  `verify_token` char(32) DEFAULT '' COMMENT '仿伪验证token',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of bbs_administrator
-- ----------------------------
INSERT INTO `bbs_administrator` VALUES ('1', 'zhouqi', 'e10adc3949ba59abbe56e057f20f883e', '15162550544', '1', '1', '14', '1', '1', '73d9cbfef7a4ac1a6c53e168dd0ced9b', '1505748803', '1504836050');
INSERT INTO `bbs_administrator` VALUES ('2', '1', 'c4ca4238a0b923820dcc509a6f75849b', '12', '1', '1', '0', '1', '2', '', '1505041245', '1505041063');

-- ----------------------------
-- Table structure for `bbs_banner`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_banner`;
CREATE TABLE `bbs_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(90) NOT NULL COMMENT '轮播图名称',
  `pic` varchar(80) NOT NULL COMMENT '图片链接',
  `link` varchar(255) NOT NULL COMMENT '跳转链接',
  `sort` tinyint(4) DEFAULT '60' COMMENT '排序值',
  `status` tinyint(1) DEFAULT '2' COMMENT '是否前台显示   1显示  2不显示',
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_banner
-- ----------------------------
INSERT INTO `bbs_banner` VALUES ('13', '网易云课堂', 'http://ovxzi670j.bkt.clouddn.com/bbs_banner_ce573201709172026059162.png', 'http://study.163.com', '100', '1', '2017-09-17', '2018-09-06', '1505651208', '1505651208');
INSERT INTO `bbs_banner` VALUES ('14', '慕课网', 'http://ovxzi670j.bkt.clouddn.com/bbs_banner_7b966201709172030155113.jpg', 'http://www.imooc.com/', '90', '1', '2017-09-17', '2018-09-17', '1505651437', '1505651437');
INSERT INTO `bbs_banner` VALUES ('15', '百度搜索', 'http://ovxzi670j.bkt.clouddn.com/bbs_banner_f4e59201709172032128016.jpg', 'http://www.baidu.com', '60', '1', '2017-09-17', '2018-09-17', '1505651557', '1505651557');

-- ----------------------------
-- Table structure for `bbs_category`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_category`;
CREATE TABLE `bbs_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `status` tinyint(1) DEFAULT '1' COMMENT '1显示  2不显示',
  `sort` tinyint(4) DEFAULT '60' COMMENT '排序值',
  `link` varchar(120) NOT NULL COMMENT '链接',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='首页导航分类';

-- ----------------------------
-- Records of bbs_category
-- ----------------------------
INSERT INTO `bbs_category` VALUES ('2', '首页', '1', '100', '/', '1505652864', '1505652864');
INSERT INTO `bbs_category` VALUES ('3', '论坛', '1', '90', '/forum', '1505652877', '1505652877');
INSERT INTO `bbs_category` VALUES ('4', '资讯', '1', '80', '/information', '1505652891', '1505652891');

-- ----------------------------
-- Table structure for `bbs_information`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_information`;
CREATE TABLE `bbs_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(60) DEFAULT '有的人',
  `title` varchar(120) NOT NULL COMMENT '文章标题',
  `pic` varchar(80) NOT NULL COMMENT '文章图片链接',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态  1显示  2冻结',
  `content` text NOT NULL COMMENT '文章内容',
  `brief` varchar(255) DEFAULT '' COMMENT '文章简要，以第一个句号为截点',
  `look` int(11) DEFAULT '0' COMMENT '浏览次数',
  `comment` int(11) DEFAULT '0' COMMENT '评论数量',
  `score` int(11) DEFAULT '0',
  `is_del` tinyint(1) DEFAULT '1' COMMENT '1未删除2已删除',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='资讯信息表';

-- ----------------------------
-- Records of bbs_information
-- ----------------------------
INSERT INTO `bbs_information` VALUES ('2', '有的人', '学编程论坛欢迎你', 'http://ovxzi670j.bkt.clouddn.com/bbs_information_1e141201709172036396422.jpg', '1', '<p>&nbsp;&nbsp; &nbsp; &nbsp;欢迎来到学编程论坛，本论坛是使用Thinkphp5搭建的论坛，目前还在初期阶段。</p><p>&nbsp; &nbsp; &nbsp; 本论坛的主要目的就是为了和大家一起讨论PHP学习中遇到的一些困难，在不断的解决困难中，提升大家的解决问题能力。</p><p>&nbsp; &nbsp; &nbsp; 我也是一个刚学习PHP不久的程序员，但是我希望可以和大家一起努力。</p><p>&nbsp; &nbsp; &nbsp; 编程的路上，我们一起前行！</p>', '<p>&nbsp;&nbsp; &nbsp; &nbsp;欢迎来到学编程论坛，本论坛是使用Thinkphp5搭建的论坛，目前还在初期阶段。</p>', '1', '0', '259200', '1', '1505652706', '1505652326');

-- ----------------------------
-- Table structure for `bbs_link`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_link`;
CREATE TABLE `bbs_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(69) NOT NULL COMMENT '链接名称',
  `link` varchar(255) NOT NULL COMMENT '链接地址',
  `sort` tinyint(4) DEFAULT '50' COMMENT '排序值',
  `start_time` date DEFAULT NULL COMMENT '开始时间',
  `end_time` date DEFAULT NULL COMMENT '结束时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态 1 显示 2不显示',
  `update_time` int(11) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of bbs_link
-- ----------------------------
INSERT INTO `bbs_link` VALUES ('3', '网易云课堂', 'http://study.163.com', '100', '2017-09-17', '2018-09-13', '1', '1505634778', '1505634692');
INSERT INTO `bbs_link` VALUES ('4', '慕课网', 'http://imooc.com', '80', '2017-09-17', '2018-09-10', '1', '1505654056', '1505654056');

-- ----------------------------
-- Table structure for `bbs_module`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_module`;
CREATE TABLE `bbs_module` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `link` varchar(60) DEFAULT '' COMMENT '模块跳转链接',
  `sort` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1显示   2不显示',
  `pid` int(11) DEFAULT '0' COMMENT '父级分模块id(如果有)',
  `post_num` mediumint(9) DEFAULT '0' COMMENT '发帖数量',
  `is_del` tinyint(4) DEFAULT '1' COMMENT '1正常  2删除',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_module
-- ----------------------------
INSERT INTO `bbs_module` VALUES ('6', '官方区域', '', '100', '1', '0', '0', '1', '1505650269', '1505650269');
INSERT INTO `bbs_module` VALUES ('7', '技术交流', '', '90', '1', '0', '0', '1', '1505650294', '1505650294');
INSERT INTO `bbs_module` VALUES ('8', '综合区域', '', '80', '1', '0', '0', '1', '1505650319', '1505650319');
INSERT INTO `bbs_module` VALUES ('9', '官方公告', '', '100', '1', '6', '0', '1', '1505650348', '1505650348');
INSERT INTO `bbs_module` VALUES ('10', '官方活动', '', '100', '1', '6', '0', '1', '1505650420', '1505650420');
INSERT INTO `bbs_module` VALUES ('11', 'PHP', '', '90', '1', '7', '0', '1', '1505650454', '1505650454');
INSERT INTO `bbs_module` VALUES ('12', 'MYSQL', '', '90', '1', '7', '0', '1', '1505650466', '1505650466');
INSERT INTO `bbs_module` VALUES ('13', 'javasacript', '', '90', '1', '7', '0', '1', '1505650498', '1505650498');
INSERT INTO `bbs_module` VALUES ('14', 'THINKPHP5', '', '90', '1', '7', '0', '1', '1505650521', '1505650521');
INSERT INTO `bbs_module` VALUES ('15', '书籍推荐', '', '80', '1', '8', '0', '1', '1505650561', '1505650561');
INSERT INTO `bbs_module` VALUES ('16', '视频推荐', '', '80', '1', '8', '0', '1', '1505650580', '1505650580');

-- ----------------------------
-- Table structure for `bbs_users`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_users`;
CREATE TABLE `bbs_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `nickname` varchar(60) NOT NULL COMMENT '用户昵称,默认为username',
  `email` varchar(60) NOT NULL COMMENT '邮箱地址',
  `sex` tinyint(1) DEFAULT '0' COMMENT '1男 2女 0未知',
  `headimg` varchar(255) DEFAULT '' COMMENT '头像',
  `level_id` tinyint(4) DEFAULT '1' COMMENT '用户等级',
  `bakname` varchar(20) DEFAULT '' COMMENT '备注',
  `status` tinyint(1) DEFAULT '1' COMMENT '1正常   2冻结',
  `points` int(11) DEFAULT '0' COMMENT '用户积分',
  `post_num` mediumint(9) DEFAULT '0' COMMENT '发帖数量',
  `copy_num` mediumint(9) DEFAULT '0' COMMENT '回帖数量',
  `birth_day` date DEFAULT '1994-01-01',
  `is_validate` tinyint(1) DEFAULT '0' COMMENT '是否验证邮箱',
  `login_times` mediumint(9) DEFAULT '0' COMMENT '登陆次数',
  `last_login_ip` varchar(15) DEFAULT '' COMMENT '上一次登陆ip',
  `province` varchar(5) DEFAULT '' COMMENT '登陆省份',
  `city` varchar(20) DEFAULT '' COMMENT '登陆城市',
  `reg_province` varchar(5) DEFAULT '' COMMENT '注册时所在省份',
  `reg_city` varchar(20) DEFAULT '' COMMENT '注册时所在城市',
  `verify_token` char(32) DEFAULT '',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_users
-- ----------------------------
INSERT INTO `bbs_users` VALUES ('1', 'zhouqi', '123456', 'zhouqi', '445864742@qq.com', '0', '', '1', '', '1', '0', '0', '0', '1994-01-01', '1', '5', '127.0.0.1', '浙江省', '杭州市', '浙江省', '杭州市', '', '1505920625', '1505914433');

-- ----------------------------
-- Table structure for `bbs_users_hash`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_users_hash`;
CREATE TABLE `bbs_users_hash` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `hash` varchar(255) NOT NULL COMMENT 'hash值',
  `end_time` int(11) NOT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_users_hash
-- ----------------------------
INSERT INTO `bbs_users_hash` VALUES ('3', '10', '12379ae4e4e7fe3eb22af9f01eae450d', '1506000833');
