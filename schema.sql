-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table chess.board
DROP TABLE IF EXISTS `board`;
CREATE TABLE IF NOT EXISTS `board` (
  `x` tinyint(1) NOT NULL,
  `y` tinyint(1) NOT NULL,
  `b_color` enum('B','W') NOT NULL,
  `piece_color` enum('W','B') DEFAULT NULL,
  `piece` enum('K','Q','R','B','N','P') DEFAULT NULL,
  PRIMARY KEY (`y`,`x`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table chess.board: ~64 rows (approximately)
INSERT INTO `board` (`x`, `y`, `b_color`, `piece_color`, `piece`) VALUES
	(1, 1, 'B', 'W', 'R'),
	(2, 1, 'W', 'W', 'N'),
	(3, 1, 'B', 'W', 'B'),
	(4, 1, 'W', 'W', 'Q'),
	(5, 1, 'B', 'W', 'K'),
	(6, 1, 'W', 'W', 'B'),
	(7, 1, 'B', 'W', 'N'),
	(8, 1, 'W', 'W', 'R'),
	(1, 2, 'W', 'W', 'P'),
	(2, 2, 'B', 'W', 'P'),
	(3, 2, 'W', 'W', 'P'),
	(4, 2, 'B', 'W', 'P'),
	(5, 2, 'W', 'W', 'P'),
	(6, 2, 'B', 'W', 'P'),
	(7, 2, 'W', 'W', 'P'),
	(8, 2, 'B', 'W', 'P'),
	(1, 3, 'B', NULL, NULL),
	(2, 3, 'W', NULL, NULL),
	(3, 3, 'B', NULL, NULL),
	(4, 3, 'W', NULL, NULL),
	(5, 3, 'B', NULL, NULL),
	(6, 3, 'W', NULL, NULL),
	(7, 3, 'B', NULL, NULL),
	(8, 3, 'W', NULL, NULL),
	(1, 4, 'W', NULL, NULL),
	(2, 4, 'B', NULL, NULL),
	(3, 4, 'W', NULL, NULL),
	(4, 4, 'B', NULL, NULL),
	(5, 4, 'W', NULL, NULL),
	(6, 4, 'B', NULL, NULL),
	(7, 4, 'W', NULL, NULL),
	(8, 4, 'B', NULL, NULL),
	(1, 5, 'B', NULL, NULL),
	(2, 5, 'W', NULL, NULL),
	(3, 5, 'B', NULL, NULL),
	(4, 5, 'W', NULL, NULL),
	(5, 5, 'B', NULL, NULL),
	(6, 5, 'W', NULL, NULL),
	(7, 5, 'B', NULL, NULL),
	(8, 5, 'W', NULL, NULL),
	(1, 6, 'W', NULL, NULL),
	(2, 6, 'B', NULL, NULL),
	(3, 6, 'W', NULL, NULL),
	(4, 6, 'B', NULL, NULL),
	(5, 6, 'W', NULL, NULL),
	(6, 6, 'B', NULL, NULL),
	(7, 6, 'W', NULL, NULL),
	(8, 6, 'B', NULL, NULL),
	(1, 7, 'B', 'B', 'P'),
	(2, 7, 'W', 'B', 'P'),
	(3, 7, 'B', 'B', 'P'),
	(4, 7, 'W', 'B', 'P'),
	(5, 7, 'B', 'B', 'P'),
	(6, 7, 'W', 'B', 'P'),
	(7, 7, 'B', 'B', 'P'),
	(8, 7, 'W', 'B', 'P'),
	(1, 8, 'W', 'B', 'R'),
	(2, 8, 'B', 'B', 'N'),
	(3, 8, 'W', 'B', 'B'),
	(4, 8, 'B', 'B', 'Q'),
	(5, 8, 'W', 'B', 'K'),
	(6, 8, 'B', 'B', 'B'),
	(7, 8, 'W', 'B', 'N'),
	(8, 8, 'B', 'B', 'R');

-- Dumping structure for table chess.board_empty
DROP TABLE IF EXISTS `board_empty`;
CREATE TABLE IF NOT EXISTS `board_empty` (
  `x` tinyint(1) NOT NULL,
  `y` tinyint(1) NOT NULL,
  `b_color` enum('B','W') NOT NULL,
  `piece_color` enum('W','B') DEFAULT NULL,
  `piece` enum('K','Q','R','B','N','P') DEFAULT NULL,
  PRIMARY KEY (`y`,`x`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table chess.board_empty: ~64 rows (approximately)
INSERT INTO `board_empty` (`x`, `y`, `b_color`, `piece_color`, `piece`) VALUES
	(1, 1, 'B', 'W', 'R'),
	(2, 1, 'W', 'W', 'N'),
	(3, 1, 'B', 'W', 'B'),
	(4, 1, 'W', 'W', 'Q'),
	(5, 1, 'B', 'W', 'K'),
	(6, 1, 'W', 'W', 'B'),
	(7, 1, 'B', 'W', 'N'),
	(8, 1, 'W', 'W', 'R'),
	(1, 2, 'W', 'W', 'P'),
	(2, 2, 'B', 'W', 'P'),
	(3, 2, 'W', 'W', 'P'),
	(4, 2, 'B', 'W', 'P'),
	(5, 2, 'W', 'W', 'P'),
	(6, 2, 'B', 'W', 'P'),
	(7, 2, 'W', 'W', 'P'),
	(8, 2, 'B', 'W', 'P'),
	(1, 3, 'B', NULL, NULL),
	(2, 3, 'W', NULL, NULL),
	(3, 3, 'B', NULL, NULL),
	(4, 3, 'W', NULL, NULL),
	(5, 3, 'B', NULL, NULL),
	(6, 3, 'W', NULL, NULL),
	(7, 3, 'B', NULL, NULL),
	(8, 3, 'W', NULL, NULL),
	(1, 4, 'W', NULL, NULL),
	(2, 4, 'B', NULL, NULL),
	(3, 4, 'W', NULL, NULL),
	(4, 4, 'B', NULL, NULL),
	(5, 4, 'W', NULL, NULL),
	(6, 4, 'B', NULL, NULL),
	(7, 4, 'W', NULL, NULL),
	(8, 4, 'B', NULL, NULL),
	(1, 5, 'B', NULL, NULL),
	(2, 5, 'W', NULL, NULL),
	(3, 5, 'B', NULL, NULL),
	(4, 5, 'W', NULL, NULL),
	(5, 5, 'B', NULL, NULL),
	(6, 5, 'W', NULL, NULL),
	(7, 5, 'B', NULL, NULL),
	(8, 5, 'W', NULL, NULL),
	(1, 6, 'W', NULL, NULL),
	(2, 6, 'B', NULL, NULL),
	(3, 6, 'W', NULL, NULL),
	(4, 6, 'B', NULL, NULL),
	(5, 6, 'W', NULL, NULL),
	(6, 6, 'B', NULL, NULL),
	(7, 6, 'W', NULL, NULL),
	(8, 6, 'B', NULL, NULL),
	(1, 7, 'B', 'B', 'P'),
	(2, 7, 'W', 'B', 'P'),
	(3, 7, 'B', 'B', 'P'),
	(4, 7, 'W', 'B', 'P'),
	(5, 7, 'B', 'B', 'P'),
	(6, 7, 'W', 'B', 'P'),
	(7, 7, 'B', 'B', 'P'),
	(8, 7, 'W', 'B', 'P'),
	(1, 8, 'W', 'B', 'R'),
	(2, 8, 'B', 'B', 'N'),
	(3, 8, 'W', 'B', 'B'),
	(4, 8, 'B', 'B', 'Q'),
	(5, 8, 'W', 'B', 'K'),
	(6, 8, 'B', 'B', 'B'),
	(7, 8, 'W', 'B', 'N'),
	(8, 8, 'B', 'B', 'R');

-- Dumping structure for procedure chess.clean_board
DROP PROCEDURE IF EXISTS `clean_board`;
DELIMITER //
CREATE PROCEDURE `clean_board`()
BEGIN
	REPLACE INTO board SELECT * FROM board_empty;
END//
DELIMITER ;

-- Dumping structure for table chess.game_status
DROP TABLE IF EXISTS `game_status`;
CREATE TABLE IF NOT EXISTS `game_status` (
  `status` enum('not active','initialized','started','ended','aborded') NOT NULL DEFAULT 'not active',
  `p_turn` enum('W','B') DEFAULT NULL,
  `result` enum('B','W','D') DEFAULT NULL,
  `last_change` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table chess.game_status: ~0 rows (approximately)
INSERT INTO `game_status` (`status`, `p_turn`, `result`, `last_change`) VALUES
	('started', 'W', 'D', '2022-11-28 18:39:59');

-- Dumping structure for procedure chess.move_piece
DROP PROCEDURE IF EXISTS `move_piece`;
DELIMITER //
CREATE PROCEDURE `move_piece`(x1 tinyint,y1 tinyint,x2 tinyint,y2 tinyint)
BEGIN
	declare  p, p_color char;
	
	select  piece, piece_color into p, p_color FROM `board` WHERE X=x1 AND Y=y1;
	
	update board
	set piece=p, piece_color=p_color
	where x=x2 and y=y2;
	
	UPDATE board
	SET piece=null,piece_color=null
	WHERE X=x1 AND Y=y1;
	update game_status set p_turn=if(p_color='W','B','W');
	
    END//
DELIMITER ;

-- Dumping structure for table chess.players
DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `username` varchar(20) DEFAULT NULL,
  `piece_color` enum('B','W') NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `last_action` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`piece_color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table chess.players: ~2 rows (approximately)
INSERT INTO `players` (`username`, `piece_color`, `token`, `last_action`) VALUES
	('qqqqqq', 'B', '8599a2efe05697622caeddae84507ee3', '2022-11-28 18:16:51'),
	('aaaa', 'W', '05da4297eecc648e840b6d3bfa772adc', '2022-11-28 17:16:54');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
