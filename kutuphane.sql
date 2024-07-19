-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 31 May 2023, 17:50:08
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
-- Tablo için tablo yapısı `dilekce`
--

DROP TABLE IF EXISTS `dilekce`;
CREATE TABLE IF NOT EXISTS `dilekce` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dilekce` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `dilekce_turu` varchar(7) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_kadi` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dilekce`
--

INSERT INTO `dilekce` (`id`, `dilekce`, `dilekce_turu`, `kullanici_kadi`) VALUES
(9, 'Merhabalar;\r\nKütüphanemizde xxxx yazarın zzz adlı kitabı bulunmuyor. Bu kitabın kütüphane envanterine dahil olmasını istiyorum İlgili makamlara arz ederim.', 'İSTEK', 'kullanici1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

DROP TABLE IF EXISTS `duyurular`;
CREATE TABLE IF NOT EXISTS `duyurular` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`id`, `baslik`, `icerik`) VALUES
(1, 'Kütüphanemiz Açılmıştır', '2023 Yılı Sinop Üniversitesi Bahar Dönemi kapsamında Oğuzhan KAYA ve Cenan BAKIROĞLU tarafından yapılan Kütüphane Otomasyonu adlı Web site, masa üstü uygulması ven veritabanından oluşan Kütüphane Otomasyonu projesi 30.05.2023 tarihinde bitirilmiştir.');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kayit`
--

