/*
Navicat MySQL Data Transfer

Source Server         : 118.31.1.74
Source Server Version : 50719
Source Host           : 118.31.1.74:3306
Source Database       : bbs

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2017-10-26 17:19:45
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
  `level_id` tinyint(4) DEFAULT '1' COMMENT '用户等级',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of bbs_administrator
-- ----------------------------
INSERT INTO `bbs_administrator` VALUES ('1', 'admin', '6760baccde3aff7e6b9b6b725964663b', '__STATIC__/index/images/github.png\r\n', '116', '15162550544', '1', '1', '22', '1', '1', '89ac33cba2c9f826500e7a28b86b52d8', '1', '1508767350', '1504836050');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='首页导航分类';

-- ----------------------------
-- Records of bbs_category
-- ----------------------------
INSERT INTO `bbs_category` VALUES ('24', '首页', '1', '100', '/', '1508749357', '1508745507');
INSERT INTO `bbs_category` VALUES ('25', '积分', '1', '20', '/points', '1508745517', '1508745517');
INSERT INTO `bbs_category` VALUES ('26', '论坛', '1', '90', '/forum', '1508745528', '1508745528');
INSERT INTO `bbs_category` VALUES ('27', '资讯', '1', '80', '/information', '1508745540', '1508745540');
INSERT INTO `bbs_category` VALUES ('28', '测试', '1', '1', '/test', '1508751095', '1508751036');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='每日每个模块发帖统计';

-- ----------------------------
-- Records of bbs_day_posts
-- ----------------------------
INSERT INTO `bbs_day_posts` VALUES ('12', '9', '1', '2017-10-16');
INSERT INTO `bbs_day_posts` VALUES ('13', '11', '3', '2017-10-17');
INSERT INTO `bbs_day_posts` VALUES ('14', '11', '6', '2017-10-19');
INSERT INTO `bbs_day_posts` VALUES ('15', '11', '1', '2017-10-25');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='//邮箱发送记录表';

-- ----------------------------
-- Records of bbs_email_log
-- ----------------------------

-- ----------------------------
-- Table structure for `bbs_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_favorite`;
CREATE TABLE `bbs_favorite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `article_id` int(11) NOT NULL COMMENT '文章id',
  `article_type` tinyint(1) NOT NULL COMMENT '文章类型  1咨询 2帖子',
  `article_title` varchar(255) NOT NULL COMMENT '收藏信息标题',
  `article_user_id` int(11) NOT NULL COMMENT '信息所属者昵称',
  `article_user_nickname` varchar(60) NOT NULL COMMENT '信息所属者昵称',
  `user_type` varchar(60) NOT NULL COMMENT '1管理员2用户',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收藏表';

-- ----------------------------
-- Records of bbs_favorite
-- ----------------------------

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
  `favorite_users` text COMMENT '收藏者id',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='资讯信息表';

-- ----------------------------
-- Records of bbs_information
-- ----------------------------
INSERT INTO `bbs_information` VALUES ('3', '有的人', '1', '欢迎来到学编程论坛', 'http://ovxzi670j.bkt.clouddn.com/bbs_information_8f4d2201710162224264283.jpg', '', '1', '<p>这里是一遍资讯</p>', '<p>这里是一遍资讯</p>', '287', '0', '1532960684', '1', '2', '[]', '1508394661', '1508163884');

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
  PRIMARY KEY (`id`),
  KEY `information_id` (`information_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COMMENT='消息表';

-- ----------------------------
-- Records of bbs_information_comment
-- ----------------------------
INSERT INTO `bbs_information_comment` VALUES ('111', '3', '1', '6', '有的人', '2', 'a:1:{i:0;s:1:\"8\";}', '0', null, '1', '11111', '1508477141', '1508477141');

-- ----------------------------
-- Table structure for `bbs_level`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_level`;
CREATE TABLE `bbs_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `point` mediumint(9) NOT NULL COMMENT '积分',
  `name` varchar(20) DEFAULT NULL,
  `icon` varchar(80) DEFAULT '' COMMENT '等级图标',
  `number` tinyint(3) unsigned NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='等级表';

-- ----------------------------
-- Records of bbs_level
-- ----------------------------
INSERT INTO `bbs_level` VALUES ('2', '200', '月亮', 'http://ovxzi670j.bkt.clouddn.com/bbs_level_acdfe201710150957432296.png', '4', '1508032665', '1508032665');
INSERT INTO `bbs_level` VALUES ('3', '800', '太阳', 'http://ovxzi670j.bkt.clouddn.com/bbs_level_8df03201710150958223421.png', '16', '1508032704', '1508032704');
INSERT INTO `bbs_level` VALUES ('4', '3200', '皇冠', 'http://ovxzi670j.bkt.clouddn.com/bbs_level_7004e201710150958375977.png', '64', '1508032718', '1508032718');
INSERT INTO `bbs_level` VALUES ('5', '50', '星星', 'http://ovxzi670j.bkt.clouddn.com/bbs_level_bcbe2201710151021301795.png', '1', '1508034091', '1508034091');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of bbs_link
-- ----------------------------
INSERT INTO `bbs_link` VALUES ('5', '网易云课堂', 'http://study.163.com', '100', '2017-10-23', '2020-11-11', '1', '1508769130', '1508768491');
INSERT INTO `bbs_link` VALUES ('6', '慕课网', 'http://www.imooc.com/', '90', '2017-10-23', '2020-11-11', '1', '1508768525', '1508768525');

-- ----------------------------
-- Table structure for `bbs_message`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_message`;
CREATE TABLE `bbs_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_user_id` int(11) NOT NULL COMMENT '推送者id',
  `post_user_name` varchar(60) NOT NULL COMMENT '推送者名称',
  `post_user_headimg` varchar(150) DEFAULT '' COMMENT '推送者头像',
  `get_user_id` int(11) NOT NULL COMMENT '接收者id',
  `info` varchar(255) DEFAULT '' COMMENT '备注信息',
  `content_id` int(11) NOT NULL COMMENT '相关内容id',
  `content_info` varchar(255) DEFAULT '' COMMENT '信息内容',
  `type` tinyint(1) DEFAULT '1' COMMENT '消息类型1资讯2点赞3.收藏4帖子评论',
  `is_read` tinyint(4) DEFAULT '0' COMMENT '0未读1已读',
  `user_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '接收者类型 1管理员 2用户',
  `is_del` tinyint(1) DEFAULT '2' COMMENT '是否删除1删除 2未删除',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `get_user_id` (`get_user_id`) USING BTREE,
  KEY `post_user_id` (`post_user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8 COMMENT='//消息处理表';

-- ----------------------------
-- Records of bbs_message
-- ----------------------------
INSERT INTO `bbs_message` VALUES ('197', '8', 'zhouqi1', '/static/index/images/github.png', '6', '评论帖子', '15', '早上好……', '1', '1', '2', '2', '1508488843', '1508477027');
INSERT INTO `bbs_message` VALUES ('198', '8', 'zhouqi1', '/static/index/images/github.png', '6', '评论帖子', '15', '45……', '4', '0', '2', '1', '1508555728', '1508477094');
INSERT INTO `bbs_message` VALUES ('199', '6', '有的人', 'http://ovxzi670j.bkt.clouddn.com/bbs_user_headimg_74c8f201710171646176925.jpg', '1', '评论资讯', '3', '11111……', '4', '0', '1', '2', '1508477141', '1508477141');
INSERT INTO `bbs_message` VALUES ('200', '8', 'zhouqi1', '/static/index/images/github.png', '6', '收藏帖子', '15', '', '3', '1', '2', '2', '1508555722', '1508477178');
INSERT INTO `bbs_message` VALUES ('202', '8', 'zhouqi1', '/static/index/images/github.png', '6', '点赞成功', '3', '', '2', '1', '2', '2', '1508555709', '1508485156');
INSERT INTO `bbs_message` VALUES ('203', '6', '有的人', 'http://ovxzi670j.bkt.clouddn.com/bbs_user_headimg_74c8f201710171646176925.jpg', '1', '收藏你的文章', '3', '', '3', '0', '1', '2', '1508490247', '1508490247');
INSERT INTO `bbs_message` VALUES ('204', '6', '有的人', 'http://ovxzi670j.bkt.clouddn.com/bbs_user_headimg_74c8f201710171646176925.jpg', '1', '收藏你的文章', '3', '', '3', '0', '1', '2', '1508490297', '1508490297');
INSERT INTO `bbs_message` VALUES ('205', '6', '有的人', 'http://ovxzi670j.bkt.clouddn.com/bbs_user_headimg_74c8f201710171646176925.jpg', '1', '收藏你的帖子', '8', '', '3', '0', '1', '2', '1508490303', '1508490303');

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
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='模块表';

-- ----------------------------
-- Records of bbs_module
-- ----------------------------
INSERT INTO `bbs_module` VALUES ('6', '官方区域', '100', '', '1', '0', '0', '0', '1506001535', '1505650269');
INSERT INTO `bbs_module` VALUES ('7', '技术交流', '90', null, '1', '0', '0', '0', '1505650294', '1505650294');
INSERT INTO `bbs_module` VALUES ('8', '综合区域', '80', null, '1', '0', '0', '0', '1505650319', '1505650319');
INSERT INTO `bbs_module` VALUES ('9', '官方公告', '100', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_8899d201709212156474876.jpg', '1', '6', '0', '1', '1506002208', '1505650348');
INSERT INTO `bbs_module` VALUES ('10', '官方活动', '100', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_2626a201709212158323453.jpg', '1', '6', '0', '0', '1505650420', '1505650420');
INSERT INTO `bbs_module` VALUES ('11', 'PHP', '90', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_d20262017101712241531.png', '1', '7', '0', '10', '1508214257', '1505650454');
INSERT INTO `bbs_module` VALUES ('12', 'MYSQL', '90', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_6cd2820171017122426207.png', '1', '7', '0', '0', '1508214267', '1505650466');
INSERT INTO `bbs_module` VALUES ('13', 'javascript', '90', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_59992201710171224326464.png', '1', '7', '0', '0', '1508214273', '1505650498');
INSERT INTO `bbs_module` VALUES ('14', 'LINUX', '90', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_a27dc201710171224385483.png', '1', '7', '0', '0', '1508214279', '1505650521');
INSERT INTO `bbs_module` VALUES ('15', '书籍推荐', '80', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_c014420170921220436592.jpg', '1', '8', '0', '0', '1505650561', '1505650561');
INSERT INTO `bbs_module` VALUES ('16', '视频推荐', '80', 'http://ovxzi670j.bkt.clouddn.com/bbs_module_a63fd201709212205202428.jpg', '1', '8', '0', '0', '1505650580', '1505650580');

-- ----------------------------
-- Table structure for `bbs_points_log`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_points_log`;
CREATE TABLE `bbs_points_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `points` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1增加积分2减少积分',
  `bakname` varchar(60) NOT NULL COMMENT '积分备注',
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COMMENT='积分数据表';

-- ----------------------------
-- Records of bbs_points_log
-- ----------------------------
INSERT INTO `bbs_points_log` VALUES ('54', '6', '2', '1', '评论资讯', '1508395023', '1508395023');
INSERT INTO `bbs_points_log` VALUES ('55', '6', '2', '1', '评论资讯', '1508395038', '1508395038');
INSERT INTO `bbs_points_log` VALUES ('56', '6', '5', '1', '每日登录', '1508395064', '1508395064');
INSERT INTO `bbs_points_log` VALUES ('57', '6', '5', '1', '发布帖子', '1508397941', '1508397941');
INSERT INTO `bbs_points_log` VALUES ('58', '6', '5', '1', '发布帖子', '1508398272', '1508398272');
INSERT INTO `bbs_points_log` VALUES ('59', '6', '5', '1', '发布帖子', '1508398280', '1508398280');
INSERT INTO `bbs_points_log` VALUES ('60', '6', '5', '1', '发布帖子', '1508398355', '1508398355');
INSERT INTO `bbs_points_log` VALUES ('61', '6', '5', '1', '发布帖子', '1508398400', '1508398400');
INSERT INTO `bbs_points_log` VALUES ('62', '6', '5', '1', '发布帖子', '1508398495', '1508398495');
INSERT INTO `bbs_points_log` VALUES ('63', '6', '1', '1', '评论帖子', '1508402436', '1508402436');
INSERT INTO `bbs_points_log` VALUES ('64', '6', '1', '1', '评论帖子', '1508402450', '1508402450');
INSERT INTO `bbs_points_log` VALUES ('65', '6', '1', '1', '评论帖子', '1508402558', '1508402558');
INSERT INTO `bbs_points_log` VALUES ('66', '6', '5', '1', '每日登录', '1508459682', '1508459682');
INSERT INTO `bbs_points_log` VALUES ('67', '6', '2', '1', '评论资讯', '1508459712', '1508459712');
INSERT INTO `bbs_points_log` VALUES ('68', '6', '2', '1', '评论资讯', '1508459727', '1508459727');
INSERT INTO `bbs_points_log` VALUES ('69', '6', '1', '1', '评论帖子', '1508464577', '1508464577');
INSERT INTO `bbs_points_log` VALUES ('70', '8', '5', '1', '每日登录', '1508464656', '1508464656');
INSERT INTO `bbs_points_log` VALUES ('71', '8', '1', '1', '评论帖子', '1508464733', '1508464733');
INSERT INTO `bbs_points_log` VALUES ('72', '8', '2', '1', '评论资讯', '1508465422', '1508465422');
INSERT INTO `bbs_points_log` VALUES ('73', '8', '2', '1', '评论资讯', '1508469419', '1508469419');
INSERT INTO `bbs_points_log` VALUES ('74', '8', '1', '1', '评论帖子', '1508472417', '1508472417');
INSERT INTO `bbs_points_log` VALUES ('75', '8', '1', '1', '评论帖子', '1508472457', '1508472457');
INSERT INTO `bbs_points_log` VALUES ('76', '8', '1', '1', '评论帖子', '1508477094', '1508477094');
INSERT INTO `bbs_points_log` VALUES ('77', '6', '5', '1', '每日登录', '1508546307', '1508546307');
INSERT INTO `bbs_points_log` VALUES ('78', '9', '5', '1', '发布帖子', '1508894064', '1508894064');
INSERT INTO `bbs_points_log` VALUES ('79', '6', '5', '1', '每日登录', '1508897859', '1508897859');

-- ----------------------------
-- Table structure for `bbs_points_rule`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_points_rule`;
CREATE TABLE `bbs_points_rule` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL COMMENT '积分名称',
  `points` tinyint(3) unsigned NOT NULL COMMENT '积分多少',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '积分类型1增加2减少',
  `limit_num` tinyint(4) unsigned NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_points_rule
-- ----------------------------
INSERT INTO `bbs_points_rule` VALUES ('1', '评论资讯', '2', '1', '2', '1508382603', '1508317940');
INSERT INTO `bbs_points_rule` VALUES ('2', '幸运抽奖', '5', '2', '20', '1508382611', '1508317935');
INSERT INTO `bbs_points_rule` VALUES ('5', '每日登录', '5', '1', '1', '1508391826', '1508391826');
INSERT INTO `bbs_points_rule` VALUES ('6', '评论帖子', '1', '1', '10', '1508477089', '1508391977');
INSERT INTO `bbs_points_rule` VALUES ('7', '发布帖子', '5', '1', '20', '1508397920', '1508397920');

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
  `favorite_users` text COMMENT '收藏者id',
  `status` tinyint(1) DEFAULT '1' COMMENT '1显示2隐藏',
  `score` int(11) NOT NULL COMMENT '帖子评分',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='帖子表';

-- ----------------------------
-- Records of bbs_posts
-- ----------------------------
INSERT INTO `bbs_posts` VALUES ('8', '官方申明', '00000000001', '1', '个锤子,大傻逼', '2', '2', '0', '18', '2', '9', '[]', '1', '1508164365', '1508164365', '1508164365');
INSERT INTO `bbs_posts` VALUES ('9', '测试测试测试', '00000000001', '1', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', '1', '1', '0', '115', '6', '11', null, '1', '1508219723', '1508219723', '1508219723');
INSERT INTO `bbs_posts` VALUES ('15', '1', '00000000006', '2', '1', '2', '2', '0', '86', '12', '11', '[\"8\"]', '1', '1508398495', '1508398495', '1508398495');
INSERT INTO `bbs_posts` VALUES ('16', '测试测试', '00000000009', '2', '测试测试', '2', '2', '0', '0', '0', '11', null, '1', '1508894064', '1508894064', '1508894064');

-- ----------------------------
-- Table structure for `bbs_posts_comment`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_posts_comment`;
CREATE TABLE `bbs_posts_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL COMMENT '发送的信息id',
  `post_user_id` int(11) NOT NULL COMMENT '发送用户id',
  `user_type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '发帖用户类型1管理员2用户',
  `reply_user_id` int(11) NOT NULL COMMENT '回复用户id',
  `reply_user_name` varchar(60) NOT NULL COMMENT '回复者昵称',
  `reply_user_type` tinyint(1) DEFAULT '2' COMMENT '回帖用户类型 1管理员   2用户',
  `upvote` mediumint(9) DEFAULT '0' COMMENT '点赞票数',
  `upvote_user` text COMMENT '点赞用户序列化子字符串',
  `status` tinyint(1) DEFAULT '1' COMMENT '0删除1正常',
  `content` text,
  `update_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='帖子评论表';

-- ----------------------------
-- Records of bbs_posts_comment
-- ----------------------------
INSERT INTO `bbs_posts_comment` VALUES ('31', '15', '6', '2', '8', 'zhouqi1', '2', '0', null, '1', '早上好', '1508477027', '1508477027');
INSERT INTO `bbs_posts_comment` VALUES ('32', '15', '6', '2', '8', 'zhouqi1', '2', '0', null, '1', '45', '1508477094', '1508477094');

-- ----------------------------
-- Table structure for `bbs_test`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_test`;
CREATE TABLE `bbs_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_test
-- ----------------------------
INSERT INTO `bbs_test` VALUES ('1', '2017-10-19 14:43:50');

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
  `headimg` varchar(255) DEFAULT '__STATIC__/index/images/github.png' COMMENT '头像',
  `true_name` varchar(20) DEFAULT '' COMMENT '备注',
  `status` tinyint(1) DEFAULT '1' COMMENT '1正常   2冻结',
  `points` int(11) DEFAULT '0' COMMENT '用户积分',
  `post_num` mediumint(9) DEFAULT '0' COMMENT '发帖数量',
  `copy_num` mediumint(9) DEFAULT '0' COMMENT '回帖数量',
  `message_num` mediumint(9) DEFAULT '0' COMMENT '消息数量',
  `fans_num` mediumint(9) DEFAULT '0' COMMENT '粉丝数量',
  `friend_num` mediumint(9) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `is_validate` tinyint(1) DEFAULT '1' COMMENT '是否验证邮箱',
  `login_times` mediumint(9) DEFAULT '0' COMMENT '登陆次数',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '基本资料是否展示1公开2好友可以查看3保密',
  `last_login_ip` varchar(15) DEFAULT '' COMMENT '上一次登陆ip',
  `province` varchar(5) DEFAULT '' COMMENT '登陆省份',
  `city` varchar(20) DEFAULT '' COMMENT '登陆城市',
  `reg_province` varchar(5) DEFAULT '' COMMENT '注册时所在省份',
  `reg_city` varchar(20) DEFAULT '' COMMENT '注册时所在城市',
  `verify_token` char(32) DEFAULT '',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of bbs_users
-- ----------------------------
INSERT INTO `bbs_users` VALUES ('6', 'zhouqi', '6760baccde3aff7e6b9b6b725964663b', '有的人', '445864742@qq.com', '0', 'http://ovxzi670j.bkt.clouddn.com/bbs_user_headimg_74c8f201710171646176925.jpg', '周起', '2', '212', '6', '0', '0', '0', '0', '1994-01-01', '1', '34', '1', '115.236.73.105', '浙江省', '杭州市', '浙江省', '杭州市', 'b87bd3e9a604c40a55c9618d27cf0516', '1508897859', '1508163627');
INSERT INTO `bbs_users` VALUES ('7', 'asdfghjkl', 'ef22cbee172258880fd316cb2b0cd2ed', 'asdfghjkl', '2690290677@qq.com', '0', '__STATIC__/index/images/github.png', '', '1', '0', '0', '0', '3', '0', '0', null, '1', '1', '1', '115.236.73.109', '浙江省', '杭州市', '浙江省', '杭州市', '5fcab09bf607544d448fb93e604e7739', '1508204546', '1508204233');
INSERT INTO `bbs_users` VALUES ('8', 'zhouqi1', '6760baccde3aff7e6b9b6b725964663b', 'zhouqi1', '4458647421@qq.com', '0', '__STATIC__/index/images/github.png', '', '1', '13', '0', '0', '0', '0', '0', null, '1', '4', '1', '115.236.73.105', '浙江省', '杭州市', '浙江省', '杭州市', '8c33d7984fad14878960295fb3f0672c', '1508484834', '1508204900');
INSERT INTO `bbs_users` VALUES ('9', 'rjjrjj', '0e34a4ed62c9a4bb0ed6b63ab7ecf65f', 'rjjrjj', '1571208377@qq.com', '0', '__STATIC__/index/images/github.png', '', '1', '5', '1', '0', '0', '0', null, null, '1', '0', '1', '218.109.25.111', '浙江省', '杭州市', '浙江省', '杭州市', 'b8d69db232ff33316353ed67cb20604d', '1508893893', '1508893893');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户验证hash表';

-- ----------------------------
-- Records of bbs_users_hash
-- ----------------------------
