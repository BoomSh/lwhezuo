/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : ykd

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-07 22:35:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dino_admin`
-- ----------------------------
DROP TABLE IF EXISTS `dino_admin`;
CREATE TABLE `dino_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `loginsum` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `y_pwd` varchar(255) DEFAULT NULL COMMENT '下拉框|select|[人/1,我/2]',
  `last_time` datetime DEFAULT NULL COMMENT '上次登录时间',
  `last_ip` varchar(255) DEFAULT NULL,
  `new_time` datetime DEFAULT NULL,
  `new_ip` varchar(255) DEFAULT NULL,
  `state` char(1) DEFAULT '1' COMMENT '状态  1为正常 2 被禁止',
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

-- ----------------------------
-- Records of dino_admin
-- ----------------------------
INSERT INTO `dino_admin` VALUES ('1', 'admin', '368bd5610605d07b7282588a7bd61e81', '127.0.0.1', '2017-09-06 10:49:59', '270', '1234', '0', '123456', '2017-09-07 22:33:31', '127.0.0.1', '2017-09-07 22:35:05', '127.0.0.1', '1', null, null, null);
INSERT INTO `dino_admin` VALUES ('5', 'cheshi', 'befae39c2886ebb112c08f5396d54507', null, '2017-09-07 15:55:39', '5', '要你管', '13', '111111', null, null, '2017-09-07 15:55:59', '127.0.0.1', '1', '123123123123', '12313212@qq.com', '123123');
INSERT INTO `dino_admin` VALUES ('7', '123123', '5b7626e11871bc8ba48903e4c8d8ca52', null, '2017-09-06 11:44:13', '0', null, '0', null, null, null, null, null, '1', '13824597684', '121212121@qq.com', '123');
INSERT INTO `dino_admin` VALUES ('8', '123123', '5b7626e11871bc8ba48903e4c8d8ca52', null, '2017-09-06 11:45:44', '0', null, '0', '123123', null, null, null, null, '1', '13824597684', 'drugTang123@163.com', '22123');
INSERT INTO `dino_admin` VALUES ('10', '12345', '368bd5610605d07b7282588a7bd61e81', null, '2017-09-06 16:15:34', '0', null, '0', '123456', null, null, null, null, '1', '123123123213', '123132213@qq.com', '123');
INSERT INTO `dino_admin` VALUES ('11', '123456', '5b7626e11871bc8ba48903e4c8d8ca52', null, '2017-09-07 22:32:37', '2', null, '13', '123123', '2017-09-07 22:32:54', '127.0.0.1', '2017-09-07 22:34:04', '127.0.0.1', '1', '13824597684', 'drugTang123@163.com', '123123');

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
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='板块表';

-- ----------------------------
-- Records of dino_auth
-- ----------------------------
INSERT INTO `dino_auth` VALUES ('1', '系统管理', null, null, '0', '1', '0', '1', '12', null);
INSERT INTO `dino_auth` VALUES ('3', '菜单管理', 'Menu', 'lists', '1', '1-3', '1', '1', '2', null);
INSERT INTO `dino_auth` VALUES ('6', '管理员管理', '', '', '0', '6', '0', '1', '4', null);
INSERT INTO `dino_auth` VALUES ('7', '角色管理', 'Admin', 'admin_role', '6', '6-7', '1', '1', '2', null);
INSERT INTO `dino_auth` VALUES ('9', '管理员列表', 'Admin', 'adminlist', '6', '6-8', '1', '1', '2', null);
INSERT INTO `dino_auth` VALUES ('10', '企业管理', null, null, '0', '10', '0', '1', '0', '');
INSERT INTO `dino_auth` VALUES ('11', '系统设置', 'Admin', 'system_list', '1', '11-1', '1', '1', '0', '');
INSERT INTO `dino_auth` VALUES ('12', '字典管理', 'Admin', 'dictionary_list', '1', '12-1', '1', '1', '0', '');
INSERT INTO `dino_auth` VALUES ('14', '系统日志', 'Admin', 'systemlog_list', '1', '14-1', '1', '1', '0', '');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='银行表';

-- ----------------------------
-- Records of dino_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_company`
-- ----------------------------
DROP TABLE IF EXISTS `dino_company`;
CREATE TABLE `dino_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `bank` int(11) DEFAULT NULL COMMENT '开户银行',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='公司表';

