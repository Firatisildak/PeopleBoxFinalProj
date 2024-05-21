-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 May 2024, 11:42:12
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `peopleboxdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menutable`
--

CREATE TABLE `menutable` (
  `id` int(11) NOT NULL,
  `menuName` varchar(250) NOT NULL,
  `menuUrl` varchar(250) NOT NULL,
  `menuIcon` varchar(500) NOT NULL,
  `siralama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `menutable`
--

INSERT INTO `menutable` (`id`, `menuName`, `menuUrl`, `menuIcon`, `siralama`) VALUES
(1, 'Anasayfa', 'index.php', 'class=\"fa-solid fa-house icon\"', 1),
(2, 'Eğitimler', '', 'class=\"fa-solid fa-graduation-cap icon\"\r\n', 2),
(3, 'Hakkımızda', '', 'class=\"fa-solid fa-info icon\"', 3),
(4, 'Eğitmenler', '', 'class=\"fa-solid fa-people-group icon\"', 4),
(5, 'İletişim', '', 'class=\"fa-solid fa-map-pin icon\"', 5),
(6, 'Giriş&Kayıt', '', 'class=\"fa-solid fa-right-to-bracket icon\"', 6),
(7, 'Sepet', '', 'class=\"fa-solid fa-cart-shopping icon\"', 7);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `menutable`
--
ALTER TABLE `menutable`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `menutable`
--
ALTER TABLE `menutable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
