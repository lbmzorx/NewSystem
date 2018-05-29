/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : start_chonglou

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-29 23:37:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for start_article
-- ----------------------------
DROP TABLE IF EXISTS `start_article`;
CREATE TABLE `start_article` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_content_id` bigint(20) NOT NULL COMMENT '文章内容',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `article_cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `author` varchar(255) NOT NULL COMMENT '作者',
  `cover` varchar(255) DEFAULT '' COMMENT '封面',
  `abstract` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `remain` tinyint(4) NOT NULL DEFAULT '0' COMMENT '提醒.code:0=Not Reminding,1=Remained.tran:0=未提醒，1=已提醒',
  `auth` tinyint(4) NOT NULL DEFAULT '0' COMMENT '权限.tran:0=所有人,1=好友,2=加密,3=自己.code:0=All Users,1=Friend,2=Encrypt,3=Private',
  `tag` varchar(20) NOT NULL DEFAULT '' COMMENT '标签',
  `commit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论',
  `view` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览',
  `collection` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '收藏',
  `thumbup` int(11) NOT NULL DEFAULT '0' COMMENT '赞',
  `level` tinyint(4) NOT NULL DEFAULT '2' COMMENT '文章级别.tran:0=垃圾,1=较差,2=普通,3=较好,4=优秀,5=天才.code:0=Garbage,1=Non nutritive,2=General,3=Better,4=Good,5=Genius.',
  `score` tinyint(4) NOT NULL DEFAULT '0' COMMENT '评分',
  `publish` tinyint(4) NOT NULL DEFAULT '1' COMMENT '发布.tran:0=草稿,1=发布.code:0=Unpublished,1=Published.',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态值.tran:0=待审核,1=审核通过,2=正在审核,3=审核不通过.code:0=Waiting Audit,1=Audit Passed,2=Auditing,3=Audit Failed.',
  `page_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '显示类型.tran:0=多页,1=单页.code:0=Multi Pages,1=Single Page',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edit_time` int(11) NOT NULL DEFAULT '0' COMMENT '编辑时间',
  `flag_headline` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '头条.tran:0=否,1=是.code:0=No,1=Yes.',
  `flag_recommend` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '推荐.tran:0=否,1=是.code:0=No,1=Yes.',
  `flag_slide_show` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '幻灯.tran:0=否,1=是.code:0=No,1=Yes.',
  `flag_special_recommend` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '特别推荐.tran:0=否,1=是.code:0=No,1=Yes.',
  `flag_roll` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '滚动.tran:0=否,1=是.code:0=No,1=Yes.',
  `flag_bold` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '加粗.tran:0=否,1=是.code:0=No,1=Yes.',
  `flag_picture` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '图片.tran:0=否,1=是.code:0=No,1=Yes.',
  `recycle` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '删除.tran:0=否,1=是.code:0=No,1=Yes.',
  `admin_id` int(11) NOT NULL DEFAULT '0' COMMENT '管理员ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_article
-- ----------------------------
INSERT INTO `start_article` VALUES ('1', '1', '1', '16', '6', 'sdfsafa', 'sdfasfsf', 'http://www.chongloua.com/upload/img/eedd49bd0c6de401ae0770d919070b10.png', 'asdfdasfsa', '0', '3', '', '0', '46', '0', '0', '3', '0', '0', '1', '1', '0', '1526212471', '0', '1', '1', '1', '1', '0', '0', '0', '0');
INSERT INTO `start_article` VALUES ('2', '1233', '234', '12', '123', 'asdfsadf', '11', 'safd', 'adffasd', '0', '1', 'asdf', '0', '0', '0', '0', '2', '0', '1', '1', '0', '1526209464', '1526395077', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `start_article` VALUES ('5', '66', '0', '1', '0', '阿萨德发送', '阿萨德发送发送', '/upload/img/5ae8b12d31f8e558bddcfb515d52035e.png', '阿萨德发生发生发', '0', '0', '阿萨德发送到发达省份三大', '0', '0', '0', '0', '2', '0', '1', '0', '0', '1527093406', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `start_article` VALUES ('6', '70', '1', '1', '0', 'asdfasfasf', 'orx', '', '', '0', '0', 'asdfasfdas', '7', '178', '1', '1', '2', '0', '1', '1', '0', '1527392249', '1527421656', '0', '0', '0', '0', '0', '0', '0', '0', '1');

-- ----------------------------
-- Table structure for start_article_cate
-- ----------------------------
DROP TABLE IF EXISTS `start_article_cate`;
CREATE TABLE `start_article_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edit_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `level` tinyint(4) NOT NULL COMMENT '级别',
  `path` varchar(255) NOT NULL DEFAULT '0' COMMENT '路径',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态.tran:0=可用,1=不可用,2=回收.code:0=Avaliable,1=Unavaliable,3=Recycle.',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='电影分类表';

