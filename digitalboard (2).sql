-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2021 pada 03.42
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalboard`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `id_running` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` text NOT NULL,
  `cb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `checklist`
--

INSERT INTO `checklist` (`id`, `id_location`, `id_running`, `date`, `reason`, `cb`) VALUES
(1011, 76, 5, '2021-03-02', 'Oke', 1),
(1012, 77, 5, '2021-03-02', '', 0),
(1013, 78, 5, '2021-03-02', '', 1),
(1014, 79, 5, '2021-03-02', '', 0),
(1015, 38, 9, '2021-03-02', '', 0),
(1016, 43, 9, '2021-03-02', '', 0),
(1017, 64, 9, '2021-03-02', '', 0),
(1018, 65, 9, '2021-03-02', '', 0),
(1019, 69, 9, '2021-03-02', '', 0),
(1020, 78, 9, '2021-03-02', '', 0),
(1021, 86, 9, '2021-03-02', '', 0),
(1022, 30, 13, '2021-03-02', '', 0),
(1023, 31, 13, '2021-03-02', '', 0),
(1024, 32, 13, '2021-03-02', '', 0),
(1025, 33, 13, '2021-03-02', '', 0),
(1026, 34, 13, '2021-03-02', '', 0),
(1027, 35, 13, '2021-03-02', '', 0),
(1028, 76, 5, '2021-03-04', '', 1),
(1029, 77, 5, '2021-03-04', '', 1),
(1030, 78, 5, '2021-03-04', '', 0),
(1031, 79, 5, '2021-03-04', '', 0),
(1032, 30, 13, '2021-03-04', 'Why', 1),
(1033, 31, 13, '2021-03-04', '', 0),
(1034, 32, 13, '2021-03-04', '', 0),
(1035, 33, 13, '2021-03-04', '', 0),
(1036, 34, 13, '2021-03-04', '', 0),
(1037, 35, 13, '2021-03-04', '', 0),
(1038, 75, 5, '2021-03-04', '', 0),
(1039, 38, 9, '2021-03-04', '', 0),
(1040, 43, 9, '2021-03-04', '', 0),
(1041, 64, 9, '2021-03-04', '', 0),
(1042, 65, 9, '2021-03-04', '', 0),
(1043, 69, 9, '2021-03-04', '', 0),
(1044, 78, 9, '2021-03-04', '', 0),
(1045, 86, 9, '2021-03-04', '', 0),
(1046, 76, 28, '2021-03-04', '', 0),
(1047, 77, 28, '2021-03-04', '', 0),
(1048, 78, 28, '2021-03-04', '', 0),
(1049, 79, 28, '2021-03-04', '', 0),
(1050, 76, 5, '2021-03-05', 'Ok', 1),
(1051, 77, 5, '2021-03-05', '', 0),
(1052, 78, 5, '2021-03-05', '', 0),
(1053, 79, 5, '2021-03-05', '', 0),
(1054, 75, 5, '2021-03-05', '', 1),
(1063, 30, 13, '2021-03-08', 'Ok', 1),
(1064, 30, 19, '2021-03-08', 'Ok', 1),
(1065, 30, 20, '2021-03-08', 'Ok', 1),
(1066, 76, 5, '2021-03-08', 'OK', 1),
(1067, 76, 28, '2021-03-08', '', 0),
(1068, 38, 9, '2021-03-08', '', 0),
(1069, 43, 9, '2021-03-08', '', 0),
(1070, 64, 9, '2021-03-08', '', 0),
(1071, 65, 9, '2021-03-08', '', 0),
(1072, 69, 9, '2021-03-08', '', 0),
(1073, 78, 9, '2021-03-08', '', 0),
(1074, 86, 9, '2021-03-08', '', 0),
(1075, 29, 20, '2021-03-08', '', 0),
(1076, 77, 5, '2021-03-08', 'OK', 1),
(1077, 78, 5, '2021-03-08', 'OK', 1),
(1078, 79, 5, '2021-03-08', 'OK', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id`, `location`) VALUES
(26, 'L1'),
(27, 'L2'),
(28, 'L3'),
(29, 'L4'),
(30, 'L5'),
(31, 'L6'),
(32, 'L7'),
(33, 'L8'),
(34, 'L9'),
(35, 'L10'),
(36, 'L11'),
(37, 'L12'),
(38, 'L13'),
(39, 'L14'),
(40, 'L15'),
(41, 'L16'),
(42, 'L17'),
(43, 'L18'),
(44, 'L19'),
(45, 'L20'),
(46, 'L21'),
(47, 'L22'),
(48, 'L23'),
(49, 'L24'),
(50, 'L25'),
(51, 'L26'),
(52, 'L27'),
(53, 'L28'),
(54, 'L29'),
(55, 'L30'),
(56, 'L31'),
(57, 'L32'),
(58, 'L33'),
(59, 'L34'),
(60, 'L35'),
(61, 'L36'),
(62, 'L37'),
(63, 'L38'),
(64, 'L39'),
(65, 'L40'),
(66, 'L41'),
(67, 'L42'),
(68, 'L43'),
(69, 'L44'),
(70, 'L45'),
(71, 'L46'),
(72, 'L47'),
(73, 'L48'),
(74, 'L49'),
(75, 'L50'),
(76, 'L51'),
(77, 'L52'),
(78, 'L53'),
(79, 'L54'),
(80, 'L55'),
(81, 'L56'),
(82, 'L57'),
(83, 'L58'),
(84, 'L59'),
(85, 'L60'),
(86, 'L61'),
(87, 'L62'),
(90, 'Technical'),
(91, 'Quality'),
(92, 'RM'),
(93, 'Plant');

