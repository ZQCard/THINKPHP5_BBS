/*
Navicat MySQL Data Transfer

Source Server         : jingo
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : bbs

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-10-10 17:26:06
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
  `headimg` varchar(255) DEFAULT '__STATIC__/index/images/github.png',
  `message_num` int(11) DEFAULT '0' COMMENT '未读消息数量',
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of bbs_administrator
-- ----------------------------
INSERT INTO `bbs_administrator` VALUES ('1', 'zhouqi', 'e10adc3949ba59abbe56e057f20f883e', '__STATIC__/index/images/github.png\r\n', '4', '15162550544', '1', '1', '17', '2', '1', 'b77aa0455bc45dafa0bd16d3f8d4e456', '1507625186', '1504836050');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='首页轮播图表';

-- ----------------------------
-- Records of bbs_banner
-- ----------------------------
INSERT INTO `bbs_banner` VALUES ('13', '网易云课堂', 'http://ovxzi670j.bkt.clouddn.com/bbs_banner_ce573201709172026059162.png', 'http://study.163.com', '100', '1', '2017-09-17', '2018-09-06', '1505651208', '1505651208');
INSERT INTO `bbs_banner` VALUES ('14', '慕课网', 'http://ovxzi670j.bkt.clouddn.com/bbs_banner_7b966201709172030155113.jpg', 'http://www.imooc.com/', '90', '1', '2017-09-17', '2018-09-17', '1505651437', '1505651437');
INSERT INTO `bbs_banner` VALUES ('15', '百度搜索', 'http://ovxzi670j.bkt.clouddn.com/bbs_banner_f4e59201709172032128016.jpg', 'http://www.baidu.com', '60', '1', '2017-09-17', '2018-09-17', '1505651557', '1505651557');

-- ----------------------------
-- Table structure for `bbs_blacklist`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_blacklist`;
CREATE TABLE `bbs_blacklist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `end_time` int(11) NOT NULL COMMENT '结束时间',
  `ip` int(11) NOT NULL COMMENT 'ip地址',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1用户冻结   2ip冻结',
  `number` smallint(6) NOT NULL,
  `message` varchar(255) DEFAULT '' COMMENT '冻结原因',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='黑名单表';

-- ----------------------------
-- Records of bbs_blacklist
-- ----------------------------

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
-- Table structure for `bbs_config`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_config`;
CREATE TABLE `bbs_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(60) NOT NULL COMMENT '名称',
  `value` text NOT NULL COMMENT '值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='//论坛全局配置表';

-- ----------------------------
-- Records of bbs_config
-- ----------------------------
INSERT INTO `bbs_config` VALUES ('1', 'keywords', '学编程,PHP论坛,PHP学习');
INSERT INTO `bbs_config` VALUES ('2', 'description', '学编程，PHP论坛，新手共同学习PHP，PHP资料推荐');

-- ----------------------------
-- Table structure for `bbs_day_posts`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_day_posts`;
CREATE TABLE `bbs_day_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL COMMENT '模块id',
  `post_num` int(11) DEFAULT '1' COMMENT '数量',
  `date` date NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='每日每个模块发帖统计';

-- ----------------------------
-- Records of bbs_day_posts
-- ----------------------------
INSERT INTO `bbs_day_posts` VALUES ('1', '9', '2', '2017-09-30');
INSERT INTO `bbs_day_posts` VALUES ('2', '10', '1', '2017-09-30');
INSERT INTO `bbs_day_posts` VALUES ('3', '11', '1', '2017-09-30');
INSERT INTO `bbs_day_posts` VALUES ('4', '12', '1', '2017-09-30');
INSERT INTO `bbs_day_posts` VALUES ('5', '13', '1', '2017-09-30');
INSERT INTO `bbs_day_posts` VALUES ('6', '14', '1', '2017-09-30');
INSERT INTO `bbs_day_posts` VALUES ('7', '15', '1', '2017-09-30');
INSERT INTO `bbs_day_posts` VALUES ('8', '16', '1', '2017-09-30');
INSERT INTO `bbs_day_posts` VALUES ('9', '9', '2', '2017-10-09');

-- ----------------------------
-- Table structure for `bbs_email_log`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_email_log`;
CREATE TABLE `bbs_email_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `times` int(11) NOT NULL,
  `limit_times` tinyint(4) DEFAULT '20',
  `send_time` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='//邮箱发送记录表';

-- ----------------------------
-- Records of bbs_email_log
-- ----------------------------
INSERT INTO `bbs_email_log` VALUES ('5', '4', '1', '20', '2017-09-28');

-- ----------------------------
-- Table structure for `bbs_information`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_information`;
CREATE TABLE `bbs_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(60) DEFAULT '有的人',
  `post_user_id` int(11) NOT NULL COMMENT '发送者id',
  `title` varchar(120) NOT NULL COMMENT '文章标题',
  `pic` varchar(80) NOT NULL COMMENT '文章图片链接',
  `keywords` varchar(255) DEFAULT '',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态  1显示  2冻结',
  `content` text NOT NULL COMMENT '文章内容',
  `brief` varchar(255) DEFAULT '' COMMENT '文章简要，以第一个句号为截点',
  `look` int(11) DEFAULT '0' COMMENT '浏览次数',
  `comment` int(11) DEFAULT '0' COMMENT '评论数量',
  `score` int(11) DEFAULT '0',
  `is_del` tinyint(1) DEFAULT '1' COMMENT '1未删除2已删除',
  `type` tinyint(1) DEFAULT '1' COMMENT '1管理员发的咨询2用户发的咨询',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='资讯信息表';

-- ----------------------------
-- Records of bbs_information
-- ----------------------------
INSERT INTO `bbs_information` VALUES ('2', '有的人', '1', '学编程论坛欢迎你', 'http://ovxzi670j.bkt.clouddn.com/bbs_information_1e141201709172036396422.jpg', '学编程论坛欢迎你', '1', '<p>      欢迎来到学编程论坛，本论坛是使用Thinkphp5搭建的论坛，目前还在初期阶段。</p><p>      本论坛的主要目的就是为了和大家一起讨论PHP学习中遇到的一些困难，在不断的解决困难中，提升大家的解决问题能力。</p><p>      我也是一个刚学习PHP不久的程序员，但是我希望可以和大家一起努力。</p><p>      编程的路上，我们一起前行！</p>', '<p>      欢迎来到学编程论坛，本论坛是使用Thinkphp5搭建的论坛，目前还在初期阶段。</p>', '814', '5', '70502400', '1', '1', '1506300597', '1505652326');

-- ----------------------------
-- Table structure for `bbs_information_comment`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_information_comment`;
CREATE TABLE `bbs_information_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `information_id` int(11) NOT NULL COMMENT '发送的信息id',
  `post_user_id` int(11) NOT NULL COMMENT '发送用户id',
  `reply_user_id` int(11) NOT NULL COMMENT '回复用户id',
  `reply_user_name` varchar(60) NOT NULL COMMENT '回复者昵称',
  `upvote` mediumint(9) DEFAULT '0' COMMENT '点赞票数',
  `upvote_user` text COMMENT '点赞用户序列化子字符串',
  `oppose` mediumint(9) DEFAULT '0' COMMENT '反对票数',
  `oppose_user` text COMMENT '返回用户序列化字符串',
  `status` tinyint(1) DEFAULT '1' COMMENT '0删除1正常',
  `content` text,
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='消息表';

-- ----------------------------
-- Records of bbs_information_comment
-- ----------------------------
INSERT INTO `bbs_information_comment` VALUES ('34', '2', '1', '1', 'zhouqi', '0', 'a:0:{}', '0', null, '1', '加油', '1506581311', '1506581311');
INSERT INTO `bbs_information_comment` VALUES ('35', '2', '1', '1', 'zhouqi', '0', 'a:0:{}', '0', null, '1', '<img src=\"http://www.studycoding.top/static/plugins/kindeditor/plugins/emoticons/images/0.gif\" border=\"0\" alt=\"\" />', '1506581957', '1506581957');
INSERT INTO `bbs_information_comment` VALUES ('36', '2', '1', '1', 'zhouqi', '0', null, '0', null, '1', '<img src=\"http://www.studycoding.top/static/plugins/kindeditor/plugins/emoticons/images/0.gif\" border=\"0\" alt=\"\" />', '1507615165', '1507615165');
INSERT INTO `bbs_information_comment` VALUES ('37', '2', '1', '1', 'zhouqi', '0', null, '0', null, '1', '<img src=\"http://www.studycoding.top/static/plugins/kindeditor/plugins/emoticons/images/0.gif\" border=\"0\" alt=\"\" />', '1507615174', '1507615174');
INSERT INTO `bbs_information_comment` VALUES ('38', '2', '1', '1', 'zhouqi', '0', null, '0', null, '1', '<img src=\"http://www.studycoding.top/static/plugins/kindeditor/plugins/emoticons/images/0.gif\" border=\"0\" alt=\"\" />', '1507615257', '1507615257');

-- ----------------------------
-- Table structure for `bbs_level`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_level`;
CREATE TABLE `bbs_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `point` mediumint(9) NOT NULL COMMENT '积分',
  `name` varchar(6) DEFAULT NULL,
  `icon` varchar(80) DEFAULT '' COMMENT '等级图标',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='等级表';

-- ----------------------------
-- Records of bbs_level
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of bbs_link
-- ----------------------------
INSERT INTO `bbs_link` VALUES ('3', '网易云课堂', 'http://study.163.com', '100', '2017-09-17', '2018-09-13', '1', '1505634778', '1505634692');
INSERT INTO `bbs_link` VALUES ('4', '慕课网', 'http://imooc.com', '80', '2017-09-17', '2018-09-10', '1', '1505654056', '1505654056');

-- ----------------------------
-- Table structure for `bbs_message`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_message`;
CREATE TABLE `bbs_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_user_id` int(11) NOT NULL COMMENT '推送者id',
  `post_user_name` varchar(60) NOT NULL COMMENT '推送者名称',
  `get_user_id` int(11) NOT NULL COMMENT '接收者id',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `content_id` int(11) NOT NULL COMMENT '相关内容id',
  `type` tinyint(1) DEFAULT '1' COMMENT '消息类型1资讯2点赞',
  `has_read` tinyint(4) DEFAULT '0' COMMENT '0未读1已读',
  `user_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '接收者类型 1管理员 2用户',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='//消息处理表';

-- ----------------------------
-- Records of bbs_message
-- ----------------------------
INSERT INTO `bbs_message` VALUES ('1', '1', 'zhouqi', '1', '评论咨询', '2', '1', '0', '1', '1506504513', '1506504513');
INSERT INTO `bbs_message` VALUES ('2', '1', 'zhouqi', '1', '评论咨询', '2', '1', '0', '1', '1506504527', '1506504527');
INSERT INTO `bbs_message` VALUES ('3', '4', 'zhouqi', '1', '评论咨询', '2', '1', '0', '1', '1506581311', '1506581311');
INSERT INTO `bbs_message` VALUES ('4', '4', 'zhouqi', '1', '评论咨询', '2', '1', '0', '1', '1506581957', '1506581957');
INSERT INTO `bbs_message` VALUES ('5', '4', 'zhouqi', '4', '点赞成功', '35', '2', '0', '2', '1506665493', '1506665493');
INSERT INTO `bbs_message` VALUES ('6', '4', 'zhouqi', '4', '点赞成功', '34', '2', '0', '2', '1506665508', '1506665508');
INSERT INTO `bbs_message` VALUES ('7', '0', '', '4', '点赞成功', '35', '2', '0', '2', '1506741891', '1506741891');
INSERT INTO `bbs_message` VALUES ('8', '1', 'zhouqi', '1', '点赞成功', '35', '2', '0', '2', '1506753022', '1506753022');
INSERT INTO `bbs_message` VALUES ('9', '1', 'zhouqi', '1', '点赞成功', '35', '2', '0', '2', '1506753106', '1506753106');
INSERT INTO `bbs_message` VALUES ('10', '0', '', '1', '点赞成功', '35', '2', '0', '2', '1506753365', '1506753365');
INSERT INTO `bbs_message` VALUES ('11', '0', '', '1', '点赞成功', '35', '2', '0', '2', '1506754095', '1506754095');
INSERT INTO `bbs_message` VALUES ('12', '0', '', '1', '点赞成功', '34', '2', '0', '2', '1506754105', '1506754105');
INSERT INTO `bbs_message` VALUES ('13', '1', 'zhouqi', '1', '点赞成功', '35', '2', '0', '2', '1507535547', '1507535547');
INSERT INTO `bbs_message` VALUES ('14', '1', 'zhouqi', '1', '点赞成功', '34', '2', '0', '2', '1507535667', '1507535667');

-- ----------------------------
-- Table structure for `bbs_module`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_module`;
CREATE TABLE `bbs_module` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `pic` varchar(80) DEFAULT '' COMMENT '模块缩略图',
  `status` tinyint(4) DEFAULT '1' COMMENT '1显示   2不显示',
  `pid` int(11) DEFAULT '0' COMMENT '父级分模块id(如果有)',
  `look_num` int(11) DEFAULT '0' COMMENT '浏览数',
  `post_num` mediumint(9) DEFAULT '0' COMMENT '发帖数量',
  `is_del` tinyint(4) DEFAULT '1' COMMENT '1正常  2删除',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='模块表';

-- ----------------------------
-- Records of bbs_module
-- ----------------------------
INSERT INTO `bbs_module` VALUES ('6', '官方区域', '100', '', '1', '0', '0', '0', '1', '1506001535', '1505650269');
INSERT INTO `bbs_module` VALUES ('7', '技术交流', '90', null, '1', '0', '0', '0', '1', '1505650294', '1505650294');
INSERT INTO `bbs_module` VALUES ('8', '综合区域', '80', null, '1', '0', '0', '0', '1', '1505650319', '1505650319');
INSERT INTO `bbs_module` VALUES ('9', '官方公告', '100', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_8899d201709212156474876.jpg', '1', '6', '0', '2', '1', '1506002208', '1505650348');
INSERT INTO `bbs_module` VALUES ('10', '官方活动', '100', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_2626a201709212158323453.jpg', '1', '6', '0', '0', '1', '1505650420', '1505650420');
INSERT INTO `bbs_module` VALUES ('11', 'PHP', '90', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_a37e8201709212159353186.jpg', '1', '7', '0', '0', '1', '1505650454', '1505650454');
INSERT INTO `bbs_module` VALUES ('12', 'MYSQL', '90', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_408e7201709212200332049.jpg', '1', '7', '0', '0', '1', '1505650466', '1505650466');
INSERT INTO `bbs_module` VALUES ('13', 'javascript', '90', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_cf05d201709212202176667.jpg', '1', '7', '0', '0', '1', '1505650498', '1505650498');
INSERT INTO `bbs_module` VALUES ('14', 'JAVA', '90', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_bac98201709291632532491.jpg', '1', '7', '0', '0', '1', '1506673974', '1505650521');
INSERT INTO `bbs_module` VALUES ('15', '书籍推荐', '80', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_c014420170921220436592.jpg', '1', '8', '0', '0', '1', '1505650561', '1505650561');
INSERT INTO `bbs_module` VALUES ('16', '视频推荐', '80', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_a63fd201709212205202428.jpg', '1', '8', '0', '0', '1', '1505650580', '1505650580');

-- ----------------------------
-- Table structure for `bbs_posts`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_posts`;
CREATE TABLE `bbs_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL COMMENT '标题',
  `user_id` int(11) unsigned zerofill NOT NULL COMMENT '发帖人id',
  `user_type` tinyint(4) NOT NULL COMMENT '发帖用户类型 1管理员2用户',
  `content` text NOT NULL COMMENT '帖子内容',
  `is_top` tinyint(1) DEFAULT '2' COMMENT '是否置顶  1置顶  2不置顶',
  `is_good` tinyint(1) DEFAULT '2' COMMENT '1加精 2 普通',
  `upvote` smallint(6) DEFAULT '0' COMMENT '赞同数量',
  `lookover` smallint(6) DEFAULT '0' COMMENT '浏览数',
  `comment` smallint(6) DEFAULT '0' COMMENT '评论数',
  `module_id` int(11) NOT NULL COMMENT '所属模块id',
  `status` tinyint(1) DEFAULT '1' COMMENT '1显示2隐藏',
  `score` int(11) NOT NULL COMMENT '帖子评分',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='帖子表';

-- ----------------------------
-- Records of bbs_posts
-- ----------------------------
INSERT INTO `bbs_posts` VALUES ('5', '测试发帖', '00000000001', '2', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '2', '1', '0', '5', '6', '9', '1', '1506760385', '1506760385', '1506760385');
INSERT INTO `bbs_posts` VALUES ('6', '2', '00000000001', '1', '2', '2', '2', '0', '0', '0', '9', '1', '1506760399', '1506760399', '1506760399');

-- ----------------------------
-- Table structure for `bbs_posts_comment`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_posts_comment`;
CREATE TABLE `bbs_posts_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL COMMENT '发送的信息id',
  `post_user_id` int(11) NOT NULL COMMENT '发送用户id',
  `user_type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '用户类型1管理员2用户',
  `reply_user_id` int(11) NOT NULL COMMENT '回复用户id',
  `reply_user_name` varchar(60) NOT NULL COMMENT '回复者昵称',
  `upvote` mediumint(9) DEFAULT '0' COMMENT '点赞票数',
  `upvote_user` text COMMENT '点赞用户序列化子字符串',
  `oppose` mediumint(9) DEFAULT '0' COMMENT '反对票数',
  `oppose_user` text COMMENT '返回用户序列化字符串',
  `status` tinyint(1) DEFAULT '1' COMMENT '0删除1正常',
  `content` text,
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='消息表';

-- ----------------------------
-- Records of bbs_posts_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `bbs_test`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_test`;
CREATE TABLE `bbs_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='//测试用表';

-- ----------------------------
-- Records of bbs_test
-- ----------------------------
INSERT INTO `bbs_test` VALUES ('1', '你好');
INSERT INTO `bbs_test` VALUES ('2', '你好<img src=\"http://www.studycoding.top/static/plugins/kindeditor/plugins/emoticons/images/0.gif\" border=\"0\" alt=\"\" />');

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
  `headimg` varchar(255) DEFAULT 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1506591795397&di=266137a6652547caaf9c4495024846c1&imgtype=0&src=http%3A%2F%2Fimg.130158.com%2Fuploads%2Fi_1_3610704133x3947436040_21.jpg' COMMENT '头像',
  `level_id` tinyint(4) DEFAULT '1' COMMENT '用户等级',
  `bakname` varchar(20) DEFAULT '' COMMENT '备注',
  `status` tinyint(1) DEFAULT '1' COMMENT '1正常   2冻结',
  `points` int(11) DEFAULT '0' COMMENT '用户积分',
  `post_num` mediumint(9) DEFAULT '0' COMMENT '发帖数量',
  `copy_num` mediumint(9) DEFAULT '0' COMMENT '回帖数量',
  `message_num` int(11) DEFAULT '0' COMMENT '消息数量',
  `fans_num` int(11) DEFAULT '0' COMMENT '粉丝数量',
  `birth_day` date DEFAULT '1994-01-01',
  `is_validate` tinyint(1) DEFAULT '0' COMMENT '是否验证邮箱',
  `login_times` mediumint(9) DEFAULT '0' COMMENT '登陆次数',
  `last_login_ip` varchar(15) DEFAULT '' COMMENT '上一次登陆ip',
  `province` varchar(5) DEFAULT '' COMMENT '登陆省份',
  `city` varchar(20) DEFAULT '' COMMENT '登陆城市',
  `reg_province` varchar(5) DEFAULT '' COMMENT '注册时所在省份',
  `reg_city` varchar(20) DEFAULT '' COMMENT '注册时所在城市',
  `verify_token` char(32) DEFAULT '' COMMENT '邮箱验证token',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of bbs_users
-- ----------------------------
INSERT INTO `bbs_users` VALUES ('1', 'zhouqi', '123456', '有的人', '445864742@qq.com', '0', '__STATIC__/index/images/github.png', '1', '', '1', '0', '0', '0', '10', '0', '1994-01-01', '1', '9', '127.0.0.1', '浙江省', '杭州市', '浙江省', '杭州市', '952dc096c933346d44e86309e358976d', '1507614884', '1506580785');

-- ----------------------------
-- Table structure for `bbs_users_hash`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_users_hash`;
CREATE TABLE `bbs_users_hash` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `hash` varchar(255) NOT NULL COMMENT 'hash值',
  `end_time` int(11) NOT NULL COMMENT '过期时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='用户验证hash表';

-- ----------------------------
-- Records of bbs_users_hash
-- ----------------------------
INSERT INTO `bbs_users_hash` VALUES ('12', '4', 'aee78eeae5b61aeacb9f5881493d05a4', '1506667185');