-- ----------------------------
-- Records of start_article_cate
-- ----------------------------
INSERT INTO `start_article_cate` VALUES ('1', 'docker', '0', '1523801219', '1527162316', '0', '0', '0', '0');
INSERT INTO `start_article_cate` VALUES ('3', 'php', '0', '1526399120', '1526808802', '0', '0', '0', '0');
INSERT INTO `start_article_cate` VALUES ('4', 'mysql', '0', '1527162327', '0', '0', '0', '0', '0');
INSERT INTO `start_article_cate` VALUES ('5', 'linux', '0', '1527162338', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for start_article_collection
-- ----------------------------
DROP TABLE IF EXISTS `start_article_collection`;
CREATE TABLE `start_article_collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned NOT NULL COMMENT '文章ID',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户ID',
  `add_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_article_collection
-- ----------------------------
INSERT INTO `start_article_collection` VALUES ('10', '6', '1', '1527423346');

-- ----------------------------
-- Table structure for start_article_commit
-- ----------------------------
DROP TABLE IF EXISTS `start_article_commit`;
CREATE TABLE `start_article_commit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned NOT NULL COMMENT '文章ID',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户ID',
  `parent_id` int(11) unsigned NOT NULL COMMENT '父级ID',
  `content` varchar(400) NOT NULL COMMENT '内容',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '状态.tran:0=待审核,1=评论成功,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.',
  `add_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  `recycle` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '删除.tran:0=否,1=是.code:0=No,1=Yes.',
  `level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '级别',
  `path` varchar(255) NOT NULL DEFAULT '0' COMMENT '路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_article_commit
-- ----------------------------
INSERT INTO `start_article_commit` VALUES ('1', '6', '1', '0', 'asdfasdfdasfsa', '1', '1527602612', '0', '0', '0');
INSERT INTO `start_article_commit` VALUES ('2', '6', '1', '0', 'asdfasdfasdfsfsdfs', '1', '1527602790', '0', '0', '0');
INSERT INTO `start_article_commit` VALUES ('3', '6', '1', '0', 'asdfasfasdfsdafasdfadsfdasfssssssssssssfsdfasfasdfasdfsda', '1', '1527602798', '0', '0', '0');
INSERT INTO `start_article_commit` VALUES ('4', '6', '1', '2', '阿斯短发散发岁的阿萨德发达省份的', '1', '1527607484', '0', '1', '0,2');
INSERT INTO `start_article_commit` VALUES ('5', '6', '1', '4', '撒旦发射反阿萨德发达省份', '1', '1527607904', '0', '2', '0,2,4');
INSERT INTO `start_article_commit` VALUES ('6', '6', '1', '4', '阿萨德发送到阿萨德发送', '1', '1527607919', '0', '2', '0,2,4');
INSERT INTO `start_article_commit` VALUES ('7', '6', '1', '2', '三大发生发啊岁的发撒地方阿萨德发是', '1', '1527607939', '0', '1', '0,2');

-- ----------------------------
-- Table structure for start_article_content
-- ----------------------------
DROP TABLE IF EXISTS `start_article_content`;
CREATE TABLE `start_article_content` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '内容',
  `seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'seo标题',
  `seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'seo关键字',
  `seo_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'seo描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_article_content
-- ----------------------------
INSERT INTO `start_article_content` VALUES ('1', '<p>asdfasdfasas啊岁的发撒地方大赛复赛</p><p>大放送大法师等等dfasfasfdasfdasfsa拉萨的解放看来家f士大夫大师傅大师傅asd</p><p><br/></p><p>asdfdaslfjklasdfjlk;asl;fjkdlasfjkl;s</p><h2>asdflklasdfjlk</h2><h1>asdfjkaslf</h1>', 'asdfdasf', 'asfasf', 'asdfasfdasfsaf');
INSERT INTO `start_article_content` VALUES ('55', '第一篇文章，继续加油', '总结', '哈哈', '总结才能进步');
INSERT INTO `start_article_content` VALUES ('56', '第一篇文章，继续加油', '总结', '哈哈', '总结才能进步');
INSERT INTO `start_article_content` VALUES ('57', 'fasdfasdfdasfdasf', 'asdf', 'asdf', 'asdf');
INSERT INTO `start_article_content` VALUES ('58', 'fasdfasdfdasfdasf', 'asdf', 'asdf', 'asdf');
INSERT INTO `start_article_content` VALUES ('59', 'fasdfasdfdasfdasf', 'asdf', 'asdf', 'asdf');
INSERT INTO `start_article_content` VALUES ('60', 'fasdfasdfdasfdasf', 'asdf', 'asdf', 'asdf');
INSERT INTO `start_article_content` VALUES ('61', 'fasdfasdfdasfdasf', 'asdf', 'asdf', 'asdf');
INSERT INTO `start_article_content` VALUES ('62', 'aslkdfjklas', '', '', '');
INSERT INTO `start_article_content` VALUES ('66', '阿萨德发送发送到发达省份打算发达省份', '阿萨德发送', '阿萨德发大水', '阿萨德发生发生发打算');
INSERT INTO `start_article_content` VALUES ('70', 'asdfasfasdf\r\n\r\nasdf\r\nasdf\r\nasdf\r\nsad\r\nfasd\r\nfdasfdas', '', '', '');

-- ----------------------------
-- Table structure for start_article_thumbup
-- ----------------------------
DROP TABLE IF EXISTS `start_article_thumbup`;
CREATE TABLE `start_article_thumbup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned NOT NULL COMMENT '文章ID',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户ID',
  `add_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_article_thumbup
-- ----------------------------
INSERT INTO `start_article_thumbup` VALUES ('10', '6', '1', '1527423344');

-- ----------------------------
-- Table structure for start_attention
-- ----------------------------
DROP TABLE IF EXISTS `start_attention`;
CREATE TABLE `start_attention` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '名称',
  `value` varchar(255) NOT NULL COMMENT '值',
  `sign` varchar(50) NOT NULL COMMENT '标识',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_attention
-- ----------------------------
INSERT INTO `start_attention` VALUES ('1', 'article_publish', '请输入完整的标题和内容', 'article_create_update', '0');
INSERT INTO `start_attention` VALUES ('2', 'article_publish', '标题必须要有实际意义', 'article_create_update', '0');
INSERT INTO `start_attention` VALUES ('3', 'article_publish', '请不要发和本站无关的话题', 'article_create_update', '0');
INSERT INTO `start_attention` VALUES ('4', 'article_publish', '禁止只发链接，没有实际内容', 'article_create_update', '0');
INSERT INTO `start_attention` VALUES ('5', 'article_publish', '文章内容健康，减少网络暴力', 'article_create_update', '0');
INSERT INTO `start_attention` VALUES ('6', 'article_publish', '审核通过才能正式发布', 'article_create_update', '0');

-- ----------------------------
-- Table structure for start_contact
-- ----------------------------
DROP TABLE IF EXISTS `start_contact`;
CREATE TABLE `start_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `subject` varchar(100) NOT NULL COMMENT '主题',
  `body` varchar(255) NOT NULL COMMENT '内容',
  `ip` varchar(128) DEFAULT NULL COMMENT 'IP',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态.tran:0=未读,1=已读.code:0=Unread,1=Read.',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_contact
-- ----------------------------
INSERT INTO `start_contact` VALUES ('1', 'asdfasf', 'asdfasfdsa@2342.com', 'asdfasdfs', 'afasdfasfdasfsda', '127.0.0.1', '0', '0');
INSERT INTO `start_contact` VALUES ('2', 'asdfasf', 'asdfasfdsa@2342.com', 'asdfasdfs', 'afasdfasfdasfsda', '127.0.0.1', '0', '0');
INSERT INTO `start_contact` VALUES ('3', 'asdfasdf', 'asdfasf@43asdfas.cp', 'alkfkjl', 'klfdjlskaflk;ajf;lkwejk', '127.0.0.1', '0', '1527388542');
INSERT INTO `start_contact` VALUES ('4', 'sasfdasfasf', 'lbmzorx@163.com', 'asdfa', 'asdfasfasdfasfd', '127.0.0.1', '0', '1527388597');

-- ----------------------------
-- Table structure for start_menu
-- ----------------------------
DROP TABLE IF EXISTS `start_menu`;
CREATE TABLE `start_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position` tinyint(4) NOT NULL DEFAULT '0' COMMENT '位置.tran:0=左,1=上,2=右,3=下.code:0=Left,1=Top,2=Right,3=Botton.',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'url地址',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '图标',
  `sort` float unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_self' COMMENT '打开方式.tran:_blank=新窗口,_self=本窗口.code:_blank=New Tag,_self=Self Window',
  `is_absolute_url` tinyint(6) unsigned NOT NULL DEFAULT '0' COMMENT '是否绝对地址.tran:0=否,1=是.code:0=No,1=Yes.',
  `is_display` tinyint(6) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示.tran:0=否,1=是.code:0=No,1=Yes.',
  `recycle` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '删除.tran:0=否,1=是.code:0=No,1=Yes.',
  `add_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of start_menu
-- ----------------------------
INSERT INTO `start_menu` VALUES ('1', '0', '0', '首页', '/', 'fa fa-home', '0', '_self', '0', '1', '0', '1521036199', '1526787701');
INSERT INTO `start_menu` VALUES ('57', '1', '0', 'article', 'site/article', '', '0', '_self', '0', '1', '0', '1526787744', '0');

-- ----------------------------
-- Table structure for start_migration
-- ----------------------------
DROP TABLE IF EXISTS `start_migration`;
CREATE TABLE `start_migration` (
  `version` varchar(180) NOT NULL COMMENT '版本',
  `apply_time` int(11) DEFAULT NULL COMMENT '迁移时间',
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_migration
-- ----------------------------
INSERT INTO `start_migration` VALUES ('m000000_000000_base', '1525161825');
INSERT INTO `start_migration` VALUES ('m130524_201442_init', '1525161837');

-- ----------------------------
-- Table structure for start_options
-- ----------------------------
DROP TABLE IF EXISTS `start_options`;
CREATE TABLE `start_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '类型.tran:0=系统,1=自定义,2=banner,=3广告.code:0=System,1=Self,2=Banner,3=Ad.',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '标识符',
  `value` text COLLATE utf8_unicode_ci NOT NULL COMMENT '值',
  `input_type` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '输入框类型.code:0=input,1=texteare,2=img,3=markdown.tran:0=输入框,1=文本框,2=图片,3=Markdown',
  `autoload` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '自动加载.tran:0=否,1=是.code:0=No,1=Yes.',
  `tips` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '提示',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of start_options
-- ----------------------------
INSERT INTO `start_options` VALUES ('1', '0', 'seo_keywords', '烟雨重楼cms,文章发布,优质用户体验', '1', '1', 'seo关键字', '0');
INSERT INTO `start_options` VALUES ('2', '0', 'seo_description', '烟雨重楼，领先的cms管理', '1', '1', 'SEO描述', '0');
INSERT INTO `start_options` VALUES ('3', '0', 'website_title', '烟雨重楼', '1', '1', '网站标题', '0');
INSERT INTO `start_options` VALUES ('4', '0', 'website_description', 'Based on most popular php framework yii2', '1', '1', '网站描述', '0');
INSERT INTO `start_options` VALUES ('5', '0', 'website_email', 'lbmzorx@163.com', '1', '1', '联系邮箱', '0');
INSERT INTO `start_options` VALUES ('6', '0', 'website_language', 'zh-CN', '1', '1', '站点语言', '0');
INSERT INTO `start_options` VALUES ('7', '0', 'website_icp', '黔ICP备18003954', '1', '1', 'ICP备案号', '0');
INSERT INTO `start_options` VALUES ('8', '0', 'website_statics_script', '斯卡拉', '1', '1', '统计代码', '0');
INSERT INTO `start_options` VALUES ('9', '0', 'website_status', '0', '1', '1', '网站状态.0=关闭,1=开启.', '0');
INSERT INTO `start_options` VALUES ('10', '0', 'website_comment', '1', '1', '1', '网站是否允许评论.0=不允许,1=允许', '0');
INSERT INTO `start_options` VALUES ('11', '0', 'website_comment_need_verify', '1', '1', '1', '状态.tran:0=待审核,1=评论成功,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.', '0');
INSERT INTO `start_options` VALUES ('12', '0', 'website_timezone', 'Asia/Shanghai', '1', '1', '网站时区', '0');
INSERT INTO `start_options` VALUES ('13', '0', 'website_url', 'http://www.sc.net/', '1', '1', '网站地址', '0');
INSERT INTO `start_options` VALUES ('14', '0', 'smtp_host', 'lbmzorx@163.com', '1', '1', 'SMTP地址', '0');
INSERT INTO `start_options` VALUES ('15', '0', 'smtp_username', 'asdlkfk', '1', '1', 'SMTP用户名', '0');
INSERT INTO `start_options` VALUES ('16', '0', 'smtp_password', 'fklsajdfk', '1', '1', 'SMTP密码', '0');
INSERT INTO `start_options` VALUES ('17', '0', 'smtp_port', '24', '1', '1', 'SMTP端口', '0');
INSERT INTO `start_options` VALUES ('18', '0', 'smtp_encryption', 'fklsajkd', '1', '1', '连接类型', '0');
INSERT INTO `start_options` VALUES ('19', '0', 'smtp_nickname', 'aslkdjfklsasdfsaasdfasf', '1', '1', 'SMTP用户名', '0');
INSERT INTO `start_options` VALUES ('20', '1', 'weibo', 'http://www.weibo.com/feeppp', '1', '1', '新浪微博', '0');
INSERT INTO `start_options` VALUES ('21', '1', 'facebook', 'http://www.facebook.com/liufee', '1', '1', 'facebook', '0');
INSERT INTO `start_options` VALUES ('22', '1', 'wechat', '飞得更高', '1', '1', '微信', '0');
INSERT INTO `start_options` VALUES ('23', '1', 'qq', '1838889850阿斯蒂芬撒旦法', '1', '1', 'QQ号码', '0');
INSERT INTO `start_options` VALUES ('24', '1', 'email', 'admin@feehi.com', '1', '1', '邮箱', '0');
INSERT INTO `start_options` VALUES ('25', '2', 'index', '首页banner', '1', '1', '首页banner', '0');
INSERT INTO `start_options` VALUES ('40', '1', '阿斯短发岁的发送', '阿斯短发的沙发上的发', '1', '1', '啊岁的发生发所得发', '0');
INSERT INTO `start_options` VALUES ('41', '1', '啊岁的发生发所得发', '阿斯短发岁的法岁的法', '1', '1', '', '0');
INSERT INTO `start_options` VALUES ('42', '1', '阿斯短发打岁发生', '阿斯短发散发大赛法的撒', '1', '1', '', '0');
INSERT INTO `start_options` VALUES ('43', '2', '尾页', '拉萨的空间放大圣诞快乐分', '1', '1', '', '0');

-- ----------------------------
-- Table structure for start_tag
-- ----------------------------
DROP TABLE IF EXISTS `start_tag`;
CREATE TABLE `start_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '名称',
  `frequence` int(11) NOT NULL DEFAULT '0' COMMENT '频率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_tag
-- ----------------------------
INSERT INTO `start_tag` VALUES ('1', '撒旦法', '0');

-- ----------------------------
-- Table structure for start_url_check
-- ----------------------------
DROP TABLE IF EXISTS `start_url_check`;
CREATE TABLE `start_url_check` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `md5` varchar(255) NOT NULL COMMENT '校验值',
  `url` varchar(255) NOT NULL COMMENT '链接',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `ip` varchar(128) DEFAULT NULL COMMENT '激活Ip',
  `num` int(11) DEFAULT '0' COMMENT '次数.',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态.tran:0=等待,1=已点击,2=失效.code:0=Waiting,1=Clicked,2=Useless.',
  `auth_key` varchar(100) NOT NULL COMMENT '授权码',
  `expire_time` int(11) DEFAULT '0' COMMENT '失效时间',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `md5` (`md5`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_url_check
-- ----------------------------
INSERT INTO `start_url_check` VALUES ('1', '664b826662933e94767b1e270ae92ea6', '/site/active-account?date=2018-05-26+15%3A42%3A29&expire=1527925349&type=user-sign&sign=664b826662933e94767b1e270ae92ea6', '9', null, '0', '0', 'IX7E85HjgIUpssHbemFQeBdWfI9nMRJc', '1527925349', '1527320549');
INSERT INTO `start_url_check` VALUES ('2', '49fb25d8aae27162793d584c42c7be99', '/site/active-account?date=2018-05-26+16%3A48%3A39&expire=1527929319&type=user-sign&sign=49fb25d8aae27162793d584c42c7be99', '11', null, '0', '0', 'b54qz4_pISQzlOFpZHZiclNmT2K95sBc', '1527929319', '1527324519');
INSERT INTO `start_url_check` VALUES ('3', '58375399e98abef5dc63260548686ab9', 'http://www.sc.net/site/active-account?date=2018-05-26+18%3A36%3A15&expire=1527935775&type=user-signup&sign=58375399e98abef5dc63260548686ab9', '12', null, '1', '1', 'dvkz4aNwoq_MgLzu5FkOcO5unJhRZIuy', '1527935775', '1527330975');
INSERT INTO `start_url_check` VALUES ('4', '0e60d9fbcb097f492b80b44d965839f1', 'http://www.sc.net/site/active-account?date=2018-05-26+19%3A15%3A09&expire=1527938109&type=user-signup&sign=0e60d9fbcb097f492b80b44d965839f1', '13', null, '1', '1', '5GDVrpfaDFZylDcbG591ZIxPibZ32-6-', '1527938109', '1527333309');
INSERT INTO `start_url_check` VALUES ('5', '3993a1f7cd46c1b03b4462d578ccd1f6', 'http://www.sc.net/site/active-account?date=2018-05-26+19%3A16%3A42&expire=1527938202&type=user-signup&sign=3993a1f7cd46c1b03b4462d578ccd1f6', '14', null, '1', '1', 'sFqUi19pNBDEhY0D_HCfnmvqP0_ssB-k', '1527938202', '1527333402');

-- ----------------------------
-- Table structure for start_user
-- ----------------------------
DROP TABLE IF EXISTS `start_user`;
CREATE TABLE `start_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '授权码',
  `secret_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '秘密授权码',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '重置密码口令',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '9' COMMENT '状态.tran:0=删除,1=冻结,2=未通过审核,3=限制登录,4=限制活动,5=登录异常,6=激活失败,9=未激活,10=正常.code:0=Delete,1=Freeze,2=Waiting audit,3=Limit Login,4=Limit Active,5=Login Error,6=Active Error,9=Waiting Active,10=Active.',
  `created_at` int(11) NOT NULL COMMENT '添加时间',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `head_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `auth_key` (`auth_key`) USING BTREE,
  UNIQUE KEY `secret_key` (`secret_key`) USING BTREE,
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of start_user
-- ----------------------------
INSERT INTO `start_user` VALUES ('1', 'orx', 'RWoSmbxUnGGqis-xpTOuauzTTfSPYyuB', 'RWoSmbxUnGGqis-xpTOuauzTTfSPYyuB', '$2y$13$69PkunNk5.Haz0EQHvN/KekhbytcsJm.PphUiFFS59AqpS70mz2YW', null, 'lbmzorx@163.com', '10', '1527253890', '1527253890', null);
INSERT INTO `start_user` VALUES ('11', 'sfsadf', 'b54qz4_pISQzlOFpZHZiclNmT2K95sBc', 'b54qz4_pISQzlOFpZHZiclNmT2K95sBc', '$2y$13$TRWnXrhtnzyK7U9NqUcMsuO6f40P4IYdOzji2Nd9dmiE.pr09WtqW', null, '15218756s38@qq.com', '9', '1527324519', '1527324519', null);
INSERT INTO `start_user` VALUES ('12', 'orxtt', 'dvkz4aNwoq_MgLzu5FkOcO5unJhRZIuy', 'dvkz4aNwoq_MgLzu5FkOcO5unJhRZIuy', '$2y$13$xZVBB4GCcrVUWBG0XcAtSuP0sC33E5a3OCdJHzkpchBfvm2W2ykUi', null, '15218756b38@qq.com', '10', '1527330975', '1527333182', null);
INSERT INTO `start_user` VALUES ('13', 'roxlk', '5GDVrpfaDFZylDcbG591ZIxPibZ32-6-', '5GDVrpfaDFZylDcbG591ZIxPibZ32-6-', '$2y$13$XN2dT8JzuJgGhYmE4m7xAuBCIMNvybTAIOp68zjJsfxkTMQ4iprui', null, '1521875s638@qq.com', '9', '1527333309', '1527333322', null);
INSERT INTO `start_user` VALUES ('14', 'asdfadsfasd', 'sFqUi19pNBDEhY0D_HCfnmvqP0_ssB-k', 'sFqUi19pNBDEhY0D_HCfnmvqP0_ssB-k', '$2y$13$RL9YICzmxZv1J4gsCYeGP.hctK0iykFntGQfD6F4b60M4YqbU3fX2', null, '1521875638@qq.com', '10', '1527333402', '1527333426', null);

-- ----------------------------
-- Table structure for start_user_remain
-- ----------------------------
DROP TABLE IF EXISTS `start_user_remain`;
CREATE TABLE `start_user_remain` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '接收用户ID',
  `from_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '来源用户ID',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `remain_type` tinyint(4) DEFAULT NULL COMMENT '提醒类型.tran:0=评论,1=回答,2=回复,3=评价,4=收藏,5=点赞,6=访客,7=粉丝.code:0=Commit,1=Answer,2=Reply,4=Collection,5=Thumb Up,6=Visitor,7=Fans.',
  `link` varchar(200) DEFAULT NULL COMMENT '链接',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of start_user_remain
-- ----------------------------

-- ----------------------------
-- Procedure structure for update_partition_sub_partition_add_last_day
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_partition_sub_partition_add_last_day`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_partition_sub_partition_add_last_day`(IN databaseName varchar(40),IN tableName varchar(40),IN subcolumn varchar(40),IN hashnum INT,IN `date_add` int)
L_END:BEGIN

    DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
    START TRANSACTION;

    SELECT REPLACE(PARTITION_NAME,'p','') INTO @LAST_PARTITION
    FROM INFORMATION_SCHEMA.PARTITIONS
    WHERE ( TABLE_SCHEMA=databaseName ) AND (TABLE_NAME = tableName )
    ORDER BY partition_ordinal_position DESC LIMIT 1;

    IF @LAST_PARTITION IS NULL THEN
      SET @LAST_PARTITION=UNIX_TIMESTAMP(date_add(curdate(), interval - day(curdate()) + 1 day));
    END IF ;
    SELECT @LAST_PARTITION;

    SET @NEXT_NAME=DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(@LAST_PARTITION,"%Y_%m_%d"),INTERVAL `date_add` DAY),"%Y_%m_%d");
    SELECT @NEXT_NAME;
    SET @NEXT_TIMESTAMP=UNIX_TIMESTAMP(@NEXT_NAME);

    SELECT @NEXT_TIMESTAMP;

    SET @addpartition=CONCAT('ALTER TABLE ',tableName,' ADD PARTITION SUBPARTITION  BY HASH(',subcolumn,') SUBPARTITIONS ',hashnum,' (PARTITION `p',@NEXT_NAME,'` VALUES LESS THAN ( ',@NEXT_TIMESTAMP,'))');
    /* 输出查看增加分区语句*/
    SELECT @addpartition;
    PREPARE stmt2 FROM @addpartition;
    EXECUTE stmt2;
    DEALLOCATE PREPARE stmt2;
    COMMIT ;
  end
;;
DELIMITER ;
