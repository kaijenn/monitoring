/*
 Navicat Premium Data Transfer

 Source Server         : yoga
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : projekbaru

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 09/09/2024 10:15:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas`  (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `nama_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `posisi_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_meja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktu_awal` time NULL DEFAULT NULL,
  `waktu_akhir` time NULL DEFAULT NULL,
  `status` enum('Sedang di Pakai','Pending','Kosong','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_kursi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_monitor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_cpu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_keyboard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_mouse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kondisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kelas` enum('kelas','Lab Komputer','Lab IPA') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keperluan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_penanggung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_rangka_manusia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_burette` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_mikroskop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES (1, 1, 'Kelas RPL XII C', 'Lantai 3 Pintu Merah', '20', '22:10:00', '10:13:00', 'Pending', '20', NULL, NULL, NULL, NULL, 'Meja ada rusak sikit', 'kelas', 'mhjmgj', '1', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-09-09 10:06:35', NULL, '2024-09-09');
INSERT INTO `kelas` VALUES (2, 2, 'RPL XII A', 'Lantai 3 Kuning', NULL, NULL, NULL, 'Kosong', NULL, NULL, NULL, NULL, NULL, 'Kursi digigit darren', 'kelas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `kelas` VALUES (5, 4, 'Lab Komputer', 'Lantai 2 Lab Komputer', NULL, NULL, NULL, 'Kosong', '2323', NULL, NULL, NULL, NULL, NULL, 'Lab Komputer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `kelas` VALUES (6, NULL, 'Lab IPA', 'Lantai 2 Hijau', NULL, NULL, NULL, 'Kosong', '8', NULL, NULL, NULL, NULL, NULL, 'Lab IPA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `kelas` VALUES (13, 5, 'Kelas BDP 12', 'Kelas', '156', NULL, NULL, 'Sedang di Pakai', '20', '', '', '', '', NULL, NULL, NULL, NULL, '', '', '', 5, NULL, NULL, '2024-09-07 16:41:42', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for kelas_backup
-- ----------------------------
DROP TABLE IF EXISTS `kelas_backup`;
CREATE TABLE `kelas_backup`  (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `posisi_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_meja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waktu_awal` time NULL DEFAULT NULL,
  `waktu_akhir` time NULL DEFAULT NULL,
  `status` enum('Sedang di Pakai','Pending','Kosong','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_kursi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_monitor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_cpu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_keyboard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_mouse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kondisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kelas` enum('kelas','Lab Komputer','Lab IPA') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keperluan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_penanggung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_rangka_manusia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_burette` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_mikroskop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_by` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  `backup_by` int NULL DEFAULT NULL,
  `backup_at` datetime NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_backup
-- ----------------------------
INSERT INTO `kelas_backup` VALUES (1, 'bb', 'bbb', '1', NULL, NULL, 'Pending', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-09-07 13:44:34', NULL, 1, '2024-09-07 13:56:30');
INSERT INTO `kelas_backup` VALUES (1, 'bb', 'bbb', '1', NULL, NULL, 'Pending', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-09-07 13:44:34', NULL, 1, '2024-09-07 13:58:05');
INSERT INTO `kelas_backup` VALUES (1, 'Kelas RPL XII B', 'Lantai 3 Pintu Tosca', '14', NULL, NULL, 'Kosong', '14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-09-07 13:58:05', NULL, 1, '2024-09-09 10:06:35');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id_permission` int NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `can_access` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_permission`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 69 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, NULL, 'dashboard', 1);
INSERT INTO `permissions` VALUES (2, NULL, 'kelas', 1);
INSERT INTO `permissions` VALUES (3, NULL, 'kelas_admin', 1);
INSERT INTO `permissions` VALUES (4, NULL, 'restore', 1);
INSERT INTO `permissions` VALUES (5, NULL, 'restore_edit', 1);
INSERT INTO `permissions` VALUES (6, NULL, 'laporan', 1);
INSERT INTO `permissions` VALUES (7, NULL, 'setting', 1);
INSERT INTO `permissions` VALUES (8, NULL, 'log_activity', 1);
INSERT INTO `permissions` VALUES (9, NULL, 'level', 1);
INSERT INTO `permissions` VALUES (62, 'admin', 'kelas', 1);
INSERT INTO `permissions` VALUES (63, 'admin', 'kelas_admin', 1);
INSERT INTO `permissions` VALUES (64, 'admin', 'restore', 1);
INSERT INTO `permissions` VALUES (65, 'admin', 'restore_edit', 1);
INSERT INTO `permissions` VALUES (66, 'admin', 'laporan', 1);
INSERT INTO `permissions` VALUES (67, 'admin', 'setting', 1);
INSERT INTO `permissions` VALUES (68, 'admin', 'log_activity', 1);

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logo_website` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tab_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `login_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_by` int NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  `deleted_by` int NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'SPH', '1725708495_2bbe36f101c5de3f9637.png', '1725725731_eb1ce3ce17b303b15eed.png', '1725708511_9b0f19d47fe6c479e6ea.png', NULL, 1, NULL, NULL, '2024-09-07 23:15:31', NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('admin','admin_ruangan','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin@gmail.com', 'admin', '1725725405_fef550f2572aa0e96965.png', '221');
INSERT INTO `user` VALUES (2, 'admin rpl xiib', '1', 'adminruangan@gmial.com', 'admin_ruangan', NULL, '22161112');
INSERT INTO `user` VALUES (3, 'user', 'c4ca4238a0b923820dcc509a6f75849b', 'user@gmail.com', 'user', NULL, '22161113');
INSERT INTO `user` VALUES (4, 'admin lab komputer', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 'admin_ruangan', NULL, '22161114');
INSERT INTO `user` VALUES (5, 'joni', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 'admin_ruangan', NULL, '22161115');
INSERT INTO `user` VALUES (6, 'Elvan Lim Chua Ng Lie', 'c4ca4238a0b923820dcc509a6f75849b', 'yogagautama12@gmail.com', 'user', NULL, '1');

-- ----------------------------
-- Table structure for user_activity
-- ----------------------------
DROP TABLE IF EXISTS `user_activity`;
CREATE TABLE `user_activity`  (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `time` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 549 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_activity
-- ----------------------------
INSERT INTO `user_activity` VALUES (51, 1, 'Masuk ke Log Activity', '2024-09-07 13:19:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (52, 1, 'Masuk ke Log Activity', '2024-09-07 13:19:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (53, 1, 'Masuk ke Log Activity', '2024-09-07 13:20:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (55, 1, 'Masuk ke Log Activity', '2024-09-07 13:20:53', NULL, NULL);
INSERT INTO `user_activity` VALUES (56, 1, 'Masuk ke Log Activity', '2024-09-07 13:21:00', NULL, NULL);
INSERT INTO `user_activity` VALUES (57, 1, 'Masuk ke Log Activity', '2024-09-07 13:21:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (58, 1, 'Masuk ke Log Activity', '2024-09-07 13:21:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (59, 1, 'Masuk ke Log Activity', '2024-09-07 13:21:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (60, 1, 'Masuk ke Log Activity', '2024-09-07 13:23:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (61, 1, 'Masuk ke Log Activity', '2024-09-07 13:23:21', NULL, NULL);
INSERT INTO `user_activity` VALUES (62, 1, 'Masuk ke Log Activity', '2024-09-07 13:23:27', NULL, NULL);
INSERT INTO `user_activity` VALUES (63, 1, 'Masuk ke Log Activity', '2024-09-07 13:24:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (64, 1, 'Masuk ke Log Activity', '2024-09-07 13:24:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (65, 1, 'Masuk ke Log Activity', '2024-09-07 13:24:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (66, 1, 'Masuk ke Restore', '2024-09-07 13:26:19', NULL, NULL);
INSERT INTO `user_activity` VALUES (67, 1, 'Masuk ke Log Activity', '2024-09-07 13:26:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (68, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:26:55', NULL, NULL);
INSERT INTO `user_activity` VALUES (69, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (70, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (71, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (72, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (73, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (74, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (75, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:49', NULL, NULL);
INSERT INTO `user_activity` VALUES (76, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:49', NULL, NULL);
INSERT INTO `user_activity` VALUES (77, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (78, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (79, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (80, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (81, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:31:52', NULL, NULL);
INSERT INTO `user_activity` VALUES (82, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:31:57', NULL, NULL);
INSERT INTO `user_activity` VALUES (83, 1, 'Masuk ke Restrore Edit', '2024-09-07 13:32:19', NULL, NULL);
INSERT INTO `user_activity` VALUES (84, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:36:18', NULL, NULL);
INSERT INTO `user_activity` VALUES (85, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:41', NULL, NULL);
INSERT INTO `user_activity` VALUES (86, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:41', NULL, NULL);
INSERT INTO `user_activity` VALUES (87, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (88, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (89, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (90, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (91, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:44', NULL, NULL);
INSERT INTO `user_activity` VALUES (92, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:44', NULL, NULL);
INSERT INTO `user_activity` VALUES (93, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (94, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (95, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (96, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (97, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:36:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (98, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:37:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (99, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (100, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (101, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (102, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (103, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (104, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (105, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (106, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (107, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (108, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (109, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (110, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (111, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:38:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (112, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:38:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (113, 1, 'Masuk ke Restrore Edit', '2024-09-07 13:38:19', NULL, NULL);
INSERT INTO `user_activity` VALUES (114, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:38:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (115, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (116, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (117, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (118, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (119, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (120, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (121, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (122, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (123, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (124, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (125, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (126, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:39', NULL, NULL);
INSERT INTO `user_activity` VALUES (127, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:40:39', NULL, NULL);
INSERT INTO `user_activity` VALUES (128, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:40:58', NULL, NULL);
INSERT INTO `user_activity` VALUES (129, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (130, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (131, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (132, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (133, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (134, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (135, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (136, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (137, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (138, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (139, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (140, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (141, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:41:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (142, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:41:18', NULL, NULL);
INSERT INTO `user_activity` VALUES (143, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:43:57', NULL, NULL);
INSERT INTO `user_activity` VALUES (144, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:43:58', NULL, NULL);
INSERT INTO `user_activity` VALUES (145, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:43:58', NULL, NULL);
INSERT INTO `user_activity` VALUES (146, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:43:59', NULL, NULL);
INSERT INTO `user_activity` VALUES (147, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:43:59', NULL, NULL);
INSERT INTO `user_activity` VALUES (148, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:00', NULL, NULL);
INSERT INTO `user_activity` VALUES (149, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:00', NULL, NULL);
INSERT INTO `user_activity` VALUES (150, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:01', NULL, NULL);
INSERT INTO `user_activity` VALUES (151, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:01', NULL, NULL);
INSERT INTO `user_activity` VALUES (152, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (153, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (154, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (155, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (156, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:44:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (157, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (158, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (159, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (160, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:24', NULL, NULL);
INSERT INTO `user_activity` VALUES (161, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:24', NULL, NULL);
INSERT INTO `user_activity` VALUES (162, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:25', NULL, NULL);
INSERT INTO `user_activity` VALUES (163, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:25', NULL, NULL);
INSERT INTO `user_activity` VALUES (164, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:26', NULL, NULL);
INSERT INTO `user_activity` VALUES (165, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:26', NULL, NULL);
INSERT INTO `user_activity` VALUES (166, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:27', NULL, NULL);
INSERT INTO `user_activity` VALUES (167, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:27', NULL, NULL);
INSERT INTO `user_activity` VALUES (168, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:27', NULL, NULL);
INSERT INTO `user_activity` VALUES (169, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:44:28', NULL, NULL);
INSERT INTO `user_activity` VALUES (170, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:31', NULL, NULL);
INSERT INTO `user_activity` VALUES (171, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:32', NULL, NULL);
INSERT INTO `user_activity` VALUES (172, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:32', NULL, NULL);
INSERT INTO `user_activity` VALUES (173, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:33', NULL, NULL);
INSERT INTO `user_activity` VALUES (174, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:33', NULL, NULL);
INSERT INTO `user_activity` VALUES (175, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (176, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (177, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (178, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (179, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (180, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (181, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (182, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:46:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (183, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:33', NULL, NULL);
INSERT INTO `user_activity` VALUES (184, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (185, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (186, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (187, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (188, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (189, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (190, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (191, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (192, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (193, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (194, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (195, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (196, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:39', NULL, NULL);
INSERT INTO `user_activity` VALUES (197, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:39', NULL, NULL);
INSERT INTO `user_activity` VALUES (198, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (199, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (200, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:41', NULL, NULL);
INSERT INTO `user_activity` VALUES (201, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:41', NULL, NULL);
INSERT INTO `user_activity` VALUES (202, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (203, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (204, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (205, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (206, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:44', NULL, NULL);
INSERT INTO `user_activity` VALUES (207, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:44', NULL, NULL);
INSERT INTO `user_activity` VALUES (208, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (209, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (210, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:49:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (211, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:51:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (212, 1, 'Masuk ke Restrore Edit', '2024-09-07 13:51:56', NULL, NULL);
INSERT INTO `user_activity` VALUES (213, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:52:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (214, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (215, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (216, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (217, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (218, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (219, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (220, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (221, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (222, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (223, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (224, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (225, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (226, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:56:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (227, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:56:31', NULL, NULL);
INSERT INTO `user_activity` VALUES (228, 1, 'Masuk ke Restrore Edit', '2024-09-07 13:56:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (229, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:56:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (230, 1, 'Masuk ke Restrore Edit', '2024-09-07 13:56:49', NULL, NULL);
INSERT INTO `user_activity` VALUES (231, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:57:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (232, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (233, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (234, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (235, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (236, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (237, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (238, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (239, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:49', NULL, NULL);
INSERT INTO `user_activity` VALUES (240, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:49', NULL, NULL);
INSERT INTO `user_activity` VALUES (241, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (242, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (243, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (244, 1, 'Masuk ke Edit Kelas', '2024-09-07 13:57:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (245, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:58:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (246, 1, 'Masuk ke Restrore Edit', '2024-09-07 13:58:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (247, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 13:58:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (248, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 14:01:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (249, 1, 'Masuk ke Log Activity', '2024-09-07 14:55:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (250, 1, 'Masuk ke Log Activity', '2024-09-07 14:56:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (251, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:13:39', NULL, NULL);
INSERT INTO `user_activity` VALUES (252, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:34:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (253, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:34:49', NULL, NULL);
INSERT INTO `user_activity` VALUES (254, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:35:18', NULL, NULL);
INSERT INTO `user_activity` VALUES (255, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:35:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (256, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:47:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (257, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:47:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (258, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:47:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (259, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:47:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (260, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:48:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (261, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:49:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (262, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 15:51:55', NULL, NULL);
INSERT INTO `user_activity` VALUES (263, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:01:57', NULL, NULL);
INSERT INTO `user_activity` VALUES (264, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:22:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (265, 1, 'Masuk ke Kelas', '2024-09-07 16:28:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (266, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:28:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (267, 1, 'Masuk ke Kelas', '2024-09-07 16:28:55', NULL, NULL);
INSERT INTO `user_activity` VALUES (268, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:01', NULL, NULL);
INSERT INTO `user_activity` VALUES (269, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (270, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (271, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (272, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (273, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (274, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (275, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (276, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (277, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (278, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (279, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (280, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:29:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (281, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:29:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (282, 1, 'Masuk ke Kelas', '2024-09-07 16:30:01', NULL, NULL);
INSERT INTO `user_activity` VALUES (283, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (284, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (285, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (286, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (287, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (288, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (289, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (290, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (291, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (292, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (293, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (294, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (295, 1, 'Masuk ke Form Izin Kelas', '2024-09-07 16:30:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (296, 1, 'Masuk ke Kelas', '2024-09-07 16:31:00', NULL, NULL);
INSERT INTO `user_activity` VALUES (297, 1, 'Masuk ke Settings', '2024-09-07 16:31:19', NULL, NULL);
INSERT INTO `user_activity` VALUES (298, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:31:20', NULL, NULL);
INSERT INTO `user_activity` VALUES (299, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:35:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (300, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:37:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (301, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:37:26', NULL, NULL);
INSERT INTO `user_activity` VALUES (302, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:37:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (303, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:39:56', NULL, NULL);
INSERT INTO `user_activity` VALUES (304, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:41:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (305, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:42:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (306, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 16:42:20', NULL, NULL);
INSERT INTO `user_activity` VALUES (307, 5, 'Masuk ke Settings', '2024-09-07 18:10:58', NULL, NULL);
INSERT INTO `user_activity` VALUES (308, 5, 'Masuk ke Settings', '2024-09-07 18:11:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (309, 5, 'Masuk ke Settings', '2024-09-07 18:28:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (310, 5, 'Masuk ke Settings', '2024-09-07 18:28:16', NULL, NULL);
INSERT INTO `user_activity` VALUES (311, 5, 'Masuk ke Settings', '2024-09-07 18:28:32', NULL, NULL);
INSERT INTO `user_activity` VALUES (312, 1, 'Masuk ke Kelas', '2024-09-07 20:16:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (313, 1, 'Masuk ke Settings', '2024-09-07 20:17:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (314, 1, 'Masuk ke Settings', '2024-09-07 20:22:29', NULL, NULL);
INSERT INTO `user_activity` VALUES (315, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 20:22:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (316, 1, 'Masuk ke Kelas', '2024-09-07 20:23:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (317, 1, 'Masuk ke Menu Kelas Admin', '2024-09-07 20:23:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (318, 1, 'Masuk ke Restore', '2024-09-07 20:23:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (319, 1, 'Masuk ke Settings', '2024-09-07 20:24:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (320, 1, 'Masuk ke Settings', '2024-09-07 20:25:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (321, 1, 'Masuk ke Settings', '2024-09-07 20:25:41', NULL, NULL);
INSERT INTO `user_activity` VALUES (322, 1, 'Masuk ke Settings', '2024-09-07 20:26:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (323, 1, 'Masuk ke Settings', '2024-09-07 20:26:18', NULL, NULL);
INSERT INTO `user_activity` VALUES (324, 1, 'Masuk ke Settings', '2024-09-07 20:27:33', NULL, NULL);
INSERT INTO `user_activity` VALUES (325, 1, 'Masuk ke Menu Login', '2024-09-07 20:35:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (326, 1, 'Masuk ke Menu Login', '2024-09-07 20:35:52', NULL, NULL);
INSERT INTO `user_activity` VALUES (327, 1, 'Masuk ke Menu Login', '2024-09-07 20:36:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (328, 3, 'Masuk ke Menu Login', '2024-09-07 20:46:55', NULL, NULL);
INSERT INTO `user_activity` VALUES (329, 3, 'Masuk ke Menu Login', '2024-09-07 20:49:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (330, 3, 'Masuk ke Menu Login', '2024-09-07 20:49:41', NULL, NULL);
INSERT INTO `user_activity` VALUES (331, 5, 'Masuk ke Menu Login', '2024-09-07 20:53:28', NULL, NULL);
INSERT INTO `user_activity` VALUES (332, 1, 'Masuk ke Menu Login', '2024-09-07 20:55:01', NULL, NULL);
INSERT INTO `user_activity` VALUES (333, 3, 'Masuk ke Menu Kelas Admin', '2024-09-07 20:55:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (334, 3, 'Masuk ke Menu Kelas Admin', '2024-09-07 20:55:56', NULL, NULL);
INSERT INTO `user_activity` VALUES (335, 3, 'Masuk ke Menu Login', '2024-09-07 21:05:24', NULL, NULL);
INSERT INTO `user_activity` VALUES (336, 3, 'Masuk ke Menu Login', '2024-09-07 21:05:25', NULL, NULL);
INSERT INTO `user_activity` VALUES (337, 3, 'Masuk ke Settings', '2024-09-07 21:14:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (338, 3, 'Masuk ke Menu Login', '2024-09-07 21:23:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (339, 3, 'Masuk ke Menu Login', '2024-09-07 21:23:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (340, 1, 'Masuk ke Menu Login', '2024-09-07 21:52:18', NULL, NULL);
INSERT INTO `user_activity` VALUES (341, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 21:52:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (342, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 21:53:20', NULL, NULL);
INSERT INTO `user_activity` VALUES (343, 5, 'Masuk ke Menu Kelas Admin', '2024-09-07 21:53:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (344, 5, 'Masuk ke Menu Login', '2024-09-07 21:54:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (345, 5, 'Masuk ke Menu Login', '2024-09-07 21:55:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (346, 5, 'Masuk ke Menu Login', '2024-09-07 21:56:21', NULL, NULL);
INSERT INTO `user_activity` VALUES (347, 5, 'Masuk ke Kelas', '2024-09-07 21:57:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (348, 5, 'Masuk ke Menu Login', '2024-09-07 21:58:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (349, 1, 'Masuk ke Menu Login', '2024-09-07 22:03:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (350, 1, 'Masuk ke Menu Login', '2024-09-07 22:06:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (351, 1, 'Masuk ke Settings', '2024-09-07 22:07:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (352, 1, 'Masuk ke Laporan', '2024-09-07 22:07:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (353, 1, 'Masuk ke Laporan', '2024-09-07 22:08:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (354, 1, 'Masuk ke Laporan', '2024-09-07 22:09:02', NULL, NULL);
INSERT INTO `user_activity` VALUES (355, 1, 'Masuk ke Laporan', '2024-09-07 22:09:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (356, 1, 'Masuk ke Menu Login', '2024-09-07 22:14:03', NULL, NULL);
INSERT INTO `user_activity` VALUES (357, 1, 'Masuk ke Menu Login', '2024-09-07 22:14:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (358, 5, 'Masuk ke Menu Login', '2024-09-07 22:16:29', NULL, NULL);
INSERT INTO `user_activity` VALUES (359, 1, 'Masuk ke Form Buat Kelas', '2024-09-07 22:53:53', NULL, NULL);
INSERT INTO `user_activity` VALUES (360, NULL, 'Masuk ke Menu Login', '2024-09-07 23:11:26', NULL, NULL);
INSERT INTO `user_activity` VALUES (361, NULL, 'Masuk ke Menu Login', '2024-09-07 23:12:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (362, 1, 'Masuk ke Menu Login', '2024-09-07 23:12:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (363, 1, 'Masuk ke Menu Login', '2024-09-07 23:13:17', NULL, NULL);
INSERT INTO `user_activity` VALUES (364, 1, 'Masuk ke Menu Login', '2024-09-07 23:13:26', NULL, NULL);
INSERT INTO `user_activity` VALUES (365, 1, 'Masuk ke Menu Login', '2024-09-07 23:14:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (366, 1, 'Masuk ke Menu Login', '2024-09-07 23:14:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (367, 1, 'Masuk ke Settings', '2024-09-07 23:15:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (368, 1, 'Masuk ke Settings', '2024-09-07 23:15:31', NULL, NULL);
INSERT INTO `user_activity` VALUES (369, NULL, 'Masuk ke Menu Login', '2024-09-08 19:29:56', NULL, NULL);
INSERT INTO `user_activity` VALUES (370, 1, 'Masuk ke Kelas', '2024-09-08 19:37:29', NULL, NULL);
INSERT INTO `user_activity` VALUES (371, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (372, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (373, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (374, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (375, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (376, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (377, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (378, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (379, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (380, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (381, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (382, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (383, 1, 'Masuk ke Form Izin Kelas', '2024-09-08 19:39:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (384, 1, 'Masuk ke Kelas', '2024-09-08 19:40:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (385, 1, 'Masuk ke Menu Kelas Admin', '2024-09-08 19:40:54', NULL, NULL);
INSERT INTO `user_activity` VALUES (386, 1, 'Masuk ke Restore', '2024-09-08 19:50:30', NULL, NULL);
INSERT INTO `user_activity` VALUES (387, 1, 'Masuk ke Restrore Edit', '2024-09-08 19:56:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (388, 1, 'Masuk ke Restrore Edit', '2024-09-08 19:58:17', NULL, NULL);
INSERT INTO `user_activity` VALUES (389, 1, 'Masuk ke Laporan', '2024-09-08 20:00:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (390, 1, 'Masuk ke Laporan', '2024-09-08 20:02:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (391, 1, 'Masuk ke Laporan', '2024-09-08 20:04:21', NULL, NULL);
INSERT INTO `user_activity` VALUES (392, 1, 'Masuk ke Settings', '2024-09-08 20:04:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (393, 1, 'Masuk ke Settings', '2024-09-08 20:05:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (394, 1, 'Masuk ke Log Activity', '2024-09-08 20:07:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (395, 1, 'Masuk ke Log Activity', '2024-09-08 20:07:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (396, NULL, 'Masuk ke Menu Login', '2024-09-08 22:09:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (397, 1, 'Masuk ke Menu Login', '2024-09-08 22:12:34', NULL, NULL);
INSERT INTO `user_activity` VALUES (398, 1, 'Masuk ke Menu Login', '2024-09-08 22:13:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (399, 5, 'Masuk ke Menu Login', '2024-09-08 22:14:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (400, 1, 'Masuk ke User', '2024-09-08 22:14:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (401, 1, 'Masuk ke User', '2024-09-08 22:16:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (402, 1, 'Masuk ke User', '2024-09-08 22:17:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (403, 1, 'Masuk ke User', '2024-09-08 22:23:33', NULL, NULL);
INSERT INTO `user_activity` VALUES (404, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (405, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:44', NULL, NULL);
INSERT INTO `user_activity` VALUES (406, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (407, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (408, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (409, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (410, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (411, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (412, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:49', NULL, NULL);
INSERT INTO `user_activity` VALUES (413, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:49', NULL, NULL);
INSERT INTO `user_activity` VALUES (414, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (415, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (416, 1, 'Masuk ke Edit Kelas', '2024-09-08 22:23:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (417, 1, 'Masuk ke User', '2024-09-08 22:24:01', NULL, NULL);
INSERT INTO `user_activity` VALUES (418, 1, 'Masuk ke Edit User', '2024-09-08 22:24:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (419, 1, 'Masuk ke Edit User', '2024-09-08 22:24:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (420, 1, 'Masuk ke Edit User', '2024-09-08 22:24:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (421, 1, 'Masuk ke Edit User', '2024-09-08 22:24:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (422, 1, 'Masuk ke Edit User', '2024-09-08 22:24:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (423, 1, 'Masuk ke Edit User', '2024-09-08 22:24:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (424, 1, 'Masuk ke Edit User', '2024-09-08 22:24:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (425, 1, 'Masuk ke Edit User', '2024-09-08 22:24:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (426, 1, 'Masuk ke Edit User', '2024-09-08 22:24:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (427, 1, 'Masuk ke Edit User', '2024-09-08 22:24:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (428, 1, 'Masuk ke Edit User', '2024-09-08 22:24:16', NULL, NULL);
INSERT INTO `user_activity` VALUES (429, 1, 'Masuk ke Edit User', '2024-09-08 22:24:17', NULL, NULL);
INSERT INTO `user_activity` VALUES (430, 1, 'Masuk ke Edit User', '2024-09-08 22:24:17', NULL, NULL);
INSERT INTO `user_activity` VALUES (431, 1, 'Masuk ke Edit User', '2024-09-08 22:26:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (432, 1, 'Masuk ke Edit User', '2024-09-08 22:26:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (433, 1, 'Masuk ke Edit User', '2024-09-08 22:26:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (434, 1, 'Masuk ke Edit User', '2024-09-08 22:26:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (435, 1, 'Masuk ke Edit User', '2024-09-08 22:26:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (436, 1, 'Masuk ke Edit User', '2024-09-08 22:26:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (437, 1, 'Masuk ke Edit User', '2024-09-08 22:26:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (438, 1, 'Masuk ke Edit User', '2024-09-08 22:26:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (439, 1, 'Masuk ke Edit User', '2024-09-08 22:26:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (440, 1, 'Masuk ke Edit User', '2024-09-08 22:26:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (441, 1, 'Masuk ke Edit User', '2024-09-08 22:26:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (442, 1, 'Masuk ke Edit User', '2024-09-08 22:26:16', NULL, NULL);
INSERT INTO `user_activity` VALUES (443, 1, 'Masuk ke Edit User', '2024-09-08 22:26:16', NULL, NULL);
INSERT INTO `user_activity` VALUES (444, 1, 'Masuk ke User', '2024-09-08 22:28:26', NULL, NULL);
INSERT INTO `user_activity` VALUES (445, 1, 'Masuk ke Edit User', '2024-09-08 22:28:35', NULL, NULL);
INSERT INTO `user_activity` VALUES (446, 1, 'Masuk ke Edit User', '2024-09-08 22:28:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (447, 1, 'Masuk ke Edit User', '2024-09-08 22:28:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (448, 1, 'Masuk ke Edit User', '2024-09-08 22:28:38', NULL, NULL);
INSERT INTO `user_activity` VALUES (449, 1, 'Masuk ke Edit User', '2024-09-08 22:28:39', NULL, NULL);
INSERT INTO `user_activity` VALUES (450, 1, 'Masuk ke Edit User', '2024-09-08 22:28:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (451, 1, 'Masuk ke Edit User', '2024-09-08 22:28:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (452, 1, 'Masuk ke Edit User', '2024-09-08 22:28:41', NULL, NULL);
INSERT INTO `user_activity` VALUES (453, 1, 'Masuk ke Edit User', '2024-09-08 22:28:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (454, 1, 'Masuk ke Edit User', '2024-09-08 22:28:42', NULL, NULL);
INSERT INTO `user_activity` VALUES (455, 1, 'Masuk ke Edit User', '2024-09-08 22:28:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (456, 1, 'Masuk ke Edit User', '2024-09-08 22:28:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (457, 1, 'Masuk ke Edit User', '2024-09-08 22:28:44', NULL, NULL);
INSERT INTO `user_activity` VALUES (458, 1, 'Masuk ke Edit User', '2024-09-08 22:29:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (459, 1, 'Masuk ke Edit User', '2024-09-08 22:29:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (460, 1, 'Masuk ke Edit User', '2024-09-08 22:29:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (461, 1, 'Masuk ke Edit User', '2024-09-08 22:29:08', NULL, NULL);
INSERT INTO `user_activity` VALUES (462, 1, 'Masuk ke Edit User', '2024-09-08 22:29:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (463, 1, 'Masuk ke Edit User', '2024-09-08 22:29:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (464, 1, 'Masuk ke Edit User', '2024-09-08 22:29:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (465, 1, 'Masuk ke Edit User', '2024-09-08 22:29:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (466, 1, 'Masuk ke Edit User', '2024-09-08 22:29:11', NULL, NULL);
INSERT INTO `user_activity` VALUES (467, 1, 'Masuk ke Edit User', '2024-09-08 22:29:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (468, 1, 'Masuk ke Edit User', '2024-09-08 22:29:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (469, 1, 'Masuk ke Edit User', '2024-09-08 22:29:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (470, 1, 'Masuk ke Edit User', '2024-09-08 22:29:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (471, 1, 'Masuk ke User', '2024-09-08 22:29:21', NULL, NULL);
INSERT INTO `user_activity` VALUES (472, 1, 'Masuk ke User', '2024-09-08 22:30:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (473, 1, 'Masuk ke User', '2024-09-08 22:32:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (474, 1, 'Masuk ke User', '2024-09-08 22:32:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (475, 1, 'Masuk ke User', '2024-09-08 22:36:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (476, 1, 'Masuk ke User', '2024-09-08 22:40:27', NULL, NULL);
INSERT INTO `user_activity` VALUES (477, 1, 'Masuk ke User', '2024-09-08 22:42:57', NULL, NULL);
INSERT INTO `user_activity` VALUES (478, 1, 'Masuk ke User', '2024-09-08 22:46:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (479, 1, 'Reset password', '2024-09-08 22:47:05', NULL, NULL);
INSERT INTO `user_activity` VALUES (480, 1, 'Masuk ke User', '2024-09-08 22:47:31', NULL, NULL);
INSERT INTO `user_activity` VALUES (481, 1, 'Masuk ke User', '2024-09-08 22:50:27', NULL, NULL);
INSERT INTO `user_activity` VALUES (482, NULL, 'Masuk ke Menu Login', '2024-09-09 09:50:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (483, 1, 'Masuk ke Kelas', '2024-09-09 09:51:56', NULL, NULL);
INSERT INTO `user_activity` VALUES (484, 1, 'Masuk ke Kelas', '2024-09-09 09:53:48', NULL, NULL);
INSERT INTO `user_activity` VALUES (485, 1, 'Masuk ke User', '2024-09-09 09:57:45', NULL, NULL);
INSERT INTO `user_activity` VALUES (486, 1, 'Masuk ke Menu Login', '2024-09-09 09:58:40', NULL, NULL);
INSERT INTO `user_activity` VALUES (487, 3, 'Masuk ke Menu Login', '2024-09-09 10:01:26', NULL, NULL);
INSERT INTO `user_activity` VALUES (488, 3, 'Masuk ke Kelas', '2024-09-09 10:02:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (489, 3, 'Masuk ke Kelas', '2024-09-09 10:02:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (490, 3, 'Masuk ke Kelas', '2024-09-09 10:02:30', NULL, NULL);
INSERT INTO `user_activity` VALUES (491, 3, 'Masuk ke Menu Login', '2024-09-09 10:02:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (492, 3, 'Masuk ke Kelas', '2024-09-09 10:03:32', NULL, NULL);
INSERT INTO `user_activity` VALUES (493, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (494, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:51', NULL, NULL);
INSERT INTO `user_activity` VALUES (495, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:52', NULL, NULL);
INSERT INTO `user_activity` VALUES (496, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:53', NULL, NULL);
INSERT INTO `user_activity` VALUES (497, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:53', NULL, NULL);
INSERT INTO `user_activity` VALUES (498, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:54', NULL, NULL);
INSERT INTO `user_activity` VALUES (499, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:55', NULL, NULL);
INSERT INTO `user_activity` VALUES (500, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:55', NULL, NULL);
INSERT INTO `user_activity` VALUES (501, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:56', NULL, NULL);
INSERT INTO `user_activity` VALUES (502, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:56', NULL, NULL);
INSERT INTO `user_activity` VALUES (503, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:57', NULL, NULL);
INSERT INTO `user_activity` VALUES (504, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:58', NULL, NULL);
INSERT INTO `user_activity` VALUES (505, 3, 'Masuk ke Form Izin Kelas', '2024-09-09 10:03:58', NULL, NULL);
INSERT INTO `user_activity` VALUES (506, 3, 'Masuk ke Kelas', '2024-09-09 10:04:31', NULL, NULL);
INSERT INTO `user_activity` VALUES (507, 3, 'Masuk ke Menu Login', '2024-09-09 10:04:43', NULL, NULL);
INSERT INTO `user_activity` VALUES (508, 1, 'Masuk ke Menu Kelas Admin', '2024-09-09 10:05:06', NULL, NULL);
INSERT INTO `user_activity` VALUES (509, 1, 'Masuk ke Menu Kelas Admin', '2024-09-09 10:05:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (510, 1, 'Masuk ke Menu Kelas Admin', '2024-09-09 10:05:37', NULL, NULL);
INSERT INTO `user_activity` VALUES (511, 1, 'Masuk ke Menu Kelas Admin', '2024-09-09 10:05:58', NULL, NULL);
INSERT INTO `user_activity` VALUES (512, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:10', NULL, NULL);
INSERT INTO `user_activity` VALUES (513, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (514, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:12', NULL, NULL);
INSERT INTO `user_activity` VALUES (515, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:13', NULL, NULL);
INSERT INTO `user_activity` VALUES (516, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (517, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:14', NULL, NULL);
INSERT INTO `user_activity` VALUES (518, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (519, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:15', NULL, NULL);
INSERT INTO `user_activity` VALUES (520, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:16', NULL, NULL);
INSERT INTO `user_activity` VALUES (521, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:17', NULL, NULL);
INSERT INTO `user_activity` VALUES (522, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:17', NULL, NULL);
INSERT INTO `user_activity` VALUES (523, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:18', NULL, NULL);
INSERT INTO `user_activity` VALUES (524, 1, 'Masuk ke Edit Kelas', '2024-09-09 10:06:18', NULL, NULL);
INSERT INTO `user_activity` VALUES (525, 1, 'Masuk ke Menu Kelas Admin', '2024-09-09 10:06:36', NULL, NULL);
INSERT INTO `user_activity` VALUES (526, 1, 'Masuk ke Form Buat Kelas', '2024-09-09 10:06:46', NULL, NULL);
INSERT INTO `user_activity` VALUES (527, 1, 'Masuk ke Form Buat Kelas', '2024-09-09 10:06:47', NULL, NULL);
INSERT INTO `user_activity` VALUES (528, 1, 'Masuk ke Laporan', '2024-09-09 10:07:04', NULL, NULL);
INSERT INTO `user_activity` VALUES (529, 1, 'Masuk ke Laporan', '2024-09-09 10:07:26', NULL, NULL);
INSERT INTO `user_activity` VALUES (530, 1, 'Masuk ke Settings', '2024-09-09 10:07:33', NULL, NULL);
INSERT INTO `user_activity` VALUES (531, 1, 'Masuk ke Log Activity', '2024-09-09 10:07:50', NULL, NULL);
INSERT INTO `user_activity` VALUES (532, 1, 'Masuk ke Restore', '2024-09-09 10:08:07', NULL, NULL);
INSERT INTO `user_activity` VALUES (533, 1, 'Masuk ke Restrore Edit', '2024-09-09 10:08:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (534, 1, 'Masuk ke Kelas', '2024-09-09 10:10:09', NULL, NULL);
INSERT INTO `user_activity` VALUES (535, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:18', NULL, NULL);
INSERT INTO `user_activity` VALUES (536, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:19', NULL, NULL);
INSERT INTO `user_activity` VALUES (537, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:19', NULL, NULL);
INSERT INTO `user_activity` VALUES (538, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:20', NULL, NULL);
INSERT INTO `user_activity` VALUES (539, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:20', NULL, NULL);
INSERT INTO `user_activity` VALUES (540, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:21', NULL, NULL);
INSERT INTO `user_activity` VALUES (541, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (542, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:22', NULL, NULL);
INSERT INTO `user_activity` VALUES (543, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:23', NULL, NULL);
INSERT INTO `user_activity` VALUES (544, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:24', NULL, NULL);
INSERT INTO `user_activity` VALUES (545, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:24', NULL, NULL);
INSERT INTO `user_activity` VALUES (546, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:25', NULL, NULL);
INSERT INTO `user_activity` VALUES (547, 1, 'Masuk ke Form Izin Kelas', '2024-09-09 10:10:25', NULL, NULL);
INSERT INTO `user_activity` VALUES (548, 1, 'Masuk ke Kelas', '2024-09-09 10:10:37', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
