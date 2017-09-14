/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : ykd

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-15 00:11:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dino_admin`
-- ----------------------------
DROP TABLE IF EXISTS `dino_admin`;
CREATE TABLE `dino_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '管理员帐号',
  `password` char(32) NOT NULL COMMENT '加密密码',
  `addtime` datetime DEFAULT NULL COMMENT '添加时间',
  `loginsum` varchar(255) DEFAULT NULL COMMENT '登录次数',
  `name` varchar(255) DEFAULT NULL COMMENT '管理员名称',
  `role_id` int(11) DEFAULT NULL COMMENT '角色id',
  `last_time` datetime DEFAULT NULL COMMENT '上次登录时间',
  `last_ip` varchar(255) DEFAULT NULL COMMENT '上次登录的ip',
  `new_time` datetime DEFAULT NULL COMMENT '登录时间',
  `new_ip` varchar(255) DEFAULT NULL COMMENT '最新登录的ip',
  `state` char(1) DEFAULT '1' COMMENT '状态  1为正常 2 被禁止',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机',
  `email` varchar(50) DEFAULT NULL COMMENT 'email',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `type` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

-- ----------------------------
-- Records of dino_admin
-- ----------------------------
INSERT INTO `dino_admin` VALUES ('1', 'admin', '368bd5610605d07b7282588a7bd61e81', '2017-09-08 21:03:30', '297', '1234', '0', '2017-09-14 20:46:00', '127.0.0.1', '2017-09-14 20:57:02', '127.0.0.1', '1', '111111111', '111111@qq.com', '', '1');
INSERT INTO `dino_admin` VALUES ('5', 'cheshi', '368bd5610605d07b7282588a7bd61e81', '2017-09-08 22:18:18', '6', '要你管', '13', '2017-09-07 15:55:59', '127.0.0.1', '2017-09-08 22:19:21', '127.0.0.1', '1', '123123123123', '12313212@qq.com', '123123', '1');
INSERT INTO `dino_admin` VALUES ('15', '2222', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-08 18:11:53', '', null, '0', null, null, null, null, '1', '1212213123123', '123132213@qq.com', '1', '1');
INSERT INTO `dino_admin` VALUES ('16', '221313', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-08 20:48:35', null, '22222', '0', null, null, null, null, '1', '123123123123', '123@qq.com', '', '1');
INSERT INTO `dino_admin` VALUES ('17', 'admin1', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-08 20:49:13', null, 'admin', '0', null, null, null, null, '1', '12312312312', '123123@qq.com', '', '1');
INSERT INTO `dino_admin` VALUES ('18', 'admin223', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-08 22:04:26', null, 'admin1', '0', null, null, null, null, '1', '123123123', '123@qq.com', '', '2');
INSERT INTO `dino_admin` VALUES ('19', '1234', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-10 23:05:36', '14', 'ggg1', '16', '2017-09-10 23:01:27', '127.0.0.1', '2017-09-10 23:06:18', '127.0.0.1', '1', '1231231231', '123@qq.com', '', '1');
INSERT INTO `dino_admin` VALUES ('20', '123123', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-10 22:12:25', null, 'sss', '0', null, null, null, null, '1', '1231231231', '123@qq.com', '123123', '1');

-- ----------------------------
-- Table structure for `dino_admin_access`
-- ----------------------------
DROP TABLE IF EXISTS `dino_admin_access`;
CREATE TABLE `dino_admin_access` (
  `role_id` int(11) DEFAULT NULL COMMENT '角色id',
  `menu_id` int(11) DEFAULT NULL COMMENT '菜单id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色与菜单表';

-- ----------------------------
-- Records of dino_admin_access
-- ----------------------------
INSERT INTO `dino_admin_access` VALUES ('1', '1');

-- ----------------------------
-- Table structure for `dino_admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `dino_admin_menu`;
CREATE TABLE `dino_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '菜单名称',
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '菜单路径',
  `up` int(11) DEFAULT '0' COMMENT '上级菜单（0、顶级菜单',
  `ico` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '图标',
  `sort` int(2) DEFAULT NULL COMMENT '排序',
  `status` int(1) DEFAULT '1' COMMENT '状态（1正常）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='菜单表';

-- ----------------------------
-- Records of dino_admin_menu
-- ----------------------------
INSERT INTO `dino_admin_menu` VALUES ('1', '企业管理', 'adminddd', '1', null, '1', '1');
INSERT INTO `dino_admin_menu` VALUES ('2', '业主管理', 'admin', '1', null, '2', '1');
INSERT INTO `dino_admin_menu` VALUES ('3', '客户管理', 'admin', '1', null, '3', '1');
INSERT INTO `dino_admin_menu` VALUES ('4', '财务管理', 'admin', '1', null, '4', '1');
INSERT INTO `dino_admin_menu` VALUES ('5', '报表管理', 'admin', '1', null, '5', '1');
INSERT INTO `dino_admin_menu` VALUES ('6', '管理员管理', 'admin', '1', null, '6', '1');
INSERT INTO `dino_admin_menu` VALUES ('7', '系统管理', 'admin', '1', null, '7', '1');

-- ----------------------------
-- Table structure for `dino_admin_role`
-- ----------------------------
DROP TABLE IF EXISTS `dino_admin_role`;
CREATE TABLE `dino_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '角色名称',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '描述信息',
  `status` int(1) DEFAULT NULL COMMENT '状态（1正常）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色表';

-- ----------------------------
-- Records of dino_admin_role
-- ----------------------------
INSERT INTO `dino_admin_role` VALUES ('1', '管理员', '管理员的权限', '1');

-- ----------------------------
-- Table structure for `dino_auth`
-- ----------------------------
DROP TABLE IF EXISTS `dino_auth`;
CREATE TABLE `dino_auth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(68) DEFAULT NULL COMMENT '权限的名称',
  `auth_c` varchar(20) DEFAULT NULL COMMENT '所在的模板',
  `auth_a` varchar(20) DEFAULT NULL COMMENT '所在的方法',
  `auth_pid` int(3) unsigned DEFAULT NULL COMMENT '上级权限id',
  `auth_path` varchar(20) DEFAULT NULL COMMENT '权限的全路径',
  `auth_level` int(11) DEFAULT NULL COMMENT '权限的层次',
  `is_show` char(1) DEFAULT '1' COMMENT '1为显示 0 为隐藏',
  `sort` varchar(255) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `auth` varchar(255) DEFAULT NULL COMMENT '拥有的权限 1添加 2修改 3x修改4 查询 5审查',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='板块表';

-- ----------------------------
-- Records of dino_auth
-- ----------------------------
INSERT INTO `dino_auth` VALUES ('1', '系统管理', null, null, '0', '1', '0', '1', '12', '', null);
INSERT INTO `dino_auth` VALUES ('3', '菜单管理', 'Menu', 'lists', '1', '1-3', '1', '1', '2', '', '1,2,3,4,5');
INSERT INTO `dino_auth` VALUES ('6', '管理员管理', '', '', '0', '6', '0', '1', '4', null, null);
INSERT INTO `dino_auth` VALUES ('7', '角色管理', 'Admin', 'admin_role', '6', '6-7', '1', '1', '2', '', '1,2,3,4,5');
INSERT INTO `dino_auth` VALUES ('9', '管理员列表', 'Admin', 'admin_list', '6', '6-8', '1', '1', '2', '', '1,2,3');
INSERT INTO `dino_auth` VALUES ('10', '企业管理', null, null, '0', '10', '0', '1', '0', '', null);
INSERT INTO `dino_auth` VALUES ('11', '系统设置', 'Menu', 'system_list', '1', '11-1', '1', '1', '0', '', '1,2,3,4,5');
INSERT INTO `dino_auth` VALUES ('12', '字典管理', 'Menu', 'dictionary_list', '1', '12-1', '1', '1', '0', '', '1,2,3,4,5');
INSERT INTO `dino_auth` VALUES ('17', '日志管理', 'Menu', 'systemlog_list', '1', '17-1', '1', '1', '0', '', '3,4');
INSERT INTO `dino_auth` VALUES ('19', '公司信息', 'Enterprise', 'company_list', '10', '19-10', '1', '1', '0', '', '1,2,3,4');
INSERT INTO `dino_auth` VALUES ('20', '员工管理', 'Enterprise', 'staff_list', '10', '20-10', '1', '1', '0', '', '1,2,3,4');
INSERT INTO `dino_auth` VALUES ('21', '园区管理', 'Enterprise', 'garden_list', '10', '21-10', '1', '1', '0', '', '1,2,3,4');
INSERT INTO `dino_auth` VALUES ('22', '房源管理', 'Enterprise', 'house_list', '10', '22-10', '1', '1', '0', '', '2,3,4');
INSERT INTO `dino_auth` VALUES ('23', '客户管理', null, null, '0', '23', '0', '1', '0', '', '1,2,3,4');
INSERT INTO `dino_auth` VALUES ('24', '客户管理', 'Customer', 'customer_list', '23', '24-23', '1', '1', '0', '', '1,2,3,4');
INSERT INTO `dino_auth` VALUES ('25', '业主管理', null, null, '0', '25', '0', '1', '0', '', null);
INSERT INTO `dino_auth` VALUES ('26', '业主管理', 'Detailed', 'detailed_list.html', '25', '26-25', '1', '1', '0', '', '1,2,3,4');
INSERT INTO `dino_auth` VALUES ('27', '合同管理', 'Cuscontract', 'cuscontract_list', '25', '27-25', '1', '1', '0', '', '1,2,3,4');

-- ----------------------------
-- Table structure for `dino_bank`
-- ----------------------------
DROP TABLE IF EXISTS `dino_bank`;
CREATE TABLE `dino_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `company_id` int(11) DEFAULT NULL COMMENT '公司id',
  `name` int(11) DEFAULT NULL COMMENT '银行名',
  `bank_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '开户银行号',
  `bank_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '开户银行户名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='银行表';

-- ----------------------------
-- Records of dino_bank
-- ----------------------------
INSERT INTO `dino_bank` VALUES ('1', '1', '14', '123123', '123123');
INSERT INTO `dino_bank` VALUES ('4', '2', '14', '898989', '章三');
INSERT INTO `dino_bank` VALUES ('5', '3', '15', '256656', '张飞');
INSERT INTO `dino_bank` VALUES ('6', '3', '15', '445', '说的是');

-- ----------------------------
-- Table structure for `dino_company`
-- ----------------------------
DROP TABLE IF EXISTS `dino_company`;
CREATE TABLE `dino_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '公司名称',
  `license_number` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '统一社会信用代码',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '公司地址',
  `legal` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '法人代表',
  `legal_mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '法人代表联系电话',
  `contact` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '对接联系人',
  `contact_mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '对接联系人 手机',
  `contact_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '对接联系人 固定电话',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `status` int(1) DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='公司表';

-- ----------------------------
-- Records of dino_company
-- ----------------------------
INSERT INTO `dino_company` VALUES ('1', '21312', '312312', '3123123', '131313131', '15917902892', '3131', '312313', '12312', '', '1', '1505139292', '1', null, null);
INSERT INTO `dino_company` VALUES ('2', '213', '898989', '深圳南山', '章飞', '13567890987', '', '', '', '', '1', '1505192910', '1', '1505364594', '1');

-- ----------------------------
-- Table structure for `dino_contract`
-- ----------------------------
DROP TABLE IF EXISTS `dino_contract`;
CREATE TABLE `dino_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `park_id` int(11) DEFAULT NULL COMMENT '园区id',
  `house_id` int(11) DEFAULT NULL COMMENT '房源的id',
  `lease_id` int(11) DEFAULT NULL COMMENT '出租方',
  `tenantry_id` int(11) DEFAULT NULL COMMENT '承租方',
  `type` int(1) DEFAULT NULL COMMENT '合同类型(1、客户 2、业主)',
  `contract_num` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '合同号',
  `business_scope` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '经营范围',
  `client_source` int(11) DEFAULT NULL COMMENT '客户来源',
  `time_begin` date DEFAULT NULL COMMENT '开始日期',
  `time_end` date DEFAULT NULL COMMENT '截止日期',
  `time_effect` date DEFAULT NULL COMMENT '起租日期',
  `lessee_area` decimal(10,2) DEFAULT NULL COMMENT '承租面积',
  `lease_area` decimal(10,2) DEFAULT NULL COMMENT '出租面积',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '押金',
  `basic_rent` decimal(10,2) DEFAULT NULL COMMENT '基本租金',
  `first_rent` decimal(10,2) DEFAULT NULL COMMENT '首次租金',
  `first_time_begin` date DEFAULT NULL COMMENT '首次租金开始时间',
  `first_time_end` date DEFAULT NULL COMMENT '首次租金结束时间',
  `ele_deposit` decimal(10,2) DEFAULT NULL COMMENT '电费押金',
  `water_deposit` decimal(10,2) DEFAULT NULL COMMENT '水费押金',
  `others_deposit` decimal(10,2) DEFAULT NULL COMMENT '其他押金',
  `maintain_type` int(2) DEFAULT NULL COMMENT '维修基金类型',
  `tax_rate` int(2) DEFAULT NULL COMMENT '税率类型',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `status` int(1) DEFAULT '1' COMMENT '状态（1正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同表';

-- ----------------------------
-- Records of dino_contract
-- ----------------------------
INSERT INTO `dino_contract` VALUES ('26', '2', null, '9', '1', '2', '合同1', '10000', '15', '2017-09-14', '2017-09-13', '2017-09-13', '1000.00', '1000.00', '1000.00', '1000.00', '1500.00', '2017-09-14', '2017-09-30', '500.00', '2000.00', '1000.00', null, null, '', '1', '1505379469', '1', null, null);
INSERT INTO `dino_contract` VALUES ('32', '1', null, '17', '1', '2', '合同号', '1000', '15', '2017-09-14', '2017-09-01', '2017-09-01', '1000.00', '100.00', '1000.00', '1000.00', '1500.00', '2017-09-14', '2017-09-29', '500.00', '3000.00', '2002.00', null, null, '备注u', '1', '1505380357', '1', null, null);
INSERT INTO `dino_contract` VALUES ('34', '1', null, '17', '1', '2', '合同号', '1000', '15', '2017-09-14', '2017-09-01', '2017-09-01', '1000.00', '100.00', '1000.00', '1000.00', '1500.00', '2017-09-14', '2017-09-29', '500.00', '3000.00', '2002.00', null, null, '备注u', '1', '1505380927', '1', null, null);
INSERT INTO `dino_contract` VALUES ('53', '2', null, '3', '1', '2', '合同1', '10000', '15', '2017-09-14', '2017-09-14', '2017-09-14', '100.00', '1000.00', '1000.00', '1000.00', '1000.00', '2017-09-14', '2017-09-30', '1000.00', '2000.00', '1000.00', null, null, '1231', '2', '1505393663', '1', '1505398077', '1');
INSERT INTO `dino_contract` VALUES ('57', '8', null, '9', '1', '2', '213', '123131', '15', '2017-09-23', '2017-09-30', '2017-09-23', '111.00', '12.00', '123123.00', '12321.00', '313213.00', '2017-09-22', '2017-09-27', '123.00', '123.00', '123.00', null, null, '', '2', '1505397639', '1', '1505398025', '1');
INSERT INTO `dino_contract` VALUES ('58', '8', null, '9', '1', '2', '123', '123', '15', '2017-09-14', '2017-09-29', '2017-09-14', '123.00', '123.00', '123.00', '123.00', '123.00', '2017-09-14', '2017-09-30', '123.00', '123.00', '23.00', null, null, '', '1', '1505402552', '1', null, null);
INSERT INTO `dino_contract` VALUES ('59', '7', null, '19', '1', '2', '12', '123', '15', '2017-09-14', '2017-09-29', '2017-09-29', '213.00', '123.00', '123.00', '123.00', '123.00', '2017-09-29', '2017-09-29', '123.00', '12.00', '135.00', null, null, '', '1', '1505403131', '1', null, null);

-- ----------------------------
-- Table structure for `dino_contract_hydropower`
-- ----------------------------
DROP TABLE IF EXISTS `dino_contract_hydropower`;
CREATE TABLE `dino_contract_hydropower` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `fees_id` int(11) DEFAULT NULL COMMENT '费用id',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同id',
  `park_id` int(11) DEFAULT NULL COMMENT '园区id',
  `house_id` int(11) DEFAULT NULL COMMENT '房源id',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户id',
  `water_id` int(11) DEFAULT NULL COMMENT '水表id',
  `type` int(1) DEFAULT NULL COMMENT '类型(1、客户 2、业主)',
  `hydropower_type` int(1) DEFAULT NULL COMMENT '水电类型（1、水 2、电',
  `time` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '时间',
  `up_record` int(11) DEFAULT NULL COMMENT '上期度数',
  `current_record` int(11) DEFAULT NULL COMMENT '当前度数',
  `rate` int(5) DEFAULT '1' COMMENT '倍率(单位为整数',
  `loss` int(5) DEFAULT '100' COMMENT '损耗(单位为百分号 100为整数1',
  `share` int(3) DEFAULT '100' COMMENT '分摊比例',
  `price` decimal(10,2) DEFAULT NULL COMMENT '单价',
  `water_fees` decimal(10,2) DEFAULT NULL COMMENT '水费',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同水费表';

-- ----------------------------
-- Records of dino_contract_hydropower
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_contract_month`
-- ----------------------------
DROP TABLE IF EXISTS `dino_contract_month`;
CREATE TABLE `dino_contract_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `fees_id` int(11) DEFAULT NULL COMMENT '费用id',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同id',
  `park_id` int(11) DEFAULT NULL COMMENT '园区id',
  `house_id` int(11) DEFAULT NULL COMMENT '房源id',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户id',
  `type` int(1) DEFAULT NULL COMMENT '类型(1、客户 2、业主)',
  `time` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '时间',
  `dictionary_id` int(11) DEFAULT NULL COMMENT '收费项',
  `price` decimal(10,2) DEFAULT NULL COMMENT '金额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同每月固定的费用';

-- ----------------------------
-- Records of dino_contract_month
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_customer`
-- ----------------------------
DROP TABLE IF EXISTS `dino_customer`;
CREATE TABLE `dino_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `type` int(1) DEFAULT '1' COMMENT '客户类型(1、客户 2、业主 3、外联)',
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '客户名称',
  `contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '联系人',
  `alias1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '别名1',
  `alias2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '别名2',
  `alias3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '别名3',
  `sex` int(1) DEFAULT '1' COMMENT '性别(0保密；1男；2女)',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '电话',
  `number_type` int(11) DEFAULT NULL COMMENT '证件类型',
  `id_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '证件号码',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地址',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `balance` decimal(10,2) DEFAULT NULL COMMENT '余额',
  `status` int(11) DEFAULT '1' COMMENT '状态（1；正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='客户表';

-- ----------------------------
-- Records of dino_customer
-- ----------------------------
INSERT INTO `dino_customer` VALUES ('9', '2', '客户1', '12', '21', '2', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12.00', '12', '12', '12', '12', '12');
INSERT INTO `dino_customer` VALUES ('3', '2', '客户名称', '联系人', '', '', '', '1', '21231@qq.com', '13813131313', '', '1', '不需要你管', '地址', '123123', null, '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('4', '1', '123123', '123', '13', '123', '13', '3', '13123123123@qq.com', '13513131313', '313', '1', '13', '123', '132', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('5', '1', '11111', '111111', '11', '', '', '1', '13413131313@qq.com', '13413131313', '', '1', '2131231', '313123123', '', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('6', '1', '11111123', '123', '11', '', '', '1', '13413131313@qq.com', '13413131313', '', '1', '2131231', '313123123', '2132', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('12', '2', '客户2', '21', '2', '12', '12', '12', '12', '12', '12', '12', '12', '121', '21', '2.00', '12', '121', null, null, null);
INSERT INTO `dino_customer` VALUES ('13', '2', '车市', '不知道', '', '', '', '0', '15917902898@qq.com', '15917902898', '', '1', '21313', '12313', '', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('14', '2', '车市', '不知道', '', '', '', '0', '15917902898@qq.com', '15917902898', '', '1', '21313', '12313', '', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('15', '2', '车市', '不知道', '', '', '', '0', '15917902898@qq.com', '15917902898', '', '1', '21313', '12313', '', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('16', '2', '12312', '3123123', '', '', '', '0', '123@qq.com', '15917908023', '', '1', '123123', '1323', '', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('17', '2', '12312', '3123', '123123', '', '', '1', '1231231@qq.com', '15917902898', '', '1', '1231231', '23123', '', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('18', '2', '车市1', '12313213', '', '', '', '1', '121212121@qq.com', '13824597684', '', '1', '123123', '123123123', '', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('19', '2', '1231231231', '23123123123213', '', '', '', '0', '123132213@qq.com', '13824597684', '', '1', '123123', '123123', '', '0.00', '1', null, null, null, null);
INSERT INTO `dino_customer` VALUES ('20', '2', '1231231', '123123', '', '', '', '0', '123132213@qq.com', '13824597684', '', '1', '123123', '123123', '', '0.00', '1', null, null, null, null);

-- ----------------------------
-- Table structure for `dino_customer_fees`
-- ----------------------------
DROP TABLE IF EXISTS `dino_customer_fees`;
CREATE TABLE `dino_customer_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户id',
  `park_id` int(11) DEFAULT NULL COMMENT '园区id',
  `type` int(1) DEFAULT NULL COMMENT '类型(1、客户 2、业主)',
  `time` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '时间',
  `balance` decimal(10,2) DEFAULT NULL COMMENT '余额',
  `price` decimal(10,2) DEFAULT NULL COMMENT '总费用',
  `receivable` decimal(10,2) DEFAULT NULL COMMENT '应收',
  `month_fees` decimal(10,2) DEFAULT NULL COMMENT '每月固定的费用',
  `electric_fees` decimal(10,2) DEFAULT NULL COMMENT '电费',
  `water_fees` decimal(10,2) DEFAULT NULL COMMENT '水费',
  `else_fees` decimal(10,2) DEFAULT NULL COMMENT '其它费用',
  `maintain_fees` decimal(10,2) DEFAULT NULL COMMENT '维修基金费用',
  `tax_fees` decimal(10,2) DEFAULT NULL COMMENT '税费',
  `status` int(1) DEFAULT NULL COMMENT '状态（0 未更新 1 以更新 2 以完成）',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='客户费用';

-- ----------------------------
-- Records of dino_customer_fees
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_dictionary`
-- ----------------------------
DROP TABLE IF EXISTS `dino_dictionary`;
CREATE TABLE `dino_dictionary` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `type` int(1) DEFAULT NULL COMMENT '类型 1证件类型 2银行类型3  支付类型4客户来源5 费用科目',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '类型名称',
  `status` int(1) DEFAULT NULL COMMENT '状态（1、系统 2、自建',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='字典表';

-- ----------------------------
-- Records of dino_dictionary
-- ----------------------------
INSERT INTO `dino_dictionary` VALUES ('1', '1', '123123', '1');
INSERT INTO `dino_dictionary` VALUES ('11', '2', '12312322', '2');
INSERT INTO `dino_dictionary` VALUES ('12', '2', '中国银行', '1');
INSERT INTO `dino_dictionary` VALUES ('13', '2', '招商银行', '1');
INSERT INTO `dino_dictionary` VALUES ('14', '2', '工商银行', '1');
INSERT INTO `dino_dictionary` VALUES ('15', '4', '客户来源1', '1');
INSERT INTO `dino_dictionary` VALUES ('16', '5', '物业管理费', '1');
INSERT INTO `dino_dictionary` VALUES ('17', '5', '垃圾费', '1');

-- ----------------------------
-- Table structure for `dino_electric`
-- ----------------------------
DROP TABLE IF EXISTS `dino_electric`;
CREATE TABLE `dino_electric` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `park_id` int(11) DEFAULT NULL COMMENT '园区id',
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '电表名',
  `init_record` int(11) DEFAULT NULL COMMENT '初始度数',
  `rate` int(5) DEFAULT '1' COMMENT '倍率(单位为整数',
  `loss` int(5) DEFAULT '100' COMMENT '损耗(单位为百分号 100为整数1',
  `status` int(1) DEFAULT NULL COMMENT '状态（1；正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='电表';

-- ----------------------------
-- Records of dino_electric
-- ----------------------------
INSERT INTO `dino_electric` VALUES ('10', '2', '电表名', '50', '10', '120', '1', '1505379469', '1', null, null);
INSERT INTO `dino_electric` VALUES ('11', '2', '电表2', '20', '20', '20', '1', '1505379469', '1', null, null);
INSERT INTO `dino_electric` VALUES ('12', '2', '电表1', '0', '10', '0', '1', '1505380357', '1', null, null);
INSERT INTO `dino_electric` VALUES ('13', '2', '电表2', '0', '15', '20', '1', '1505380357', '1', null, null);
INSERT INTO `dino_electric` VALUES ('16', '2', '电表1', '0', '10', '0', '1', '1505380927', '1', null, null);
INSERT INTO `dino_electric` VALUES ('17', '2', '电表2', '0', '15', '20', '1', '1505380927', '1', null, null);
INSERT INTO `dino_electric` VALUES ('34', '7', '123', '123', '123', '123', '1', '1505397639', '1', null, null);
INSERT INTO `dino_electric` VALUES ('35', '7', '123', '123', '123', '132', '1', '1505402552', '1', null, null);
INSERT INTO `dino_electric` VALUES ('36', '7', '44', '44', '44', '44', '1', '1505403131', '1', null, null);
INSERT INTO `dino_electric` VALUES ('37', '8', '4', '14', '4', '4', '1', '1505403131', '1', null, null);

-- ----------------------------
-- Table structure for `dino_electric_contract`
-- ----------------------------
DROP TABLE IF EXISTS `dino_electric_contract`;
CREATE TABLE `dino_electric_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同ID',
  `electric_id` int(11) DEFAULT NULL COMMENT '电表ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同与电表的关系表';

-- ----------------------------
-- Records of dino_electric_contract
-- ----------------------------
INSERT INTO `dino_electric_contract` VALUES ('10', '26', '10');
INSERT INTO `dino_electric_contract` VALUES ('11', '26', '11');
INSERT INTO `dino_electric_contract` VALUES ('12', '32', '12');
INSERT INTO `dino_electric_contract` VALUES ('13', '32', '13');
INSERT INTO `dino_electric_contract` VALUES ('16', '34', '16');
INSERT INTO `dino_electric_contract` VALUES ('17', '34', '17');
INSERT INTO `dino_electric_contract` VALUES ('34', '57', '34');
INSERT INTO `dino_electric_contract` VALUES ('35', '58', '35');
INSERT INTO `dino_electric_contract` VALUES ('36', '59', '36');
INSERT INTO `dino_electric_contract` VALUES ('37', '59', '37');

-- ----------------------------
-- Table structure for `dino_electric_price`
-- ----------------------------
DROP TABLE IF EXISTS `dino_electric_price`;
CREATE TABLE `dino_electric_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `electric_id` int(11) DEFAULT NULL COMMENT '电表id',
  `readings_begin` int(11) DEFAULT NULL COMMENT '开始度数',
  `readings_end` int(11) DEFAULT NULL COMMENT '结束度数',
  `price` decimal(10,2) DEFAULT NULL COMMENT '单价',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='电表与合同的单价';

-- ----------------------------
-- Records of dino_electric_price
-- ----------------------------
INSERT INTO `dino_electric_price` VALUES ('7', '10', '51', '100', '20.00');
INSERT INTO `dino_electric_price` VALUES ('8', '11', '30', '500', '10.00');
INSERT INTO `dino_electric_price` VALUES ('9', '12', '100', '1000', '20.00');
INSERT INTO `dino_electric_price` VALUES ('11', '16', '100', '1000', '20.00');
INSERT INTO `dino_electric_price` VALUES ('20', '34', '312', '132', '132.00');
INSERT INTO `dino_electric_price` VALUES ('21', '35', '123', '123', '123.00');
INSERT INTO `dino_electric_price` VALUES ('22', '36', '44', '44', '44.00');
INSERT INTO `dino_electric_price` VALUES ('23', '36', '14', '14', '14.00');
INSERT INTO `dino_electric_price` VALUES ('24', '36', '123', '123', '123.00');
INSERT INTO `dino_electric_price` VALUES ('25', '37', '44', '4', '4.00');

-- ----------------------------
-- Table structure for `dino_electric_record`
-- ----------------------------
DROP TABLE IF EXISTS `dino_electric_record`;
CREATE TABLE `dino_electric_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `electric_id` int(11) DEFAULT NULL COMMENT '电表ID',
  `time` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '时间',
  `up_record` int(11) DEFAULT NULL COMMENT '上期度数',
  `current_record` int(11) DEFAULT NULL COMMENT '当前度数',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='电表度数记录';

-- ----------------------------
-- Records of dino_electric_record
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_house`
-- ----------------------------
DROP TABLE IF EXISTS `dino_house`;
CREATE TABLE `dino_house` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `park_id` int(11) DEFAULT NULL COMMENT '园区ID',
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '房源名',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `status` int(1) DEFAULT '1' COMMENT '状态（1；正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='房源表';

-- ----------------------------
-- Records of dino_house
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_incomeexpenditure`
-- ----------------------------
DROP TABLE IF EXISTS `dino_incomeexpenditure`;
CREATE TABLE `dino_incomeexpenditure` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `park_id` int(11) DEFAULT NULL COMMENT '园区ID',
  `payment_id` int(11) DEFAULT NULL COMMENT '付款人',
  `payee_id` int(11) DEFAULT NULL COMMENT '收款人',
  `customer_type` int(1) DEFAULT '1' COMMENT '客户类型（1、客户 2、业主 3、外联',
  `dictionary_id` int(11) DEFAULT NULL COMMENT '收费项',
  `type` int(11) DEFAULT '1' COMMENT '类型（1、收入 2、支出',
  `price` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `pay_type` int(11) DEFAULT NULL COMMENT '支付方式',
  `deductible` int(1) DEFAULT '1' COMMENT '自动抵扣欠费(1、不 2、是',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `status` int(1) DEFAULT '1' COMMENT '状态（1正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='收入与支出';

-- ----------------------------
-- Records of dino_incomeexpenditure
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_inform`
-- ----------------------------
DROP TABLE IF EXISTS `dino_inform`;
CREATE TABLE `dino_inform` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '通知标题',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '通知内容',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` int(1) DEFAULT '1' COMMENT '状态（1未查看 2已查看',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='通知表';

-- ----------------------------
-- Records of dino_inform
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_log`
-- ----------------------------
DROP TABLE IF EXISTS `dino_log`;
CREATE TABLE `dino_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(11) DEFAULT NULL COMMENT '操作人员',
  `menu_id` int(11) DEFAULT NULL COMMENT '操作菜单',
  `result` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作内容',
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=287 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='日志表';

-- ----------------------------
-- Records of dino_log
-- ----------------------------
INSERT INTO `dino_log` VALUES ('1', '1', '0', '1', '登录成功', '2017-09-07 21:45:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('2', '1', null, '1', '登录成功', '2017-09-07 21:46:27', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('3', '1', '11', '2', '增加了123111', '2017-09-07 21:52:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('4', '1', '11', '2', '增加了字段id为28', '2017-09-07 22:06:19', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('5', '1', '11', '4', '修改了字段id为28', '2017-09-07 22:06:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('6', '1', '11', '3', '删除了字段id为28', '2017-09-07 22:06:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('7', '1', '3', '2', '增加了了菜单id为13', '2017-09-07 22:06:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('8', '1', '3', '4', '修改了菜单id为13', '2017-09-07 22:07:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('9', '1', '3', '3', '删除了菜单id为13', '2017-09-07 22:07:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('10', '1', '9', '2', '增加了角色id为721', '2017-09-07 22:07:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('11', '1', '9', '2', '增加了角色id为27', '2017-09-07 22:09:07', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('12', '1', '7', '4', '修改了角色id为27', '2017-09-07 22:09:17', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('13', '1', '7', '3', '删除了角色id为27', '2017-09-07 22:09:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('14', '1', '7', '3', '删除了角色id为26', '2017-09-07 22:09:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('15', '1', '12', '2', '添加了字典id为6', '2017-09-07 22:09:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('22', '1', '7', '4', '修改了角色id为13', '2017-09-07 22:32:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('23', '1', '9', '4', '修改了管理员id为11', '2017-09-07 22:32:23', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('24', '1', '9', '4', '修改了管理员id为11', '2017-09-07 22:32:37', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('25', '11', '0', '1', '登录成功', '2017-09-07 22:32:54', null, '127.0.0.1');
INSERT INTO `dino_log` VALUES ('26', '1', '0', '1', '登录成功', '2017-09-07 22:33:31', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('27', '1', '7', '4', '修改了角色id为13', '2017-09-07 22:33:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('28', '11', '0', '1', '登录成功', '2017-09-07 22:34:04', null, '127.0.0.1');
INSERT INTO `dino_log` VALUES ('29', '11', '11', '2', '增加了字段id为29', '2017-09-07 22:34:15', null, '127.0.0.1');
INSERT INTO `dino_log` VALUES ('30', '1', '0', '1', '登录成功', '2017-09-07 22:35:05', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('31', '1', '0', '1', '登录成功', '2017-09-08 09:46:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('32', '1', '11', '2', '增加了字段id为30', '2017-09-08 09:48:33', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('33', '1', '0', '1', '登录成功', '2017-09-08 09:50:01', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('34', '1', '0', '1', '登录成功', '2017-09-08 09:51:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('35', '1', null, '1', '登录成功', '2017-09-08 10:06:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('36', '1', '9', '2', '增加了角色id为28', '2017-09-08 10:13:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('37', '1', '7', '4', '修改了角色id为28', '2017-09-08 10:14:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('38', '1', '7', '3', '删除了角色id为28', '2017-09-08 10:14:22', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('39', '1', '9', '4', '修改了管理员id为11', '2017-09-08 10:14:50', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('40', '1', '9', '4', '修改了管理员id为11', '2017-09-08 10:14:57', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('41', '1', '9', '4', '修改了管理员id为11', '2017-09-08 10:15:03', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('42', '1', '9', '3', '删除了管理员id为11', '2017-09-08 10:16:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('43', '1', '9', '3', '删除了管理员id为10,8', '2017-09-08 10:16:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('44', '1', '9', '2', '增加了管理员id为12', '2017-09-08 10:16:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('45', '1', '7', '3', '删除了角色id为25,23', '2017-09-08 10:16:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('46', '1', '11', '3', '删除了字段id为30,29', '2017-09-08 10:17:12', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('47', '1', '11', '4', '修改了字段id为27', '2017-09-08 10:17:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('48', '1', '11', '3', '删除了字段id为27', '2017-09-08 10:17:19', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('49', '1', '3', '3', '删除了菜单id为14', '2017-09-08 10:17:34', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('50', '1', '3', '2', '增加了了菜单id为15', '2017-09-08 10:18:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('51', '1', '3', '3', '删除了菜单id为15', '2017-09-08 10:18:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('52', '1', '3', '2', '增加了了菜单id为16', '2017-09-08 10:18:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('53', '1', '3', '4', '修改了菜单id为16', '2017-09-08 10:18:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('54', '1', '3', '3', '删除了菜单id为16', '2017-09-08 10:18:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('55', '1', '12', '2', '添加了字典id为7', '2017-09-08 10:18:42', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('56', '1', '12', '3', '删除了字典id为7', '2017-09-08 10:18:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('60', '1', '3', '2', '增加了了菜单id为17', '2017-09-08 10:21:10', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('61', '1', null, '1', '登录成功', '2017-09-08 10:21:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('62', '1', '9', '2', '增加了角色id为29', '2017-09-08 14:23:33', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('63', '1', '7', '4', '修改了角色id为29', '2017-09-08 14:23:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('64', '1', '7', '3', '删除了角色id为29', '2017-09-08 14:23:46', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('65', '1', '7', '3', '删除了角色id为21,18', '2017-09-08 14:23:50', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('66', '1', '9', '2', '增加了管理员id为13', '2017-09-08 14:24:10', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('67', '1', '9', '4', '修改了管理员id为13', '2017-09-08 14:24:17', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('68', '1', '9', '4', '修改了管理员id为13', '2017-09-08 14:24:22', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('69', '1', '9', '3', '删除了管理员id为13', '2017-09-08 14:24:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('70', '1', '9', '3', '删除了管理员id为12,7', '2017-09-08 14:24:30', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('71', '1', '9', '2', '增加了管理员id为14', '2017-09-08 14:25:46', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('72', '1', '9', '3', '删除了管理员id为14', '2017-09-08 14:25:50', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('73', '1', '11', '2', '增加了字段id为31', '2017-09-08 14:26:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('74', '1', '11', '4', '修改了字段id为31', '2017-09-08 14:26:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('75', '1', '11', '3', '删除了字段id为31,26', '2017-09-08 14:26:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('76', '1', '11', '3', '删除了字段id为25', '2017-09-08 14:26:23', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('77', '1', '7', '3', '删除了角色id为14', '2017-09-08 14:26:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('78', '1', '3', '2', '增加了了菜单id为18', '2017-09-08 14:27:38', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('79', '1', '3', '3', '删除了菜单id为18', '2017-09-08 14:27:42', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('80', '1', '3', '4', '修改了菜单id为17', '2017-09-08 14:27:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('81', '1', '3', '4', '修改了菜单id为12', '2017-09-08 14:27:57', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('82', '1', '3', '4', '修改了菜单id为11', '2017-09-08 14:28:01', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('83', '1', null, '2', '添加了字典id为9', '2017-09-08 14:28:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('84', '1', null, '3', '删除了字典id为9', '2017-09-08 14:28:19', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('87', '1', '9', '2', '增加了管理员id为15', '2017-09-08 18:11:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('88', '1', null, '1', '登录成功', '2017-09-08 20:15:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('89', '1', '0', '1', '登录成功', '2017-09-08 20:17:46', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('90', '1', '9', '4', '修改了管理员id为15', '2017-09-08 20:19:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('91', '1', '0', '1', '登录成功', '2017-09-08 20:31:58', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('92', '1', '9', '2', '增加了管理员id为16', '2017-09-08 20:48:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('93', '1', '9', '2', '增加了管理员id为17', '2017-09-08 20:49:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('94', '1', '9', '2', '增加了管理员id为18', '2017-09-08 20:49:31', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('95', '1', '9', '2', '增加了管理员id为19', '2017-09-08 20:50:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('96', '1', '9', '4', '修改了管理员id为1', '2017-09-08 21:03:30', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('97', '1', '9', '2', '增加了角色id为30', '2017-09-08 21:04:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('98', '1', '7', '4', '修改了角色id为12', '2017-09-08 21:04:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('99', '1', '7', '3', '删除了角色id为30', '2017-09-08 21:04:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('100', '1', null, '2', '增加了字段id为32', '2017-09-08 21:10:38', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('101', '1', '9', '2', '增加了角色id为31', '2017-09-08 21:43:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('102', '1', '7', '3', '删除了角色为213123', '2017-09-08 21:43:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('103', '1', '9', '3', '删除了管理员为admin11', '2017-09-08 22:03:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('104', '1', '9', '4', '修改了管理员为admin223', '2017-09-08 22:04:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('105', '1', '9', '2', '增加了角色为213', '2017-09-08 22:04:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('106', '1', '7', '4', '修改了角色为2131', '2017-09-08 22:04:48', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('107', '1', '7', '3', '删除了角色为2131', '2017-09-08 22:04:56', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('108', '1', null, '2', '增加了字段为212', '2017-09-08 22:05:03', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('109', '1', null, '4', '修改了字段为222221', '2017-09-08 22:05:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('110', '1', null, '3', '删除了字段为', '2017-09-08 22:05:12', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('111', '1', null, '3', '删除了字段为11', '2017-09-08 22:06:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('112', '1', '3', '2', '增加了了菜单为公司信息', '2017-09-08 22:06:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('113', '1', '3', '4', '修改了菜单为公司信息', '2017-09-08 22:07:03', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('114', '1', '3', '2', '增加了了菜单为111', '2017-09-08 22:08:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('115', '1', '3', '3', '删除了管理员为111', '2017-09-08 22:08:17', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('116', '1', null, '2', '添加了字典为21313', '2017-09-08 22:08:30', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('117', '1', null, '4', '修改了字典为21313', '2017-09-08 22:08:34', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('118', '1', null, '3', '删除了字典为', '2017-09-08 22:08:37', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('119', '1', '7', '4', '修改了角色为测试', '2017-09-08 22:17:33', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('120', '1', '3', '4', '修改了菜单为管理员列表', '2017-09-08 22:17:57', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('121', '1', null, '4', '修改了管理员为cheshi', '2017-09-08 22:18:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('122', '5', '0', '1', '登录成功', '2017-09-08 22:19:21', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('123', '1', '0', '1', '登录成功', '2017-09-08 22:59:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('124', '1', '0', '1', '登录成功', '2017-09-08 22:59:56', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('125', '1', '0', '1', '登录成功', '2017-09-09 13:11:23', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('126', '1', '3', '2', '增加了了菜单为', '2017-09-09 13:35:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('127', '1', '3', '2', '增加了了菜单为嗖嗖嗖', '2017-09-09 13:55:12', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('128', '1', '3', '2', '增加了了菜单为12312', '2017-09-09 13:58:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('129', '1', '3', '4', '修改了菜单为12312', '2017-09-09 14:10:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('130', '1', '3', '4', '修改了菜单为系统管理', '2017-09-09 14:15:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('131', '1', '3', '4', '修改了菜单为菜单管理', '2017-09-09 14:15:34', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('132', '1', '3', '4', '修改了菜单为角色管理', '2017-09-09 14:15:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('133', '1', '3', '4', '修改了菜单为系统设置', '2017-09-09 14:15:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('134', '1', '3', '4', '修改了菜单为字典管理', '2017-09-09 14:15:50', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('135', '1', '3', '4', '修改了菜单为日志管理', '2017-09-09 14:15:56', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('136', '1', '3', '3', '删除了菜单为嗖嗖嗖', '2017-09-09 14:16:01', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('137', '1', '3', '3', '删除了菜单为12312', '2017-09-09 14:16:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('138', '1', '3', '3', '删除了菜单为', '2017-09-09 14:16:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('139', '1', '3', '4', '修改了菜单为日志管理', '2017-09-09 14:20:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('140', '1', null, '2', '增加了字段为123123', '2017-09-09 14:24:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('141', '1', null, '2', '添加了字典为12312322', '2017-09-09 14:25:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('142', '1', null, '2', '增加了字段为222', '2017-09-09 14:29:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('143', '1', null, '2', '增加了角色为213', '2017-09-09 14:30:01', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('144', '1', '0', '1', '登录成功', '2017-09-10 21:03:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('145', '1', '7', '4', '修改了角色为测试', '2017-09-10 21:05:24', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('146', '1', null, '2', '增加了管理员为ggg', '2017-09-10 21:06:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('147', '19', '0', '1', '登录成功', '2017-09-10 21:07:00', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('148', '19', '0', '1', '登录成功', '2017-09-10 21:08:09', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('149', '19', '0', '1', '登录成功', '2017-09-10 21:08:49', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('150', '19', '0', '1', '登录成功', '2017-09-10 21:09:04', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('151', '19', '0', '1', '登录成功', '2017-09-10 21:09:29', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('152', '1', '0', '1', '登录成功', '2017-09-10 21:10:57', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('153', '1', '3', '4', '修改了菜单为管理员列表', '2017-09-10 21:19:02', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('154', '1', '7', '4', '修改了角色为测试', '2017-09-10 21:36:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('155', '1', '7', '4', '修改了角色为测试', '2017-09-10 21:40:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('156', '1', '7', '4', '修改了角色为测试', '2017-09-10 21:40:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('157', '1', '7', '4', '修改了角色为测试', '2017-09-10 21:41:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('158', '1', null, '4', '修改了管理员为1234', '2017-09-10 21:45:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('159', '1', null, '4', '修改了管理员为1234', '2017-09-10 21:45:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('160', '1', null, '4', '修改了管理员为1234', '2017-09-10 21:45:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('161', '1', null, '4', '修改了管理员为1234', '2017-09-10 21:46:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('162', '19', '0', '1', '登录成功', '2017-09-10 21:47:05', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('163', '1', null, '4', '修改了管理员为1234', '2017-09-10 21:47:17', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('164', '19', '0', '1', '登录成功', '2017-09-10 21:47:28', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('165', '1', null, '4', '修改了管理员为1234', '2017-09-10 21:47:38', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('166', '1', null, '4', '修改了管理员为1234', '2017-09-10 21:48:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('167', '19', '0', '1', '登录成功', '2017-09-10 21:48:57', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('168', '1', '0', '1', '登录成功', '2017-09-10 21:55:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('169', '1', '3', '2', '增加了了菜单为213', '2017-09-10 21:56:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('170', '1', '3', '3', '删除了菜单为213', '2017-09-10 21:56:58', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('171', '1', null, '4', '修改了管理员为1234', '2017-09-10 21:59:07', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('172', '19', '0', '1', '登录成功', '2017-09-10 21:59:38', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('173', '1', null, '4', '修改了管理员为1234', '2017-09-10 22:03:11', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('174', '1', null, '4', '修改了管理员为1234', '2017-09-10 22:03:17', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('175', '19', '0', '1', '登录成功', '2017-09-10 22:03:25', 'ggg', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('176', '1', null, '3', '删除了管理员为admin1', '2017-09-10 22:06:27', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('177', '1', null, '3', '删除了管理员为admin1', '2017-09-10 22:06:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('178', '1', null, '3', '删除了管理员为admin1', '2017-09-10 22:07:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('179', '1', null, '4', '修改了管理员为1234', '2017-09-10 22:10:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('180', '1', null, '2', '增加了管理员为sss', '2017-09-10 22:12:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('181', '1', null, '4', '修改了管理员id为20', '2017-09-10 22:13:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('182', '1', '0', '1', '登录成功', '2017-09-10 22:22:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('183', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 22:47:05', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('184', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 22:47:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('185', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 22:47:42', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('186', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 22:47:47', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('187', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 22:50:05', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('188', '1', null, '2', '增加了角色为cheshi1', '2017-09-10 22:50:27', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('189', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 22:52:47', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('190', '1', '7', '4', '修改了角色为cheshi1', '2017-09-10 22:57:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('191', '1', '7', '4', '修改了角色为cheshi1', '2017-09-10 22:57:42', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('192', '1', '7', '4', '修改了角色为cheshi1', '2017-09-10 22:57:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('193', '1', '7', '4', '修改了角色为cheshi1', '2017-09-10 22:58:34', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('194', '1', null, '4', '修改了管理员为1234', '2017-09-10 22:59:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('195', '19', '0', '1', '登录成功', '2017-09-10 22:59:32', 'ggg1', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('196', '19', '0', '1', '登录成功', '2017-09-10 23:00:48', 'ggg1', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('197', '19', '0', '1', '登录成功', '2017-09-10 23:01:27', 'ggg1', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('198', '1', '7', '4', '修改了角色为测试', '2017-09-10 23:03:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('199', '1', '7', '4', '修改了角色为测试', '2017-09-10 23:03:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('200', '1', '7', '4', '修改了角色为测试', '2017-09-10 23:04:02', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('201', '1', '3', '4', '修改了菜单为管理员列表', '2017-09-10 23:04:31', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('202', '1', null, '2', '增加了角色为asd', '2017-09-10 23:04:58', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('203', '1', null, '4', '修改了管理员为1234', '2017-09-10 23:05:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('204', '1', null, '4', '修改了管理员为1234', '2017-09-10 23:05:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('205', '19', '0', '1', '登录成功', '2017-09-10 23:06:18', 'ggg1', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('206', '1', '7', '4', '修改了角色为asd', '2017-09-10 23:08:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('207', '1', '0', '1', '登录成功', '2017-09-10 23:17:01', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('208', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:18:51', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('209', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:19:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('210', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:20:47', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('211', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:21:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('212', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:21:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('213', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:22:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('214', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:25:38', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('215', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:25:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('216', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:26:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('217', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:26:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('218', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:27:49', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('219', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:28:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('220', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:28:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('221', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:29:19', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('222', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:29:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('223', '1', '3', '4', '修改了菜单为日志管理', '2017-09-10 23:30:24', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('224', '1', '3', '2', '增加了了菜单为121', '2017-09-10 23:30:46', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('225', '1', '3', '4', '修改了菜单为1212', '2017-09-10 23:30:55', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('226', '1', '3', '4', '修改了菜单为12121111', '2017-09-10 23:31:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('227', '1', '3', '4', '修改了菜单为12121111', '2017-09-10 23:31:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('228', '1', '3', '4', '修改了菜单为1', '2017-09-10 23:31:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('229', '1', '3', '4', '修改了菜单为12', '2017-09-10 23:31:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('230', '1', '3', '4', '修改了菜单为1', '2017-09-10 23:32:22', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('231', '1', '3', '4', '修改了菜单为1', '2017-09-10 23:35:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('232', '1', '0', '1', '登录成功', '2017-09-11 20:38:48', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('233', '1', '0', '1', '登录成功', '2017-09-11 20:39:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('234', '1', '3', '2', '增加了了菜单为客户管理', '2017-09-11 20:53:47', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('235', '1', '3', '2', '增加了了菜单为客户管理', '2017-09-11 20:54:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('236', '1', null, '2', '添加了客户名称为21312312', '2017-09-11 22:07:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('237', '1', null, '4', '修改了客户名称为213123121', '2017-09-11 22:07:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('238', '1', null, '3', '删除了客户名称为213123121', '2017-09-11 22:07:31', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('239', '1', '19', '2', '添加了公司为21312', '2017-09-11 22:14:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('240', '1', '3', '2', '增加了了菜单为业主管理', '2017-09-11 22:20:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('241', '1', '3', '2', '增加了了菜单为业主管理', '2017-09-11 22:20:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('242', '1', null, '2', '添加了业主名称为2313', '2017-09-11 22:38:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('243', '1', null, '4', '修改了业主名称为23134', '2017-09-11 22:38:50', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('244', '1', null, '3', '删除了业主名称为23134', '2017-09-11 22:39:23', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('245', '1', null, '3', '删除了业主名称为1', '2017-09-11 22:39:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('246', '1', null, '3', '删除了业主名称为222', '2017-09-11 22:39:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('247', '1', '0', '1', '登录成功', '2017-09-11 22:57:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('248', '1', '0', '1', '登录成功', '2017-09-11 23:03:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('249', '1', '0', '1', '登录成功', '2017-09-11 23:06:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('250', '1', '0', '1', '登录成功', '2017-09-12 20:58:30', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('251', '1', '0', '1', '登录成功', '2017-09-12 21:07:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('252', '1', null, '2', '添加了业主名称为车市', '2017-09-12 22:18:17', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('253', '1', null, '2', '添加了业主名称为车市', '2017-09-12 22:18:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('254', '1', null, '2', '添加了业主名称为车市', '2017-09-12 22:18:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('255', '1', null, '2', '添加了业主名称为12312', '2017-09-12 22:19:27', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('256', '1', null, '2', '添加了业主名称为12312', '2017-09-12 22:20:11', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('257', '1', '19', '2', '添加了公司为123213123', '2017-09-12 22:37:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('258', '1', '19', '2', '添加了公司为123123', '2017-09-12 22:39:05', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('259', '1', '19', '2', '添加了公司为1231231', '2017-09-12 22:39:38', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('260', '1', '0', '1', '登录成功', '2017-09-12 22:41:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('261', '1', null, '2', '添加了字典为客户来源', '2017-09-12 22:51:05', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('262', '1', '0', '1', '登录成功', '2017-09-13 10:19:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('263', '1', null, '2', '添加了业主名称为车市1', '2017-09-13 10:33:24', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('264', '1', null, '2', '添加了业主名称为1231231231', '2017-09-13 10:35:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('265', '1', '19', '2', '添加了公司为123123123', '2017-09-13 10:35:33', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('266', '1', '19', '2', '添加了公司为12312312', '2017-09-13 10:36:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('267', '1', '19', '2', '添加了公司为1231231231', '2017-09-13 10:37:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('268', '1', '19', '2', '添加了公司为123123121', '2017-09-13 10:42:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('269', '1', null, '2', '添加了字典为物业管理费', '2017-09-13 16:55:33', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('270', '1', null, '2', '添加了字典为垃圾费', '2017-09-13 16:55:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('271', '1', '0', '1', '登录成功', '2017-09-14 10:43:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('272', '1', null, '2', '添加了业主名称为1231231', '2017-09-14 11:16:49', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('273', '1', '27', '2', '增加了了合同号为合同1', '2017-09-14 16:57:49', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('274', '1', '27', '2', '增加了了合同号为合同号', '2017-09-14 17:12:37', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('275', '1', '27', '2', '增加了了合同号为合同号', '2017-09-14 17:22:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('276', '1', '0', '1', '登录成功', '2017-09-14 20:46:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('277', '1', '27', '2', '增加了了合同号为合同1', '2017-09-14 20:54:24', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('278', '1', '0', '1', '登录成功', '2017-09-14 20:57:02', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('279', '1', null, '2', '添加了园区为213123', '2017-09-14 21:40:57', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('280', '1', null, '2', '添加了园区为1213123', '2017-09-14 21:52:47', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('281', '1', '27', '2', '增加了了合同号为213', '2017-09-14 22:00:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('282', '1', '27', '4', '退租了合同为213', '2017-09-14 22:06:59', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('283', '1', '27', '4', '退租了合同为213', '2017-09-14 22:07:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('284', '1', '27', '4', '退租了合同为合同1', '2017-09-14 22:07:57', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('285', '1', '27', '2', '增加了了合同号为123', '2017-09-14 23:22:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('286', '1', '27', '2', '增加了了合同号为12', '2017-09-14 23:32:11', '1234', '127.0.0.1');

-- ----------------------------
-- Table structure for `dino_park`
-- ----------------------------
DROP TABLE IF EXISTS `dino_park`;
CREATE TABLE `dino_park` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同id',
  `company_id` int(11) DEFAULT NULL COMMENT '公司id',
  `bank_id` int(11) DEFAULT NULL COMMENT '银行ID',
  `finance_id` int(11) DEFAULT NULL COMMENT '财务人',
  `managers_id` int(11) DEFAULT NULL COMMENT '管理人',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '园区名称',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '园区地址',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `status` int(1) DEFAULT '1' COMMENT '状态（1；正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='园区表';

-- ----------------------------
-- Records of dino_park
-- ----------------------------
INSERT INTO `dino_park` VALUES ('2', null, '1', '1', '4', '7', '北大园', '真真南山', null, '1', '1505365887', '1', null, null);
INSERT INTO `dino_park` VALUES ('3', null, '1', '1', '4', '4', '浙大园', '浙江', null, '1', '1505358008', '1', null, null);
INSERT INTO `dino_park` VALUES ('6', null, '2', '4', '4', '4', '青岛园', '青岛', null, '1', '1505364871', '1', null, null);
INSERT INTO `dino_park` VALUES ('7', null, '1', '1', '1', '1', '213123', '123123', null, '1', '1505396457', '1', null, null);
INSERT INTO `dino_park` VALUES ('8', null, '1', '1', '1', '1', '1213123', '123123', null, '1', '1505397167', '1', null, null);

-- ----------------------------
-- Table structure for `dino_rent`
-- ----------------------------
DROP TABLE IF EXISTS `dino_rent`;
CREATE TABLE `dino_rent` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同id',
  `exacct` int(11) DEFAULT NULL COMMENT '费用科目',
  `monthly_type` int(1) DEFAULT NULL COMMENT '月租类型',
  `monthly_value` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '月租值',
  `time_begin` date DEFAULT NULL COMMENT '开始时间',
  `time_end` date DEFAULT NULL COMMENT '结束时间',
  `rent` decimal(10,2) DEFAULT NULL COMMENT '租金',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='租金合同表';

-- ----------------------------
-- Records of dino_rent
-- ----------------------------
INSERT INTO `dino_rent` VALUES ('58', '53', '0', '1', '10000', '2017-09-30', '2017-11-04', '10000.00');
INSERT INTO `dino_rent` VALUES ('59', '53', '17', '1', '1000', '2017-09-14', '2017-09-30', '1000.00');
INSERT INTO `dino_rent` VALUES ('60', '57', '0', '2', '1232', '2017-09-30', '2017-10-07', '27475.83');
INSERT INTO `dino_rent` VALUES ('61', '57', '16', '1', '123', '2017-09-14', '2017-09-30', '123.00');
INSERT INTO `dino_rent` VALUES ('62', '58', '0', '2', '12', '2017-09-30', '2017-10-05', '137.76');
INSERT INTO `dino_rent` VALUES ('63', '58', '16', '1', '23', '2017-09-23', '2017-10-19', '123.00');
INSERT INTO `dino_rent` VALUES ('64', '59', '0', '1', '123', '2017-09-30', '2017-10-07', '123.00');
INSERT INTO `dino_rent` VALUES ('65', '59', '0', '1', '123', '2017-10-12', '2017-11-03', '123.00');
INSERT INTO `dino_rent` VALUES ('66', '59', '17', '1', '12', '2017-09-08', '2017-09-30', '1234.00');
INSERT INTO `dino_rent` VALUES ('67', '59', '16', '1', '123', '2017-10-01', '2017-11-02', '132.00');

-- ----------------------------
-- Table structure for `dino_role`
-- ----------------------------
DROP TABLE IF EXISTS `dino_role`;
CREATE TABLE `dino_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) DEFAULT NULL COMMENT '角色名称',
  `role_descript` varchar(128) DEFAULT NULL COMMENT '角色描述',
  `addtime` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of dino_role
-- ----------------------------
INSERT INTO `dino_role` VALUES ('12', '21', 'sssa', null);
INSERT INTO `dino_role` VALUES ('13', '测试', '测试', null);
INSERT INTO `dino_role` VALUES ('14', '213', '123', '2017-09-09 14:30:01');
INSERT INTO `dino_role` VALUES ('15', 'cheshi1', '', '2017-09-10 22:50:27');
INSERT INTO `dino_role` VALUES ('16', 'asd', '', '2017-09-10 23:04:57');

-- ----------------------------
-- Table structure for `dino_role_value`
-- ----------------------------
DROP TABLE IF EXISTS `dino_role_value`;
CREATE TABLE `dino_role_value` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL COMMENT '角色id',
  `auth_a` varchar(100) DEFAULT NULL COMMENT '控制器',
  `auth_c` varchar(100) DEFAULT NULL COMMENT '方法',
  `action_type` varchar(50) DEFAULT NULL COMMENT '权限 1 添加 2 修改 3 删除 4查询 5审查',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1011 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- ----------------------------
-- Records of dino_role_value
-- ----------------------------
INSERT INTO `dino_role_value` VALUES ('828', '12', 'lists', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('829', '12', 'lists', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('830', '12', 'lists', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('833', '12', 'system_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('834', '12', 'system_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('835', '12', 'system_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('838', '12', 'dictionary_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('839', '12', 'dictionary_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('840', '12', 'dictionary_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('843', '12', 'systemlog_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('844', '12', 'systemlog_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('845', '12', 'systemlog_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('908', '14', 'lists', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('909', '14', 'lists', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('910', '14', 'lists', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('913', '14', 'system_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('914', '14', 'system_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('915', '14', 'system_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('918', '14', 'dictionary_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('919', '14', 'dictionary_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('920', '14', 'dictionary_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('923', '14', 'systemlog_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('951', '15', 'lists', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('952', '15', 'lists', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('953', '15', 'lists', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('954', '15', 'lists', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('955', '15', 'system_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('956', '15', 'system_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('957', '15', 'system_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('958', '15', 'system_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('959', '15', 'dictionary_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('960', '15', 'dictionary_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('961', '15', 'dictionary_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('962', '15', 'dictionary_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('963', '15', 'systemlog_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('964', '15', 'systemlog_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('965', '15', 'systemlog_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('966', '15', 'systemlog_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('967', '15', 'admin_role', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('968', '15', 'admin_role', 'Admin', '2');
INSERT INTO `dino_role_value` VALUES ('969', '15', 'admin_role', 'Admin', '3');
INSERT INTO `dino_role_value` VALUES ('970', '15', 'admin_role', 'Admin', '4');
INSERT INTO `dino_role_value` VALUES ('971', '15', 'admin_list', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('972', '15', 'admin_list', 'Admin', '2');
INSERT INTO `dino_role_value` VALUES ('973', '15', 'admin_list', 'Admin', '3');
INSERT INTO `dino_role_value` VALUES ('986', '13', 'system_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('987', '13', 'system_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('988', '13', 'system_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('989', '13', 'dictionary_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('990', '13', 'dictionary_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('991', '13', 'dictionary_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('992', '13', 'systemlog_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('993', '13', 'systemlog_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('994', '13', 'systemlog_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('995', '13', 'admin_role', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('996', '13', 'admin_role', 'Admin', '2');
INSERT INTO `dino_role_value` VALUES ('997', '13', 'admin_role', 'Admin', '3');
INSERT INTO `dino_role_value` VALUES ('998', '13', 'admin_list', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('999', '13', 'admin_list', 'Admin', '2');
INSERT INTO `dino_role_value` VALUES ('1006', '16', 'lists', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1007', '16', 'system_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1008', '16', 'dictionary_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1009', '16', 'admin_role', 'Admin', '4');
INSERT INTO `dino_role_value` VALUES ('1010', '16', 'admin_list', 'Admin', '4');

-- ----------------------------
-- Table structure for `dino_staff`
-- ----------------------------
DROP TABLE IF EXISTS `dino_staff`;
CREATE TABLE `dino_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `company_id` int(11) DEFAULT NULL COMMENT '公司id',
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名',
  `sex` int(1) DEFAULT '1' COMMENT '性别(0保密；1男；2女)',
  `job_title` int(11) DEFAULT NULL COMMENT '职称id',
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机',
  `cornet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '短号',
  `extension` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分机号',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地址',
  `status` int(1) DEFAULT '1' COMMENT '状态（1；正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='员工表';

-- ----------------------------
-- Records of dino_staff
-- ----------------------------
INSERT INTO `dino_staff` VALUES ('1', '1', '12121', '1', '1', '1', '1', '1', null, '1', null, null, null, null);

-- ----------------------------
-- Table structure for `dino_system`
-- ----------------------------
DROP TABLE IF EXISTS `dino_system`;
CREATE TABLE `dino_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `field` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '类型',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '类型名称',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '状态（1、系统 2、自建',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='字典表';

-- ----------------------------
-- Records of dino_system
-- ----------------------------
INSERT INTO `dino_system` VALUES ('3', '1', '123123', '1');
INSERT INTO `dino_system` VALUES ('9', '123', '123', '123123');
INSERT INTO `dino_system` VALUES ('8', '23123', '1123', '231213');
INSERT INTO `dino_system` VALUES ('10', '23123', '123', '123123');
INSERT INTO `dino_system` VALUES ('11', '1232', '123', '123123');
INSERT INTO `dino_system` VALUES ('12', '1231232', '1', '1');
INSERT INTO `dino_system` VALUES ('13', '23232', '12', '123');
INSERT INTO `dino_system` VALUES ('14', '333', '2', '323');
INSERT INTO `dino_system` VALUES ('15', '3123', '312', '321');
INSERT INTO `dino_system` VALUES ('16', '1231231', '1', '1');
INSERT INTO `dino_system` VALUES ('17', '3213123', '123123', '123');
INSERT INTO `dino_system` VALUES ('18', '332', '321', '3123');
INSERT INTO `dino_system` VALUES ('21', '123111', '123213', '312');
INSERT INTO `dino_system` VALUES ('22', '123111', '123213', '312');
INSERT INTO `dino_system` VALUES ('23', '123111', '123213', '312');
INSERT INTO `dino_system` VALUES ('24', '123111', '123213', '312');
INSERT INTO `dino_system` VALUES ('34', '213123', '123123', '123123');
INSERT INTO `dino_system` VALUES ('35', '222222', '2222', '222');

-- ----------------------------
-- Table structure for `dino_transformer`
-- ----------------------------
DROP TABLE IF EXISTS `dino_transformer`;
CREATE TABLE `dino_transformer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同id',
  `number` int(2) DEFAULT NULL COMMENT '变压器数量',
  `details` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '变压器详情',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='变压器表';

-- ----------------------------
-- Records of dino_transformer
-- ----------------------------
INSERT INTO `dino_transformer` VALUES ('1', '53', '100', '500kw');
INSERT INTO `dino_transformer` VALUES ('2', '57', '123', '123');
INSERT INTO `dino_transformer` VALUES ('3', '58', '123', '123');
INSERT INTO `dino_transformer` VALUES ('4', '59', '123', '123');

-- ----------------------------
-- Table structure for `dino_user`
-- ----------------------------
DROP TABLE IF EXISTS `dino_user`;
CREATE TABLE `dino_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户名',
  `pw` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '密码',
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `role` int(11) DEFAULT NULL COMMENT '角色',
  `status` int(1) DEFAULT NULL COMMENT '状态（1；正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';

-- ----------------------------
-- Records of dino_user
-- ----------------------------
INSERT INTO `dino_user` VALUES ('1', 'admin', '123456', '15994828071', '15994828071@163.com', '1', '1', '1503136611', '1');

-- ----------------------------
-- Table structure for `dino_water`
-- ----------------------------
DROP TABLE IF EXISTS `dino_water`;
CREATE TABLE `dino_water` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `park_id` int(11) DEFAULT NULL COMMENT '园区id',
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '水表名',
  `init_record` int(11) DEFAULT NULL COMMENT '初始度数',
  `rate` int(5) DEFAULT '1' COMMENT '倍率(单位为整数',
  `loss` int(5) DEFAULT '100' COMMENT '损耗(单位为百分号 100为整数1',
  `status` int(1) DEFAULT NULL COMMENT '状态（1；正常）',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='水表';

-- ----------------------------
-- Records of dino_water
-- ----------------------------
INSERT INTO `dino_water` VALUES ('1', '8', '21', '123', '123', '312', '1', '1505397639', '1', null, null);
INSERT INTO `dino_water` VALUES ('2', '7', '213123', '123', '123', '321', '1', '1505397639', '1', null, null);
INSERT INTO `dino_water` VALUES ('3', '7', '12', '12', '12', '21', '1', '1505403131', '1', null, null);
INSERT INTO `dino_water` VALUES ('4', '8', '123', '123', '123', '312', '1', '1505403131', '1', null, null);

-- ----------------------------
-- Table structure for `dino_water_contract`
-- ----------------------------
DROP TABLE IF EXISTS `dino_water_contract`;
CREATE TABLE `dino_water_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同ID',
  `water_id` int(11) DEFAULT NULL COMMENT '水表ID',
  `share` int(3) DEFAULT '100' COMMENT '分摊比例',
  `status` int(1) DEFAULT '1' COMMENT '状态（1；正常）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同与水表的关系表';

-- ----------------------------
-- Records of dino_water_contract
-- ----------------------------
INSERT INTO `dino_water_contract` VALUES ('1', '57', '1', '312', '1');
INSERT INTO `dino_water_contract` VALUES ('2', '57', '2', '321', '1');
INSERT INTO `dino_water_contract` VALUES ('3', '59', '3', '12', '1');
INSERT INTO `dino_water_contract` VALUES ('4', '59', '4', '312', '1');

-- ----------------------------
-- Table structure for `dino_water_price`
-- ----------------------------
DROP TABLE IF EXISTS `dino_water_price`;
CREATE TABLE `dino_water_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `water_id` int(11) DEFAULT NULL COMMENT '水表id',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同id',
  `readings_begin` int(11) DEFAULT NULL COMMENT '开始度数',
  `readings_end` int(11) DEFAULT NULL COMMENT '结束度数',
  `price` decimal(10,2) DEFAULT NULL COMMENT '单价',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='水表与合同单价';

-- ----------------------------
-- Records of dino_water_price
-- ----------------------------
INSERT INTO `dino_water_price` VALUES ('1', '1', '57', '321', '123', '123.00');
INSERT INTO `dino_water_price` VALUES ('2', '2', '57', '123', '231', '123.00');
INSERT INTO `dino_water_price` VALUES ('3', '3', '59', '12', '12', '12.00');
INSERT INTO `dino_water_price` VALUES ('4', '4', '59', '123', '123', '123.00');

-- ----------------------------
-- Table structure for `dino_water_record`
-- ----------------------------
DROP TABLE IF EXISTS `dino_water_record`;
CREATE TABLE `dino_water_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `water_id` int(11) DEFAULT NULL COMMENT '水表ID',
  `time` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '时间',
  `up_record` int(11) DEFAULT NULL COMMENT '上期度数',
  `current_record` int(11) DEFAULT NULL COMMENT '当前度数',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人员',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `update_id` int(11) DEFAULT NULL COMMENT '更新人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='水表度数记录';

-- ----------------------------
-- Records of dino_water_record
-- ----------------------------
