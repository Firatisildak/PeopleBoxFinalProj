-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Haz 2024, 12:25:09
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
-- Veritabanı: `peopleboxprdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

CREATE TABLE `about` (
  `aboutID` int(11) NOT NULL,
  `aboutText` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`aboutID`, `aboutText`) VALUES
(0, '2023 yılında açılan yeni bir yazılım eğitim sitesi, teknolojinin hızla geliştiği ve dijital dünyanın önem kazandığı bu çağda oldukça önemli bir girişim olarak karşınıza çıkıyoruz. Bu sebeple size eğitim yanı sıra gelecek kurma fırsatı veriyoruz. Dünyanın yenilikçi yapısına ayak uydurmanızı sağlıyoruz. Bütün üyelerimize en son teknoloji ve gelişmeler ile güncel tuttuğumuz gibi geçmişdeki önemli teknolojiler ile de sizleri yazılım dünyasının aranan yüzleri haline getirmeyi planlıyoruz.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `password`) VALUES
(1, 'Fırat Işıldak', '$2y$10$j.uV3xdzdx5aZ91Zgy.0sOTtl2RRZITytLCNUo8p83Xo6N.DqkENu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cardlesson`
--

CREATE TABLE `cardlesson` (
  `cardLessonID` int(11) NOT NULL,
  `cardLessonImg` varchar(500) NOT NULL,
  `cardLessonTitle` varchar(250) NOT NULL,
  `cardLessonWrite` varchar(500) NOT NULL,
  `educatorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `cardlesson`
--

INSERT INTO `cardlesson` (`cardLessonID`, `cardLessonImg`, `cardLessonTitle`, `cardLessonWrite`, `educatorId`) VALUES
(1, 'r1.jpg', 'HTML5 ve CSS3', 'sıfırdan ileri düzey eğitim serisi. Bu seri daha özgün bir insan olmanızı sağlarken yazılıma adım atmanızı sağlar.Bu sayede kendinizi başka bir seviyede bulucaksınız.', 1),
(2, 'r2.jpg', 'java Eğitimi', 'Adım Adım java öğrenmeye başlayacağınız örnekler ve projeler ile sizi iyi bir yazılımcı yaparken özelliklerinizi de arttırır. Sektördeki insanlardan nasıl yön bulabileceğiniz hakkında bilgi alabilirsin.', 3),
(3, 'r3.jpg', 'C# ve .Net Framework', 'Güncel teknolojiler ve gelişim dünyasına adım atmanızı sağlayan güncel bir eğitim video serisi içerir.\r\nDoğru diller başlayıp doğru teknolojileri öğrenince iş bulamama olasığınız yoktur.', 2),
(4, 'r4.jpg', 'javaScript ve React', 'ileri düzey web tasarım bilgileri içeren bu kursu izleyebilmek için iyi bir tabanınızın olması öncelikli bir koşuldur. Bu kurs sizi ort aseviyeden sektörde aranan ileri bir yaqzlımcı haline getirir.', 2),
(5, 'r5.jpg', 'Mysql Eğitimi', 'Veritabanı işlemleri ve optimizasyonu nasıl gerçekleştirilir gibi konular içerir. Verimli içerikler paylaşılır. Verilerin yönetimi ve birçok yenilik bu sayede ve iş yükünü azaltmayı sağlar.', 3),
(6, 'r6.jpg', 'Temiz kod yazma', 'Bir yazılımcının yapması gereken her türlü  yapının düzenlenmesi ve okunaklı kod yazmanın püf noktaları.\r\nBu kurs ile kendiniz bir yazılımcı gibi hissedip doğru kod yazmayı öğreniceksiniz.', 1),
(7, 'r7.jpg', 'Adım Adım Frontend', 'Bir tasarımcını nerden ve nasıl başlayacağını antırken aynı zamanda nasıl özgün tasarımlar çıkarabiliriz bunun yollarını öğretiyor.  Bu tasarımlar ile kullanıcı dostu arayüzleri tasarlamk çok kolay olucak.', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `educator_table`
--

CREATE TABLE `educator_table` (
  `educatorId` int(11) NOT NULL,
  `nameSurname` varchar(500) NOT NULL,
  `imgLink` varchar(500) NOT NULL,
  `aboutWrite` varchar(1000) NOT NULL,
  `faceLink` varchar(500) NOT NULL,
  `linkedinLink` varchar(500) NOT NULL,
  `githubLink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `educator_table`
--

INSERT INTO `educator_table` (`educatorId`, `nameSurname`, `imgLink`, `aboutWrite`, `faceLink`, `linkedinLink`, `githubLink`) VALUES
(1, 'Sibel Çetin', 'ekip2.jpg', 'Ege Üniversitesi Yazılım mühendisi ve yan dal donanım uzmanı.', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/'),
(2, 'Talha Karaca', 'ekip1.jpg', 'Hacettepe Üniversitesi Yazılım mühendisi ve yan dal donanım uzmanı.', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/'),
(3, 'İpek Camcı', 'ekip3.jpg', 'Yıldız Teknik Üniversitesi Yazılım mühendisi ve yan dal donanım uzmanı.', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/', 'https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `footer`
--

CREATE TABLE `footer` (
  `footerID` int(11) NOT NULL,
  `footerText` varchar(200) NOT NULL,
  `footerIcon` varchar(200) NOT NULL,
  `footerAbout` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `footertext`
--

CREATE TABLE `footertext` (
  `footerTextID` int(11) NOT NULL,
  `footerIcon` varchar(250) NOT NULL,
  `footerText` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `footertext`
--

INSERT INTO `footertext` (`footerTextID`, `footerIcon`, `footerText`) VALUES
(1, 'fa-solid fa-house-chimney fa-xl', 'Eşref Paşa Mah. Celal Caddesi Çiçek Apatman.'),
(2, 'fa-sharp fa-solid fa-phone-volume fa-xl', '05516483813'),
(3, 'fa-solid fa-envelope fa-xl', 'firatisildak1@gmail.com'),
(4, 'fa-sharp fa-solid fa-clock fa-xl', 'Çalışma Saatleri: Pazartesi-Cuma(10:00-18:00)');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `login`
--

INSERT INTO `login` (`id`, `name`, `mail`, `password`) VALUES
(43, 'Fırat', 'firat@gmail.com', '$2y$10$j.uV3xdzdx5aZ91Zgy.0sOTtl2RRZITytLCNUo8p83Xo6N.DqkENu'),
(44, 'celil', 'celil@gmail.com', '$2y$10$Cgo7wlKgxvKXYJcotfx/yu8zDXmhPHIcV/RKGa81yPUHkIeyXOZ5e'),
(46, 'serhat', 'serhat@gmail.com', '$2y$10$xB6xuEH/kPbOZU1atNofOetcpnIyN8UFWGdVJ5SF9WPyJ2n7lIYhG'),
(47, 'abdürrahim', 'abdürrahim@gmail.com', '$2y$10$MbwShaCSjfVnEJ55CWS6wuRG2Q0oqIRPZxcSNTMTPbipb2zjZOhoK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menutable`
--

CREATE TABLE `menutable` (
  `id` int(11) NOT NULL,
  `menuName` varchar(50) NOT NULL,
  `menuUrl` varchar(255) NOT NULL,
  `menuIcon` varchar(255) DEFAULT NULL,
  `siralama` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `menutable`
--

INSERT INTO `menutable` (`id`, `menuName`, `menuUrl`, `menuIcon`, `siralama`) VALUES
(1, 'Anasayfa', 'index.php', 'class=\"fa-solid fa-house icon\"', 1),
(2, 'Hakkımızda', 'index.php#aboutUs', 'class=\"fa-solid fa-info icon\"', 3),
(3, 'Eğitimler', 'education.php', 'class=\"fa-solid fa-graduation-cap icon\"', 2),
(5, 'İletişim', 'index.php#opaqueRow', 'class=\"fa-solid fa-map-pin icon\"', 5),
(6, 'Eğitmenler', 'index.php#educator', 'class=\"fa-solid fa-people-group icon\"', 4),
(18, 'Giriş&Kayıt', 'login_index.php', 'class=\"fa-solid fa-right-to-bracket icon\"', 7),
(98, '', '', 'class=\"fa-solid fa-cart-shopping icon\"', 6);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cardlesson`
--
ALTER TABLE `cardlesson`
  ADD PRIMARY KEY (`cardLessonID`),
  ADD KEY `educatorId` (`educatorId`);

--
-- Tablo için indeksler `educator_table`
--
ALTER TABLE `educator_table`
  ADD PRIMARY KEY (`educatorId`);

--
-- Tablo için indeksler `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`footerID`);

--
-- Tablo için indeksler `footertext`
--
ALTER TABLE `footertext`
  ADD PRIMARY KEY (`footerTextID`);

--
-- Tablo için indeksler `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_login` (`mail`);

--
-- Tablo için indeksler `menutable`
--
ALTER TABLE `menutable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menuUrl` (`menuUrl`),
  ADD UNIQUE KEY `UC_menutable` (`menuUrl`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `cardlesson`
--
ALTER TABLE `cardlesson`
  MODIFY `cardLessonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `educator_table`
--
ALTER TABLE `educator_table`
  MODIFY `educatorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Tablo için AUTO_INCREMENT değeri `footer`
--
ALTER TABLE `footer`
  MODIFY `footerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `footertext`
--
ALTER TABLE `footertext`
  MODIFY `footerTextID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `menutable`
--
ALTER TABLE `menutable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `cardlesson`
--
ALTER TABLE `cardlesson`
  ADD CONSTRAINT `cardlesson_ibfk_1` FOREIGN KEY (`educatorId`) REFERENCES `educator_table` (`educatorId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
