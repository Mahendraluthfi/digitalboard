-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2021 pada 08.21
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
-- Struktur dari tabel `checktime`
--

CREATE TABLE `checktime` (
  `id` int(11) NOT NULL,
  `id_running` int(11) NOT NULL,
  `date` date NOT NULL,
  `loc` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `cb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `checktime`
--

INSERT INTO `checktime` (`id`, `id_running`, `date`, `loc`, `reason`, `cb`) VALUES
(7, 3, '2020-12-10', 'L40', '', 1),
(8, 3, '2020-12-10', 'L25', 'Dibuang ke tempat sampah', 0),
(9, 3, '2020-12-10', 'L30', '', 1),
(10, 5, '2020-12-10', 'L51', '', 1),
(11, 5, '2020-12-10', 'L50', '', 1),
(12, 5, '2020-12-10', 'L49', 'Buatukmu', 0),
(13, 3, '2020-12-11', 'L40', '', 0),
(14, 3, '2020-12-11', 'L25', '', 0),
(15, 3, '2020-12-11', 'L30', '', 0),
(16, 5, '2020-12-11', 'L51', '', 0),
(17, 5, '2020-12-11', 'L50', '', 0),
(18, 5, '2020-12-11', 'L49', '', 0),
(19, 3, '2020-12-14', 'L40', 'Yang pegang proses Hams machine adalah TM proses batrex,mesin tidak di pakai', 0),
(20, 3, '2020-12-14', 'L25', '', 1),
(22, 3, '2020-12-14', 'L55', '', 1),
(23, 5, '2020-12-14', 'L51', '', 1),
(24, 5, '2020-12-14', 'L50', '', 1),
(27, 3, '2020-12-16', 'L41', '', 0),
(28, 3, '2020-12-16', 'L25', '', 0),
(29, 3, '2020-12-16', 'L55', '', 0),
(30, 3, '2020-12-16', 'L25 A', '', 0),
(31, 5, '2020-12-16', 'L51', '', 0),
(32, 5, '2020-12-16', 'L50', '', 0),
(33, 5, '2020-12-16', 'L40', '', 0),
(34, 5, '2021-01-15', 'L51', '', 0),
(35, 5, '2021-01-15', 'L50', '', 0),
(36, 5, '2021-01-15', 'L40', '', 0),
(37, 9, '2021-01-15', 'L23', '', 0),
(38, 9, '2021-01-15', 'L09', '', 0),
(39, 9, '2021-01-15', 'L11', '', 0),
(40, 5, '2021-02-02', 'L51', '', 0),
(41, 5, '2021-02-02', 'L50', '', 0),
(42, 5, '2021-02-02', 'L40', '', 0),
(43, 9, '2021-02-02', 'L23', '', 0),
(44, 9, '2021-02-02', 'L09', '', 0),
(45, 9, '2021-02-02', 'L11', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `downtime`
--

CREATE TABLE `downtime` (
  `id` int(11) NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `st` datetime DEFAULT NULL,
  `et` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `downtime`
--

INSERT INTO `downtime` (`id`, `projectname`, `st`, `et`) VALUES
(11, 'magneto', '2020-11-24 11:10:44', '2020-11-24 11:11:05'),
(12, 'Magneto', '2020-11-24 11:55:35', '2020-11-24 11:55:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `id_running` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `id_running`, `location`) VALUES
(5, 3, 'L41'),
(6, 3, 'L25'),
(8, 5, 'L51'),
(9, 5, 'L50'),
(11, 3, 'L55'),
(13, 5, 'L40'),
(14, 0, 'L41'),
(15, 0, 'L41'),
(16, 0, 'L41'),
(17, 0, 'L41'),
(18, 3, 'L25 A'),
(24, 9, 'L23'),
(25, 9, 'L09'),
(26, 9, 'L11'),
(28, 9, 'L45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `npi`
--

CREATE TABLE `npi` (
  `id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `pdra` text NOT NULL,
  `provo` text NOT NULL,
  `integration` text NOT NULL,
  `pp` varchar(255) NOT NULL,
  `pilot` varchar(255) NOT NULL,
  `psd` date NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `npi`
--

INSERT INTO `npi` (`id`, `product`, `style`, `pdra`, `provo`, `integration`, `pp`, `pilot`, `psd`, `remarks`) VALUES
(2, 'Bra', '60211086a', '', '', '', '', 'Jig Tack, Auto spageti', '2020-12-24', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongoing`
--

CREATE TABLE `ongoing` (
  `id` int(11) NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `champion` varchar(50) NOT NULL,
  `finishdate` date NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongoing`
--

INSERT INTO `ongoing` (`id`, `projectname`, `champion`, `finishdate`, `remarks`) VALUES
(3, 'Digital VSM', 'Supri', '2020-12-18', 'Progress');

-- --------------------------------------------------------

--
-- Struktur dari tabel `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `embed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `plan`
--

INSERT INTO `plan` (`id`, `embed`) VALUES
(1, '<iframe width=\"100%\" height=\"600\" frameborder=\"0\" scrolling=\"no\" src=\"https://massl-my.sharepoint.com/personal/prionakal_masholdings_com/_layouts/15/Doc.aspx?sourcedoc={8a5e2062-d201-4db0-bd37-6ae05c31fb9b}&action=embedview&wdAllowInteractivity=False&wdHideGridlines=True&wdDownloadButton=True&wdInConfigurator=True\"></iframe>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id`, `projectname`, `department`, `category`, `remarks`) VALUES
(1, 'Auto Weighting', 'FG', 'Autonomation', 'Wait OK'),
(18, 'Fortitube Chopper', 'Production', 'Autonomation', '<p>Waluja</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `running`
--

CREATE TABLE `running` (
  `id` int(11) NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `units` varchar(50) NOT NULL,
  `locations` text NOT NULL,
  `remarks` text NOT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `running`
--

INSERT INTO `running` (`id`, `projectname`, `units`, `locations`, `remarks`, `last_update`) VALUES
(5, 'Magneto', '20', '', '<p>Waluyo</p>', '2020-12-14 10:10:33'),
(9, 'Label attach Meundies	', '', '', '<p>Lukman</p>', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saving`
--

CREATE TABLE `saving` (
  `id` int(11) NOT NULL,
  `embed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saving`
--

INSERT INTO `saving` (`id`, `embed`) VALUES
(1, '<iframe width=\"100%\" height=\"590\" frameborder=\"0\" scrolling=\"no\" src=\"https://massl.sharepoint.com/sites/SumbiriAutonomation9/_layouts/15/Doc.aspx?sourcedoc={c10ac4b1-cb08-484a-834a-4ad79050abf4}&action=embedview&wdAllowInteractivity=False&wdHideGridlines=True&wdDownloadButton=True&wdInConfigurator=True\"></iframe>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `safety` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `morale` int(11) DEFAULT NULL,
  `roi` int(11) DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  `urgency` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `score`
--

INSERT INTO `score` (`id`, `id_request`, `safety`, `quality`, `delivery`, `cost`, `morale`, `roi`, `delivery_time`, `urgency`, `total`) VALUES
(1, 1, 50, 50, 50, 0, 20, -20, 30, 10, 190),
(2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 18, 50, 0, 50, 10, 20, 0, 50, 40, 220);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checktime`
--
ALTER TABLE `checktime`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `downtime`
--
ALTER TABLE `downtime`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `npi`
--
ALTER TABLE `npi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `running`
--
ALTER TABLE `running`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saving`
--
ALTER TABLE `saving`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checktime`
--
ALTER TABLE `checktime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `downtime`
--
ALTER TABLE `downtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `npi`
--
ALTER TABLE `npi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `running`
--
ALTER TABLE `running`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `saving`
--
ALTER TABLE `saving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
