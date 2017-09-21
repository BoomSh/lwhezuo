/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : ykd

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-21 22:19:40
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='管理员信息表';

-- ----------------------------
-- Records of dino_admin
-- ----------------------------
INSERT INTO `dino_admin` VALUES ('1', 'admin', '368bd5610605d07b7282588a7bd61e81', '2017-09-08 21:03:30', '316', '1234', '0', '2017-09-21 20:55:54', '127.0.0.1', '2017-09-21 21:17:15', '127.0.0.1', '1', '111111111', '111111@qq.com', '', '1');
INSERT INTO `dino_admin` VALUES ('5', 'cheshi', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-18 21:57:29', '67', '要你管', '13', '2017-09-21 20:56:13', '127.0.0.1', '2017-09-21 21:56:25', '127.0.0.1', '1', '123123123123', '12313212@qq.com', '123123', '1');
INSERT INTO `dino_admin` VALUES ('15', '2222', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-08 18:11:53', '', null, '0', null, null, null, null, '1', '1212213123123', '123132213@qq.com', '1', '1');
INSERT INTO `dino_admin` VALUES ('16', '221313', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-08 20:48:35', null, '22222', '0', null, null, null, null, '1', '123123123123', '123@qq.com', '', '1');
INSERT INTO `dino_admin` VALUES ('17', 'admin1', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-08 20:49:13', null, 'admin', '0', null, null, null, null, '1', '12312312312', '123123@qq.com', '', '1');
INSERT INTO `dino_admin` VALUES ('18', 'admin223', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-08 22:04:26', null, 'admin1', '0', null, null, null, null, '1', '123123123', '123@qq.com', '', '2');
INSERT INTO `dino_admin` VALUES ('19', '1234', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-10 23:05:36', '14', 'ggg1', '16', '2017-09-10 23:01:27', '127.0.0.1', '2017-09-10 23:06:18', '127.0.0.1', '1', '1231231231', '123@qq.com', '', '1');
INSERT INTO `dino_admin` VALUES ('20', '123123', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-10 22:12:25', null, 'sss', '0', null, null, null, null, '1', '1231231231', '123@qq.com', '123123', '1');
INSERT INTO `dino_admin` VALUES ('21', 'cejie', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-18 15:44:43', '1', '1000', '15', null, null, '2017-09-18 15:45:09', '127.0.0.1', '1', '13824597684', 'drugTang123@163.com', '11212', '1');
INSERT INTO `dino_admin` VALUES ('22', '1234123', '5b7626e11871bc8ba48903e4c8d8ca52', '2017-09-18 21:08:44', null, '123', '0', null, null, null, null, '1', '1231231231', '123@qq.com', '', '2');

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
  `img` varchar(255) DEFAULT NULL COMMENT '主菜单的图片标签',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='板块表';

-- ----------------------------
-- Records of dino_auth
-- ----------------------------
INSERT INTO `dino_auth` VALUES ('1', '系统管理', null, null, '0', '1', '0', '1', '0', '', null, '<i class=\"Hui-iconfont\">&#xe62e;</i>');
INSERT INTO `dino_auth` VALUES ('3', '菜单管理', 'Menu', 'lists', '1', '1-3', '1', '1', '2', '', '1,2,3,4,5', null);
INSERT INTO `dino_auth` VALUES ('6', '管理员管理', '', '', '0', '6', '0', '1', '565', '', null, '<i class=\"Hui-iconfont\">&#xe62d;</i>');
INSERT INTO `dino_auth` VALUES ('7', '角色管理', 'Admin', 'admin_role', '6', '6-7', '1', '1', '2', '', '1,2,3,4,5', null);
INSERT INTO `dino_auth` VALUES ('9', '管理员列表', 'Admin', 'admin_list', '6', '6-9', '1', '1', '2', '', '1,2,3,4', null);
INSERT INTO `dino_auth` VALUES ('10', '企业管理', null, null, '0', '10', '0', '1', '555', '', null, '<i class=\"Hui-iconfont\">&#xe643;</i>');
INSERT INTO `dino_auth` VALUES ('11', '系统设置', 'Menu', 'system_list', '1', '11-1', '1', '1', '0', '', '1,2,3,4,5', null);
INSERT INTO `dino_auth` VALUES ('12', '字典管理', 'Menu', 'dictionary_list', '1', '12-1', '1', '1', '0', '', '1,2,3,4,5', null);
INSERT INTO `dino_auth` VALUES ('17', '日志管理', 'Menu', 'systemlog_list', '1', '17-1', '1', '1', '0', '', '3,4', null);
INSERT INTO `dino_auth` VALUES ('19', '公司信息', 'Enterprise', 'company_list', '10', '19-10', '1', '1', '0', '', '1,2,3,4', null);
INSERT INTO `dino_auth` VALUES ('20', '员工管理', 'Enterprise', 'staff_list', '10', '20-10', '1', '1', '0', '', '1,2,3,4', null);
INSERT INTO `dino_auth` VALUES ('21', '园区管理', 'Enterprise', 'garden_list', '10', '21-10', '1', '1', '0', '', '1,2,3,4', null);
INSERT INTO `dino_auth` VALUES ('22', '房源管理', 'Enterprise', 'house_list', '10', '22-10', '1', '1', '0', '', '2,3,4', null);
INSERT INTO `dino_auth` VALUES ('23', '客户管理', null, null, '0', '23', '0', '1', '444', '', '1,2,3,4', '<i class=\"Hui-iconfont\">&#xe6cc;</i>');
INSERT INTO `dino_auth` VALUES ('24', '客户管理', 'Customer', 'customer_list', '23', '24-23', '1', '1', '0', '', '1,2,3,4', null);
INSERT INTO `dino_auth` VALUES ('25', '业主管理', null, null, '0', '25', '0', '1', '0', '', null, '<i class=\"Hui-iconfont\">&#xe60d;</i>');
INSERT INTO `dino_auth` VALUES ('26', '业主管理', 'Detailed', 'detailed_list', '25', '25-26', '1', '1', '1', '', '1,2,3,4,6', null);
INSERT INTO `dino_auth` VALUES ('27', '合同管理', 'Cuscontract', 'cuscontract_list', '25', '27-25', '1', '1', '0', '', '1,2,3,4', null);
INSERT INTO `dino_auth` VALUES ('28', '水表管理', 'Cuscontract', 'water_list', '25', '25-28', '1', '1', '0', '', '1,2,3,4,6,7', null);
INSERT INTO `dino_auth` VALUES ('31', '财务管理', null, null, '0', '31', '0', '1', '0', '', null, '<i class=\"Hui-iconfont\">&#xe63a;</i> ');
INSERT INTO `dino_auth` VALUES ('32', '收入管理', 'Finance', 'income_list', '31', '32-31', '1', '1', '0', '', '1,2,4,6', null);
INSERT INTO `dino_auth` VALUES ('33', '支出管理', 'Finance', 'expenditure_list', '31', '33-31', '1', '1', '0', '', '1,2,4', null);
INSERT INTO `dino_auth` VALUES ('34', '电表管理', 'Cuscontract', 'electric_list', '25', '25-34', '1', '1', '0', '', '1,2,3,4,6,7', null);
INSERT INTO `dino_auth` VALUES ('35', '合同管理', 'Customer', 'cuscontract_list', '23', '35-23', '1', '1', '0', '', '1,2,3,4,6,7', null);
INSERT INTO `dino_auth` VALUES ('36', '水表管理', 'Customer', 'water_list', '23', '36-23', '1', '1', '0', '', '1,2,3,4,6,7', null);
INSERT INTO `dino_auth` VALUES ('37', '电表管理', 'Customer', 'electric_list', '23', '37-23', '1', '1', '0', '', '1,2,3,4,6,7', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='银行表';

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='公司表';

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
  `house_id` int(11) DEFAULT '0' COMMENT '房源的id',
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
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同表';

-- ----------------------------
-- Records of dino_contract
-- ----------------------------
INSERT INTO `dino_contract` VALUES ('158', '3', '0', '24', '1', '2', '123', '123', '15', '2017-09-21', '2017-09-30', '2017-09-21', '123.00', '123.00', '1000.00', '2000.00', '1000.00', '2017-09-21', '2017-09-30', '1000.00', '1000.00', '123.00', null, null, '123', '1', '1505975380', '1', '1505984415', '1');
INSERT INTO `dino_contract` VALUES ('159', '2', '0', '24', '1', '2', '22221', '123', '15', '2017-09-08', '2017-09-29', '2017-09-21', '123.00', '12.00', '1000.00', '2000.00', '2000.00', '2017-09-21', '2017-09-21', '123123.00', '123.00', '0.00', null, null, '', '1', '1505975572', '1', '1505984413', '1');
INSERT INTO `dino_contract` VALUES ('160', '9', '0', '24', '2', '2', '123222', '2132', '15', '2017-09-21', '2017-10-04', '2017-09-21', '1000.00', '2000.00', '1000.00', '2000.00', '2000.00', '2017-09-01', '2017-09-30', '1000.00', '1111.00', '0.00', null, null, '', '2', '1505999594', '5', '1506000811', '1');
INSERT INTO `dino_contract` VALUES ('161', '3', '0', '24', '1', '2', '2222', '1', '15', '2017-01-28', '2017-09-26', '2017-09-21', '1111.00', '1.00', '1111.00', '1111.00', '1111.00', '2017-09-15', '2017-09-27', '111.00', '1111.00', '0.00', null, null, '', '2', '1506000943', '1', '1506001082', '1');
INSERT INTO `dino_contract` VALUES ('162', '2', '0', '24', '1', '2', '1232221', '12', '15', '2017-10-05', '2017-11-08', '2017-10-05', '1111.00', '1212.00', '12121.00', '2.00', '12.00', '2017-11-01', '2017-10-12', '121212.00', '121212.00', '0.00', null, null, '', '2', '1506001148', '1', '1506001183', '1');
INSERT INTO `dino_contract` VALUES ('163', '3', '0', '25', '1', '2', '111', '31', '15', '2017-09-06', '2017-09-19', '2017-09-19', '123.00', '12312.00', '1000.00', '123.00', '12.00', '2017-09-14', '2017-10-05', '0.00', '123.00', '0.00', null, null, '', '2', '1506001465', '1', '1506001936', '1');
INSERT INTO `dino_contract` VALUES ('164', '2', '0', '25', '1', '2', '21123', '1111', '15', '2017-09-21', '2017-09-21', '2017-09-21', '11111.00', '1111.00', '1111.00', '1111.00', '1000.00', '2017-09-21', '2017-09-27', '11111.00', '121212.00', '0.00', null, null, '', '1', '1506002335', '5', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='客户表';

-- ----------------------------
-- Records of dino_customer
-- ----------------------------
INSERT INTO `dino_customer` VALUES ('25', '2', '123', '123123123123', '123', '', '', '0', '123@qq.com', '15917902898', '', '1', '123', '123', '', '0.00', '2', null, null, null, null);

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='字典表';

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
INSERT INTO `dino_dictionary` VALUES ('19', '3', '现金', '1');
INSERT INTO `dino_dictionary` VALUES ('20', '3', '微信', '1');
INSERT INTO `dino_dictionary` VALUES ('21', '3', '支付宝', '1');

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
  `type` char(1) COLLATE utf8_unicode_ci DEFAULT '1' COMMENT '1正常，2假删',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='电表';

-- ----------------------------
-- Records of dino_electric
-- ----------------------------
INSERT INTO `dino_electric` VALUES ('106', '2', '电表21', '100', '200', '20', '1', '1505899161', '1', '1505900189', '1', '1');
INSERT INTO `dino_electric` VALUES ('164', '2', '电表21', '100', '100', '100', '1', '1505963142', '1', null, null, '1');
INSERT INTO `dino_electric` VALUES ('165', '3', '电表1', '100', '50', '20', '1', '1505963142', '1', null, null, '1');
INSERT INTO `dino_electric` VALUES ('166', '2', '电表2', '20', '20', '20', '1', '1505963142', '1', null, null, '1');
INSERT INTO `dino_electric` VALUES ('167', '8', '1231', '1000', '200', '200', '1', '1505975380', '1', null, null, '1');
INSERT INTO `dino_electric` VALUES ('169', '7', '121', '123', '123', '123', '1', '1505975572', '1', null, null, '1');
INSERT INTO `dino_electric` VALUES ('170', '8', '1', '111', '111', '11', '1', '1506000943', '1', null, null, '2');
INSERT INTO `dino_electric` VALUES ('171', '8', '111', '11', '111', '11', '1', '1506002335', '5', null, null, '1');

-- ----------------------------
-- Table structure for `dino_electric_contract`
-- ----------------------------
DROP TABLE IF EXISTS `dino_electric_contract`;
CREATE TABLE `dino_electric_contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `contract_id` int(11) DEFAULT NULL COMMENT '合同ID',
  `electric_id` int(11) DEFAULT NULL COMMENT '电表ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同与电表的关系表';

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
INSERT INTO `dino_electric_contract` VALUES ('55', '117', '55');
INSERT INTO `dino_electric_contract` VALUES ('63', '126', '63');
INSERT INTO `dino_electric_contract` VALUES ('64', '128', '64');
INSERT INTO `dino_electric_contract` VALUES ('68', '133', '68');
INSERT INTO `dino_electric_contract` VALUES ('69', '134', '69');
INSERT INTO `dino_electric_contract` VALUES ('77', '143', '77');
INSERT INTO `dino_electric_contract` VALUES ('78', '144', '78');
INSERT INTO `dino_electric_contract` VALUES ('79', '145', '79');
INSERT INTO `dino_electric_contract` VALUES ('81', '148', '81');
INSERT INTO `dino_electric_contract` VALUES ('106', '156', '106');
INSERT INTO `dino_electric_contract` VALUES ('164', '157', '164');
INSERT INTO `dino_electric_contract` VALUES ('165', '157', '165');
INSERT INTO `dino_electric_contract` VALUES ('166', '157', '166');
INSERT INTO `dino_electric_contract` VALUES ('167', '158', '167');
INSERT INTO `dino_electric_contract` VALUES ('169', '159', '169');
INSERT INTO `dino_electric_contract` VALUES ('170', '161', '170');
INSERT INTO `dino_electric_contract` VALUES ('171', '164', '171');

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
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='电表与合同的单价';

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
INSERT INTO `dino_electric_price` VALUES ('59', '63', '50', '100', '5.00');
INSERT INTO `dino_electric_price` VALUES ('60', '64', '0', '100', '10.00');
INSERT INTO `dino_electric_price` VALUES ('64', '68', '0', '0', '0.00');
INSERT INTO `dino_electric_price` VALUES ('65', '69', '20', '300', '30.00');
INSERT INTO `dino_electric_price` VALUES ('73', '77', '123', '123', '123.00');
INSERT INTO `dino_electric_price` VALUES ('74', '78', '0', '0', '0.00');
INSERT INTO `dino_electric_price` VALUES ('75', '79', '0', '0', '0.00');
INSERT INTO `dino_electric_price` VALUES ('77', '81', '123', '1213123', '213.00');
INSERT INTO `dino_electric_price` VALUES ('102', '106', '202', '2', '20.00');
INSERT INTO `dino_electric_price` VALUES ('160', '164', '5', '10', '20.00');
INSERT INTO `dino_electric_price` VALUES ('161', '165', '20', '60', '30.00');
INSERT INTO `dino_electric_price` VALUES ('162', '166', '20', '20', '20.00');
INSERT INTO `dino_electric_price` VALUES ('163', '167', '20', '20', '20.00');
INSERT INTO `dino_electric_price` VALUES ('165', '169', '123', '123', '231.00');
INSERT INTO `dino_electric_price` VALUES ('166', '170', '111', '11', '11.00');
INSERT INTO `dino_electric_price` VALUES ('167', '171', '11', '111', '111.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='电表度数记录';

-- ----------------------------
-- Records of dino_electric_record
-- ----------------------------
INSERT INTO `dino_electric_record` VALUES ('7', '81', '1119024000', '30', '50', '1505893121', '1', null, null);
INSERT INTO `dino_electric_record` VALUES ('8', '85', '1116086400', '30', '30', '1505897714', '1', null, null);
INSERT INTO `dino_electric_record` VALUES ('9', '87', '1118764800', '60', '60', '1505897714', '1', null, null);
INSERT INTO `dino_electric_record` VALUES ('10', '167', '1506096000', '123', '123', '1506002367', '5', null, null);

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
  `pay_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='收入与支出';

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
) ENGINE=MyISAM AUTO_INCREMENT=671 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='日志表';

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
INSERT INTO `dino_log` VALUES ('287', '1', '0', '1', '登录成功', '2017-09-15 09:21:49', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('288', '1', '27', '2', '增加了了合同号为22221', '2017-09-15 11:40:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('289', '1', '27', '4', '修改了了合同号为222212', '2017-09-15 12:09:22', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('290', '1', '27', '4', '修改了了合同号为2222124', '2017-09-15 12:23:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('291', '1', '27', '4', '修改了了合同号为22221242', '2017-09-15 12:24:57', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('292', '1', '27', '4', '修改了了合同号为222212421', '2017-09-15 12:29:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('293', '1', '0', '1', '登录成功', '2017-09-15 17:08:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('294', '1', '27', '2', '增加了了合同号为CHE1', '2017-09-15 17:13:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('295', '1', '27', '4', '修改了了合同号为CHE1', '2017-09-15 17:14:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('296', '1', '27', '2', '增加了了合同号为111', '2017-09-15 17:16:48', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('297', '1', '27', '4', '修改了了合同号为111', '2017-09-15 17:22:44', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('298', '1', '27', '4', '修改了了合同号为111', '2017-09-15 17:23:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('299', '1', '27', '4', '修改了了合同号为111', '2017-09-15 17:23:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('300', '1', '27', '2', '增加了了合同号为1123', '2017-09-15 17:25:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('301', '1', '27', '4', '修改了了合同号为1123', '2017-09-15 17:25:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('302', '1', '27', '4', '修改了了合同号为1123', '2017-09-15 17:26:22', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('303', '1', '27', '4', '修改了了合同号为1123', '2017-09-15 17:27:42', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('304', '1', '27', '4', '退租了合同为1123', '2017-09-15 17:36:12', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('305', '1', '27', '3', '删除了字段为1123', '2017-09-15 18:09:03', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('306', '1', '27', '4', '退租了合同为111', '2017-09-15 18:11:47', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('307', '1', '27', '3', '删除了字段为111', '2017-09-15 18:11:50', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('308', '1', '0', '1', '登录成功', '2017-09-15 21:21:38', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('309', '1', '3', '2', '增加了了菜单为水表管理', '2017-09-15 21:25:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('310', '1', '0', '1', '登录成功', '2017-09-18 14:30:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('311', '1', null, '2', '添加了业主名称为123', '2017-09-18 15:10:10', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('312', '1', '27', '2', '增加了了合同号为3333', '2017-09-18 15:12:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('313', '1', '27', '4', '修改了了合同号为3333', '2017-09-18 15:15:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('314', '1', '27', '4', '修改了了合同号为3333', '2017-09-18 15:30:59', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('315', '1', '27', '4', '修改了了合同号为3333', '2017-09-18 15:31:22', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('316', '1', '27', '4', '修改了了合同号为3333', '2017-09-18 15:31:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('317', '1', '27', '2', '增加了了合同号为200', '2017-09-18 15:33:31', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('318', '1', '27', '2', '增加了了合同号为1000', '2017-09-18 15:35:55', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('319', '1', null, '2', '添加了园区为1231231', '2017-09-18 15:38:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('320', '1', '27', '2', '增加了了合同号为23', '2017-09-18 15:38:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('321', '1', null, '2', '增加了管理员为1000', '2017-09-18 15:44:44', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('322', '21', '0', '1', '登录成功', '2017-09-18 15:45:09', '1000', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('323', '1', '0', '1', '登录成功', '2017-09-18 15:47:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('324', '1', '0', '1', '登录成功', '2017-09-18 20:27:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('325', '1', '3', '2', '增加了了菜单为1213', '2017-09-18 20:49:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('326', '1', '3', '4', '修改了菜单为1213', '2017-09-18 21:00:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('327', '1', '3', '3', '删除了菜单为1213', '2017-09-18 21:05:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('328', '1', '3', '4', '修改了菜单为水表管理', '2017-09-18 21:05:44', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('329', '1', null, '2', '增加了角色为123', '2017-09-18 21:06:01', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('330', '1', '7', '4', '修改了角色为123', '2017-09-18 21:06:30', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('331', '1', '7', '4', '修改了角色为123', '2017-09-18 21:07:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('332', '1', null, '2', '增加了管理员为123', '2017-09-18 21:08:44', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('333', '1', '7', '4', '修改了角色为123', '2017-09-18 21:10:46', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('334', '1', '7', '4', '修改了角色为123', '2017-09-18 21:10:59', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('335', '1', '7', '4', '修改了角色为123', '2017-09-18 21:11:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('336', '1', '7', '4', '修改了角色为123', '2017-09-18 21:12:47', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('337', '1', '7', '4', '修改了角色为123', '2017-09-18 21:13:24', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('338', '1', '7', '4', '修改了角色为123', '2017-09-18 21:13:37', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('339', '1', '7', '4', '修改了角色为123', '2017-09-18 21:14:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('340', '1', '7', '4', '修改了角色为123', '2017-09-18 21:16:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('341', '1', '7', '4', '修改了角色为123', '2017-09-18 21:16:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('342', '1', '7', '4', '修改了角色为123', '2017-09-18 21:16:49', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('343', '1', '7', '4', '修改了角色为123', '2017-09-18 21:17:19', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('344', '1', null, '2', '添加了字典为123', '2017-09-18 21:18:24', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('345', '1', null, '3', '删除了字典为123', '2017-09-18 21:18:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('346', '1', '7', '4', '修改了角色为123', '2017-09-18 21:19:19', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('347', '1', '7', '4', '修改了角色为123', '2017-09-18 21:20:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('348', '1', '7', '4', '修改了角色为123', '2017-09-18 21:22:46', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('349', '1', '7', '4', '修改了角色为123', '2017-09-18 21:23:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('350', '1', '7', '4', '修改了角色为123', '2017-09-18 21:23:49', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('351', '1', '7', '4', '修改了角色为123', '2017-09-18 21:23:59', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('352', '1', '7', '4', '修改了角色为123', '2017-09-18 21:24:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('353', '1', null, '2', '增加了角色为123123', '2017-09-18 21:30:58', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('354', '1', '7', '4', '修改了角色为123123', '2017-09-18 21:31:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('355', '1', '7', '4', '修改了角色为123123', '2017-09-18 21:32:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('356', '1', '7', '4', '修改了角色为123123', '2017-09-18 21:34:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('357', '1', '7', '4', '修改了角色为123123', '2017-09-18 21:35:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('358', '1', '7', '4', '修改了角色为123123', '2017-09-18 21:40:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('359', '1', null, '2', '增加了角色为21313123', '2017-09-18 21:41:24', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('360', '1', '7', '3', '删除了角色为21313123', '2017-09-18 21:41:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('361', '1', '7', '4', '修改了角色为123123', '2017-09-18 21:41:31', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('362', '1', '0', '1', '登录成功', '2017-09-18 21:45:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('363', '1', '3', '2', '增加了了菜单为123', '2017-09-18 21:45:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('364', '1', null, '2', '增加了角色为21311', '2017-09-18 21:45:42', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('365', '1', '7', '3', '删除了角色为21311', '2017-09-18 21:45:48', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('366', '1', '3', '3', '删除了菜单为123', '2017-09-18 21:45:55', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('367', '1', null, '2', '添加了业主名称为213123', '2017-09-18 21:50:58', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('368', '1', '7', '3', '删除了角色为123123', '2017-09-18 21:57:10', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('369', '1', '7', '3', '删除了角色为123', '2017-09-18 21:57:12', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('370', '1', null, '4', '修改了管理员为cheshi', '2017-09-18 21:57:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('371', '1', '7', '4', '修改了角色为测试', '2017-09-18 21:57:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('372', '5', '0', '1', '登录成功', '2017-09-18 21:57:49', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('373', '5', '0', '1', '登录成功', '2017-09-18 21:59:00', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('374', '5', '0', '1', '登录成功', '2017-09-18 22:08:04', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('375', '5', '0', '1', '登录成功', '2017-09-18 22:08:40', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('376', '5', '0', '1', '登录成功', '2017-09-18 22:12:41', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('377', '5', '3', '4', '修改了菜单为业主管理', '2017-09-18 22:15:52', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('378', '5', '3', '4', '修改了菜单为业主管理', '2017-09-18 22:16:22', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('379', '5', '3', '4', '修改了菜单为业主管理', '2017-09-18 22:16:31', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('380', '5', '3', '4', '修改了菜单为业主管理', '2017-09-18 22:16:36', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('381', '5', '3', '4', '修改了菜单为业主管理', '2017-09-18 22:16:41', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('382', '5', '0', '1', '登录成功', '2017-09-18 22:22:15', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('383', '5', '0', '1', '登录成功', '2017-09-18 22:22:36', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('384', '5', '0', '1', '登录成功', '2017-09-18 22:23:24', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('385', '5', '0', '1', '登录成功', '2017-09-18 22:26:59', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('386', '5', '0', '1', '登录成功', '2017-09-18 22:30:43', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('387', '1', '0', '1', '登录成功', '2017-09-18 22:32:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('388', '5', '0', '1', '登录成功', '2017-09-18 22:32:57', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('389', '1', '0', '1', '登录成功', '2017-09-18 22:33:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('390', '1', '7', '4', '修改了角色为测试', '2017-09-18 22:33:27', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('391', '5', '0', '1', '登录成功', '2017-09-18 22:33:49', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('392', '1', '0', '1', '登录成功', '2017-09-18 22:34:59', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('393', '1', '3', '4', '修改了菜单为管理员列表', '2017-09-18 22:35:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('394', '1', '7', '4', '修改了角色为测试', '2017-09-18 22:35:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('395', '5', '0', '1', '登录成功', '2017-09-18 22:35:55', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('396', '5', '7', '4', '修改了角色为测试', '2017-09-18 22:41:58', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('397', '5', '7', '4', '修改了角色为测试', '2017-09-18 22:42:17', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('398', '5', '27', '4', '修改了了合同号为23', '2017-09-18 23:06:42', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('399', '5', '27', '4', '修改了了合同号为1000', '2017-09-18 23:07:17', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('400', '5', '0', '1', '登录成功', '2017-09-19 09:15:42', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('401', '5', '7', '4', '修改了角色为测试', '2017-09-19 09:16:47', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('402', '5', '0', '1', '登录成功', '2017-09-19 09:18:14', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('403', '5', '0', '1', '登录成功', '2017-09-19 09:18:41', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('404', '5', '0', '1', '登录成功', '2017-09-19 09:24:50', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('405', '5', '0', '1', '登录成功', '2017-09-19 09:29:57', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('406', '5', '0', '1', '登录成功', '2017-09-19 09:31:00', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('407', '5', '0', '1', '登录成功', '2017-09-19 09:31:21', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('408', '5', '0', '1', '登录成功', '2017-09-19 09:32:48', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('409', '5', '0', '1', '登录成功', '2017-09-19 09:33:41', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('410', '5', '0', '1', '登录成功', '2017-09-19 09:35:50', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('411', '5', '0', '1', '登录成功', '2017-09-19 09:37:14', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('412', '5', '0', '1', '登录成功', '2017-09-19 09:38:05', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('413', '5', '0', '1', '登录成功', '2017-09-19 09:42:07', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('414', '5', '0', '1', '登录成功', '2017-09-19 09:43:18', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('415', '5', '0', '1', '登录成功', '2017-09-19 09:45:05', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('416', '5', '0', '1', '登录成功', '2017-09-19 09:45:40', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('417', '5', '0', '1', '登录成功', '2017-09-19 09:46:11', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('418', '1', '0', '1', '登录成功', '2017-09-19 09:50:22', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('419', '5', '0', '1', '登录成功', '2017-09-19 09:50:58', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('420', '5', '0', '1', '登录成功', '2017-09-19 09:51:13', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('421', '5', '0', '1', '登录成功', '2017-09-19 09:56:56', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('422', '5', '0', '1', '登录成功', '2017-09-19 09:57:50', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('423', '5', '0', '1', '登录成功', '2017-09-19 10:01:01', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('424', '5', '0', '1', '登录成功', '2017-09-19 10:01:17', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('425', '5', '0', '1', '登录成功', '2017-09-19 10:02:49', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('426', '5', '0', '1', '登录成功', '2017-09-19 10:05:57', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('427', '5', '0', '1', '登录成功', '2017-09-19 10:06:15', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('428', '5', '0', '1', '登录成功', '2017-09-19 10:07:27', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('429', '5', '0', '1', '登录成功', '2017-09-19 10:07:47', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('430', '5', '0', '1', '登录成功', '2017-09-19 10:08:29', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('431', '5', '0', '1', '登录成功', '2017-09-19 10:09:02', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('432', '5', '0', '1', '登录成功', '2017-09-19 10:10:55', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('433', '5', '0', '1', '登录成功', '2017-09-19 10:11:23', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('434', '5', '0', '1', '登录成功', '2017-09-19 10:14:54', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('435', '5', '0', '1', '登录成功', '2017-09-19 14:09:48', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('436', '5', '0', '1', '登录成功', '2017-09-19 14:10:05', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('437', '5', '0', '1', '登录成功', '2017-09-19 14:10:27', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('438', '5', '7', '4', '修改了角色为测试', '2017-09-19 14:10:45', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('439', '5', '28', '4', '修改了了水表名为水表111111', '2017-09-19 14:32:07', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('440', '5', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:32:23', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('441', '5', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:32:26', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('442', '5', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:32:27', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('443', '5', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:32:30', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('444', '5', '28', '4', '修改了了水表名为水表1', '2017-09-19 14:32:47', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('445', '5', '28', '4', '修改了了水表名为水表1', '2017-09-19 14:32:58', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('446', '5', '28', '4', '修改了了水表名为水表1', '2017-09-19 14:33:06', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('447', '5', '28', '4', '修改了了水表名为水表1', '2017-09-19 14:35:27', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('448', '5', '28', '4', '修改了了水表名为水表1', '2017-09-19 14:37:37', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('449', '1', '0', '1', '登录成功', '2017-09-19 14:40:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('450', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:50:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('451', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:50:37', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('452', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:50:51', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('453', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:50:56', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('454', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:55:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('455', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:55:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('456', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 14:56:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('457', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 14:56:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('458', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:58:03', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('459', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 14:58:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('460', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 15:05:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('461', '1', '28', '4', '修改了了水表名为水表2', '2017-09-19 15:05:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('462', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 15:05:37', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('463', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 15:06:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('464', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 15:06:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('465', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 15:09:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('466', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 15:09:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('467', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 15:10:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('468', '1', '28', '2', '水表 抄表', '2017-09-19 15:33:12', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('469', '1', '28', '2', '水表 抄表', '2017-09-19 15:35:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('470', '1', '28', '2', '水表 抄表', '2017-09-19 15:35:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('471', '1', '28', '2', '水表 抄表', '2017-09-19 15:41:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('472', '1', '28', '2', '水表 抄表', '2017-09-19 15:42:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('473', '1', '28', '2', '水表 抄表', '2017-09-19 16:17:33', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('474', '1', '28', '4', '水表修改抄表', '2017-09-19 16:21:44', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('475', '1', '28', '4', '水表修改抄表', '2017-09-19 16:21:49', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('476', '1', '28', '3', '删除了了水表名为', '2017-09-19 16:38:46', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('477', '1', '27', '4', '退租了合同为200', '2017-09-19 16:50:30', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('478', '1', '27', '2', '增加了了合同号为11', '2017-09-19 16:55:34', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('479', '1', '28', '3', '删除了了水表名为水表1', '2017-09-19 17:03:33', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('480', '1', '28', '3', '删除了了水表名为1', '2017-09-19 17:03:33', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('481', '1', '28', '2', '水表 抄表', '2017-09-19 18:00:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('482', '1', '27', '4', '退租了合同为3333', '2017-09-19 20:47:05', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('483', '1', '27', '4', '退租了合同为23', '2017-09-19 20:47:07', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('484', '1', '27', '4', '退租了合同为1000', '2017-09-19 20:47:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('485', '1', '27', '4', '退租了合同为11', '2017-09-19 20:47:11', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('486', '1', '27', '2', '增加了了合同号为合同1', '2017-09-19 20:49:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('487', '1', '27', '2', '增加了了合同号为123', '2017-09-19 20:50:11', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('488', '1', '28', '4', '修改了了水表名为水表1', '2017-09-19 20:50:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('489', '1', '28', '2', '水表 抄表', '2017-09-19 20:50:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('490', '1', '28', '2', '水表 抄表', '2017-09-19 20:50:42', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('491', '1', '28', '2', '水表 抄表水表1', '2017-09-19 21:41:10', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('492', '1', '28', '2', '水表 抄表水表2', '2017-09-19 21:41:10', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('493', '1', '28', '2', '水表 抄表水表1', '2017-09-19 21:55:30', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('494', '1', '28', '2', '水表 抄表水表2', '2017-09-19 21:55:30', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('495', '1', '28', '2', '水表 抄表水表1', '2017-09-19 21:56:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('496', '1', '28', '2', '水表 抄表水表2', '2017-09-19 21:56:28', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('497', '1', '28', '2', '水表 抄表水表2', '2017-09-19 21:58:02', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('498', '1', '28', '2', '水表 抄表水表2', '2017-09-19 21:58:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('499', '1', '28', '2', '水表 抄表水表2', '2017-09-19 21:58:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('500', '1', '28', '2', '水表 抄表水表2', '2017-09-19 21:59:22', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('501', '1', '28', '2', '水表 抄表水表2', '2017-09-19 21:59:56', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('502', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:00:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('503', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:04:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('504', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:06:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('505', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:07:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('506', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:09:48', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('507', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:10:50', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('508', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:10:50', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('509', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:11:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('510', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:11:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('511', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:11:48', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('512', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:11:48', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('513', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:12:03', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('514', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:12:03', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('515', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:12:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('516', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:12:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('517', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:12:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('518', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:12:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('519', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:13:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('520', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:13:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('521', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:13:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('522', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:13:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('523', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:15:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('524', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:15:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('525', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:16:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('526', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:16:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('527', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:18:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('528', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:19:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('529', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:22:37', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('530', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:25:27', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('531', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:25:27', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('532', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:26:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('533', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:26:35', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('534', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:26:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('535', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:26:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('536', '1', '28', '2', '水表 抄表水表1', '2017-09-19 22:27:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('537', '1', '28', '2', '水表 抄表水表2', '2017-09-19 22:27:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('538', '5', '0', '1', '登录成功', '2017-09-19 22:29:38', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('539', '5', '7', '4', '修改了角色为测试', '2017-09-19 22:30:01', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('540', '5', '7', '4', '修改了角色为测试', '2017-09-19 22:30:39', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('541', '5', '3', '4', '修改了菜单为企业管理', '2017-09-19 22:36:45', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('542', '5', '3', '4', '修改了菜单为业主管理', '2017-09-19 22:37:03', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('543', '5', '7', '4', '修改了角色为测试', '2017-09-19 22:38:10', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('544', '5', '3', '4', '修改了菜单为客户管理', '2017-09-19 22:38:21', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('545', '5', '3', '4', '修改了菜单为财务管理', '2017-09-19 22:38:50', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('546', '5', '3', '4', '修改了菜单为管理员管理', '2017-09-19 22:39:18', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('547', '5', '3', '4', '修改了菜单为系统管理', '2017-09-19 22:39:30', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('548', '1', '0', '1', '登录成功', '2017-09-19 22:43:45', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('549', '5', '0', '1', '登录成功', '2017-09-19 22:44:47', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('550', '5', '0', '1', '登录成功', '2017-09-20 11:23:41', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('551', '5', '28', '2', '水表 抄表水表1', '2017-09-20 11:24:57', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('552', '5', '28', '2', '水表 抄表水表2', '2017-09-20 11:24:57', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('553', '5', '28', '2', '水表 抄表水表1', '2017-09-20 11:26:01', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('554', '5', '28', '2', '水表 抄表水表2', '2017-09-20 11:26:01', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('555', '5', '28', '2', '水表 抄表水表1', '2017-09-20 11:31:13', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('556', '5', '28', '2', '水表 抄表水表2', '2017-09-20 11:31:13', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('557', '5', '28', '4', '水表修改抄表', '2017-09-20 11:32:09', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('558', '5', '3', '2', '增加了了菜单为电表管理', '2017-09-20 11:47:52', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('559', '5', '7', '4', '修改了角色为测试', '2017-09-20 11:48:28', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('560', '5', '7', '4', '修改了角色为测试', '2017-09-20 11:48:41', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('561', '5', '3', '4', '修改了菜单为电表管理', '2017-09-20 11:49:13', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('562', '5', '7', '4', '修改了角色为测试', '2017-09-20 11:49:26', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('563', '5', '3', '4', '修改了菜单为电表管理', '2017-09-20 12:01:08', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('564', '5', '7', '4', '修改了角色为测试', '2017-09-20 12:01:25', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('565', '5', '27', '2', '增加了了合同号为22222', '2017-09-20 12:05:40', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('566', '5', '27', '2', '增加了了合同号为112121', '2017-09-20 14:27:33', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('567', '5', '34', '4', '修改了电表名为电表12', '2017-09-20 14:45:46', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('568', '5', '34', '2', '水表 抄表', '2017-09-20 14:49:08', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('569', '5', '34', '2', '水表 抄表', '2017-09-20 14:49:18', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('570', '1', '0', '1', '登录成功', '2017-09-20 14:50:00', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('571', '1', '34', '4', '水表修改抄表', '2017-09-20 15:00:10', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('572', '1', '34', '4', '水表修改抄表', '2017-09-20 15:00:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('573', '1', '34', '3', '删除了了水表名为电表名', '2017-09-20 15:03:02', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('574', '1', '34', '4', '水表修改抄表', '2017-09-20 15:23:11', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('575', '1', '34', '2', '电表 抄表电表1', '2017-09-20 15:27:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('576', '1', '34', '2', '电表 抄表电表2', '2017-09-20 15:27:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('577', '1', '34', '2', '电表 抄表1231', '2017-09-20 15:27:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('578', '1', '34', '2', '电表 抄表电表12', '2017-09-20 15:27:54', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('579', '1', '27', '2', '增加了了合同号为2213213', '2017-09-20 15:37:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('580', '1', '34', '2', '电表 抄表1231', '2017-09-20 15:38:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('581', '1', null, '2', '添加了客户名称为123123', '2017-09-20 15:39:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('582', '1', null, '2', '增加了角色为12322', '2017-09-20 16:18:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('583', '1', '27', '2', '增加了了合同号为合同1', '2017-09-20 16:31:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('584', '1', '28', '2', '水表 抄表水表1', '2017-09-20 16:51:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('585', '1', '28', '2', '水表 抄表水表2', '2017-09-20 16:51:20', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('586', '1', '28', '2', '水表 抄表水表1', '2017-09-20 16:52:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('587', '1', '28', '2', '水表 抄表水表2', '2017-09-20 16:52:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('588', '1', '28', '4', '修改了了水表名为水表1', '2017-09-20 16:53:59', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('589', '1', '28', '4', '修改了了水表名为水表1', '2017-09-20 16:54:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('590', '1', '34', '2', '电表 抄表电表1', '2017-09-20 16:55:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('591', '1', '34', '2', '电表 抄表电表2', '2017-09-20 16:55:14', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('592', '1', '27', '2', '增加了了合同号为合同2', '2017-09-20 16:57:59', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('593', '1', '27', '4', '修改了了合同号为合同1', '2017-09-20 16:59:08', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('594', '1', '27', '4', '修改了了合同号为合同3', '2017-09-20 17:19:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('595', '1', '27', '4', '修改了了合同号为合同12', '2017-09-20 17:24:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('596', '1', '28', '4', '修改了了水表名为水表12', '2017-09-20 17:25:23', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('597', '1', '28', '2', '水表 抄表', '2017-09-20 17:26:04', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('598', '1', '28', '4', '修改了了水表名为水表21', '2017-09-20 17:33:36', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('599', '1', '34', '4', '修改了电表名为电表21', '2017-09-20 17:36:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('600', '1', '3', '2', '增加了了菜单为合同管理', '2017-09-20 17:56:39', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('601', '1', '3', '2', '增加了了菜单为水表管理', '2017-09-20 17:57:40', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('602', '1', '3', '2', '增加了了菜单为电表管理', '2017-09-20 17:58:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('603', '1', '0', '1', '登录成功', '2017-09-21 11:04:17', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('604', '1', '27', '4', '修改了了合同号为合同12', '2017-09-21 11:05:10', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('605', '1', '28', '2', '水表 抄表', '2017-09-21 11:05:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('606', '1', '27', '4', '修改了了合同号为合同12', '2017-09-21 11:05:42', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('607', '1', null, '3', '删除了管理员为123', '2017-09-21 11:41:47', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('608', '1', '0', '1', '登录成功', '2017-09-21 11:44:06', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('609', '1', null, '3', '删除了业主名称为123', '2017-09-21 14:18:18', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('610', '1', null, '3', '删除了业主名称为213123', '2017-09-21 14:18:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('611', '1', null, '3', '删除了客户名称为123123', '2017-09-21 14:19:24', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('612', '1', null, '2', '添加了业主名称为123', '2017-09-21 14:27:58', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('613', '1', '27', '2', '增加了了合同号为123', '2017-09-21 14:29:41', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('614', '1', '27', '4', '退租了合同为123', '2017-09-21 14:29:57', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('615', '1', '27', '2', '增加了了合同号为22221', '2017-09-21 14:32:19', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('616', '1', '27', '4', '修改了了合同号为22221', '2017-09-21 14:32:52', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('617', '1', '27', '4', '退租了合同为123', '2017-09-21 14:33:32', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('618', '1', '28', '3', '删除了了水表名为水表2123', '2017-09-21 14:45:26', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('619', '1', '28', '3', '删除了了水表名为水表2', '2017-09-21 14:45:29', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('620', '1', '27', '4', '退租了合同为22221', '2017-09-21 14:46:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('621', '5', '0', '1', '登录成功', '2017-09-21 15:56:01', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('622', '5', '7', '4', '修改了角色为测试', '2017-09-21 15:56:23', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('623', '5', '0', '1', '登录成功', '2017-09-21 15:57:29', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('624', '5', '7', '4', '修改了角色为测试', '2017-09-21 15:57:51', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('625', '5', '28', '2', '水表 抄表121', '2017-09-21 16:00:12', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('626', '5', '0', '1', '登录成功', '2017-09-21 16:03:06', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('627', '5', '7', '4', '修改了角色为测试', '2017-09-21 16:03:54', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('628', '5', '0', '1', '登录成功', '2017-09-21 16:04:31', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('629', '5', '0', '1', '登录成功', '2017-09-21 16:05:04', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('630', '5', '0', '1', '登录成功', '2017-09-21 16:21:02', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('631', '5', '27', '4', '退租了合同为22221', '2017-09-21 16:22:24', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('632', '5', '27', '4', '退租了合同为123', '2017-09-21 16:22:27', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('633', '5', '7', '4', '修改了角色为测试', '2017-09-21 16:26:33', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('634', '1', '0', '1', '登录成功', '2017-09-21 16:27:03', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('635', '1', '27', '4', '退租了合同为22221', '2017-09-21 17:00:13', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('636', '1', '27', '4', '退租了合同为123', '2017-09-21 17:00:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('637', '5', '0', '1', '登录成功', '2017-09-21 20:52:59', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('638', '1', '0', '1', '登录成功', '2017-09-21 20:55:55', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('639', '5', '0', '1', '登录成功', '2017-09-21 20:56:13', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('640', '5', '27', '2', '增加了了合同号为123222', '2017-09-21 21:11:23', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('641', '5', '27', '4', '修改了了合同号为123222', '2017-09-21 21:13:14', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('642', '1', '0', '1', '登录成功', '2017-09-21 21:17:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('643', '1', '27', '4', '退租了合同为', '2017-09-21 21:33:31', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('644', '1', '27', '2', '增加了了合同号为2222', '2017-09-21 21:35:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('645', '1', '27', '4', '退租了合同为', '2017-09-21 21:38:02', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('646', '1', '27', '2', '增加了了合同号为1232221', '2017-09-21 21:39:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('647', '1', '27', '4', '退租了合同为', '2017-09-21 21:39:44', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('648', '1', '28', '3', '删除了了水表名为1212', '2017-09-21 21:40:53', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('649', '1', '28', '3', '删除了了水表名为111', '2017-09-21 21:41:09', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('650', '1', null, '3', '删除了业主名称为123', '2017-09-21 21:43:15', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('651', '1', null, '2', '添加了业主名称为123', '2017-09-21 21:43:43', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('652', '1', '27', '2', '增加了了合同号为111', '2017-09-21 21:44:25', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('653', '1', '28', '3', '删除了了水表名为2222222', '2017-09-21 21:45:07', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('654', '1', '27', '4', '退租了合同为', '2017-09-21 21:45:21', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('655', '1', '27', '4', '退租了合同为', '2017-09-21 21:52:16', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('656', '1', '28', '3', '删除了了水表名为1212', '2017-09-21 21:52:38', '1234', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('657', '5', '0', '1', '登录成功', '2017-09-21 21:56:25', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('658', '5', '27', '2', '增加了了合同号为21123', '2017-09-21 21:58:55', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('659', '5', '28', '2', '水表 抄表', '2017-09-21 21:59:12', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('660', '5', '34', '2', '水表 抄表', '2017-09-21 21:59:27', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('661', '5', '7', '4', '修改了角色为测试', '2017-09-21 22:00:13', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('662', '5', '28', '2', '水表 抄表2222222', '2017-09-21 22:01:28', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('663', '5', '28', '2', '水表 抄表111', '2017-09-21 22:01:28', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('664', '5', '28', '2', '水表 抄表1212', '2017-09-21 22:01:28', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('665', '5', '28', '2', '水表 抄表1212', '2017-09-21 22:01:28', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('666', '5', '28', '2', '水表 抄表121', '2017-09-21 22:01:50', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('667', '5', '28', '2', '水表 抄表2222222', '2017-09-21 22:01:50', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('668', '5', '28', '2', '水表 抄表111', '2017-09-21 22:01:50', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('669', '5', '28', '2', '水表 抄表1212', '2017-09-21 22:01:50', '要你管', '127.0.0.1');
INSERT INTO `dino_log` VALUES ('670', '5', '28', '2', '水表 抄表1212', '2017-09-21 22:01:50', '要你管', '127.0.0.1');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='园区表';

-- ----------------------------
-- Records of dino_park
-- ----------------------------
INSERT INTO `dino_park` VALUES ('2', '164', '1', '1', '4', '7', '北大园', '真真南山', null, '1', '1505365887', '1', null, null);
INSERT INTO `dino_park` VALUES ('3', '0', '1', '1', '4', '4', '浙大园', '浙江', null, '1', '1505358008', '1', null, null);
INSERT INTO `dino_park` VALUES ('6', '0', '2', '4', '4', '4', '青岛园', '青岛', null, '1', '1505364871', '1', null, null);
INSERT INTO `dino_park` VALUES ('7', '157', '1', '1', '1', '1', '213123', '123123', null, '1', '1505396457', '1', null, null);
INSERT INTO `dino_park` VALUES ('8', '156', '1', '1', '1', '1', '1213123', '123123', null, '1', '1505397167', '1', null, null);
INSERT INTO `dino_park` VALUES ('9', '0', '1', '1', '1', '1', '1231231', '123123', null, '1', '1505720284', '1', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='租金合同表';

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
INSERT INTO `dino_rent` VALUES ('165', '99', '0', '1', '123', '2017-09-30', '2017-10-02', '123.00');
INSERT INTO `dino_rent` VALUES ('166', '99', '0', '1', '123', '2017-10-02', '2017-11-24', '123.00');
INSERT INTO `dino_rent` VALUES ('167', '99', '16', '1', '123', '2017-09-15', '2017-11-03', '123.00');
INSERT INTO `dino_rent` VALUES ('182', '106', '0', '1', '2000', '2017-10-01', '2017-11-04', '2000.00');
INSERT INTO `dino_rent` VALUES ('183', '106', '0', '1', '2000', '2017-11-04', '2017-12-02', '2000.00');
INSERT INTO `dino_rent` VALUES ('184', '106', '17', '1', '5000', '2017-09-15', '2017-10-27', '1000.00');
INSERT INTO `dino_rent` VALUES ('185', '106', '16', '1', '5000', '2017-09-23', '2017-09-27', '2000.00');
INSERT INTO `dino_rent` VALUES ('213', '126', '17', '1', '1000', '2017-09-18', '2017-09-29', '1000.00');
INSERT INTO `dino_rent` VALUES ('214', '128', '0', '1', '1000', '2017-10-05', '2017-10-05', '1000.00');
INSERT INTO `dino_rent` VALUES ('215', '128', '16', '1', '1000', '2017-09-22', '2017-09-28', '1000.00');
INSERT INTO `dino_rent` VALUES ('216', '143', '16', '1', '123', '2017-09-19', '2017-09-29', '1000.00');
INSERT INTO `dino_rent` VALUES ('217', '148', '16', '1', '12312', '2017-09-27', '2017-09-30', '123.00');
INSERT INTO `dino_rent` VALUES ('243', '156', '16', '1', '1000', '2017-09-20', '2017-09-22', '1000.00');
INSERT INTO `dino_rent` VALUES ('285', '157', '0', '2', '10', '2017-09-30', '2017-10-07', '2200.00');
INSERT INTO `dino_rent` VALUES ('286', '157', '16', '1', '1000', '2017-09-20', '2017-09-30', '1000.00');
INSERT INTO `dino_rent` VALUES ('287', '158', '17', '1', '123', '2017-09-21', '2017-09-28', '123.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of dino_role
-- ----------------------------
INSERT INTO `dino_role` VALUES ('12', '21', 'sssa', null);
INSERT INTO `dino_role` VALUES ('13', '测试', '测试', null);
INSERT INTO `dino_role` VALUES ('14', '213', '123', '2017-09-09 14:30:01');
INSERT INTO `dino_role` VALUES ('15', 'cheshi1', '', '2017-09-10 22:50:27');
INSERT INTO `dino_role` VALUES ('16', 'asd', '', '2017-09-10 23:04:57');
INSERT INTO `dino_role` VALUES ('21', '12322', null, '2017-09-20 16:18:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=2318 DEFAULT CHARSET=utf8 COMMENT='角色权限表';

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
INSERT INTO `dino_role_value` VALUES ('1006', '16', 'lists', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1007', '16', 'system_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1008', '16', 'dictionary_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1009', '16', 'admin_role', 'Admin', '4');
INSERT INTO `dino_role_value` VALUES ('1010', '16', 'admin_list', 'Admin', '4');
INSERT INTO `dino_role_value` VALUES ('1946', '21', 'lists', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('1947', '21', 'lists', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('1948', '21', 'lists', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('1949', '21', 'lists', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1950', '21', 'system_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('1951', '21', 'system_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('1952', '21', 'system_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('1953', '21', 'system_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1954', '21', 'dictionary_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('1955', '21', 'dictionary_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('1956', '21', 'dictionary_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('1957', '21', 'dictionary_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('1958', '21', 'systemlog_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('1959', '21', 'systemlog_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('2231', '13', 'lists', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('2232', '13', 'lists', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('2233', '13', 'lists', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('2234', '13', 'lists', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('2235', '13', 'system_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('2236', '13', 'system_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('2237', '13', 'system_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('2238', '13', 'system_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('2239', '13', 'dictionary_list', 'Menu', '1');
INSERT INTO `dino_role_value` VALUES ('2240', '13', 'dictionary_list', 'Menu', '2');
INSERT INTO `dino_role_value` VALUES ('2241', '13', 'dictionary_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('2242', '13', 'dictionary_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('2243', '13', 'systemlog_list', 'Menu', '3');
INSERT INTO `dino_role_value` VALUES ('2244', '13', 'systemlog_list', 'Menu', '4');
INSERT INTO `dino_role_value` VALUES ('2245', '13', 'admin_role', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('2246', '13', 'admin_role', 'Admin', '2');
INSERT INTO `dino_role_value` VALUES ('2247', '13', 'admin_role', 'Admin', '3');
INSERT INTO `dino_role_value` VALUES ('2248', '13', 'admin_role', 'Admin', '4');
INSERT INTO `dino_role_value` VALUES ('2249', '13', 'admin_list', 'Admin', '1');
INSERT INTO `dino_role_value` VALUES ('2250', '13', 'admin_list', 'Admin', '2');
INSERT INTO `dino_role_value` VALUES ('2251', '13', 'admin_list', 'Admin', '3');
INSERT INTO `dino_role_value` VALUES ('2252', '13', 'admin_list', 'Admin', '4');
INSERT INTO `dino_role_value` VALUES ('2253', '13', 'company_list', 'Enterprise', '1');
INSERT INTO `dino_role_value` VALUES ('2254', '13', 'company_list', 'Enterprise', '2');
INSERT INTO `dino_role_value` VALUES ('2255', '13', 'company_list', 'Enterprise', '3');
INSERT INTO `dino_role_value` VALUES ('2256', '13', 'company_list', 'Enterprise', '4');
INSERT INTO `dino_role_value` VALUES ('2257', '13', 'staff_list', 'Enterprise', '1');
INSERT INTO `dino_role_value` VALUES ('2258', '13', 'staff_list', 'Enterprise', '2');
INSERT INTO `dino_role_value` VALUES ('2259', '13', 'staff_list', 'Enterprise', '3');
INSERT INTO `dino_role_value` VALUES ('2260', '13', 'staff_list', 'Enterprise', '4');
INSERT INTO `dino_role_value` VALUES ('2261', '13', 'garden_list', 'Enterprise', '1');
INSERT INTO `dino_role_value` VALUES ('2262', '13', 'garden_list', 'Enterprise', '2');
INSERT INTO `dino_role_value` VALUES ('2263', '13', 'garden_list', 'Enterprise', '3');
INSERT INTO `dino_role_value` VALUES ('2264', '13', 'garden_list', 'Enterprise', '4');
INSERT INTO `dino_role_value` VALUES ('2265', '13', 'house_list', 'Enterprise', '2');
INSERT INTO `dino_role_value` VALUES ('2266', '13', 'house_list', 'Enterprise', '3');
INSERT INTO `dino_role_value` VALUES ('2267', '13', 'house_list', 'Enterprise', '4');
INSERT INTO `dino_role_value` VALUES ('2268', '13', 'customer_list', 'Customer', '1');
INSERT INTO `dino_role_value` VALUES ('2269', '13', 'customer_list', 'Customer', '2');
INSERT INTO `dino_role_value` VALUES ('2270', '13', 'customer_list', 'Customer', '3');
INSERT INTO `dino_role_value` VALUES ('2271', '13', 'customer_list', 'Customer', '4');
INSERT INTO `dino_role_value` VALUES ('2272', '13', 'cuscontract_list', 'Customer', '1');
INSERT INTO `dino_role_value` VALUES ('2273', '13', 'cuscontract_list', 'Customer', '2');
INSERT INTO `dino_role_value` VALUES ('2274', '13', 'cuscontract_list', 'Customer', '3');
INSERT INTO `dino_role_value` VALUES ('2275', '13', 'cuscontract_list', 'Customer', '4');
INSERT INTO `dino_role_value` VALUES ('2276', '13', 'cuscontract_list', 'Customer', '6');
INSERT INTO `dino_role_value` VALUES ('2277', '13', 'cuscontract_list', 'Customer', '7');
INSERT INTO `dino_role_value` VALUES ('2278', '13', 'water_list', 'Customer', '1');
INSERT INTO `dino_role_value` VALUES ('2279', '13', 'water_list', 'Customer', '2');
INSERT INTO `dino_role_value` VALUES ('2280', '13', 'water_list', 'Customer', '3');
INSERT INTO `dino_role_value` VALUES ('2281', '13', 'water_list', 'Customer', '4');
INSERT INTO `dino_role_value` VALUES ('2282', '13', 'water_list', 'Customer', '6');
INSERT INTO `dino_role_value` VALUES ('2283', '13', 'water_list', 'Customer', '7');
INSERT INTO `dino_role_value` VALUES ('2284', '13', 'electric_list', 'Customer', '1');
INSERT INTO `dino_role_value` VALUES ('2285', '13', 'electric_list', 'Customer', '2');
INSERT INTO `dino_role_value` VALUES ('2286', '13', 'electric_list', 'Customer', '3');
INSERT INTO `dino_role_value` VALUES ('2287', '13', 'electric_list', 'Customer', '4');
INSERT INTO `dino_role_value` VALUES ('2288', '13', 'electric_list', 'Customer', '6');
INSERT INTO `dino_role_value` VALUES ('2289', '13', 'electric_list', 'Customer', '7');
INSERT INTO `dino_role_value` VALUES ('2290', '13', 'detailed_list', 'Detailed', '1');
INSERT INTO `dino_role_value` VALUES ('2291', '13', 'detailed_list', 'Detailed', '2');
INSERT INTO `dino_role_value` VALUES ('2292', '13', 'detailed_list', 'Detailed', '3');
INSERT INTO `dino_role_value` VALUES ('2293', '13', 'detailed_list', 'Detailed', '4');
INSERT INTO `dino_role_value` VALUES ('2294', '13', 'detailed_list', 'Detailed', '6');
INSERT INTO `dino_role_value` VALUES ('2295', '13', 'cuscontract_list', 'Cuscontract', '1');
INSERT INTO `dino_role_value` VALUES ('2296', '13', 'cuscontract_list', 'Cuscontract', '2');
INSERT INTO `dino_role_value` VALUES ('2297', '13', 'cuscontract_list', 'Cuscontract', '3');
INSERT INTO `dino_role_value` VALUES ('2298', '13', 'cuscontract_list', 'Cuscontract', '4');
INSERT INTO `dino_role_value` VALUES ('2299', '13', 'water_list', 'Cuscontract', '1');
INSERT INTO `dino_role_value` VALUES ('2300', '13', 'water_list', 'Cuscontract', '2');
INSERT INTO `dino_role_value` VALUES ('2301', '13', 'water_list', 'Cuscontract', '3');
INSERT INTO `dino_role_value` VALUES ('2302', '13', 'water_list', 'Cuscontract', '4');
INSERT INTO `dino_role_value` VALUES ('2303', '13', 'water_list', 'Cuscontract', '6');
INSERT INTO `dino_role_value` VALUES ('2304', '13', 'water_list', 'Cuscontract', '7');
INSERT INTO `dino_role_value` VALUES ('2305', '13', 'electric_list', 'Cuscontract', '1');
INSERT INTO `dino_role_value` VALUES ('2306', '13', 'electric_list', 'Cuscontract', '2');
INSERT INTO `dino_role_value` VALUES ('2307', '13', 'electric_list', 'Cuscontract', '3');
INSERT INTO `dino_role_value` VALUES ('2308', '13', 'electric_list', 'Cuscontract', '4');
INSERT INTO `dino_role_value` VALUES ('2309', '13', 'electric_list', 'Cuscontract', '6');
INSERT INTO `dino_role_value` VALUES ('2310', '13', 'electric_list', 'Cuscontract', '7');
INSERT INTO `dino_role_value` VALUES ('2311', '13', 'income_list', 'Finance', '1');
INSERT INTO `dino_role_value` VALUES ('2312', '13', 'income_list', 'Finance', '2');
INSERT INTO `dino_role_value` VALUES ('2313', '13', 'income_list', 'Finance', '4');
INSERT INTO `dino_role_value` VALUES ('2314', '13', 'income_list', 'Finance', '6');
INSERT INTO `dino_role_value` VALUES ('2315', '13', 'expenditure_list', 'Finance', '1');
INSERT INTO `dino_role_value` VALUES ('2316', '13', 'expenditure_list', 'Finance', '2');
INSERT INTO `dino_role_value` VALUES ('2317', '13', 'expenditure_list', 'Finance', '4');

-- ----------------------------
-- Table structure for `dino_staff`
-- ----------------------------
DROP TABLE IF EXISTS `dino_staff`;
CREATE TABLE `dino_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名',
  `sex` int(1) DEFAULT '1' COMMENT '性别(0保密；1男；2女)',
  `job_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '职称id',
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
INSERT INTO `dino_staff` VALUES ('1', '12121', '1', '1', '1', '1', '1', null, '1', null, null, null, null);

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
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='变压器表';

-- ----------------------------
-- Records of dino_transformer
-- ----------------------------
INSERT INTO `dino_transformer` VALUES ('1', '53', '100', '500kw');
INSERT INTO `dino_transformer` VALUES ('2', '57', '123', '123');
INSERT INTO `dino_transformer` VALUES ('3', '58', '123', '123');
INSERT INTO `dino_transformer` VALUES ('4', '59', '123', '123');
INSERT INTO `dino_transformer` VALUES ('5', '60', '123', '123');
INSERT INTO `dino_transformer` VALUES ('6', '61', '123', '123');
INSERT INTO `dino_transformer` VALUES ('9', '70', '123', '123');
INSERT INTO `dino_transformer` VALUES ('8', '69', '123', '123');
INSERT INTO `dino_transformer` VALUES ('10', '71', '123', '123');
INSERT INTO `dino_transformer` VALUES ('11', '72', '123', '123');
INSERT INTO `dino_transformer` VALUES ('12', '73', '123', '123');
INSERT INTO `dino_transformer` VALUES ('13', '74', '123', '123');
INSERT INTO `dino_transformer` VALUES ('14', '75', '123', '123');
INSERT INTO `dino_transformer` VALUES ('15', '76', '123', '123');
INSERT INTO `dino_transformer` VALUES ('16', '77', '123', '123');
INSERT INTO `dino_transformer` VALUES ('17', '78', '123', '123');
INSERT INTO `dino_transformer` VALUES ('18', '79', '123', '123');
INSERT INTO `dino_transformer` VALUES ('19', '80', '123', '123');
INSERT INTO `dino_transformer` VALUES ('20', '81', '123', '123');
INSERT INTO `dino_transformer` VALUES ('21', '82', '123', '123');
INSERT INTO `dino_transformer` VALUES ('22', '83', '123', '123');
INSERT INTO `dino_transformer` VALUES ('23', '84', '123', '123');
INSERT INTO `dino_transformer` VALUES ('24', '85', '123', '123');
INSERT INTO `dino_transformer` VALUES ('25', '86', '123', '123');
INSERT INTO `dino_transformer` VALUES ('26', '87', '123', '123');
INSERT INTO `dino_transformer` VALUES ('27', '88', '123', '123');
INSERT INTO `dino_transformer` VALUES ('28', '89', '123', '123');
INSERT INTO `dino_transformer` VALUES ('29', '90', '123', '123');
INSERT INTO `dino_transformer` VALUES ('30', '91', '123', '123');
INSERT INTO `dino_transformer` VALUES ('33', '95', '123', '123');
INSERT INTO `dino_transformer` VALUES ('32', '94', '123', '123');
INSERT INTO `dino_transformer` VALUES ('34', '96', '123', '123');
INSERT INTO `dino_transformer` VALUES ('37', '99', '123', '123');
INSERT INTO `dino_transformer` VALUES ('38', '100', '3', '3');
INSERT INTO `dino_transformer` VALUES ('39', '101', '3', '3');
INSERT INTO `dino_transformer` VALUES ('40', '102', '3', '3');
INSERT INTO `dino_transformer` VALUES ('41', '103', '3', '3');
INSERT INTO `dino_transformer` VALUES ('42', '104', '3', '3');
INSERT INTO `dino_transformer` VALUES ('47', '109', '1', '1');
INSERT INTO `dino_transformer` VALUES ('44', '106', '3', '3');
INSERT INTO `dino_transformer` VALUES ('46', '108', '1', '1');
INSERT INTO `dino_transformer` VALUES ('49', '112', '123', '123');
INSERT INTO `dino_transformer` VALUES ('53', '117', '1', '1');
INSERT INTO `dino_transformer` VALUES ('54', '118', '1000', '1000KW');
INSERT INTO `dino_transformer` VALUES ('61', '126', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('56', '121', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('58', '123', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('62', '128', '100', '1000kw');
INSERT INTO `dino_transformer` VALUES ('63', '130', '1000', '1000KW');
INSERT INTO `dino_transformer` VALUES ('67', '134', '1000', '1000KW');
INSERT INTO `dino_transformer` VALUES ('66', '133', '1000', '200');
INSERT INTO `dino_transformer` VALUES ('68', '135', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('69', '136', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('70', '137', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('71', '138', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('72', '140', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('73', '141', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('74', '142', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('82', '150', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('76', '144', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('77', '145', '100', '1000kw');
INSERT INTO `dino_transformer` VALUES ('78', '146', '1000', '2000');
INSERT INTO `dino_transformer` VALUES ('79', '147', '123123', '123213');
INSERT INTO `dino_transformer` VALUES ('80', '148', '123', '123');
INSERT INTO `dino_transformer` VALUES ('81', '149', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('83', '151', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('84', '152', '100', '100kw');
INSERT INTO `dino_transformer` VALUES ('85', '153', '100', '100KW');
INSERT INTO `dino_transformer` VALUES ('86', '154', '100', '100KW');
INSERT INTO `dino_transformer` VALUES ('128', '158', '1000', '2000');
INSERT INTO `dino_transformer` VALUES ('104', '156', '111', '2000');
INSERT INTO `dino_transformer` VALUES ('127', '157', '100', '100KW');
INSERT INTO `dino_transformer` VALUES ('130', '159', '123', '123');
INSERT INTO `dino_transformer` VALUES ('132', '160', '1000', '1000KW');
INSERT INTO `dino_transformer` VALUES ('133', '161', '111', '111');
INSERT INTO `dino_transformer` VALUES ('134', '162', '12121', '21');
INSERT INTO `dino_transformer` VALUES ('135', '164', '111', '111');

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
  `type` char(1) COLLATE utf8_unicode_ci DEFAULT '1' COMMENT '1正常，2假删',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='水表';

-- ----------------------------
-- Records of dino_water
-- ----------------------------
INSERT INTO `dino_water` VALUES ('115', '7', '121', '123', '123', '123', '1', '1505975380', '1', null, null, '1');
INSERT INTO `dino_water` VALUES ('117', '7', '121', '213', '123', '123', '1', '1505975572', '1', null, null, '1');
INSERT INTO `dino_water` VALUES ('119', '8', '2222222', '121', '12', '12', '1', '1505999594', '5', null, null, '2');
INSERT INTO `dino_water` VALUES ('120', '7', '111', '11', '11', '11', '1', '1506000943', '1', null, null, '2');
INSERT INTO `dino_water` VALUES ('121', '7', '1212', '1212', '12', '1212', '1', '1506001149', '1', null, null, '2');
INSERT INTO `dino_water` VALUES ('122', '8', '1212', '2123', '123', '123', '1', '1506001465', '1', null, null, '2');
INSERT INTO `dino_water` VALUES ('123', '7', '1212', '121', '212', '21', '1', '1506002335', '5', null, null, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='合同与水表的关系表';

-- ----------------------------
-- Records of dino_water_contract
-- ----------------------------
INSERT INTO `dino_water_contract` VALUES ('48', '121', '48', '20', '1');
INSERT INTO `dino_water_contract` VALUES ('50', '123', '50', '20', '1');
INSERT INTO `dino_water_contract` VALUES ('53', '126', '53', '10', '1');
INSERT INTO `dino_water_contract` VALUES ('54', '128', '54', '10', '1');
INSERT INTO `dino_water_contract` VALUES ('55', '130', '55', '10', '1');
INSERT INTO `dino_water_contract` VALUES ('62', '144', '67', '10', '1');
INSERT INTO `dino_water_contract` VALUES ('63', '145', '68', '0', '1');
INSERT INTO `dino_water_contract` VALUES ('64', '147', '69', '231', '1');
INSERT INTO `dino_water_contract` VALUES ('65', '148', '70', '213', '1');
INSERT INTO `dino_water_contract` VALUES ('110', '158', '115', '123', '1');
INSERT INTO `dino_water_contract` VALUES ('112', '159', '117', '22', '1');
INSERT INTO `dino_water_contract` VALUES ('114', '160', '119', '121', '2');
INSERT INTO `dino_water_contract` VALUES ('115', '161', '120', '111', '2');
INSERT INTO `dino_water_contract` VALUES ('116', '162', '121', '12', '2');
INSERT INTO `dino_water_contract` VALUES ('117', '163', '122', '123', '2');
INSERT INTO `dino_water_contract` VALUES ('118', '164', '123', '21', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='水表与合同单价';

-- ----------------------------
-- Records of dino_water_price
-- ----------------------------
INSERT INTO `dino_water_price` VALUES ('47', '50', '123', '0', '10', '200.00');
INSERT INTO `dino_water_price` VALUES ('50', '53', '126', '0', '10', '200.00');
INSERT INTO `dino_water_price` VALUES ('51', '53', '126', '10', '30', '200.00');
INSERT INTO `dino_water_price` VALUES ('52', '54', '128', '100', '500', '3.00');
INSERT INTO `dino_water_price` VALUES ('53', '55', '130', '1101', '2323', '10.00');
INSERT INTO `dino_water_price` VALUES ('60', '67', '144', '1', '1', '1.00');
INSERT INTO `dino_water_price` VALUES ('61', '68', '145', '0', '0', '0.00');
INSERT INTO `dino_water_price` VALUES ('62', '69', '147', '213', '231', '213.00');
INSERT INTO `dino_water_price` VALUES ('63', '70', '148', '123', '123', '321.00');
INSERT INTO `dino_water_price` VALUES ('108', '115', '158', '123', '1231', '123.00');
INSERT INTO `dino_water_price` VALUES ('110', '117', '1', '132', '123', '213.00');
INSERT INTO `dino_water_price` VALUES ('112', '119', '1', '2', '12', '12.00');
INSERT INTO `dino_water_price` VALUES ('113', '120', '161', '11', '11', '1.00');
INSERT INTO `dino_water_price` VALUES ('114', '121', '162', '12', '12', '21.00');
INSERT INTO `dino_water_price` VALUES ('115', '122', '163', '123', '123', '123.00');
INSERT INTO `dino_water_price` VALUES ('116', '123', '164', '12', '12', '12.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='水表度数记录';

-- ----------------------------
-- Records of dino_water_record
-- ----------------------------
INSERT INTO `dino_water_record` VALUES ('67', '71', '1118764800', '30', '30', '1505897556', '1', null, null);
INSERT INTO `dino_water_record` VALUES ('68', '72', '1118764800', '30', '50', '1505897556', '1', null, null);
INSERT INTO `dino_water_record` VALUES ('69', '109', '1505836800', '111', '12312', '1505899564', '1', null, null);
INSERT INTO `dino_water_record` VALUES ('70', '111', '1505923200', '123', '213', '1505963126', '1', null, null);
INSERT INTO `dino_water_record` VALUES ('71', '115', '1118937600', '30', '20', '1505980812', '5', null, null);
INSERT INTO `dino_water_record` VALUES ('72', '123', '1505923200', '213', '123', '1506002352', '5', null, null);
INSERT INTO `dino_water_record` VALUES ('77', '115', '', '123', '121', '1506002510', '5', null, null);
INSERT INTO `dino_water_record` VALUES ('78', '119', '1118937600', '1212', '23', '1506002510', '5', null, null);
INSERT INTO `dino_water_record` VALUES ('79', '120', '1118937600', '3', '23', '1506002510', '5', null, null);
INSERT INTO `dino_water_record` VALUES ('80', '121', '1118937600', '23', '3232', '1506002510', '5', null, null);
INSERT INTO `dino_water_record` VALUES ('81', '122', '1118937600', '23', '211', '1506002510', '5', null, null);
