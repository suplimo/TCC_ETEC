

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `obs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `obs`) VALUES
(1, 'Tutorial 1G', '#FFD700', '2023-10-16 10:05:00', '2023-10-16 11:05:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(2, 'Tutorial 2C', '#FF4500', '2023-10-18 10:06:00', '2023-10-18 16:06:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(3, 'Tutorial 3K', '#228B22', '2023-10-20 11:07:00', '2023-10-20 12:07:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(4, 'Tutorial 4C', '#A020F0', '2023-10-23 11:08:00', '2023-10-23 11:08:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(5, 'Tutorial 5', '#40E0D0', '2023-10-25 10:09:00', '2023-10-26 11:09:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(6, 'Tutorial 6C', '#0071c5', '2023-10-27 10:10:00', '2023-10-27 11:10:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(7, 'Tutorial 7', '#A020F0', '2023-10-30 10:05:00', '2023-10-30 11:05:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(8, 'Tutorial 8', '#8B0000', '2023-11-01 10:00:00', '2023-11-01 11:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(9, 'Tutorial 9', '#FF4500', '2023-11-03 10:01:00', '2023-11-03 10:01:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(10, 'Tutorial 10', '#228B22', '2023-11-06 10:01:00', '2023-11-06 10:01:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(11, 'Tutorial 11', '#8B4513', '2023-11-08 10:01:00', '2023-11-08 10:01:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(12, 'Tutorial 12', '#FFD700', '2023-11-10 10:01:00', '2023-11-10 10:01:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(13, 'Tutorial 13', '#40E0D0', '2023-11-13 00:00:00', '2023-11-14 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(14, 'Tutorial 14', '#436EEE', '2023-11-15 10:00:00', '2023-11-16 10:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(15, 'Tutorial 15', '#1C1C1C', '2023-11-17 10:00:00', '2023-11-17 10:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(16, 'Tutorial 16', '#228B22', '2023-11-20 10:00:00', '2023-11-20 10:30:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae augue eget tortor finibus laoreet ut eget dui.'),
(17, 'Tutorial 17', '#FF4500', '2023-11-22 10:00:00', '2023-11-22 11:00:00', 'In fringilla augue eu est porta mattis.'),
(18, 'Tutorial 18', '#0071c5', '2023-11-24 10:00:00', '2023-11-24 11:00:00', '18 Quisque rutrum, quam eget aliquet laoreet, sem metus vulputate lorem, sit amet congue ipsum.'),
(19, 'Tutorial 21', '#228B22', '2023-12-01 10:00:00', '2023-12-01 11:00:00', 'Donec non cursus dui. Etiam eu tellus pharetra, eleifend diam et, egestas ipsum. Nam non urna eget erat suscipit dapibus. '),
(20, 'Tutorial 19', '#8B0000', '2023-11-27 10:00:00', '2023-11-27 11:00:00', 'Aenean venenatis aliquam leo maximus lacinia.');
COMMIT;
