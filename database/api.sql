/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : api

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2017-08-16 21:35:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency` int(11) NOT NULL,
  `account_number` int(11) NOT NULL,
  `balance` decimal(11,2) NOT NULL,
  `balance_initial` decimal(11,2) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of accounts
-- ----------------------------

-- ----------------------------
-- Table structure for banks
-- ----------------------------
DROP TABLE IF EXISTS `banks`;
CREATE TABLE `banks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of banks
-- ----------------------------
INSERT INTO `banks` VALUES ('1', 'Banco A.J.Renner S.A.', '---', null, '2017-08-01 00:10:56');
INSERT INTO `banks` VALUES ('2', 'Banco ABC Brasil S.A.', '246', null, null);
INSERT INTO `banks` VALUES ('3', 'Banco Alfa S.A.', '25', null, null);
INSERT INTO `banks` VALUES ('4', 'Banco Alvorada S.A.', '641', null, null);
INSERT INTO `banks` VALUES ('5', 'Banco Arbi S.A.', '213', null, null);
INSERT INTO `banks` VALUES ('6', 'Banco Azteca do Brasil S.A.', '19', null, null);
INSERT INTO `banks` VALUES ('7', 'Banco Banerj S.A.', '29', null, null);
INSERT INTO `banks` VALUES ('8', 'Banco Bankpar S.A.', '0', null, null);
INSERT INTO `banks` VALUES ('9', 'Banco Barclays S.A.', '740', null, null);
INSERT INTO `banks` VALUES ('10', 'Banco BBM S.A.', '107', null, null);
INSERT INTO `banks` VALUES ('11', 'Banco Beg S.A.', '31', null, null);
INSERT INTO `banks` VALUES ('12', 'Banco BGN S.A.', '739', null, null);
INSERT INTO `banks` VALUES ('13', 'Banco BM&F de Serviços de Liquidação e Custódia S.A', '96', null, null);
INSERT INTO `banks` VALUES ('14', 'Banco BMG S.A.', '318', null, null);
INSERT INTO `banks` VALUES ('15', 'Banco BNP Paribas Brasil S.A.', '752', null, null);
INSERT INTO `banks` VALUES ('16', 'Banco Boavista Interatlântico S.A.', '248', null, null);
INSERT INTO `banks` VALUES ('17', 'Banco Bonsucesso S.A.', '218', null, null);
INSERT INTO `banks` VALUES ('18', 'Banco Bracce S.A.', '65', null, null);
INSERT INTO `banks` VALUES ('19', 'Banco Bradesco BBI S.A.', '36', null, null);
INSERT INTO `banks` VALUES ('20', 'Banco Bradesco Cartões S.A.', '204', null, null);
INSERT INTO `banks` VALUES ('21', 'Banco Bradesco Financiamentos S.A.', '394', null, null);
INSERT INTO `banks` VALUES ('22', 'Banco Bradesco S.A.', '237', null, null);
INSERT INTO `banks` VALUES ('23', 'Banco Brascan S.A.', '225', null, null);
INSERT INTO `banks` VALUES ('24', 'Banco BRJ S.A.', 'M15', null, null);
INSERT INTO `banks` VALUES ('25', 'Banco BTG Pactual S.A.', '208', null, null);
INSERT INTO `banks` VALUES ('26', 'Banco BVA S.A.', '44', null, null);
INSERT INTO `banks` VALUES ('27', 'Banco Cacique S.A.', '263', null, null);
INSERT INTO `banks` VALUES ('28', 'Banco Caixa Geral - Brasil S.A.', '473', null, null);
INSERT INTO `banks` VALUES ('29', 'Banco Capital S.A.', '412', null, null);
INSERT INTO `banks` VALUES ('30', 'Banco Cargill S.A.', '40', null, null);
INSERT INTO `banks` VALUES ('31', 'Banco Citibank S.A.', '745', null, null);
INSERT INTO `banks` VALUES ('32', 'Banco Citicard S.A.', 'M08', null, null);
INSERT INTO `banks` VALUES ('33', 'Banco Clássico S.A.', '241', null, null);
INSERT INTO `banks` VALUES ('34', 'Banco CNH Capital S.A.', 'M19', null, null);
INSERT INTO `banks` VALUES ('35', 'Banco Comercial e de Investimento Sudameris S.A.', '215', null, null);
INSERT INTO `banks` VALUES ('36', 'Banco Cooperativo do Brasil S.A. - BANCOOB', '756', null, null);
INSERT INTO `banks` VALUES ('37', 'Banco Cooperativo Sicredi S.A.', '748', null, null);
INSERT INTO `banks` VALUES ('38', 'Banco CR2 S.A.', '75', null, null);
INSERT INTO `banks` VALUES ('39', 'Banco Credibel S.A.', '721', null, null);
INSERT INTO `banks` VALUES ('40', 'Banco Credit Agricole Brasil S.A.', '222', null, null);
INSERT INTO `banks` VALUES ('41', 'Banco Credit Suisse (Brasil) S.A.', '505', null, null);
INSERT INTO `banks` VALUES ('42', 'Banco Cruzeiro do Sul S.A.', '229', null, null);
INSERT INTO `banks` VALUES ('43', 'Banco Cédula S.A.', '266', null, null);
INSERT INTO `banks` VALUES ('44', 'Banco da Amazônia S.A.', '3', null, null);
INSERT INTO `banks` VALUES ('45', 'Banco da China Brasil S.A.', '083-3', null, null);
INSERT INTO `banks` VALUES ('46', 'Banco Daimlerchrysler S.A.', 'M21', null, null);
INSERT INTO `banks` VALUES ('47', 'Banco Daycoval S.A.', '707', null, null);
INSERT INTO `banks` VALUES ('48', 'Banco de La Nacion Argentina', '300', null, null);
INSERT INTO `banks` VALUES ('49', 'Banco de La Provincia de Buenos Aires', '495', null, null);
INSERT INTO `banks` VALUES ('50', 'Banco de La Republica Oriental del Uruguay', '494', null, null);
INSERT INTO `banks` VALUES ('51', 'Banco de Lage Landen Brasil S.A.', 'M06', null, null);
INSERT INTO `banks` VALUES ('52', 'Banco de Pernambuco S.A. - BANDEPE', '24', null, null);
INSERT INTO `banks` VALUES ('53', 'Banco de Tokyo-Mitsubishi UFJ Brasil S.A.', '456', null, null);
INSERT INTO `banks` VALUES ('54', 'Banco Dibens S.A.', '214', null, null);
INSERT INTO `banks` VALUES ('55', 'Banco do Brasil S.A.', '1', null, null);
INSERT INTO `banks` VALUES ('56', 'Banco do Estado de Sergipe S.A.', '47', null, null);
INSERT INTO `banks` VALUES ('57', 'Banco do Estado do Pará S.A.', '37', null, null);
INSERT INTO `banks` VALUES ('58', 'Banco do Estado do Piauí S.A. - BEP', '39', null, null);
INSERT INTO `banks` VALUES ('59', 'Banco do Estado do Rio Grande do Sul S.A.', '41', null, null);
INSERT INTO `banks` VALUES ('60', 'Banco do Nordeste do Brasil S.A.', '4', null, null);
INSERT INTO `banks` VALUES ('61', 'Banco Fator S.A.', '265', null, null);
INSERT INTO `banks` VALUES ('62', 'Banco Fiat S.A.', 'M03', null, null);
INSERT INTO `banks` VALUES ('63', 'Banco Fibra S.A.', '224', null, null);
INSERT INTO `banks` VALUES ('64', 'Banco Ficsa S.A.', '626', null, null);
INSERT INTO `banks` VALUES ('65', 'Banco Ford S.A.', 'M18', null, null);
INSERT INTO `banks` VALUES ('66', 'Banco GE Capital S.A.', '233', null, null);
INSERT INTO `banks` VALUES ('67', 'Banco Gerdau S.A.', '734', null, null);
INSERT INTO `banks` VALUES ('68', 'Banco GMAC S.A.', 'M07', null, null);
INSERT INTO `banks` VALUES ('69', 'Banco Guanabara S.A.', '612', null, null);
INSERT INTO `banks` VALUES ('70', 'Banco Honda S.A.', 'M22', null, null);
INSERT INTO `banks` VALUES ('71', 'Banco Ibi S.A. Banco Múltiplo', '63', null, null);
INSERT INTO `banks` VALUES ('72', 'Banco IBM S.A.', 'M11', null, null);
INSERT INTO `banks` VALUES ('73', 'Banco Industrial do Brasil S.A.', '604', null, null);
INSERT INTO `banks` VALUES ('74', 'Banco Industrial e Comercial S.A.', '320', null, null);
INSERT INTO `banks` VALUES ('75', 'Banco Indusval S.A.', '653', null, null);
INSERT INTO `banks` VALUES ('76', 'Banco Intercap S.A.', '630', null, null);
INSERT INTO `banks` VALUES ('77', 'Banco Intermedium S.A.', '077-9', null, null);
INSERT INTO `banks` VALUES ('78', 'Banco Investcred Unibanco S.A.', '249', null, null);
INSERT INTO `banks` VALUES ('79', 'Banco Itaucred Financiamentos S.A.', 'M09', null, null);
INSERT INTO `banks` VALUES ('80', 'Banco Itaú BBA S.A.', '184', null, null);
INSERT INTO `banks` VALUES ('81', 'Banco ItaúBank S.A', '479', null, null);
INSERT INTO `banks` VALUES ('82', 'Banco J. P. Morgan S.A.', '376', null, null);
INSERT INTO `banks` VALUES ('83', 'Banco J. Safra S.A.', '74', null, null);
INSERT INTO `banks` VALUES ('84', 'Banco John Deere S.A.', '217', null, null);
INSERT INTO `banks` VALUES ('85', 'Banco KDB S.A.', '76', null, null);
INSERT INTO `banks` VALUES ('86', 'Banco KEB do Brasil S.A.', '757', null, null);
INSERT INTO `banks` VALUES ('87', 'Banco Luso Brasileiro S.A.', '600', null, null);
INSERT INTO `banks` VALUES ('88', 'Banco Matone S.A.', '212', null, null);
INSERT INTO `banks` VALUES ('89', 'Banco Maxinvest S.A.', 'M12', null, null);
INSERT INTO `banks` VALUES ('90', 'Banco Mercantil do Brasil S.A.', '389', null, null);
INSERT INTO `banks` VALUES ('91', 'Banco Modal S.A.', '746', null, null);
INSERT INTO `banks` VALUES ('92', 'Banco Moneo S.A.', 'M10', null, null);
INSERT INTO `banks` VALUES ('93', 'Banco Morada S.A.', '738', null, null);
INSERT INTO `banks` VALUES ('94', 'Banco Morgan Stanley S.A.', '66', null, null);
INSERT INTO `banks` VALUES ('95', 'Banco Máxima S.A.', '243', null, null);
INSERT INTO `banks` VALUES ('96', 'Banco Opportunity S.A.', '45', null, null);
INSERT INTO `banks` VALUES ('97', 'Banco Ourinvest S.A.', 'M17', null, null);
INSERT INTO `banks` VALUES ('98', 'Banco Panamericano S.A.', '623', null, null);
INSERT INTO `banks` VALUES ('99', 'Banco Paulista S.A.', '611', null, null);
INSERT INTO `banks` VALUES ('100', 'Banco Pecúnia S.A.', '613', null, null);
INSERT INTO `banks` VALUES ('101', 'Banco Petra S.A.', '094-2', null, null);
INSERT INTO `banks` VALUES ('102', 'Banco Pine S.A.', '643', null, null);
INSERT INTO `banks` VALUES ('103', 'Banco Porto Seguro S.A.', '724', null, null);
INSERT INTO `banks` VALUES ('104', 'Banco Pottencial S.A.', '735', null, null);
INSERT INTO `banks` VALUES ('105', 'Banco Prosper S.A.', '638', null, null);
INSERT INTO `banks` VALUES ('106', 'Banco PSA Finance Brasil S.A.', 'M24', null, null);
INSERT INTO `banks` VALUES ('107', 'Banco Rabobank International Brasil S.A.', '747', null, null);
INSERT INTO `banks` VALUES ('108', 'Banco Randon S.A.', '088-4', null, null);
INSERT INTO `banks` VALUES ('109', 'Banco Real S.A.', '356', null, null);
INSERT INTO `banks` VALUES ('110', 'Banco Rendimento S.A.', '633', null, null);
INSERT INTO `banks` VALUES ('111', 'Banco Ribeirão Preto S.A.', '741', null, null);
INSERT INTO `banks` VALUES ('112', 'Banco Rodobens S.A.', 'M16', null, null);
INSERT INTO `banks` VALUES ('113', 'Banco Rural Mais S.A.', '72', null, null);
INSERT INTO `banks` VALUES ('114', 'Banco Rural S.A.', '453', null, null);
INSERT INTO `banks` VALUES ('115', 'Banco Safra S.A.', '422', null, null);
INSERT INTO `banks` VALUES ('116', 'Banco Santander (Brasil) S.A.', '33', null, null);
INSERT INTO `banks` VALUES ('117', 'Banco Schahin S.A.', '250', null, null);
INSERT INTO `banks` VALUES ('118', 'Banco Semear S.A.', '743', null, null);
INSERT INTO `banks` VALUES ('119', 'Banco Simples S.A.', '749', null, null);
INSERT INTO `banks` VALUES ('120', 'Banco Société Générale Brasil S.A.', '366', null, null);
INSERT INTO `banks` VALUES ('121', 'Banco Sofisa S.A.', '637', null, null);
INSERT INTO `banks` VALUES ('122', 'Banco Standard de Investimentos S.A.', '12', null, null);
INSERT INTO `banks` VALUES ('123', 'Banco Sumitomo Mitsui Brasileiro S.A.', '464', null, null);
INSERT INTO `banks` VALUES ('124', 'Banco Topázio S.A.', '082-5', null, null);
INSERT INTO `banks` VALUES ('125', 'Banco Toyota do Brasil S.A.', 'M20', null, null);
INSERT INTO `banks` VALUES ('126', 'Banco Tricury S.A.', 'M13', null, null);
INSERT INTO `banks` VALUES ('127', 'Banco Triângulo S.A.', '634', null, null);
INSERT INTO `banks` VALUES ('128', 'Banco Volkswagen S.A.', 'M14', null, null);
INSERT INTO `banks` VALUES ('129', 'Banco Volvo (Brasil) S.A.', 'M23', null, null);
INSERT INTO `banks` VALUES ('130', 'Banco Votorantim S.A.', '655', null, null);
INSERT INTO `banks` VALUES ('131', 'Banco VR S.A.', '610', null, null);
INSERT INTO `banks` VALUES ('132', 'Banco WestLB do Brasil S.A.', '370', null, null);
INSERT INTO `banks` VALUES ('133', 'BANESTES S.A. Banco do Estado do Espírito Santo', '21', null, null);
INSERT INTO `banks` VALUES ('134', 'Banif-Banco Internacional do Funchal (Brasil)S.A.', '719', null, null);
INSERT INTO `banks` VALUES ('135', 'Bank of America Merrill Lynch Banco Múltiplo S.A.', '755', null, null);
INSERT INTO `banks` VALUES ('136', 'BankBoston N.A.', '744', null, null);
INSERT INTO `banks` VALUES ('137', 'BB Banco Popular do Brasil S.A.', '73', null, null);
INSERT INTO `banks` VALUES ('138', 'BES Investimento do Brasil S.A.-Banco de Investimento', '78', null, null);
INSERT INTO `banks` VALUES ('139', 'BPN Brasil Banco Múltiplo S.A.', '69', null, null);
INSERT INTO `banks` VALUES ('140', 'BRB - Banco de Brasília S.A.', '70', null, null);
INSERT INTO `banks` VALUES ('141', 'Brickell S.A. Crédito, financiamento e Investimento', '092-2', null, null);
INSERT INTO `banks` VALUES ('142', 'Caixa Econômica Federal', '104', null, null);
INSERT INTO `banks` VALUES ('143', 'Citibank N.A.', '477', null, null);
INSERT INTO `banks` VALUES ('144', 'Concórdia Banco S.A.', '081-7', null, null);
INSERT INTO `banks` VALUES ('145', 'Cooperativa Central de Crédito Noroeste Brasileiro Ltda.', '097-3', null, null);
INSERT INTO `banks` VALUES ('146', 'Cooperativa Central de Crédito Urbano-CECRED', '085-x', null, null);
INSERT INTO `banks` VALUES ('147', 'Cooperativa Central de Economia e Credito Mutuo das Unicreds', '099-x', null, null);
INSERT INTO `banks` VALUES ('148', 'Cooperativa Central de Economia e Crédito Mutuo das Unicreds', '090-2', null, null);
INSERT INTO `banks` VALUES ('149', 'Cooperativa de Crédito Rural da Região de Mogiana', '089-2', null, null);
INSERT INTO `banks` VALUES ('150', 'Cooperativa Unicred Central Santa Catarina', '087-6', null, null);
INSERT INTO `banks` VALUES ('151', 'Credicorol Cooperativa de Crédito Rural', '098-1', null, null);
INSERT INTO `banks` VALUES ('152', 'Deutsche Bank S.A. - Banco Alemão', '487', null, null);
INSERT INTO `banks` VALUES ('153', 'Dresdner Bank Brasil S.A. - Banco Múltiplo', '751', null, null);
INSERT INTO `banks` VALUES ('154', 'Goldman Sachs do Brasil Banco Múltiplo S.A.', '64', null, null);
INSERT INTO `banks` VALUES ('155', 'Hipercard Banco Múltiplo S.A.', '62', null, null);
INSERT INTO `banks` VALUES ('156', 'HSBC Bank Brasil S.A. - Banco Múltiplo', '399', null, null);
INSERT INTO `banks` VALUES ('157', 'HSBC Finance (Brasil) S.A. - Banco Múltiplo', '168', null, null);
INSERT INTO `banks` VALUES ('158', 'ING Bank N.V.', '492', null, null);
INSERT INTO `banks` VALUES ('159', 'Itaú Unibanco Holding S.A.', '652', null, null);
INSERT INTO `banks` VALUES ('160', 'Itaú Unibanco S.A.', '341', null, null);
INSERT INTO `banks` VALUES ('161', 'JBS Banco S.A.', '79', null, null);
INSERT INTO `banks` VALUES ('162', 'JPMorgan Chase Bank', '488', null, null);
INSERT INTO `banks` VALUES ('163', 'Natixis Brasil S.A. Banco Múltiplo', '14', null, null);
INSERT INTO `banks` VALUES ('164', 'NBC Bank Brasil S.A. - Banco Múltiplo', '753', null, null);
INSERT INTO `banks` VALUES ('165', 'OBOE Crédito Financiamento e Investimento S.A.', '086-8', null, null);
INSERT INTO `banks` VALUES ('166', 'Paraná Banco S.A.', '254', null, null);
INSERT INTO `banks` VALUES ('167', 'UNIBANCO - União de Bancos Brasileiros S.A.', '409', null, null);
INSERT INTO `banks` VALUES ('168', 'Unicard Banco Múltiplo S.A.', '230', null, null);
INSERT INTO `banks` VALUES ('169', 'Unicred Central do Rio Grande do Sul', '091-4', null, null);
INSERT INTO `banks` VALUES ('170', 'Unicred Norte do Paraná', '84', null, null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_07_29_203603_create_account', '1');
INSERT INTO `migrations` VALUES ('4', '2017_07_29_204318_create_bank', '1');
INSERT INTO `migrations` VALUES ('5', '2016_06_01_000001_create_oauth_auth_codes_table', '2');
INSERT INTO `migrations` VALUES ('6', '2016_06_01_000002_create_oauth_access_tokens_table', '2');
INSERT INTO `migrations` VALUES ('7', '2016_06_01_000003_create_oauth_refresh_tokens_table', '2');
INSERT INTO `migrations` VALUES ('8', '2016_06_01_000004_create_oauth_clients_table', '2');
INSERT INTO `migrations` VALUES ('9', '2016_06_01_000005_create_oauth_personal_access_clients_table', '2');

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('5548a93fdb2f8c42dc5d1799d6e8edf5e7021be0c0c0b0ca3718449cd118dd6fdd483b8f26dc818d', '1', '2', null, '[]', '0', '2017-07-31 23:58:00', '2017-07-31 23:58:00', '2018-07-31 23:58:00');
INSERT INTO `oauth_access_tokens` VALUES ('5ef2e9f377f9177f61a1ff667be557be1e399e3facca7a3a6428bdde13b54a1ea71d569fda0ca3bd', '1', '2', null, '[]', '0', '2017-08-12 04:00:27', '2017-08-12 04:00:27', '2018-08-12 04:00:27');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('1', null, 'Laravel Personal Access Client', 'GA1Co6WA9fioFm9jvp9EnBqblQm3pxp968uRwGnA', 'http://localhost', '1', '0', '0', '2017-07-31 23:34:35', '2017-07-31 23:34:35');
INSERT INTO `oauth_clients` VALUES ('2', null, 'Laravel Password Grant Client', 'IsqeNKtPwMDrJfx7pvTDCc44fAb6YiFHbBH0U4DE', 'http://localhost', '0', '1', '0', '2017-07-31 23:34:35', '2017-07-31 23:34:35');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2017-07-31 23:34:35', '2017-07-31 23:34:35');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------
INSERT INTO `oauth_refresh_tokens` VALUES ('2a80dcf3bff30ee0fc123e6b79267e7831f37ed73bc0e3def92b581af7cc6b15a30ad1636e1f833a', '5ef2e9f377f9177f61a1ff667be557be1e399e3facca7a3a6428bdde13b54a1ea71d569fda0ca3bd', '0', '2018-08-12 04:00:28');
INSERT INTO `oauth_refresh_tokens` VALUES ('eb6ad306a458bda74ce56bcb3047fc7bacc92eca78a9cc405567fb8dbb866f865a3e454af57c4019', '5548a93fdb2f8c42dc5d1799d6e8edf5e7021be0c0c0b0ca3718449cd118dd6fdd483b8f26dc818d', '0', '2018-07-31 23:58:00');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'rodrigo argolo', 'rodrigo.argolo@outlook.com', '$2y$10$6xQM9MRICqiIT803TEprdOMlrMZvKFC3idaDCRXye3IAy2weuRUgG', 'CBMoTtMEH73qCxhHPwvXF677zbguJCeepV7YnKL4fFukXujBSbWuGhmiSLWw', '2017-07-31 23:51:04', '2017-07-31 23:51:04');
