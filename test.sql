/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50744
 Source Host           : 127.0.0.1:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 50744
 File Encoding         : 65001

 Date: 04/11/2024 22:29:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES (1, 'dev', 'dev');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nodes_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Admin', '1');

-- ----------------------------
-- Table structure for sql_log
-- ----------------------------
DROP TABLE IF EXISTS `sql_log`;
CREATE TABLE `sql_log`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `executed_at` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '执行时间',
  `sql` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'sql语句',
  `error` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '错误提示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sql_log
-- ----------------------------
INSERT INTO `sql_log` VALUES (1, 1, 1730730331, 'select * from `node`', '');
INSERT INTO `sql_log` VALUES (2, 1, 1730730331, 'insert into `sql_log` (`user_id`, `executed_at`, `sql`, `error`) values (\'1\', \'1730730331\', \'select * from `node`\', \'\')', '');
INSERT INTO `sql_log` VALUES (3, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (4, 1, 1730730332, 'select * from `node`', '');
INSERT INTO `sql_log` VALUES (5, 1, 1730730332, 'insert into `sql_log` (`user_id`, `executed_at`, `sql`, `error`) values (\'1\', \'1730730332\', \'select * from `node`\', \'\')', '');
INSERT INTO `sql_log` VALUES (6, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (7, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (8, 1, 1730730338, 'select * from `node`', '');
INSERT INTO `sql_log` VALUES (9, 1, 1730730338, 'insert into `sql_log` (`user_id`, `executed_at`, `sql`, `error`) values (\'1\', \'1730730338\', \'select * from `node`\', \'\')', '');
INSERT INTO `sql_log` VALUES (10, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (11, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (12, 1, 1730730356, 'select * from `node`', '');
INSERT INTO `sql_log` VALUES (13, 1, 1730730356, 'insert into `sql_log` (`user_id`, `executed_at`, `sql`, `error`) values (\'1\', \'1730730356\', \'select * from `node`\', \'\')', '');
INSERT INTO `sql_log` VALUES (14, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (15, 1, 1730730358, 'select * from `node`', '');
INSERT INTO `sql_log` VALUES (16, 1, 1730730358, 'insert into `sql_log` (`user_id`, `executed_at`, `sql`, `error`) values (\'1\', \'1730730358\', \'select * from `node`\', \'\')', '');
INSERT INTO `sql_log` VALUES (17, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (18, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (19, 1, 1730730361, 'select * from `node`', '');
INSERT INTO `sql_log` VALUES (20, 1, 1730730361, 'insert into `sql_log` (`user_id`, `executed_at`, `sql`, `error`) values (\'1\', \'1730730361\', \'select * from `node`\', \'\')', '');
INSERT INTO `sql_log` VALUES (21, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');
INSERT INTO `sql_log` VALUES (22, 0, 0, 'A possible infinite logging loop was detected and aborted. It appears some of your handler code is triggering logging, see the previous log record for a hint as to what may be the cause.', '');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `roles_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, '张三', '13688888888', '$2y$10$xGzZ8JJURn7nPhRQhGT3KugwfCfeFxM0rt5CfGmj4l8x2D4gqo8Pu', '1');
INSERT INTO `user` VALUES (2, '李四', '15699999999', '$2y$10$xGzZ8JJURn7nPhRQhGT3KugwfCfeFxM0rt5CfGmj4l8x2D4gqo8Pu', '');
INSERT INTO `user` VALUES (3, '王五', '15611111111', '$2y$10$xGzZ8JJURn7nPhRQhGT3KugwfCfeFxM0rt5CfGmj4l8x2D4gqo8Pu', '');
INSERT INTO `user` VALUES (4, '刘六', '13577777777', '$2y$10$xGzZ8JJURn7nPhRQhGT3KugwfCfeFxM0rt5CfGmj4l8x2D4gqo8Pu', '');
INSERT INTO `user` VALUES (5, 'Mack', '13800000000', '$2y$10$xGzZ8JJURn7nPhRQhGT3KugwfCfeFxM0rt5CfGmj4l8x2D4gqo8Pu', '');
INSERT INTO `user` VALUES (6, 'Tom', '13777777777', '$2y$10$xGzZ8JJURn7nPhRQhGT3KugwfCfeFxM0rt5CfGmj4l8x2D4gqo8Pu', '');

SET FOREIGN_KEY_CHECKS = 1;
