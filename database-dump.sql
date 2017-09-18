SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fisiere
-- ----------------------------
DROP TABLE IF EXISTS `fisiere`;
CREATE TABLE `fisiere`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `externalid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `locatie` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` datetime(0) DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `accesari` int(255) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;