-- ----------------------------
-- Records of dino_company
-- ----------------------------

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
  `time_begin` int(11) DEFAULT NULL COMMENT '开始日期',
  `time_end` int(11) DEFAULT NULL COMMENT '截止日期',
  `time_effect` int(11) DEFAULT NULL COMMENT '起租日期',
  `lessee_area` decimal(10,2) DEFAULT NULL COMMENT '承租面积',
  `lease_area` decimal(10,2) DEFAULT NULL COMMENT '出租面积',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '押金',
  `basic_rent` decimal(10,2) DEFAULT NULL COMMENT '基本租金',
  `first_rent` decimal(10,2) DEFAULT NULL COMMENT '首次租金',
  `first_time_begin` int(11) DEFAULT NULL COMMENT '首次租金开始时间',
  `first_time_end` int(11) DEFAULT NULL COMMENT '首次租金结束时间',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同表';

-- ----------------------------
-- Records of dino_contract
-- ----------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='客户表';

-- ----------------------------
-- Records of dino_customer
-- ----------------------------

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
  `type` int(1) DEFAULT NULL COMMENT '类型',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '类型名称',
  `status` int(1) DEFAULT NULL COMMENT '状态（1、系统 2、自建',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='字典表';

-- ----------------------------
-- Records of dino_dictionary
-- ----------------------------
INSERT INTO `dino_dictionary` VALUES ('3', '1', '123123', '1');
INSERT INTO `dino_dictionary` VALUES ('5', '2', '22221', '2');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='电表';

-- ----------------------------
-- Records of dino_electric
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_electric_contract`
-- ----------------------------
DROP TABLE IF EXISTS `dino_electric_contract`;
CREATE TABLE `dino_electric_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同ID',
  `electric_id` int(11) DEFAULT NULL COMMENT '电表ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同与电表的关系表';

-- ----------------------------
-- Records of dino_electric_contract
-- ----------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='电表与合同的单价';

-- ----------------------------
-- Records of dino_electric_price
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='日志表';

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='园区表';

-- ----------------------------
-- Records of dino_park
-- ----------------------------

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
  `time_begin` int(11) DEFAULT NULL COMMENT '开始时间',
  `time_end` int(11) DEFAULT NULL COMMENT '结束时间',
  `rent` decimal(10,2) DEFAULT NULL COMMENT '租金',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='租金合同表';

-- ----------------------------
-- Records of dino_rent
-- ----------------------------

-- ----------------------------
-- Table structure for `dino_role`
-- ----------------------------
DROP TABLE IF EXISTS `dino_role`;
CREATE TABLE `dino_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) DEFAULT NULL COMMENT '角色名称',
  `role_descript` varchar(128) DEFAULT NULL COMMENT '角色描述',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of dino_role
-- ----------------------------
INSERT INTO `dino_role` VALUES ('12', '21', 'sssa', null);
INSERT INTO `dino_role` VALUES ('13', '测试', '测试', null);
INSERT INTO `dino_role` VALUES ('14', '自己', null, null);
INSERT INTO `dino_role` VALUES ('18', '自己1', '111', '2017-09-07 12:04:56');
INSERT INTO `dino_role` VALUES ('21', '123', '123', '2017-09-07 12:06:16');
INSERT INTO `dino_role` VALUES ('23', '车市', '', '2017-09-07 12:08:26');
INSERT INTO `dino_role` VALUES ('25', '111', '111', '2017-09-07 15:04:33');

-- ----------------------------
-- Table structure for `dino_role_value`
-- ----------------------------
DROP TABLE IF EXISTS `dino_role_value`;
CREATE TABLE `dino_role_value` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `auth_a` varchar(100) DEFAULT NULL,
  `auth_c` varchar(100) DEFAULT NULL,
  `action_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=747 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

-- ----------------------------
-- Records of dino_role_value
-- ----------------------------
INSERT INTO `dino_role_value` VALUES ('741', '13', 'lists', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('742', '13', 'system_list', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('743', '13', 'dictionary_list', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('744', '13', 'systemlog_list', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('745', '13', 'admin_role', 'Admin', '4');
INSERT INTO `dino_role_value` VALUES ('746', '13', 'adminlist', 'Admin', '4');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='员工表';

-- ----------------------------
-- Records of dino_staff
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='字典表';

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
INSERT INTO `dino_system` VALUES ('25', '123111', '123213', '312');
INSERT INTO `dino_system` VALUES ('26', '123111', '123213', '312');
INSERT INTO `dino_system` VALUES ('27', '123111', '123213', '312');
INSERT INTO `dino_system` VALUES ('29', '222', '231', '123');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='变压器表';

-- ----------------------------
-- Records of dino_transformer
-- ----------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='水表';

-- ----------------------------
-- Records of dino_water
-- ----------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同与水表的关系表';

-- ----------------------------
-- Records of dino_water_contract
-- ----------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='水表与合同单价';

-- ----------------------------
-- Records of dino_water_price
-- ----------------------------

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
