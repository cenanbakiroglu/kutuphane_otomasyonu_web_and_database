-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 06 Nis 2023, 22:48:53
-- Sunucu sürümü: 8.0.27
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayit`
--

DROP TABLE IF EXISTS `kayit`;
CREATE TABLE IF NOT EXISTS `kayit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kullaniciid` int NOT NULL,
  `kitapid` int NOT NULL,
  `calisanid` int NOT NULL,
  `kayittarihi` date NOT NULL,
  `teslimtarihi` date NOT NULL,
  `teslimdurumu` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kayit`
--

INSERT INTO `kayit` (`id`, `kullaniciid`, `kitapid`, `calisanid`, `kayittarihi`, `teslimtarihi`, `teslimdurumu`) VALUES
(1, 1, 4, 1, '2023-04-07', '2023-04-22', 1),
(2, 1, 2, 1, '2023-04-07', '2023-04-22', 1),
(3, 1, 1, 1, '2023-04-07', '2023-04-22', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

DROP TABLE IF EXISTS `kitaplar`;
CREATE TABLE IF NOT EXISTS `kitaplar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kitapadi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazaradi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazarsoyadi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yayinevi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kitapturu` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `basimyili` year DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `ISBN`, `kitapadi`, `yazaradi`, `yazarsoyadi`, `yayinevi`, `kitapturu`, `basimyili`) VALUES
(1, '978-625-7359-69-6', 'Miralayın Kızı Süreyya', 'Naşide', 'Gökbudak', 'Nemesis', 'Roman', 2021),
(2, '978-605-375-781-8', 'Fahrenheit 451', 'Ray', 'Bradbury', 'İthaki Yayınevi', 'Roman', 2022),
(3, '978-605-9702-3-7', 'Uğultulu Tepeler', 'Emily', 'Bronte', 'Koridor Yayınevi', 'Roman', 2022),
(4, '978-605-360-611-6', 'Satranç', 'Stefan', 'Zweig', 'Türkiye İş Bankası Kültür Yayınları', 'Hikaye/Öykü', 2021);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `soyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullaniciadi` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(300) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `Tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kod` varchar(6) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `kullaniciadi`, `mail`, `sifre`, `telefon`, `adres`, `Tarih`, `kod`) VALUES
(1, 'Kullanıcı', 'Kullanıcı', 'kullanici1', 'mudur@gmail.com', '25d55ad283aa400af464c76d713c07ad', '5555555555', ' local', '2023-04-06 17:37:52', NULL),
(2, 'Kullanıcı', 'Kullanıcı', 'kullanici2', 'kullanici2@gmail.com', '25d55ad283aa400af464c76d713c07ad', '5555555555', 'local', '2023-04-06 17:39:09', NULL),
(3, 'Kullanıcı', 'Kullanıcı', 'kullanici3', 'kullanici3@gmail.com', '25d55ad283aa400af464c76d713c07ad', '5555555555', 'local', '2023-04-06 17:39:50', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

DROP TABLE IF EXISTS `personel`;
CREATE TABLE IF NOT EXISTS `personel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `soyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullaniciadi` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `gorev` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tcno` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kayit_tarih` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`id`, `ad`, `soyad`, `kullaniciadi`, `mail`, `sifre`, `gorev`, `telefon`, `tcno`, `adres`, `kayit_tarih`) VALUES
(1, 'Müdür', 'Müdür', 'mudur1', 'mudur@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'müdür', '5555555555', '10000000001', 'local', '2023-04-06'),
(2, 'Memur', 'Memur', 'memur1', 'memur1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'memur', '5555555555', '20000000002', 'local', '2023-04-06'),
(3, 'Memur', 'Memur', 'memur2', 'memur2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'memur', '5555555555', '30000000003', 'local', '2023-04-06'),
(4, 'Memur', 'Memur', 'memur3', 'memur3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'memur', '5555555555', '40000000004', 'local', '2023-04-06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
