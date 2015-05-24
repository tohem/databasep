-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Mayıs 2015 saat 09:01:50
-- Sunucu sürümü: 5.1.53
-- PHP Sürümü: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyunlar`
--

CREATE TABLE IF NOT EXISTS `oyunlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `tur` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `bilgi` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `oyunlar`
--

INSERT INTO `oyunlar` (`id`, `ad`, `tur`, `bilgi`) VALUES
(3, 'Skill Special Force 2', 'Online FPS', 'hbjavsfjhavjbackj');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `nick` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `dogum` date NOT NULL,
  `email` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `sifre` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `ad`, `soyad`, `nick`, `dogum`, `email`, `tel`, `sifre`, `yetki`) VALUES
(7, 'okan', 'çaylı', 'shiro', '1993-01-21', 'okancyl@gmail.com', 1234567890, 'f7d906fb8d0b114301eba7bda96f06f5', '1'),
(9, 'esin', 'küçükömeroğlu', 'es', '1992-03-21', 'esinkucuk@gmail.com', 321654654, '362bddcd15dbc88b797ab890abdb6594', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE IF NOT EXISTS `yorum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum` text COLLATE utf8_turkish_ci,
  `puan` int(11) DEFAULT NULL,
  `uyeid_fk` int(11) NOT NULL,
  `oyunid_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `oyunid_fk` (`oyunid_fk`),
  KEY `uyeid_fk` (`uyeid_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

--
-- Tablo döküm verisi `yorum`
--