-- --------------------------------------------------------

--
-- Struktur dari tabel `running_have`
--

CREATE TABLE `running_have` (
  `id` int(11) NOT NULL,
  `id_running` int(11) NOT NULL,
  `id_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `running_have`
--

INSERT INTO `running_have` (`id`, `id_running`, `id_location`) VALUES
(11, 5, 76),
(12, 5, 77),
(13, 5, 78),
(14, 5, 79),
(15, 9, 38),
(16, 9, 43),
(17, 9, 64),
(18, 9, 65),
(19, 9, 69),
(20, 9, 78),
(21, 9, 86),
(22, 13, 30),
(23, 13, 31),
(24, 13, 32),
(25, 13, 33),
(26, 13, 34),
(27, 13, 35),
(29, 28, 76),
(30, 28, 77),
(31, 28, 78),
(32, 28, 79),
(33, 13, 37),
(34, 13, 41),
(35, 13, 42),
(38, 13, 47),
(39, 13, 50),
(40, 13, 51),
(41, 13, 52),
(42, 13, 53),
(43, 13, 54),
(44, 13, 55),
(45, 13, 57),
(46, 13, 58),
(47, 13, 59),
(48, 13, 60),
(49, 13, 61),
(50, 13, 63),
(53, 15, 90),
(54, 16, 91),
(55, 17, 93),
(56, 18, 92),
(57, 19, 30),
(58, 19, 32),
(59, 19, 33),
(60, 19, 55),
(62, 20, 30),
(63, 13, 83),
(64, 19, 61),
(65, 19, 47),
(66, 19, 58),
(67, 19, 53),
(68, 19, 51),
(69, 19, 79),
(70, 20, 34),
(71, 20, 35),
(72, 20, 76),
(73, 20, 78),
(74, 20, 51),
(75, 20, 47),
(76, 20, 37),
(77, 21, 32),
(78, 21, 35),
(79, 22, 26),
(80, 22, 29),
(81, 24, 38),
(82, 24, 43),
(83, 24, 64),
(84, 24, 65),
(85, 24, 69),
(86, 24, 78),
(87, 24, 86),
(88, 25, 30),
(89, 25, 31),
(90, 25, 32),
(91, 25, 33),
(92, 25, 34),
(93, 25, 35),
(94, 25, 37),
(95, 25, 41),
(96, 25, 42),
(97, 25, 47),
(98, 25, 50),
(99, 25, 51),
(100, 25, 52),
(101, 25, 53),
(102, 25, 54),
(103, 25, 55),
(104, 25, 57),
(105, 25, 58),
(106, 25, 59),
(107, 25, 60),
(108, 25, 61),
(109, 25, 63),
(110, 25, 83),
(111, 26, 30),
(112, 26, 32),
(113, 26, 55),
(114, 26, 33),
(115, 26, 61),
(116, 26, 47),
(117, 26, 58),
(118, 26, 53),
(119, 26, 51),
(120, 26, 79),
(121, 27, 30),
(122, 27, 34),
(123, 27, 35),
(124, 27, 76),
(125, 27, 78),
(126, 27, 51),
(127, 27, 47),
(128, 27, 37),
(129, 27, 63),
(130, 29, 42),
(131, 30, 42),
(132, 31, 42),
(133, 32, 42);

-- --------------------------------------------------------

--
-- Struktur dari tabel `smv`
--

CREATE TABLE `smv` (
  `id` int(11) NOT NULL,
  `styleno` varchar(50) NOT NULL,
  `smv_prev` float NOT NULL,
  `smv_reduc` float NOT NULL,
  `smv_final` float NOT NULL,
  `percentage` float NOT NULL,
  `customer` varchar(255) NOT NULL,
  `psd` date NOT NULL,
  `running` varchar(10) NOT NULL,
  `improvement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `smv`
--

INSERT INTO `smv` (`id`, `styleno`, `smv_prev`, `smv_reduc`, `smv_final`, `percentage`, `customer`, `psd`, `running`, `improvement`) VALUES
(12, 'M900', 8.115, 0.2, 7.915, 2.46, 'Me Undies', '2021-02-03', '2021-02', 'Jigboard');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `running_have`
--
ALTER TABLE `running_have`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `smv`
--
ALTER TABLE `smv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1079;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `running_have`
--
ALTER TABLE `running_have`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `smv`
--
ALTER TABLE `smv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
