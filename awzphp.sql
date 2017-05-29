/*
Navicat MySQL Data Transfer

Source Server         : localhost_phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : awzphp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-05-29 23:11:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for access
-- ----------------------------
DROP TABLE IF EXISTS `access`;
CREATE TABLE `access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '权限名称',
  `url` varchar(1000) NOT NULL DEFAULT '' COMMENT '请求URL',
  `path` varchar(200) DEFAULT NULL,
  `menu` tinyint(2) DEFAULT NULL COMMENT '是否为菜单  1是 2 否',
  `pid` int(11) DEFAULT '0' COMMENT '父类ID',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
  `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='权限详情表';

-- ----------------------------
-- Records of access
-- ----------------------------
INSERT INTO `access` VALUES ('1', '默认首页', '/index/index', '0', '2', '0', '1', '2017-05-29 04:36:21', '2017-05-29 04:36:21');
INSERT INTO `access` VALUES ('2', '文章管理', 'article', '0', '1', '0', '1', '2017-05-29 04:40:58', '2017-05-29 04:40:58');
INSERT INTO `access` VALUES ('3', '文章列表', '/article/list', '0,2', '1', '2', '1', '2017-05-29 04:43:02', '2017-05-29 04:43:02');
INSERT INTO `access` VALUES ('4', '系统管理', 'system', '0', '1', '0', '1', '2017-05-29 04:45:57', '2017-05-29 04:45:57');
INSERT INTO `access` VALUES ('5', '分类管理', 'cate', '0', '1', '0', '1', '2017-05-29 04:47:05', '2017-05-29 04:47:05');
INSERT INTO `access` VALUES ('6', '添加文章', '/article/add', '0,2', '1', '2', '1', '2017-05-29 13:15:12', '2017-05-29 05:20:05');
INSERT INTO `access` VALUES ('7', '编辑文章', '/article/edit', '0,2', '2', '2', '1', '2017-05-29 05:25:04', '2017-05-29 05:25:04');
INSERT INTO `access` VALUES ('8', '文章回收', '/article/recycle', '0,2', '2', '2', '1', '2017-05-29 05:26:08', '2017-05-29 05:26:08');
INSERT INTO `access` VALUES ('9', '图片上传', '/article/upload', '0,2,6', '2', '6', '1', '2017-05-29 05:27:01', '2017-05-29 05:27:01');
INSERT INTO `access` VALUES ('10', '用户管理', '/user/list', '0,4', '1', '4', '1', '2017-05-29 05:28:28', '2017-05-29 05:28:28');
INSERT INTO `access` VALUES ('11', '角色管理', '/role/list', '0,4', '1', '4', '1', '2017-05-29 05:29:28', '2017-05-29 05:29:28');
INSERT INTO `access` VALUES ('12', '权限管理', '/access/list', '0,4', '1', '4', '1', '2017-05-29 05:30:26', '2017-05-29 05:30:26');
INSERT INTO `access` VALUES ('13', '添加用户', '/user/add', '0,4,10', '2', '10', '1', '2017-05-29 05:31:06', '2017-05-29 05:31:06');
INSERT INTO `access` VALUES ('14', '用户编辑', '/user/edit', '0,4,10', '2', '10', '1', '2017-05-29 05:32:15', '2017-05-29 05:32:15');
INSERT INTO `access` VALUES ('15', '添加角色', '/role/add', '0,4,11', '2', '11', '1', '2017-05-29 05:41:19', '2017-05-29 05:41:19');
INSERT INTO `access` VALUES ('16', '添加分类', '/cate/add', '0,5', '1', '5', '1', '2017-05-29 13:15:33', '2017-05-29 05:44:03');
INSERT INTO `access` VALUES ('17', '分类列表', '/cate/list', '0,5', '1', '5', '1', '2017-05-29 13:15:42', '2017-05-29 05:44:25');
INSERT INTO `access` VALUES ('18', '分配权限', '/role/auth', '0,4,11', '2', '11', '1', '2017-05-29 12:08:48', '2017-05-29 12:08:48');
INSERT INTO `access` VALUES ('19', '编辑角色', '/role/edit', '0,4,11', '2', '11', '1', '2017-05-29 13:17:03', '2017-05-29 13:17:03');
INSERT INTO `access` VALUES ('20', '添加权限', '/access/add', '0,4,12', '2', '12', '1', '2017-05-29 13:18:36', '2017-05-29 13:18:36');
INSERT INTO `access` VALUES ('21', '编辑权限', '/access/edit', '0,4,12', '2', '12', '1', '2017-05-29 13:19:04', '2017-05-29 13:19:04');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `descs` varchar(64) NOT NULL COMMENT '角色描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 2：无效',
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
  `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '文章管理员', '负责文章管理', '1', '2017-05-29 13:20:50', '2017-05-14 03:52:02');
INSERT INTO `role` VALUES ('2', '系统管理员', '可操作系统管理', '1', '2017-05-29 13:21:32', '2017-05-14 03:54:59');
INSERT INTO `role` VALUES ('3', '用户管理员', '负责用户管理', '1', '2017-05-29 13:54:35', '2017-05-14 03:56:28');
INSERT INTO `role` VALUES ('4', '查看用户员', '只能查看用户', '1', '2017-05-29 13:22:54', '2017-05-14 03:57:41');
INSERT INTO `role` VALUES ('5', '分类管理员', '负责分类管理', '1', '2017-05-29 13:23:23', '2017-05-14 05:24:13');
INSERT INTO `role` VALUES ('6', '普通管理员', '负责文章，系统管理', '1', '2017-05-29 13:25:45', '2017-05-29 13:25:45');

-- ----------------------------
-- Table structure for role_access
-- ----------------------------
DROP TABLE IF EXISTS `role_access`;
CREATE TABLE `role_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `access_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限id',
  `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`),
  KEY `idx_role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- ----------------------------
-- Records of role_access
-- ----------------------------
INSERT INTO `role_access` VALUES ('1', '1', '1', '2017-05-29 10:30:11');
INSERT INTO `role_access` VALUES ('22', '4', '1', '2017-05-29 11:26:31');
INSERT INTO `role_access` VALUES ('23', '1', '2', '2017-05-29 13:23:52');
INSERT INTO `role_access` VALUES ('24', '1', '3', '2017-05-29 13:23:52');
INSERT INTO `role_access` VALUES ('25', '1', '6', '2017-05-29 13:23:52');
INSERT INTO `role_access` VALUES ('26', '1', '9', '2017-05-29 13:23:52');
INSERT INTO `role_access` VALUES ('27', '1', '7', '2017-05-29 13:23:52');
INSERT INTO `role_access` VALUES ('28', '1', '8', '2017-05-29 13:23:53');
INSERT INTO `role_access` VALUES ('29', '2', '4', '2017-05-29 13:24:14');
INSERT INTO `role_access` VALUES ('30', '2', '10', '2017-05-29 13:24:14');
INSERT INTO `role_access` VALUES ('31', '2', '13', '2017-05-29 13:24:14');
INSERT INTO `role_access` VALUES ('32', '2', '14', '2017-05-29 13:24:14');
INSERT INTO `role_access` VALUES ('33', '2', '11', '2017-05-29 13:24:14');
INSERT INTO `role_access` VALUES ('34', '2', '15', '2017-05-29 13:24:14');
INSERT INTO `role_access` VALUES ('35', '2', '18', '2017-05-29 13:24:15');
INSERT INTO `role_access` VALUES ('36', '2', '19', '2017-05-29 13:24:15');
INSERT INTO `role_access` VALUES ('37', '2', '12', '2017-05-29 13:24:15');
INSERT INTO `role_access` VALUES ('38', '2', '20', '2017-05-29 13:24:15');
INSERT INTO `role_access` VALUES ('39', '2', '21', '2017-05-29 13:24:15');
INSERT INTO `role_access` VALUES ('40', '4', '4', '2017-05-29 13:24:51');
INSERT INTO `role_access` VALUES ('41', '4', '10', '2017-05-29 13:24:52');
INSERT INTO `role_access` VALUES ('42', '5', '1', '2017-05-29 13:25:12');
INSERT INTO `role_access` VALUES ('43', '5', '5', '2017-05-29 13:25:12');
INSERT INTO `role_access` VALUES ('44', '5', '16', '2017-05-29 13:25:12');
INSERT INTO `role_access` VALUES ('45', '5', '17', '2017-05-29 13:25:12');
INSERT INTO `role_access` VALUES ('46', '6', '1', '2017-05-29 13:26:00');
INSERT INTO `role_access` VALUES ('47', '6', '2', '2017-05-29 13:26:00');
INSERT INTO `role_access` VALUES ('48', '6', '3', '2017-05-29 13:26:00');
INSERT INTO `role_access` VALUES ('49', '6', '6', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('50', '6', '9', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('51', '6', '7', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('52', '6', '8', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('53', '6', '4', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('54', '6', '10', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('55', '6', '13', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('56', '6', '14', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('57', '6', '11', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('58', '6', '15', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('59', '6', '18', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('60', '6', '19', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('61', '6', '12', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('62', '6', '20', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('63', '6', '21', '2017-05-29 13:26:01');
INSERT INTO `role_access` VALUES ('64', '3', '1', '2017-05-29 13:53:38');
INSERT INTO `role_access` VALUES ('65', '3', '4', '2017-05-29 13:53:38');
INSERT INTO `role_access` VALUES ('66', '3', '10', '2017-05-29 13:53:38');
INSERT INTO `role_access` VALUES ('67', '3', '13', '2017-05-29 13:53:39');
INSERT INTO `role_access` VALUES ('68', '3', '14', '2017-05-29 13:53:39');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是超级管理员 1表示是 0 表示不是',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
  `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`),
  KEY `idx_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'wenzhang', '258eeceadabccdb1aee94c268447ef3804d739a9', '7470970206@qq.com', '0', '1', '2017-05-29 13:27:37', '2017-05-07 03:48:47');
INSERT INTO `users` VALUES ('2', 'yonghu', '258eeceadabccdb1aee94c268447ef3804d739a9', '7444444@qq.com', '0', '1', '2017-05-29 13:31:04', '2017-05-14 06:48:05');
INSERT INTO `users` VALUES ('3', 'fenleiputong', '258eeceadabccdb1aee94c268447ef3804d739a9', '747097006@qq.com', '1', '1', '2017-05-29 13:31:51', '2017-05-14 06:50:57');
INSERT INTO `users` VALUES ('4', 'putong', '258eeceadabccdb1aee94c268447ef3804d739a9', '7470927006@qq.com', '0', '1', '2017-05-29 13:32:22', '2017-05-28 03:00:58');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色ID',
  `created_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`),
  KEY `idx_uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='用户角色表';

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('5', '2', '3', '2017-05-28 04:02:37');
INSERT INTO `user_role` VALUES ('12', '3', '5', '2017-05-28 10:56:41');
INSERT INTO `user_role` VALUES ('16', '1', '1', '2017-05-29 13:27:14');
INSERT INTO `user_role` VALUES ('17', '3', '6', '2017-05-29 13:31:53');
INSERT INTO `user_role` VALUES ('18', '4', '6', '2017-05-29 13:32:24');