INSERT INTO `kayit` (`id`, `kullaniciid`, `kitapid`, `calisanid`, `kayittarihi`, `teslimtarihi`, `teslimdurumu`) VALUES
(1, 1, 22, 1, '2023-05-27', '2023-06-11', 1),
(2, 1, 21, 1, '2023-05-27', '2023-06-11', 1),
(3, 1, 15, 1, '2023-05-27', '2023-06-11', 1),
(4, 2, 19, 1, '2023-05-27', '2023-06-11', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

DROP TABLE IF EXISTS `kitaplar`;
CREATE TABLE IF NOT EXISTS `kitaplar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kitapadi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazaradi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yazarsoyadi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yayinevi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kitapturu` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `basimyili` varchar(4) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kira` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kitapdurum` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitapadi`, `yazaradi`, `yazarsoyadi`, `yayinevi`, `kitapturu`, `basimyili`, `kira`, `kitapdurum`) VALUES
(1, 'Miralayın Kızı Süreyya', 'Naşide', 'Gökbudak', 'Nemesis', 'Roman', '2021', '0', 0),
(2, 'Fahrenheit 451', 'Ray', 'Bradbury', 'İthaki Yayınevi', 'Roman', '2022', '0', 1),
(3, 'Uğultulu Tepeler', 'Emily', 'Bronte', 'Koridor Yayınevi', 'Roman', '2022', '0', 1),
(4, 'Satranç', 'Stefan', 'Zweig', 'Türkiye İş Bankası Kültür Yayınları', 'Hikaye/Öykü', '2021', '0', 0),
(5, 'Bir Aşk Sayfası', 'Emile', 'Zola', 'Sonsuz Kitap Yayınevi', 'Roman', '2009', '0', 0),
(6, 'Başka Bir Şey', 'Ahmet', 'Batman', 'Destek Yayınları', 'Hikaye', '2019', '0', 0),
(7, 'Beyaz Zambaklar Ülkesinde', 'Grigoriy', 'Petrov', 'Puslu Yayınevi', 'Hikaye', '2019', '0', 0),
(8, 'Fesleğen', 'Hikmet Anıl', 'Öztekin', 'Hayykitap Yayınevi', 'Hikaye', '2017', '0', 0),
(9, 'Sevmek Zorunda Değilsin Beni', 'Sinan', 'Akyüz', 'Alfa Roman Yayınevi', 'Roman', '2009', '0', 0),
(10, 'Ateşten Gömlek', 'Halide Edip', 'Adıvar', 'Can Yayınevi', 'Roman', '2011', '0', 0),
(11, 'Kiraz Ağacı ile Aramdaki Mesafe', 'Paola', 'Peretti', 'Timaş Yayınevi', 'Hikaye', '2019', '0', 0),
(12, 'Soğuk Kahve', 'Ahmet', 'Batman', 'Destek Yayınları', 'Kişisel Gelişim', '2013', '0', 0),
(13, 'Binbir Gece Masalları', 'Nermin ', 'Öztürk', 'İndeks Yayınevi', 'Hikaye', '2007', '0', 0),
(14, 'Taaşşuk-i Talat ve Fitnat', 'Şemsettin', 'Sami', 'Mavi Çatı Yayınları', 'Roman', '2016', '0', 0),
(15, 'Bukre Bazı Aşklar İhanettir', 'Kahraman', 'Tazeoğlu', 'Destek Yayınları', 'Roman', '2016', '1', 0),
(16, 'Bir Aşk Sayfası', 'Ahmet', 'Batman', 'Destek Yayınları', 'Kişisel Gelişim', '2019', '0', 0),
(17, 'Kemik çayı', 'Hatice', 'Dökmen', 'Destek', 'Roman', '2020', '0', 1),
(18, 'Miralayın Kızı Süreyya', 'Naşide', 'Gökbudak', 'Nemesis', 'Roman', '2021', '0', 0),
(19, 'Miralayın Kızı Süreyya', 'Naşide', 'Gökbudak', 'Nemesis', 'Roman', '2021', '1', 0),
(20, 'Satranç', 'Stefan', 'Zweig', 'Türkiye Iş Bankası Kültür Yayınları', 'Hikaye/öykü', '0000', '0', 0),
(21, 'Başka Bir şey', 'Ahmet', 'Batman', 'Destek Yayınları', 'Roman', '2017', '0', 0),
(22, 'Bir Aşk Sayfası', 'Ahmet', 'Batman', 'Destek Yayınları', 'Hikaye', '2011', '0', 1);

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
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kod` varchar(8) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanicidurum` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `kullaniciadi`, `mail`, `sifre`, `telefon`, `adres`, `tarih`, `kod`, `kullanicidurum`) VALUES
(1, 'Kullanıcı1', 'Kullanıcı', 'kullanici1', 'mudur@gmail.com', '25d55ad283aa400af464c76d713c07ad', '5555', '  local', '2023-04-06 17:37:52', NULL, 0),
(2, 'Kullanıcı2', 'Kullanıcı', 'kullanici2', 'kullanici2@gmail.com', '25d55ad283aa400af464c76d713c07ad', '5555555555', 'local', '2023-04-06 17:39:09', NULL, 0),
(3, 'Kullanıcı3', 'Kullanıcı', 'kullanici3', 'kullanici3@gmail.com', '25d55ad283aa400af464c76d713c07ad', '5555555555', 'local', '2023-04-06 17:39:50', NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kutupbilgiler`
--

DROP TABLE IF EXISTS `kutupbilgiler`;
CREATE TABLE IF NOT EXISTS `kutupbilgiler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hakkimizda` longtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `fax` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kutupbilgiler`
--

INSERT INTO `kutupbilgiler` (`id`, `hakkimizda`, `telefon`, `fax`, `adres`) VALUES
(1, '    2022-2023 eğitim öğretim yılı Sinop Üniversitesi Bilgisayar Teknolojileri Bölümü Bilgisayar Programcılığı programı öğrencileri OĞUZHAN KAYA ve CENAN BAKIROĞLU  tarafından bahar dönemi bitirme projesi için tasarlanmış olup sitenin tüm hakları OĞUZHAN KAYA ve CENAN BAKIROĞLU\'na aittir.', '(505) 050-0505', '(505) 050-0505', 'LOCAL\r\n');

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
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `gorev` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `tcno` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kayit_tarih` date NOT NULL,
  `personeldurum` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`id`, `ad`, `soyad`, `kullaniciadi`, `mail`, `sifre`, `gorev`, `telefon`, `tcno`, `adres`, `kayit_tarih`, `personeldurum`) VALUES
(1, 'Müdür', 'Müdür', 'mudur1', 'mudur@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'müdür', '5555555555', '10000000001', 'local', '2023-04-06', 0),
(2, 'Memur', 'Memur', 'memur1', 'memur1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'memur', '5555555555', '20000000002', 'local', '2023-04-06', 0),
(3, 'Memur', 'Memur', 'memur2', 'memur2@gmail.com', '59a6633fef0c8b2b01f62cad5fe2b3ca', 'memur', '5555555555', '30000000003', 'local', '2023-04-06', 0),
(4, 'Memur', 'Memur', 'memur3', 'memur3@gmail.com', '59a6633fef0c8b2b01f62cad5fe2b3ca', 'memur', '5555555555', '40000000004', 'local', '2023-04-06', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
